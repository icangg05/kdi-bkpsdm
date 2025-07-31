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
    Schema::create('unit_organisasi', function (Blueprint $table) {
      $table->id();
      $table->foreignId('bagian_id')
        ->nullable()
        ->constrained('bagian')
        ->nullOnDelete();
      $table->string('nama');
      $table->string('slug');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('unit_organisasi');
  }
};
