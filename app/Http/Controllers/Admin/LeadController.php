<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LeadController extends Controller
{
    public function index()
    {
        return view('admin.leads.index', [
            'leads' => Lead::with('service')->latest()->get(),
        ]);
    }

    public function show(Lead $lead)
    {
        return view('admin.leads.show', [
            'lead' => $lead->load('service'),
        ]);
    }

    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:new,in_progress,completed,cancelled',
        ]);

        $lead->update($validated);

        return Redirect::back()->with('success', 'Lead status updated.');
    }
}
