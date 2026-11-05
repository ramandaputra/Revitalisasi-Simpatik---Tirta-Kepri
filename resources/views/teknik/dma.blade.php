@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Monitoring DMA')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Monitoring District Meter Area (DMA)</h2>
                <span class="text-muted">Pemantauan Aliran, Distribusi, Pemakaian & NRW per Zona DMA</span>
            </div>
            <div>
                <a href="{{ route('teknik.dma.input') }}" class="btn btn-gradient-01">
                    <i class="la la-plus"></i> Input DMA
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Data Monitoring Evaluasi DMA</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode</th>
                                <th>Nama DMA</th>
                                <th>Stand Lalu</th>
                                <th>Stand Kini</th>
                                <th>Distribusi (m³)</th>
                                <th>Jumlah Pelanggan</th>
                                <th>Pemakaian (m³)</th>
                                <th>Kehilangan (m³)</th>
                                <th>Tingkat NRW (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nrwDmas as $row)
                                <tr>
                                    <td>{{ format_tanggal_id($row->periode) }}</td>
                                    <td><strong>{{ $row->dma }}</strong></td>
                                    <td>{{ format_number_id($row->lalu) }}</td>
                                    <td>{{ format_number_id($row->kini) }}</td>
                                    <td>{{ format_number_id($row->distribusi) }}</td>
                                    <td>{{ format_number_id($row->pelanggan) }}</td>
                                    <td>{{ format_number_id($row->pemakaian) }}</td>
                                    <td>{{ format_number_id($row->kehilangan) }}</td>
                                    <td>
                                        <span class="badge {{ (float)$row->persentase <= 20 ? 'badge-success' : 'badge-danger' }}">
                                            {{ $row->persentase }}%
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">Belum ada data monitoring DMA.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $nrwDmas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

