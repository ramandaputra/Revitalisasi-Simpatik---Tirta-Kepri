@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Perbaikan Rekening')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Perbaikan Rekening Air</h2>
                <span class="text-muted">Koreksi & Verifikasi Tagihan Pelanggan</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Daftar Pengajuan & Koreksi Rekening</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No Sambungan</th>
                                <th>Nama Pelanggan</th>
                                <th>Stand Lama</th>
                                <th>Stand Baru (Koreksi)</th>
                                <th>Alasan Perbaikan</th>
                                <th>Status Persetujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>010245</td>
                                <td>Budi Santoso</td>
                                <td>1.450 m³</td>
                                <td>1.120 m³</td>
                                <td>Salah input angka meter saat pembacaan meter mandiri</td>
                                <td><span class="badge badge-success">Disetujui</span></td>
                            </tr>
                            <tr>
                                <td>010892</td>
                                <td>Ahmad Yani</td>
                                <td>890 m³</td>
                                <td>750 m³</td>
                                <td>Meter macet dan penggantian meter baru</td>
                                <td><span class="badge badge-success">Disetujui</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

