<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NewsPostController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/News/Index', [
            'posts' => NewsPost::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/News/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:news_posts,slug',
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'content.en' => 'required|string',
            'content.ar' => 'required|string',
            'image' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        NewsPost::create($validated);

        return Redirect::route('admin.news.index')->with('success', 'Post created.');
    }

    public function edit(NewsPost $news)
    {
        return Inertia::render('Admin/News/Edit', [
            'post' => $news,
        ]);
    }

    public function update(Request $request, NewsPost $news)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:news_posts,slug,'.$news->id,
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'content.en' => 'required|string',
            'content.ar' => 'required|string',
            'image' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $news->update($validated);

        return Redirect::route('admin.news.index')->with('success', 'Post updated.');
    }

    public function destroy(NewsPost $news)
    {
        $news->delete();

        return Redirect::route('admin.news.index')->with('success', 'Post deleted.');
    }
}
