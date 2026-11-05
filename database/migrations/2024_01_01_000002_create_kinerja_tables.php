<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('aspek')) {
            Schema::create('aspek', function (Blueprint $table) {
                $table->increments('aspek_id');
                $table->string('aspek_kinerja', 100)->nullable();
            });
        }

        if (!Schema::hasTable('indikator')) {
            Schema::create('indikator', function (Blueprint $table) {
                $table->increments('indikator_id');
                $table->unsignedInteger('aspek_id');
                $table->string('indikator', 100)->nullable();
            });
        }

        if (!Schema::hasTable('kinerja')) {
            Schema::create('kinerja', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('aspek_id')->nullable();
                $table->date('periode')->nullable();
                $table->string('indikator', 200)->nullable();
                $table->string('deskripsi1', 100)->nullable();
                $table->decimal('data1', 50, 2)->nullable();
                $table->string('deskripsi2', 100)->nullable();
                $table->decimal('data2', 50, 2)->nullable();
                $table->string('hasil', 20)->nullable();
                $table->string('score', 10)->nullable();
                $table->string('bobot', 10)->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('kinerja');
        Schema::dropIfExists('indikator');
        Schema::dropIfExists('aspek');
    }
};

