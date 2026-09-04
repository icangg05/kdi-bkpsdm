@extends('errors.layout')

@section('code', '503')
@section('judul', 'Situs sedang dalam pemeliharaan')
@section('uraian', 'Situs sedang diperbarui dan akan kembali dalam waktu dekat. Tidak ada tindakan yang perlu Anda lakukan.')

@section('aksi')
  {{-- Selama pemeliharaan semua alamat mengembalikan 503, jadi tautan ke
       halaman lain hanya akan membawa pengunjung ke galat yang sama. --}}
  <button class="aksi" type="button" onclick="window.location.reload()">Coba Lagi</button>
@endsection
