@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <img src="{{ $produk->foto_produk ? asset('storage/produk/'.$produk->foto_produk) : 'https://via.placeholder.com/800x600' }}" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h2>{{ $produk->nama_produk }}</h2>
      <p class="text-success fw-bold">Rp {{ number_format($produk->harga) }}</p>
      <p>{{ $produk->deskripsi }}</p>

      <hr>
      <h6>Penjual: <a href="{{ route('toko.show', $produk->toko->id) }}">{{ $produk->toko->nama_toko }}</a></h6>
      <p>Kontak WA: {{ $produk->toko->nomor_wa ?? '-' }}</p>

      @php
        $wa_number = $produk->toko->nomor_wa;
        $message = "Halo%20saya%20ingin%20memesan%20%3A%20".$produk->nama_produk."%20(%20ID%20".$produk->id."%20)";
        // encode spaces and special chars already done above
      @endphp

      @if($wa_number)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$wa_number) }}?text={{ urlencode("Halo saya ingin memesan produk: ".$produk->nama_produk." (ID ".$produk->id.")") }}" target="_blank" class="btn btn-success">
          Pesan via WhatsApp
        </a>
      @else
        <button class="btn btn-secondary" disabled>Kontak WA tidak tersedia</button>
      @endif
    </div>
  </div>
</div>
@endsection
