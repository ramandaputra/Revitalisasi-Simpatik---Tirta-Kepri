<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('produksi')) {
            Schema::create('produksi', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ipa', 50)->default('');
                $table->string('target', 20)->default('0');
                $table->string('produksi', 20)->default('0');
                $table->date('waktu');
                $table->string('waduk', 50);
            });
        }

        if (!Schema::hasTable('distribusi')) {
            Schema::create('distribusi', function (Blueprint $table) {
                $table->increments('id');
                $table->string('jdu', 50);
                $table->string('target', 20)->default('0');
                $table->string('distribusi', 20)->default('0');
                $table->date('waktu');
                $table->string('waduk', 50);
            });
        }

        if (!Schema::hasTable('dma')) {
            Schema::create('dma', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama_dma', 100);
            });
        }

        if (!Schema::hasTable('ganti_meter')) {
            Schema::create('ganti_meter', function (Blueprint $table) {
                $table->increments('id');
                $table->string('target', 20)->default('0');
                $table->string('ganti_meter', 20)->default('0');
                $table->date('waktu');
                $table->string('wilayah', 50);
            });
        }

        if (!Schema::hasTable('kualitas_air')) {
            Schema::create('kualitas_air', function (Blueprint $table) {
                $table->increments('id');
                $table->dateTime('waktu')->nullable();
                $table->string('lokasi', 100)->nullable();
                $table->string('warna', 20)->nullable();
                $table->string('kekeruhan', 20)->nullable();
                $table->string('tds', 20)->nullable();
                $table->string('ph', 20)->nullable();
                $table->string('scl', 20)->nullable();
                $table->string('waduk', 100)->nullable();
            });
        }

        if (!Schema::hasTable('nrw')) {
            Schema::create('nrw', function (Blueprint $table) {
                $table->increments('id');
                $table->date('waktu');
                $table->string('jdu', 50);
                $table->string('target', 20);
                $table->string('pelanggan', 20);
                $table->string('penjualan', 20);
                $table->string('kehilangan', 20);
                $table->decimal('persentase', 10, 2);
                $table->string('waduk', 50);
                $table->string('wilayah', 10)->nullable();
            });
        }

        if (!Schema::hasTable('nrw_dma')) {
            Schema::create('nrw_dma', function (Blueprint $table) {
                $table->id();
                $table->string('dma', 100)->nullable();
                $table->date('periode')->nullable();
                $table->string('lalu', 20)->nullable();
                $table->string('kini', 20)->nullable();
                $table->double('distribusi')->nullable();
                $table->double('pelanggan')->nullable();
                $table->double('pemakaian')->nullable();
                $table->double('kehilangan')->nullable();
                $table->string('persentase', 20)->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('nrw_dma');
        Schema::dropIfExists('nrw');
        Schema::dropIfExists('kualitas_air');
        Schema::dropIfExists('ganti_meter');
        Schema::dropIfExists('dma');
        Schema::dropIfExists('distribusi');
        Schema::dropIfExists('produksi');
    }
};

