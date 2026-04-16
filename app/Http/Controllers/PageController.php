<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the specified dynamic page.
     */
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            // Fallback for special pages like 'about' if not in DB
            if (view()->exists("$slug.index")) {
                return view("$slug.index");
            }
            abort(404);
        }

        return view('pages.show', [
            'page' => $page,
        ]);
    }
}
