@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Ringkasan Indikator Kinerja')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Ringkasan Indikator Kinerja</h2>
                <span class="text-muted">Standar Evaluasi Kinerja BPPSPAM / Kementerian PUPR</span>
            </div>
            <div>
                <a href="{{ route('kinerja.input.keuangan') }}" class="btn btn-primary btn-sm">
                    <i class="la la-plus"></i> Posting Kinerja
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($aspeks as $aspek)
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="widget has-shadow h-100">
                <div class="widget-header bordered d-flex align-items-center justify-content-between">
                    <h4>{{ $aspek->aspek_kinerja }}</h4>
                    @if ($aspek->aspek_id == 1)
                        <a href="{{ route('kinerja.input.keuangan') }}" class="btn btn-sm btn-outline-primary">Input Data</a>
                    @elseif ($aspek->aspek_id == 2)
                        <a href="{{ route('kinerja.input.pelayanan') }}" class="btn btn-sm btn-outline-info">Input Data</a>
                    @elseif ($aspek->aspek_id == 3)
                        <a href="{{ route('kinerja.input.operasional') }}" class="btn btn-sm btn-outline-success">Input Data</a>
                    @else
                        <a href="{{ route('kinerja.input.sdm') }}" class="btn btn-sm btn-outline-warning">Input Data</a>
                    @endif
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Nama Indikator</th>
                                    <th style="width: 120px;" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aspek->indikators as $ind)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $ind->indikator }}</strong></td>
                                        <td class="text-center">
                                            <a href="{{ route('kinerja.indikator', $ind->indikator_id) }}" class="btn btn-sm btn-outline-secondary">
                                                <i class="la la-eye"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

