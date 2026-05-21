@extends('layouts.masterBidan')

@section('content')
<div class="container-lg mt-4">
    <h3 class="fw-bold mb-4 text-dark">Input Data Ibu Hamil</h3>

    <form action="{{ route('bidan.pasien.store') }}" method="POST" class="card shadow p-4 mb-5" id="formPasien" onsubmit="return validasiFormBumil(event)">
    @csrf
        <input type="hidden" name="id" id="id_pasien">

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">No. Pasien</label>
              <input type="text" name="no_pasien" class="form-control" readonly value="{{ $noPasienOtomatis }}" required>
            </div>
        </div>    
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK 16 Digit" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan Nama Pasien" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal Lahir</label>
               <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Umur</label>
                <input type="number" name="umur" id="umur" class="form-control" placeholder="Otomatis Terhitung" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label">Golongan Darah</label>
                <select name="golongan_darah" class="form-select" required>
                    <option value="">-- Pilih Golongan Darah --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">No. HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
               <label class="form-label">Pendidikan</label>
                <select name="pendidikan" class="form-select" required>
                    <option value="">-- Pilih Pendidikan --</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="Diploma">Diploma</option>
                    <option value="S1">S1</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Agama</label>
                <select name="agama" class="form-select" required>
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Katolik">Kristen Katolik</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Budha">Budha</option>
                </select>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Suami</label>
                <input type="text" name="nama_suami" class="form-control" placeholder="Nama Suami" required>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="reset" class="btn btn-warning" onclick="resetFormPasien()">
                <i class="fas fa-undo"></i> Reset</button>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah</button>
            <a href="{{ route('bidan.inputPerkembangan') }}" class="btn" style="background-color:#f875aa; color:white;">
               Selanjutnya <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
    </form>

    <h5 class="fw-bold mb-3">Daftar Ibu Hamil</h5>
    <div class="table-responsive shadow mb-5">
        <table class="table table-bordered table-striped align-middle mb-0">
           <thead class="th-bumiloo">
                <tr>
                    <th>No Pasien</th>
                    <th>NIK</th>
                    <th>Nama Pasien</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl Lahir</th>
                    <th>Umur</th>
                    <th>Gol. Darah</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Pendidikan</th>
                    <th>Agama</th>
                    <th>Pekerjaan</th>
                    <th>Nama Suami</th>
                </tr>
            </thead>
            <tbody style="white-space: nowrap;">
                @foreach($pasien as $p)
                <tr onclick="isiForm({{ $p->id }})" style="cursor:pointer;">
                    <td>{{ $p->no_pasien }}</td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->nama_pasien }}</td>
                    <td>{{ $p->tempat_lahir }}</td>
                    <td>{{ $p->tanggal_lahir }}</td>
                    <td>{{ $p->umur }} Th</td>
                    <td class="text-center">{{ $p->golongan_darah }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->pendidikan }}</td>
                    <td>{{ $p->agama }}</td>
                    <td>{{ $p->pekerjaan }}</td>
                    <td>{{ $p->nama_suami }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
function isiForm(id) {
    fetch(`/pasien/${id}`)
        .then(res => res.json())
        .then(data => {
            document.querySelector('input[name="id"]').value = data.id || '';
            document.querySelector('input[name="no_pasien"]').value = data.no_pasien || '';
            document.querySelector('input[name="nik"]').value = data.nik || '';
            document.querySelector('input[name="nama_pasien"]').value = data.nama_pasien || '';
            document.querySelector('input[name="tempat_lahir"]').value = data.tempat_lahir || '';
            document.querySelector('input[name="tanggal_lahir"]').value = data.tanggal_lahir || '';
            document.querySelector('input[name="umur"]').value = data.umur || '';
            document.querySelector('select[name="golongan_darah"]').value = data.golongan_darah || '';
            document.querySelector('input[name="alamat"]').value = data.alamat || '';
            document.querySelector('input[name="no_hp"]').value = data.no_hp || '';
            document.querySelector('select[name="pendidikan"]').value = data.pendidikan || '';
            document.querySelector('select[name="agama"]').value = data.agama || '';
            document.querySelector('input[name="pekerjaan"]').value = data.pekerjaan || '';
            document.querySelector('input[name="nama_suami"]').value = data.nama_suami || '';
        });
}

function resetFormPasien() {
    document.getElementById('formPasien').reset();
    document.getElementById('id_pasien').value = '';
    // Kembalikan nomor otomatis bawaan Laravel setelah di-reset
    document.querySelector('input[name="no_pasien"]').value = "{{ $noPasienOtomatis }}";
}

function validasiFormBumil(event) {
    const form = document.getElementById('formPasien');
    if (!form.checkValidity()) {
        event.preventDefault(); 
        alert("Kolom tidak boleh kosong"); 
        return false; 
    } 
    return true; 
} 

// === FITUR HITUNG UMUR OTOMATIS ===
document.addEventListener('DOMContentLoaded', function() {
    const inputTanggalLahir = document.getElementById('tanggal_lahir');
    const inputUmur = document.getElementById('umur');

    function hitungUmurOtomatis() {
        const tanggalLahir = new Date(inputTanggalLahir.value);
        const hariIni = new Date();

        if (isNaN(tanggalLahir) || tanggalLahir.getFullYear() < 1900) {
            inputUmur.value = '';
            return;
        }

        let umur = hariIni.getFullYear() - tanggalLahir.getFullYear();
        const bulan = hariIni.getMonth() - tanggalLahir.getMonth();

        if (bulan < 0 || (bulan === 0 && hariIni.getDate() < tanggalLahir.getDate())) {
            umur--;
        }
        
        inputUmur.value = umur; 
    }

    inputTanggalLahir.addEventListener('change', hitungUmurOtomatis);
    inputTanggalLahir.addEventListener('input', hitungUmurOtomatis);
});
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