<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Kinerja;
use App\Models\Produksi;
use App\Models\Distribusi;
use App\Models\StatusPompa;
use App\Models\StatusKelistrikan;
use App\Models\KualitasAir;
use App\Models\SpkaKegiatan;
use App\Models\Tma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the main SIMPATIK V2.0 Dashboard.
     */
    public function index()
    {
        // 1. Waduk List
        $waduks = ['Sei Pulai', 'Sei Gesek', 'Sei Jago', 'Kolong Enam'];

        // 2. Fetch Pump Statuses
        $pumpStatuses = [];
        try {
            $pumps = StatusPompa::orderBy('pompa')->get();
            foreach ($pumps as $pump) {
                $pumpStatuses[$pump->waduk][] = [
                    'nama' => $pump->pompa,
                    'status' => $pump->status,
                    'is_on' => strtolower($pump->status) === 'on',
                ];
            }
        } catch (\Throwable $e) {
            // fallback if table not yet populated
        }

        // 3. Latest Produksi per Waduk
        $produksiStats = [];
        try {
            foreach ($waduks as $waduk) {
                $latest = Produksi::where('waduk', $waduk)
                    ->orderBy('waktu', 'desc')
                    ->first();
                $produksiStats[$waduk] = $latest ? (float)$latest->produksi : 0;
            }
        } catch (\Throwable $e) {
            // fallback
        }

        // 4. Performance Summary per Aspek
        $aspekSummaries = [];
        try {
            $aspeks = Aspek::all();
            foreach ($aspeks as $aspek) {
                $avgScore = Kinerja::where('aspek_id', $aspek->aspek_id)
                    ->avg('score');
                $totalBobot = Kinerja::where('aspek_id', $aspek->aspek_id)
                    ->sum('bobot');

                $aspekSummaries[] = [
                    'id' => $aspek->aspek_id,
                    'nama' => $aspek->aspek_kinerja,
                    'score' => $avgScore ? round($avgScore, 2) : 0,
                    'bobot' => $totalBobot ? round($totalBobot, 3) : 0,
                ];
            }
        } catch (\Throwable $e) {
            // fallback
        }

        // 5. SPKA Summary
        $spkaSummary = [
            'total' => 0,
            'selesai' => 0,
            'proses' => 0,
            'belum' => 0,
        ];
        try {
            $spkaSummary['total'] = SpkaKegiatan::count();
            $spkaSummary['selesai'] = SpkaKegiatan::where('status', '1')->count();
            $spkaSummary['proses'] = SpkaKegiatan::where('status', '2')->count();
            $spkaSummary['belum'] = SpkaKegiatan::where('status', '0')->count();
        } catch (\Throwable $e) {
            // fallback
        }

        // 6. Recent Kualitas Air
        $kualitasAir = [];
        try {
            $kualitasAir = KualitasAir::orderBy('waktu', 'desc')->take(5)->get();
        } catch (\Throwable $e) {
            // fallback
        }

        // 7. Produksi Chart Data (Last 6 Months)
        $chartData = [
            'labels' => [],
            'target' => [],
            'realisasi' => [],
        ];
        try {
            $monthlyProduksi = Produksi::select(
                DB::raw("DATE_FORMAT(waktu, '%Y-%m') as bulan"),
                DB::raw("SUM(CAST(target AS UNSIGNED)) as total_target"),
                DB::raw("SUM(CAST(produksi AS UNSIGNED)) as total_produksi")
            )
            ->groupBy('bulan')
            ->orderBy('bulan', 'desc')
            ->take(6)
            ->get()
            ->reverse();

            foreach ($monthlyProduksi as $row) {
                $chartData['labels'][] = date('M Y', strtotime($row->bulan . '-01'));
                $chartData['target'][] = (int)$row->total_target;
                $chartData['realisasi'][] = (int)$row->total_produksi;
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return view('dashboard.index', compact(
            'waduks',
            'pumpStatuses',
            'produksiStats',
            'aspekSummaries',
            'spkaSummary',
            'kualitasAir',
            'chartData'
        ));
    }

    /**
     * Executive Dashboard with SCADA & TMA (replaces index2.php).
     */
    public function index2()
    {
        return view('dashboard.index2');
    }

    /**
     * SPI Monitoring View (replaces monitoring-spi.php).
     */
    public function spi()
    {
        return view('spi.index');
    }
}

