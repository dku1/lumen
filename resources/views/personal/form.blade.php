@extends('personal.layouts.master')

@section('title', 'Lumen | Личный кабинет')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Редактирование</h4>
        </div>
        <div class="col-3">
            <form action="{{ route('personal.update', $user) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="card-body p-0">
                    <div class="form-group">
                        @error('login')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label>Логин</label>
                        <input class="form-control" type="text" name="login"
                               placeholder="Введите логин" value="{{ $user->login }}">
                    </div>
                    <div class="form-group mt-3">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label>Email</label>
                        <input class="form-control" type="email" name="email"
                               placeholder="Введите email" value="{{ $user->email }}">
                    </div>
                    <div class="text-left mb-2 mt-3">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
@endsection



