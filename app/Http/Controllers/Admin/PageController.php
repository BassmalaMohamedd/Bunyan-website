<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Pages/Index', [
            'pages' => Page::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Pages/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:pages,slug',
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'content.en' => 'nullable|string',
            'content.ar' => 'nullable|string',
        ]);

        Page::create($validated);

        return Redirect::route('admin.pages.index')->with('success', 'Page created.');
    }

    public function edit(Page $page)
    {
        return Inertia::render('Admin/Pages/Edit', [
            'page' => $page,
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:pages,slug,' . $page->id,
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'content.en' => 'nullable|string',
            'content.ar' => 'nullable|string',
        ]);

        $page->update($validated);

        return Redirect::route('admin.pages.index')->with('success', 'Page updated.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return Redirect::route('admin.pages.index')->with('success', 'Page deleted.');
    }
}
