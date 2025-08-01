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
    Schema::create('halaman', function (Blueprint $table) {
      $table->id();
      $table->text('isi')->nullable();
      $table->string('kategori');
      $table->string('gambar')->nullable();
      $table->string('link')->nullable();
      $table->string('lampiran')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('halaman');
  }
};
