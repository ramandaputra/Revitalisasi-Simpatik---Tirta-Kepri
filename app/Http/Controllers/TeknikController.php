<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Distribusi;
use App\Models\Dma;
use App\Models\GantiMeter;
use App\Models\KualitasAir;
use App\Models\Nrw;
use App\Models\NrwDma;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TeknikController extends Controller
{
    private function emptyPaginator()
    {
        return new LengthAwarePaginator([], 0, 15);
    }

    // ==================== PRODUKSI ====================
    public function produksi()
    {
        $waduks = ['Sei Pulai', 'Sei Gesek', 'Sei Jago', 'Kolong Enam'];
        try {
            $data = Produksi::orderBy('waktu', 'desc')->paginate(15);
        } catch (\Throwable $e) {
            $data = $this->emptyPaginator();
        }
        return view('teknik.produksi', compact('data', 'waduks'));
    }

    public function produksiInput()
    {
        $waduks = ['Sei Pulai', 'Sei Gesek', 'Sei Jago', 'Kolong Enam'];
        return view('teknik.produksi-input', compact('waduks'));
    }

    public function produksiStore(Request $request)
    {
        $validated = $request->validate([
            'waktu' => 'required|date',
            'waduk' => 'required|string',
            'target' => 'required|numeric',
            'produksi' => 'required|numeric',
            'ipa' => 'nullable|string',
        ]);

        $validated['ipa'] = $validated['ipa'] ?? $validated['waduk'];

        Produksi::create($validated);

        return redirect()->route('teknik.produksi')->with('success', 'Data produksi berhasil disimpan!');
    }

    // ==================== DISTRIBUSI ====================
    public function distribusi()
    {
        try {
            $data = Distribusi::orderBy('waktu', 'desc')->paginate(15);
        } catch (\Throwable $e) {
            $data = $this->emptyPaginator();
        }
        return view('teknik.distribusi', compact('data'));
    }

    public function distribusiInput()
    {
        $jdus = ['HDPE', 'RPD', 'PCM', 'WK'];
        $waduks = ['Sei Pulai', 'Sei Gesek', 'Sei Jago', 'Kolong Enam'];
        return view('teknik.distribusi-input', compact('jdus', 'waduks'));
    }

    public function distribusiStore(Request $request)
    {
        $validated = $request->validate([
            'waktu' => 'required|date',
            'waduk' => 'required|string',
            'jdu' => 'required|string',
            'target' => 'required|numeric',
            'distribusi' => 'required|numeric',
        ]);

        Distribusi::create($validated);

        return redirect()->route('teknik.distribusi')->with('success', 'Data distribusi berhasil disimpan!');
    }

    // ==================== DMA ====================
    public function dma()
    {
        try {
            $dmas = Dma::all();
            $nrwDmas = NrwDma::orderBy('periode', 'desc')->paginate(15);
        } catch (\Throwable $e) {
            $dmas = collect();
            $nrwDmas = $this->emptyPaginator();
        }
        return view('teknik.dma', compact('dmas', 'nrwDmas'));
    }

    public function dmaInput()
    {
        try {
            $dmas = Dma::all();
        } catch (\Throwable $e) {
            $dmas = collect();
        }
        return view('teknik.dma-input', compact('dmas'));
    }

    public function dmaStore(Request $request)
    {
        $validated = $request->validate([
            'dma' => 'required|string',
            'periode' => 'required|date',
            'lalu' => 'nullable|numeric',
            'kini' => 'nullable|numeric',
            'distribusi' => 'nullable|numeric',
            'pelanggan' => 'nullable|numeric',
            'pemakaian' => 'nullable|numeric',
            'kehilangan' => 'nullable|numeric',
            'persentase' => 'nullable|string',
        ]);

        NrwDma::create($validated);

        return redirect()->route('teknik.dma')->with('success', 'Data monitoring DMA berhasil disimpan!');
    }

    // ==================== PERAWATAN METER ====================
    public function perawatanMeter()
    {
        try {
            $data = GantiMeter::orderBy('waktu', 'desc')->paginate(15);
        } catch (\Throwable $e) {
            $data = $this->emptyPaginator();
        }
        return view('teknik.perawatan-meter', compact('data'));
    }

    public function perawatanMeterInput()
    {
        $wilayahs = ['TNJ', 'KJG', 'TUB'];
        return view('teknik.perawatan-meter-input', compact('wilayahs'));
    }

    public function perawatanMeterStore(Request $request)
    {
        $validated = $request->validate([
            'waktu' => 'required|date',
            'wilayah' => 'required|string',
            'target' => 'required|numeric',
            'ganti_meter' => 'required|numeric',
        ]);

        GantiMeter::create($validated);

        return redirect()->route('teknik.perawatan-meter')->with('success', 'Data penggantian meter berhasil disimpan!');
    }

    // ==================== KUALITAS AIR ====================
    public function kualitasAir()
    {
        try {
            $data = KualitasAir::orderBy('waktu', 'desc')->paginate(20);
        } catch (\Throwable $e) {
            $data = $this->emptyPaginator();
        }
        return view('teknik.kualitas-air', compact('data'));
    }

    public function kualitasAirStore(Request $request)
    {
        $validated = $request->validate([
            'waktu' => 'required|date',
            'waduk' => 'required|string',
            'lokasi' => 'required|string',
            'warna' => 'nullable|string',
            'kekeruhan' => 'nullable|string',
            'tds' => 'nullable|string',
            'ph' => 'nullable|string',
            'scl' => 'nullable|string',
        ]);

        KualitasAir::create($validated);

        return back()->with('success', 'Data kualitas air berhasil dicatat!');
    }

    // ==================== KEHILANGAN AIR / NRW ====================
    public function kehilanganAir()
    {
        try {
            $data = Nrw::orderBy('waktu', 'desc')->paginate(15);
        } catch (\Throwable $e) {
            $data = $this->emptyPaginator();
        }
        return view('teknik.kehilangan-air', compact('data'));
    }
}
