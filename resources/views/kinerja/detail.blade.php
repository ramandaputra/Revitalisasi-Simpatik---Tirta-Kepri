@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - ' . $targetMeta['title'])

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">{{ $targetMeta['title'] }}</h2>
                <span class="text-muted"><i class="la la-tag mr-1 text-primary"></i>{{ $targetMeta['aspek'] }}</span>
            </div>
            <div>
                <a href="{{ route('kinerja.index') }}" class="btn btn-outline-secondary btn-sm mr-2">
                    <i class="la la-arrow-left"></i> Ringkasan Indikator
                </a>
                @auth
                    @if ($targetMeta['aspek_id'] == 1)
                        <a href="{{ route('kinerja.input.keuangan') }}" class="btn btn-primary btn-sm">
                            <i class="la la-plus"></i> Input Kinerja Keuangan
                        </a>
                    @elseif ($targetMeta['aspek_id'] == 2)
                        <a href="{{ route('kinerja.input.pelayanan') }}" class="btn btn-primary btn-sm">
                            <i class="la la-plus"></i> Input Kinerja Pelayanan
                        </a>
                    @elseif ($targetMeta['aspek_id'] == 3)
                        <a href="{{ route('kinerja.input.operasional') }}" class="btn btn-primary btn-sm">
                            <i class="la la-plus"></i> Input Kinerja Operasional
                        </a>
                    @else
                        <a href="{{ route('kinerja.input.sdm') }}" class="btn btn-primary btn-sm">
                            <i class="la la-plus"></i> Input Kinerja SDM
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- 3 Stat Widgets Row -->
<div class="row flex-row">
    <!-- Widget Data -->
    <div class="col-xl-5 col-md-6 mb-4">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center">
                <h2><i class="la la-database mr-2 text-info"></i>Data Variabel Capaian Terakhir</h2>
            </div>
            <div class="widget-body d-flex flex-column my-auto p-4 text-center">
                <div class="some-stats stat-highlight-box mb-3 p-3 rounded">
                    <h5 class="text-muted text-uppercase mb-1" style="font-size: 13px;">{{ $latest->deskripsi1 ?? 'Variabel 1' }}</h5>
                    <h2 class="number text-info font-weight-bold mb-0">
                        {{ $latest && $latest->data1 !== null ? format_number_id($latest->data1) : '0' }}
                    </h2>
                </div>
                <div class="some-stats stat-highlight-box p-3 rounded">
                    <h5 class="text-muted text-uppercase mb-1" style="font-size: 13px;">{{ $latest->deskripsi2 ?? 'Variabel 2' }}</h5>
                    <h2 class="number text-info font-weight-bold mb-0">
                        {{ $latest && $latest->data2 !== null ? format_number_id($latest->data2) : '0' }}
                    </h2>
                </div>
                @if ($latest)
                    <div class="mt-3 text-muted" style="font-size: 12px;">
                        <i class="la la-calendar"></i> Periode Terakhir: {{ format_tanggal_id($latest->periode) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Widget Hasil / Rasio -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center">
                <h2><i class="la la-pie-chart mr-2 text-primary"></i>Hasil / Rasio</h2>
            </div>
            <div class="widget-body d-flex flex-column justify-content-center align-items-center p-4 text-center">
                <div class="p-4 rounded-circle border border-primary d-flex flex-column justify-content-center align-items-center" style="width: 140px; height: 140px; background: rgba(59, 130, 246, 0.08);">
                    <h2 class="font-weight-bold text-primary mb-0" style="font-size: 28px;">{{ $currentHasil }}</h2>
                    <span class="text-muted" style="font-size: 13px;">{{ $targetMeta['satuan'] ?? '' }}</span>
                </div>
                <div class="mt-3">
                    <span class="badge badge-primary px-3 py-1">Capaian Indikator</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Widget Nilai Kinerja & Bintang -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="widget widget-34 has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h2><i class="la la-star mr-2 text-warning"></i>Nilai & Kinerja</h2>
                <span class="badge badge-warning px-2 py-1">Bobot: {{ $targetMeta['bobot'] }}</span>
            </div>
            <div class="widget-body d-flex flex-column justify-content-center align-items-center p-4 text-center">
                <h1 class="font-weight-bold text-warning mb-2" style="font-size: 48px;">
                    {{ number_format($score, 2) }}
                </h1>
                <div class="star-rating mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $stars)
                            <i class="la la-star text-warning" style="font-size: 26px;"></i>
                        @else
                            <i class="la la-star-o text-muted" style="font-size: 26px;"></i>
                        @endif
                    @endfor
                </div>
                <p class="text-muted mb-0" style="font-size: 13px;">
                    Klasifikasi:
                    @if ($score >= 4.5)
                        <strong class="text-success">Sangat Baik (Bintang 5)</strong>
                    @elseif ($score >= 3.5)
                        <strong class="text-info">Baik (Bintang 4)</strong>
                    @elseif ($score >= 2.5)
                        <strong class="text-primary">Cukup (Bintang 3)</strong>
                    @elseif ($score >= 1.5)
                        <strong class="text-warning">Kurang (Bintang 2)</strong>
                    @else
                        <strong class="text-danger">Buruk (Bintang 1)</strong>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Row Grafik Kinerja -->
<div class="row flex-row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="widget widget-09 has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h2><i class="la la-line-chart mr-2 text-primary"></i>Grafik Perkembangan {{ $targetMeta['title'] }}</h2>
                <span class="text-muted" style="font-size: 12px;">Tren 12 Periode Terakhir</span>
            </div>
            <div class="widget-body">
                <div class="chart-container" style="position: relative; height: 320px; width: 100%;">
                    <canvas id="indikatorChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Standar Penilaian BPPSPAM & Rumus -->
<div class="row">
    <div class="col-xl-12 mb-4">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center">
                <h4><i class="la la-info-circle mr-2 text-info"></i>Standar Penilaian BPPSPAM & Metodologi Perhitungan</h4>
            </div>
            <div class="widget-body">
                <div class="p-3 mb-4 rounded stat-highlight-box" style="border-left: 4px solid #3b82f6;">
                    <h5 class="text-primary font-weight-bold mb-2">
                        <i class="la la-calculator mr-1"></i> Rumus: {{ $targetMeta['formula'] }}
                    </h5>
                    <p class="text-body mb-1">{{ $targetMeta['deskripsi'] }}</p>
                    <span class="badge badge-info">Bobot Aspek: {{ $targetMeta['bobot'] }}</span>
                </div>

                @if (!empty($targetMeta['standards']))
                    <h5 class="font-weight-bold mb-2">Tabel Kriteria Penilaian:</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 200px;">Nilai Kinerja</th>
                                    <th>Batasan / Kriteria Parameter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($targetMeta['standards'] as $std)
                                    <tr>
                                        <td>
                                            <span class="badge badge-warning px-2 py-1">{{ $std['nilai'] }}</span>
                                        </td>
                                        <td>{{ $std['syarat'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Catatan Evaluasi -->
<div class="row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-history mr-2 text-warning"></i>Riwayat Evaluasi Kinerja (Database kepri_kinerja)</h4>
                <span class="badge badge-secondary">{{ $records->count() }} Data Tercatat</span>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Periode</th>
                                <th>{{ $latest->deskripsi1 ?? 'Variabel 1' }}</th>
                                <th>{{ $latest->deskripsi2 ?? 'Variabel 2' }}</th>
                                <th>Hasil / Rasio</th>
                                <th>Skor</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($records as $rec)
                                <tr>
                                    <td class="text-center font-weight-bold">{{ format_tanggal_id($rec->periode) }}</td>
                                    <td class="text-right">{{ $rec->data1 !== null ? format_number_id($rec->data1) : '-' }}</td>
                                    <td class="text-right">{{ $rec->data2 !== null ? format_number_id($rec->data2) : '-' }}</td>
                                    <td class="text-center"><span class="badge badge-primary px-2 py-1">{{ $rec->hasil ?? '-' }} {{ $targetMeta['satuan'] ?? '' }}</span></td>
                                    <td class="text-center"><span class="badge badge-success px-2 py-1">{{ $rec->score ?? '-' }}</span></td>
                                    <td class="text-center">{{ $rec->bobot ?? $targetMeta['bobot'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="la la-folder-open-o la-2x d-block mb-2"></i>
                                        Belum ada riwayat catatan evaluasi untuk indikator ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
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
        var ctx = document.getElementById('indikatorChart');
        if (ctx) {
            var records = {!! json_encode($records->reverse()->values()) !!};
            var labels = records.length ? records.map(function(r) { return r.periode; }) : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
            var scores = records.length ? records.map(function(r) { return parseFloat(r.score) || 0; }) : [3.5, 4.0, 4.0, 4.5, 4.2, {{ $score }}];
            var hasils = records.length ? records.map(function(r) { return parseFloat(r.hasil) || 0; }) : [70, 75, 80, 85, 82, {{ (float)$currentHasil }}];

            function getThemeColors() {
                var isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                return {
                    labelColor: isDark ? '#cbd5e1' : '#334155',
                    tickColor: isDark ? '#94a3b8' : '#64748b',
                    gridColor: isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)'
                };
            }

            var colors = getThemeColors();

            var chart = new Chart(ctx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Skor (1-5)',
                            data: scores,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.15)',
                            fill: true,
                            tension: 0.3,
                            yAxisID: 'y-score',
                            pointRadius: 4,
                            pointBackgroundColor: '#10b981'
                        },
                        {
                            label: 'Hasil / Rasio ({{ $targetMeta["satuan"] ?? "" }})',
                            data: hasils,
                            borderColor: '#0284c7',
                            backgroundColor: 'transparent',
                            borderDash: [5, 5],
                            tension: 0.3,
                            yAxisID: 'y-hasil',
                            pointRadius: 4,
                            pointBackgroundColor: '#0284c7'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { labels: { fontColor: colors.labelColor } },
                    scales: {
                        yAxes: [
                            {
                                id: 'y-score',
                                position: 'left',
                                ticks: {
                                    fontColor: '#10b981',
                                    min: 0,
                                    max: 5,
                                    stepSize: 1
                                },
                                gridLines: { color: colors.gridColor },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Skor (1-5)',
                                    fontColor: '#10b981'
                                }
                            },
                            {
                                id: 'y-hasil',
                                position: 'right',
                                ticks: { fontColor: '#0284c7' },
                                gridLines: { drawOnChartArea: false },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Hasil Rasio',
                                    fontColor: '#0284c7'
                                }
                            }
                        ],
                        xAxes: [{
                            ticks: { fontColor: colors.tickColor },
                            gridLines: { color: colors.gridColor }
                        }]
                    }
                }
            });

            window.addEventListener('simpatikThemeChanged', function() {
                var c = getThemeColors();
                chart.options.legend.labels.fontColor = c.labelColor;
                chart.options.scales.yAxes[0].gridLines.color = c.gridColor;
                chart.options.scales.xAxes[0].ticks.fontColor = c.tickColor;
                chart.options.scales.xAxes[0].gridLines.color = c.gridColor;
                chart.update();
            });
        }
    });
</script>
@endpush
