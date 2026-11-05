<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Indikator;
use App\Models\Kinerja;
use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    /**
     * Complete dictionary of 18 performance indicators according to BPPSPAM / Kemendagri
     */
    public static function getIndicatorMeta(): array
    {
        return [
            'return-on-equity' => [
                'id' => 1,
                'aspek_id' => 1,
                'slug' => 'return-on-equity',
                'title' => 'Return on Equity (ROE)',
                'aspek' => 'Aspek Keuangan',
                'formula' => 'ROE = (Laba/Rugi Bersih Setelah Pajak / Jumlah Ekuitas) * 100%',
                'bobot' => '0.055',
                'deskripsi' => 'Kemampuan perusahaan menghasilkan laba bersih dari ekuitas yang dimiliki.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 10 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '7 % - < 10 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '3 % - < 7 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '0 % - < 3 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 0 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'return-on-equity.js',
            ],
            'ratio-operasi' => [
                'id' => 2,
                'aspek_id' => 1,
                'slug' => 'ratio-operasi',
                'title' => 'Rasio Operasi',
                'aspek' => 'Aspek Keuangan',
                'formula' => 'Rasio Operasi = Biaya Operasi / Pendapatan Operasi',
                'bobot' => '0.055',
                'deskripsi' => 'Efisiensi operasional perusahaan dalam mengendalikan biaya operasional terhadap pendapatan operasional.',
                'satuan' => 'rasio',
                'standards' => [
                    ['syarat' => '<= 0.5', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '> 0.5 - 0.65', 'nilai' => '4 (Baik)'],
                    ['syarat' => '> 0.65 - 0.85', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '> 0.85 - 1.0', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '> 1.0', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'ratio-operasi.js',
            ],
            'cash-ratio' => [
                'id' => 3,
                'aspek_id' => 1,
                'slug' => 'cash-ratio',
                'title' => 'Cash Ratio (Rasio Kas)',
                'aspek' => 'Aspek Keuangan',
                'formula' => 'Cash Ratio = (Kas & Setara Kas / Hutang Lancar) * 100%',
                'bobot' => '0.275',
                'deskripsi' => 'Kemampuan kas yang ada untuk melunasi kewajiban jangka pendek yang segera jatuh tempo.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 100 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '80 % - < 100 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '60 % - < 80 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '40 % - < 60 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 40 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'cash-ratio.js',
            ],
            'efisiensi-penagihan' => [
                'id' => 4,
                'aspek_id' => 1,
                'slug' => 'efisiensi-penagihan',
                'title' => 'Efisiensi Penagihan',
                'aspek' => 'Aspek Keuangan',
                'formula' => 'Efisiensi Penagihan = (Penerimaan Rekening Air / Rekening Air Ditagihkan) * 100%',
                'bobot' => '0.165',
                'deskripsi' => 'Efektivitas penagihan rekening air pelanggan yang berhasil ditagih oleh perusahaan.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 90 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '85 % - < 90 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '80 % - < 85 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '75 % - < 80 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 75 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'efisiensi-penagihan.js',
            ],
            'solvabilitas' => [
                'id' => 5,
                'aspek_id' => 1,
                'slug' => 'solvabilitas',
                'title' => 'Solvabilitas',
                'aspek' => 'Aspek Keuangan',
                'formula' => 'Solvabilitas = (Total Aktiva / Total Hutang) * 100%',
                'bobot' => '0.150',
                'deskripsi' => 'Kemampuan perusahaan menjamin seluruh kewajiban utangnya dengan total aktiva yang dimiliki.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 200 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '170 % - < 200 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '135 % - < 170 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '100 % - < 135 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 100 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'solvabilitas.js',
            ],
            'cakupan-pelayanan' => [
                'id' => 6,
                'aspek_id' => 2,
                'slug' => 'cakupan-pelayanan',
                'title' => 'Cakupan Pelayanan',
                'aspek' => 'Aspek Pelayanan',
                'formula' => 'Cakupan Pelayanan = (Jumlah Penduduk Terlayani / Jumlah Penduduk Wilayah Pelayanan) * 100%',
                'bobot' => '0.15',
                'deskripsi' => 'Persentase jumlah penduduk yang telah terlayani air minum perpipaan.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 80 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '60 % - < 80 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '40 % - < 60 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '20 % - < 40 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 20 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'cakupan-pelayanan.js',
            ],
            'pertumbuhan-pelanggan' => [
                'id' => 7,
                'aspek_id' => 2,
                'slug' => 'pertumbuhan-pelanggan',
                'title' => 'Pertumbuhan Pelanggan',
                'aspek' => 'Aspek Pelayanan',
                'formula' => 'Pertumbuhan = ((Pelanggan Bulan Ini - Bulan Lalu) / Pelanggan Bulan Lalu) * 100%',
                'bobot' => '0.05',
                'deskripsi' => 'Tingkat pertumbuhan penambahan sambungan langganan baru per bulan.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 10 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '7 % - < 10 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '4 % - < 7 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '1 % - < 4 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 1 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'pertumbuhan-pelanggan.js',
            ],
            'penyelesaian-pengaduan' => [
                'id' => 8,
                'aspek_id' => 2,
                'slug' => 'penyelesaian-pengaduan',
                'title' => 'Penyelesaian Pengaduan',
                'aspek' => 'Aspek Pelayanan',
                'formula' => 'Penyelesaian Pengaduan = (Pengaduan Selesai / Jumlah Pengaduan) * 100%',
                'bobot' => '0.125',
                'deskripsi' => 'Kecepatan dan kemampuan perusahaan menyelesaikan keluhan atau komplain pelanggan.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 90 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '80 % - < 90 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '70 % - < 80 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '60 % - < 70 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 60 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'penyelesaian-pengaduan.js',
            ],
            'kualitas-air' => [
                'id' => 9,
                'aspek_id' => 2,
                'slug' => 'kualitas-air',
                'title' => 'Kualitas Air Pelanggan',
                'aspek' => 'Aspek Pelayanan',
                'formula' => 'Kualitas Air = (Jumlah Uji Memenuhi Syarat / Jumlah Uji) * 100%',
                'bobot' => '0.08',
                'deskripsi' => 'Kesesuaian sampel air yang didistribusikan kepada pelanggan dengan standar Permenkes.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 90 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '80 % - < 90 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '70 % - < 80 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '60 % - < 70 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 60 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'kualitas-air.js',
            ],
            'konsumsi-air' => [
                'id' => 10,
                'aspek_id' => 2,
                'slug' => 'konsumsi-air',
                'title' => 'Konsumsi Air Pelanggan',
                'aspek' => 'Aspek Pelayanan',
                'formula' => 'Konsumsi Air = Air Terjual Domestik (m³) / Pelanggan Domestik',
                'bobot' => '0.10',
                'deskripsi' => 'Rata-rata konsumsi air bulanan pelanggan kategori rumah tangga.',
                'satuan' => 'm³/bln',
                'standards' => [
                    ['syarat' => '>= 20 m³', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '15 - < 20 m³', 'nilai' => '4 (Baik)'],
                    ['syarat' => '10 - < 15 m³', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '5 - < 10 m³', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 5 m³', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'konsumsi-air.js',
            ],
            'rasio-efisiensi-produksi' => [
                'id' => 11,
                'aspek_id' => 3,
                'slug' => 'rasio-efisiensi-produksi',
                'title' => 'Rasio Efisiensi Produksi',
                'aspek' => 'Aspek Operasional',
                'formula' => 'Efisiensi Produksi = (Volume Realisasi Produksi / Kapasitas Terpasang) * 100%',
                'bobot' => '0.07',
                'deskripsi' => 'Pemanfaatan kapasitas terpasang instalasi pengolahan air (IPA).',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 80 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '70 % - < 80 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '60 % - < 70 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '50 % - < 60 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 50 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'rasio-efisiensi-produksi.js',
            ],
            'air-tidak-berekening' => [
                'id' => 12,
                'aspek_id' => 3,
                'slug' => 'air-tidak-berekening',
                'title' => 'Air Tidak Berekening (NRW)',
                'aspek' => 'Aspek Operasional',
                'formula' => 'Air Tidak Berekening = ((Distribusi Air - Air Terjual) / Distribusi Air) * 100%',
                'bobot' => '0.07',
                'deskripsi' => 'Tingkat kehilangan air fisik maupun komersial pada jaringan distribusi.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '<= 25 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '> 25 - 30 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '> 30 - 35 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '> 35 - 40 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '> 40 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'air-tidak-berekening.js',
            ],
            'jam-operasi' => [
                'id' => 13,
                'aspek_id' => 3,
                'slug' => 'jam-operasi',
                'title' => 'Jam Operasi Pelayanan',
                'aspek' => 'Aspek Operasional',
                'formula' => 'Jam Operasi = Rata-rata jam kontinuitas aliran air ke pelanggan per hari',
                'bobot' => '0.07',
                'deskripsi' => 'Kontinuitas pasokan air bersih mengalir ke pelanggan dalam 24 jam.',
                'satuan' => 'jam/hari',
                'standards' => [
                    ['syarat' => '24 Jam', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '>= 20 - < 24 Jam', 'nilai' => '4 (Baik)'],
                    ['syarat' => '>= 16 - < 20 Jam', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '>= 12 - < 16 Jam', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 12 Jam', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'jam-operasi.js',
            ],
            'tekanan-air' => [
                'id' => 14,
                'aspek_id' => 3,
                'slug' => 'tekanan-air',
                'title' => 'Tekanan Air Sambungan Pelanggan',
                'aspek' => 'Aspek Operasional',
                'formula' => 'Tekanan Air = (Pelanggan Tekanan >= 0.7 bar / Total Pelanggan) * 100%',
                'bobot' => '0.07',
                'deskripsi' => 'Kecukupan tekanan air minimal 0.7 bar pada sambungan pelanggan.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 80 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '65 % - < 80 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '50 % - < 65 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '35 % - < 50 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 35 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'tekanan-air.js',
            ],
            'penggantian-meter' => [
                'id' => 15,
                'aspek_id' => 3,
                'slug' => 'penggantian-meter',
                'title' => 'Penggantian Meter Air Pelanggan',
                'aspek' => 'Aspek Operasional',
                'formula' => 'Penggantian Meter = (Meter Terganti / Total Meter Usia > 5 Tahun) * 100%',
                'bobot' => '0.07',
                'deskripsi' => 'Realisasi kalibrasi dan peremajaan meter air pelanggan yang sudah berusia di atas 5 tahun.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 20 % per tahun', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '15 % - < 20 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '10 % - < 15 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '5 % - < 10 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 5 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'penggantian-meter.js',
            ],
            'jumlah-pegawai' => [
                'id' => 16,
                'aspek_id' => 4,
                'slug' => 'jumlah-pegawai',
                'title' => 'Rasio Jumlah Pegawai',
                'aspek' => 'Aspek SDM',
                'formula' => 'Rasio Pegawai = (Jumlah Pegawai / Total Pelanggan) * 1000',
                'bobot' => '0.07',
                'deskripsi' => 'Efisiensi produktivitas pegawai per 1.000 sambungan pelanggan terdaftar.',
                'satuan' => 'pegawai/1000 pel.',
                'standards' => [
                    ['syarat' => '<= 5 Pegawai', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '> 5 - 6 Pegawai', 'nilai' => '4 (Baik)'],
                    ['syarat' => '> 6 - 8 Pegawai', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '> 8 - 10 Pegawai', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '> 10 Pegawai', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'jumlah-pegawai.js',
            ],
            'rasio-pegawai-diklat' => [
                'id' => 17,
                'aspek_id' => 4,
                'slug' => 'rasio-pegawai-diklat',
                'title' => 'Rasio Pegawai Mendapat Diklat',
                'aspek' => 'Aspek SDM',
                'formula' => 'Pegawai Diklat = (Pegawai Mengikuti Pelatihan / Total Pegawai) * 100%',
                'bobot' => '0.04',
                'deskripsi' => 'Persentase pegawai yang memperoleh pelatihan dan sertifikasi kompetensi.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 80 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '60 % - < 80 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '40 % - < 60 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '20 % - < 40 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 20 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'rasio-pegawai-diklat.js',
            ],
            'rasio-biaya-diklat' => [
                'id' => 18,
                'aspek_id' => 4,
                'slug' => 'rasio-biaya-diklat',
                'title' => 'Rasio Biaya Diklat',
                'aspek' => 'Aspek SDM',
                'formula' => 'Biaya Diklat = (Biaya Pelatihan Pegawai / Total Biaya Pegawai) * 100%',
                'bobot' => '0.04',
                'deskripsi' => 'Alokasi anggaran pengembangan kompetensi SDM terhadap total beban pegawai.',
                'satuan' => '%',
                'standards' => [
                    ['syarat' => '>= 5 %', 'nilai' => '5 (Sangat Baik)'],
                    ['syarat' => '3.5 % - < 5 %', 'nilai' => '4 (Baik)'],
                    ['syarat' => '2 % - < 3.5 %', 'nilai' => '3 (Cukup)'],
                    ['syarat' => '1 % - < 2 %', 'nilai' => '2 (Kurang)'],
                    ['syarat' => '< 1 %', 'nilai' => '1 (Buruk)'],
                ],
                'js_file' => 'rasio-biaya-diklat.js',
            ],
        ];
    }

    /**
     * Overview of all performance aspects and indicators.
     */
    public function index()
    {
        try {
            $aspeks = Aspek::with(['indikators'])->get();
            $latestKinerja = Kinerja::orderBy('periode', 'desc')->take(20)->get();
        } catch (\Throwable $e) {
            $aspeks = collect();
            $latestKinerja = collect();
        }

        return view('kinerja.index', compact('aspeks', 'latestKinerja'));
    }

    /**
     * Universal indicator detail view by slug or ID
     */
    public function showIndicator($slugOrId)
    {
        $allMeta = self::getIndicatorMeta();
        $targetMeta = null;

        // Search by slug first
        if (isset($allMeta[$slugOrId])) {
            $targetMeta = $allMeta[$slugOrId];
        } else {
            // Search by numeric ID
            foreach ($allMeta as $meta) {
                if ($meta['id'] == $slugOrId) {
                    $targetMeta = $meta;
                    break;
                }
            }
        }

        if (!$targetMeta) {
            // Fallback generic meta
            $targetMeta = [
                'id' => (int)$slugOrId,
                'slug' => (string)$slugOrId,
                'title' => 'Indikator Kinerja #' . $slugOrId,
                'aspek' => 'Aspek Kinerja',
                'formula' => 'Nilai = Data 1 / Data 2',
                'bobot' => '0.05',
                'deskripsi' => 'Evaluasi capaian kinerja per periode.',
                'satuan' => '',
                'standards' => [],
            ];
        }

        $records = collect();
        $latest = null;
        try {
            $records = Kinerja::where('indikator', (string)$targetMeta['id'])
                ->orderBy('periode', 'desc')
                ->take(12)
                ->get();
            $latest = $records->first();
        } catch (\Throwable $e) {
            // fallback
        }

        $score = $latest ? (float)$latest->score : 4.0;
        $stars = (int)round($score);
        $currentHasil = $latest ? $latest->hasil : '85.00';

        return view('kinerja.detail', compact('targetMeta', 'records', 'latest', 'score', 'stars', 'currentHasil'));
    }

    /**
     * Wizard forms for Posting Kinerja (replaces aspek-*-input.php)
     */
    public function inputKeuangan()
    {
        return view('kinerja.wizard-keuangan', [
            'title' => 'Posting Kinerja - Aspek Keuangan',
            'aspekId' => 1,
        ]);
    }

    public function inputPelayanan()
    {
        return view('kinerja.wizard-pelayanan', [
            'title' => 'Posting Kinerja - Aspek Pelayanan',
            'aspekId' => 2,
        ]);
    }

    public function inputOperasional()
    {
        return view('kinerja.wizard-operasional', [
            'title' => 'Posting Kinerja - Aspek Operasional',
            'aspekId' => 3,
        ]);
    }

    public function inputSdm()
    {
        return view('kinerja.wizard-sdm', [
            'title' => 'Posting Kinerja - Aspek SDM',
            'aspekId' => 4,
        ]);
    }

    /**
     * Store performance evaluation records.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aspek_id' => 'required|integer',
            'periode' => 'required|date',
            'indikator' => 'required',
            'deskripsi1' => 'nullable|string',
            'data1' => 'nullable|numeric',
            'deskripsi2' => 'nullable|string',
            'data2' => 'nullable|numeric',
            'hasil' => 'nullable|string',
            'score' => 'nullable|string',
            'bobot' => 'nullable|string',
        ]);

        Kinerja::create($validated);

        return back()->with('success', 'Data kinerja berhasil disimpan!');
    }
}
