@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Penggantian & Perawatan Meter')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Penggantian & Perawatan Meter Air</h2>
                <span class="text-muted">Target vs Realisasi Penggantian Meter per Wilayah</span>
            </div>
            <div>
                <a href="{{ route('teknik.perawatan-meter.input') }}" class="btn btn-gradient-01">
                    <i class="la la-plus"></i> Input Penggantian
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Riwayat Penggantian Meter</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode</th>
                                <th>Wilayah</th>
                                <th>Target Penggantian (Unit)</th>
                                <th>Realisasi Terganti (Unit)</th>
                                <th>Capaian (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $row)
                                @php
                                    $target = (float)$row->target;
                                    $real = (float)$row->ganti_meter;
                                    $persen = $target > 0 ? round(($real / $target) * 100, 1) : 100;
                                @endphp
                                <tr>
                                    <td>{{ format_tanggal_id($row->waktu) }}</td>
                                    <td><strong>{{ $row->wilayah }}</strong></td>
                                    <td>{{ format_number_id($row->target) }} unit</td>
                                    <td><strong>{{ format_number_id($row->ganti_meter) }} unit</strong></td>
                                    <td>
                                        <span class="badge {{ $persen >= 100 ? 'badge-success' : 'badge-warning' }}">
                                            {{ $persen }}%
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada data perawatan meter.</td>
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

