@extends("layouts.app")

@section("title")
Edit post 
@endsection

@section("main")

<form action="{{route('posts.update', $post)}}" method="post">
    @csrf
    @method('PUT')
    <fieldset>
        <legend> Edit Post</legend>
        <div class="mb-3">
            <label for="TextInput" class="form-label"> Title</label>
            <input type="text" id="TextInput" class="form-control" value="{{$post->title}}" name="title">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingTextarea2">Content </label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px" name="description">{{$post->content}}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> 
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
    </fieldset>
</form>
@endsection