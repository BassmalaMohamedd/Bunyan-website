@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-12">
        <a href="{{ route('admin.news.index') }}" class="text-gray-400 hover:text-[#f59e0b] transition-colors flex items-center gap-2 mb-6 font-bold uppercase text-xs tracking-widest no-underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Insights
        </a>
        <h1 class="text-4xl font-black text-white tracking-tight">Publish Market Intel</h1>
        <p class="text-gray-400 mt-2 font-medium">Broadcast new specialized intelligence to the network.</p>
    </div>

    <form action="{{ route('admin.news.store') }}" method="POST" class="space-y-8">
        @csrf
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-10">
            <div class="grid grid-cols-1 gap-10 text-[#1c1917]">
                <!-- URL Pointer & Image -->
                <div class="grid grid-cols-2 gap-10">
                    <div>
                        <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Intel Pointer (Slug)</label>
                        <input name="slug" type="text" placeholder="riyadh-market-2026" value="{{ old('slug') }}" required
                            class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all" />
                        @error('slug') <p class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Publication Date</label>
                        <input name="published_at" type="date" value="{{ old('published_at', date('Y-m-d')) }}" required
                            class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all" />
                        @error('published_at') <p class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Feature Image Pointer (URL/Path)</label>
                    <input name="image" type="text" placeholder="/images/intel/market-analysis.jpg" value="{{ old('image') }}"
                        class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all" />
                    @error('image') <p class="text-red-500 text-xs mt-2 font-bold uppercase tracking-wider">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-10 border-t border-gray-50 pt-10">
                    <!-- English Content -->
                    <div class="space-y-6 text-left">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-[#1c1917] text-white flex items-center justify-center text-[10px] font-black uppercase">EN</span>
                            <h3 class="text-sm font-black text-[#1c1917] uppercase tracking-widest">Global Intelligence</h3>
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Intelligence Title</label>
                            <input name="title[en]" type="text" placeholder="Riyadh Commercial Outlook" value="{{ old('title.en') }}" required
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all text-left" />
                            @error('title.en') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Analysis Content</label>
                            <textarea name="content[en]" rows="12" placeholder="Detail the market analysis..." required
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-medium transition-all resize-none text-left">{{ old('content.en') }}</textarea>
                            @error('content.en') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="space-y-6 text-right" dir="rtl">
                        <div class="flex items-center gap-3 flex-row-reverse">
                            <span class="w-8 h-8 rounded-lg bg-[#f59e0b] text-white flex items-center justify-center text-[10px] font-black uppercase">AR</span>
                            <h3 class="text-sm font-black text-[#1c1917] uppercase tracking-widest">Arabic Intelligence</h3>
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">عنوان التقرير</label>
                            <input name="title[ar]" type="text" placeholder="آفاق السوق التجاري في الرياض" value="{{ old('title.ar') }}" required
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-bold transition-all text-right" />
                            @error('title.ar') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-3 text-right">محتوى التحليل</label>
                            <textarea name="content[ar]" rows="12" placeholder="تفاصيل تقرير السوق..." required
                                class="w-full bg-gray-50 border-transparent focus:bg-white focus:border-[#f59e0b] focus:ring-0 rounded-2xl py-4 px-6 text-[#1c1917] font-medium transition-all resize-none text-right">{{ old('content.ar') }}</textarea>
                            @error('content.ar') <p class="text-red-500 text-xs mt-2 font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-6">
            <a href="{{ route('admin.news.index') }}" class="px-8 py-4 text-gray-400 hover:text-white font-bold uppercase text-xs tracking-widest transition-colors no-underline">Cancel</a>
            <button type="submit"
                class="bg-[#1c1917] border border-white/10 hover:bg-black text-white px-12 py-4 rounded-2xl font-black transition-all shadow-xl shadow-black/20 flex items-center gap-4 active:scale-95">
                <span>Authorize Broadcast</span>
                <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
    </form>
</div>
@endsection
