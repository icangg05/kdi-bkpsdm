<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Paginator::useBootstrapFive();
    Paginator::useBootstrapFour();

    Gate::define('admin', function (User $user) {
      return $user->role == 'admin';
    });
    Gate::define('pengelola-konten', function (User $user) {
      return $user->role == 'pengelola-konten';
    });
  }
}
