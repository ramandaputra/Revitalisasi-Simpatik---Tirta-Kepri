@extends('layouts.app')

@section('title', $title ?? 'Posting Kinerja')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">{{ $title }}</h2>
                <span class="text-muted">Form Penginputan Realisasi & Evaluasi Indikator</span>
            </div>
            <div>
                <a href="{{ route('kinerja.index') }}" class="btn btn-outline-secondary">
                    <i class="la la-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-8 col-md-10">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center">
                <h4><i class="la la-edit mr-2 text-primary"></i>Form Pengisian Data</h4>
            </div>
            <div class="widget-body">
                <form action="{{ route('kinerja.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="aspek_id" value="{{ $aspekId }}">

                    <!-- Periode -->
                    <div class="form-group row mb-4">
                        <label for="periode" class="col-sm-3 col-form-label">Periode Bulan/Tahun</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="periode" name="periode" value="{{ date('Y-m-01') }}" required>
                        </div>
                    </div>

                    <!-- Pilih Indikator -->
                    <div class="form-group row mb-4">
                        <label for="indikator" class="col-sm-3 col-form-label">Pilih Indikator</label>
                        <div class="col-sm-9">
                            <select class="custom-select form-control" id="indikator" name="indikator" required>
                                <option value="">-- Pilih Indikator --</option>
                                @foreach ($indikators as $ind)
                                    <option value="{{ $ind->indikator_id }}">{{ $ind->indikator }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="border-top my-4"></div>

                    <!-- Variabel 1 (Pembilang / Data 1) -->
                    <div class="form-group row mb-3">
                        <label for="deskripsi1" class="col-sm-3 col-form-label">Deskripsi Variabel 1</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="deskripsi1" name="deskripsi1" placeholder="cth: Laba Bersih / Kas">
                        </div>
                        <label for="data1" class="col-sm-2 col-form-label text-sm-right">Nilai 1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" class="form-control calc-trigger" id="data1" name="data1" placeholder="0">
                        </div>
                    </div>

                    <!-- Variabel 2 (Penyebut / Data 2) -->
                    <div class="form-group row mb-4">
                        <label for="deskripsi2" class="col-sm-3 col-form-label">Deskripsi Variabel 2</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="deskripsi2" name="deskripsi2" placeholder="cth: Jumlah Ekuitas / Hutang">
                        </div>
                        <label for="data2" class="col-sm-2 col-form-label text-sm-right">Nilai 2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" class="form-control calc-trigger" id="data2" name="data2" placeholder="0">
                        </div>
                    </div>

                    <div class="border-top my-4"></div>

                    <!-- Hasil, Score, Bobot -->
                    <div class="form-group row mb-3">
                        <label for="hasil" class="col-sm-3 col-form-label">Hasil / Rasio (%)</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control font-weight-bold" id="hasil" name="hasil" placeholder="Hasil Rasio">
                        </div>
                        <label for="score" class="col-sm-2 col-form-label text-sm-right">Skor (1-5)</label>
                        <div class="col-sm-4">
                            <select class="custom-select form-control" id="score" name="score">
                                <option value="5.0">5.0 (Sangat Baik)</option>
                                <option value="4.0">4.0 (Baik)</option>
                                <option value="3.0">3.0 (Cukup)</option>
                                <option value="2.0">2.0 (Kurang)</option>
                                <option value="1.0">1.0 (Buruk)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="bobot" class="col-sm-3 col-form-label">Bobot Tertimbang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="bobot" name="bobot" placeholder="cth: 0.055">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient-01 btn-lg">
                            <i class="la la-save mr-2"></i> Simpan Data Kinerja
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
    // Auto-calculate ratio when data1 and data2 change
    $('.calc-trigger').on('input', function() {
        var d1 = parseFloat($('#data1').val());
        var d2 = parseFloat($('#data2').val());
        if (!isNaN(d1) && !isNaN(d2) && d2 !== 0) {
            var ratio = (d1 / d2) * 100;
            $('#hasil').val(ratio.toFixed(2));
        }
    });
</script>
@endpush

