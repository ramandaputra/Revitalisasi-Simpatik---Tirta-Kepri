@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Pemutusan Tunggakan Air')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map-pemutusan {
        height: 450px;
        width: 100%;
        border-radius: 6px;
    }
    .carousel-thumb {
        height: 220px;
        object-fit: cover;
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
                <h2 class="page-header-title">Pemutusan Sambungan Tunggakan</h2>
                <span class="text-muted">Dokumentasi Eksekusi Pemutusan Sambungan Air, Bukti Lapangan & Koordinat GPS</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-gradient-01">
                    <i class="bi bi-columns-gap mr-1"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Photo Carousel & GPS Map Row -->
<div class="row flex-row mb-4">
    <!-- Carousel Dokumentasi Lapangan -->
    <div class="col-xl-5 col-md-12 mb-4 mb-xl-0">
        <div class="widget has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="bi bi-camera-fill mr-2 text-primary"></i>Dokumentasi Pemutusan Lapangan</h4>
                <span class="badge badge-info">Foto Petugas</span>
            </div>
            <div class="widget-body p-3">
                <div id="carouselPemutusan" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/img/disconnection-1.jpg') }}" onerror="this.src='{{ asset('assets/img/avatar/avatar-01.jpg') }}'" class="d-block w-100 carousel-thumb" alt="Foto Segel">
                            <div class="carousel-caption d-none d-md-block bg-dark p-2 rounded" style="opacity: 0.85;">
                                <h6>No. Sambung 0100872 - Segel Stop Kran</h6>
                                <p class="mb-0" style="font-size: 11px;">Jl. Rawasari Tanjungpinang</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/disconnection-2.jpg') }}" onerror="this.src='{{ asset('assets/img/avatar/avatar-02.jpg') }}'" class="d-block w-100 carousel-thumb" alt="Foto Bongkar">
                            <div class="carousel-caption d-none d-md-block bg-dark p-2 rounded" style="opacity: 0.85;">
                                <h6>No. Sambung 0200441 - Tutup Sementara</h6>
                                <p class="mb-0" style="font-size: 11px;">Jl. Sei Jang No. 42</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselPemutusan" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselPemutusan" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- WebGIS Peta Lokasi Eksekusi -->
    <div class="col-xl-7 col-md-12">
        <div class="widget widget-04 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="bi bi-geo-alt-fill mr-2 text-danger"></i>Peta Lokasi Eksekusi Pemutusan</h4>
                <span class="badge badge-danger">Live GPS</span>
            </div>
            <div class="widget-body p-0">
                <div id="map-pemutusan"></div>
            </div>
        </div>
    </div>
</div>

<!-- Table Log Eksekusi Pemutusan -->
<div class="row flex-row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="bi bi-card-checklist mr-2 text-warning"></i>Daftar Realisasi Pemutusan Sambungan Pelanggan</h4>
                <span class="badge badge-secondary">Tahun 2026</span>
            </div>
            <div class="widget-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No. SPK</th>
                                <th>Tanggal Eksekusi</th>
                                <th>No. Sambung</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Petugas Lapangan</th>
                                <th>Tindakan Dilakukan</th>
                                <th>Status Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">SPK-CUT-012</td>
                                <td>{{ date('d-m-Y', strtotime('-1 day')) }}</td>
                                <td>0100872</td>
                                <td>PT. Bintan Maju Sejahtera</td>
                                <td>Jl. Rawasari No. 18</td>
                                <td>Tim SPI-01</td>
                                <td><span class="badge badge-danger">Segel Meter & Kunci Kran</span></td>
                                <td><span class="badge badge-warning">Menunggu Pelunasan</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">SPK-CUT-011</td>
                                <td>{{ date('d-m-Y', strtotime('-3 days')) }}</td>
                                <td>0200441</td>
                                <td>Bpk. Ridwan Syah</td>
                                <td>Jl. Sei Jang No. 42</td>
                                <td>Tim SPI-02</td>
                                <td><span class="badge badge-warning">Tutup Sementara</span></td>
                                <td><span class="badge badge-success">Sudah Lunas (Buka Kembali)</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">SPK-CUT-010</td>
                                <td>{{ date('d-m-Y', strtotime('-5 days')) }}</td>
                                <td>0100918</td>
                                <td>Ruko Jaya Abadi</td>
                                <td>Jl. Merdeka No. 89</td>
                                <td>Tim SPI-01</td>
                                <td><span class="badge badge-danger">Bongkar Water Meter</span></td>
                                <td><span class="badge badge-danger">Putus Total</span></td>
                            </tr>
                        </tbody>
                    </table>
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
        var mapP = L.map('map-pemutusan').setView([0.9167, 104.4667], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap SIMPATIK'
        }).addTo(mapP);

        var cutMarkers = [
            { lat: 0.9180, lng: 104.4690, nosamb: '0100872', nama: 'PT. Bintan Maju', status: 'Segel Meter' },
            { lat: 0.9250, lng: 104.4530, nosamb: '0200441', nama: 'Bpk. Ridwan Syah', status: 'Tutup Sementara' },
            { lat: 0.9130, lng: 104.4740, nosamb: '0100918', nama: 'Ruko Jaya Abadi', status: 'Bongkar Meter' }
        ];

        cutMarkers.forEach(function(m) {
            var marker = L.circleMarker([m.lat, m.lng], {
                radius: 7,
                fillColor: '#dc2626',
                color: '#ffffff',
                weight: 2,
                opacity: 1,
                fillOpacity: 0.9
            }).addTo(mapP);

            marker.bindPopup('<b>No. Sambung: ' + m.nosamb + '</b><br>' + m.nama + '<br>Tindakan: ' + m.status);
        });
    });
</script>
@endpush

