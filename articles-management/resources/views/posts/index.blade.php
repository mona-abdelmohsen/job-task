@extends('layouts.app')
@section('title')
    Posts
@endsection

@section('main')
    @if(session('success'))
        <div class="alert alert-success">{{ session("success") }}</div>
    @endif
<a href="{{route('posts.create')}}" class='btn btn-success'> Create Post </a>

<table class='table'>
                <tr> <th>ID</th> 
                <th>Title</th> 
                <th>Content</th> 
                <th>Created At</th>
                <th> Actions </th>
        </tr>  
 
              @foreach($posts as $post)
                <tr> 
                        <td>{{$post['id']}}</td>
                        <td>{{$post['title']}}</td>
                        <td>{{$post['content']}}</td>
                        <td>{{ $post->created_at }}</td>
 
                        <td><a href="{{route('posts.show', $post)}}" class='btn btn-info'> show </a> 
                        <a href="{{route('posts.edit', $post)}}" class='btn btn-primary'> Edit </a></td>
                        <td>
                        <form action="{{route('posts.destroy', $post)}}"  method="post">
                            @csrf
                            @method('delete') 

                            <input type="button" class="btn btn-danger" value="Delete" data-bs-toggle="modal" 
                            data-bs-target="#exampleModal/{{$post['id']}}">
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal/{{$post['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Are you sure to delete {{$post['title']}} ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                                </div>
                            </div>
                            </div>
                        </form>

                    </td>

                </tr>
 
              @endforeach

</table>
{{ $posts->links() }}
@endsection
