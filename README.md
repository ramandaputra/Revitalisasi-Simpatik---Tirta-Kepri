# SIMPATIK V2.0 - Laravel Framework Edition

Aplikasi **SIMPATIK V2.0** (Sistem Informasi Manajemen Pemantauan & Analisis Kinerja PDAM / SPAM) kini telah dimigrasi dan di-update secara penuh menggunakan framework **Laravel 13** (PHP 8.3+ / PHP 8.5).

---

## 🚀 Fitur Utama & Modul

1. **Dashboard Eksekutif & Telemetri SCADA Real-Time (`/`)**
   - Pemantauan real-time status pompa IPA (Sei Pulai, Sei Gesek, Sei Jago, Kolong Enam) dengan auto-refresh setiap 5 detik.
   - Pemantauan data produksi air bulanan (m³) dan sensor logger tekanan (bar).
   - Ringkasan 4 Aspek Kinerja (Keuangan, Pelayanan, Operasional, SDM).
   - Grafik interaktif Target vs Realisasi Produksi (Chart.js).
   - Counter tiket SPKA lapangan & hasil uji kualitas air terkini.

2. **WebGIS Jaringan Distribusi (`/gis`)**
   - Peta interaktif berbasis **Leaflet** & citra satelit Esri/OSM.
   - Pencarian data pelanggan berdasarkan No Sambungan (`nosamb`) atau Nama.
   - Filter zona wilayah dan marker lokasi pelanggan / sensor / IPA.

3. **Posting & Evaluasi Kinerja (`/kinerja`)**
   - Formulir penginputan kinerja terstandarisasi untuk 4 Aspek utama:
     - Aspek Keuangan (ROE, Ratio Operasi, Cash Ratio, Efisiensi Penagihan, Solvabilitas).
     - Aspek Pelayanan (Cakupan Pelayanan, Pertumbuhan Pelanggan, Penyelesaian Pengaduan, Kualitas Air, Konsumsi Air).
     - Aspek Operasional (Ratio Efisiensi Produksi, Air Tidak Berekening / NRW, Jam Operasi, Tekanan Air, Penggantian Meter).
     - Aspek SDM (Jumlah Pegawai, Rasio Pegawai Diklat, Rasio Biaya Diklat).
   - Halaman detail indikator (`/kinerja/indikator/{id}`) lengkap dengan grafik tren historis.

4. **Modul Teknik (`/teknik/*`)**
   - **Produksi Air** (`/teknik/produksi`): Monitoring dan formulir input target vs realisasi produksi.
   - **Distribusi JDU** (`/teknik/distribusi`): Monitoring dan input aliran pipa utama (HDPE, RPD, PCM, WK).
   - **Monitoring DMA** (`/teknik/dma`): Evaluasi kebocoran dan NRW per District Meter Area.
   - **Perawatan & Penggantian Meter** (`/teknik/perawatan-meter`): Rekapitulasi target vs penggantian meter fisik di TNJ, KJG, TUB.
   - **Uji Kualitas Air** (`/teknik/kualitas-air`): Rekapitulasi parameter fisika & kimia (Warna, Kekeruhan, TDS, pH, Sisa Chlor).
   - **Tingkat Kehilangan Air** (`/teknik/kehilangan-air`): Analisis NRW jaringan pipa.

5. **Modul Keuangan (`/keuangan/*`)**
   - **Arus Kas & Cash Ratio** (`/keuangan/arus-kas`): Monitoring kas terhadap hutang lancar.
   - **Efisiensi Penagihan** (`/keuangan/efisiensi-penagihan`): Penerimaan rekening air ditagihkan.
   - **DRD Posting** (`/keuangan/drd-posting`): Daftar rekening ditagihkan per wilayah.
   - **Perbaikan Rekening** (`/keuangan/perbaikan-rekening`): Verifikasi koreksi rekening pelanggan.
   - **Tunggakan & Pemutusan** (`/keuangan/tunggakan`): Pelanggan menunggak > 3 bulan dan status SPP.

6. **Surat Perintah Kerja & Aksi (SPKA) (`/spka`)**
   - Manajemen tiket temuan lapangan & kebocoran pipa.
   - Upload dokumentasi foto temuan dan foto hasil perbaikan teknisi.
   - Filter status pekerjaan (Selesai, Sedang Proses, Belum Ditindaklanjuti).

7. **Keamanan & Autentikasi (`/login`, `/logout`)**
   - Proteksi CSRF di seluruh form penginputan.
   - Dukungan autentikasi berbasis NIK (kompatibel dengan hash MD5 legacy dan Bcrypt otomatis).
   - Role permission (Admin lvl 1 & Operator lvl 2).

---

## 🌐 Menjalankan Aplikasi

### Lewat Laragon:
- Buka browser dan akses: `http://dashboard.test`
- Laragon secara otomatis mendeteksi folder `public/` sebagai DocumentRoot.

### Lewat PHP Built-in Server:
```bash
php artisan serve
```
Akses di: `http://localhost:8000`

---

## 📂 Backup File Legacy
Seluruh file asli PHP native sebelum migrasi tersimpan dengan aman di folder:
📁 `legacy_backup/`

