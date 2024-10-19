@extends("layouts.app")
@section("title")
view a post
@endsection

@section("main")
<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <h5 class="card-title bold">Tiltle : {{$post->title}}</h5>
        <h5 class="card-title">Content : </h5>
        <p class="card-text">{{$post->content}}</p>
        </h5>
        <p>
        <h5>Created At :</h5>{{$post->created_at}}</p>

        <a href="{{route('posts.index')}}" class='btn btn-info'> All Posts </a>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#post_comments"
            aria-expanded="false" aria-controls="post_comments">
            Show Comments
        </button>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#add_comment"
            aria-expanded="false" aria-controls="add_comment">
            Add Comment
        </button>
    </div>

    <div class="card shadow mb-3" id="add_comment">
        <div class="card-body">
            <h4 class="mb-3">Add a comment</h4>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" name="content" class="form-control" placeholder="Enter your comment"
                        aria-label="Comment" value="{{old('content')}}" />
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />

                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
        <div class="card shadow" id="post_comments">
            <div class="card-body">
                <h4>Comments</h4>
                @foreach($post->comments as $comment)
                    <div class="mb-4 ps-3 pe-3 pt-2 comment-background border rounded">
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    
    @endsection