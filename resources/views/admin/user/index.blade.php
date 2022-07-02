@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Тэги')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success">Создать нового пользователя</a>
                </div>
                <div class="col-8 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title ml-1">{{ $users->count() }} пользователей</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Логин</th>
                                    <th>Email</th>
                                    <th>Статус</th>
                                    <th>Лайков</th>
                                    <th>Комментариев</th>
                                    <th>Зарегистрирован</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->login }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->isAdmin() ? 'Администратор' : 'Читатель' }}</td>
                                        <td>0</td>
                                        <td>{{ $user->comments->count() }}</td>
                                        <td>{{ $user->created_at->translatedFormat('F d, Y') }}</td>
                                        <td class="pt-1">
                                            <form action="{{ route('admin.users.destroy', $user) }}"
                                                  method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                   class="btn text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-pencil-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </a>
                                                <button class="btn border-0 bg-transparent text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center paginate">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

