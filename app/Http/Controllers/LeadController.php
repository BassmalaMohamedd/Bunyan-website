<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LeadController extends Controller
{
    /**
     * Store a newly created lead in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:50',
            'message' => 'nullable|string',
            'service_id' => 'nullable|exists:services,id',
        ]);

        Lead::create($validated);

        return Redirect::back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
