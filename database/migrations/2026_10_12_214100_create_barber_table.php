<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel master independen: tidak memiliki foreign key.
        Schema::create('barber', function (Blueprint $table) {
            $table->increments('barber_id');
            $table->string('nama', 100);
            $table->string('email')->unique();
            $table->string('no_telepon', 20);
            $table->string('spesialisasi', 100);
            $table->string('status', 20)->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barber');
    }
};
