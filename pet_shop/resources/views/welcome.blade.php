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
                <svg xmlns="http://www.w3.org/2000/svg" fil="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                stroke-linecap="round"
                stroke-linejoin="round" d="m21
                21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196
                5.196a7.5 7.5 0 0 0 10.607 10.607z"/>
                </svg>
             </button>
              <!-- 2. 登入圖標 (使用者小人) -->
              <a href="#" class="text-stone-500 hover:text-orange-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 
                            0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"       
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0
                            0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /> 
                    </svg>
                </a> 
                <!-- 3. 購物車圖標 (籃子) -->
                <a href="#" class="text-stone-500 hover:text-orange-400 transition relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 
                        0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"       
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45   
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
    <section class="relative bg-orange-50 overflow-hidden"
       x-data="{active:0,slides:
                [{title:'給毛孩最溫暖的居家呵護', color: 'bg-orange-100'},
                {title: '精選寵物零食，健康又美味', color: 'bg-orange-200'},
                { title: '舒適寵物床，夢幻睡眠品質', color: 'bg-amber-100' }
                ]}"
                x-init="setInterval(()=> { active = (active + 1) % slides.length}, 3000)">
        <div class="relative h-[500px] w-full">
            <!-- 這裡變成迴圈，自動生成每一張圖的結構 -->
            <template x-for="(slide, index) in slides" :key="index">
               <div x-show="active === index"
                    x-transition.opacity.duration.500ms
                    class="absolute inset-0 flex items-center justify-center"
                    :class="slide.color">
                    <h1 class="text-5xl font-bold text-stone-800 mb-4"x-text="slide.title"></h1>
                </div> 
            </template> 
        </div>
        <!-- 左箭頭 -->
         <button @click="active = (active - 1 + slides.length) % slides.length"
                class="absolute top-1/2 left-4  p-2 rounded-full hover:bg-white transition"><
          </button> 
          <!-- 右箭頭 -->
        <button @click="active = (active + 1) % slides.length"
               class="absolute top-1/2 right-4  p-2 rounded-full hover:bg-white transition">
          >
        </button>   
    </section>
    
@endsection