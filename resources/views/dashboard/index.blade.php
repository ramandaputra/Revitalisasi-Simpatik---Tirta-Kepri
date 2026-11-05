@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Dashboard Pemantauan Kinerja')

@section('content')
<!-- Page Header -->
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Dashboard Pemantauan Kinerja</h2>
                <span class="text-muted">SIMPATIK V3.0 &bull; Sistem Terpadu Pemantauan & Analisis Kinerja PDAM</span>
            </div>
            <div>
                <a href="{{ route('gis.index') }}" class="btn btn-primary btn-sm mr-2" title="Buka Peta GIS">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="mr-1" style="vertical-align: -2px;">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    Peta GIS
                </a>
                @auth
                    <a href="{{ route('spka.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="la la-plus"></i> Lapor SPKA
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- 4 Performance Aspects Overview -->
<div class="row flex-row">
    @forelse ($aspekSummaries as $aspek)
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="widget widget-09 has-shadow p-3 h-100">
                <div class="media d-flex align-items-center">
                    <div class="media-body">
                        <div class="text-muted small text-uppercase font-weight-bold">{{ $aspek['nama'] }}</div>
                        <div class="font-weight-bold h4 mt-2" style="color: var(--text-heading);">
                            Skor: <span class="text-primary">{{ $aspek['score'] }}</span>
                        </div>
                        <div class="small text-muted">
                            Total Bobot: <span class="text-info">{{ $aspek['bobot'] }}</span>
                        </div>
                    </div>
                    <div class="ml-3">
                        @if ($aspek['id'] == 1)
                            <i class="bi bi-cash-stack text-primary" style="font-size: 2.5rem;"></i>
                        @elseif ($aspek['id'] == 2)
                            <i class="la la-users text-primary" style="font-size: 2.5rem;"></i>
                        @elseif ($aspek['id'] == 3)
                            <i class="la la-tint text-primary" style="font-size: 2.5rem;"></i>
                        @else
                            <i class="bi bi-person-up text-primary" style="font-size: 2.5rem;"></i>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="widget widget-09 has-shadow p-3 h-100">
                <div class="media d-flex align-items-center">
                    <div class="media-body">
                        <div class="text-muted small text-uppercase font-weight-bold">Aspek Keuangan</div>
                        <div class="font-weight-bold h4 mt-2" style="color: var(--text-heading);">Skor: <span class="text-primary">3.85</span></div>
                        <div class="small text-muted">Total Bobot: <span class="text-info">0.25</span></div>
                    </div>
                    <div class="ml-3">
                        <i class="bi bi-cash-stack text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="widget widget-09 has-shadow p-3 h-100">
                <div class="media d-flex align-items-center">
                    <div class="media-body">
                        <div class="text-muted small text-uppercase font-weight-bold">Aspek Pelayanan</div>
                        <div class="font-weight-bold h4 mt-2" style="color: var(--text-heading);">Skor: <span class="text-info">4.10</span></div>
                        <div class="small text-muted">Total Bobot: <span class="text-info">0.25</span></div>
                    </div>
                    <div class="ml-3">
                        <i class="la la-users text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="widget widget-09 has-shadow p-3 h-100">
                <div class="media d-flex align-items-center">
                    <div class="media-body">
                        <div class="text-muted small text-uppercase font-weight-bold">Aspek Operasional</div>
                        <div class="font-weight-bold h4 mt-2" style="color: var(--text-heading);">Skor: <span class="text-success">3.90</span></div>
                        <div class="small text-muted">Total Bobot: <span class="text-info">0.35</span></div>
                    </div>
                    <div class="ml-3">
                        <i class="la la-tint text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="widget widget-09 has-shadow p-3 h-100">
                <div class="media d-flex align-items-center">
                    <div class="media-body">
                        <div class="text-muted small text-uppercase font-weight-bold">Aspek SDM</div>
                        <div class="font-weight-bold h4 mt-2" style="color: var(--text-heading);">Skor: <span class="text-warning">4.20</span></div>
                        <div class="small text-muted">Total Bobot: <span class="text-info">0.15</span></div>
                    </div>
                    <div class="ml-3">
                        <i class="bi bi-person-up text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
</div>

<!-- SCADA / Telemetry Real-time Waduk Cards -->
<div class="row">
    <div class="col-12">
        <div class="widget has-shadow mb-4">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4 class="mb-0"><i class="la la-bolt mr-2 text-primary"></i>Status Telemetri & Produksi IPA Real-time</h4>
            </div>
            <div class="widget-body">
                <div class="row">
                    @php
                        $wadukCodes = [
                            'Sei Pulai' => 'spl',
                            'Sei Gesek' => 'gsk',
                            'Sei Jago' => 'sjg',
                            'Kolong Enam' => 'kle',
                        ];
                    @endphp

                    @foreach ($waduks as $w)
                        @php $code = $wadukCodes[$w] ?? 'oth'; @endphp
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border shadow-sm h-100" style="background: var(--bg-card); border-color: var(--border-color) !important;">
                                <div class="card-header font-weight-bold d-flex justify-content-between align-items-center" style="background: var(--bg-card-header); border-bottom: 1px solid var(--border-color);">
                                    <span style="color: var(--color-primary);"><i class="la la-tint mr-1"></i> {{ $w }}</span>
                                    <span class="badge badge-info" id="tma-{{ $code }}">TMA: Normal</span>
                                </div>
                                <div class="card-body p-3">
                                    <!-- Produksi -->
                                    <div class="mb-3">
                                        <small class="text-muted d-block">PRODUKSI BULAN INI</small>
                                        <div id="produksi-stats-{{ $code }}" class="h5 font-weight-bold mb-0" style="color: var(--text-heading);">
                                            {{ isset($produksiStats[$w]) ? format_m3($produksiStats[$w]) : 'Memuat...' }}
                                        </div>
                                    </div>

                                    <!-- Pompa -->
                                    <div class="mb-3">
                                        <small class="text-muted d-block">STATUS POMPA</small>
                                        <div id="pump-stats-{{ $code }}" class="small">
                                            @if (!empty($pumpStatuses[$w]))
                                                @foreach ($pumpStatuses[$w] as $p)
                                                    <div>
                                                        {{ $p['nama'] }}:
                                                        <span class="{{ $p['is_on'] ? 'pump-indicator-on' : 'pump-indicator-off' }}">
                                                            {{ $p['is_on'] ? 'Running' : 'Stop' }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-muted">Memeriksa status...</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Tekanan Logger -->
                                    <div>
                                        <small class="text-muted d-block">TEKANAN (LOGGER)</small>
                                        <div id="press-stats-{{ $code }}" class="small font-weight-bold text-info">
                                            Memuat tekanan...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Skematik Animasi Alur Proses Produksi IPA (GIF Animasi Real-time) -->
<div class="row">
    <div class="col-12">
        <div class="widget has-shadow mb-4">
            <div class="widget-header bordered d-flex align-items-center justify-content-between flex-wrap" style="gap: 10px;">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0"><i class="la la-cogs mr-2 text-primary"></i>Skematik Alur Proses Produksi IPA (Real-time Flow)</h4>
                </div>
                <div class="d-flex align-items-center flex-wrap" style="gap: 8px;">
                    <div class="btn-group btn-group-sm" role="group" aria-label="Carousel Controls">
                        <button type="button" class="btn btn-outline-secondary px-2" id="ipaCarouselPrev" title="IPA Sebelumnya" style="height: 30px; width: 34px; padding: 0 !important;">
                            <i class="la la-angle-left font-weight-bold" style="font-size: 16px;"></i>
                        </button>
                        <button type="button" class="btn btn-outline-secondary px-2" id="ipaCarouselNext" title="IPA Selanjutnya" style="height: 30px; width: 34px; padding: 0 !important;">
                            <i class="la la-angle-right font-weight-bold" style="font-size: 16px;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="widget-body p-0 position-relative">
                <div class="ipa-carousel-viewport" id="ipaCarouselContainer" style="position: relative; overflow: hidden; width: 100%; border-radius: 0 0 var(--radius-md) var(--radius-md); background: #0f172a;">
                    <div class="ipa-carousel-track" id="ipaCarouselTrack" style="display: flex; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1); width: 100%;">
                        <!-- 1. IPA Waduk Sei Pulai (WK) -->
                        <div class="ipa-carousel-slide" style="min-width: 100%; position: relative; text-align: center; background: #0f172a;">
                            <img src="{{ asset('assets/img/gif/GIF_WK.gif') }}" alt="IPA Waduk Sei Pulai (WK)" style="width: 100%; max-height: 480px; object-fit: contain; display: block; margin: 0 auto;">
                            <div class="carousel-caption-badge" style="position: absolute; top: 14px; left: 16px; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(4px); color: #ffffff; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; border: 1px solid rgba(255,255,255,0.15); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                <i class="la la-tint mr-1 text-primary"></i> IPA Waduk Sei Pulai (WK)
                            </div>
                        </div>

                        <!-- 2. IPA RPD -->
                        <div class="ipa-carousel-slide" style="min-width: 100%; position: relative; text-align: center; background: #0f172a;">
                            <img src="{{ asset('assets/img/gif/GIF_RPD.gif') }}" alt="IPA RPD" style="width: 100%; max-height: 480px; object-fit: contain; display: block; margin: 0 auto;">
                            <div class="carousel-caption-badge" style="position: absolute; top: 14px; left: 16px; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(4px); color: #ffffff; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; border: 1px solid rgba(255,255,255,0.15); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                <i class="la la-tint mr-1 text-primary"></i> IPA RPD
                            </div>
                        </div>

                        <!-- 3. IPA PSAB -->
                        <div class="ipa-carousel-slide" style="min-width: 100%; position: relative; text-align: center; background: #0f172a;">
                            <img src="{{ asset('assets/img/gif/GIF_PSAB.gif') }}" alt="IPA PSAB" style="width: 100%; max-height: 480px; object-fit: contain; display: block; margin: 0 auto;">
                            <div class="carousel-caption-badge" style="position: absolute; top: 14px; left: 16px; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(4px); color: #ffffff; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; border: 1px solid rgba(255,255,255,0.15); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                <i class="la la-tint mr-1 text-primary"></i> IPA PSAB
                            </div>
                        </div>

                        <!-- 4. IPA PCM -->
                        <div class="ipa-carousel-slide" style="min-width: 100%; position: relative; text-align: center; background: #0f172a;">
                            <img src="{{ asset('assets/img/gif/GIF_PCM.gif') }}" alt="IPA PCM" style="width: 100%; max-height: 480px; object-fit: contain; display: block; margin: 0 auto;">
                            <div class="carousel-caption-badge" style="position: absolute; top: 14px; left: 16px; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(4px); color: #ffffff; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; border: 1px solid rgba(255,255,255,0.15); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                <i class="la la-tint mr-1 text-primary"></i> IPA PCM
                            </div>
                        </div>

                        <!-- 5. IPA Sei Gesek -->
                        <div class="ipa-carousel-slide" style="min-width: 100%; position: relative; text-align: center; background: #0f172a;">
                            <img src="{{ asset('assets/img/gif/GIF_GESEK.gif') }}" alt="IPA Sei Gesek" style="width: 100%; max-height: 480px; object-fit: contain; display: block; margin: 0 auto;">
                            <div class="carousel-caption-badge" style="position: absolute; top: 14px; left: 16px; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(4px); color: #ffffff; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; border: 1px solid rgba(255,255,255,0.15); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                <i class="la la-tint mr-1 text-primary"></i> IPA Sei Gesek
                            </div>
                        </div>

                        <!-- 6. Paket IPA Moduler -->
                        <div class="ipa-carousel-slide" style="min-width: 100%; position: relative; text-align: center; background: #0f172a;">
                            <img src="{{ asset('assets/img/gif/PAKET IPA - GIF.gif') }}" alt="Paket IPA Moduler" style="width: 100%; max-height: 480px; object-fit: contain; display: block; margin: 0 auto;">
                            <div class="carousel-caption-badge" style="position: absolute; top: 14px; left: 16px; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(4px); color: #ffffff; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 600; border: 1px solid rgba(255,255,255,0.15); box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                <i class="la la-tint mr-1 text-primary"></i> Paket IPA Moduler
                            </div>
                        </div>
                    </div>

                    <!-- Slide Indicator Dots -->
                    <div class="ipa-carousel-dots" id="ipaCarouselDots" style="position: absolute; bottom: 14px; left: 0; right: 0; display: flex; justify-content: center; gap: 8px; z-index: 10;">
                        <span class="ipa-dot active" data-index="0" style="width: 24px; height: 6px; border-radius: 3px; background: #0284c7; cursor: pointer; transition: all 0.25s ease;"></span>
                        <span class="ipa-dot" data-index="1" style="width: 8px; height: 6px; border-radius: 3px; background: rgba(255,255,255,0.4); cursor: pointer; transition: all 0.25s ease;"></span>
                        <span class="ipa-dot" data-index="2" style="width: 8px; height: 6px; border-radius: 3px; background: rgba(255,255,255,0.4); cursor: pointer; transition: all 0.25s ease;"></span>
                        <span class="ipa-dot" data-index="3" style="width: 8px; height: 6px; border-radius: 3px; background: rgba(255,255,255,0.4); cursor: pointer; transition: all 0.25s ease;"></span>
                        <span class="ipa-dot" data-index="4" style="width: 8px; height: 6px; border-radius: 3px; background: rgba(255,255,255,0.4); cursor: pointer; transition: all 0.25s ease;"></span>
                        <span class="ipa-dot" data-index="5" style="width: 8px; height: 6px; border-radius: 3px; background: rgba(255,255,255,0.4); cursor: pointer; transition: all 0.25s ease;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart & SPKA Status -->
<div class="row">
    <!-- Produksi Chart -->
    <div class="col-xl-8 col-md-12 mb-4">
        <div class="widget has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-bar-chart mr-2 text-primary"></i>Tren Produksi Air: Target vs Realisasi (m³)</h4>
                <a href="{{ route('teknik.produksi') }}" class="btn btn-sm btn-outline-secondary">Detail</a>
            </div>
            <div class="widget-body">
                <canvas id="produksiChart" height="140"></canvas>
            </div>
        </div>
    </div>

    <!-- SPKA Field Activities -->
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="widget has-shadow h-100">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-wrench mr-2 text-primary"></i>Tiket SPKA Lapangan</h4>
                <a href="{{ route('spka.index') }}" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
            </div>
            <div class="widget-body d-flex flex-column justify-content-around">
                <div class="d-flex justify-content-between align-items-center p-3 mb-2 rounded border" style="background: var(--bg-card-alt); border-color: var(--border-color) !important;">
                    <div>
                        <span class="text-muted small d-block">TOTAL TIKET</span>
                        <h4 class="mb-0 font-weight-bold" style="color: var(--text-heading);">{{ $spkaSummary['total'] }}</h4>
                    </div>
                    <i class="bi bi-ticket-detailed text-primary" style="font-size: 2rem;"></i>
                </div>

                <div class="d-flex justify-content-between align-items-center p-3 mb-2 rounded border" style="background: var(--bg-card-alt); border-color: var(--border-color) !important;">
                    <div>
                        <span class="text-muted small d-block">SELESAI DITANGANI</span>
                        <h4 class="mb-0 text-success font-weight-bold">{{ $spkaSummary['selesai'] }}</h4>
                    </div>
                    <i class="la la-check-circle text-success" style="font-size: 2rem;"></i>
                </div>

                <div class="d-flex justify-content-between align-items-center p-3 mb-2 rounded border" style="background: var(--bg-card-alt); border-color: var(--border-color) !important;">
                    <div>
                        <span class="text-muted small d-block">DALAM PROSES</span>
                        <h4 class="mb-0 text-warning font-weight-bold">{{ $spkaSummary['proses'] }}</h4>
                    </div>
                    <i class="la la-hourglass-half text-warning" style="font-size: 2rem;"></i>
                </div>

                <div class="d-flex justify-content-between align-items-center p-3 rounded border" style="background: var(--bg-card-alt); border-color: var(--border-color) !important;">
                    <div>
                        <span class="text-muted small d-block">BELUM DITINDAKLANJUTI</span>
                        <h4 class="mb-0 text-danger font-weight-bold">{{ $spkaSummary['belum'] }}</h4>
                    </div>
                    <i class="la la-exclamation-circle text-danger" style="font-size: 2rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kualitas Air Terkini Table -->
<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4><i class="la la-flask mr-2 text-primary"></i>Hasil Uji Kualitas Air Terkini</h4>
                <a href="{{ route('teknik.kualitas-air') }}" class="btn btn-sm btn-outline-secondary">Laporan Lengkap</a>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Waktu</th>
                                <th>Lokasi / Titik Sampel</th>
                                <th>Waduk / IPA</th>
                                <th>Warna (PtCo)</th>
                                <th>Kekeruhan (NTU)</th>
                                <th>TDS (mg/L)</th>
                                <th>pH</th>
                                <th>Sisa Chlor (mg/L)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kualitasAir as $item)
                                <tr>
                                    <td>{{ format_tanggal_id($item->waktu) }}</td>
                                    <td><strong>{{ $item->lokasi }}</strong></td>
                                    <td>{{ $item->waduk }}</td>
                                    <td>{{ $item->warna ?? '-' }}</td>
                                    <td>{{ $item->kekeruhan ?? '-' }}</td>
                                    <td>{{ $item->tds ?? '-' }}</td>
                                    <td>{{ $item->ph ?? '-' }}</td>
                                    <td>{{ $item->scl ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>{{ date('d-m-Y H:i') }}</td>
                                    <td><strong>Air Baku Sei Pulai</strong></td>
                                    <td>Sei Pulai</td>
                                    <td>11</td>
                                    <td>2.91</td>
                                    <td>1</td>
                                    <td>6.3</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d-m-Y H:i') }}</td>
                                    <td><strong>Pengolahan Air RPD</strong></td>
                                    <td>Sei Pulai</td>
                                    <td>&lt; 1</td>
                                    <td>0.37</td>
                                    <td>9</td>
                                    <td>6.9</td>
                                    <td>0.38</td>
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
    // 1. Chart.js target vs realisasi
    $(document).ready(function() {
        var ctx = document.getElementById('produksiChart');
        if (ctx) {
            function getChartColors() {
                var isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                return {
                    labelColor: isDark ? '#cbd5e1' : '#334155',
                    tickColor: isDark ? '#94a3b8' : '#64748b',
                    gridColor: isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)'
                };
            }

            var colors = getChartColors();
            var labels = {!! json_encode(!empty($chartData['labels']) ? $chartData['labels'] : ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt']) !!};
            var targetData = {!! json_encode(!empty($chartData['target']) ? $chartData['target'] : [600000, 620000, 610000, 630000, 640000, 645000]) !!};
            var realisasiData = {!! json_encode(!empty($chartData['realisasi']) ? $chartData['realisasi'] : [650000, 670000, 660000, 680000, 690000, 695000]) !!};

            var produksiChart = new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Target (m³)',
                            data: targetData,
                            backgroundColor: 'rgba(59, 130, 246, 0.4)',
                            borderColor: '#3b82f6',
                            borderWidth: 1.5
                        },
                        {
                            label: 'Realisasi (m³)',
                            data: realisasiData,
                            backgroundColor: 'rgba(16, 185, 129, 0.6)',
                            borderColor: '#10b981',
                            borderWidth: 1.5
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        labels: { fontColor: colors.labelColor }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: colors.tickColor,
                                callback: function(value) {
                                    return value.toLocaleString('id-ID');
                                }
                            },
                            gridLines: { color: colors.gridColor }
                        }],
                        xAxes: [{
                            ticks: { fontColor: colors.tickColor },
                            gridLines: { color: colors.gridColor }
                        }]
                    }
                }
            });

            window.addEventListener('simpatikThemeChanged', function() {
                var c = getChartColors();
                if (produksiChart) {
                    produksiChart.options.legend.labels.fontColor = c.labelColor;
                    produksiChart.options.scales.yAxes[0].ticks.fontColor = c.tickColor;
                    produksiChart.options.scales.yAxes[0].gridLines.color = c.gridColor;
                    produksiChart.options.scales.xAxes[0].ticks.fontColor = c.tickColor;
                    produksiChart.options.scales.xAxes[0].gridLines.color = c.gridColor;
                    produksiChart.update();
                }
            });
        }
    });

    // 2. Real-time telemetry auto-polling
    function fetchPumpStatus() {
        $.ajax({
            url: '{{ route("api.status-pompa") }}',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var wadukData = {
                    'Sei Pulai': '#pump-stats-spl',
                    'Sei Gesek': '#pump-stats-gsk',
                    'Sei Jago': '#pump-stats-sjg',
                    'Kolong Enam': '#pump-stats-kle'
                };

                if (Array.isArray(response) && response.length > 0) {
                    Object.values(wadukData).forEach(function(selector) {
                        $(selector).empty();
                    });

                    response.forEach(function(pump) {
                        var isRunning = pump.status.toLowerCase() === 'on';
                        var badgeClass = isRunning ? 'pump-indicator-on' : 'pump-indicator-off';
                        var statusText = isRunning ? 'Running' : 'Stop';
                        var html = '<div>' + pump.pompa + ': <span class="' + badgeClass + '">' + statusText + '</span></div>';

                        if (wadukData[pump.waduk]) {
                            $(wadukData[pump.waduk]).append(html);
                        }
                    });
                }
            }
        });
    }

    function fetchPressureStatus() {
        $.ajax({
            url: '{{ route("api.status-loger") }}',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var wadukMap = {
                    'Sei Pulai': ['hdpe', 'pcm', 'wk'],
                    'Sei Gesek': ['gesek'],
                    'Sei Jago': ['sjg'],
                    'Kolong Enam': ['kle']
                };
                var containerMap = {
                    'Sei Pulai': '#press-stats-spl',
                    'Sei Gesek': '#press-stats-gsk',
                    'Sei Jago': '#press-stats-sjg',
                    'Kolong Enam': '#press-stats-kle'
                };

                if (Array.isArray(response)) {
                    Object.keys(wadukMap).forEach(function(waduk) {
                        var targetKeys = wadukMap[waduk];
                        var container = $(containerMap[waduk]);
                        container.empty();

                        var filtered = response.filter(function(item) {
                            return targetKeys.indexOf(item.NAME.toLowerCase()) !== -1;
                        });

                        if (filtered.length > 0) {
                            filtered.forEach(function(item) {
                                container.append('<div>' + item.NAME.toUpperCase() + ': ' + item.pressure + ' bar</div>');
                            });
                        } else {
                            container.text('Normal');
                        }
                    });
                }
            }
        });
    }

    $(document).ready(function() {
        fetchPumpStatus();
        fetchPressureStatus();
        setInterval(fetchPumpStatus, 5000);
        setInterval(fetchPressureStatus, 5000);
    });
    // 3. IPA Schematic GIF Carousel Controller
    $(document).ready(function() {
        var ipaTrack = document.getElementById('ipaCarouselTrack');
        var ipaDots = document.querySelectorAll('#ipaCarouselDots .ipa-dot');
        var prevBtn = document.getElementById('ipaCarouselPrev');
        var nextBtn = document.getElementById('ipaCarouselNext');
        var carouselContainer = document.getElementById('ipaCarouselContainer');

        if (ipaTrack && ipaDots.length > 0) {
            var currentIndex = 0;
            var totalSlides = ipaDots.length;
            var autoPlayInterval = null;

            function goToSlide(index) {
                if (index < 0) {
                    currentIndex = totalSlides - 1;
                } else if (index >= totalSlides) {
                    currentIndex = 0;
                } else {
                    currentIndex = index;
                }

                ipaTrack.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';

                ipaDots.forEach(function(dot, idx) {
                    if (idx === currentIndex) {
                        dot.classList.add('active');
                        dot.style.width = '24px';
                        dot.style.background = '#0284c7';
                    } else {
                        dot.classList.remove('active');
                        dot.style.width = '8px';
                        dot.style.background = 'rgba(255,255,255,0.4)';
                    }
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    goToSlide(currentIndex - 1);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    goToSlide(currentIndex + 1);
                });
            }

            ipaDots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                    var idx = parseInt(this.getAttribute('data-index'), 10);
                    goToSlide(idx);
                });
            });

            // Auto-advance every 6 seconds
            function startAutoPlay() {
                if (!autoPlayInterval) {
                    autoPlayInterval = setInterval(function() {
                        goToSlide(currentIndex + 1);
                    }, 6000);
                }
            }

            function stopAutoPlay() {
                if (autoPlayInterval) {
                    clearInterval(autoPlayInterval);
                    autoPlayInterval = null;
                }
            }

            startAutoPlay();

            if (carouselContainer) {
                carouselContainer.addEventListener('mouseenter', stopAutoPlay);
                carouselContainer.addEventListener('mouseleave', startAutoPlay);
            }
        }
    });

</script>
@endpush
