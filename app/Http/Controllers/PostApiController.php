<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{

    public function index()
    {
        return Post::latest()->get();
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);


        $post =  Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);


        if (request()->expectsJson()) {
            return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
        }

        return redirect()->route('/posts');
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $success = $post->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Post $post)
    {
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }
}
