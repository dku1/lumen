@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Посты')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Посты</h1>
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
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Создать</a>
                </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title ml-1">Количество: {{ $totalCount }}</h3>
                        </div>
                        <div class="card-body">
                            <x-table>
                                <x-slot name="thead">
                                    <x-table.tr>
                                        <x-table.th>#</x-table.th>
                                        <x-table.th>Название</x-table.th>
                                        <x-table.th>Категория</x-table.th>
                                        <x-table.th>Лайков</x-table.th>
                                        <x-table.th>Комментариев</x-table.th>
                                        <x-table.th>Опубликован</x-table.th>
                                        <x-table.th>Действия</x-table.th>
                                    </x-table.tr>
                                </x-slot>
                                @foreach($posts as $post)
                                    <x-table.tr>
                                        <x-table.td>{{ $post->id }}</x-table.td>
                                        <x-table.td class="text-left">
                                            <a href="{{ route('admin.posts.show', $post) }}"
                                                       class="text-dark">{{ $post->title }}</a>
                                        </x-table.td>
                                        <x-table.td>
                                            <a href="{{ route('admin.categories.show', $post->category) }}"
                                               class="text-dark">{{ $post->category->title }}</a>
                                        </x-table.td>
                                        <x-table.td>{{ $post->likes->count() }}</x-table.td>
                                        <x-table.td>{{ $post->comments->count() }}</x-table.td>
                                        <x-table.td>{{ $post->created_at->translatedFormat('F d, Y') }}</x-table.td>
                                        <x-table.td class="pt-1">
                                            <x-form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                                @method('DELETE')
                                                <a href="{{ route('admin.posts.show', $post) }}"
                                                   class="btn text-blue">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path
                                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.posts.edit', $post) }}"
                                                   class="btn text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-pencil-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </a>
                                                <x-form.button class="btn border-0 bg-transparent text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                    </svg>
                                                </x-form.button>
                                            </x-form>
                                        </x-table.td>
                                    </x-table.tr>
                                @endforeach
                            </x-table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center paginate">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

