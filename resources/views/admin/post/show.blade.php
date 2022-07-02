@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Посты')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-3">{{ $post->title }}</h1>
                    <a href="{{ route('admin.posts.edit', $post) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="currentColor" class="bi bi-pencil text-success" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>
                    <form action="{{ route('admin.posts.destroy', $post) }}"
                          method="post" class="ml-3">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="border-0 bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                 fill="currentColor" class="bi bi-x-lg text-danger"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                <tr>
                                    <td>Название</td>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <td>Категория</td>
                                    <td><a href="{{ route('admin.categories.show', $post->category) }}" class="text-dark">{{ $post->category->title }}</a></td>
                                </tr>
                                <tr>
                                    <td>Опубликован</td>
                                    <td>{{ $post->created_at->translatedFormat('F d, Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Комментариев</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Лайков</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Тэги</td>
                                    <td>
                                        <select class="select2" multiple="multiple" name="tag_ids[]"
                                                style="width: 100%;" data-select2-id="23" tabindex="-1"
                                                aria-hidden="true" disabled>
                                            @foreach($post->tags as $tag)
                                                <option value="{{ $tag->id }}" selected>
                                                    {{ $tag->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h4 class="text-center">Превью</h4>
                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Превью"
                         class="w-100 mt-2" style="height: 350px">
                    <h4 class="text-center mt-3">Главное изображение</h4>
                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="Превью"
                         class="w-100 mt-2 mb-3" style="height: 350px">
                </div>
                <div class="col-7">
                    {!! $post->content  !!}
                </div>
            </div>
        </div>
    </section>
@endsection

