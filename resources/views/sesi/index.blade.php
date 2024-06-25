@extends('layout.template')
@section('tugas')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1 class="text-center mb-4">Login</h1>
        <form action="/sesi/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{Session::get('email')}}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="mb-3 d-grid">
                <a>Silahkan Redistasi terlebih dahulu....!!</a>
                <a href="/sesi/register" name="submit" type="submit" class="link">Sig in</a>
            </div>
@endsection