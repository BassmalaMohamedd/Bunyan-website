<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        return view('services.index', [
            'services' => Service::where('is_active', true)->get(),
        ]);
    }

    /**
     * Display the specified service.
     */
    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('services.show', [
            'service' => $service,
        ]);
    }
}
