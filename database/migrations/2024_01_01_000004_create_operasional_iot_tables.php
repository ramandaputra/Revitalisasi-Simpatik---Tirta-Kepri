<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('pelanggan')) {
            Schema::create('pelanggan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nosamb', 50)->index();
                $table->string('norekening', 50)->nullable();
                $table->string('nama', 150)->default('-');
                $table->text('alamat')->nullable();
                $table->string('rt', 50)->nullable();
                $table->string('norab', 100)->default('-');
                $table->date('tgldaftar')->nullable();
                $table->dateTime('tglputus')->nullable();
                $table->char('kategori_putus', 2)->nullable();
                $table->string('keterangan_putus', 150)->nullable();
                $table->dateTime('waktuupdate')->nullable();
                $table->string('latitude', 100)->nullable();
                $table->string('longitude', 100)->nullable();
                $table->string('rw', 50)->nullable();
                $table->string('nohp', 30)->nullable();
                $table->string('notelp', 30)->nullable();
                $table->string('email', 100)->nullable();
                $table->string('nosamb_utara', 50)->default('-');
                $table->string('nosamb_timur', 50)->default('-');
                $table->string('nosamb_barat', 50)->default('-');
                $table->string('nosamb_selatan', 50)->default('-');
                $table->string('koderayon', 20)->default('-');
                $table->string('kodekelurahan', 20)->default('-');
                $table->string('kodezona', 20)->default('-');
                $table->string('kodedma', 20)->default('-');
                $table->string('kodebanjar', 20)->default('-');
            });
        }

        if (!Schema::hasTable('spka_kegiatan')) {
            Schema::create('spka_kegiatan', function (Blueprint $table) {
                $table->increments('tiket');
                $table->string('dma', 100)->nullable();
                $table->string('kategori', 50)->nullable();
                $table->date('tanggal_lapor')->nullable();
                $table->longText('kegiatan')->nullable();
                $table->string('foto_kegiatan', 255)->nullable();
                $table->date('tanggal_selesai')->nullable();
                $table->string('petugas', 50)->nullable();
                $table->longText('penyelesaian')->nullable();
                $table->char('status', 2)->default('0')->comment('0: Belum, 1: Selesai, 2: Proses');
                $table->string('foto_penyelesaian', 255)->nullable();
            });
        }

        if (!Schema::hasTable('status_kelistrikan')) {
            Schema::create('status_kelistrikan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('status', 10)->default('Off');
                $table->timestamp('waktu')->useCurrent();
                $table->string('waduk', 50)->nullable();
            });
        }

        if (!Schema::hasTable('status_pompa')) {
            Schema::create('status_pompa', function (Blueprint $table) {
                $table->increments('id');
                $table->string('pompa', 50)->nullable();
                $table->string('status', 10)->default('Off');
                $table->timestamp('waktu')->useCurrent();
                $table->string('waduk', 50)->nullable();
            });
        }

        if (!Schema::hasTable('tma')) {
            Schema::create('tma', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamp('waktu')->useCurrent();
                $table->float('tma')->default(0);
                $table->string('waduk', 100);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tma');
        Schema::dropIfExists('status_pompa');
        Schema::dropIfExists('status_kelistrikan');
        Schema::dropIfExists('spka_kegiatan');
        Schema::dropIfExists('pelanggan');
    }
};

