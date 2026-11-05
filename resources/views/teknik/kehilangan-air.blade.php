@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Tingkat Kehilangan Air (NRW)')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Tingkat Kehilangan Air (NRW)</h2>
                <span class="text-muted">Analisis Distribusi, Penjualan & Persentase NRW</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Data Kehilangan Air JDU & Wilayah</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode</th>
                                <th>Sumber Waduk</th>
                                <th>Pipa / JDU</th>
                                <th>Target Distribusi</th>
                                <th>Pelanggan</th>
                                <th>Air Terjual (m³)</th>
                                <th>Air Hilang (m³)</th>
                                <th>Persentase NRW (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $row)
                                <tr>
                                    <td>{{ format_tanggal_id($row->waktu) }}</td>
                                    <td>{{ $row->waduk }}</td>
                                    <td><strong>{{ $row->jdu }}</strong></td>
                                    <td>{{ format_number_id($row->target) }}</td>
                                    <td>{{ format_number_id($row->pelanggan) }}</td>
                                    <td>{{ format_m3($row->penjualan) }}</td>
                                    <td>{{ format_m3($row->kehilangan) }}</td>
                                    <td>
                                        <span class="badge {{ $row->persentase <= 25 ? 'badge-success' : 'badge-danger' }}">
                                            {{ $row->persentase }}%
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">Belum ada data kehilangan air.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

