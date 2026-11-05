@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Posting Kinerja Aspek Pelayanan')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Posting Kinerja - Aspek Pelayanan</h2>
                <span class="text-muted">Input Indikator Cakupan, Pertumbuhan, Penyelesaian Pengaduan, Kualitas Air, Konsumsi Air</span>
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
                <h4><i class="la la-users mr-2 text-primary"></i>Form Evaluasi Kinerja Pelayanan BPPSPAM</h4>
                <span class="badge badge-primary">Aspek ID #2</span>
            </div>
            <div class="widget-body">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs nav-fill mb-4" id="wizardTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold" id="step1-tab" data-toggle="tab" href="#step1" role="tab">
                            <span class="badge badge-primary mr-1">1</span> Cakupan & Pertumbuhan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step2-tab" data-toggle="tab" href="#step2" role="tab">
                            <span class="badge badge-primary mr-1">2</span> Pengaduan & Kualitas Air
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="step3-tab" data-toggle="tab" href="#step3" role="tab">
                            <span class="badge badge-primary mr-1">3</span> Konsumsi Air
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="wizardContent">
                    <!-- Tab 1 -->
                    <div class="tab-pane fade show active" id="step1" role="tabpanel">
                        <!-- Indikator 6: Cakupan Pelayanan -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>6. Cakupan Pelayanan</span>
                                <span class="badge badge-warning">Bobot: 0.05</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="2">
                                    <input type="hidden" name="indikator" value="6">
                                    <input type="hidden" name="deskripsi1" value="Jumlah Penduduk Terlayani">
                                    <input type="hidden" name="deskripsi2" value="Jumlah Penduduk Wilayah Pelayanan">
                                    <input type="hidden" name="bobot" value="0.05">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Penduduk Terlayani (Jiwa) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="cakupan_terlayani" name="data1" class="form-control cakupan-calc" placeholder="Contoh: 180000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Penduduk Wilayah (Jiwa) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="cakupan_total" name="data2" class="form-control cakupan-calc" placeholder="Contoh: 240000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Hasil Cakupan (%)</label>
                                            <input type="text" id="cakupan_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor BPPSPAM (1-5)</label>
                                            <input type="text" id="cakupan_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Cakupan Pelayanan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Indikator 7: Pertumbuhan Pelanggan -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>7. Pertumbuhan Pelanggan</span>
                                <span class="badge badge-warning">Bobot: 0.05</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="2">
                                    <input type="hidden" name="indikator" value="7">
                                    <input type="hidden" name="deskripsi1" value="Pertambahan Pelanggan Baru">
                                    <input type="hidden" name="deskripsi2" value="Total Pelanggan Periode Lalu">
                                    <input type="hidden" name="bobot" value="0.05">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Pelanggan Baru (SL) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="tumbuh_baru" name="data1" class="form-control tumbuh-calc" placeholder="Contoh: 1200" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Pelanggan Periode Lalu (SL) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="tumbuh_lalu" name="data2" class="form-control tumbuh-calc" placeholder="Contoh: 30000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Pertumbuhan (%)</label>
                                            <input type="text" id="tumbuh_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor BPPSPAM (1-5)</label>
                                            <input type="text" id="tumbuh_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Pertumbuhan Pelanggan
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
                        <!-- Indikator 8: Pengaduan -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>8. Tingkat Penyelesaian Pengaduan</span>
                                <span class="badge badge-warning">Bobot: 0.025</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="2">
                                    <input type="hidden" name="indikator" value="8">
                                    <input type="hidden" name="deskripsi1" value="Pengaduan Selesai Tertangani">
                                    <input type="hidden" name="deskripsi2" value="Total Pengaduan Masuk">
                                    <input type="hidden" name="bobot" value="0.025">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Pengaduan Selesai <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="aduan_selesai" name="data1" class="form-control aduan-calc" placeholder="Contoh: 95" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Pengaduan Masuk <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="aduan_total" name="data2" class="form-control aduan-calc" placeholder="Contoh: 100" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Penyelesaian (%)</label>
                                            <input type="text" id="aduan_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="aduan_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Penyelesaian Aduan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Indikator 9: Kualitas Air Pelanggan -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>9. Kualitas Air Pelanggan</span>
                                <span class="badge badge-warning">Bobot: 0.075</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="2">
                                    <input type="hidden" name="indikator" value="9">
                                    <input type="hidden" name="deskripsi1" value="Sampel Memenuhi Syarat Permenkes">
                                    <input type="hidden" name="deskripsi2" value="Total Sampel Uji Laboratorium">
                                    <input type="hidden" name="bobot" value="0.075">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Sampel Memenuhi Syarat <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="air_lolos" name="data1" class="form-control air-calc" placeholder="Contoh: 48" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Total Sampel Diuji <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="air_total" name="data2" class="form-control air-calc" placeholder="Contoh: 50" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Kualitas (%)</label>
                                            <input type="text" id="air_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0 %">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="air_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Kualitas Air
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
                        <!-- Indikator 10: Konsumsi Air -->
                        <div class="card mb-4 border border-secondary" style="background: rgba(255,255,255,0.02);">
                            <div class="card-header bg-dark font-weight-bold text-white d-flex justify-content-between align-items-center">
                                <span><i class="la la-check-circle text-success mr-2"></i>10. Konsumsi Air Pelanggan Domestik</span>
                                <span class="badge badge-warning">Bobot: 0.05</span>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kinerja.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="aspek_id" value="2">
                                    <input type="hidden" name="indikator" value="10">
                                    <input type="hidden" name="deskripsi1" value="Volume Air Terjual Domestik (m3)">
                                    <input type="hidden" name="deskripsi2" value="Jumlah Pelanggan Domestik (SR)">
                                    <input type="hidden" name="bobot" value="0.05">

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Periode Evaluasi <span class="text-danger">*</span></label>
                                            <input type="date" name="periode" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Volume Air Terjual Domestik (m3) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="konsum_vol" name="data1" class="form-control konsum-calc" placeholder="Contoh: 450000" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-control-label">Pelanggan Domestik (SR) <span class="text-danger">*</span></label>
                                            <input type="number" step="any" id="konsum_pel" name="data2" class="form-control konsum-calc" placeholder="Contoh: 30000" required>
                                        </div>
                                    </div>
                                    <div class="row bg-light p-3 rounded mb-3 text-dark">
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Konsumsi (m3/bln/pelanggan)</label>
                                            <input type="text" id="konsum_hasil" name="hasil" class="form-control font-weight-bold text-primary" readonly value="0">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">Nilai / Skor (1-5)</label>
                                            <input type="text" id="konsum_score" name="score" class="form-control font-weight-bold text-success" readonly value="1.0">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button type="submit" class="btn btn-gradient-01 btn-block">
                                                <i class="la la-save"></i> Simpan Konsumsi Air
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
        // Cakupan Pelayanan
        $('.cakupan-calc').on('input', function() {
            var terlayani = parseFloat($('#cakupan_terlayani').val()) || 0;
            var total = parseFloat($('#cakupan_total').val()) || 0;
            if (total > 0) {
                var c = (terlayani / total) * 100;
                $('#cakupan_hasil').val(c.toFixed(2) + ' %');
                var score = 1.0;
                if (c >= 80) score = 5.0;
                else if (c >= 60) score = 4.0;
                else if (c >= 40) score = 3.0;
                else if (c >= 20) score = 2.0;
                $('#cakupan_score').val(score.toFixed(1));
            }
        });

        // Pertumbuhan Pelanggan
        $('.tumbuh-calc').on('input', function() {
            var baru = parseFloat($('#tumbuh_baru').val()) || 0;
            var lalu = parseFloat($('#tumbuh_lalu').val()) || 0;
            if (lalu > 0) {
                var t = (baru / lalu) * 100;
                $('#tumbuh_hasil').val(t.toFixed(2) + ' %');
                var score = 1.0;
                if (t >= 10) score = 5.0;
                else if (t >= 7.5) score = 4.0;
                else if (t >= 5) score = 3.0;
                else if (t >= 2.5) score = 2.0;
                $('#tumbuh_score').val(score.toFixed(1));
            }
        });

        // Aduan Selesai
        $('.aduan-calc').on('input', function() {
            var selesai = parseFloat($('#aduan_selesai').val()) || 0;
            var total = parseFloat($('#aduan_total').val()) || 0;
            if (total > 0) {
                var a = (selesai / total) * 100;
                $('#aduan_hasil').val(a.toFixed(2) + ' %');
                var score = 1.0;
                if (a >= 90) score = 5.0;
                else if (a >= 80) score = 4.0;
                else if (a >= 70) score = 3.0;
                else if (a >= 60) score = 2.0;
                $('#aduan_score').val(score.toFixed(1));
            }
        });

        // Kualitas Air
        $('.air-calc').on('input', function() {
            var lolos = parseFloat($('#air_lolos').val()) || 0;
            var total = parseFloat($('#air_total').val()) || 0;
            if (total > 0) {
                var k = (lolos / total) * 100;
                $('#air_hasil').val(k.toFixed(2) + ' %');
                var score = 1.0;
                if (k >= 90) score = 5.0;
                else if (k >= 80) score = 4.0;
                else if (k >= 70) score = 3.0;
                else if (k >= 60) score = 2.0;
                $('#air_score').val(score.toFixed(1));
            }
        });

        // Konsumsi Air
        $('.konsum-calc').on('input', function() {
            var vol = parseFloat($('#konsum_vol').val()) || 0;
            var pel = parseFloat($('#konsum_pel').val()) || 0;
            if (pel > 0) {
                var m = vol / pel;
                $('#konsum_hasil').val(m.toFixed(2) + ' m3/bln');
                var score = 1.0;
                if (m >= 10) score = 5.0;
                else if (m >= 8) score = 4.0;
                else if (m >= 6) score = 3.0;
                else if (m >= 4) score = 2.0;
                $('#konsum_score').val(score.toFixed(1));
            }
        });
    });
</script>
@endpush

