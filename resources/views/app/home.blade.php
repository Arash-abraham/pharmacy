@extends('app.layouts.master')

@section('title', 'خانه')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <!-- نوار پیشرفت -->
    <div class="progress-bar" id="progressBar"></div>
    <!-- مودال جستجو -->
    <div class="search-modal" id="searchModal">
        <button class="search-close" id="searchClose">
            <i class="fas fa-times"></i>
        </button>
        <div class="search-container px-6">
            <div class="search-input-container">
                <input type="text" class="search-input" id="searchInput" placeholder="چه فایلی می‌خواهید پیدا کنید؟">
                <i class="fas fa-search search-icon"></i>
            </div>
            
            <div class="text-slate-400 mb-6">
                <p>جستجوی پیشرفته: می‌توانید براساس دسته‌بندی، قیمت، فروشنده و ... جستجو کنید.</p>
            </div>
            
            <div class="search-tags">
                <span class="search-tag">قالب وب</span>
                <span class="search-tag">اپلیکیشن موبایل</span>
                <span class="search-tag">گرافیک</span>
                <span class="search-tag">آموزشی</span>
                <span class="search-tag">پلاگین وردپرس</span>
                <span class="search-tag">فایل صوتی</span>
                <span class="search-tag">ویدئو آموزشی</span>
                <span class="search-tag">اسکریپت</span>
            </div>
            
            <div class="search-results" id="searchResults">
                <h3 class="text-xl font-bold mb-4">پیشنهادهای ویژه:</h3>
                <div class="search-result-item">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-lg mb-1">قالب فروشگاهی React پیشرفته</h4>
                            <p class="text-slate-400 text-sm">قالب کامل فروشگاهی با امکانات مدرن و ریسپانسیو</p>
                        </div>
                        <div class="flex items-center">
                            <span class="text-lg font-bold ml-4">120,000 تومان</span>
                            <i class="fas fa-arrow-left text-slate-500"></i>
                        </div>
                    </div>
                </div>
                
                <div class="search-result-item">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-lg mb-1">پکیج UI/UX کامل</h4>
                            <p class="text-slate-400 text-sm">مجموعه کامل المان‌های طراحی رابط کاربری</p>
                        </div>
                        <div class="flex items-center">
                            <span class="text-lg font-bold ml-4">95,000 تومان</span>
                            <i class="fas fa-arrow-left text-slate-500"></i>
                        </div>
                    </div>
                </div>
                
                <div class="search-result-item">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="font-bold text-lg mb-1">آموزش React Native از صفر</h4>
                            <p class="text-slate-400 text-sm">دوره کامل آموزش React Native به زبان فارسی</p>
                        </div>
                        <div class="flex items-center">
                            <span class="text-lg font-bold ml-4">180,000 تومان</span>
                            <i class="fas fa-arrow-left text-slate-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- هدر -->
    <header class="glass fixed w-full z-50 py-4">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="primary-gradient p-3 rounded-xl shadow-lg">
                        <i class="fas fa-cloud-download-alt text-white text-2xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold gradient-text">فایل استور</h1>
                </div>
                
                <nav class="hidden lg:flex items-center space-x-8 space-x-reverse">
                    <a href="#" class="text-lg font-medium hover:text-indigo-300 transition-all duration-300 relative group">
                        خانه
                        <span class="absolute bottom-0 right-0 w-0 h-0.5 bg-indigo-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-lg font-medium hover:text-indigo-300 transition-all duration-300 relative group">
                        فایل‌ها
                        <span class="absolute bottom-0 right-0 w-0 h-0.5 bg-indigo-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-lg font-medium hover:text-indigo-300 transition-all duration-300 relative group">
                        دسته‌بندی‌ها
                        <span class="absolute bottom-0 right-0 w-0 h-0.5 bg-indigo-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-lg font-medium hover:text-indigo-300 transition-all duration-300 relative group">
                        فروشندگان
                        <span class="absolute bottom-0 right-0 w-0 h-0.5 bg-indigo-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-lg font-medium hover:text-indigo-300 transition-all duration-300 relative group">
                        درباره ما
                        <span class="absolute bottom-0 right-0 w-0 h-0.5 bg-indigo-400 transition-all group-hover:w-full"></span>
                    </a>
                </nav>
                
                <div class="flex items-center space-x-4 space-x-reverse">
                    <!-- دکمه جستجو -->
                    <button id="searchButton" class="bg-slate-800 hover:bg-slate-700 w-10 h-10 rounded-xl flex items-center justify-center transition-all duration-300">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <!-- سبد خرید -->
                    <div class="relative">
                        <button id="cartButton" class="bg-slate-800 hover:bg-slate-700 w-10 h-10 rounded-xl flex items-center justify-center transition-all duration-300 relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="absolute -top-1 -left-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">۳</span>
                        </button>
                        
                        <!-- باکس سبد خرید -->
                        <div class="cart-dropdown absolute top-full left-0 mt-2 w-100 rounded-xl p-5 z-50">
                            <div class="mb-4 pb-4 border-b border-slate-700">
                                <h3 class="font-bold text-lg mb-2 flex items-center">
                                    <i class="fas fa-shopping-cart ml-2 text-indigo-400"></i>
                                    سبد خرید شما
                                </h3>
                                <p class="text-slate-400 text-sm">
                                    <span id="cartItemsCount">۳</span> محصول در سبد خرید
                                </p>
                            </div>
                            
                            <div id="cartItems" class="space-y-4 mb-6 overflow-y-auto pr-2">
                                <!-- آیتم ۱ -->
                                <div class="flex items-center bg-slate-800/50 rounded-lg p-3">
                                    <div class="bg-indigo-500/20 p-2 rounded-lg ml-3 flex-shrink-0">
                                        <i class="fas fa-laptop-code text-indigo-400 text-lg"></i>
                                    </div>
                                    <div class="cartItems__product flex-1 min-w-0">
                                        <div class="font-medium truncate">قالب فروشگاهی React</div>
                                        <div class="text-sm text-slate-400">120,000 تومان</div>
                                    </div>
                                    <div class="flex items-center space-x-2 space-x-reverse" style="margin-right: 20px;">
                                        <span class="text-red-500 text-sm">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- آیتم ۲ -->
                                <div class="flex items-center bg-slate-800/50 rounded-lg p-3">
                                    <div class="bg-emerald-500/20 p-2 rounded-lg ml-3 flex-shrink-0">
                                        <i class="fas fa-mobile-alt text-emerald-400 text-lg"></i>
                                    </div>
                                    <div class="cartItems__product flex-1 min-w-0">
                                        <div class="font-medium truncate">اپلیکیشن Flutter</div>
                                        <div class="text-sm text-slate-400">250,000 تومان</div>
                                    </div>
                                    <div class="flex items-center space-x-2 space-x-reverse" style="margin-right: 20px;">
                                        <span class="text-red-500 text-sm">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- آیتم ۳ -->
                                <div class="flex items-center bg-slate-800/50 rounded-lg p-3">
                                    <div class="bg-amber-500/20 p-2 rounded-lg ml-3 flex-shrink-0">
                                        <i class="fas fa-graduation-cap text-amber-400 text-lg"></i>
                                    </div>
                                    <div class="cartItems__product flex-1 min-w-0">
                                        <div class="font-medium truncate">پکیج آموزش React Native</div>
                                        <div class="text-sm text-slate-400">180,000 تومان</div>
                                    </div>
                                    <div class="flex items-center space-x-2 space-x-reverse" style="margin-right: 20px;">
                                        <span class="text-red-500 text-sm">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- جمع کل و دکمه پرداخت -->
                            <div class="border-t border-slate-700 pt-4">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-slate-400">جمع کل:</span>
                                    <span class="font-bold text-lg gradient-text" id="cartTotal">550,000 تومان</span>
                                </div>
                                <button class="primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-full py-3 rounded-lg font-medium transition-all duration-300 shine-effect flex items-center justify-center">
                                    <i class="fas fa-shopping-bag ml-2"></i>
                                    پرداخت و تکمیل خرید
                                </button>
                                <button class="w-full py-2 mt-2 text-slate-400 hover:text-red-400 text-sm transition-colors duration-300">
                                    <i class="fas fa-trash ml-1"></i>
                                    پاک کردن سبد خرید
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- دکمه‌های دیگر -->
                    <button class="primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 px-6 py-2.5 rounded-xl font-medium transition-all duration-300 shine-effect">
                        ورود / ثبت‌نام
                    </button>
                    <button class="lg:hidden text-xl bg-slate-800 w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- بخش هیرو -->
    <section class="min-h-screen flex items-center justify-center relative pt-20 overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="container mx-auto px-6 py-20">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-1/2 mb-16 lg:mb-0 stagger-animation">
                    <h2 class="text-5xl lg:text-7xl font-bold mb-6 leading-tight">
                        بزرگترین بازار
                        <span class="gradient-text block">فایل‌های دیجیتال</span>
                    </h2>
                    <p class="text-xl text-slate-300 mb-8 leading-relaxed">
                        در فایل استور می‌توانید هزاران فایل ارزشمند از قالب‌های سایت و اپلیکیشن تا فایل‌های گرافیکی و آموزشی را خریداری و دانلود کنید.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <button class="glass hover:bg-slate-800/70 border border-slate-700 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-store ml-2"></i>
                            مشاهده فروشندگان
                        </button>
                    </div>
                    
                    <div class="flex items-center space-x-8 space-x-reverse mt-12">
                        <div class="text-center">
                            <div class="text-3xl font-bold gradient-text">۵۰۰۰+</div>
                            <div class="text-slate-400">فایل فعال</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold gradient-text">۱۲۰۰+</div>
                            <div class="text-slate-400">فروشنده</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold gradient-text">۵۰,۰۰۰+</div>
                            <div class="text-slate-400">دانلود</div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-2/5 relative">
                    <div class="floating">
                        <div class="glass rounded-3xl p-8 shadow-2xl relative overflow-hidden">
                            <div class="absolute -top-10 -right-10 w-20 h-20 bg-indigo-500/20 rounded-full"></div>
                            <div class="absolute -bottom-10 -left-10 w-28 h-28 bg-emerald-500/20 rounded-full"></div>
                            
                            <div class="relative z-10">
                                <div class="flex justify-center mb-8">
                                    <div class="primary-gradient p-5 rounded-2xl shadow-lg">
                                        <i class="fas fa-download text-white text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-bold text-center mb-4">فایل‌های با کیفیت</h3>
                                <p class="text-slate-300 text-center mb-6">ما کیفیت فایل‌ها را تضمین می‌کنیم. تمام فایل‌ها قبل از انتشار بررسی می‌شوند.</p>
                                
                                <div class="bg-slate-800/50 rounded-xl p-4 mb-4 flex items-center">
                                    <div class="bg-indigo-500/20 p-2 rounded-lg ml-3">
                                        <i class="fas fa-shield-alt text-indigo-400"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold">امنیت بالا</div>
                                        <div class="text-sm text-slate-400">فایل‌های تست شده و ایمن</div>
                                    </div>
                                </div>
                                
                                <div class="bg-slate-800/50 rounded-xl p-4 flex items-center">
                                    <div class="bg-emerald-500/20 p-2 rounded-lg ml-3">
                                        <i class="fas fa-bolt text-emerald-400"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold">دانلود سریع</div>
                                        <div class="text-sm text-slate-400">سرورهای پرسرعت</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute -top-10 -left-10 w-32 h-32 bg-indigo-500/10 rounded-full pulse-slow"></div>
                    <div class="absolute -bottom-5 -right-5 w-24 h-24 bg-amber-500/10 rounded-full pulse-slow" style="animation-delay: 1s;"></div>
                </div>
            </div>
        </div>
        
        <div class="scroll-indicator"></div>
    </section>
    <!-- دسته‌بندی‌ها -->
    <section class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 stagger-animation">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">دسته‌بندی‌ها</h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">فایل‌های مورد نیاز خود را در دسته‌بندی‌های تخصصی پیدا کنید</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 stagger-animation">
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="primary-gradient w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-code text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">قالب‌های وب</h3>
                    <p class="text-slate-400">۲,۱۴۵ فایل</p>
                </div>
                
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="secondary-gradient w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">اپلیکیشن‌ها</h3>
                    <p class="text-slate-400">۱,۸۷۶ فایل</p>
                </div>
                
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="accent-gradient w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-palette text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">گرافیک</h3>
                    <p class="text-slate-400">۳,۰۴۲ فایل</p>
                </div>
                
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="bg-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-video text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">ویدئو و موشن</h3>
                    <p class="text-slate-400">۱,۲۳۴ فایل</p>
                </div>
                
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="bg-pink-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-music text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">صدا و موسیقی</h3>
                    <p class="text-slate-400">۸۷۶ فایل</p>
                </div>
                
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="bg-cyan-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-book text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">آموزشی</h3>
                    <p class="text-slate-400">۲,۵۶۷ فایل</p>
                </div>
                
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="bg-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-file-word text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">مستندات</h3>
                    <p class="text-slate-400">۱,۵۴۳ فایل</p>
                </div>
                
                <div class="glass rounded-2xl p-6 text-center card-hover group cursor-pointer">
                    <div class="bg-slate-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-ellipsis-h text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">سایر</h3>
                    <p class="text-slate-400">۹۸۷ فایل</p>
                </div>
            </div>
        </div>
    </section>
    <!-- فایل‌های ویژه -->
    <section class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/0 to-indigo-900/10"></div>
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-12 stagger-animation">
                <h2 class="text-4xl lg:text-5xl font-bold">فایل‌های ویژه</h2>
                <a href="#" class="primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 px-6 py-3 rounded-xl font-medium transition-all duration-300 shine-effect flex items-center">
                    مشاهده همه
                    <i class="fas fa-arrow-left mr-2"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 stagger-animation">
                <!-- محصول 1 -->
                <div class="glass rounded-2xl overflow-hidden card-hover group">
                    <div class="relative overflow-hidden">
                        <div class="h-48 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 flex items-center justify-center">
                            <i class="fas fa-laptop-code text-6xl text-indigo-400"></i>
                        </div>
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-lg text-sm font-bold">
                            تخفیف ویژه
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 group-hover:text-indigo-300 transition-colors">قالب فروشگاهی React</h3>
                        <p class="text-slate-400 text-sm mb-4">قالب کامل فروشگاهی با React و Tailwind CSS</p>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-500 ml-1"></i>
                                <span>4.8</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-shopping-cart text-indigo-400 ml-1"></i>
                                <span>124</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-download text-emerald-400 ml-1"></i>
                                <span>542</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-lg font-bold">120,000 تومان</span>
                                <span class="text-sm text-slate-500 line-through mr-2">150,000</span>
                            </div>
                            <button class="add-to-cart primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 shine-effect">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- محصول 2 -->
                <div class="glass rounded-2xl overflow-hidden card-hover group">
                    <div class="relative overflow-hidden">
                        <div class="h-48 bg-gradient-to-r from-emerald-500/20 to-cyan-500/20 flex items-center justify-center">
                            <i class="fas fa-mobile-alt text-6xl text-emerald-400"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 group-hover:text-indigo-300 transition-colors">اپلیکیشن فروشگاهی Flutter</h3>
                        <p class="text-slate-400 text-sm mb-4">اپلیکیشن فروشگاهی کامل با Flutter و Firebase</p>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-500 ml-1"></i>
                                <span>4.9</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-shopping-cart text-indigo-400 ml-1"></i>
                                <span>89</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-download text-emerald-400 ml-1"></i>
                                <span>321</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">250,000 تومان</span>
                            <button class="add-to-cart primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 shine-effect">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- محصول 3 -->
                <div class="glass rounded-2xl overflow-hidden card-hover group">
                    <div class="relative overflow-hidden">
                        <div class="h-48 bg-gradient-to-r from-amber-500/20 to-orange-500/20 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-6xl text-amber-400"></i>
                        </div>
                        <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-lg text-sm font-bold">
                            جدید
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 group-hover:text-indigo-300 transition-colors">پکیج آموزش React Native</h3>
                        <p class="text-slate-400 text-sm mb-4">آموزش کامل React Native از صفر تا صد</p>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-500 ml-1"></i>
                                <span>4.7</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-shopping-cart text-indigo-400 ml-1"></i>
                                <span>156</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-download text-emerald-400 ml-1"></i>
                                <span>687</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">180,000 تومان</span>
                            <button class="add-to-cart primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 shine-effect">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- پرفروش‌ترین‌ها -->
    <section class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 stagger-animation">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">پرفروش‌ترین‌ها</h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">محبوب‌ترین فایل‌ها بین کاربران فایل استور</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 stagger-animation">
                <!-- محصول 1 -->
                <div class="glass rounded-2xl overflow-hidden card-hover group relative">
                    <div class="absolute top-4 right-4 z-10 bg-amber-500 text-black font-bold w-8 h-8 rounded-full flex items-center justify-center">
                        ۱
                    </div>
                    <div class="relative overflow-hidden">
                        <div class="h-40 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 flex items-center justify-center">
                            <i class="fas fa-chart-line text-5xl text-amber-400"></i>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 group-hover:text-indigo-300 transition-colors">پکیج UI/UX کامل</h3>
                        <p class="text-slate-400 text-sm mb-4">مجموعه کامل المان‌های طراحی رابط کاربری</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">95,000 تومان</span>
                            <button class="add-to-cart primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 shine-effect text-sm">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- محصول 2 -->
                <div class="glass rounded-2xl overflow-hidden card-hover group relative">
                    <div class="absolute top-4 right-4 z-10 bg-slate-500 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">
                        ۲
                    </div>
                    <div class="relative overflow-hidden">
                        <div class="h-40 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 flex items-center justify-center">
                            <i class="fas fa-database text-5xl text-blue-400"></i>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 group-hover:text-indigo-300 transition-colors">سیستم مدیریت محتوا</h3>
                        <p class="text-slate-400 text-sm mb-4">CMS کامل با پنل مدیریت پیشرفته</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">320,000 تومان</span>
                            <button class="add-to-cart primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 shine-effect text-sm">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- محصول 3 -->
                <div class="glass rounded-2xl overflow-hidden card-hover group relative">
                    <div class="absolute top-4 right-4 z-10 bg-amber-700 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">
                        ۳
                    </div>
                    <div class="relative overflow-hidden">
                        <div class="h-40 bg-gradient-to-r from-purple-500/20 to-pink-500/20 flex items-center justify-center">
                            <i class="fas fa-photo-video text-5xl text-purple-400"></i>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 group-hover:text-indigo-300 transition-colors">پک موشن گرافیک</h3>
                        <p class="text-slate-400 text-sm mb-4">انیمیشن‌های آماده برای پروژه‌های ویدئویی</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">75,000 تومان</span>
                            <button class="add-to-cart primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 shine-effect text-sm">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- محصول 4 -->
                <div class="glass rounded-2xl overflow-hidden card-hover group relative">
                    <div class="absolute top-4 right-4 z-10 bg-slate-600 text-white font-bold w-8 h-8 rounded-full flex items-center justify-center">
                        ۴
                    </div>
                    <div class="relative overflow-hidden">
                        <div class="h-40 bg-gradient-to-r from-green-500/20 to-emerald-500/20 flex items-center justify-center">
                            <i class="fas fa-book-open text-5xl text-green-400"></i>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 group-hover:text-indigo-300 transition-colors">آموزش Node.js پیشرفته</h3>
                        <p class="text-slate-400 text-sm mb-4">آموزش جامع Node.js از مقدماتی تا پیشرفته</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">140,000 تومان</span>
                            <button class="add-to-cart primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 shine-effect text-sm">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- نظرات کاربران -->
    <section class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/0 to-purple-900/10"></div>
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 stagger-animation">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">نظرات کاربران</h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">تجربه کاربران از فایل استور</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 stagger-animation">
                <!-- نظر 1 -->
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-center mb-4">
                        <img src="https://i.pinimg.com/736x/bd/d9/aa/bdd9aaee8c129b1d0a7180512c6f7ae5.jpg" alt="کاربر" class="w-12 h-12 rounded-full ml-4">
                        <div>
                            <div class="font-bold">علیرضا محمدی</div>
                            <div class="text-slate-400 text-sm">طراح وب</div>
                        </div>
                    </div>
                    <div class="flex text-amber-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-slate-300">قالب‌هایی که از فایل استور خریدم واقعا باکیفیت و حرفه‌ای بودن. پشتیبانی عالی و پاسخگو.</p>
                </div>
                
                <!-- نظر 2 -->
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-center mb-4">
                        <img src="https://i.pinimg.com/736x/a9/75/93/a975934bb378afc4ca8c133df451f56e.jpg" alt="کاربر" class="w-12 h-12 rounded-full ml-4">
                        <div>
                            <div class="font-bold">سارا نوروزی</div>
                            <div class="text-slate-400 text-sm">توسعه‌دهنده اپلیکیشن</div>
                        </div>
                    </div>
                    <div class="flex text-amber-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-slate-300">اپلیکیشن Flutter که خریدم کمک زیادی به پروژه‌م کرد. داکیومنت کامل و پشتیبانی 24 ساعته.</p>
                </div>
                
                <!-- نظر 3 -->
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex items-center mb-4">
                        <img src="https://static.vecteezy.com/system/resources/previews/046/409/821/large_2x/avatar-profile-icon-in-flat-style-male-user-profile-illustration-on-isolated-background-man-profile-sign-business-concept-vector.jpg" alt="کاربر" class="w-12 h-12 rounded-full ml-4">
                        <div>
                            <div class="font-bold">محمدرضا کریمی</div>
                            <div class="text-slate-400 text-sm">گرافیست</div>
                        </div>
                    </div>
                    <div class="flex text-amber-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-slate-300">پک آیکون‌هایی که خریدم واقعا کامل و با کیفیت بالا بودن. در زمان طراحی خیلی بهم کمک کردن.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- سوالات متداول -->
    <section class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 stagger-animation">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">سوالات متداول</h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">پاسخ به پرتکرارترین سوالات کاربران</p>
            </div>
            
            <div class="max-w-4xl mx-auto stagger-animation">
                <div class="glass rounded-2xl p-6 mb-6 card-hover">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="font-bold text-lg">چگونه می‌توانم خرید کنم ؟</h3>
                        <i class="fas fa-chevron-down text-indigo-400"></i>
                    </div>
                    <div class="mt-4 text-slate-300 hidden">
                        <p>برای خرید فایل، ابتدا در سایت ثبت‌نام کنید. سپس فایل مورد نظر خود را انتخاب کرده و روی دکمه "افزودن به سبد خرید" کلیک کنید. پس از تکمیل فرآیند پرداخت، فایل بلافاصله برای دانلود در دسترس خواهد بود.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl p-6 mb-6 card-hover">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="font-bold text-lg">آیا می‌توانم فایل‌های خود را بفروشم؟</h3>
                        <i class="fas fa-chevron-down text-indigo-400"></i>
                    </div>
                    <div class="mt-4 text-slate-300 hidden">
                        <p>بله، پس از ثبت‌نام در سایت و تأیید حساب کاربری، می‌توانید فایل‌های خود را آپلود کرده و برای فروش قرار دهید. فایل‌های شما قبل از انتشار از نظر کیفیت و امنیت بررسی خواهند شد.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl p-6 mb-6 card-hover">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="font-bold text-lg">سیستم پشتیبانی چگونه کار می‌کند؟</h3>
                        <i class="fas fa-chevron-down text-indigo-400"></i>
                    </div>
                    <div class="mt-4 text-slate-300 hidden">
                        <p>ما پشتیبانی 24 ساعته از طریق تیکت، چت آنلاین و تماس تلفنی ارائه می‌دهیم. همچنین برای هر فایل، فروشنده موظف است به سوالات کاربران پاسخ دهد.</p>
                    </div>
                </div>
                
                <div class="glass rounded-2xl p-6 card-hover">
                    <div class="flex justify-between items-center cursor-pointer">
                        <h3 class="font-bold text-lg">آیا خرید از فایل استور امن است؟</h3>
                        <i class="fas fa-chevron-down text-indigo-400"></i>
                    </div>
                    <div class="mt-4 text-slate-300 hidden">
                        <p>بله، تمام تراکنش‌ها از طریق درگاه‌های بانکی معتبر و با پروتکل SSL انجام می‌شود. همچنین تمام فایل‌ها قبل از انتشار از نظر امنیتی بررسی می‌شوند.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA -->
    <section class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 primary-gradient opacity-10"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-3xl mx-auto stagger-animation">
                <h3 class="text-4xl lg:text-5xl font-bold mb-6">همین حالا فروش فایل‌های خود را شروع کنید</h3>
                <p class="text-xl text-slate-300 mb-10">به جامعه فروشندگان فایل استور بپیوندید و درآمد خود را افزایش دهید</p>
                <button class="secondary-gradient hover:shadow-lg hover:shadow-emerald-500/30 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shine-effect inline-flex items-center">
                    <i class="fas fa-user-plus ml-2"></i>
                    ثبت‌نام به عنوان فروشنده
                </button>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection