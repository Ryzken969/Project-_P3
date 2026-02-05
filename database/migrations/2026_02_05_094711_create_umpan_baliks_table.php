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
        Schema::create('umpan_baliks', function (Blueprint $table) {
            $table->id('id_umpan_balik');
            $table->text('isi_umpan_balik');

            $table->foreignId('id_aspirasi')
                ->constrained('aspirasis','id_aspirasi')
                ->cascadeOnDelete();

            $table->foreignId('id_admin')
                ->constrained('admins','id_admin')
                ->cascadeOnDelete();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umpan_baliks');
    }
};
