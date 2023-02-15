<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\Blogpost;

class BlogpostsController extends Controller
{
    public function list(Blogpost $model): \Illuminate\View\View
    {
        $posts = $model->select('id', 'title', 'short_text', 'created_at')
            ->latest()
            ->limit(50)
            ->get();
        return View::make('list')->with('posts', $posts);
    }

    public function detail(int $postId, Blogpost $model): \Illuminate\View\View
    {
        $post = $model->select('title', 'text', 'created_at')
            ->where('id', $postId)
            ->firstOrFail($postId);
        return View::make('detail', $post);
    }
}
