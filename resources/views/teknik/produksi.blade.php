@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Pemantauan Produksi Air')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Pemantauan Produksi Air IPA</h2>
                <span class="text-muted">Target vs Realisasi Produksi Waduk (m³)</span>
            </div>
            <div>
                <a href="{{ route('teknik.produksi.input') }}" class="btn btn-gradient-01">
                    <i class="la la-plus"></i> Input Produksi
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Data Produksi Bulanan</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode</th>
                                <th>Waduk / Sumber Air</th>
                                <th>IPA</th>
                                <th>Target (m³)</th>
                                <th>Realisasi Produksi (m³)</th>
                                <th>Capaian (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $row)
                                @php
                                    $target = (float)$row->target;
                                    $realisasi = (float)$row->produksi;
                                    $persen = $target > 0 ? round(($realisasi / $target) * 100, 1) : 100;
                                @endphp
                                <tr>
                                    <td>{{ format_tanggal_id($row->waktu) }}</td>
                                    <td><strong>{{ $row->waduk }}</strong></td>
                                    <td>{{ $row->ipa ?: $row->waduk }}</td>
                                    <td>{{ format_m3($row->target) }}</td>
                                    <td><strong>{{ format_m3($row->produksi) }}</strong></td>
                                    <td>
                                        <span class="badge {{ $persen >= 100 ? 'badge-success' : 'badge-warning' }}">
                                            {{ $persen }}%
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada data produksi.</td>
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

