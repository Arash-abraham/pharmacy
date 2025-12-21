<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    @include('auth.layouts.head-tag')
</head>
<body class="gradient-bg flex flex-col min-h-screen">

    @include('auth.layouts.partials.header')

    <!-- محتوای اصلی -->
    <main class="flex-1 flex items-center justify-center py-12 relative overflow-hidden">
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12">
                <!-- بخش راست: فرم‌های ورود و ثبت‌نام -->
                <div class="lg:w-2/5 max-w-lg">
                    <div class="glass rounded-3xl p-8 shadow-2xl relative overflow-hidden">
                        <div class="absolute -top-10 -left-10 w-20 h-20 bg-amber-500/20 rounded-full"></div>
                        <div class="absolute -bottom-10 -right-10 w-28 h-28 bg-purple-500/20 rounded-full"></div>
                        
                        <div class="relative z-10">
                            <!-- تب‌های ورود و ثبت‌نام -->
                            <div class="flex justify-center mb-8 bg-slate-800/30 rounded-2xl p-1">
                                <button id="loginTab" class="tab-button active flex-1">ورود</button>
                                <button id="registerTab" class="tab-button flex-1">ثبت‌نام</button>
                            </div>
                            
                            @yield('login-register')
                            
                            <!-- جداکننده -->
                            <div class="flex items-center my-8">
                                <div class="flex-1 h-px bg-slate-700"></div>
                                <div class="px-4 text-slate-500">یا ورود با</div>
                                <div class="flex-1 h-px bg-slate-700"></div>
                            </div>
                            
                            <!-- دکمه‌های ورود با شبکه‌های اجتماعی -->
                            <div class="grid grid-cols-3 gap-4">
                                <button class="social-btn google">
                                    <i class="fab fa-google text-xl"></i>
                                </button>
                                <button class="social-btn github">
                                    <i class="fab fa-github text-xl"></i>
                                </button>
                                <button class="social-btn twitter">
                                    <i class="fab fa-twitter text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- عناصر دکوری اضافی -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-indigo-500/10 rounded-full pulse-slow"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-amber-500/10 rounded-full pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/4 left-10 w-32 h-32 bg-emerald-500/10 rounded-full pulse-slow" style="animation-delay: 2s;"></div>
    </main>

    @include('auth.layouts.partials.footer')

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>