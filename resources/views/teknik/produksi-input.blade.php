@extends('layouts.app')

@section('title', 'Input Produksi Air IPA')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Input Realisasi Produksi Air</h2>
                <span class="text-muted">Pencatatan Volume Produksi IPA</span>
            </div>
            <div>
                <a href="{{ route('teknik.produksi') }}" class="btn btn-outline-secondary">
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
                <h4><i class="la la-tint mr-2 text-primary"></i>Form Data Produksi</h4>
            </div>
            <div class="widget-body">
                <form action="{{ route('teknik.produksi.store') }}" method="POST">
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
                        <label for="target" class="form-control-label">Target Produksi (m³)</label>
                        <input type="number" step="any" class="form-control" id="target" name="target" placeholder="Contoh: 371700" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="produksi" class="form-control-label">Realisasi Produksi (m³)</label>
                        <input type="number" step="any" class="form-control" id="produksi" name="produksi" placeholder="Contoh: 432234" required>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient-01 btn-lg">
                            <i class="la la-save mr-2"></i> Simpan Produksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

