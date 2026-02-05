<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id('id_aspirasi');
            $table->string('judul');
            $table->text('isi_aspirasi');
            $table->string('status')->default('menunggu');

            $table->foreignId('id_siswa')
                ->constrained('siswas','id_siswa')
                ->cascadeOnDelete();

            $table->foreignId('id_kategori')
                ->constrained('kategoris','id_kategori')
                ->cascadeOnDelete();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
