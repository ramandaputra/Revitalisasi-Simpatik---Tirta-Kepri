<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class KeuanganController extends Controller
{
    private function emptyPaginator()
    {
        return new LengthAwarePaginator([], 0, 12);
    }

    /**
     * Arus Kas view.
     */
    public function arusKas()
    {
        try {
            $records = Kinerja::where('aspek_id', 1)
                ->where('indikator', '3')
                ->orderBy('periode', 'desc')
                ->paginate(12);
        } catch (\Throwable $e) {
            $records = $this->emptyPaginator();
        }

        return view('keuangan.arus-kas', compact('records'));
    }

    /**
     * Arus Kas input form.
     */
    public function arusKasInput()
    {
        return view('keuangan.arus-kas-input');
    }

    /**
     * Store Arus Kas entry.
     */
    public function arusKasStore(Request $request)
    {
        $validated = $request->validate([
            'periode' => 'required|date',
            'data1' => 'required|numeric', // Kas
            'data2' => 'required|numeric', // Hutang Lancar
        ]);

        $kas = (float)$validated['data1'];
        $hutang = (float)$validated['data2'];
        $hasil = $hutang > 0 ? round(($kas / $hutang) * 100, 2) : 0;

        $score = $hasil >= 100 ? '5.0' : ($hasil >= 80 ? '4.0' : ($hasil >= 60 ? '3.0' : ($hasil >= 40 ? '2.0' : '1.0')));
        $bobot = '0.275';

        Kinerja::create([
            'aspek_id' => 1,
            'periode' => $validated['periode'],
            'indikator' => '3',
            'deskripsi1' => 'Kas',
            'data1' => $kas,
            'deskripsi2' => 'Hutang Lancar',
            'data2' => $hutang,
            'hasil' => (string)$hasil,
            'score' => $score,
            'bobot' => $bobot,
        ]);

        return redirect()->route('keuangan.arus-kas')->with('success', 'Data Arus Kas berhasil disimpan!');
    }

    /**
     * Efisiensi Penagihan view.
     */
    public function efisiensiPenagihan()
    {
        try {
            $records = Kinerja::where('aspek_id', 1)
                ->where('indikator', '4')
                ->orderBy('periode', 'desc')
                ->paginate(12);
        } catch (\Throwable $e) {
            $records = $this->emptyPaginator();
        }

        return view('keuangan.efisiensi-penagihan', compact('records'));
    }

    /**
     * DRD Posting view.
     */
    public function drdPosting()
    {
        return view('keuangan.drd-posting');
    }

    /**
     * Perbaikan Rekening view.
     */
    public function perbaikanRekening()
    {
        return view('keuangan.perbaikan-rekening');
    }

    /**
     * Tunggakan view.
     */
    public function tunggakan()
    {
        return view('keuangan.tunggakan');
    }

    /**
     * Pertumbuhan Pelanggan Hublang (replaces pertumbuhan-pelanggan-hbl.php).
     */
    public function pertumbuhanPelangganHbl()
    {
        return view('keuangan.pertumbuhan-pelanggan-hbl');
    }

    /**
     * Pembacaan Meter (replaces pembacaan-meter.php).
     */
    public function pembacaanMeter()
    {
        return view('keuangan.pembacaan-meter');
    }

    /**
     * Pengaduan Pelanggan (replaces pengaduan-pelanggan.php).
     */
    public function pengaduanPelanggan()
    {
        return view('keuangan.pengaduan-pelanggan');
    }

    /**
     * Tunggakan Diatas 4 Bulan (replaces tunggakan-empat-bulan.php).
     */
    public function tunggakanEmpatBulan()
    {
        return view('keuangan.tunggakan-empat-bulan');
    }

    /**
     * Pemutusan Tunggakan (replaces pemutusan-tunggakan.php).
     */
    public function pemutusanTunggakan()
    {
        return view('keuangan.pemutusan-tunggakan');
    }

    /**
     * Efisiensi Penagihan Keuangan (replaces efisiensi-penagihan-keu.php).
     */
    public function efisiensiPenagihanKeu()
    {
        return view('keuangan.efisiensi-penagihan-keu');
    }
}
