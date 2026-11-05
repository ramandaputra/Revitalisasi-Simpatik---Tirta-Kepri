<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\TeknikController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\SpkaController;
use App\Http\Controllers\GisController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - SIMPATIK V2.0 Laravel Framework Edition
|--------------------------------------------------------------------------
| Handles both modern Laravel RESTful routes and backwards-compatible
| legacy PHP paths from SIMPATIK V2.0.
| Database: kepri_kinerja (Primary) & kepri_iot (Sensors & SCADA)
|--------------------------------------------------------------------------
*/

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard-eksekutif', [DashboardController::class, 'index2'])->name('dashboard.eksekutif');
Route::get('/index2.php', [DashboardController::class, 'index2']);
Route::get('/spi', [DashboardController::class, 'spi'])->name('spi.index');
Route::get('/monitoring-spi.php', [DashboardController::class, 'spi']);

// WebGIS
Route::get('/gis', [GisController::class, 'index'])->name('gis.index');
Route::get('/gis/search', [GisController::class, 'searchCustomer'])->name('gis.search');

// Kinerja (18 BPPSPAM Performance Indicators & Wizards)
Route::prefix('kinerja')->name('kinerja.')->group(function () {
    Route::get('/', [KinerjaController::class, 'index'])->name('index');
    Route::get('/indikator/{id}', [KinerjaController::class, 'showIndicator'])->name('indikator');
    Route::get('/{slug}', [KinerjaController::class, 'showIndicator'])->name('slug');

    Route::middleware('auth')->group(function () {
        Route::get('/input/keuangan', [KinerjaController::class, 'inputKeuangan'])->name('input.keuangan');
        Route::get('/input/pelayanan', [KinerjaController::class, 'inputPelayanan'])->name('input.pelayanan');
        Route::get('/input/operasional', [KinerjaController::class, 'inputOperasional'])->name('input.operasional');
        Route::get('/input/sdm', [KinerjaController::class, 'inputSdm'])->name('input.sdm');
        Route::post('/store', [KinerjaController::class, 'store'])->name('store');
    });
});

// All 18 Legacy Indicator URLs Direct Mapping
$indicatorSlugs = [
    'return-on-equity',
    'ratio-operasi',
    'cash-ratio',
    'efisiensi-penagihan',
    'solvabilitas',
    'cakupan-pelayanan',
    'pertumbuhan-pelanggan',
    'penyelesaian-pengaduan',
    'kualitas-air',
    'konsumsi-air',
    'rasio-efisiensi-produksi',
    'air-tidak-berekening',
    'jam-operasi',
    'tekanan-air',
    'penggantian-meter',
    'jumlah-pegawai',
    'rasio-pegawai-diklat',
    'rasio-biaya-diklat',
];

foreach ($indicatorSlugs as $slug) {
    Route::get('/' . $slug . '.php', function () use ($slug) {
        return app(KinerjaController::class)->showIndicator($slug);
    });
}

// TEKNIK (Produksi, Distribusi, DMA, Perawatan Meter, Kualitas Air)
Route::prefix('teknik')->name('teknik.')->group(function () {
    // Produksi
    Route::get('/produksi', [TeknikController::class, 'produksi'])->name('produksi');
    Route::get('/produksi/input', [TeknikController::class, 'produksiInput'])->name('produksi.input')->middleware('auth');
    Route::post('/produksi/store', [TeknikController::class, 'produksiStore'])->name('produksi.store')->middleware('auth');

    // Distribusi
    Route::get('/distribusi', [TeknikController::class, 'distribusi'])->name('distribusi');
    Route::get('/distribusi/input', [TeknikController::class, 'distribusiInput'])->name('distribusi.input')->middleware('auth');
    Route::post('/distribusi/store', [TeknikController::class, 'distribusiStore'])->name('distribusi.store')->middleware('auth');

    // DMA
    Route::get('/dma', [TeknikController::class, 'dma'])->name('dma');
    Route::get('/dma/input', [TeknikController::class, 'dmaInput'])->name('dma.input')->middleware('auth');
    Route::post('/dma/store', [TeknikController::class, 'dmaStore'])->name('dma.store')->middleware('auth');

    // Perawatan Meter
    Route::get('/perawatan-meter', [TeknikController::class, 'perawatanMeter'])->name('perawatan-meter');
    Route::get('/perawatan-meter/input', [TeknikController::class, 'perawatanMeterInput'])->name('perawatan-meter.input')->middleware('auth');
    Route::post('/perawatan-meter/store', [TeknikController::class, 'perawatanMeterStore'])->name('perawatan-meter.store')->middleware('auth');

    // Kualitas Air & NRW
    Route::get('/kualitas-air', [TeknikController::class, 'kualitasAir'])->name('kualitas-air');
    Route::post('/kualitas-air/store', [TeknikController::class, 'kualitasAirStore'])->name('kualitas-air.store')->middleware('auth');
    Route::get('/kehilangan-air', [TeknikController::class, 'kehilanganAir'])->name('kehilangan-air');
});

// KEUANGAN & HUBLANG
Route::prefix('keuangan')->name('keuangan.')->group(function () {
    Route::get('/arus-kas', [KeuanganController::class, 'arusKas'])->name('arus-kas');
    Route::get('/arus-kas/input', [KeuanganController::class, 'arusKasInput'])->name('arus-kas.input')->middleware('auth');
    Route::post('/arus-kas/store', [KeuanganController::class, 'arusKasStore'])->name('arus-kas.store')->middleware('auth');

    Route::get('/efisiensi-penagihan', [KeuanganController::class, 'efisiensiPenagihan'])->name('efisiensi-penagihan');
    Route::get('/efisiensi-penagihan-keu', [KeuanganController::class, 'efisiensiPenagihanKeu'])->name('efisiensi-penagihan-keu');
    Route::get('/drd-posting', [KeuanganController::class, 'drdPosting'])->name('drd-posting');
    Route::get('/perbaikan-rekening', [KeuanganController::class, 'perbaikanRekening'])->name('perbaikan-rekening');
    Route::get('/tunggakan', [KeuanganController::class, 'tunggakan'])->name('tunggakan');
    Route::get('/pertumbuhan-pelanggan-hbl', [KeuanganController::class, 'pertumbuhanPelangganHbl'])->name('pertumbuhan-pelanggan-hbl');
    Route::get('/pembacaan-meter', [KeuanganController::class, 'pembacaanMeter'])->name('pembacaan-meter');
    Route::get('/pengaduan-pelanggan', [KeuanganController::class, 'pengaduanPelanggan'])->name('pengaduan-pelanggan');
    Route::get('/tunggakan-empat-bulan', [KeuanganController::class, 'tunggakanEmpatBulan'])->name('tunggakan-empat-bulan');
    Route::get('/pemutusan-tunggakan', [KeuanganController::class, 'pemutusanTunggakan'])->name('pemutusan-tunggakan');
});

// SPKA (Surat Perintah Kerja & Lapangan)
Route::prefix('spka')->name('spka.')->group(function () {
    Route::get('/', [SpkaController::class, 'index'])->name('index');
    Route::get('/create', [SpkaController::class, 'create'])->name('create')->middleware('auth');
    Route::post('/store', [SpkaController::class, 'store'])->name('store')->middleware('auth');
    Route::put('/{tiket}/update-status', [SpkaController::class, 'updateStatus'])->name('update-status')->middleware('auth');
    Route::delete('/{tiket}', [SpkaController::class, 'destroy'])->name('destroy')->middleware('auth');
});

// Legacy URLs Direct Aliases
Route::get('/index.php', fn() => redirect()->route('dashboard'));
Route::get('/gis.php', fn() => redirect()->route('gis.index'));
Route::match(['get', 'post'], '/login.php', function(\Illuminate\Http\Request $request) {
    if ($request->isMethod('post')) {
        return app(AuthController::class)->login($request);
    }
    return redirect()->route('login');
});
Route::get('/pages-login.html', fn() => redirect()->route('login'));
Route::get('/pages-logout.php', fn() => redirect()->route('logout'));

// Teknik Aliases
Route::get('/produksi.php', fn() => redirect()->route('teknik.produksi'));
Route::get('/produksi-input.php', fn() => redirect()->route('teknik.produksi.input'));
Route::get('/distribusi.php', fn() => redirect()->route('teknik.distribusi'));
Route::get('/distribusi-input.php', fn() => redirect()->route('teknik.distribusi.input'));
Route::get('/monitoring-dma.php', fn() => redirect()->route('teknik.dma'));
Route::get('/monitoring-dma-input.php', fn() => redirect()->route('teknik.dma.input'));
Route::get('/perawatan-meter.php', fn() => redirect()->route('teknik.perawatan-meter'));
Route::get('/perawatan-meter-input.php', fn() => redirect()->route('teknik.perawatan-meter.input'));
Route::get('/tingkat-kehilangan-air.php', fn() => redirect()->route('teknik.kehilangan-air'));

// Keuangan & Hublang Aliases
Route::get('/arus-kas.php', fn() => redirect()->route('keuangan.arus-kas'));
Route::get('/arus-kas-input.php', fn() => redirect()->route('keuangan.arus-kas.input'));
Route::get('/drd-posting.php', fn() => redirect()->route('keuangan.drd-posting'));
Route::get('/perbaikan-rekening.php', fn() => redirect()->route('keuangan.perbaikan-rekening'));
Route::get('/pertumbuhan-pelanggan-hbl.php', fn() => redirect()->route('keuangan.pertumbuhan-pelanggan-hbl'));
Route::get('/pembacaan-meter.php', fn() => redirect()->route('keuangan.pembacaan-meter'));
Route::get('/pengaduan-pelanggan.php', fn() => redirect()->route('keuangan.pengaduan-pelanggan'));
Route::get('/tunggakan-empat-bulan.php', fn() => redirect()->route('keuangan.tunggakan-empat-bulan'));
Route::get('/pemutusan-tunggakan.php', fn() => redirect()->route('keuangan.pemutusan-tunggakan'));
Route::get('/pemutusan-tunggakanx.php', fn() => redirect()->route('keuangan.pemutusan-tunggakan'));
Route::get('/efisiensi-penagihan-keu.php', fn() => redirect()->route('keuangan.efisiensi-penagihan-keu'));

// Kinerja Wizard Aliases
Route::get('/aspek-keuangan-input.php', fn() => redirect()->route('kinerja.input.keuangan'));
Route::get('/aspek-pelayanan-input.php', fn() => redirect()->route('kinerja.input.pelayanan'));
Route::get('/aspek-operasional-input.php', fn() => redirect()->route('kinerja.input.operasional'));
Route::get('/aspek-sdm-input.php', fn() => redirect()->route('kinerja.input.sdm'));

// SPKA Aliases
Route::get('/kegiatan-spka.php', fn() => redirect()->route('spka.index'));
Route::get('/kegiatan-spka-input.php', fn() => redirect()->route('spka.create'));

// Legacy AJAX endpoints fallback (kepri_kinerja & kepri_iot)
Route::get('/assets/data/status-pompa.php', [ApiController::class, 'statusPompa']);
Route::get('/assets/data/produksi-bulan.php', [ApiController::class, 'produksiBulan']);
Route::get('/assets/data/status-loger.php', [ApiController::class, 'statusLoger']);
Route::get('/assets/data/status-loger-periodik.php', [ApiController::class, 'statusLogerPeriodik']);
Route::get('/assets/data/loger-flow.php', [ApiController::class, 'logerFlow']);
Route::get('/assets/data/loger-tekanan.php', [ApiController::class, 'logerTekanan']);
Route::get('/assets/data/get_markers.php', [ApiController::class, 'getMarkers']);
Route::get('/assets/data/get-dma.php', [ApiController::class, 'getDma']);

// Modern API Endpoints
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/status-pompa', [ApiController::class, 'statusPompa'])->name('status-pompa');
    Route::get('/produksi-bulan', [ApiController::class, 'produksiBulan'])->name('produksi-bulan');
    Route::get('/status-loger', [ApiController::class, 'statusLoger'])->name('status-loger');
    Route::get('/gis/markers', [ApiController::class, 'getMarkers'])->name('gis.markers');
});

// Legacy Mobile Endpoints
Route::get('/mobile/fetch-flow.php', [ApiController::class, 'fetchFlow']);
Route::get('/mobile/fetch-pressure.php', [ApiController::class, 'fetchPressure']);
Route::get('/mobile/fetch-pump.php', [ApiController::class, 'statusPompa']);
