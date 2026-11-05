@extends('layouts.app')

@section('title', 'Lapor Kegiatan SPKA Lapangan')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Lapor Temuan / Kegiatan SPKA Baru</h2>
                <span class="text-muted">Pencatatan Temuan Kebocoran & Perbaikan Lapangan</span>
            </div>
            <div>
                <a href="{{ route('spka.index') }}" class="btn btn-outline-secondary">
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
                <h4><i class="la la-file-text mr-2 text-primary"></i>Form Laporan Lapangan</h4>
            </div>
            <div class="widget-body">
                <form action="{{ route('spka.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="tanggal_lapor" class="col-sm-3 col-form-label">Tanggal Temuan / Lapor</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_lapor" name="tanggal_lapor" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="dma" class="col-sm-3 col-form-label">Zona DMA</label>
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
                        <label for="kategori" class="col-sm-3 col-form-label">Kategori Temuan</label>
                        <div class="col-sm-9">
                            <select class="custom-select form-control" id="kategori" name="kategori" required>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k }}">{{ $k }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="kegiatan" class="col-sm-3 col-form-label">Uraian Temuan / Lokasi</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="kegiatan" name="kegiatan" rows="4" placeholder="Jelaskan jenis pipa, alamat detail, ukuran pipa, kondisi kebocoran, dll..." required></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="foto" class="col-sm-3 col-form-label">Foto Dokumentasi Lapangan</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                            <small class="text-muted d-block mt-1">Format: JPG, JPEG, PNG (Maksimal 5MB)</small>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-gradient-01 btn-lg">
                            <i class="la la-paper-plane mr-2"></i> Kirim Laporan SPKA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

