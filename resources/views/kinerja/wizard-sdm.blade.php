@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Posting Kinerja Aspek SDM')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Posting Kinerja - Aspek SDM</h2>
                <span class="text-muted">Input Indikator Rasio Pegawai, Rasio Pegawai Diklat, dan Rasio Biaya Diklat</span>
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
                <h4><i class="la la-users mr-2 text-primary"></i>Form Evaluasi Kinerja SDM BPPSPAM</h4>
                <span class="badge badge-primary">Aspek ID #4</span>
            </div>
            <div class="widget-body">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs nav-fill mb-4" id="wizardTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold" id="step1-tab" data-toggle="tab" href="#step1" role="tab">
                            <span class="badge badge-primary mr-1">1</span> Rasio Jumlah Pegawai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step2-tab" data-toggle="tab" href="#step2" role="tab">
                            <span class="badge badge-primary mr-1">2</span> Pegawai Mendapat Diklat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step3-tab" data-toggle="tab" href="#step3" role="tab">
                            <span class="badge badge-primary mr-1">3</span> Rasio Biaya Diklat
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="wizardContent">
                    <!-- Tab 1 -->
                    <div class="tab-pane fade show active" id="step1" role="tabpanel">
                        <!-- Indikator 16: Rasio Pegawai -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>16. Rasio Jumlah Pegawai per 1.000 Pelanggan</span>
                                <span class="badge badge-warning">Bobot: 0.07</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="4">
                                    <input type="hidden" name="indikator" value="16">
                                    <input type="hidden" name="deskripsi1" value="Jumlah Pegawai">
                                    <input type="hidden" name="deskripsi2" value="Total Pelanggan">
                                    <input type="hidden" name="bobot" value="0.07">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Jumlah Pegawai (Orang) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="sdm_pegawai" name="data1" class="form-control sdm-calc" placeholder="Contoh: 150" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Pelanggan Aktif <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="sdm_pel" name="data2" class="form-control sdm-calc" placeholder="Contoh: 30000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Rasio (Pegawai/1.000 Pelanggan)</label>
                                            <input type="text" id="sdm_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor BPPSPAM (1-5)</label>
                                            <input type="text" id="sdm_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Rasio Pegawai
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

                    <!-- Tab 2 -->
                    <div class="tab-pane fade" id="step2" role="tabpanel">
                        <!-- Indikator 17: Diklat Pegawai -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>17. Rasio Pegawai Mendapat Diklat</span>
                                <span class="badge badge-warning">Bobot: 0.04</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="4">
                                    <input type="hidden" name="indikator" value="17">
                                    <input type="hidden" name="deskripsi1" value="Pegawai Mengikuti Pelatihan">
                                    <input type="hidden" name="deskripsi2" value="Total Pegawai">
                                    <input type="hidden" name="bobot" value="0.04">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Pegawai Ikut Diklat (Orang) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="diklat_peg" name="data1" class="form-control diklat-calc" placeholder="Contoh: 120" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Pegawai (Orang) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="diklat_total" name="data2" class="form-control diklat-calc" placeholder="Contoh: 150" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Pegawai Diklat (%)</label>
                                            <input type="text" id="diklat_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="diklat_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Pegawai Diklat
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

                    <!-- Tab 3 -->
                    <div class="tab-pane fade" id="step3" role="tabpanel">
                        <!-- Indikator 18: Biaya Diklat -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>18. Rasio Biaya Diklat Pegawai</span>
                                <span class="badge badge-warning">Bobot: 0.04</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="4">
                                    <input type="hidden" name="indikator" value="18">
                                    <input type="hidden" name="deskripsi1" value="Biaya Diklat Pegawai (Rp)">
                                    <input type="hidden" name="deskripsi2" value="Total Biaya Pegawai (Rp)">
                                    <input type="hidden" name="bobot" value="0.04">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Biaya Diklat Pegawai (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="biaya_diklat" name="data1" class="form-control biaya-calc" placeholder="Contoh: 150000000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Beban Pegawai (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="biaya_total" name="data2" class="form-control biaya-calc" placeholder="Contoh: 3000000000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Rasio Biaya (%)</label>
                                            <input type="text" id="biaya_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="biaya_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Rasio Biaya Diklat
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
        // Rasio Pegawai
        $('.sdm-calc').on('input', function() {
            var peg = parseFloat($('#sdm_pegawai').val()) || 0;
            var pel = parseFloat($('#sdm_pel').val()) || 0;
            if (pel > 0) {
                var r = (peg / pel) * 1000;
                $('#sdm_hasil').val(r.toFixed(2) + ' Pegawai/1000');
                var score = 1.0;
                if (r <= 5) score = 5.0;
                else if (r <= 6) score = 4.0;
                else if (r <= 8) score = 3.0;
                else if (r <= 10) score = 2.0;
                $('#sdm_score').val(score.toFixed(1));
            }
        });

        // Diklat Pegawai
        $('.diklat-calc').on('input', function() {
            var peg = parseFloat($('#diklat_peg').val()) || 0;
            var tot = parseFloat($('#diklat_total').val()) || 0;
            if (tot > 0) {
                var d = (peg / tot) * 100;
                $('#diklat_hasil').val(d.toFixed(2) + ' %');
                var score = 1.0;
                if (d >= 80) score = 5.0;
                else if (d >= 60) score = 4.0;
                else if (d >= 40) score = 3.0;
                else if (d >= 20) score = 2.0;
                $('#diklat_score').val(score.toFixed(1));
            }
        });

        // Biaya Diklat
        $('.biaya-calc').on('input', function() {
            var b = parseFloat($('#biaya_diklat').val()) || 0;
            var tot = parseFloat($('#biaya_total').val()) || 0;
            if (tot > 0) {
                var c = (b / tot) * 100;
                $('#biaya_hasil').val(c.toFixed(2) + ' %');
                var score = 1.0;
                if (c >= 5) score = 5.0;
                else if (c >= 3.5) score = 4.0;
                else if (c >= 2) score = 3.0;
                else if (c >= 1) score = 2.0;
                $('#biaya_score').val(score.toFixed(1));
            }
        });
    });
</script>
@endpush

