@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Pengaduan Pelanggan')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Pengaduan Pelanggan</h2>
                <span class="text-muted">Monitoring Tiket Pengaduan, Keluhan Pelayanan, dan Status Penyelesaian</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-gradient-01">
                    <i class="la la-dashboard"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Filter Row -->
<div class="row flex-row mb-4">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between flex-wrap p-3">
                <h4><i class="la la-filter mr-2 text-primary"></i>Filter Rekapitulasi Pengaduan</h4>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="mr-2">
                        <label class="form-control-label mr-2 d-inline-block font-weight-bold" style="font-size: 12px;">Periode:</label>
                        <input type="month" id="filter-periode" class="form-control form-control-sm d-inline-block" style="width: 160px;" value="{{ date('Y-m') }}">
                    </div>
                    <div class="mr-2">
                        <label class="form-control-label mr-2 d-inline-block font-weight-bold" style="font-size: 12px;">Wilayah:</label>
                        <select id="filter-wilayah" class="custom-select custom-select-sm d-inline-block" style="width: 170px;">
                            <option value="all">Semua Wilayah</option>
                            <option value="tanjungpinang">Tanjungpinang</option>
                            <option value="kijang">Kijang</option>
                            <option value="tanjunguban">Tanjung Uban</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" id="btn-filter-aduan">
                        <i class="la la-search"></i> Tampilkan
                    </button>
                </div>
            </div>
            <div class="widget-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2" class="align-middle text-left" style="width: 320px;">Jenis Keluhan / Pengaduan</th>
                                <th colspan="3">Status Penanganan Tiket</th>
                                <th rowspan="2" class="align-middle" style="width: 160px;">Persentase Selesai</th>
                            </tr>
                            <tr>
                                <th class="text-success"><i class="la la-check mr-1"></i>Sudah Selesai</th>
                                <th class="text-danger"><i class="la la-clock-o mr-1"></i>Belum Selesai</th>
                                <th class="text-info"><i class="la la-list-alt mr-1"></i>Total Aduan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left font-weight-bold"><i class="la la-tint text-primary mr-2"></i>Air Mati / Tidak Mengalir</td>
                                <td class="text-success font-weight-bold">48</td>
                                <td class="text-danger font-weight-bold">3</td>
                                <td class="text-info font-weight-bold">51</td>
                                <td><span class="badge badge-success px-2 py-1">94.1%</span></td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold"><i class="la la-tint text-info mr-2"></i>Air Tidak Lancar / Tekanan Rendah</td>
                                <td class="text-success font-weight-bold">36</td>
                                <td class="text-danger font-weight-bold">2</td>
                                <td class="text-info font-weight-bold">38</td>
                                <td><span class="badge badge-success px-2 py-1">94.7%</span></td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold"><i class="la la-filter text-warning mr-2"></i>Kualitas Air (Keruh / Berbau)</td>
                                <td class="text-success font-weight-bold">18</td>
                                <td class="text-danger font-weight-bold">1</td>
                                <td class="text-info font-weight-bold">19</td>
                                <td><span class="badge badge-success px-2 py-1">94.7%</span></td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold"><i class="la la-wrench text-danger mr-2"></i>Kebocoran Pipa Distribusi / Dinas</td>
                                <td class="text-success font-weight-bold">28</td>
                                <td class="text-danger font-weight-bold">4</td>
                                <td class="text-info font-weight-bold">32</td>
                                <td><span class="badge badge-warning px-2 py-1">87.5%</span></td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold"><i class="la la-tachometer text-secondary mr-2"></i>Akurasi / Kerusakan Meter Air</td>
                                <td class="text-success font-weight-bold">22</td>
                                <td class="text-danger font-weight-bold">1</td>
                                <td class="text-info font-weight-bold">23</td>
                                <td><span class="badge badge-success px-2 py-1">95.7%</span></td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold"><i class="la la-file-text-o text-muted mr-2"></i>Lonjakan Rekening Air</td>
                                <td class="text-success font-weight-bold">15</td>
                                <td class="text-danger font-weight-bold">0</td>
                                <td class="text-info font-weight-bold">15</td>
                                <td><span class="badge badge-success px-2 py-1">100.0%</span></td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold"><i class="la la-question-circle text-muted mr-2"></i>Lain-lain / Permohonan Balik Nama</td>
                                <td class="text-success font-weight-bold">12</td>
                                <td class="text-danger font-weight-bold">0</td>
                                <td class="text-info font-weight-bold">12</td>
                                <td><span class="badge badge-success px-2 py-1">100.0%</span></td>
                            </tr>
                        </tbody>
                        <tfoot class="thead-dark font-weight-bold">
                            <tr>
                                <td class="text-left">TOTAL PENGADUAN KESELURUHAN</td>
                                <td class="text-success" style="font-size: 16px;">179</td>
                                <td class="text-danger" style="font-size: 16px;">11</td>
                                <td class="text-info" style="font-size: 16px;">190</td>
                                <td class="text-success" style="font-size: 16px;">94.2% (Baik)</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search Aduan per Jenis -->
<div class="row flex-row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between p-3">
                <h4><i class="la la-search mr-2 text-warning"></i>Pencarian Detail Tiket Aduan</h4>
            </div>
            <div class="widget-body">
                <div class="row mb-3">
                    <div class="col-md-5 mb-2">
                        <label class="form-control-label font-weight-bold">Kategori Aduan:</label>
                        <select id="cari-jenis-aduan" class="custom-select form-control">
                            <option value="all">Semua Kategori Aduan</option>
                            <option value="JNS-68">AIR MATI</option>
                            <option value="JNS-67">AIR TIDAK LANCAR</option>
                            <option value="JNS-138">AIR TIDAK MENGALIR</option>
                            <option value="JNS-19">AKURASI METER</option>
                            <option value="JNS-10">BALIK NAMA</option>
                            <option value="JNS-23">GANTI WM</option>
                            <option value="JNS-74">KEBOCORAN PIPA</option>
                            <option value="JNS-105">KUALITAS AIR</option>
                            <option value="JNS-141">METER RUSAK</option>
                            <option value="JNS-25">LAIN-LAIN</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-2">
                        <label class="form-control-label font-weight-bold">Kata Kunci (No. Tiket / No. Sambung / Pelanggan):</label>
                        <input type="text" id="cari-keyword" class="form-control" placeholder="Contoh: 010045 atau Bpk. Hasan...">
                    </div>
                    <div class="col-md-2 d-flex align-items-end mb-2">
                        <button type="button" class="btn btn-gradient-01 btn-block" id="btn-cari-tiket">
                            <i class="la la-search"></i> Cari Tiket
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No. Tiket</th>
                                <th>Waktu Lapor</th>
                                <th>No. Sambung</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Jenis Aduan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">TKT-2026-0891</td>
                                <td>{{ date('d-m-Y H:i') }}</td>
                                <td>0100452</td>
                                <td>Bpk. Hendra Gunawan</td>
                                <td>Jl. Merdeka No. 14, Tanjungpinang</td>
                                <td><span class="badge badge-danger">Kebocoran Pipa</span></td>
                                <td><span class="badge badge-warning">Dalam Penanganan SPKA</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">TKT-2026-0890</td>
                                <td>{{ date('d-m-Y H:i', strtotime('-2 hours')) }}</td>
                                <td>0200881</td>
                                <td>Ibu Ratna Dewi</td>
                                <td>Jl. DI Panjaitan Km 7</td>
                                <td><span class="badge badge-info">Tekanan Rendah</span></td>
                                <td><span class="badge badge-success">Selesai Normal</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">TKT-2026-0889</td>
                                <td>{{ date('d-m-Y H:i', strtotime('-5 hours')) }}</td>
                                <td>0100239</td>
                                <td>Bpk. Suryanto</td>
                                <td>Komplek Bintan Permai Blok C</td>
                                <td><span class="badge badge-warning">Akurasi Meter</span></td>
                                <td><span class="badge badge-success">Kalibrasi Selesai</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

