@extends('layouts.auth-master')

@section('title', 'Lumen | Авторизация')

@section('content')
    <form class="form-signin" action="{{ route('login') }}" method="post">
        @csrf
        <img src="{{ asset('storage/' . '/images/authLogo.jpg') }}" alt="" width="70px" class="mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
    </form>
@endsection
