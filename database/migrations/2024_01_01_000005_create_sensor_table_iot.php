<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migration for kepri_iot database.
     */
    public function up(): void
    {
        $connection = Schema::connection('kepri_iot');

        if (!$connection->hasTable('sensor')) {
            $connection->create('sensor', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamp('time')->useCurrent();
                $table->string('pressure', 10)->default('0');
                $table->string('flow', 10)->default('0');
                $table->string('tds', 10)->default('0');
                $table->string('water_level', 10)->default('0');
                $table->string('lat', 20)->default('0');
                $table->string('lng', 20)->default('0');
                $table->string('name', 60)->index();
            });
        }
    }

    public function down(): void
    {
        Schema::connection('kepri_iot')->dropIfExists('sensor');
    }
};

