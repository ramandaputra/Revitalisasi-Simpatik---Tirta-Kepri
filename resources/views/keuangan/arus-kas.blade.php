@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Arus Kas & Cash Ratio')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Arus Kas & Cash Ratio</h2>
                <span class="text-muted">Perbandingan Kas terhadap Hutang Lancar</span>
            </div>
            @auth
                <div>
                    <a href="{{ route('keuangan.arus-kas.input') }}" class="btn btn-gradient-01">
                        <i class="la la-plus"></i> Input Arus Kas
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Riwayat Arus Kas & Cash Ratio</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode</th>
                                <th>Total Kas / Setara Kas</th>
                                <th>Hutang Lancar</th>
                                <th>Cash Ratio (%)</th>
                                <th>Skor</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($records as $row)
                                <tr>
                                    <td>{{ format_tanggal_id($row->periode) }}</td>
                                    <td><strong>{{ format_rupiah($row->data1) }}</strong></td>
                                    <td>{{ format_rupiah($row->data2) }}</td>
                                    <td><span class="badge badge-info">{{ $row->hasil }}%</span></td>
                                    <td><span class="badge badge-success">{{ $row->score }}</span></td>
                                    <td>{{ $row->bobot }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada data arus kas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

