@extends('app')
@section('header')
<nav class="bg-white shadow-sm border-b border-stone-100">
    <div class="w-full mx-auto px-4 h-16 flex items-center justify-between">
        <div class="flex-shrink-0 text-2xl font-bold text-orange-400">BaanPets Logo</div>
        <a href="#" class="text-stone-600 hover:text-orange-400 transition">關於BaanPet</a>
        <a href="#" class="text-stone-600 hover:text-orange-400 transition">好評推薦</a>
        <a href="#" class="text-stone-600 hover:text-orange-400 transition">狗狗專區</a>
        <a href="#" class="text-stone-600 hover:text-orange-400 transition">貓貓專區</a>
        <a href="#" class="text-stone-600 hover:text-orange-400 transition">最新消息</a>
        <a href="#" class="text-stone-600 hover:text-orange-400 transition">知識分享</a>
        <a href="#" class="text-stone-600 hover:text-orange-400 transition">銷售據點</a>
        <!-- 右側：功能區(搜尋、登入、購物車) -->
        <div class="flex items-center space-x-5">
            <!-- 1. 搜尋圖標 (放大鏡) -->
            <button class="text-stone-500 hover:text-orange-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21
                21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196
                5.196a7.5 7.5 0 0 0 10.607 10.607z" />
                </svg>
            </button>
            <!-- 2. 登入圖標 (使用者小人) -->
            <a href="#" class="text-stone-500 hover:text-orange-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 
                            0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0
                            0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </a>
            <!-- 3. 購物車圖標 (籃子) -->
            <a href="#" class="text-stone-500 hover:text-orange-400 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 
                        0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45   
                            1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 
                            5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 
                            .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <!-- 購物車數量泡泡 (選配) -->
                <span class="absolute -top-2 -right-2 bg-orange-400 text-white 
                                text-[10px] w-4 h-4 rounded-full flex items-center justify-center">0
                </span>
            </a>
        </div>
    </div>
</nav>
@endsection
{{-- 填入 content 的洞 --}}
@section('content')
<section class="relative bg-orange-50 overflow-hidden" x-data="{active:0,slides:
                [{title:'給毛孩最溫暖的居家呵護', color: 'bg-orange-100'},
                {title: '精選寵物零食，健康又美味', color: 'bg-orange-200'},
                { title: '舒適寵物床，夢幻睡眠品質', color: 'bg-amber-100' }
                ]}" x-init="setInterval(()=> { active = (active + 1) % slides.length}, 3000)">
    <div class="relative h-[500px] w-full">
        <!-- 這裡變成迴圈，自動生成每一張圖的結構 -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="active === index" x-transition.opacity.duration.500ms
                class="absolute inset-0 flex items-center justify-center" :class="slide.color">
                <h1 class="text-5xl font-bold text-stone-800 mb-4" x-text="slide.title"></h1>
            </div>
        </template>
    </div>
    <!-- 左箭頭 -->
    <button @click="active = (active - 1 + slides.length) % slides.length"
        class="absolute top-1/2 left-4  p-2 rounded-full hover:bg-white transition">
        < </button>
            <!-- 右箭頭 -->
            <button @click="active = (active + 1) % slides.length"
                class="absolute top-1/2 right-4  p-2 rounded-full hover:bg-white transition">
                >
            </button>
</section>
<!-- 商品展示區塊：背景色當作外框區隔 -->
<div class="min-h-screen bg-[#FDFDFD] py-20 px-4 sm:px-8">
    <div class="max-w-[1400px] mx-auto">
        <h2 class="text-3xl font-bold text-center text-stone-800 mb-16 tracking-widest">精選商品</h2>

        <!-- 網格容器：縮小橫向間距 gap-x-2 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-2 gap-y-12 justify-items-center">
            
            {{-- 商品卡片 1 --}}
            <div class="flex flex-col group cursor-pointer max-w-[443px] w-full">
                <!-- 圖片容器：強制 443x443 比例 -->
                <div class="w-full aspect-square overflow-hidden bg-[#F2F2F2]">
                    <img 
                        src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?auto=format&fit=crop&w=800&q=80" 
                        alt="經典寵物手工項圈" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out"
                    >
                </div>
                <!-- 文字資訊：位於圖片下方 -->
                <div class="mt-6 flex flex-col space-y-1">
                    <h3 class="text-xl font-medium text-gray-900 tracking-tight">經典寵物手工項圈</h3>
                    <p class="text-sm text-gray-400 tracking-widest uppercase">Natural Leather Series</p>
                    <p class="text-lg font-bold text-gray-800 pt-3">NT$ 1,280</p>
                </div>
            </div>

            {{-- 商品卡片 2 --}}
            <div class="flex flex-col group cursor-pointer max-w-[443px] w-full">
                <div class="w-full aspect-square overflow-hidden bg-[#F2F2F2]">
                    <img 
                        src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=800&q=80" 
                        alt="三合一洗潔沐浴露" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out"
                    >
                </div>
                <div class="mt-6 flex flex-col space-y-1">
                    <h3 class="text-xl font-medium text-gray-900 tracking-tight">三合一洗潔沐浴露250ml</h3>
                    <p class="text-sm text-gray-400 tracking-widest uppercase">3-in-1 Pet Shampoo</p>
                    <p class="text-lg font-bold text-gray-800 pt-3">NT$ 599</p>
                </div>
            </div>

            {{-- 商品卡片 3 --}}
            <div class="flex flex-col group cursor-pointer max-w-[443px] w-full">
                <div class="w-full aspect-square overflow-hidden bg-[#F2F2F2]">
                    <img 
                        src="https://images.unsplash.com/photo-1594149635208-8e6d8a3d5f1d?auto=format&fit=crop&w=800&q=80" 
                        alt="除臭淨味噴霧" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out"
                    >
                </div>
                <div class="mt-6 flex flex-col space-y-1">
                    <h3 class="text-xl font-medium text-gray-900 tracking-tight">除臭淨味噴霧250ml</h3>
                    <p class="text-sm text-gray-400 tracking-widest uppercase">Pet Deodorizing Spray</p>
                    <p class="text-lg font-bold text-gray-800 pt-3">NT$ 599</p>
                </div>
            </div>

            {{-- 商品卡片 4 --}}
            <div class="flex flex-col group cursor-pointer max-w-[443px] w-full">
                <div class="w-full aspect-square overflow-hidden bg-[#F2F2F2]">
                    <img 
                        src="https://images.unsplash.com/photo-1583568809187-5582f3c7e7b3?auto=format&fit=crop&w=800&q=80" 
                        alt="除臭濕巾" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out"
                    >
                </div>
                <div class="mt-6 flex flex-col space-y-1">
                    <h3 class="text-xl font-medium text-gray-900 tracking-tight">除臭濕巾30抽(3包)</h3>
                    <p class="text-sm text-gray-400 tracking-widest uppercase">Pet Wipes</p>
                    <p class="text-lg font-bold text-gray-800 pt-3">NT$ 149</p>
                </div>
            </div>

            {{-- 商品卡片 5 --}}
            <div class="flex flex-col group cursor-pointer max-w-[443px] w-full">
                <div class="w-full aspect-square overflow-hidden bg-[#F2F2F2]">
                    <img 
                        src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=800&q=80" 
                        alt="寵物訓練零食" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out"
                    >
                </div>
                <div class="mt-6 flex flex-col space-y-1">
                    <h3 class="text-xl font-medium text-gray-900 tracking-tight">寵物訓練專門雞肉乾</h3>
                    <p class="text-sm text-gray-400 tracking-widest uppercase">Training Treats Series</p>
                    <p class="text-lg font-bold text-gray-800 pt-3">NT$ 350</p>
                </div>
            </div>

            {{-- 商品卡片 6 --}}
            <div class="flex flex-col group cursor-pointer max-w-[443px] w-full">
                <div class="w-full aspect-square overflow-hidden bg-[#F2F2F2]">
                    <img 
                        src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&fit=crop&w=800&q=80" 
                        alt="手工編織寵物床" 
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out"
                    >
                </div>
                <div class="mt-6 flex flex-col space-y-1">
                    <h3 class="text-xl font-medium text-gray-900 tracking-tight">手工編織北歐風寵物床</h3>
                    <p class="text-sm text-gray-400 tracking-widest uppercase">Home Comfort Series</p>
                    <p class="text-lg font-bold text-gray-800 pt-3">NT$ 2,480</p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- 回到頂部按鈕 -->
<div x-data="{ showTop: false }" 
     x-init="window.addEventListener('scroll', () => { showTop = window.pageYOffset > 400 })"
     class="fixed bottom-8 right-8 z-50">
    <button x-show="showTop" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="bg-orange-400 hover:bg-orange-500 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-all duration-300 group"
            aria-label="回到頂部">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 group-hover:-translate-y-1 transition-transform">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
        </svg>
    </button>
</div>

@endsection

@section('footer')
<footer class="bg-stone-800 text-stone-300 py-16">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
        <!-- 品牌簡介 -->
        <div class="space-y-6">
            <h4 class="text-2xl font-bold text-orange-400">BaanPets</h4>
            <p class="text-sm leading-relaxed">
                Baan 在泰語中意為「家」。我們致力於為毛孩打造一個充滿愛與舒適的居家環境，精選自然皮革與環保材質，讓每位寵物都能感受到家的溫度。
            </p>
            <div class="flex space-x-4 pt-2">
                <!-- Facebook Icon -->
                <a href="#" class="hover:text-orange-400 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>
                <!-- Instagram Icon -->
                <a href="#" class="hover:text-orange-400 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>
                </a>
                <!-- LINE Icon -->
                <a href="#" class="hover:text-orange-400 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 10.304c0-5.369-5.383-9.738-12-9.738-6.616 0-12 4.369-12 9.738 0 4.814 4.269 8.846 10.036 9.608.391.084.922.258 1.057.592.121.303.079.778.039 1.085l-.171 1.027c-.053.303-.242 1.185 1.039.646 1.281-.538 6.915-4.071 9.428-6.968 1.728-1.921 2.571-3.954 2.571-5.99zm-16.792 3.616h-1.62c-.179 0-.324-.145-.324-.324v-3.793c0-.179.145-.324.324-.324h1.62c.179 0 .324.145.324.324v3.793c0 .179-.145.324-.324.324zm3.12 0h-1.62c-.179 0-.324-.145-.324-.324v-3.793c0-.179.145-.324.324-.324h1.62c.179 0 .324.145.324.324v3.793c0 .179-.145.324-.324.324zm3.626 0c0 .179-.145.324-.324.324h-1.503c-.179 0-.324-.145-.324-.324v-3.793c0-.179.145-.324.324-.324h1.503c.179 0 .324.145.324.324v3.793zm3.763 0h-1.62c-.179 0-.324-.145-.324-.324v-3.793c0-.179.145-.324.324-.324h1.62c.179 0 .324.145.324.324v3.793c0 .179-.145.324-.324.324z"/></svg>
                </a>
            </div>
        </div>

        <!-- 快速連結 -->
        <div>
            <h5 class="text-white font-bold mb-6 tracking-widest uppercase text-sm">探索 BaanPets</h5>
            <ul class="space-y-4 text-sm">
                <li><a href="#" class="hover:text-orange-400 transition">關於我們</a></li>
                <li><a href="#" class="hover:text-orange-400 transition">所有商品</a></li>
                <li><a href="#" class="hover:text-orange-400 transition">會員中心</a></li>
                <li><a href="#" class="hover:text-orange-400 transition">最新消息</a></li>
            </ul>
        </div>

        <!-- 顧客服務 -->
        <div>
            <h5 class="text-white font-bold mb-6 tracking-widest uppercase text-sm">顧客服務</h5>
            <ul class="space-y-4 text-sm">
                <li><a href="#" class="hover:text-orange-400 transition">常見問題</a></li>
                <li><a href="#" class="hover:text-orange-400 transition">運送政策</a></li>
                <li><a href="#" class="hover:text-orange-400 transition">退換貨政策</a></li>
                <li><a href="#" class="hover:text-orange-400 transition">隱私權條款</a></li>
            </ul>
        </div>

        <!-- 聯絡我們 -->
        <div class="space-y-4">
            <h5 class="text-white font-bold mb-6 tracking-widest uppercase text-sm">聯絡我們</h5>
            <p class="text-sm">
                台北市信義區寵物路 123 號<br>
                週一至週五 10:00 - 19:00
            </p>
            <p class="text-sm">
                Email: service@baanpets.com<br>
                Tel: (02) 2345-6789
            </p>
        </div>
    </div>

    <!-- 版權聲明 -->
    <div class="max-w-[1400px] mx-auto px-4 sm:px-8 mt-16 pt-8 border-t border-stone-700 text-xs flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 text-stone-500">
        <p>© 2026 BaanPets Co., Ltd. All Rights Reserved.</p>
        <div class="flex space-x-6">
            <span>Designed with ♥ for Pets</span>
            <div class="flex space-x-4 grayscale opacity-50">
                <span class="border px-1">VISA</span>
                <span class="border px-1">MasterCard</span>
                <span class="border px-1">Apple Pay</span>
            </div>
        </div>
    </div>
</footer>
@endsection