@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - DRD Posting')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Daftar Rekening Ditagihkan (DRD)</h2>
                <span class="text-muted">Sinkronisasi DRD Billing & Loket Pembayaran</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Rekapitulasi DRD per Wilayah</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Wilayah</th>
                                <th>Jumlah Lembar DRD</th>
                                <th>Total Pemakaian (m³)</th>
                                <th>Total Tagihan Rekening</th>
                                <th>Status Terbayar</th>
                                <th>Sisa Piutang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Tanjungpinang Kota</strong></td>
                                <td>15.420</td>
                                <td>245.100 m³</td>
                                <td>{{ format_rupiah(1450200000) }}</td>
                                <td><span class="badge badge-success">88.5%</span></td>
                                <td>{{ format_rupiah(166773000) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kijang</strong></td>
                                <td>6.850</td>
                                <td>98.450 m³</td>
                                <td>{{ format_rupiah(580120000) }}</td>
                                <td><span class="badge badge-success">85.2%</span></td>
                                <td>{{ format_rupiah(85857760) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanjung Uban</strong></td>
                                <td>8.375</td>
                                <td>120.300 m³</td>
                                <td>{{ format_rupiah(710400000) }}</td>
                                <td><span class="badge badge-success">87.1%</span></td>
                                <td>{{ format_rupiah(91641600) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

