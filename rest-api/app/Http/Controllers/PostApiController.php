<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        return PostModel::all();
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        return PostModel::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    }

    public function update(PostModel $post)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        return $post->update([
            'title' => request('title'),
            'content' => request('content')
        ]);
    }

    public function destroy(PostModel $post)
    {
        return $post->delete();
    }
}
