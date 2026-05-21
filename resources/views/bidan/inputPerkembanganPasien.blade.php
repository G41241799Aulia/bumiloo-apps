@extends('layouts.masterBidan')


@section('content')
<div class="container mt-4">
    <h3 class="fw-bold mb-4 text-pink">Input Perkembangan Pasien</h3>


    <!-- Form Perkembangan -->
    <form class="card shadow p-4 mb-4">
        <!-- Data Pemeriksaan -->
        <h5 class="fw-bold text-pink mb-3">Data Pemeriksaan</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Waktu Pemeriksaan</label>
                <input type="time" class="form-control">
            </div>
        </div>


        <!-- Data Kehamilan -->
        <h5 class="fw-bold text-pink mb-3">Data Kehamilan</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Usia Kehamilan</label>
                <input type="text" class="form-control" placeholder="Minggu / Hari">
            </div>
            <div class="col-md-4">
                <label class="form-label">HPHT</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">HPL</label>
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="mb-3">
        <div class="col-md-4">    
            <label class="form-label">Estimasi Persalinan</label>
            <input type="date" class="form-control">
        </div>
        </div>


        <!-- Hasil Pemeriksaan -->
        <h5 class="fw-bold text-pink mb-3">Hasil Pemeriksaan</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Berat Badan (kg)</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Tinggi Badan (cm)</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Tekanan Darah (mmHg)</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Taksiran Berat Janin (gram)</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Tinggi Fundus Uteri (cm)</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Denyut Jantung Janin (x/menit)</label>
                <input type="number" class="form-control">
            </div>
        </div>


        <!-- Keluhan -->
        <h5 class="fw-bold text-pink mb-3">Keluhan</h5>
        <textarea class="form-control mb-3" rows="3" placeholder="Tuliskan keluhan pasien"></textarea>


        <!-- Tindakan / Saran -->
        <h5 class="fw-bold text-pink mb-3">Tindakan / Saran Bidan</h5>
        <textarea class="form-control mb-3" rows="3" placeholder="Tuliskan saran atau tindakan"></textarea>


        <!-- Obat -->
        <h5 class="fw-bold text-pink mb-3">Obat yang Diberikan</h5>
        <textarea class="form-control mb-3" rows="2" placeholder="Tuliskan obat yang diberikan"></textarea>


        <!-- Catatan -->
        <h5 class="fw-bold text-pink mb-3">Catatan Tambahan</h5>
        <textarea class="form-control mb-3" rows="2" placeholder="Catatan tambahan"></textarea>


        <!-- Tombol Aksi -->
        <div class="text-end">
            <a href="{{ route('bidan.inputPerkembangan') }}" class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn text-white" style="background-color:#f875aa;">
                Simpan
            </button>


        </div>
    </form>
</div>
@endsection

