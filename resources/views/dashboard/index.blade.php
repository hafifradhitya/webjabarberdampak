@extends('layouts.app')
@section('content_title', 'Dashboard')
@section('content')

    <div class="row mb-3">
        <x-dashboard-card type="bg-info" icon="fa fa-users" label="Total Users" value="{{ $totalUsers }}" />
        <x-dashboard-card type="bg-primary" icon="fa fa-calendar-check" label="Total Kegiatan" value="{{ $totalKegiatan }}" />
        <x-dashboard-card type="bg-success" icon="fa fa-newspaper" label="Total Artikel" value="{{ $totalArtikel }}" />
        <x-dashboard-card type="bg-warning" icon="fa fa-tasks" label="Total Proker" value="{{ $totalProker }}" />
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Statistik Status Kegiatan</h3>
                </div>
                <div class="card-body">
                    <canvas id="kegiatanChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Statistik Status Program Kerja</h3>
                </div>
                <div class="card-body">
                    <canvas id="prokerChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Data dari Controller
        const kegiatanData = @json($kegiatanStatus);
        const prokerData = @json($prokerStatus);

        // Chart Kegiatan (Pie)
        const ctxKegiatan = document.getElementById('kegiatanChart').getContext('2d');
        new Chart(ctxKegiatan, {
            type: 'pie',
            data: {
                labels: ['Akan Datang', 'Sedang Berlangsung', 'Selesai'],
                datasets: [{
                    data: [
                        kegiatanData.upcoming || 0,
                        kegiatanData.ongoing || 0,
                        kegiatanData.completed || 0
                    ],
                    backgroundColor: ['#17a2b8', '#ffc107', '#28a745']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        // Chart Proker (Bar)
        const ctxProker = document.getElementById('prokerChart').getContext('2d');
        new Chart(ctxProker, {
            type: 'bar',
            data: {
                labels: ['Perencanaan', 'Sedang Berjalan', 'Selesai', 'Dibatalkan'],
                datasets: [{
                    label: 'Jumlah Proker',
                    data: [
                        prokerData.planning || 0,
                        prokerData.ongoing || 0,
                        prokerData.completed || 0,
                        prokerData.cancelled || 0
                    ],
                    backgroundColor: ['#007bff', '#ffc107', '#28a745', '#dc3545']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });
    });
</script>
@endpush