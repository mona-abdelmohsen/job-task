<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('comments')->paginate(5); 
        // $count_comments = $posts->comments->count();
        foreach ($posts as $post) {
            $post->count_comments = $post->comments->count();
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = request()->all();
        $post = Post::create($data);
        return to_route('posts.show', $post)->with('success', 'post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $posts = $post->with('comments');
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = request()->all();
        $post->update($data);
        return to_route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index')->with('success', 'Post deleted successfully');
    }
}
