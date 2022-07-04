@extends('personal.layouts.master')

@section('title', 'Lumen | Личный кабинет')

@section('content')
<div class="row">
    <div class="col-12">
        <p>Email: {{ auth()->user()->email }}</p>
        <p>Логин: {{ auth()->user()->login }}</p>
        <p>Лайков: {{ auth()->user()->likes->count() }}</p>
        <p>Комментариев: {{ auth()->user()->comments->count() }}</p>
        <p>Дата регистрации: {{ auth()->user()->created_at->format('m-d, Y') }}</p>
        <p><a href="{{ route('personal.edit') }}" class="btn btn-dark">Редактировать</a></p>
    </div>
</div>
@endsection

