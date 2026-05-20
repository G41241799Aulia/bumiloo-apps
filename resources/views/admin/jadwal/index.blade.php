@extends('layouts.masterAdmin')

@section('title', 'Jadwal Konsultasi - Bumiloo')

@section('content')
<style>
    .jwl-container * { font-family: 'Poppins', sans-serif !important; box-sizing: border-box !important; }
    /* Mengosongkan max-width agar box form melebar penuh mengikuti layar figma kanan */
    .jwl-form-box { background: #F4F5F7 !important; border-radius: 16px !important; border: 1px solid #D2D6DC !important; padding: 25px 30px !important; width: 100% !important; }
    .jwl-label { font-size: 14px !important; font-weight: 500 !important; color: #000000 !important; }
    .jwl-input { background: #FFFFFF !important; border: 1px solid #A0AEC0 !important; border-radius: 8px !important; padding: 10px 15px !important; font-size: 14px !important; outline: none !important; }
    .jwl-input:focus { border-color: #F875AA !important; box-shadow: 0 0 0 2px rgba(248, 117, 170, 0.2) !important; }
    
    /* Tombol Simpan Pink Khas Bumiloo */
    .jwl-btn-submit { background-color: #F875AA !important; color: white !important; font-weight: bold !important; border-radius: 10px !important; padding: 12px 28px !important; border: none !important; cursor: pointer !important; font-size: 14px !important; display: flex !important; align-items: center !important; gap: 10px !important; transition: 0.2s !important; box-shadow: 0 4px 6px rgba(248, 117, 170, 0.2) !important; }
    .jwl-btn-submit:hover { background-color: #f55a9a !important; }
    
    /* Tabel Berdiri Lebar Penuh Tanpa Batasan Batas Kaku */
    .jwl-table-box { width: 100% !important; border-collapse: collapse !important; border-radius: 12px !important; overflow: hidden !important; }
    .jwl-table-box th { background-color: #F875AA !important; color: white !important; padding: 14px 15px !important; font-weight: 600 !important; font-size: 14px !important; border: none !important; text-align: left !important; }
    .jwl-table-box td { padding: 14px 15px !important; font-size: 14px !important; border-bottom: 1px solid #E2E8F0 !important; background-color: #FFFFFF !important; color: #333333 !important; }
    .jwl-table-box tr:nth-child(even) td { background-color: #FFF5F7 !important; } /* Zebra Pink Lembut */
</style>

<div class="jwl-container w-full" style="padding: 10px 20px; background-color: #FFFFFF; min-h-screen;">
    
    <h1 style="font-size: 28px; font-weight: 700; color: #000000; margin: 0 0 15px 0;">Jadwal Konsultasi</h1>

    <div style="margin-bottom: 25px;">
        @if(isset($pasien) && $pasien)
            <p style="font-size: 15px; font-weight: 600; color: #000000; margin: 0; letter-spacing: -0.3px;">
                Pasien: {{ $pasien->name }} — NIK: {{ $pasien->nik }} — No. HP: {{ $pasien->no_hp }} — Tgl Lahir: {{ date('d-m-Y', strtotime($pasien->tgl_lahir)) }}
            </p>
        @else
            <p style="font-size: 14px; font-weight: 500; color: #718096; margin: 0; border-left: 4px solid #F875AA; padding-left: 12px; font-style: italic;">
                Belum ada data pasien yang dipilih. Silakan hubungi aksi melalui halaman <span style="color: #F875AA; font-weight: 600;">Data Pasien</span> untuk memicu pembuatan jadwal.
            </p>
        @endif
    </div>

    <div class="jwl-form-box" style="margin-bottom: 35px;">
        <p style="font-size: 15px; font-weight: 700; color: #000000; margin: 0 0 25px 0;">
            {{ isset($editJadwal) ? 'Edit Jadwal Konsultasi' : 'Tambah Jadwal Konsultasi' }}
        </p>

        <form action="{{ isset($editJadwal) ? route('jadwal.update', $editJadwal->id) : route('jadwal.store') }}" method="POST" style="margin: 0; display: flex; flex-direction: column; width: 100%;">
            @csrf
            @if(isset($editJadwal)) @method('PUT') @endif

            <input type="hidden" name="nama_pasien" value="{{ $editJadwal->nama_pasien ?? ($pasien->name ?? '') }}">
            <input type="hidden" name="nik" value="{{ $editJadwal->nik ?? ($pasien->nik ?? '') }}">
            <input type="hidden" name="no_hp" value="{{ $editJadwal->no_hp ?? ($pasien->no_hp ?? '') }}">
            <input type="hidden" name="tgl_lahir" value="{{ $editJadwal->tgl_lahir ?? ($pasien->tgl_lahir ?? '') }}">

            <div style="display: flex; gap: 40px; width: 100%; margin-bottom: 20px;">
                <div style="display: flex; align-items: center; gap: 15px; flex: 1;">
                    <label class="jwl-label" style="width: 160px; shrink: 0;">Tanggal Pemeriksaan</label>
                    <input type="date" name="tgl_pemeriksaan" value="{{ $editJadwal->tgl_pemeriksaan ?? '' }}" required class="jwl-input" style="flex-grow: 1; max-width: 260px; height: 42px;">
                </div>
                <div style="display: flex; align-items: center; gap: 15px; flex: 1;">
                    <label class="jwl-label" style="width: 50px; shrink: 0;">Jam</label>
                    <input type="time" name="jam" value="{{ $editJadwal->jam ?? '' }}" required class="jwl-input" style="flex-grow: 1; max-width: 180px; height: 42px;">
                </div>
            </div>

            <div style="display: flex; align-items: flex-start; gap: 15px; width: 100%; margin-bottom: 25px;">
                <label class="jwl-label" style="width: 160px; shrink: 0; padding-top: 8px;">Keterangan</label>
                <textarea name="keterangan" placeholder="Masukkan detail konsultasi..." required class="jwl-input" style="width: 100%; flex-grow: 1; height: 110px; resize: none; font-family: inherit;"></textarea>
            </div>

            <div style="display: flex; justify-content: flex-end; width: 100%;">
                @if(isset($editJadwal))
                    <a href="{{ route('jadwal.index') }}" style="text-decoration: none; background: #A0AEC0; color: white; padding: 10px 24px; border-radius: 10px; font-weight: bold; font-size: 14px; margin-right: 12px; display: flex; align-items: center;">Batal</a>
                @endif
                <button type="submit" class="jwl-btn-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 18px; height: 18px; fill: #FFFFFF;" viewBox="0 0 24 24">
                        <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                    </svg>
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <div style="margin-top: 30px; width: 100%;">
        <h2 style="font-size: 20px; font-weight: 700; color: #000000; margin: 0 0 15px 0;">Daftar Jadwal Konsultasi</h2>
        
        <div style="overflow-x: auto; width: 100%;">
            <table class="jwl-table-box">
                <thead>
                    <tr>
                        <th style="border-top-left-radius: 12px;">Nama Pasien</th>
                        <th>NIK</th>
                        <th>No. HP</th>
                        <th>Tgl Lahir</th>
                        <th>Tgl Pemeriksaan</th>
                        <th>Jam</th>
                        <th style="border-top-right-radius: 12px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwals as $j)
                    <tr>
                        <td style="font-weight: 500;">{{ $j->nama_pasien }}</td>
                        <td>{{ $j->nik }}</td>
                        <td>{{ $j->no_hp }}</td>
                        <td>{{ date('d-m-Y', strtotime($j->tgl_lahir)) }}</td>
                        <td style="font-weight: 600;">{{ date('d/m/Y', strtotime($j->tgl_pemeriksaan)) }}</td>
                        <td style="font-weight: 600;">{{ $j->jam }}</td>
                        <td style="text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px;">
                                <a href="{{ route('jadwal.index', ['edit_id' => $j->id]) }}" style="text-decoration: none; color: #D69E2E; font-weight: bold; font-size: 13px; background: #EDF2F7; padding: 5px 12px; border-radius: 6px;">Edit</a>
                                <button type="button" onclick="confirmDelete('{{ $j->id }}', '{{ $j->nama_pasien }}')" style="color: #E53E3E; font-weight: bold; font-size: 13px; background: #EDF2F7; padding: 5px 12px; border-radius: 6px; border: none; cursor: pointer;">Hapus</button>
                                
                                <form id="delete-form-{{ $j->id }}" action="{{ route('jadwal.destroy', $j->id) }}" method="POST" style="display: none;">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #A0AEC0; padding: 40px; font-style: italic; font-weight: 500;">
                            Belum ada jadwal konsultasi yang terdaftar di dalam database.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- SweetAlert2 System JS --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id, nama) {
        Swal.fire({
            title: 'Hapus Antrean?',
            text: "Yakin ingin menghapus jadwal dari " + nama + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff0000',
            cancelButtonColor: '#d1d5db',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            customClass: { popup: 'rounded-[24px]' }
        }).then((result) => {
            if (result.isConfirmed) { document.getElementById('delete-form-' + id).submit(); }
        })
    }
</script>

@if(session('success'))
<script>
    Swal.fire({
        text: "{{ session('success') }}",
        showConfirmButton: false, timer: 3000, toast: true, position: 'top', width: '400px',
        background: '#C6E7CE', color: '#000000', customClass: { popup: 'rounded-xl' }
    });
</script>
@endif
@endsection