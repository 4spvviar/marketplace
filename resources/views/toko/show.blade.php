@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row mb-4">
    <div class="col-md-3">
      <img src="{{ $toko->foto_toko ? asset('storage/toko/'.$toko->foto_toko) : 'https://via.placeholder.com/300x300' }}" class="img-fluid rounded">
    </div>
    <div class="col-md-9">
      <h3>{{ $toko->nama_toko }}</h3>
      <p>{{ $toko->deskripsi }}</p>
      <p>WA: {{ $toko->nomor_wa }}</p>
      @if($toko->nomor_wa)
        <a target="_blank" href="https://wa.me/{{ preg_replace('/[^0-9]/','',$toko->nomor_wa) }}?text={{ urlencode('Halo, saya ingin info toko '.$toko->nama_toko) }}" class="btn btn-success">Hubungi via WA</a>
      @endif
    </div>
  </div>

  <h5>Produk dari {{ $toko->nama_toko }}</h5>
  <div class="row">
    @foreach($toko->produks as $p)
      <div class="col-md-3 mb-3">
        <div class="card h-100">
          <img src="{{ $p->foto_produk ? asset('storage/produk/'.$p->foto_produk) : 'https://via.placeholder.com/400x300' }}" class="card-img-top">
          <div class="card-body d-flex flex-column">
            <h6>{{ $p->nama_produk }}</h6>
            <p class="text-success">Rp {{ number_format($p->harga) }}</p>
            <a href="{{ route('produk.show',$p->id) }}" class="btn btn-primary mt-auto">Lihat</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
