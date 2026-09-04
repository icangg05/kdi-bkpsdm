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
    Schema::create('regulasi', function (Blueprint $table) {
      $table->id();
      $table->foreignId('kategori_regulasi_id')
        ->nullable()
        ->constrained('kategori_regulasi')
        ->nullOnDelete();
      $table->string('judul');
      $table->text('deskripsi')->nullable();
      $table->string('lampiran');
      $table->integer('total_unduh')->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('regulasi');
  }
};
