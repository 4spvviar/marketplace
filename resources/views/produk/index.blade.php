@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row mb-3">
    <div class="col-md-3">
      <h5>Kategori</h5>
      <ul class="list-group">
        <a href="{{ route('produk.index') }}" class="list-group-item">Semua</a>
        @foreach($kategori as $k)
          <a class="list-group-item" href="{{ route('produk.index', ['kategori' => $k->id]) }}">
            {{ $k->nama }}
          </a>
        @endforeach
      </ul>
    </div>

    <div class="col-md-9">
      <div class="row">
        @foreach($produk as $p)
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="{{ $p->foto_produk ? asset('storage/produk/'.$p->foto_produk) : 'https://via.placeholder.com/400x300' }}" class="card-img-top">
              <div class="card-body d-flex flex-column">
                <h6>{{ $p->nama_produk }}</h6>
                <p class="text-success fw-bold">Rp {{ number_format($p->harga) }}</p>
                <a href="{{ route('produk.show',$p->id) }}" class="btn btn-outline-primary mt-auto">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{ $produk->links() }}
    </div>
  </div>
</div>
@endsection
