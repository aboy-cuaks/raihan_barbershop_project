<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->increments('pertanyaan_id');
            $table->string('nama', 100);
            $table->string('email');
            $table->string('subjek', 150)->nullable();
            $table->string('pertanyaan', 300);
            $table->string('status', 20)->default('baru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
