@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Posting Kinerja Aspek Operasional')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Posting Kinerja - Aspek Operasional</h2>
                <span class="text-muted">Input Indikator Efisiensi Produksi, NRW, Jam Operasi, Tekanan Air, Penggantian Meter</span>
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
                <h4><i class="la la-tint mr-2 text-primary"></i>Form Evaluasi Kinerja Operasional BPPSPAM</h4>
                <span class="badge badge-primary">Aspek ID #3</span>
            </div>
            <div class="widget-body">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs nav-fill mb-4" id="wizardTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold" id="step1-tab" data-toggle="tab" href="#step1" role="tab">
                            <span class="badge badge-primary mr-1">1</span> Efisiensi Produksi & NRW
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step2-tab" data-toggle="tab" href="#step2" role="tab">
                            <span class="badge badge-primary mr-1">2</span> Jam Operasi & Tekanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step3-tab" data-toggle="tab" href="#step3" role="tab">
                            <span class="badge badge-primary mr-1">3</span> Penggantian Meter
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="wizardContent">
                    <!-- Tab 1 -->
                    <div class="tab-pane fade show active" id="step1" role="tabpanel">
                        <!-- Indikator 11: Efisiensi Produksi -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>11. Rasio Efisiensi Produksi</span>
                                <span class="badge badge-warning">Bobot: 0.07</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="3">
                                    <input type="hidden" name="indikator" value="11">
                                    <input type="hidden" name="deskripsi1" value="Volume Produksi Riil (m3)">
                                    <input type="hidden" name="deskripsi2" value="Kapasitas Desain Terpasang (m3)">
                                    <input type="hidden" name="bobot" value="0.07">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Produksi Riil (m3) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="prod_riil" name="data1" class="form-control prod-calc" placeholder="Contoh: 1200000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Kapasitas Desain (m3) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="prod_desain" name="data2" class="form-control prod-calc" placeholder="Contoh: 1400000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Efisiensi Produksi (%)</label>
                                            <input type="text" id="prod_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor BPPSPAM (1-5)</label>
                                            <input type="text" id="prod_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Efisiensi Produksi
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Indikator 12: NRW -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>12. Tingkat Kehilangan Air / NRW</span>
                                <span class="badge badge-warning">Bobot: 0.07</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="3">
                                    <input type="hidden" name="indikator" value="12">
                                    <input type="hidden" name="deskripsi1" value="Volume Air Hilang (m3)">
                                    <input type="hidden" name="deskripsi2" value="Total Air Didistribusikan (m3)">
                                    <input type="hidden" name="bobot" value="0.07">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Volume Hilang/Tak Berekening (m3) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="nrw_hilang" name="data1" class="form-control nrw-calc" placeholder="Contoh: 300000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Didistribusikan (m3) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="nrw_dist" name="data2" class="form-control nrw-calc" placeholder="Contoh: 1200000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">NRW (%)</label>
                                            <input type="text" id="nrw_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor BPPSPAM (1-5)</label>
                                            <input type="text" id="nrw_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan NRW
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
                        <!-- Indikator 13: Jam Operasi -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>13. Jam Operasi Pelayanan</span>
                                <span class="badge badge-warning">Bobot: 0.07</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="3">
                                    <input type="hidden" name="indikator" value="13">
                                    <input type="hidden" name="deskripsi1" value="Total Jam Distribusi Aliran (Jam)">
                                    <input type="hidden" name="deskripsi2" value="Jumlah Hari Pelayanan (Hari)">
                                    <input type="hidden" name="bobot" value="0.07">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Jam Aliran (Jam) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="jam_total" name="data1" class="form-control jam-calc" placeholder="Contoh: 720" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Jumlah Hari Evaluasi (Hari) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="jam_hari" name="data2" class="form-control jam-calc" placeholder="Contoh: 30" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Jam Kontinuitas (Jam/Hari)</label>
                                            <input type="text" id="jam_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 Jam/Hari">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="jam_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Jam Operasi
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Indikator 14: Tekanan Air -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>14. Tekanan Air Sambungan Pelanggan</span>
                                <span class="badge badge-warning">Bobot: 0.07</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="3">
                                    <input type="hidden" name="indikator" value="14">
                                    <input type="hidden" name="deskripsi1" value="Pelanggan Tekanan >= 0.7 Bar">
                                    <input type="hidden" name="deskripsi2" value="Total Sambungan Pelanggan">
                                    <input type="hidden" name="bobot" value="0.07">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Pelanggan Tekanan >= 0.7 Bar <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="tek_cukup" name="data1" class="form-control tek-calc" placeholder="Contoh: 25000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Sambungan Pelanggan <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="tek_total" name="data2" class="form-control tek-calc" placeholder="Contoh: 30000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Kecukupan Tekanan (%)</label>
                                            <input type="text" id="tek_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="tek_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Tekanan Air
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
                        <!-- Indikator 15: Penggantian Meter -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>15. Penggantian Meter Air</span>
                                <span class="badge badge-warning">Bobot: 0.07</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="3">
                                    <input type="hidden" name="indikator" value="15">
                                    <input type="hidden" name="deskripsi1" value="Meter Air Terganti/Tera (Unit)">
                                    <input type="hidden" name="deskripsi2" value="Total Meter Usia > 5 Tahun (Unit)">
                                    <input type="hidden" name="bobot" value="0.07">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Meter Terganti (Unit) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="meter_ganti" name="data1" class="form-control meter-calc" placeholder="Contoh: 1200" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Meter Usia > 5 Thn (Unit) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="meter_tua" name="data2" class="form-control meter-calc" placeholder="Contoh: 5000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Penggantian Meter (%)</label>
                                            <input type="text" id="meter_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="meter_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Penggantian Meter
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
        // Efisiensi Produksi
        $('.prod-calc').on('input', function() {
            var riil = parseFloat($('#prod_riil').val()) || 0;
            var desain = parseFloat($('#prod_desain').val()) || 0;
            if (desain > 0) {
                var p = (riil / desain) * 100;
                $('#prod_hasil').val(p.toFixed(2) + ' %');
                var score = 1.0;
                if (p >= 80) score = 5.0;
                else if (p >= 70) score = 4.0;
                else if (p >= 60) score = 3.0;
                else if (p >= 50) score = 2.0;
                $('#prod_score').val(score.toFixed(1));
            }
        });

        // NRW
        $('.nrw-calc').on('input', function() {
            var hilang = parseFloat($('#nrw_hilang').val()) || 0;
            var dist = parseFloat($('#nrw_dist').val()) || 0;
            if (dist > 0) {
                var n = (hilang / dist) * 100;
                $('#nrw_hasil').val(n.toFixed(2) + ' %');
                var score = 1.0;
                if (n <= 25) score = 5.0;
                else if (n <= 30) score = 4.0;
                else if (n <= 35) score = 3.0;
                else if (n <= 40) score = 2.0;
                $('#nrw_score').val(score.toFixed(1));
            }
        });

        // Jam Operasi
        $('.jam-calc').on('input', function() {
            var tot = parseFloat($('#jam_total').val()) || 0;
            var hari = parseFloat($('#jam_hari').val()) || 0;
            if (hari > 0) {
                var j = tot / hari;
                $('#jam_hasil').val(j.toFixed(1) + ' Jam/Hari');
                var score = 1.0;
                if (j >= 24) score = 5.0;
                else if (j >= 20) score = 4.0;
                else if (j >= 16) score = 3.0;
                else if (j >= 12) score = 2.0;
                $('#jam_score').val(score.toFixed(1));
            }
        });

        // Tekanan Air
        $('.tek-calc').on('input', function() {
            var cukup = parseFloat($('#tek_cukup').val()) || 0;
            var total = parseFloat($('#tek_total').val()) || 0;
            if (total > 0) {
                var tk = (cukup / total) * 100;
                $('#tek_hasil').val(tk.toFixed(2) + ' %');
                var score = 1.0;
                if (tk >= 80) score = 5.0;
                else if (tk >= 65) score = 4.0;
                else if (tk >= 50) score = 3.0;
                else if (tk >= 35) score = 2.0;
                $('#tek_score').val(score.toFixed(1));
            }
        });

        // Penggantian Meter
        $('.meter-calc').on('input', function() {
            var ganti = parseFloat($('#meter_ganti').val()) || 0;
            var tua = parseFloat($('#meter_tua').val()) || 0;
            if (tua > 0) {
                var g = (ganti / tua) * 100;
                $('#meter_hasil').val(g.toFixed(2) + ' %');
                var score = 1.0;
                if (g >= 20) score = 5.0;
                else if (g >= 15) score = 4.0;
                else if (g >= 10) score = 3.0;
                else if (g >= 5) score = 2.0;
                $('#meter_score').val(score.toFixed(1));
            }
        });
    });
</script>
@endpush

