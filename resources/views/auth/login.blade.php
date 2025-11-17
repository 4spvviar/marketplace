@extends('layouts.main')
@section('content')
<div class="container">
  <h3>Login</h3>
  <form method="POST" action="/login">@csrf
    <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control"></div>
    <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control"></div>
    <button class="btn btn-primary">Login</button>
  </form>
</div>
@endsection
