@extends('admin.layouts.master')

@section('title', 'Lumen | Admin panel | Категории')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @isset($category)
                        <h1 class="m-0">Редактирование категории {{ $category->title }}</h1>
                    @else
                        <h1 class="m-0">Создание категории</h1>
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
                    @isset($category)
                    {{ route('admin.categories.update', $category) }}
                    @else
                    {{ route('admin.categories.store') }}
                    @endisset
                        " method="post">
                        @isset($category)
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
                                       placeholder="Введите название категории" value="{{ $category->title ?? old('title') }}">
                            </div>
                            <div class="form-group">
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Родительская категория</label>
                                <select class="form-control select2bs4 select2-accessible" name="parent_id"
                                        style="width: 100%;"
                                        data-select2-id="17" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="19" value="0">-- Главная категория --</option>
                                    @include('admin.layouts.sub-layouts.category-options')
                                </select>

                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection


