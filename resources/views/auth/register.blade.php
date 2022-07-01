@extends('layouts.auth-master')

@section('title', 'Lumen | Регистрация')

@section('content')
    <form class="form-signin" action="{{ route('register') }}" method="post">
        @csrf
        <img src="{{ asset('storage/' . '/images/authLogo.jpg') }}" alt="" width="70px" class="mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <input type="email" class="form-control mb-3" placeholder="Email" name="email" required>
        <input type="text" class="form-control mb-3" placeholder="Логин" name="login" required>
        <input type="password" class="form-control" placeholder="Пароль" name="password" required>
        <input type="password" class="form-control" placeholder="Подтвердите пароль" name="password_confirmation" required>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Зарегистрироваться</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
    </form>
@endsection
