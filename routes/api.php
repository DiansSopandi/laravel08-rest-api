<?php

use App\Http\Controllers\PostApiController;
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

// this GET API method below directly use eloquent query
// Route::get('/posts', function () {
//     return Post::latest()->get();
// });

// this GET API method use controller
Route::get('/posts', [PostApiController::class, 'index']);

//this POST API method use controller
Route::post('/posts', [PostApiController::class, 'store']);

// this POST API method use closure function
// Route::post('/posts', function () {

// request()->validate([
//     'title' => 'required',
//     'content' => 'required',
// ]);


// $post =  Post::create([
//     'title' => request('title'), //$title,
//     'content' => request('content'), //$content,
// ]);


// if (request()->expectsJson()) {
//     return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
// }

// return redirect()->route('/tasks');
// });

// this PUT API method use controller
Route::put('/posts/{post}', [PostApiController::class, 'update']);

// this PUT API method use closure function
// Route::put('/posts/{id}', function ($id) {
// Route::put('/posts/{post}', function (Post $post) {

//     // $post = Post::findOrFail($post);

//     request()->validate([
//         'title' => 'required',
//         'content' => 'required',
//     ]);

//     $success = $post->update([
//         'title' => request('title'),
//         'content' => request('content'),
//     ]);
//     return [
//         'success' => $success
//     ];
// });

// this DELETE API method use controller
Route::delete('/posts/{post}', [PostApiController::class, 'destroy']);

// this DELETE API method use closure function
// Route::delete('/posts/{post}', function (Post $post) {
//     $success = $post->delete();

//     return [
//         'success' => $success
//     ];
// });
