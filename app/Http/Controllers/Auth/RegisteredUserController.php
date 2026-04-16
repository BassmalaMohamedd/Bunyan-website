<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'phone'      => 'nullable|string|max:20',
            'password'   => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'       => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'is_admin'   => false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        $request->session()->save();

        if ($user->is_admin) {
            return redirect(route('admin.dashboard', absolute: false));
        }

        return Inertia::location('/');
    }
}
