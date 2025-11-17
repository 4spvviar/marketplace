@extends('layouts.main')

@section('content')
<h4 class="mb-3">Produk Terbaru</h4>

<div class="row">
    @forelse($produk as $p)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama_produk }}</h5>
                    <p class="text-success fw-bold">Rp {{ number_format($p->harga) }}</p>
                    <a href="{{ route('produk.detail', $p->id_produk) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    @empty
        <p>Tidak ada produk.</p>
    @endforelse
</div>
@endsection
