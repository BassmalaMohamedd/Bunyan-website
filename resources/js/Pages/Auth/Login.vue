<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: { type: Boolean },
    status: { type: String },
});

const form = useForm({ email: '', password: '', remember: false });
const submit = () => form.post(route('login'), { onFinish: () => form.reset('password') });
</script>

<template>
    <GuestLayout>
        <Head title="Login" />

        <h1 class="text-2xl font-bold text-white mb-1 tracking-tight">Login</h1>
        <p class="text-white/40 text-sm mb-6">Access your Arkan account</p>

        <div v-if="status" class="mb-4 text-sm text-green-400 bg-green-500/10 border border-green-500/20 rounded-lg p-3">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-5">
            <!-- Email -->
            <div>
                <label class="block text-xs font-semibold text-white/50 uppercase tracking-wider mb-2">Email</label>
                <input
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    autofocus
                    placeholder="your@email.com"
                    class="w-full bg-white/5 border border-white/10 text-white rounded-xl py-3 px-4 text-sm placeholder-white/20 focus:outline-none focus:border-[#cba365]/60 transition-all"
                    style="color: #fff;"
                />
                <InputError :message="form.errors.email" class="mt-1 text-xs text-red-400" />
            </div>

            <!-- Password -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <label class="text-xs font-semibold text-white/50 uppercase tracking-wider">Password</label>
                    <a v-if="canResetPassword" :href="route('password.request')" class="text-xs text-[#cba365] hover:underline no-underline">
                        Forgot password?
                    </a>
                </div>
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

            <!-- Remember -->
            <div class="flex items-center gap-2">
                <Checkbox name="remember" v-model:checked="form.remember" />
                <span class="text-xs text-white/40">Remember me</span>
            </div>

            <!-- Submit -->
            <button
                type="submit"
                :disabled="form.processing"
                class="w-full font-bold py-3 rounded-xl text-sm uppercase tracking-widest transition-all disabled:opacity-50 mt-2"
                style="background: #cba365; color: #0a192f;"
            >
                {{ form.processing ? 'Logging in...' : 'Login' }}
            </button>

            <p class="text-center text-xs text-white/30 pt-2">
                Don't have an account?
                <Link :href="route('register')" class="no-underline ml-1" style="color: #cba365;">Create Account</Link>
            </p>
        </form>
    </GuestLayout>
</template>
