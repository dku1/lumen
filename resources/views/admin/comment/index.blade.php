@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Комментарии')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
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
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title ml-1">{{ $comments->count() }} комментариев</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Пост</th>
                                    <th>Комментарий</th>
                                    <th>Пользователь</th>
                                    <th>Время</th>
                                    <th>Дата</th>
                                    <th>Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $comment->id }}</td>
                                        <td class="text-left"><a href="{{ route('admin.posts.show', $comment->post) }}" class="text-dark">{{ $comment->post->title }}</a></td>
                                        <td class="text-left">{{ $comment->message }}</td>
                                        <td>{{ $comment->user->login }}</td>
                                        <td>{{ $comment->created_at->translatedFormat('H:i') }}</td>
                                        <td>{{ $comment->created_at->translatedFormat('F d, Y') }}</td>
                                        <td class="pt-1">
                                            <form action="{{ route('admin.comments.delete', $comment) }}"
                                                  method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class=" border-0 bg-transparent text-danger">
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
                        {{ $comments->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

