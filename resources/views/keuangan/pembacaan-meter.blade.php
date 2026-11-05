@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Produktifitas Pembacaan Meter')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map-bacameter {
        height: 520px;
        width: 100%;
        border-radius: 6px;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Pembacaan Meter</h2>
                <span class="text-muted">Monitoring Produktifitas Petugas & Peta Sebaran Pembacaan Meter Air</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-gradient-01">
                    <i class="la la-dashboard"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Row 1: Produktifitas Petugas & Stat Cards -->
<div class="row flex-row mb-4">
    <div class="col-xl-9 col-lg-8 mb-4 mb-lg-0">
        <div class="widget widget-09 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-bar-chart mr-2 text-primary"></i>Produktifitas Pembacaan Meter per Petugas</h4>
                <span class="badge badge-primary">Periode Aktif</span>
            </div>
            <div class="widget-body">
                <div style="position: relative; height: 300px; width: 100%;">
                    <canvas id="bacaMeterChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center">
                <h4><i class="la la-pie-chart mr-2 text-info"></i>Ringkasan Progress</h4>
            </div>
            <div class="widget-body d-flex flex-column justify-content-around text-center p-3">
                <div class="p-3 mb-2 rounded" style="background: rgba(59, 130, 246, 0.08);">
                    <div class="text-muted font-weight-bold" style="font-size: 12px;">PROGRESS PEMBACAAN</div>
                    <h1 class="display-4 font-weight-bold text-gradient-01 mb-0">92.4%</h1>
                    <span class="badge badge-success mt-1">On Schedule</span>
                </div>
                <div class="p-3 mb-2 rounded" style="background: rgba(16, 185, 129, 0.08);">
                    <div class="text-muted font-weight-bold" style="font-size: 12px;">TOTAL SUDAH TERBACA</div>
                    <h2 class="font-weight-bold text-success mb-0">34,842</h2>
                    <span class="text-muted" style="font-size: 11px;">Sambungan Terverifikasi</span>
                </div>
                <div class="p-3 rounded" style="background: rgba(239, 68, 68, 0.08);">
                    <div class="text-muted font-weight-bold" style="font-size: 12px;">TOTAL MASALAH / TERTUTUP</div>
                    <h2 class="font-weight-bold text-danger mb-0">418</h2>
                    <span class="text-muted" style="font-size: 11px;">Rumah Kosong / Rusak</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Row 2: WebGIS Sebaran Pembacaan Meter -->
<div class="row flex-row">
    <div class="col-xl-12">
        <div class="widget widget-04 has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between flex-wrap p-3">
                <h4><i class="la la-map-marker mr-2 text-warning"></i>Peta Lokasi Pembacaan Meter (WebGIS GPS)</h4>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="mr-2">
                        <select id="select-petugas" class="custom-select custom-select-sm">
                            <option value="all">Semua Petugas (All)</option>
                            <option value="1">Petugas 01 - Tanjungpinang Kota</option>
                            <option value="2">Petugas 02 - Tanjungpinang Timur</option>
                            <option value="3">Petugas 03 - Bukit Bestari</option>
                            <option value="4">Petugas 04 - Tanjungpinang Barat</option>
                            <option value="5">Petugas 05 - Kijang & Bintan Timur</option>
                        </select>
                    </div>
                    <div class="input-group input-group-sm mr-2" style="width: 220px;">
                        <input type="text" id="search-nosamb" class="form-control" placeholder="Cari No. Sambungan...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="btn-search-nosamb">
                                <i class="la la-search"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-info btn-sm" id="btn-reload-map">
                        <i class="la la-refresh"></i> Reset Peta
                    </button>
                </div>
            </div>
            <div class="widget-body p-0">
                <div id="map-bacameter"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    $(document).ready(function() {
        function getThemeColors() {
            var isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            return {
                labelColor: isDark ? '#cbd5e1' : '#334155',
                tickColor: isDark ? '#94a3b8' : '#64748b',
                gridColor: isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)'
            };
        }

        var colors = getThemeColors();

        // Chart Produktifitas
        var ctx = document.getElementById('bacaMeterChart');
        var chartBaca = null;
        if (ctx) {
            chartBaca = new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Petugas 01', 'Petugas 02', 'Petugas 03', 'Petugas 04', 'Petugas 05', 'Petugas 06', 'Petugas 07', 'Petugas 08'],
                    datasets: [
                        {
                            label: 'Target Sambungan',
                            data: [4500, 4800, 4200, 5000, 4600, 4400, 4900, 4700],
                            backgroundColor: 'rgba(148, 163, 184, 0.4)',
                            borderColor: '#94a3b8',
                            borderWidth: 1
                        },
                        {
                            label: 'Realisasi Terbaca',
                            data: [4250, 4480, 3950, 4650, 4280, 4100, 4520, 4612],
                            backgroundColor: '#0284c7',
                            borderColor: '#0369a1',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { labels: { fontColor: colors.labelColor } },
                    scales: {
                        yAxes: [{
                            ticks: { fontColor: colors.tickColor },
                            gridLines: { color: colors.gridColor }
                        }],
                        xAxes: [{
                            ticks: { fontColor: colors.tickColor },
                            gridLines: { color: colors.gridColor }
                        }]
                    }
                }
            });

            window.addEventListener('simpatikThemeChanged', function() {
                var c = getThemeColors();
                chartBaca.options.legend.labels.fontColor = c.labelColor;
                chartBaca.options.scales.yAxes[0].ticks.fontColor = c.tickColor;
                chartBaca.options.scales.yAxes[0].gridLines.color = c.gridColor;
                chartBaca.options.scales.xAxes[0].ticks.fontColor = c.tickColor;
                chartBaca.options.scales.xAxes[0].gridLines.color = c.gridColor;
                chartBaca.update();
            });
        }

        // Initialize Leaflet Map
        var map = L.map('map-bacameter').setView([0.9167, 104.4667], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap SIMPATIK'
        }).addTo(map);

        // Fetch customer reading markers
        $.getJSON('/api/gis/markers', function(data) {
            if (data && data.customers) {
                var markers = L.layerGroup().addTo(map);
                data.customers.forEach(function(c) {
                    if (c.lat && c.lng) {
                        var marker = L.circleMarker([c.lat, c.lng], {
                            radius: 6,
                            fillColor: '#10b981',
                            color: '#ffffff',
                            weight: 1,
                            opacity: 1,
                            fillOpacity: 0.8
                        });
                        marker.bindPopup('<b>No. Sambung: ' + c.nosamb + '</b><br>Nama: ' + (c.nama || '-') + '<br>Alamat: ' + (c.alamat || '-') + '<br>Status: Terbaca');
                        markers.addLayer(marker);
                    }
                });
            }
        }).fail(function() {
            // Mock sample markers
            var mockPoints = [
                { lat: 0.9167, lng: 104.4667, nosamb: '0100234', nama: 'Haji Ahmad', status: 'Terbaca' },
                { lat: 0.9230, lng: 104.4550, nosamb: '0100582', nama: 'Siti Aminah', status: 'Terbaca' },
                { lat: 0.9110, lng: 104.4720, nosamb: '0200115', nama: 'Toko Sumber Air', status: 'Terbaca' },
                { lat: 0.9300, lng: 104.4810, nosamb: '0300449', nama: 'Klinik Sehat', status: 'Masalah' }
            ];
            mockPoints.forEach(function(p) {
                var color = p.status === 'Terbaca' ? '#10b981' : '#ef4444';
                var m = L.circleMarker([p.lat, p.lng], {
                    radius: 7,
                    fillColor: color,
                    color: '#fff',
                    weight: 2,
                    fillOpacity: 0.9
                }).addTo(map);
                m.bindPopup('<b>' + p.nosamb + '</b><br>' + p.nama + '<br>Status: ' + p.status);
            });
        });

        $('#btn-search-nosamb').click(function() {
            var q = $('#search-nosamb').val().trim();
            if (q) {
                $.getJSON('/gis/search?q=' + encodeURIComponent(q), function(res) {
                    if (res && res.length > 0) {
                        var c = res[0];
                        if (c.lat && c.lng) {
                            map.setView([c.lat, c.lng], 17);
                            L.popup()
                                .setLatLng([c.lat, c.lng])
                                .setContent('<b>No. Sambung: ' + c.nosamb + '</b><br>' + (c.nama || '') + '<br>' + (c.alamat || ''))
                                .openOn(map);
                        }
                    } else {
                        alert('Nomor Sambungan ' + q + ' tidak ditemukan!');
                    }
                });
            }
        });
    });
</script>
@endpush

