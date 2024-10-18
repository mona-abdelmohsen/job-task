@extends("layouts.app")
@section("title")
view a post
@endsection 
 
@section("main")
    <div class="card">
        <h5 class="card-header">Post Info</h5>
        <div class="card-body">
        <h5 class="card-title bold">Tiltle : {{$post->title}}</h5>
        <h5 class="card-title">Content : </h5><p class="card-text">{{$post->content}}</p></h5>
        <p>Created At :{{$post->created_at}}</p>
        <a href="{{route('posts.index')}}" class='btn btn-info'> All Posts </a>
    </div>
@endsection