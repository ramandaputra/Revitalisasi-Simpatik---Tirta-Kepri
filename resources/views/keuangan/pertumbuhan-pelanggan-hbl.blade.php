@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Pertumbuhan Pelanggan (Hubungan Langganan)')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Pertumbuhan Pelanggan</h2>
                <span class="text-muted">Monitoring Status Hubungan Langganan (HUBLANG) Pelanggan Per Wilayah</span>
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-gradient-01">
                    <i class="la la-dashboard"></i> Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row flex-row">
    <!-- Pie Chart 1: Diaktifkan X Diputus -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="widget has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-pie-chart mr-2 text-primary"></i>Diaktifkan X Diputus (Periode Berjalan)</h4>
            </div>
            <div class="widget-header bordered d-flex align-items-center flex-wrap p-3">
                <div class="col-lg-5 col-12 mb-2">
                    <label class="form-control-label font-weight-bold" style="font-size: 12px;">Periode:</label>
                    <input type="month" id="periode-pie" class="form-control form-control-sm" value="{{ date('Y-m') }}">
                </div>
                <div class="col-lg-4 col-12 mb-2">
                    <label class="form-control-label font-weight-bold" style="font-size: 12px;">Wilayah:</label>
                    <select id="wilayah-pie" class="custom-select custom-select-sm form-control">
                        <option value="all">Semua Wilayah</option>
                        <option value="tanjungpinang">Tanjungpinang</option>
                        <option value="kijang">Kijang</option>
                        <option value="tanjunguban">Tanjung Uban</option>
                    </select>
                </div>
                <div class="col-lg-3 col-12 d-flex align-items-end mb-2">
                    <button type="button" class="btn btn-gradient-01 btn-sm btn-block" id="proses-pie">
                        <i class="la la-filter"></i> Tampil
                    </button>
                </div>
            </div>
            <div class="widget-body d-flex justify-content-center align-items-center p-4">
                <div style="position: relative; height: 260px; width: 100%;">
                    <canvas id="pieChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart 2: Aktif X Putus Sampai Saat Ini -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="widget has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-pie-chart mr-2 text-info"></i>Total Status Sambungan (Kumulatif)</h4>
                <span class="badge badge-info">Realtime</span>
            </div>
            <div class="widget-body d-flex justify-content-center align-items-center p-4 mt-4">
                <div style="position: relative; height: 260px; width: 100%;">
                    <canvas id="pieChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table Row -->
<div class="row flex-row">
    <div class="col-xl-12 col-md-12">
        <div class="widget widget-07 has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between flex-wrap p-3">
                <h4><i class="la la-table mr-2 text-warning"></i>Rincian Mutasi Pelanggan per Golongan Tarif</h4>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="mr-2">
                        <input type="number" id="periode-tahun" class="form-control form-control-sm" value="{{ date('Y') }}" min="2020" max="2035" style="width: 100px;">
                    </div>
                    <div class="mr-2">
                        <select id="wilayah-table" class="custom-select custom-select-sm">
                            <option value="all">Semua Wilayah</option>
                            <option value="tanjungpinang">Tanjungpinang</option>
                            <option value="kijang">Kijang</option>
                            <option value="tanjunguban">Tanjung Uban</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm" id="btn-refresh-table">
                        <i class="la la-refresh"></i> Refresh
                    </button>
                </div>
            </div>
            <div class="widget-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2" class="align-middle" style="width: 220px;">Golongan Tarif</th>
                                <th colspan="6">Status Mutasi Sambungan (Pelanggan)</th>
                                <th rowspan="2" class="align-middle">Total Aktif</th>
                            </tr>
                            <tr>
                                <th>Samb. Baru</th>
                                <th>Samb. Kembali</th>
                                <th>Tutup Sem.</th>
                                <th>Bongkar Segel</th>
                                <th>Putus Total</th>
                                <th>Ganti Nama</th>
                            </tr>
                        </thead>
                        <tbody id="hublang-table-body">
                            <tr>
                                <td class="text-left font-weight-bold">Sosial A (Rumah Ibadah)</td>
                                <td class="text-right">12</td>
                                <td class="text-right">4</td>
                                <td class="text-right">1</td>
                                <td class="text-right">0</td>
                                <td class="text-right">0</td>
                                <td class="text-right">2</td>
                                <td class="text-right font-weight-bold text-success">385</td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold">Sosial B (Panti / RS)</td>
                                <td class="text-right">8</td>
                                <td class="text-right">2</td>
                                <td class="text-right">0</td>
                                <td class="text-right">0</td>
                                <td class="text-right">0</td>
                                <td class="text-right">1</td>
                                <td class="text-right font-weight-bold text-success">210</td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold">Rumah Tangga A (R1)</td>
                                <td class="text-right">184</td>
                                <td class="text-right">28</td>
                                <td class="text-right">14</td>
                                <td class="text-right">6</td>
                                <td class="text-right">2</td>
                                <td class="text-right">25</td>
                                <td class="text-right font-weight-bold text-success">14,820</td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold">Rumah Tangga B (R2)</td>
                                <td class="text-right">240</td>
                                <td class="text-right">45</td>
                                <td class="text-right">22</td>
                                <td class="text-right">9</td>
                                <td class="text-right">5</td>
                                <td class="text-right">38</td>
                                <td class="text-right font-weight-bold text-success">18,450</td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold">Instansi Pemerintah</td>
                                <td class="text-right">5</td>
                                <td class="text-right">1</td>
                                <td class="text-right">0</td>
                                <td class="text-right">0</td>
                                <td class="text-right">0</td>
                                <td class="text-right">3</td>
                                <td class="text-right font-weight-bold text-success">342</td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold">Niaga Kecil</td>
                                <td class="text-right">42</td>
                                <td class="text-right">12</td>
                                <td class="text-right">5</td>
                                <td class="text-right">3</td>
                                <td class="text-right">1</td>
                                <td class="text-right">8</td>
                                <td class="text-right font-weight-bold text-success">2,640</td>
                            </tr>
                            <tr>
                                <td class="text-left font-weight-bold">Niaga Besar / Industri</td>
                                <td class="text-right">15</td>
                                <td class="text-right">3</td>
                                <td class="text-right">1</td>
                                <td class="text-right">1</td>
                                <td class="text-right">0</td>
                                <td class="text-right">4</td>
                                <td class="text-right font-weight-bold text-success">860</td>
                            </tr>
                        </tbody>
                        <tfoot class="thead-dark font-weight-bold">
                            <tr>
                                <td class="text-left">TOTAL KESELURUHAN</td>
                                <td class="text-right">506</td>
                                <td class="text-right">95</td>
                                <td class="text-right">43</td>
                                <td class="text-right">19</td>
                                <td class="text-right">8</td>
                                <td class="text-right">81</td>
                                <td class="text-right text-success" style="font-size: 15px;">37,707</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        function getThemeColors() {
            var isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            return {
                labelColor: isDark ? '#cbd5e1' : '#334155',
                borderColor: isDark ? '#1e293b' : '#ffffff'
            };
        }

        var colors = getThemeColors();

        // Pie Chart 1
        var ctx1 = document.getElementById('pieChart1');
        var chart1 = null;
        if (ctx1) {
            chart1 = new Chart(ctx1.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Diaktifkan (Sambung Baru + Buka)', 'Diputus (Tutup + Putus)'],
                    datasets: [{
                        data: [601, 70],
                        backgroundColor: ['#10b981', '#ef4444'],
                        borderWidth: 2,
                        borderColor: colors.borderColor
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: { fontColor: colors.labelColor }
                    }
                }
            });
        }

        // Pie Chart 2
        var ctx2 = document.getElementById('pieChart2');
        var chart2 = null;
        if (ctx2) {
            chart2 = new Chart(ctx2.getContext('2d'), {
                type: 'pie',
                data: {
                    labels: ['Pelanggan Aktif', 'Pelanggan Tutup / Putus'],
                    datasets: [{
                        data: [37707, 3120],
                        backgroundColor: ['#0284c7', '#f59e0b'],
                        borderWidth: 2,
                        borderColor: colors.borderColor
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: { fontColor: colors.labelColor }
                    }
                }
            });
        }

        window.addEventListener('simpatikThemeChanged', function() {
            var c = getThemeColors();
            if (chart1) {
                chart1.options.legend.labels.fontColor = c.labelColor;
                chart1.data.datasets[0].borderColor = c.borderColor;
                chart1.update();
            }
            if (chart2) {
                chart2.options.legend.labels.fontColor = c.labelColor;
                chart2.data.datasets[0].borderColor = c.borderColor;
                chart2.update();
            }
        });
    });
</script>
@endpush

