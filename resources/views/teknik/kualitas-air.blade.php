@extends('layouts.app')

@section('title', 'SIMPATIK V3.0 - Hasil Uji Kualitas Air')

@section('content')
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="page-header-title">Hasil Pengujian Kualitas Air</h2>
                <span class="text-muted">Parameter Fisika & Kimia Standar Permenkes</span>
            </div>
            @auth
                <div>
                    <button type="button" class="btn btn-gradient-01" data-toggle="modal" data-target="#modalKualitas">
                        <i class="la la-plus"></i> Tambah Uji Kualitas
                    </button>
                </div>
            @endauth
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered d-flex align-items-center justify-content-between">
                <h4>Data Hasil Uji Laboratorium</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Waktu Pengujian</th>
                                <th>Sumber / Waduk</th>
                                <th>Lokasi / Titik Sampel</th>
                                <th>Warna (PtCo)</th>
                                <th>Kekeruhan (NTU)</th>
                                <th>TDS (mg/L)</th>
                                <th>pH</th>
                                <th>Sisa Chlor (mg/L)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $row)
                                <tr>
                                    <td>{{ format_tanggal_id($row->waktu) }}</td>
                                    <td>{{ $row->waduk }}</td>
                                    <td><strong>{{ $row->lokasi }}</strong></td>
                                    <td>{{ $row->warna ?? '-' }}</td>
                                    <td>{{ $row->kekeruhan ?? '-' }}</td>
                                    <td>{{ $row->tds ?? '-' }}</td>
                                    <td>{{ $row->ph ?? '-' }}</td>
                                    <td>{{ $row->scl ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">Belum ada catatan pengujian kualitas air.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Uji Kualitas -->
<div class="modal fade" id="modalKualitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('teknik.kualitas-air.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Input Hasil Uji Kualitas Air</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Waktu Pengujian</label>
                        <input type="datetime-local" class="form-control" name="waktu" value="{{ date('Y-m-d\TH:i') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Sumber / Waduk</label>
                        <input type="text" class="form-control" name="waduk" placeholder="cth: Sei Pulai" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Titik Sampel / Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" placeholder="cth: Air Olahan RPD" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label>Warna (PtCo)</label>
                            <input type="text" class="form-control" name="warna" placeholder="cth: < 1">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Kekeruhan (NTU)</label>
                            <input type="text" class="form-control" name="kekeruhan" placeholder="cth: 0.37">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-3">
                            <label>TDS (mg/L)</label>
                            <input type="text" class="form-control" name="tds" placeholder="cth: 9">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label>pH</label>
                            <input type="text" class="form-control" name="ph" placeholder="cth: 6.9">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label>Sisa Chlor</label>
                            <input type="text" class="form-control" name="scl" placeholder="cth: 0.38">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Hasil Uji</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

