document.addEventListener('DOMContentLoaded', function() {
    // عناصر DOM
    const loginTab = document.getElementById('loginTab');
    const registerTab = document.getElementById('registerTab');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const notification = document.getElementById('notification');
    const notificationMessage = document.getElementById('notificationMessage');
    
    // مدیریت تب‌ها
    loginTab.addEventListener('click', function() {
        loginTab.classList.add('active');
        registerTab.classList.remove('active');
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
    });
    
    registerTab.addEventListener('click', function() {
        registerTab.classList.add('active');
        loginTab.classList.remove('active');
        registerForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
    });
    
    // نمایش/مخفی کردن رمز عبور
    function setupPasswordToggle(toggleId, passwordId) {
        const toggle = document.getElementById(toggleId);
        const passwordInput = document.getElementById(passwordId);
        
        if (toggle && passwordInput) {
            toggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
        }
    }
    
    setupPasswordToggle('toggleLoginPassword', 'loginPassword');
    setupPasswordToggle('toggleRegisterPassword', 'registerPassword');
    setupPasswordToggle('toggleRegisterConfirmPassword', 'registerConfirmPassword');
    
    // تابع نمایش نوتیفیکیشن
    function showNotification(message, type = 'success') {
        notificationMessage.textContent = message;
        notification.className = 'notification';
        
        if (type === 'error') {
            notification.classList.add('error');
            notification.querySelector('i').className = 'fas fa-exclamation-circle ml-2';
        } else if (type === 'warning') {
            notification.classList.add('warning');
            notification.querySelector('i').className = 'fas fa-exclamation-triangle ml-2';
        } else {
            notification.querySelector('i').className = 'fas fa-check-circle ml-2';
        }
        
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 4000);
    }
    
    // افکت ریپل برای دکمه‌ها
    document.querySelectorAll('button[type="submit"]').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size/2;
            const y = e.clientY - rect.top - size/2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // اعتبارسنجی فرم ورود
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        const email = document.getElementById('loginEmail');
        const password = document.getElementById('loginPassword');
        const emailError = document.getElementById('loginEmailError');
        const passwordError = document.getElementById('loginPasswordError');
        
        // ریست خطاها
        emailError.style.display = 'none';
        passwordError.style.display = 'none';
        email.classList.remove('error', 'success');
        password.classList.remove('error', 'success');
        
        // اعتبارسنجی ایمیل/موبایل
        if (!email.value.trim()) {
            emailError.textContent = 'لطفا ایمیل یا شماره موبایل را وارد کنید';
            emailError.style.display = 'block';
            email.classList.add('error');
            isValid = false;
        } else if (!isValidEmail(email.value) && !isValidPhone(email.value)) {
            emailError.textContent = 'لطفا ایمیل یا شماره موبایل معتبر وارد کنید';
            emailError.style.display = 'block';
            email.classList.add('error');
            isValid = false;
        } else {
            email.classList.add('success');
        }
        
        // اعتبارسنجی رمز عبور
        if (!password.value.trim()) {
            passwordError.textContent = 'لطفا رمز عبور را وارد کنید';
            passwordError.style.display = 'block';
            password.classList.add('error');
            isValid = false;
        } else if (password.value.length < 8) {
            passwordError.textContent = 'رمز عبور باید حداقل ۸ کاراکتر باشد';
            passwordError.style.display = 'block';
            password.classList.add('error');
            isValid = false;
        } else {
            password.classList.add('success');
        }
        
        if (isValid) {
            // شبیه‌سازی ارسال فرم
            setTimeout(() => {
                showNotification('ورود با موفقیت انجام شد! در حال انتقال به پنل کاربری...');
                
                // انتقال به صفحه اصلی بعد از 2 ثانیه
                setTimeout(() => {
                    window.location.href = 'index.html';
                }, 2000);
            }, 800);
        }
    });
    
    // اعتبارسنجی فرم ثبت‌نام
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        const name = document.getElementById('registerName');
        const email = document.getElementById('registerEmail');
        const phone = document.getElementById('registerPhone');
        const password = document.getElementById('registerPassword');
        const confirmPassword = document.getElementById('registerConfirmPassword');
        const terms = document.getElementById('termsAgreement');
        
        const nameError = document.getElementById('registerNameError');
        const emailError = document.getElementById('registerEmailError');
        const phoneError = document.getElementById('registerPhoneError');
        const passwordError = document.getElementById('registerPasswordError');
        const confirmPasswordError = document.getElementById('registerConfirmPasswordError');
        const termsError = document.getElementById('termsError');
        
        // ریست خطاها
        [nameError, emailError, phoneError, passwordError, confirmPasswordError, termsError].forEach(error => {
            error.style.display = 'none';
        });
        
        [name, email, phone, password, confirmPassword].forEach(input => {
            input.classList.remove('error', 'success');
        });
        
        // اعتبارسنجی نام
        if (!name.value.trim()) {
            nameError.style.display = 'block';
            name.classList.add('error');
            isValid = false;
        } else if (name.value.trim().length < 3) {
            nameError.textContent = 'نام باید حداقل ۳ کاراکتر باشد';
            nameError.style.display = 'block';
            name.classList.add('error');
            isValid = false;
        } else {
            name.classList.add('success');
        }
        
        // اعتبارسنجی ایمیل
        if (!email.value.trim()) {
            emailError.textContent = 'لطفا ایمیل را وارد کنید';
            emailError.style.display = 'block';
            email.classList.add('error');
            isValid = false;
        } else if (!isValidEmail(email.value)) {
            emailError.textContent = 'لطفا ایمیل معتبر وارد کنید';
            emailError.style.display = 'block';
            email.classList.add('error');
            isValid = false;
        } else {
            email.classList.add('success');
        }
        
        // اعتبارسنجی شماره موبایل
        if (!phone.value.trim()) {
            phoneError.textContent = 'لطفا شماره موبایل را وارد کنید';
            phoneError.style.display = 'block';
            phone.classList.add('error');
            isValid = false;
        } else if (!isValidPhone(phone.value)) {
            phoneError.textContent = 'لطفا شماره موبایل معتبر وارد کنید (مانند 09123456789)';
            phoneError.style.display = 'block';
            phone.classList.add('error');
            isValid = false;
        } else {
            phone.classList.add('success');
        }
        
        // اعتبارسنجی رمز عبور
        if (!password.value.trim()) {
            passwordError.textContent = 'لطفا رمز عبور را وارد کنید';
            passwordError.style.display = 'block';
            password.classList.add('error');
            isValid = false;
        } else if (password.value.length < 8) {
            passwordError.textContent = 'رمز عبور باید حداقل ۸ کاراکتر باشد';
            passwordError.style.display = 'block';
            password.classList.add('error');
            isValid = false;
        } else if (!/(?=.*[a-zA-Z])(?=.*\d)/.test(password.value)) {
            passwordError.textContent = 'رمز عبور باید شامل حروف و اعداد باشد';
            passwordError.style.display = 'block';
            password.classList.add('error');
            isValid = false;
        } else {
            password.classList.add('success');
        }
        
        // اعتبارسنجی تکرار رمز عبور
        if (!confirmPassword.value.trim()) {
            confirmPasswordError.textContent = 'لطفا تکرار رمز عبور را وارد کنید';
            confirmPasswordError.style.display = 'block';
            confirmPassword.classList.add('error');
            isValid = false;
        } else if (confirmPassword.value !== password.value) {
            confirmPasswordError.textContent = 'رمز عبور و تکرار آن باید یکسان باشند';
            confirmPasswordError.style.display = 'block';
            confirmPassword.classList.add('error');
            isValid = false;
        } else {
            confirmPassword.classList.add('success');
        }
        
        // اعتبارسنجی قوانین
        if (!terms.checked) {
            termsError.style.display = 'block';
            isValid = false;
        }
        
        if (isValid) {
            // شبیه‌سازی ارسال فرم
            setTimeout(() => {
                showNotification('ثبت‌نام با موفقیت انجام شد! حساب کاربری شما ایجاد شد.');
                
                // تغییر به تب ورود بعد از 2 ثانیه
                setTimeout(() => {
                    loginTab.click();
                    document.getElementById('loginEmail').value = email.value;
                    document.getElementById('loginPassword').value = password.value;
                }, 2000);
            }, 800);
        }
    });
    
    // اعتبارسنجی ایمیل
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    // اعتبارسنجی شماره موبایل
    function isValidPhone(phone) {
        const re = /^09[0-9]{9}$/;
        return re.test(phone);
    }
    
    // ورود با شبکه‌های اجتماعی
    document.querySelectorAll('.social-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const socialName = this.classList.contains('google') ? 'گوگل' : 
                              this.classList.contains('github') ? 'گیت‌هاب' : 'توییتر';
            
            showNotification(`در حال اتصال با ${socialName}... لطفا صبر کنید`, 'warning');
        });
    });
    
    // اعتبارسنجی لحظه‌ای برای فرم ثبت‌نام
    document.getElementById('registerPassword').addEventListener('input', function() {
        const password = this.value;
        const errorElement = document.getElementById('registerPasswordError');
        
        if (password.length > 0 && password.length < 8) {
            errorElement.textContent = 'رمز عبور باید حداقل ۸ کاراکتر باشد';
            errorElement.style.display = 'block';
            this.classList.add('error');
            this.classList.remove('success');
        } else if (password.length >= 8 && !/(?=.*[a-zA-Z])(?=.*\d)/.test(password)) {
            errorElement.textContent = 'رمز عبور باید شامل حروف و اعداد باشد';
            errorElement.style.display = 'block';
            this.classList.add('error');
            this.classList.remove('success');
        } else if (password.length >= 8 && /(?=.*[a-zA-Z])(?=.*\d)/.test(password)) {
            errorElement.style.display = 'none';
            this.classList.remove('error');
            this.classList.add('success');
        } else {
            errorElement.style.display = 'none';
            this.classList.remove('error', 'success');
        }
    });
});
