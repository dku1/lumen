@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Пользователи')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    @isset($user)
                        <h1 class="m-0">Редактирование пользователя {{ $user->email }}</h1>
                    @else
                        <h1 class="m-0">Создание пользователя</h1>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-3">
                    <form action="
                    @isset($user)
                    {{ route('admin.users.update', $user) }}
                    @else
                    {{ route('admin.users.store') }}
                    @endisset
                        " method="post">
                        @isset($user)
                            @method('PATCH')
                        @endisset
                        @csrf
                        <div class="card-body p-0">
                            <div class="form-group">
                                @error('login')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Логин</label>
                                <input class="form-control" type="text" name="login"
                                       placeholder="Введите логин" value="{{ $user->login ?? old('login') }}">
                            </div>
                            <div class="form-group">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Логин</label>
                                <input class="form-control" type="email" name="email"
                                       placeholder="Введите email" value="{{ $user->email ?? old('email') }}">
                            </div>
                            <div class="form-group">
                                @error('admin')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Статус</label>
                                <select name="admin" class="form-control select2bs4 select2-accessible">
                                    @foreach(['Читатель', 'Администратор'] as $v => $role)
                                    <option value="{{ $v }}" @if(isset($user) and $user->admin == $v) selected @endif>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-left mb-2">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection


