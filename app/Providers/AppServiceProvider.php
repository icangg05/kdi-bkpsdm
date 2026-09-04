<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
    // Hanya Bootstrap 5. Panggilan useBootstrapFour() sesudahnya membatalkan
    // yang ini dan merender markup paginasi versi 4 di halaman Bootstrap 5.
    Paginator::useBootstrapFive();

    // Tanpa Gate ini setiap @can('admin') di view diam-diam bernilai false,
    // sementara route-nya tetap terbuka untuk siapa pun yang sudah login.
    Gate::define('admin', fn(User $user) => $user->isAdmin());

    // Di belakang reverse proxy Laravel bisa menyimpulkan skema http dan
    // membangkitkan URL http:// di halaman yang dilayani lewat https.
    if ($this->app->isProduction()) {
      URL::forceScheme('https');
    }

  }
}
