@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Посты')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    @isset($post)
                        <h1 class="m-0">Редактирование поста {{ $post->title }}</h1>
                    @else
                        <h1 class="m-0">Создание поста</h1>
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
                    @isset($post)
                    {{ route('admin.posts.update', $post) }}
                    @else
                    {{ route('admin.posts.store') }}
                    @endisset
                        " method="post" enctype="multipart/form-data">
                        @isset($post)
                            @method('PATCH')
                        @endisset
                        @csrf
                        <div class="card-body p-0">
                            <div class="form-group">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Название</label>
                                <input class="form-control" type="text" name="title"
                                       placeholder="Введите название поста" value="{{ $post->title ?? old('title') }}">
                            </div>
                            <div class="form-group">
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Категория</label>
                                <select class="form-control select2bs4 select2-accessible" name="category_id"
                                        style="width: 100%;"
                                        data-select2-id="17" tabindex="-1" aria-hidden="true">
                                    @include('admin.layouts.sub-layouts.category-options')
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <textarea id="summernote" name="content">
                                        {{ $post->content ?? old('content') }}
                                </textarea>
                            </div>
                            <div class="row" style="width: 915px">
                                <div class="col-6 d-flex">
                                    <div class="form-group">
                                        @error('preview_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleInputFile">Превью</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="preview_image">
                                                <label class="custom-file-label">Выберите изображение</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузка</span>
                                            </div>
                                        </div>
                                        @isset($post)
                                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Превью"
                                                 class="w-100 mt-3" style="height: 250px">
                                        @endisset
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        @error('main_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleInputFile">Главное изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="main_image">
                                                <label class="custom-file-label">Выберите изображение</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузка</span>
                                            </div>
                                        </div>
                                        @isset($post)
                                            <img src="{{ asset('storage/' . $post->main_image) }}"
                                                 alt="Главное изображение"
                                                 class="w-100 mt-3" style="height: 250px">
                                        @endisset
                                    </div>
                                </div>
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


