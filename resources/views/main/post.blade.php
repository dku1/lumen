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
                    {{ $post->category->title }}
            </div>
            <div class="col-1 mt-5 mb-3 d-flex justify-content-end">
                <a href="" class="text-danger" style="margin-right: 40px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </a>
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
        <div class="col-12 mt-5">
            {!! $post->content !!}
        </div>
        <select class="select2" multiple="multiple" name="tag_ids[]"
                style="width: 100%;" data-select2-id="23" tabindex="-1"
                aria-hidden="true">
            @foreach($post->tags as $tag)
                <option value="{{ $tag->id }}" selected>
                    {{ $tag->title }}
                </option>
            @endforeach
        </select>
    </div>
@endsection
