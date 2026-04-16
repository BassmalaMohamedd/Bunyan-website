<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;

class NewsPostController extends Controller
{
    /**
     * Display a listing of the news posts.
     */
    public function index()
    {
        return view('news.index', [
            'posts' => NewsPost::latest()->get(),
        ]);
    }

    /**
     * Display the specified news post.
     */
    public function show(string $slug)
    {
        $post = NewsPost::where('slug', $slug)->firstOrFail();

        return view('news.show', [
            'post' => $post,
        ]);
    }
}
