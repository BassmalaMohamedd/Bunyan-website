<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Services/Index', [
            'services' => Service::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Services/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:services,slug',
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'icon' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        Service::create($validated);

        return Redirect::route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return Inertia::render('Admin/Services/Edit', [
            'service' => $service,
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:services,slug,'.$service->id,
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'icon' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $service->update($validated);

        return Redirect::route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return Redirect::route('admin.services.index')->with('success', 'Service deleted.');
    }
}
