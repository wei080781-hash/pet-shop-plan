@extends('admin.layout')

@section('admin_content')
<div class="space-y-8">
    <!-- 頁面標題 -->
    <div>
        <h1 class="text-2xl font-bold text-stone-800">營運概況</h1>
        <p class="text-stone-500 mt-1">歡迎回來，這是您今天的寵物店營運摘要。</p>
    </div>

    <!-- 統計卡片 -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- 卡片 1 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex items-center">
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-500 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-stone-500 text-sm">今日銷售額</p>
                <h3 class="text-xl font-bold text-stone-800">NT$ 12,840</h3>
            </div>
        </div>

        <!-- 卡片 2 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-500 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <div>
                <p class="text-stone-500 text-sm">待處理訂單</p>
                <h3 class="text-xl font-bold text-stone-800">8 筆</h3>
            </div>
        </div>

        <!-- 卡片 3 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-500 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <p class="text-stone-500 text-sm">本月新會員</p>
                <h3 class="text-xl font-bold text-stone-800">42 人</h3>
            </div>
        </div>

        <!-- 卡片 4 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex items-center">
            <div class="w-12 h-12 bg-stone-100 rounded-xl flex items-center justify-center text-stone-500 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            <div>
                <p class="text-stone-500 text-sm">今日訪客人數</p>
                <h3 class="text-xl font-bold text-stone-800">1,250</h3>
            </div>
        </div>
    </div>

    <!-- 佔位區域：最近訂單或圖表 -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-bold text-stone-800">最近訂單</h2>
            <a href="#" class="text-orange-400 text-sm hover:underline">查看全部</a>
        </div>
        <div class="text-center py-12 border-2 border-dashed border-stone-100 rounded-xl text-stone-400">
            <p>目前尚無新訂單資料，當系統正式運作時，這裡將顯示最近的交易內容。</p>
        </div>
    </div>
</div>
@endsection