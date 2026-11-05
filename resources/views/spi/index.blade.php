@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Monitoring SPI')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Monitoring SPI (Satuan Pengawas Intern)</h2>
                <span class="text-muted">Pengawasan Internal, Kepatuhan Operasional, Penertiban Sambungan & Audit Piutang Air</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-gradient-01">
                    <i class="bi bi-columns-gap mr-1"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stat Cards -->
<div class="row flex-row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-3">
                        <i class="bi bi-file-earmark-bar-graph-fill text-primary" style="font-size: 36px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Audit Kepatuhan Unit</div>
                        <div class="number text-primary font-weight-bold">12 Objek Audit</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-3">
                        <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 36px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Temuan Penertiban</div>
                        <div class="number text-warning font-weight-bold">24 Kasus Ilegal</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-3">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 36px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Tindak Lanjut Selesai</div>
                        <div class="number text-success font-weight-bold">19 Kasus (79.2%)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-center mr-3">
                        <i class="bi bi-cash-coin text-info" style="font-size: 36px;"></i>
                    </div>
                    <div class="pelanggan-stats align-self-center">
                        <div class="title text-muted">Pemulihan Kerugian</div>
                        <div class="number text-info font-weight-bold">Rp 128.5 Jt</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table Temuan & Pengawasan SPI -->
<div class="row flex-row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="bi bi-clipboard-check mr-2 text-warning"></i>Agenda & Laporan Hasil Audit Internal (LHA)</h4>
                <a href="{{ route('keuangan.tunggakan-empat-bulan') }}" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-search mr-1"></i> Cek Tunggakan > 4 Bulan
                </a>
            </div>
            <div class="widget-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No. LHA</th>
                                <th>Bidang Pengawasan</th>
                                <th>Obyek / Lokasi Pemeriksaan</th>
                                <th>Uraian Temuan / Evaluasi</th>
                                <th>Rekomendasi Tindak Lanjut</th>
                                <th>Status TL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">LHA-SPI-2026-001</td>
                                <td>Operasional & Teknik</td>
                                <td>Waduk Sei Pulai & IPA Kolong Enam</td>
                                <td class="text-left">Pengecekan akurasi flowmeter induk dan logbook pencatatan jam operasi pompa</td>
                                <td class="text-left">Kalibrasi ulang sensor flow elektromagnetik dan digitalisasi IoT telemetri</td>
                                <td><span class="badge badge-success">Selesai Ditindaklanjuti</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">LHA-SPI-2026-002</td>
                                <td>Keuangan & DRD</td>
                                <td>Bagian Hublang & Rekening Air</td>
                                <td class="text-left">Uji petik selisih posting DRD vs realisasi penagihan loket bank & PPOB</td>
                                <td class="text-left">Rekonsiliasi harian otomatis via API Payment Gateway</td>
                                <td><span class="badge badge-success">Selesai Ditindaklanjuti</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">LHA-SPI-2026-003</td>
                                <td>Penertiban Sambungan</td>
                                <td>Wilayah Tanjungpinang Barat & Kota</td>
                                <td class="text-left">Ditemukan indikasi sambungan langsung tanpa meter (ilegal connection)</td>
                                <td class="text-left">Pemasangan meter resmi, penetapan denda, dan penerbitan SPK SPKA</td>
                                <td><span class="badge badge-warning">Proses Pelunasan Denda</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">LHA-SPI-2026-004</td>
                                <td>Logistik & Perawatan</td>
                                <td>Gudang Water Meter & Perpipaan</td>
                                <td class="text-left">Audit persediaan fisik meter air baru dan tera meter berusia > 5 tahun</td>
                                <td class="text-left">Percepatan program peremajaan 20% meter tua per tahun</td>
                                <td><span class="badge badge-info">Dalam Monitoring</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

