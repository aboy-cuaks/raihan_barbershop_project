<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('layanan', function (Blueprint $table) {
            $table->unsignedInteger('kategori_id')->nullable();

            $table->foreign('kategori_id')
                ->references('kategori_id')
                ->on('kategori_layanan')
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('layanan', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
