@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - WebGIS Jaringan Distribusi')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map {
        height: 600px;
        width: 100%;
        border-radius: 4px;
        z-index: 1;
    }
    .gis-search-box {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        padding: 15px;
        border-radius: 8px;
        box-shadow: var(--card-shadow);
        margin-bottom: 20px;
    }
    .leaflet-popup-content-wrapper {
        background: #1e293b;
        color: #f1f5f9;
        border-radius: 8px;
    }
    .leaflet-popup-tip {
        background: #1e293b;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Sistem Informasi Geografis (WebGIS)</h2>
                <span class="text-muted">Pemetaan Jaringan Pipa Distribusi, DMA, Waduk & Pelanggan</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="la la-columns"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter Controls -->
<div class="row">
    <div class="col-12">
        <div class="gis-search-box">
            <div class="row align-items-center">
                <div class="col-md-4 mb-2 mb-md-0">
                    <label class="small text-muted d-block mb-1">Cari Pelanggan (No Sambungan / Nama):</label>
                    <div class="input-group">
                        <input type="text" id="nosamb-search" class="form-control" placeholder="Contoh: 0101001...">
                        <div class="input-group-append">
                            <button id="btn-search" class="btn btn-primary" type="button">
                                <i class="la la-search"></i> Cari
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-2 mb-md-0">
                    <label class="small text-muted d-block mb-1">Filter Zona Wilayah:</label>
                    <select id="zona-filter" class="custom-select form-control">
                        <option value="all">Semua Zona Wilayah</option>
                        @foreach ($zonas as $z)
                            <option value="{{ $z }}">Zona {{ $z }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 text-md-right mt-2 mt-md-0">
                    <button id="btn-reload-markers" class="btn btn-outline-info">
                        <i class="bi bi-crosshair2 mr-1"></i> Muat Ulang Titik
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Container -->
<div class="row">
    <div class="col-12">
        <div class="widget has-shadow p-0">
            <div id="map"></div>
        </div>
    </div>
</div>

<!-- Modal Detail Pelanggan -->
<div class="modal fade" id="modalCustomer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="la la-user mr-2 text-primary"></i>Informasi Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="customer-modal-body">
                Memuat data...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var map;
    var markersLayer = L.layerGroup();
    var searchMarker = null;

    // Default center Tanjungpinang & Bintan
    var defaultLat = 0.9167;
    var defaultLng = 104.4500;

    function initLeafletMap() {
        // Base layers
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        });

        var satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 19,
            attribution: 'Tiles &copy; Esri'
        });

        map = L.map('map', {
            center: [defaultLat, defaultLng],
            zoom: 13,
            layers: [osm]
        });

        var baseMaps = {
            "OpenStreetMap (Peta Jalan)": osm,
            "Citra Satelit": satellite
        };

        var overlayMaps = {
            "Titik Pelanggan & Sensor": markersLayer
        };

        L.control.layers(baseMaps, overlayMaps).addTo(map);
        markersLayer.addTo(map);

        loadMarkers('all');
    }

    function loadMarkers(zona) {
        markersLayer.clearLayers();
        $.ajax({
            url: '{{ route("api.markers") }}',
            data: { zona: zona },
            dataType: 'json',
            success: function(data) {
                if (Array.isArray(data)) {
                    data.forEach(function(item) {
                        if (item.latitude && item.longitude) {
                            var popupContent = '';
                            var fillColor = "#3b82f6";
                            var radius = 6;

                            if (item.is_sensor) {
                                fillColor = "#f59e0b"; // Orange for IoT Sensor
                                radius = 9;
                                popupContent = '<div style="min-width: 180px;">' +
                                    '<span class="badge badge-warning mb-1"><i class="la la-bolt"></i> Telemetri IoT</span>' +
                                    '<h6 class="font-weight-bold mb-1 text-warning">' + item.nama + '</h6>' +
                                    '<div class="small">Tekanan: <strong>' + (item.pressure || '0') + ' bar</strong></div>' +
                                    '<div class="small">Aliran (Flow): <strong>' + (item.flow || '0') + ' l/s</strong></div>' +
                                    (item.level ? '<div class="small">Level Air: <strong>' + item.level + ' m</strong></div>' : '') +
                                    (item.time ? '<div class="small text-muted mt-1">Waktu: ' + item.time + '</div>' : '') +
                                    '</div>';
                            } else {
                                popupContent = '<div>' +
                                    '<span class="badge badge-info mb-1"><i class="la la-user"></i> Pelanggan</span>' +
                                    '<h6 class="font-weight-bold mb-1 text-primary">' + (item.nama || 'Pelanggan') + '</h6>' +
                                    '<div class="small text-muted mb-1">No. Samb: ' + (item.nosamb || '-') + '</div>' +
                                    '<div class="small">' + (item.alamat || '') + '</div>' +
                                    (item.dma ? '<div class="small text-info mt-1">Zona DMA: ' + item.dma + '</div>' : '') +
                                    '</div>';
                            }

                            var marker = L.circleMarker([item.latitude, item.longitude], {
                                radius: radius,
                                fillColor: fillColor,
                                color: "#ffffff",
                                weight: 2,
                                opacity: 1,
                                fillOpacity: 0.85
                            }).bindPopup(popupContent);

                            markersLayer.addLayer(marker);
                        }
                    });
                }
            }
        });
    }

    // Search by nosamb
    function searchCustomer() {
        var nosamb = $('#nosamb-search').val().trim();
        if (!nosamb) {
            alert('Silakan masukkan nomor sambungan atau nama.');
            return;
        }

        $.ajax({
            url: '{{ route("gis.search") }}',
            data: { nosamb: nosamb },
            dataType: 'json',
            success: function(res) {
                if (res.status === 'success' && res.data) {
                    var p = res.data;
                    var html = '<table class="table table-sm table-bordered">' +
                        '<tr><th style="width:40%">No Sambungan</th><td><strong>' + p.nosamb + '</strong></td></tr>' +
                        '<tr><th>Nama</th><td>' + (p.nama || '-') + '</td></tr>' +
                        '<tr><th>No Rekening</th><td>' + (p.norekening || '-') + '</td></tr>' +
                        '<tr><th>Alamat</th><td>' + (p.alamat || '-') + '</td></tr>' +
                        '<tr><th>Zona / DMA</th><td>' + (p.kodezona || '-') + ' / ' + (p.kodedma || '-') + '</td></tr>' +
                        '<tr><th>Koordinat</th><td>' + (p.latitude || '-') + ', ' + (p.longitude || '-') + '</td></tr>' +
                        '</table>';

                    $('#customer-modal-body').html(html);
                    $('#modalCustomer').modal('show');

                    if (p.latitude && p.longitude) {
                        var lat = parseFloat(p.latitude);
                        var lng = parseFloat(p.longitude);
                        map.setView([lat, lng], 17);

                        if (searchMarker) {
                            map.removeLayer(searchMarker);
                        }

                        searchMarker = L.marker([lat, lng]).addTo(map)
                            .bindPopup('<strong>' + p.nama + '</strong><br>' + p.alamat)
                            .openPopup();
                    }
                }
            },
            error: function() {
                alert('Pelanggan dengan nomor / nama tersebut tidak ditemukan.');
            }
        });
    }

    $(document).ready(function() {
        initLeafletMap();

        $('#btn-search').click(searchCustomer);
        $('#nosamb-search').keypress(function(e) {
            if (e.which === 13) searchCustomer();
        });

        $('#zona-filter').change(function() {
            loadMarkers($(this).val());
        });

        $('#btn-reload-markers').click(function() {
            loadMarkers($('#zona-filter').val());
        });
    });
</script>
@endpush

