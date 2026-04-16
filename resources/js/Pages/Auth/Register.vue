<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
});

const submit = () => form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
});
</script>

<template>
    <GuestLayout>
        <Head title="Create Account" />

        <h1 class="text-2xl font-bold text-white mb-1 tracking-tight">Create Account</h1>
        <p class="text-white/40 text-sm mb-6">Join the Arkan ecosystem</p>

        <form @submit.prevent="submit" class="space-y-4">
            <!-- First Name + Last Name -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-white/50 uppercase tracking-wider mb-2">First Name</label>
                    <input
                        id="first_name"
                        type="text"
                        v-model="form.first_name"
                        required
                        autofocus
                        placeholder="John"
                        class="w-full bg-white/5 border border-white/10 text-white rounded-xl py-3 px-4 text-sm placeholder-white/20 focus:outline-none focus:border-[#cba365]/60 transition-all"
                        style="color: #fff;"
                    />
                    <InputError :message="form.errors.first_name" class="mt-1 text-xs text-red-400" />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-white/50 uppercase tracking-wider mb-2">Last Name</label>
                    <input
                        id="last_name"
                        type="text"
                        v-model="form.last_name"
                        required
                        placeholder="Smith"
                        class="w-full bg-white/5 border border-white/10 text-white rounded-xl py-3 px-4 text-sm placeholder-white/20 focus:outline-none focus:border-[#cba365]/60 transition-all"
                        style="color: #fff;"
                    />
                    <InputError :message="form.errors.last_name" class="mt-1 text-xs text-red-400" />
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-xs font-semibold text-white/50 uppercase tracking-wider mb-2">Email</label>
                <input
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    placeholder="your@email.com"
                    class="w-full bg-white/5 border border-white/10 text-white rounded-xl py-3 px-4 text-sm placeholder-white/20 focus:outline-none focus:border-[#cba365]/60 transition-all"
                    style="color: #fff;"
                />
                <InputError :message="form.errors.email" class="mt-1 text-xs text-red-400" />
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-xs font-semibold text-white/50 uppercase tracking-wider mb-2">Phone</label>
                <input
                    id="phone"
                    type="tel"
                    v-model="form.phone"
                    placeholder="+966 5X XXX XXXX"
                    class="w-full bg-white/5 border border-white/10 text-white rounded-xl py-3 px-4 text-sm placeholder-white/20 focus:outline-none focus:border-[#cba365]/60 transition-all"
                    style="color: #fff;"
                />
                <InputError :message="form.errors.phone" class="mt-1 text-xs text-red-400" />
            </div>

            <!-- Password + Confirm -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-white/50 uppercase tracking-wider mb-2">Password</label>
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        placeholder="••••••••"
                        class="w-full bg-white/5 border border-white/10 text-white rounded-xl py-3 px-4 text-sm placeholder-white/20 focus:outline-none focus:border-[#cba365]/60 transition-all"
                        style="color: #fff;"
                    />
                    <InputError :message="form.errors.password" class="mt-1 text-xs text-red-400" />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-white/50 uppercase tracking-wider mb-2">Confirm</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                        required
                        placeholder="••••••••"
                        class="w-full bg-white/5 border border-white/10 text-white rounded-xl py-3 px-4 text-sm placeholder-white/20 focus:outline-none focus:border-[#cba365]/60 transition-all"
                        style="color: #fff;"
                    />
                    <InputError :message="form.errors.password_confirmation" class="mt-1 text-xs text-red-400" />
                </div>
            </div>

            <!-- Submit -->
            <button
                type="submit"
                :disabled="form.processing"
                class="w-full font-bold py-3 rounded-xl text-sm uppercase tracking-widest transition-all disabled:opacity-50 mt-2"
                style="background: #cba365; color: #0a192f;"
            >
                {{ form.processing ? 'Creating account...' : 'Register' }}
            </button>

            <p class="text-center text-xs text-white/30 pt-2">
                Already have an account?
                <a :href="route('login')" class="no-underline ml-1" style="color: #cba365;">Login</a>
            </p>
        </form>
    </GuestLayout>
</template>
