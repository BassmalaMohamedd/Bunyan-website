<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function edit()
    {
        $settings = Setting::where('key', 'like', 'home_%')->pluck('value', 'key')->toArray();
        
        return view('admin.home.edit', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'home_hero_title' => 'nullable|string',
            'home_hero_subtitle' => 'nullable|string',
            'home_hero_title_ar' => 'nullable|string',
            'home_hero_subtitle_ar' => 'nullable|string',
            'home_stats_listings' => 'nullable|string',
            'home_stats_market_time' => 'nullable|string',
            'home_stats_trust' => 'nullable|string',
            'home_stats_partners' => 'nullable|string',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return Redirect::route('admin.home.edit')->with('success', 'Home page updated successfully.');
    }
}
