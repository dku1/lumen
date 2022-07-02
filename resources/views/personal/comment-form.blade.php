@extends('personal.layouts.master')

@section('title', 'Lumen | Личный кабинет')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Комментарии</h4>
        </div>
        <div class="col-8 mt-3">
            <form action="{{ route('comments.update', $comment) }}" method="post">
                @method('patch')
                @csrf
                <div class="mb-3 ">
                    <div class="form-group">
                        <label class="form-label">Изменить комментарий</label>
                        <textarea class="form-control" rows="3" name="message">{{ $comment->message }}</textarea>
                    </div>
                    <div class="form-group text-right mt-2">
                        <button class="btn btn-primary text-right">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


