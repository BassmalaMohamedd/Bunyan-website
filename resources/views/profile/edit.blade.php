@extends('layouts.public')

@section('title', 'Identity Management | Bunyan')

@section('content')
<div class="min-h-screen bg-[#0c0a09] py-20 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="mb-12">
            <h1 class="text-4xl font-black text-white tracking-tight uppercase mb-3">Identity Management</h1>
            <p class="text-white/40 text-sm font-medium italic">Synchronize your personal identification and secure keys with the Bunyan ecosystem.</p>
        </div>

        <div class="space-y-12">
            <!-- Update Profile Information -->
            @include('profile.partials.update-profile-information-form')

            <!-- Update Password -->
            @include('profile.partials.update-password-form')

            <!-- Delete User -->
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
