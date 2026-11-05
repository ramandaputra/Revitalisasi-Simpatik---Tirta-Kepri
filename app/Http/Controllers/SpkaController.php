<?php

namespace App\Http\Controllers;

use App\Models\SpkaKegiatan;
use App\Models\Dma;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SpkaController extends Controller
{
    private function emptyPaginator()
    {
        return new LengthAwarePaginator([], 0, 15);
    }

    /**
     * Display list of SPKA activities with optional status filter.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        $dmaFilter = $request->query('dma');

        try {
            $query = SpkaKegiatan::orderBy('tanggal_lapor', 'desc');

            if ($status !== null && $status !== '') {
                if ($status === '0') {
                    $query->where(function ($q) {
                        $q->where('status', '0')
                          ->orWhereNull('status')
                          ->orWhere('status', '');
                    });
                } else {
                    $query->where('status', $status);
                }
            }

            if ($dmaFilter) {
                $query->where('dma', $dmaFilter);
            }

            $kegiatans = $query->paginate(15)->withQueryString();
            $dmas = Dma::all();

            $stats = [
                'total' => SpkaKegiatan::count(),
                'selesai' => SpkaKegiatan::where('status', '1')->count(),
                'proses' => SpkaKegiatan::where('status', '2')->count(),
                'belum' => SpkaKegiatan::where(function ($q) {
                    $q->where('status', '0')
                      ->orWhereNull('status')
                      ->orWhere('status', '');
                })->count(),
            ];
        } catch (\Throwable $e) {
            $kegiatans = $this->emptyPaginator();
            $dmas = collect();
            $stats = ['total' => 0, 'selesai' => 0, 'proses' => 0, 'belum' => 0];
        }

        return view('spka.index', compact('kegiatans', 'dmas', 'stats', 'status', 'dmaFilter'));
    }

    /**
     * Show form for creating a new SPKA activity.
     */
    public function create()
    {
        try {
            $dmas = Dma::all();
        } catch (\Throwable $e) {
            $dmas = collect();
        }
        $kategoris = ['Fisik', 'Debit', 'Tekanan', 'Kualitas', 'Aksesoris'];
        return view('spka.input', compact('dmas', 'kategoris'));
    }

    /**
     * Store new SPKA activity.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dma' => 'required|string',
            'kategori' => 'required|string',
            'tanggal_lapor' => 'required|date',
            'kegiatan' => 'required|string',
            'foto' => 'nullable|image|max:5120',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $fotoPath = 'uploads/' . $filename;
        }

        SpkaKegiatan::create([
            'dma' => $validated['dma'],
            'kategori' => $validated['kategori'],
            'tanggal_lapor' => $validated['tanggal_lapor'],
            'kegiatan' => $validated['kegiatan'],
            'foto_kegiatan' => $fotoPath,
            'status' => '0',
        ]);

        return redirect()->route('spka.index')->with('success', 'Kegiatan SPKA berhasil dilaporkan!');
    }

    /**
     * Update completion status.
     */
    public function updateStatus(Request $request, $tiket)
    {
        $kegiatan = SpkaKegiatan::findOrFail($tiket);

        $validated = $request->validate([
            'status' => 'required|in:0,1,2',
            'petugas' => 'nullable|string',
            'penyelesaian' => 'nullable|string',
            'tanggal_selesai' => 'nullable|date',
            'foto_penyelesaian' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('foto_penyelesaian')) {
            $file = $request->file('foto_penyelesaian');
            $filename = 'selesai_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['foto_penyelesaian'] = $filename;
        }

        if ($validated['status'] === '1' && empty($validated['tanggal_selesai'])) {
            $validated['tanggal_selesai'] = now()->toDateString();
        }

        $kegiatan->update($validated);

        return back()->with('success', 'Status kegiatan SPKA berhasil diperbarui!');
    }

    /**
     * Delete an activity.
     */
    public function destroy($tiket)
    {
        $kegiatan = SpkaKegiatan::findOrFail($tiket);
        $kegiatan->delete();

        return back()->with('success', 'Kegiatan SPKA berhasil dihapus.');
    }
}
