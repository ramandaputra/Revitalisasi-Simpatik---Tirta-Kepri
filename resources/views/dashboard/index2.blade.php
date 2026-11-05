@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Dashboard Eksekutif & Telemetri')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #layer-control-index2 {
        height: 485px;
        width: 100%;
        border-radius: 6px;
    }
    .tma-item {
        border-bottom: 1px solid var(--border-color);
        padding: 12px 16px;
    }
    .tma-item:last-child {
        border-bottom: none;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Dashboard Eksekutif & SCADA Telemetri</h2>
                <span class="text-muted">Monitoring Realtime Pelanggan, Tinggi Muka Air (TMA) & Integrasi IoT Logger</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm mr-2">
                    <i class="bi bi-columns-gap mr-1"></i> Dashboard Utama
                </a>
                <a href="{{ route('gis.index') }}" class="btn btn-primary btn-sm">
                    <i class="la la-map-marker"></i> WebGIS Penuh
                </a>
            </div>
        </div>
    </div>
</div>

<!-- 3 Top Stats Cards -->
<div class="row flex-row mb-4">
    <!-- Pelanggan Aktif -->
    <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-4">
                        <i class="la la-users text-primary" style="font-size: 44px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Pelanggan Aktif</div>
                        <div class="number text-primary font-weight-bold" style="font-size: 26px;">37,707 SR</div>
                        <span class="text-success" style="font-size: 11px;"><i class="la la-arrow-up"></i> +506 Sambungan Baru</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Penjualan Air -->
    <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-4">
                        <i class="la la-tint text-primary" style="font-size: 44px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Volume Penjualan Air</div>
                        <div class="number text-info font-weight-bold" style="font-size: 26px;">1,284,520 m³</div>
                        <span class="text-muted" style="font-size: 11px;">Bulan Berjalan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Penagihan / Rekening -->
    <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-4">
                        <i class="la la-money text-primary" style="font-size: 44px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Realisasi Penagihan (DRD)</div>
                        <div class="number text-success font-weight-bold" style="font-size: 26px;">Rp 3.125 Miliar</div>
                        <span class="text-success" style="font-size: 11px;"><i class="la la-check"></i> Efisiensi 91.4%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WebGIS & TMA Section -->
<div class="row flex-row mb-4">
    <!-- WebGIS Leaflet Preview -->
    <div class="col-xl-8 col-md-12 mb-4 mb-xl-0">
        <div class="widget widget-04 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="la la-map-marker mr-2 text-primary"></i>Peta Jaringan & Sensor Telemetri IoT (kepri_iot)</h4>
                <a href="{{ route('gis.index') }}" class="btn btn-sm btn-outline-primary">Buka WebGIS</a>
            </div>
            <div class="widget-body p-0">
                <div id="layer-control-index2"></div>
            </div>
        </div>
    </div>

    <!-- TMA (Tinggi Muka Air) Waduk -->
    <div class="col-xl-4 col-md-12">
        <div class="widget widget-06 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="la la-water mr-2 text-primary"></i>Tinggi Muka Air (TMA) Waduk</h4>
                <span class="badge badge-success">Live SCADA</span>
            </div>
            <div class="widget-body p-0">
                <div class="tma-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-1" style="color: var(--text-heading);">Waduk Sei Pulai</h6>
                        <span class="text-muted" style="font-size: 11px;">Kapasitas Normal: 4.80 m</span>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold text-info" style="font-size: 20px;">4.52 m</span>
                        <div><span class="badge badge-success">Aman / Siaga 3</span></div>
                    </div>
                </div>

                <div class="tma-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-1" style="color: var(--text-heading);">Waduk Sei Gesek</h6>
                        <span class="text-muted" style="font-size: 11px;">Kapasitas Normal: 3.50 m</span>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold text-info" style="font-size: 20px;">3.18 m</span>
                        <div><span class="badge badge-success">Aman / Siaga 3</span></div>
                    </div>
                </div>

                <div class="tma-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-1" style="color: var(--text-heading);">Waduk Sei Jago</h6>
                        <span class="text-muted" style="font-size: 11px;">Kapasitas Normal: 5.20 m</span>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold text-warning" style="font-size: 20px;">3.95 m</span>
                        <div><span class="badge badge-warning">Waspada</span></div>
                    </div>
                </div>

                <div class="tma-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-1" style="color: var(--text-heading);">Kolong Enam (Kijang)</h6>
                        <span class="text-muted" style="font-size: 11px;">Kapasitas Normal: 4.00 m</span>
                    </div>
                    <div class="text-right">
                        <span class="font-weight-bold text-info" style="font-size: 20px;">3.72 m</span>
                        <div><span class="badge badge-success">Aman / Siaga 3</span></div>
                    </div>
                </div>

                <div class="p-3 text-center">
                    <span class="text-muted" style="font-size: 11px;">
                        <i class="la la-clock-o"></i> Diperbarui otomatis setiap 5 menit dari RTU Telemetri
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Telemetri Sensor IoT Graphs (kepri_iot) -->
<div class="row flex-row">
    <!-- Tekanan (Pressure) DMA -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="la la-tachometer mr-2 text-primary"></i>Monitoring Tekanan Jaringan (Pressure Logger)</h4>
                <span class="badge badge-warning">kepri_iot database</span>
            </div>
            <div class="widget-body">
                <div style="position: relative; height: 260px; width: 100%;">
                    <canvas id="chartTekanan"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Debit Aliran (Flow Logger) -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="la la-line-chart mr-2 text-primary"></i>Monitoring Debit Aliran (Flow Logger)</h4>
                <span class="badge badge-primary">kepri_iot database</span>
            </div>
            <div class="widget-body">
                <div style="position: relative; height: 260px; width: 100%;">
                    <canvas id="chartFlow"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    $(document).ready(function() {
        // Init Map
        var map2 = L.map('layer-control-index2').setView([0.9167, 104.4667], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap SIMPATIK'
        }).addTo(map2);

        // Fetch sensors from kepri_iot
        $.getJSON('/api/status-loger', function(sensors) {
            if (sensors && sensors.length > 0) {
                sensors.forEach(function(s) {
                    if (s.lat && s.lng) {
                        var m = L.circleMarker([s.lat, s.lng], {
                            radius: 8,
                            fillColor: '#3b82f6',
                            color: '#ffffff',
                            weight: 2,
                            opacity: 1,
                            fillOpacity: 0.9
                        }).addTo(map2);
                        m.bindPopup('<b>' + s.name + '</b><br>Tekanan: ' + (s.pressure || '-') + ' bar<br>Flow: ' + (s.flow || '-') + ' m3/h');
                    }
                });
            }
        });

        function getThemeColors() {
            var isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            return {
                labelColor: isDark ? '#cbd5e1' : '#334155',
                tickColor: isDark ? '#94a3b8' : '#64748b',
                gridColor: isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)'
            };
        }

        var colors = getThemeColors();

        // Chart Tekanan
        var ctxTekanan = document.getElementById('chartTekanan');
        var chartTekanan = null;
        if (ctxTekanan) {
            chartTekanan = new Chart(ctxTekanan.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
                    datasets: [
                        {
                            label: 'DMA 01 - Basuki Rahmat (Bar)',
                            data: [1.2, 1.4, 0.9, 0.8, 1.0, 0.9, 0.8, 1.1],
                            borderColor: '#f59e0b',
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'DMA 02 - Batu Hitam (Bar)',
                            data: [1.5, 1.6, 1.1, 1.0, 1.2, 1.0, 1.1, 1.3],
                            borderColor: '#10b981',
                            backgroundColor: 'transparent',
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { labels: { fontColor: colors.labelColor } },
                    scales: {
                        yAxes: [{
                            ticks: { fontColor: colors.tickColor, min: 0 },
                            gridLines: { color: colors.gridColor }
                        }],
                        xAxes: [{
                            ticks: { fontColor: colors.tickColor },
                            gridLines: { color: colors.gridColor }
                        }]
                    }
                }
            });
        }

        // Chart Flow
        var ctxFlow = document.getElementById('chartFlow');
        var chartFlow = null;
        if (ctxFlow) {
            chartFlow = new Chart(ctxFlow.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
                    datasets: [
                        {
                            label: 'Debit Sei Pulai (m³/h)',
                            data: [420, 380, 580, 620, 600, 590, 640, 510],
                            borderColor: '#0284c7',
                            backgroundColor: 'rgba(2, 132, 199, 0.1)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Debit Sei Gesek (m³/h)',
                            data: [210, 190, 290, 310, 305, 295, 320, 260],
                            borderColor: '#06b6d4',
                            backgroundColor: 'transparent',
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { labels: { fontColor: colors.labelColor } },
                    scales: {
                        yAxes: [{
                            ticks: { fontColor: colors.tickColor, min: 0 },
                            gridLines: { color: colors.gridColor }
                        }],
                        xAxes: [{
                            ticks: { fontColor: colors.tickColor },
                            gridLines: { color: colors.gridColor }
                        }]
                    }
                }
            });
        }

        window.addEventListener('simpatikThemeChanged', function() {
            var c = getThemeColors();
            if (chartTekanan) {
                chartTekanan.options.legend.labels.fontColor = c.labelColor;
                chartTekanan.options.scales.yAxes[0].ticks.fontColor = c.tickColor;
                chartTekanan.options.scales.yAxes[0].gridLines.color = c.gridColor;
                chartTekanan.options.scales.xAxes[0].ticks.fontColor = c.tickColor;
                chartTekanan.options.scales.xAxes[0].gridLines.color = c.gridColor;
                chartTekanan.update();
            }
            if (chartFlow) {
                chartFlow.options.legend.labels.fontColor = c.labelColor;
                chartFlow.options.scales.yAxes[0].ticks.fontColor = c.tickColor;
                chartFlow.options.scales.yAxes[0].gridLines.color = c.gridColor;
                chartFlow.options.scales.xAxes[0].ticks.fontColor = c.tickColor;
                chartFlow.options.scales.xAxes[0].gridLines.color = c.gridColor;
                chartFlow.update();
            }
        });
    });
</script>
@endpush

