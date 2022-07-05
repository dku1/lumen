@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-12 text-center mt-5">
            <img src="{{ asset('storage/' . $post->main_image) }}" alt="Изображение недоступно" style="max-width: 100%">
        </div>
        <div class="col-12 text-center mt-5">
            <h4>{{ $post->title }}</h4>
        </div>
        <div class="col-12 d-flex justify-content-between m-auto">
            <div class="mt-5">
                <a href="{{ route('posts.category', $post->category) }}" class="text-dark">{{ $post->category->title }}</a>
            </div>
            <div class="col-1 mt-5 mb-3 d-flex justify-content-end">
                <span style="margin-right: 15px">
                  {{ $post->likes->count() }}
                </span>
                <a href="{{ route('liked', $post) }}"
                   @if(auth()->check() and $post->likes->contains(auth()->user()))
                   class="text-danger"
                   @else
                   class="text-dark"
                   @endif
                   @if(!auth()->check())
                   style="pointer-events: none; margin-right: 20px"
                    @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </a>
                <span>
                  {{ $post->comments->count() }}
                </span>
                <a href="" class="text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-chat-dots ml-3" viewBox="0 0 16 16">
                        <path
                            d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        <path
                            d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                    </svg>
                </a>
            </div>
        </div>
        <hr>
        <div class="col-12 d-flex justify-content-between">
            <span>
                {{ $post->created_at->translatedFormat('F d, Y') }}
            </span>
            <span>
                {{ $post->created_at->translatedFormat('H:i') }}
            </span>
        </div>
        <div class="col-12 mt-5 mb-4">
            {!! $post->content !!}
        </div>
        @if($post->tags->count() !== 0)
            <select class="select2" multiple="multiple" name="tag_ids[]"
                    style="width: 100%;" data-select2-id="23" tabindex="-1"
                    aria-hidden="true">
                @foreach($post->tags as $tag)
                    <option value="{{ $tag->id }}" selected>
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
        @endif
    </div>

    @if($relatedPosts->count() != 0)
        <div class="col-12">
            <h4 class="text-center mt-3">Схожие посты</h4>
            <div class="relations-posts d-flex justify-content-between mt-5">
                @foreach($relatedPosts as $post)
                    <div class="col-4 mb-3">
                        <div class="card bg-dark text-white">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" class="card-img" alt="..." style="height: 200px">
                            <div class="card-img-overlay">
                                <a href="{{ route('posts.show', $post) }}" class="text-decoration-none"><h5 class="text-white card-title">{{ $post->title }}</h5></a>
                                <p class="card-text">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <section class="comment mb-3">
        <div class="container">
            <div class="col-12">
                @auth()
                    <h4 class="text-center mt-5">Комментарии</h4>
                    <form action="{{ route('comments.store', $post) }}" method="post">
                        @csrf
                        <div class="mb-3 mt-5">
                            <div class="form-group">
                                <label class="form-label">Оставить комментарий</label>
                                <textarea class="form-control" rows="3" name="message"></textarea>
                            </div>
                            <div class="form-group text-right mt-2">
                                <button class="btn btn-primary text-right">Отправить</button>
                            </div>
                        </div>
                    </form>
                @endauth
            </div>
            @if($comments->count() != 0)
                <div class="card-footer card-comments mt-5 mb-5">
                    @foreach($comments as $comment)
                        <div class="card-comment mt-5">
                            <div class="comment-text">
                                <div class="username d-flex justify-content-between">
                                    {{ $comment->user->login }}
                                    @auth()
                                        @if($comment->user_id == auth()->user()->id)
                                            <div class="d-flex">
                                                <a href="{{ route('comments.edit', $comment) }}" class="text-warning"
                                                   style="margin-right: 20px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-pencil-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('comments.delete', $comment) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="border-0 bg-transparent text-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                                <span class="text-muted float-right">{{ $comment->created_at->diffForHumans() }}</span>
                                <p class="mt-3"> {{ $comment->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
