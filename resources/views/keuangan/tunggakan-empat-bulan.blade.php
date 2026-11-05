@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Tunggakan Diatas 4 Bulan (SPI)')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map-tunggakan {
        height: 480px;
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
                <h2 class="page-header-title">Tunggakan Diatas 4 Bulan</h2>
                <span class="text-muted">Monitoring Rekening Menunggak > 4 Bulan & Tindak Lanjut Penertiban SPI</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-gradient-01">
                    <i class="bi bi-columns-gap mr-1"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Summary Widgets -->
<div class="row flex-row mb-4">
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-4">
                        <i class="bi bi-graph-down-arrow text-danger" style="font-size: 42px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Total Pelanggan Menunggak > 4 Bulan</div>
                        <div class="number text-danger font-weight-bold" style="font-size: 28px;">348 Sambungan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-4">
                        <i class="bi bi-cash-stack text-warning" style="font-size: 42px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Total Nilai Piutang Air Tertunggak</div>
                        <div class="number text-warning font-weight-bold" style="font-size: 28px;">Rp 412.850.000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-4">
                        <i class="bi bi-scissors text-info" style="font-size: 42px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Surat Perintah Pemutusan Terbit</div>
                        <div class="number text-info font-weight-bold" style="font-size: 28px;">84 Perintah Kerja</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WebGIS Peta Sebaran Tunggakan -->
<div class="row flex-row mb-4">
    <div class="col-xl-12">
        <div class="widget widget-04 has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between flex-wrap p-3">
                <h4><i class="bi bi-geo-alt-fill mr-2 text-danger"></i>Peta Sebaran Pelanggan Menunggak (WebGIS)</h4>
                <div class="d-flex align-items-center">
                    <input type="text" id="search-tunggakan" class="form-control form-control-sm mr-2" placeholder="Cari No. Sambungan..." style="width: 220px;">
                    <button class="btn btn-primary btn-sm" id="btn-search-tunggakan">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </div>
            <div class="widget-body p-0">
                <div id="map-tunggakan"></div>
            </div>
        </div>
    </div>
</div>

<!-- Table Daftar Pelanggan Menunggak -->
<div class="row flex-row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="bi bi-file-earmark-text mr-2 text-primary"></i>Daftar Sambungan Pelanggan Menunggak > 4 Bulan</h4>
                <span class="badge badge-danger">Prioritas Penagihan & Pemutusan</span>
            </div>
            <div class="widget-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No. Sambung</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat Lengkap</th>
                                <th>Golongan</th>
                                <th>Bulan Tunggakan</th>
                                <th>Total Tagihan + Denda</th>
                                <th>Status Rekomendasi SPI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">0100872</td>
                                <td>PT. Bintan Maju Sejahtera</td>
                                <td>Jl. Rawasari No. 18, Tanjungpinang</td>
                                <td><span class="badge badge-info">Niaga Besar</span></td>
                                <td><span class="badge badge-danger">7 Bulan</span></td>
                                <td class="text-right font-weight-bold text-danger">Rp 14.280.000</td>
                                <td><span class="badge badge-danger">Segel / Putus Fisik</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">0200441</td>
                                <td>Bpk. Ridwan Syah</td>
                                <td>Jl. Sei Jang No. 42</td>
                                <td><span class="badge badge-secondary">Rumah Tangga B</span></td>
                                <td><span class="badge badge-warning">5 Bulan</span></td>
                                <td class="text-right font-weight-bold text-warning">Rp 1.845.000</td>
                                <td><span class="badge badge-warning">Surat Peringatan 2 (SP-2)</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">0100918</td>
                                <td>Ruko Jaya Abadi</td>
                                <td>Jl. Merdeka No. 89</td>
                                <td><span class="badge badge-primary">Niaga Kecil</span></td>
                                <td><span class="badge badge-danger">6 Bulan</span></td>
                                <td class="text-right font-weight-bold text-danger">Rp 4.350.000</td>
                                <td><span class="badge badge-danger">Tutup Sementara</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">0300215</td>
                                <td>Bpk. Zulfikar</td>
                                <td>Kp. Kolam Kijang</td>
                                <td><span class="badge badge-secondary">Rumah Tangga A</span></td>
                                <td><span class="badge badge-warning">5 Bulan</span></td>
                                <td class="text-right font-weight-bold text-warning">Rp 980.000</td>
                                <td><span class="badge badge-info">Konfirmasi Lapangan</span></td>
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
        var mapT = L.map('map-tunggakan').setView([0.9167, 104.4667], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap SIMPATIK'
        }).addTo(mapT);

        var sampleTunggakan = [
            { lat: 0.9180, lng: 104.4690, nosamb: '0100872', nama: 'PT. Bintan Maju', tunggakan: '7 Bulan', tagihan: 'Rp 14.280.000' },
            { lat: 0.9250, lng: 104.4530, nosamb: '0200441', nama: 'Bpk. Ridwan Syah', tunggakan: '5 Bulan', tagihan: 'Rp 1.845.000' },
            { lat: 0.9130, lng: 104.4740, nosamb: '0100918', nama: 'Ruko Jaya Abadi', tunggakan: '6 Bulan', tagihan: 'Rp 4.350.000' }
        ];

        sampleTunggakan.forEach(function(item) {
            var marker = L.circleMarker([item.lat, item.lng], {
                radius: 8,
                fillColor: '#ef4444',
                color: '#ffffff',
                weight: 2,
                opacity: 1,
                fillOpacity: 0.9
            }).addTo(mapT);

            marker.bindPopup('<b>No. Samb: ' + item.nosamb + '</b><br>Nama: ' + item.nama + '<br>Tunggakan: ' + item.tunggakan + '<br><b>Tagihan: ' + item.tagihan + '</b>');
        });
    });
</script>
@endpush

