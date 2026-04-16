<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function edit()
    {
        $settings = Setting::where('key', 'like', 'home_%')->pluck('value', 'key');
        
        return Inertia::render('Admin/Home/Edit', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'home_hero_title' => 'required|string',
            'home_hero_subtitle' => 'required|string',
            'home_stats_years' => 'required|string',
            'home_stats_assets' => 'required|string',
            'home_stats_projects' => 'required|string',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return Redirect::route('admin.home.edit')->with('success', 'Home page updated successfully.');
    }
}
