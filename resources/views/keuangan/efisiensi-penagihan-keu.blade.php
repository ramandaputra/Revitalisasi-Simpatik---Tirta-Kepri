@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Efisiensi Penagihan Keuangan')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Efisiensi Penagihan (Keuangan & DRD)</h2>
                <span class="text-muted">Perbandingan Efisiensi Berdasarkan Rupiah Rekening dan Jumlah Pelanggan DRD</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-gradient-01">
                    <i class="la la-dashboard"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Filter Wilayah -->
<div class="row mb-4">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-body p-3 d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center">
                    <label class="form-control-label mr-3 font-weight-bold mb-0">Pilih Wilayah Distribusi:</label>
                    <select id="wilayah-select" class="custom-select" style="width: 220px;">
                        <option value="all" selected>Semua Wilayah (All)</option>
                        <option value="tanjungpinang">Tanjungpinang</option>
                        <option value="kijang">Kijang</option>
                        <option value="tanjunguban">Tanjung Uban</option>
                    </select>
                </div>
                <div>
                    <button class="btn btn-primary" id="btn-tampil">
                        <i class="la la-filter"></i> Tampilkan Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 4 Widgets Comparison Row -->
<div class="row flex-row mb-4">
    <!-- Rekening Rupiah Data -->
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-money mr-2 text-primary"></i>Nilai Rekening (Rupiah)</h4>
            </div>
            <div class="widget-body d-flex flex-column my-auto text-center p-3">
                <div class="p-3 mb-3 rounded" style="background: rgba(255,255,255,0.03);">
                    <h5 class="text-muted text-uppercase mb-1" style="font-size: 12px;">Penerimaan Rekening Air</h5>
                    <h3 class="number text-info font-weight-bold mb-0" id="val-terima-rp">Rp 3.125.400.000</h3>
                </div>
                <div class="p-3 rounded" style="background: rgba(255,255,255,0.03);">
                    <h5 class="text-muted text-uppercase mb-1" style="font-size: 12px;">Rekening Air Ditagihkan (DRD)</h5>
                    <h3 class="number text-warning font-weight-bold mb-0" id="val-tagih-rp">Rp 3.420.000.000</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Rekening Percentage -->
    <div class="col-xl-2 col-md-6 mb-3">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-center">
                <h5 class="mb-0 text-center" style="font-size: 13px;">Efisiensi Rupiah</h5>
            </div>
            <div class="widget-body d-flex flex-column justify-content-center align-items-center p-3 text-center">
                <div class="p-3 rounded-circle border border-primary d-flex flex-column justify-content-center align-items-center" style="width: 110px; height: 110px; background: rgba(59, 130, 246, 0.08);">
                    <h2 class="font-weight-bold text-primary mb-0" style="font-size: 22px;">91.4%</h2>
                </div>
                <span class="badge badge-success mt-2">Sangat Baik</span>
            </div>
        </div>
    </div>

    <!-- Pelanggan Fisik Data -->
    <div class="col-xl-4 col-md-6 mb-3">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-users mr-2 text-info"></i>Jumlah Pelanggan (SR)</h4>
            </div>
            <div class="widget-body d-flex flex-column my-auto text-center p-3">
                <div class="p-3 mb-3 rounded" style="background: rgba(255,255,255,0.03);">
                    <h5 class="text-muted text-uppercase mb-1" style="font-size: 12px;">Pelanggan Membayar</h5>
                    <h3 class="number text-info font-weight-bold mb-0" id="val-terima-sr">34,180 SR</h3>
                </div>
                <div class="p-3 rounded" style="background: rgba(255,255,255,0.03);">
                    <h5 class="text-muted text-uppercase mb-1" style="font-size: 12px;">Total Pelanggan Terdaftar DRD</h5>
                    <h3 class="number text-warning font-weight-bold mb-0" id="val-tagih-sr">37,707 SR</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Pelanggan Percentage -->
    <div class="col-xl-2 col-md-6 mb-3">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-center">
                <h5 class="mb-0 text-center" style="font-size: 13px;">Efisiensi Pelanggan</h5>
            </div>
            <div class="widget-body d-flex flex-column justify-content-center align-items-center p-3 text-center">
                <div class="p-3 rounded-circle border border-info d-flex flex-column justify-content-center align-items-center" style="width: 110px; height: 110px; background: rgba(6, 182, 212, 0.08);">
                    <h2 class="font-weight-bold text-info mb-0" style="font-size: 22px;">90.6%</h2>
                </div>
                <span class="badge badge-success mt-2">Tercapai</span>
            </div>
        </div>
    </div>
</div>
@endsection

