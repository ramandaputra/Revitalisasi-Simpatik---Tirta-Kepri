@extends('layouts.app')

@section('title', 'Input Distribusi Air JDU')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Input Realisasi Distribusi Air</h2>
                <span class="text-muted">Pencatatan Volume Aliran JDU</span>
            </div>
            <div>
                <a href="{{ route('teknik.distribusi') }}" class="btn btn-outline-secondary">
                    <i class="la la-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-6 col-md-8">
        <div class="widget has-shadow">
            <div class="widget-header bordered">
                <h4><i class="la la-random mr-2 text-primary"></i>Form Data Distribusi</h4>
            </div>
            <div class="widget-body">
                <form action="{{ route('teknik.distribusi.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="waktu" class="form-control-label">Periode</label>
                        <input type="date" class="form-control" id="waktu" name="waktu" value="{{ date('Y-m-01') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="waduk" class="form-control-label">Waduk / Sumber Air</label>
                        <select class="custom-select form-control" id="waduk" name="waduk" required>
                            @foreach ($waduks as $w)
                                <option value="{{ $w }}">{{ $w }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="jdu" class="form-control-label">Jalur Pipa (JDU)</label>
                        <select class="custom-select form-control" id="jdu" name="jdu" required>
                            @foreach ($jdus as $j)
                                <option value="{{ $j }}">{{ $j }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="target" class="form-control-label">Target Distribusi (m³)</label>
                        <input type="number" step="any" class="form-control" id="target" name="target" placeholder="Contoh: 141129" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="distribusi" class="form-control-label">Realisasi Distribusi (m³)</label>
                        <input type="number" step="any" class="form-control" id="distribusi" name="distribusi" placeholder="Contoh: 148845" required>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient-01 btn-lg">
                            <i class="la la-save mr-2"></i> Simpan Distribusi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

