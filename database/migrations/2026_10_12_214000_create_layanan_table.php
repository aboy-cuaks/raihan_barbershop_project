<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel master independen: tidak memiliki foreign key.
        Schema::create('layanan', function (Blueprint $table) {
            $table->increments('layanan_id');
            $table->string('nama_layanan', 100);
            $table->text('deskripsi')->nullable();
            $table->unsignedSmallInteger('durasi_menit')->default(30);
            $table->decimal('harga', 12, 2)->default(0);
            $table->string('status', 20)->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
