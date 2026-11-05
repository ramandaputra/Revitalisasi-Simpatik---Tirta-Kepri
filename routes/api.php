<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - SIMPATIK V2.0 Telemetry & Real-Time Endpoints
| Dual Database Integration: kepri_kinerja + kepri_iot
|--------------------------------------------------------------------------
*/

Route::get('/ping', fn() => response()->json(['status' => 'ok', 'app' => 'SIMPATIK V2.0 Laravel']));

// DB 1: kepri_kinerja
Route::get('/status-pompa', [ApiController::class, 'statusPompa'])->name('api.status-pompa');
Route::get('/produksi-bulan', [ApiController::class, 'produksiBulan'])->name('api.produksi-bulan');
Route::get('/dma', [ApiController::class, 'getDma'])->name('api.dma');

// DB 2: kepri_iot (Sensors, Pressure, Flow)
Route::get('/status-loger', [ApiController::class, 'statusLoger'])->name('api.status-loger');
Route::get('/status-loger-periodik', [ApiController::class, 'statusLogerPeriodik'])->name('api.status-loger-periodik');
Route::get('/loger-flow', [ApiController::class, 'logerFlow'])->name('api.loger-flow');
Route::get('/loger-tekanan', [ApiController::class, 'logerTekanan'])->name('api.loger-tekanan');
Route::get('/sensor/flow', [ApiController::class, 'fetchFlow'])->name('api.sensor.flow');
Route::get('/sensor/pressure', [ApiController::class, 'fetchPressure'])->name('api.sensor.pressure');

// Combined GIS (Sensors kepri_iot + Pelanggan kepri_kinerja)
Route::get('/markers', [ApiController::class, 'getMarkers'])->name('api.markers');
Route::get('/geojson', [ApiController::class, 'getGeojson'])->name('api.geojson');
