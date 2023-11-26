<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'currentCategory' => PostCategory::firstWhere('slug', request('category')),
        ];
    }

    protected function validatePost(?Post $post)
    {
        $post ??= new Post();

        return request()->validate([
            'title' => $post->exists ? ['nullable', 'string'] : ['required', 'string'],
        ]);
    }
}
