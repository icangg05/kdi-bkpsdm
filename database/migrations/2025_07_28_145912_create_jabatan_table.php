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
    Schema::create('jabatan', function (Blueprint $table) {
      $table->id();
      $table->foreignId('unit_organisasi_id')
        ->nullable()
        ->constrained('unit_organisasi')
        ->nullOnDelete();
      $table->string('nama');
      $table->string('slug');
      $table->text('tugas')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('jabatan');
  }
};
