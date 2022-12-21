php artisan serve
cd ta20v/blog/

xkcd.com?

@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{route('posts.update', ['post' => $post])}}" method="POST">
@method('PUT')
@csrf
<div class="mb-3">
                <label for="body" class="form-label">Content</label>
                <textarea
                    class="form-control @error('body') is-invalid @enderror"
                    id="body"
                    rows="12"
                    name="body">{{old('body') ?? $post->body}}</textarea>
                @error('body')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Comment">
            </div>
        </form>
    </div>
@endsection
