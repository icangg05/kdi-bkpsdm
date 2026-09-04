<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BackupController extends Controller
{
  /** Jumlah maksimal file backup yang boleh tersimpan. */
  private const MAX = 6;

  private function dir(): string
  {
    $dir = storage_path('app/backup');
    if (! is_dir($dir)) {
      mkdir($dir, 0755, true);
    }

    return $dir;
  }

  /** Cegah path traversal: hanya nama file backup yang valid. */
  private function path(string $file): string
  {
    abort_unless(preg_match('/^backup-\d{4}-\d{2}-\d{2}-\d{6}\.sql$/', $file), 404);

    $path = $this->dir() . '/' . $file;
    abort_unless(is_file($path), 404);

    return $path;
  }

  public function index()
  {
    $title = 'Backup Database';

    $data = collect(glob($this->dir() . '/backup-*.sql'))
      ->sortDesc()
      ->map(fn($path) => [
        'nama'    => basename($path),
        'ukuran'  => round(filesize($path) / 1024, 1),
        'tanggal' => date('d/m/Y H:i:s', filemtime($path)),
      ])
      ->values();

    $penuh = $data->count() >= self::MAX;

    return view('dashboard.backup', compact('title', 'data', 'penuh'));
  }

  public function store()
  {
    if (count(glob($this->dir() . '/backup-*.sql')) >= self::MAX) {
      return redirect()->back()->with('error', 'Backup sudah mencapai batas ' . self::MAX . ' file. Hapus salah satu file lama terlebih dahulu.');
    }

    $file = $this->dir() . '/backup-' . date('Y-m-d-His') . '.sql';
    $handle = fopen($file, 'w');
    $pdo = DB::getPdo();

    fwrite($handle, "-- Backup " . config('database.connections.mysql.database') . " - " . now() . "\n");
    fwrite($handle, "SET NAMES utf8mb4;\nSET FOREIGN_KEY_CHECKS=0;\n");

    foreach (DB::select('SHOW TABLES') as $row) {
      $table = array_values((array) $row)[0];
      $create = array_values((array) DB::selectOne("SHOW CREATE TABLE `$table`"))[1];

      fwrite($handle, "\nDROP TABLE IF EXISTS `$table`;\n$create;\n\n");

      foreach (DB::table($table)->cursor() as $record) {
        $values = array_map(
          fn($v) => is_null($v) ? 'NULL' : $pdo->quote((string) $v),
          (array) $record
        );
        fwrite($handle, "INSERT INTO `$table` VALUES (" . implode(',', $values) . ");\n");
      }
    }

    fwrite($handle, "\nSET FOREIGN_KEY_CHECKS=1;\n");
    fclose($handle);

    return redirect()->back()->with('success', 'Backup database berhasil dibuat: ' . basename($file));
  }

  public function download(string $file): BinaryFileResponse
  {
    return response()->download($this->path($file));
  }

  public function destroy(string $file)
  {
    unlink($this->path($file));

    return redirect()->back()->with('success', 'File backup berhasil dihapus!');
  }
}
