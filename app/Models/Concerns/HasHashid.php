<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

/**
 * Mengganti ID berurutan di URL publik dengan hashid.
 *
 * Ini penyamaran, bukan enkripsi: hashid bisa didekode siapa pun yang tahu
 * salt-nya. Gunanya cuma supaya URL tidak membocorkan jumlah dan urutan data,
 * jadi jangan dipakai sebagai pengganti otorisasi.
 *
 * Salt diambil dari APP_KEY, sehingga hashid ikut berubah kalau kunci
 * aplikasi dirotasi.
 */
trait HasHashid
{
  /**
   * Dipanggil Eloquent untuk tiap instance, jadi 'hashid' selalu ikut saat
   * model diserialkan ke props Inertia tanpa perlu menyentuh $appends model.
   */
  public function initializeHasHashid(): void
  {
    $this->append('hashid');
  }

  public function getHashidAttribute(): string
  {
    return $this->getKey() ? hashids()->encode($this->getKey()) : '';
  }

  public function getRouteKey(): string
  {
    return $this->hashid;
  }

  public function resolveRouteBinding($value, $field = null): ?Model
  {
    $id = hashids()->decode((string) $value)[0] ?? null;

    return $id ? $this->where($this->getKeyName(), $id)->first() : null;
  }
}
