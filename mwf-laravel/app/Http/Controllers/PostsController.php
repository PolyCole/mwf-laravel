<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return Post::orderBy('created_at', 'desc')->get();
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function store(Request $request)
    {
        return Post::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        $article->delete();

        return 204;
    }
}
