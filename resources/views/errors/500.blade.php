@extends('errors.layout')

@section('code', '500')
@section('judul', 'Terjadi kesalahan pada server')
@section('uraian', 'Gangguan ada di sisi kami, bukan pada perangkat Anda. Silakan coba beberapa saat lagi.')

@section('aksi')
  <a class="aksi" href="{{ url('/') }}">Kembali ke Beranda</a>
@endsection
