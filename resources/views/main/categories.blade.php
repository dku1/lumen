@extends('layouts.master')

@section('title', 'Lumen | Категории')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3 class="pb-3 mb-3 fst-italic border-bottom">
                Категории
            </h3>
        </div>
        <nav class="nav nav-pills flex-column">
            @foreach($categories as $category)
                <a class="nav-link" href="{{ route('posts.category', $category) }}">{{ $delimiter . $category->title }}</a>
                @if($category->children->count() !== 0)
                    @include('layouts.sub-layouts.nav', ['children' => $category->children, 'delimiter' => '-'])
                @endif
            @endforeach
        </nav>
    </div>
@endsection
