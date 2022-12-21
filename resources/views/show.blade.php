@extends('layouts.app')
@section('content')
    @include('partials.post-card')
    <h3 class="m-4">Comments</h3>
    @foreach($post->comments()->latest()->get() as $comment)
        <div class="card mt-2">
            <div class="card-body">
                <p class="card-text">{{$comment->body}}</p>
            </div>
            <div class="card-footer">
                {{$comment->user->name}}<br>
                {{$comment->created_at->diffForHumans()}}
            </div>
        </div>
    @endforeach
    <div class="container">
        <form action="{{route('post.comment', ['post' => $post])}}" method="POST">
            @csrf
            <div class="card mt-2">
                <label for="body" class="form-label">New Comment</label>
                <textarea
                    class="form-control @error('body') is-invalid @enderror"
                    id="body"
                    rows="12"
                    name="body"></textarea>
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
