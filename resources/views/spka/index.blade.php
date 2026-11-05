@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Kegiatan SPKA Lapangan')

@push('styles')
<style>
    .spka-stat-card {
        border-radius: 8px;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        border: 2px solid rgba(0, 0, 0, 0.08) !important;
    }
    .spka-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08) !important;
    }
    .spka-stat-card.active-card-primary {
        border-color: #0284c7 !important;
    }
    .spka-stat-card.active-card-success {
        border-color: #16a34a !important;
    }
    .spka-stat-card.active-card-warning {
        border-color: #d97706 !important;
    }
    .spka-stat-card.active-card-danger {
        border-color: #dc2626 !important;
    }
    html[data-theme="dark"] .spka-stat-card {
        border: 2px solid rgba(255, 255, 255, 0.1) !important;
    }
    html[data-theme="dark"] .spka-stat-card.active-card-primary {
        border-color: #38bdf8 !important;
    }
    html[data-theme="dark"] .spka-stat-card.active-card-success {
        border-color: #4ade80 !important;
    }
    html[data-theme="dark"] .spka-stat-card.active-card-warning {
        border-color: #fbbf24 !important;
    }
    html[data-theme="dark"] .spka-stat-card.active-card-danger {
        border-color: #f87171 !important;
    }
    .table-spka th {
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        vertical-align: middle !important;
    }
    .table-spka td {
        vertical-align: middle !important;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <div>
                <h2 class="page-header-title">Surat Perintah Kerja & Aksi (SPKA)</h2>
                <span class="text-muted">Manajemen Tiket Temuan Kebocoran, Perbaikan, & Pemantauan Lapangan</span>
            </div>
            <div class="mt-2 mt-md-0">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm mr-2">
                    <i class="bi bi-columns-gap mr-1"></i> Dashboard
                </a>
                <a href="{{ route('spka.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle mr-1"></i> Buat Laporan Baru
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Counter / Kolom Status Kegiatan -->
<div class="row flex-row mb-4">
    <!-- Kolom 1: Semua Tiket -->
    <div class="col-xl-3 col-md-6 mb-3">
        <a href="{{ route('spka.index', $dmaFilter ? ['dma' => $dmaFilter] : []) }}" class="d-block h-100 text-decoration-none">
            <div class="widget widget-12 has-shadow h-100 spka-stat-card {{ $status === null ? 'active-card-primary' : '' }}">
                <div class="widget-body p-3">
                    <div class="media align-items-center">
                        <div class="align-self-center mr-3">
                            <i class="bi bi-ticket-detailed text-primary" style="font-size: 34px;"></i>
                        </div>
                        <div class="pelanggan-stats align-self-center">
                            <div class="title text-muted text-uppercase small font-weight-bold">Semua Tiket</div>
                            <div class="number text-primary font-weight-bold" style="font-size: 26px;">{{ $stats['total'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kolom 2: Selesai Ditangani -->
    <div class="col-xl-3 col-md-6 mb-3">
        <a href="{{ route('spka.index', array_merge(['status' => '1'], $dmaFilter ? ['dma' => $dmaFilter] : [])) }}" class="d-block h-100 text-decoration-none">
            <div class="widget widget-12 has-shadow h-100 spka-stat-card {{ $status === '1' ? 'active-card-success' : '' }}">
                <div class="widget-body p-3">
                    <div class="media align-items-center">
                        <div class="align-self-center mr-3">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 34px;"></i>
                        </div>
                        <div class="pelanggan-stats align-self-center">
                            <div class="title text-muted text-uppercase small font-weight-bold">Selesai Ditangani</div>
                            <div class="number text-success font-weight-bold" style="font-size: 26px;">{{ $stats['selesai'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kolom 3: Sedang Proses -->
    <div class="col-xl-3 col-md-6 mb-3">
        <a href="{{ route('spka.index', array_merge(['status' => '2'], $dmaFilter ? ['dma' => $dmaFilter] : [])) }}" class="d-block h-100 text-decoration-none">
            <div class="widget widget-12 has-shadow h-100 spka-stat-card {{ $status === '2' ? 'active-card-warning' : '' }}">
                <div class="widget-body p-3">
                    <div class="media align-items-center">
                        <div class="align-self-center mr-3">
                            <i class="bi bi-clock-history text-warning" style="font-size: 34px;"></i>
                        </div>
                        <div class="pelanggan-stats align-self-center">
                            <div class="title text-muted text-uppercase small font-weight-bold">Sedang Proses</div>
                            <div class="number text-warning font-weight-bold" style="font-size: 26px;">{{ $stats['proses'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kolom 4: Belum Ditindak Lanjuti -->
    <div class="col-xl-3 col-md-6 mb-3">
        <a href="{{ route('spka.index', array_merge(['status' => '0'], $dmaFilter ? ['dma' => $dmaFilter] : [])) }}" class="d-block h-100 text-decoration-none">
            <div class="widget widget-12 has-shadow h-100 spka-stat-card {{ $status === '0' ? 'active-card-danger' : '' }}">
                <div class="widget-body p-3">
                    <div class="media align-items-center">
                        <div class="align-self-center mr-3">
                            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 34px;"></i>
                        </div>
                        <div class="pelanggan-stats align-self-center">
                            <div class="title text-muted text-uppercase small font-weight-bold">Belum Ditindak Lanjuti</div>
                            <div class="number text-danger font-weight-bold" style="font-size: 26px;">{{ $stats['belum'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Table & Filter Section -->
<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between flex-wrap p-3">
                <h4 class="mb-2 mb-md-0"><i class="bi bi-list-task mr-2 text-primary"></i>Daftar Tiket Kegiatan SPKA</h4>
                <div class="d-flex align-items-center flex-wrap">
                    <form method="GET" action="{{ route('spka.index') }}" class="form-inline mb-0">
                        @if ($status !== null)
                            <input type="hidden" name="status" value="{{ $status }}">
                        @endif
                        <label class="mr-2 font-weight-bold small text-muted"><i class="bi bi-funnel-fill mr-1 text-primary"></i>Zona DMA:</label>
                        <select name="dma" class="custom-select custom-select-sm mr-2" style="min-width: 170px;" onchange="this.form.submit()">
                            <option value="">-- Semua Zona DMA --</option>
                            @foreach ($dmas as $d)
                                <option value="{{ $d->nama_dma }}" {{ $dmaFilter == $d->nama_dma ? 'selected' : '' }}>
                                    {{ $d->nama_dma }}
                                </option>
                            @endforeach
                        </select>
                        <noscript><button type="submit" class="btn btn-sm btn-primary mr-1">Filter</button></noscript>
                        @if ($dmaFilter || $status !== null)
                            <a href="{{ route('spka.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset Filter">
                                <i class="bi bi-arrow-counterclockwise mr-1"></i> Reset
                            </a>
                        @endif
                    </form>
                </div>
            </div>
            <div class="widget-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-spka mb-0">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th style="width: 85px;"># Tiket</th>
                                <th style="width: 120px;">Tanggal</th>
                                <th style="width: 110px;">Zona DMA</th>
                                <th style="width: 120px;">Kategori</th>
                                <th class="text-left">Uraian Kegiatan / Temuan</th>
                                <th style="width: 85px;">Foto</th>
                                <th style="width: 140px;">Status</th>
                                <th class="text-left" style="min-width: 200px;">Penyelesaian / Petugas</th>
                                <th style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatans as $k)
                                <tr>
                                    <td class="text-center font-weight-bold text-primary">#{{ $k->tiket }}</td>
                                    <td class="text-center text-nowrap">{{ format_tanggal_id($k->tanggal_lapor) }}</td>
                                    <td class="text-center"><span class="badge badge-info px-2 py-1">{{ $k->dma ?? '-' }}</span></td>
                                    <td class="text-center"><span class="badge badge-secondary px-2 py-1">{{ $k->kategori ?? '-' }}</span></td>
                                    <td>{{ Str::limit($k->kegiatan, 100) }}</td>
                                    <td class="text-center">
                                        @if ($k->foto_kegiatan)
                                            <a href="{{ asset($k->foto_kegiatan) }}" target="_blank" class="btn btn-xs btn-outline-primary" title="Lihat Foto Laporan">
                                                <i class="bi bi-image"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center text-nowrap">
                                        @if ($k->status === '1')
                                            <span class="badge badge-success px-2 py-1"><i class="bi bi-check-circle mr-1"></i>Selesai</span>
                                        @elseif ($k->status === '2')
                                            <span class="badge badge-warning text-white px-2 py-1"><i class="bi bi-clock mr-1"></i>Dalam Proses</span>
                                        @else
                                            <span class="badge badge-danger px-2 py-1"><i class="bi bi-exclamation-triangle mr-1"></i>Belum Tindak Lanjut</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($k->status === '1')
                                            <small class="text-success d-block font-weight-bold"><i class="bi bi-check2-circle mr-1"></i>Selesai: {{ format_tanggal_id($k->tanggal_selesai) }}</small>
                                            <small class="d-block"><i class="bi bi-person-badge mr-1 text-muted"></i>Oleh: <strong>{{ $k->petugas ?? '-' }}</strong></small>
                                            <div class="small text-muted mt-1">{{ Str::limit($k->penyelesaian, 70) }}</div>
                                        @else
                                            <span class="text-muted small font-italic">Belum ada penyelesaian</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modalUpdate{{ $k->tiket }}" title="Update Status">
                                            <i class="bi bi-pencil-square mr-1"></i> Update
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Update Status -->
                                <div class="modal fade" id="modalUpdate{{ $k->tiket }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('spka.update-status', $k->tiket) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><i class="bi bi-pencil-square mr-2 text-primary"></i>Update Status Tiket #{{ $k->tiket }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold small text-muted">Status Tindak Lanjut</label>
                                                        <select class="custom-select form-control" name="status" required>
                                                            <option value="0" {{ $k->status == '0' ? 'selected' : '' }}>Belum Ditindaklanjuti</option>
                                                            <option value="2" {{ $k->status == '2' ? 'selected' : '' }}>Sedang Dalam Proses</option>
                                                            <option value="1" {{ $k->status == '1' ? 'selected' : '' }}>Selesai Diperbaiki</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold small text-muted">Nama Petugas / Teknisi Lapangan</label>
                                                        <input type="text" class="form-control" name="petugas" value="{{ $k->petugas }}" placeholder="Nama petugas">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold small text-muted">Tanggal Selesai</label>
                                                        <input type="date" class="form-control" name="tanggal_selesai" value="{{ $k->tanggal_selesai ? $k->tanggal_selesai->format('Y-m-d') : date('Y-m-d') }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold small text-muted">Catatan Penyelesaian & Tindakan</label>
                                                        <textarea class="form-control" name="penyelesaian" rows="3" placeholder="Uraian perbaikan yang dilakukan...">{{ $k->penyelesaian }}</textarea>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold small text-muted">Foto Bukti Selesai (Opsional)</label>
                                                        <input type="file" class="form-control-file" name="foto_penyelesaian" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save mr-1"></i> Simpan Pembaruan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox text-muted d-block mb-2" style="font-size: 32px;"></i>
                                        Belum ada tiket kegiatan SPKA ditemukan untuk kriteria filter ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($kegiatans->hasPages())
                    <div class="p-3 border-top d-flex justify-content-end">
                        {{ $kegiatans->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
