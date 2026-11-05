@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Monitoring Tunggakan & Pemutusan')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Monitoring Tunggakan & Surat Perintah Putus (SPP)</h2>
                <span class="text-muted">Pelanggan Menunggak &gt; 3 Bulan</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Daftar Pelanggan Menunggak</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No Sambungan</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Lama Tunggakan</th>
                                <th>Total Tagihan</th>
                                <th>Status SPP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>010452</td>
                                <td>H. Syamsul</td>
                                <td>Jl. WR Supratman No. 45</td>
                                <td><span class="badge badge-danger">4 Bulan</span></td>
                                <td>{{ format_rupiah(680000) }}</td>
                                <td><span class="badge badge-warning">Surat Peringatan 2 Terbit</span></td>
                            </tr>
                            <tr>
                                <td>010992</td>
                                <td>CV. Maju Bersama</td>
                                <td>Jl. DI Panjaitan Km. 8</td>
                                <td><span class="badge badge-danger">5 Bulan</span></td>
                                <td>{{ format_rupiah(2450000) }}</td>
                                <td><span class="badge badge-danger">Surat Perintah Putus</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

