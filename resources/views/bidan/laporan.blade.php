@extends('layouts.masterBidan')


@section('content')
<div class="container mt-4">
    <h3 class="fw-bold mb-4 text-pink">Laporan Bidan</h3>
    <p class="text-muted">Ringkasan laporan kunjungan dan kehamilan</p>


    <!-- Stat Cards -->
     <!-- Stat Cards -->
<div class="row mb-4">
    <!-- Laporan Kunjungan (Hijau) -->
    <div class="col-md-4">
        <div class="card shadow-sm p-4 border-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fw-bold text-success">Laporan Kunjungan</h6>
                <div class="p-2 bg-success bg-opacity-10 rounded-4 text-success">
                    <i class="fas fa-calendar fa-lg"></i>
                </div>
            </div>
            <p class="text-muted mb-1">Jumlah kunjungan ibu hamil</p>
            <h2 class="fw-bold text-success">120</h2>
            <small class="text-muted">Kunjungan bulan ini</small>
            <div class="mt-3">
                <a href="{{ route('bidan.laporanBidan') }}" class="btn btn-sm btn-success">
                    Selanjutnya »
                </a>
            </div>
        </div>
    </div>


    <!-- Laporan Perkembangan (Biru) -->
    <div class="col-md-4">
        <div class="card shadow-sm p-4 border-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fw-bold text-primary">Laporan Perkembangan</h6>
                <div class="p-2 bg-primary bg-opacity-10 rounded-4 text-primary">
                    <i class="fas fa-chart-line fa-lg"></i>
                </div>
            </div>
            <p class="text-muted mb-1">Perkembangan ibu & janin</p>
            <h2 class="fw-bold text-primary">85</h2>
            <small class="text-muted">Data tercatat</small>
            <div class="mt-3">
                <a href="{{ route('bidan.laporanBidan') }}" class="btn btn-sm btn-primary">
                    Selanjutnya »
                </a>
            </div>
        </div>
    </div>


    <!-- Laporan Kelainan (Merah) -->
    <div class="col-md-4">
        <div class="card shadow-sm p-4 border-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fw-bold text-danger">Kelainan Kehamilan</h6>
                <div class="p-2 bg-danger bg-opacity-10 rounded-4 text-danger">
                    <i class="fas fa-exclamation-triangle fa-lg"></i>
                </div>
            </div>
            <p class="text-muted mb-1">Data risiko & kelainan kehamilan</p>
            <h2 class="fw-bold text-danger">12</h2>
            <small class="text-muted">Kasus terdeteksi</small>
            <div class="mt-3">
                <a href="{{ route('bidan.laporanBidan') }}" class="btn btn-sm btn-danger">
                    Selanjutnya »
                </a>
            </div>
        </div>
    </div>
</div>


    <!-- Grafik dalam Card Putih -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold text-dark mb-0">Jumlah Kunjungan Per Bulan</h6>
                    <i class="fas fa-chart-line text-dark"></i>
                </div>
                <div style="height:250px;"><canvas id="kunjunganChart"></canvas></div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold text-dark mb-0">Jumlah Pasien per Trimester</h6>
                    <i class="fas fa-chart-pie text-dark"></i>
                </div>
                <div style="height:250px;"><canvas id="trimesterChart"></canvas></div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold text-dark mb-0">Kelainan Kehamilan per Bulan</h6>
                    <i class="fas fa-heartbeat text-dark"></i>
                </div>
                <div style="height:250px;"><canvas id="kelainanChart"></canvas></div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold text-dark mb-0">Jumlah Persalinan Per Bulan</h6>
                    <i class="fas fa-baby-carriage text-dark"></i>
                </div>
                <div style="height:250px;"><canvas id="persalinanChart"></canvas></div>
            </div>
        </div>
    </div>
    <!-- Tombol Pratinjau Laporan -->
<!-- Tombol Pratinjau Laporan -->
<div class="d-flex justify-content-end mt-4">
    <a class="btn text-white rounded-4 px-4 py-2"
       style="background-color:#f875aa;">
        <i class="fas fa-eye me-2"></i> Pratinjau Laporan
    </a>
</div>
</div>
@endsection


@section('scripts')
<script>
    // Grafik Kunjungan Per Bulan
    new Chart(document.getElementById('kunjunganChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: [10,15,20,18,25,30,28,35,40,38,45,50],
                borderColor: '#f875aa',
                backgroundColor: 'rgba(248,117,170,0.2)',
                fill: true
            }]
        }
    });


    // Grafik Pasien per Trimester
    new Chart(document.getElementById('trimesterChart'), {
        type: 'pie',
        data: {
            labels: ['Trimester 1','Trimester 2','Trimester 3'],
            datasets: [{
                data: [13,20,10],
                backgroundColor: ['#9333EA','#3B82F6','#FFD700'],
                borderColor: '#fff'
            }]
        },
        options: {
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    color: '#333',
                    font: { size: 14 }
                }
            }
        }
    }
    });


    // Grafik Kelainan per Trimester
    new Chart(document.getElementById('kelainanChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
            datasets: [{
                label: 'Kelainan',
                data: [2,1,3,2,4,0],
                borderColor: '#3B82F6',
                fill: true,
                pointBackgroundColor: '#3B82F6'
            }]
        }
    });


    // Grafik Persalinan Per Bulan
    new Chart(document.getElementById('persalinanChart'), {
        type: 'bar',
        data: {
            labels: ['Trimester 1','Trimester 2','Trimester 3'],
            datasets: [{
                label: 'Jumlah Persalinan',
                data: [0,1,12],
                backgroundColor: '#cb51cd',
                borderColor: '#fff',
                borderWidth: 1
            }]
        }
    });
</script>
@endsection