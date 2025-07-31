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
    Schema::create('pejabat', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->foreignId('jabatan_id')
        ->nullable()
        ->constrained('jabatan')
        ->nullOnDelete();
      $table->text('biografi')->nullable();
      $table->string('foto')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('pejabat');
  }
};
