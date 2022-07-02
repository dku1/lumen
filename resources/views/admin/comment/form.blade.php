@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Тэги')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    @isset($tag)
                        <h1 class="m-0">Редактирование тэга {{ $tag->title }}</h1>
                    @else
                        <h1 class="m-0">Создание тэга</h1>
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
                    @isset($tag)
                    {{ route('admin.tags.update', $tag) }}
                    @else
                    {{ route('admin.tags.store') }}
                    @endisset
                        " method="post">
                        @isset($tag)
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
                                       placeholder="Введите название тэга" value="{{ $tag->title ?? old('title') }}">
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


