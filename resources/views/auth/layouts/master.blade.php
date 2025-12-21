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

                            @include('auth.layouts.partials.tabs')
                            
                            <!-- فرم ورود -->
                            <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-6">
                                @csrf
                                <div>
                                    <label for="loginEmail" class="block text-slate-300 mb-2">ایمیل یا شماره موبایل</label>
                                    <div class="relative">
                                        <input type="text" id="loginEmail" class="form-input pr-12" placeholder="example@email.com">
                                        <i class="fas fa-envelope absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                    </div>
                                    <div id="loginEmailError" class="error-message">لطفا ایمیل یا شماره موبایل معتبر وارد کنید</div>
                                </div>
                                
                                <div>
                                    <label for="loginPassword" class="block text-slate-300 mb-2">رمز عبور</label>
                                    <div class="relative">
                                        <input type="password" id="loginPassword" class="form-input pr-12" placeholder="••••••••">
                                        <i class="fas fa-lock absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                        <span class="password-toggle" id="toggleLoginPassword">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    <div id="loginPasswordError" class="error-message">رمز عبور باید حداقل ۸ کاراکتر باشد</div>
                                </div>
                                
                                <div class="flex justify-between items-center"> 
                                    <a href="#" class="text-primary hover:text-indigo-300 transition-colors duration-300 text-sm">رمز عبور را فراموش کرده‌اید؟</a>
                                </div>
                                
                                <button type="submit" class="primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-full py-4 rounded-xl font-bold transition-all duration-300 shine-effect">
                                    ورود به حساب کاربری
                                </button>
                            </form>
                            
                            <!-- فرم ثبت‌نام -->
                            <form id="registerForm" class="space-y-6 hidden">
                                <div>
                                    <label for="registerName" class="block text-slate-300 mb-2">نام و نام خانوادگی</label>
                                    <div class="relative">
                                        <input type="text" id="registerName" class="form-input pr-12" placeholder="علی محمدی">
                                        <i class="fas fa-user absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                    </div>
                                    <div id="registerNameError" class="error-message">لطفا نام و نام خانوادگی خود را وارد کنید</div>
                                </div>
                                
                                <div>
                                    <label for="registerEmail" class="block text-slate-300 mb-2">ایمیل</label>
                                    <div class="relative">
                                        <input type="email" id="registerEmail" class="form-input pr-12" placeholder="example@email.com">
                                        <i class="fas fa-envelope absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                    </div>
                                    <div id="registerEmailError" class="error-message">لطفا ایمیل معتبر وارد کنید</div>
                                </div>
                                
                                <div>
                                    <label for="registerPhone" class="block text-slate-300 mb-2">شماره موبایل</label>
                                    <div class="relative">
                                        <input type="tel" id="registerPhone" class="form-input pr-12" placeholder="09123456789">
                                        <i class="fas fa-phone absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                    </div>
                                    <div id="registerPhoneError" class="error-message">لطفا شماره موبایل معتبر وارد کنید</div>
                                </div>
                                
                                <div>
                                    <label for="registerPassword" class="block text-slate-300 mb-2">رمز عبور</label>
                                    <div class="relative">
                                        <input type="password" id="registerPassword" class="form-input pr-12" placeholder="••••••••">
                                        <i class="fas fa-lock absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                        <span class="password-toggle" id="toggleRegisterPassword">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    <div id="registerPasswordError" class="error-message">رمز عبور باید حداقل ۸ کاراکتر و شامل حروف و اعداد باشد</div>
                                </div>
                                
                                <div>
                                    <label for="registerConfirmPassword" class="block text-slate-300 mb-2">تکرار رمز عبور</label>
                                    <div class="relative">
                                        <input type="password" id="registerConfirmPassword" class="form-input pr-12" placeholder="••••••••">
                                        <i class="fas fa-lock absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                        <span class="password-toggle" id="toggleRegisterConfirmPassword">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    <div id="registerConfirmPasswordError" class="error-message">رمز عبور و تکرار آن باید یکسان باشند</div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <label class="checkbox-container">
                                        <input type="checkbox" id="termsAgreement">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="text-slate-300 text-sm leading-relaxed">
                                        با <a href="#" class="text-primary hover:text-indigo-300 underline">قوانین و مقررات</a> فایل استور موافقم
                                    </span>
                                </div>


                                <div id="termsError" class="error-message">لطفا قوانین و مقررات را بپذیرید</div>
                                
                                <button type="submit" class="secondary-gradient hover:shadow-lg hover:shadow-emerald-500/30 w-full py-4 rounded-xl font-bold transition-all duration-300 shine-effect">
                                    ایجاد حساب کاربری
                                </button>
                            </form>
                            
                            @include('auth.layouts.partials.login-with')
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