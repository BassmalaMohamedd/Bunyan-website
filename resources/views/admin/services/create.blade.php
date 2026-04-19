@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-12">
        <a href="{{ route('admin.services.index') }}" class="text-gray-400 hover:text-[#f59e0b] transition-colors flex items-center gap-2 mb-6 font-bold uppercase text-xs tracking-widest no-underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Ecosystem
        </a>
        <h1 class="text-4xl font-black text-white tracking-tight">Architect New Service</h1>
        <p class="text-gray-400 mt-2 font-medium">Add a new modular offering to the specialized portfolio.</p>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-8">
        @csrf
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-10">
            <div class="grid grid-cols-1 gap-10 text-[#1c1917]">
                <!-- URL Pointer & Icon -->
                <div class="grid grid-cols-2 gap-10">
                    <div>
                        <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Service Pointer (Slug)</label>
                        <input name="slug" type="text" placeholder="property-valuation" value="{{ old('slug') }}" required
                            class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all" />
                        @error('slug') <p class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Visual Icon Class</label>
                        <input name="icon" type="text" placeholder="home-valuation-icon" value="{{ old('icon') }}"
                            class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all" />
                        @error('icon') <p class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-10 border-t border-gray-50 pt-10">
                    <!-- English Specification -->
                    <div class="space-y-6 text-left">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-[#1c1917] text-white flex items-center justify-center text-[10px] font-black uppercase">EN</span>
                            <h3 class="text-sm font-black text-[#1c1917] uppercase tracking-widest">Global Specification</h3>
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Service Identity</label>
                            <input name="title[en]" type="text" placeholder="Specialized Valuation" value="{{ old('title.en') }}" required
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all text-left" />
                            @error('title.en') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Service description</label>
                            <textarea name="description[en]" rows="8" placeholder="Outline the specialized value proposition..."
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-medium transition-all resize-none text-left">{{ old('description.en') }}</textarea>
                            @error('description.en') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Arabic Specification -->
                    <div class="space-y-6 text-right" dir="rtl">
                        <div class="flex items-center gap-3 flex-row-reverse">
                            <span class="w-8 h-8 rounded-lg bg-[#f59e0b] text-white flex items-center justify-center text-[10px] font-black uppercase">AR</span>
                            <h3 class="text-sm font-black text-[#1c1917] uppercase tracking-widest">Arabic Specification</h3>
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">هوية الخدمة</label>
                            <input name="title[ar]" type="text" placeholder="تقييم عقاري تخصصي" value="{{ old('title.ar') }}" required
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all text-right" />
                            @error('title.ar') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">وصف الخدمة</label>
                            <textarea name="description[ar]" rows="8" placeholder="وصف القيمة المضافة..."
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-medium transition-all resize-none text-right">{{ old('description.ar') }}</textarea>
                            @error('description.ar') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-50 pt-8 flex items-center justify-between" x-data="{ active: true }">
                    <div class="flex flex-col text-left">
                        <span class="text-sm font-black text-[#1c1917] uppercase tracking-widest">Public Deployment</span>
                        <span class="text-xs text-gray-400 font-medium">Activate this service for public visibility.</span>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" x-model="active">
                        <div class="w-14 h-8 bg-gray-100 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#f59e0b]"></div>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-6">
            <a href="{{ route('admin.services.index') }}" class="px-8 py-4 text-gray-400 hover:text-white font-bold uppercase text-xs tracking-widest transition-colors no-underline">Cancel</a>
            <button type="submit"
                class="bg-[#1c1917] border border-white/10 hover:bg-black text-white px-12 py-4 rounded-2xl font-black transition-all shadow-xl shadow-black/20 flex items-center gap-4 active:scale-95">
                <span>Authorize Service Activation</span>
                <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
    </form>
</div>
@endsection
