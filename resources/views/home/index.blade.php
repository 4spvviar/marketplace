@extends('layouts.main')

@section('content')
<div class="container">
  <div class="py-5 text-center" style="background:url('/images/banner.jpg') center/cover no-repeat; color:#fff">
    <h1>Marketplace Sekolah</h1>
    <p>Platform jual-beli antar warga sekolah</p>
  </div>

  <h4 class="mt-4">Produk Terbaru</h4>
  <div class="row">
    @foreach ($produk as $p)
      <div class="col-md-3 mb-4">
        <div class="card h-100">
          <img src="{{ $p->foto_produk ? asset('storage/produk/'.$p->foto_produk) : 'https://via.placeholder.com/400x300' }}" class="card-img-top" alt="">
          <div class="card-body d-flex flex-column">
            <h6 class="card-title">{{ $p->nama_produk }}</h6>
            <p class="text-success fw-bold">Rp {{ number_format($p->harga,0,',','.') }}</p>
            <a href="{{ route('produk.show',$p->id) }}" class="btn btn-primary mt-auto">Lihat</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
