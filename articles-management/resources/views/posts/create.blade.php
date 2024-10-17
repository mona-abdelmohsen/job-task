@extends("layouts.app")

@section("title")
Create post
@endsection

@section("main")
@if(session('success'))
    <div class="alert alert-success">{{ session("success") }}</div>
@endif
<form action="{{route("posts.store")}}" method="post">
    @csrf
    <fieldset>
        <legend> Create New Post</legend>
        <div class="mb-3">
            <label for="TextInput" class="form-label"> Title</label>
            <input type="text" id="TextInput" class="form-control" placeholder="Put your post title" name="title"
                value="{{old('title')}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="floatingTextarea2">Content </label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a content here" id="floatingTextarea2"
                    style="height: 100px" name="content">{{old('content')}}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Create">

    </fieldset>
</form>
@endsection