<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PostModel;

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


Route::get('/posts', function() {
    return PostModel::all();
});

Route::post('/posts', function() {
    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    return PostModel::create([
        'title' => request('title'),
        'content' => request('content'),
    ]);
});


Route::put('/posts/{post}', function(PostModel $post) {

    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    return $post->update([
        'title' => request('title'),
        'content' => request('content')
    ]);
});


Route::delete('/posts/{post}', function(PostModel $post) {
    return $post->delete();
});