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
        Schema::create('prokers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proker');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('anggaran', 15, 2)->default(0);
            $table->enum('status', ['planning', 'ongoing', 'completed', 'cancelled'])->default('planning');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prokers');
    }
};
