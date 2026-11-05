@extends('layouts.app')

@section('title', 'Input Arus Kas')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Input Arus Kas & Cash Ratio</h2>
                <span class="text-muted">Pencatatan Saldo Kas dan Hutang Lancar</span>
            </div>
            <div>
                <a href="{{ route('keuangan.arus-kas') }}" class="btn btn-outline-secondary">
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
                <h4><i class="la la-money mr-2 text-primary"></i>Form Data Arus Kas</h4>
            </div>
            <div class="widget-body">
                <form action="{{ route('keuangan.arus-kas.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="periode" class="form-control-label">Periode</label>
                        <input type="date" class="form-control" id="periode" name="periode" value="{{ date('Y-m-01') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="data1" class="form-control-label">Kas & Setara Kas (Rp)</label>
                        <input type="number" step="any" class="form-control calc-cash" id="data1" name="data1" placeholder="Contoh: 8388120715" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="data2" class="form-control-label">Hutang Lancar (Rp)</label>
                        <input type="number" step="any" class="form-control calc-cash" id="data2" name="data2" placeholder="Contoh: 684946056" required>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-control-label">Perkiraan Cash Ratio</label>
                        <input type="text" class="form-control font-weight-bold" id="cash-ratio-preview" readonly placeholder="0.00%">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient-01 btn-lg">
                            <i class="la la-save mr-2"></i> Simpan Arus Kas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.calc-cash').on('input', function() {
        var kas = parseFloat($('#data1').val()) || 0;
        var hutang = parseFloat($('#data2').val()) || 0;
        if (hutang > 0) {
            var ratio = (kas / hutang) * 100;
            $('#cash-ratio-preview').val(ratio.toFixed(2) + '%');
        }
    });
</script>
@endpush

