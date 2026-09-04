<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::table('users', function (Blueprint $table) {
      // Default 'operator': akun baru tidak otomatis bisa mengelola user lain
      // maupun mengunduh backup basis data.
      $table->string('role', 20)->default('operator')->after('email');
    });

    // Akun yang sudah ada adalah administrator saat ini. Menjadikan mereka
    // operator akan mengunci semua orang keluar dari menu User.
    DB::table('users')->update(['role' => 'admin']);
  }

  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('role');
    });
  }
};
