<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nik', 20)->unique();
                $table->string('nama', 100);
                $table->string('password', 255);
                $table->char('lvl', 2)->default('2')->comment('1: Admin, 2: Operator');
                $table->rememberToken();
                $table->timestamp('created_at')->useCurrent();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

