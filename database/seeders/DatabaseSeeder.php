<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Aspek;
use App\Models\Indikator;
use App\Models\Dma;
use App\Models\StatusPompa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::firstOrCreate(
            ['nik' => '020233'],
            [
                'nama' => 'Farhan (Admin)',
                'password' => Hash::make('12345'),
                'lvl' => '1',
            ]
        );

        User::firstOrCreate(
            ['nik' => 'admin'],
            [
                'nama' => 'Administrator',
                'password' => Hash::make('admin123'),
                'lvl' => '1',
            ]
        );

        // 2. Seed Aspek
        $aspeks = [
            1 => 'Aspek Keuangan',
            2 => 'Aspek Pelayanan',
            3 => 'Aspek Operasional',
            4 => 'Aspek SDM',
        ];

        foreach ($aspeks as $id => $nama) {
            Aspek::firstOrCreate(
                ['aspek_id' => $id],
                ['aspek_kinerja' => $nama]
            );
        }

        // 3. Seed Indikator
        $indikators = [
            // Keuangan (aspek 1)
            ['indikator_id' => 1, 'aspek_id' => 1, 'indikator' => 'Return on Equity'],
            ['indikator_id' => 2, 'aspek_id' => 1, 'indikator' => 'Ratio Operasi'],
            ['indikator_id' => 3, 'aspek_id' => 1, 'indikator' => 'Cash Ratio'],
            ['indikator_id' => 4, 'aspek_id' => 1, 'indikator' => 'Efisiensi Penagihan'],
            ['indikator_id' => 5, 'aspek_id' => 1, 'indikator' => 'Solvabilitas'],

            // Pelayanan (aspek 2)
            ['indikator_id' => 6, 'aspek_id' => 2, 'indikator' => 'Cakupan Pelayanan'],
            ['indikator_id' => 7, 'aspek_id' => 2, 'indikator' => 'Pertumbuhan Pelanggan'],
            ['indikator_id' => 8, 'aspek_id' => 2, 'indikator' => 'Penyelesaian Pengaduan'],
            ['indikator_id' => 9, 'aspek_id' => 2, 'indikator' => 'Kualitas Air Pelanggan'],
            ['indikator_id' => 10, 'aspek_id' => 2, 'indikator' => 'Konsumsi Air Pelanggan'],

            // Operasional (aspek 3)
            ['indikator_id' => 11, 'aspek_id' => 3, 'indikator' => 'Ratio Efisiensi Produksi'],
            ['indikator_id' => 12, 'aspek_id' => 3, 'indikator' => 'Air Tidak Berekening'],
            ['indikator_id' => 13, 'aspek_id' => 3, 'indikator' => 'Jam Operasi Pelayanan'],
            ['indikator_id' => 14, 'aspek_id' => 3, 'indikator' => 'Tekanan Air Pelanggan'],
            ['indikator_id' => 15, 'aspek_id' => 3, 'indikator' => 'Penggantian Meter Pelanggan'],

            // SDM (aspek 4)
            ['indikator_id' => 16, 'aspek_id' => 4, 'indikator' => 'Jumlah Pegawai'],
            ['indikator_id' => 17, 'aspek_id' => 4, 'indikator' => 'Ratio Pegawai Diklat'],
            ['indikator_id' => 18, 'aspek_id' => 4, 'indikator' => 'Ratio Biaya Diklat'],
        ];

        foreach ($indikators as $ind) {
            Indikator::firstOrCreate(
                ['indikator_id' => $ind['indikator_id']],
                ['aspek_id' => $ind['aspek_id'], 'indikator' => $ind['indikator']]
            );
        }

        // 4. Seed Status Pompa Defaults
        $pompas = [
            ['pompa' => 'PSAB', 'status' => 'On', 'waduk' => 'Sei Pulai'],
            ['pompa' => 'PCM', 'status' => 'On', 'waduk' => 'Sei Pulai'],
            ['pompa' => 'RPD', 'status' => 'On', 'waduk' => 'Sei Pulai'],
            ['pompa' => 'HDPE', 'status' => 'On', 'waduk' => 'Sei Pulai'],
            ['pompa' => 'GESEK', 'status' => 'On', 'waduk' => 'Sei Gesek'],
            ['pompa' => 'KJG_ZONA_1', 'status' => 'On', 'waduk' => 'Kolong Enam'],
            ['pompa' => 'KJG_ZONA_2', 'status' => 'On', 'waduk' => 'Kolong Enam'],
            ['pompa' => 'TUB_ZONA_1', 'status' => 'On', 'waduk' => 'Sei Jago'],
            ['pompa' => 'TUB_ZONA_2', 'status' => 'On', 'waduk' => 'Sei Jago'],
        ];

        foreach ($pompas as $p) {
            StatusPompa::firstOrCreate(
                ['pompa' => $p['pompa'], 'waduk' => $p['waduk']],
                ['status' => $p['status']]
            );
        }
    }
}

