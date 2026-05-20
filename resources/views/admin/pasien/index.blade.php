@extends('layouts.masterAdmin')

@section('title', 'Data Rekam Medis Pasien - Bumiloo')

@section('content')
<style>
    .psn-container * { font-family: 'Poppins', sans-serif !important; box-sizing: border-box !important; }
    
    /* Tabel Berdiri Lebar Penuh & Bisa Di-scroll Horizontal Jika Kolomnya Banyak */
    .psn-table-wrapper { width: 100% !important; overflow-x: auto !important; border: 1px solid #D2D6DC !important; border-radius: 12px !important; box-shadow: 0 4px 6px rgba(0,0,0,0.05) !important; margin-top: 20px; }
    .psn-table-box { width: 100% !important; border-collapse: collapse !important; min-width: 1700px !important; } 
    
    .psn-table-box th { background-color: #F875AA !important; color: white !important; padding: 14px 12px !important; font-weight: 600 !important; font-size: 13px !important; border: none !important; text-align: left !important; white-space: nowrap !important; }
    .psn-table-box td { padding: 14px 12px !important; font-size: 13px !important; border-bottom: 1px solid #E2E8F0 !important; background-color: #FFFFFF !important; color: #333333 !important; white-space: nowrap !important; }
    
    /* Efek Baris Zebra Standar Pasien Normal */
    .psn-row-normal:nth-child(even) td { background-color: #FFF5F7 !important; }
    
    /* Tombol Aksi Desain Minimalis Khas Bumiloo */
    .psn-btn-action { text-decoration: none !important; font-weight: bold !important; font-size: 12px !important; padding: 6px 12px !important; border-radius: 6px !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; border: none !important; cursor: pointer !important; transition: 0.2s !important; }
    .psn-btn-jadwal { background-color: #F875AA !important; color: white !important; }
    .psn-btn-jadwal:hover { background-color: #f55a9a !important; }
    .psn-btn-edit { background: #EDF2F7 !important; color: #D69E2E !important; }
    .psn-btn-hapus { background: #EDF2F7 !important; color: #E53E3E !important; }
</style>

<div class="psn-container w-full" style="padding: 10px 20px; background-color: #FFFFFF; min-h-screen;">
    
    <div style="margin-bottom: 10px;">
        <h1 style="font-size: 28px; font-weight: 700; color: #000000; margin: 0;">Data Pasien Ibu Hamil</h1>
        <p style="font-size: 14px; color: #718096; margin: 5px 0 0 0;">Data lengkap rekam medis hasil pendaftaran sistem Bumiloo (tb_pendaftaran).</p>
    </div>

    <div class="psn-table-wrapper">
        <table class="psn-table-box">
            <thead>
                <tr>
                    <th style="border-top-left-radius: 12px;">Nama Pasien</th>
                    <th>NIK</th>
                    <th>No. HP</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl Lahir</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Gol. Darah</th>
                    <th>Pekerjaan</th>
                    <th>Nama Suami</th>
                    <th>Tgl Lahir Suami</th>
                    <th>Usia Suami</th>
                    <th>HPHT</th>
                    <th style="border-top-right-radius: 12px; text-align: center; width: 220px;">Aksi Utama</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pasiens as $p)
                    @if(isset($p->status_konsultasi) && $p->status_konsultasi == 'butuh_jadwal')
                        <tr style="background-color: #FFEFEB !important;">
                            <td style="font-weight: 600; background-color: #FFEFEB !important;">{{ $p->nama }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->nik }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->no_hp }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->tempat_lahir }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ date('d-m-Y', strtotime($p->tgl_lahir)) }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->umur }} Thn</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->alamat }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->agama }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->pendidikan }}</td>
                            <td style="background-color: #FFEFEB !important; text-align: center;">{{ $p->gol_darah }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->pekerjaan }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->nama_suami }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ date('d-m-Y', strtotime($p->tgllahir_suami)) }}</td>
                            <td style="background-color: #FFEFEB !important;">{{ $p->usia_suami }} Thn</td>
                            <td style="background-color: #FFEFEB !important; font-weight: 600;">{{ date('d-m-Y', strtotime($p->hpht)) }}</td>
                            <td style="text-align: center; background-color: #FFEFEB !important;">
                                <div style="display: flex; justify-content: center; gap: 6px;">
                                    <a href="{{ route('jadwal.index', ['pasien_id' => $p->id]) }}" class="psn-btn-action psn-btn-jadwal">
                                        Buat Jadwal
                                    </a>
                                    <a href="{{ route('pasien.edit', $p->id) }}" class="psn-btn-action psn-btn-edit">Edit</a>
                                    <button type="button" onclick="confirmDeletePasien('{{ $p->id }}', '{{ $p->nama }}')" class="psn-btn-action psn-btn-hapus">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr class="psn-row-normal">
                            <td style="font-weight: 500;">{{ $p->nama }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->no_hp }}</td>
                            <td>{{ $p->tempat_lahir }}</td>
                            <td>{{ date('d-m-Y', strtotime($p->tgl_lahir)) }}</td>
                            <td>{{ $p->umur }} Thn</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>{{ $p->pendidikan }}</td>
                            <td style="text-align: center;">{{ $p->gol_darah }}</td>
                            <td>{{ $p->pekerjaan }}</td>
                            <td>{{ $p->nama_suami }}</td>
                            <td>{{ date('d-m-Y', strtotime($p->tgllahir_suami)) }}</td>
                            <td>{{ $p->usia_suami }} Thn</td>
                            <td style="font-weight: 600;">{{ date('d-m-Y', strtotime($p->hpht)) }}</td>
                            <td style="text-align: center;">
                                <div style="display: flex; justify-content: center; gap: 6px;">
                                    <a href="{{ route('pasien.edit', $p->id) }}" class="psn-btn-action psn-btn-edit">Edit</a>
                                    <button type="button" onclick="confirmDeletePasien('{{ $p->id }}', '{{ $p->nama }}')" class="psn-btn-action psn-btn-hapus">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="16" style="text-align: center; color: #A0AEC0; padding: 50px; font-style: italic; font-weight: 500;">
                            Belum ada data ibu hamil yang terdaftar di dalam database tb_pendaftaran.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- SweetAlert2 JS untuk Hapus Pasien --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeletePasien(id, nama) {
        Swal.fire({
            title: 'Hapus Data Pasien?',
            text: "Seluruh riwayat medis dari " + nama + " akan terhapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#E53E3E',
            cancelButtonColor: '#A0AEC0',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            customClass: { popup: 'rounded-[24px]' }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-pasien-form-' + id).submit();
            }
        })
    }
</script>

@foreach($pasiens as $p)
    <form id="delete-pasien-form-{{ $p->id }}" action="{{ route('pasien.destroy', $p->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

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