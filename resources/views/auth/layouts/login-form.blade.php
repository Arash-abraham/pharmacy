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
                            