<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/posts', function () {
    return Post::all();
});

Route::post('/posts', function () {
    // $title = $request->input('title');
    // $content = $request->input('content');

    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);


    $post =  Post::create([
        'title' => request('title'), //$title,
        'content' => request('content'), //$content,
    ]);


    if (request()->expectsJson()) {
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }

    return redirect()->route('/tasks');
});
