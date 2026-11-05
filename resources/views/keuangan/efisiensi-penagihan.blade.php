@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Efisiensi Penagihan')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Efisiensi Penagihan Rekening Air</h2>
                <span class="text-muted">Perbandingan Penerimaan terhadap Rekening Air Ditagihkan</span>
            </div>
            @auth
                <div>
                    <a href="{{ route('kinerja.input.keuangan') }}" class="btn btn-gradient-01">
                        <i class="la la-plus"></i> Input Kinerja Keuangan
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
                <h4>Riwayat Efisiensi Penagihan</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Periode</th>
                                <th>Penerimaan Rekening Air</th>
                                <th>Rekening Air Ditagihkan</th>
                                <th>Efisiensi (%)</th>
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
                                    <td>
                                        <span class="badge {{ (float)$row->hasil >= 80 ? 'badge-success' : 'badge-warning' }}">
                                            {{ $row->hasil }}%
                                        </span>
                                    </td>
                                    <td><span class="badge badge-primary">{{ $row->score }}</span></td>
                                    <td>{{ $row->bobot }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada data efisiensi penagihan.</td>
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

