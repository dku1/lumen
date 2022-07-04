@extends('personal.layouts.master')

@section('title', 'Lumen | Личный кабинет')

@section('content')
<div class="row">
    <h4 class="mb-3">Избранное</h4>
    <div class="col-12">
        @foreach($posts as $post)
            <div class="col-4 mb-3">
                <div class="card bg-dark text-white">
                    <img src="{{ asset('storage/' . $post->preview_image) }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <a href="{{ route('posts.show', $post) }}" class="text-decoration-none"><h5 class="text-white card-title">{{ $post->title }}</h5></a>
                        <p class="card-text">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

