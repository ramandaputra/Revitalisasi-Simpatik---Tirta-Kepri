@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Posting Kinerja Aspek Keuangan')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Posting Kinerja - Aspek Keuangan</h2>
                <span class="text-muted">Input Indikator ROE, Rasio Operasi, Rasio Kas, Efisiensi Penagihan, Solvabilitas</span>
            </div>
            <div>
                <a href="{{ route('kinerja.index') }}" class="btn btn-outline-secondary">
                    <i class="la la-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row flex-row justify-content-center">
    <div class="col-xl-11">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-calculator mr-2 text-primary"></i>Form Evaluasi Kinerja Keuangan BPPSPAM</h4>
                <span class="badge badge-primary">Aspek ID #1</span>
            </div>
            <div class="widget-body">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs nav-fill mb-4" id="wizardTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold" id="step1-tab" data-toggle="tab" href="#step1" role="tab">
                            <span class="badge badge-primary mr-1">1</span> ROE & Rasio Operasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step2-tab" data-toggle="tab" href="#step2" role="tab">
                            <span class="badge badge-primary mr-1">2</span> Rasio Kas & Efisiensi Penagihan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step3-tab" data-toggle="tab" href="#step3" role="tab">
                            <span class="badge badge-primary mr-1">3</span> Solvabilitas
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="wizardContent">
                    <!-- Tab 1: ROE & Rasio Operasi -->
                    <div class="tab-pane fade show active" id="step1" role="tabpanel">
                        <!-- Indikator 1: ROE -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>1. Return on Equity (ROE)</span>
                                <span class="badge badge-warning">Bobot: 0.055</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="1">
                                    <input type="hidden" name="indikator" value="1">
                                    <input type="hidden" name="deskripsi1" value="Laba/Rugi Bersih Setelah Pajak">
                                    <input type="hidden" name="deskripsi2" value="Jumlah Ekuitas">
                                    <input type="hidden" name="bobot" value="0.055">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Laba/Rugi Bersih Setelah Pajak (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="roe_laba" name="data1" class="form-control roe-calc" placeholder="Contoh: 1500000000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Jumlah Ekuitas (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="roe_ekuitas" name="data2" class="form-control roe-calc" placeholder="Contoh: 15000000000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Hasil ROE (%)</label>
                                            <input type="text" id="roe_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor BPPSPAM (1-5)</label>
                                            <input type="text" id="roe_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan ROE
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Indikator 2: Rasio Operasi -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>2. Rasio Operasi</span>
                                <span class="badge badge-warning">Bobot: 0.055</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="1">
                                    <input type="hidden" name="indikator" value="2">
                                    <input type="hidden" name="deskripsi1" value="Biaya Operasi">
                                    <input type="hidden" name="deskripsi2" value="Pendapatan Operasi">
                                    <input type="hidden" name="bobot" value="0.055">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Biaya Operasi (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="ro_biaya" name="data1" class="form-control ro-calc" placeholder="Contoh: 850000000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Pendapatan Operasi (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="ro_pendapatan" name="data2" class="form-control ro-calc" placeholder="Contoh: 1200000000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Hasil Rasio</label>
                                            <input type="text" id="ro_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor BPPSPAM (1-5)</label>
                                            <input type="text" id="ro_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Rasio Operasi
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary" onclick="$('#step2-tab').tab('show')">
                                Lanjut Langkah 2 <i class="la la-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Tab 2: Rasio Kas & Efisiensi Penagihan -->
                    <div class="tab-pane fade" id="step2" role="tabpanel">
                        <!-- Indikator 3: Rasio Kas -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>3. Cash Ratio (Rasio Kas)</span>
                                <span class="badge badge-warning">Bobot: 0.275</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="1">
                                    <input type="hidden" name="indikator" value="3">
                                    <input type="hidden" name="deskripsi1" value="Kas dan Setara Kas">
                                    <input type="hidden" name="deskripsi2" value="Hutang Lancar">
                                    <input type="hidden" name="bobot" value="0.275">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Kas & Setara Kas (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="cr_kas" name="data1" class="form-control cr-calc" placeholder="Contoh: 500000000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Hutang Lancar (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="cr_hutang" name="data2" class="form-control cr-calc" placeholder="Contoh: 400000000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Hasil Cash Ratio (%)</label>
                                            <input type="text" id="cr_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="cr_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Rasio Kas
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Indikator 4: Efisiensi Penagihan -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>4. Efisiensi Penagihan</span>
                                <span class="badge badge-warning">Bobot: 0.165</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="1">
                                    <input type="hidden" name="indikator" value="4">
                                    <input type="hidden" name="deskripsi1" value="Penerimaan Rekening Air">
                                    <input type="hidden" name="deskripsi2" value="Rekening Air Ditagihkan">
                                    <input type="hidden" name="bobot" value="0.165">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Penerimaan Rekening Air (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="ep_terima" name="data1" class="form-control ep-calc" placeholder="Contoh: 950000000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Rekening Air Ditagihkan (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="ep_tagih" name="data2" class="form-control ep-calc" placeholder="Contoh: 1000000000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Efisiensi (%)</label>
                                            <input type="text" id="ep_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="ep_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Efisiensi Penagihan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="$('#step1-tab').tab('show')">
                                <i class="la la-arrow-left"></i> Kembali Langkah 1
                            </button>
                            <button type="button" class="btn btn-primary" onclick="$('#step3-tab').tab('show')">
                                Lanjut Langkah 3 <i class="la la-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Tab 3: Solvabilitas -->
                    <div class="tab-pane fade" id="step3" role="tabpanel">
                        <!-- Indikator 5: Solvabilitas -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>5. Solvabilitas</span>
                                <span class="badge badge-warning">Bobot: 0.110</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="1">
                                    <input type="hidden" name="indikator" value="5">
                                    <input type="hidden" name="deskripsi1" value="Total Aktiva">
                                    <input type="hidden" name="deskripsi2" value="Total Hutang">
                                    <input type="hidden" name="bobot" value="0.110">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Aktiva (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="solv_aktiva" name="data1" class="form-control solv-calc" placeholder="Contoh: 25000000000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Hutang (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="solv_hutang" name="data2" class="form-control solv-calc" placeholder="Contoh: 10000000000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Solvabilitas (%)</label>
                                            <input type="text" id="solv_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="solv_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Solvabilitas
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="$('#step2-tab').tab('show')">
                                <i class="la la-arrow-left"></i> Kembali Langkah 2
                            </button>
                            <a href="{{ route('kinerja.index') }}" class="btn btn-success">
                                <i class="la la-check"></i> Selesai & Lihat Ringkasan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // ROE Auto-calc
        $('.roe-calc').on('input', function() {
            var laba = parseFloat($('#roe_laba').val()) || 0;
            var ekuitas = parseFloat($('#roe_ekuitas').val()) || 0;
            if (ekuitas > 0) {
                var roe = (laba / ekuitas) * 100;
                $('#roe_hasil').val(roe.toFixed(2) + ' %');
                var score = 1.0;
                if (roe >= 10) score = 5.0;
                else if (roe >= 7) score = 4.0;
                else if (roe >= 3) score = 3.0;
                else if (roe >= 0) score = 2.0;
                $('#roe_score').val(score.toFixed(1));
            }
        });

        // Rasio Operasi Auto-calc
        $('.ro-calc').on('input', function() {
            var biaya = parseFloat($('#ro_biaya').val()) || 0;
            var pendapatan = parseFloat($('#ro_pendapatan').val()) || 0;
            if (pendapatan > 0) {
                var ro = (biaya / pendapatan);
                $('#ro_hasil').val(ro.toFixed(2));
                var score = 1.0;
                if (ro <= 0.5) score = 5.0;
                else if (ro <= 0.65) score = 4.0;
                else if (ro <= 0.85) score = 3.0;
                else if (ro <= 1.0) score = 2.0;
                $('#ro_score').val(score.toFixed(1));
            }
        });

        // Cash Ratio Auto-calc
        $('.cr-calc').on('input', function() {
            var kas = parseFloat($('#cr_kas').val()) || 0;
            var hutang = parseFloat($('#cr_hutang').val()) || 0;
            if (hutang > 0) {
                var cr = (kas / hutang) * 100;
                $('#cr_hasil').val(cr.toFixed(2) + ' %');
                var score = 1.0;
                if (cr >= 100) score = 5.0;
                else if (cr >= 80) score = 4.0;
                else if (cr >= 60) score = 3.0;
                else if (cr >= 40) score = 2.0;
                $('#cr_score').val(score.toFixed(1));
            }
        });

        // Efisiensi Penagihan Auto-calc
        $('.ep-calc').on('input', function() {
            var terima = parseFloat($('#ep_terima').val()) || 0;
            var tagih = parseFloat($('#ep_tagih').val()) || 0;
            if (tagih > 0) {
                var ep = (terima / tagih) * 100;
                $('#ep_hasil').val(ep.toFixed(2) + ' %');
                var score = 1.0;
                if (ep >= 90) score = 5.0;
                else if (ep >= 85) score = 4.0;
                else if (ep >= 80) score = 3.0;
                else if (ep >= 75) score = 2.0;
                $('#ep_score').val(score.toFixed(1));
            }
        });

        // Solvabilitas Auto-calc
        $('.solv-calc').on('input', function() {
            var aktiva = parseFloat($('#solv_aktiva').val()) || 0;
            var hutang = parseFloat($('#solv_hutang').val()) || 0;
            if (hutang > 0) {
                var solv = (aktiva / hutang) * 100;
                $('#solv_hasil').val(solv.toFixed(2) + ' %');
                var score = 1.0;
                if (solv >= 200) score = 5.0;
                else if (solv >= 170) score = 4.0;
                else if (solv >= 135) score = 3.0;
                else if (solv >= 100) score = 2.0;
                $('#solv_score').val(score.toFixed(1));
            }
        });
    });
</script>
@endpush

