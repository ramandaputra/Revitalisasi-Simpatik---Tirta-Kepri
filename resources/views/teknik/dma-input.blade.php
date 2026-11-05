@extends('layouts.app')

@section('title', 'Input Monitoring DMA')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Input Evaluasi Zona DMA</h2>
                <span class="text-muted">Pencatatan Aliran & NRW Zona DMA</span>
            </div>
            <div>
                <a href="{{ route('teknik.dma') }}" class="btn btn-outline-secondary">
                    <i class="la la-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-8 col-md-10">
        <div class="widget has-shadow">
            <div class="widget-header bordered">
                <h4><i class="la la-bullseye mr-2 text-primary"></i>Form Data Monitoring DMA</h4>
            </div>
            <div class="widget-body">
                <form action="{{ route('teknik.dma.store') }}" method="POST">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="periode" class="col-sm-3 col-form-label">Periode</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="periode" name="periode" value="{{ date('Y-m-01') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="dma" class="col-sm-3 col-form-label">Pilih DMA</label>
                        <div class="col-sm-9">
                            <select class="custom-select form-control" id="dma" name="dma" required>
                                <option value="">-- Pilih Zona DMA --</option>
                                @foreach ($dmas as $d)
                                    <option value="{{ $d->nama_dma }}">{{ $d->nama_dma }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="lalu" class="col-sm-3 col-form-label">Stand Meter Bulan Lalu</label>
                        <div class="col-sm-4">
                            <input type="number" step="any" class="form-control dma-calc" id="lalu" name="lalu" placeholder="0">
                        </div>
                        <label for="kini" class="col-sm-2 col-form-label text-sm-right">Stand Kini</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" class="form-control dma-calc" id="kini" name="kini" placeholder="0">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="distribusi" class="col-sm-3 col-form-label">Total Distribusi (m³)</label>
                        <div class="col-sm-9">
                            <input type="number" step="any" class="form-control" id="distribusi" name="distribusi" placeholder="0">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="pelanggan" class="col-sm-3 col-form-label">Jumlah Pelanggan</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="pelanggan" name="pelanggan" placeholder="0">
                        </div>
                        <label for="pemakaian" class="col-sm-2 col-form-label text-sm-right">Pemakaian (m³)</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" class="form-control dma-calc" id="pemakaian" name="pemakaian" placeholder="0">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="kehilangan" class="col-sm-3 col-form-label">Kehilangan Air (m³)</label>
                        <div class="col-sm-4">
                            <input type="number" step="any" class="form-control" id="kehilangan" name="kehilangan" placeholder="0">
                        </div>
                        <label for="persentase" class="col-sm-2 col-form-label text-sm-right">NRW (%)</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control font-weight-bold" id="persentase" name="persentase" placeholder="0.00%">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient-01 btn-lg">
                            <i class="la la-save mr-2"></i> Simpan Data DMA
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
    $('.dma-calc').on('input', function() {
        var lalu = parseFloat($('#lalu').val()) || 0;
        var kini = parseFloat($('#kini').val()) || 0;
        var pemakaian = parseFloat($('#pemakaian').val()) || 0;

        if (kini > lalu) {
            var dist = kini - lalu;
            $('#distribusi').val(dist);
            if (pemakaian > 0) {
                var loss = dist - pemakaian;
                $('#kehilangan').val(loss);
                var pct = (loss / dist) * 100;
                $('#persentase').val(pct.toFixed(2));
            }
        }
    });
</script>
@endpush

