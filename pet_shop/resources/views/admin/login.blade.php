@extends('app')

@section('header')
{{-- 後台登入頁通常不顯示主導覽列，保持簡潔 --}}
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center bg-stone-100 px-4">
    <div class="max-w-md w-full">
        <!-- Logo 與標題 -->
        <div class="text-center mb-10">
            <div class="text-3xl font-bold text-orange-400 mb-2">BaanPets</div>
            <h2 class="text-xl font-semibold text-stone-700 uppercase tracking-widest">後台管理系統</h2>
            <p class="mt-2 text-stone-500 text-sm italic">後台專用，請輸入管理者資訊登入</p>
        </div>

        <!-- 登入卡片 -->
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-stone-200">
            <form action="#" method="POST" @submit.prevent="console.log('Login attempt...')">
                <!-- 帳號輸入 -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-stone-700 mb-2 tracking-wide">管理員帳號 (Email)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" required 
                               class="block w-full pl-10 pr-3 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition" 
                               placeholder="admin@baanpets.com">
                    </div>
                </div>

                <!-- 密碼輸入 -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-medium text-stone-700 tracking-wide">登入密碼</label>
                        <a href="#" class="text-xs text-stone-400 hover:text-orange-400 transition">忘記密碼？</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required 
                               class="block w-full pl-10 pr-3 py-3 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition" 
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- 記住我 -->
                <div class="flex items-center mb-8">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-orange-400 focus:ring-orange-400 border-stone-300 rounded cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-stone-500 cursor-pointer">保持登入狀態</label>
                </div>

                <!-- 登入按鈕 -->
                <button type="submit" 
                        class="w-full bg-stone-800 hover:bg-stone-700 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-md">
                    進入後台系統
                </button>
            </form>
        </div>

        <!-- 頁腳連結 -->
        <div class="text-center mt-8">
            <a href="/" class="text-stone-500 hover:text-orange-400 text-sm transition flex items-center justify-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                返回官網首頁
            </a>
        </div>
    </div>
</div>
@endsection

@section('footer')
{{-- 後台登入頁不顯示主頁尾 --}}
<div class="bg-stone-100 py-6 text-center text-stone-400 text-xs">
    © 2026 BaanPets Admin Panel. Internal Use Only.
</div>
@endsection