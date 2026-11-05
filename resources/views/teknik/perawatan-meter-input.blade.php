@extends('layouts.app')

@section('title', 'Input Penggantian Meter')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Input Realisasi Penggantian Meter</h2>
                <span class="text-muted">Pencatatan Perawatan & Penggantian Meter Rusak</span>
            </div>
            <div>
                <a href="{{ route('teknik.perawatan-meter') }}" class="btn btn-outline-secondary">
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
                <h4><i class="la la-dashboard mr-2 text-primary"></i>Form Penggantian Meter</h4>
            </div>
            <div class="widget-body">
                <form action="{{ route('teknik.perawatan-meter.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="waktu" class="form-control-label">Periode</label>
                        <input type="date" class="form-control" id="waktu" name="waktu" value="{{ date('Y-m-01') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="wilayah" class="form-control-label">Wilayah Pelayanan</label>
                        <select class="custom-select form-control" id="wilayah" name="wilayah" required>
                            @foreach ($wilayahs as $wil)
                                <option value="{{ $wil }}">{{ $wil }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="target" class="form-control-label">Target Penggantian (Unit)</label>
                        <input type="number" class="form-control" id="target" name="target" placeholder="Contoh: 167" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="ganti_meter" class="form-control-label">Realisasi Terganti (Unit)</label>
                        <input type="number" class="form-control" id="ganti_meter" name="ganti_meter" placeholder="Contoh: 177" required>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient-01 btn-lg">
                            <i class="la la-save mr-2"></i> Simpan Data Penggantian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

