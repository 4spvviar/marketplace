@extends('layouts.main')
@section('content')
<div class="container">
  <h3>Register</h3>
  <form method="POST" action="/register">@csrf
    <div class="mb-3"><label>Nama</label><input name="nama" class="form-control"></div>
    <div class="mb-3"><label>Kontak (WA)</label><input name="kontak" class="form-control"></div>
    <div class="mb-3"><label>Username</label><input name="username" class="form-control"></div>
    <div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control"></div>
    <button class="btn btn-success">Daftar</button>
  </form>
</div>
@endsection
