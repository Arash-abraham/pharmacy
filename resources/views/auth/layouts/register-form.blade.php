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
    
    <div class="flex items-start gap-3">
        <label class="checkbox-container">
            <input type="checkbox" id="termsAgreement">
            <span class="checkmark"></span>
        </label>
        <span class="text-slate-300 text-sm leading-relaxed">
            با <a href="#" class="text-primary hover:text-indigo-300 underline">قوانین و مقررات</a> فایل استور موافقم
        </span>
    
    <div id="termsError" class="error-message">لطفا قوانین و مقررات را بپذیرید</div>
    
    <button type="submit" class="secondary-gradient hover:shadow-lg hover:shadow-emerald-500/30 w-full py-4 rounded-xl font-bold transition-all duration-300 shine-effect">
        ایجاد حساب کاربری
    </button>
</form>              
