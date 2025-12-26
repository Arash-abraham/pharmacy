// نوار پیشرفت اسکرول
window.addEventListener('scroll', function() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById('progressBar').style.width = scrolled + '%';
});

// مدیریت ارسال فرم
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // شبیه‌سازی ارسال موفق فرم
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin ml-2"></i> در حال ارسال...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                // ایجاد پیام موفقیت
                const successMsg = document.createElement('div');
                successMsg.className = 'fixed top-24 left-6 bg-emerald-600 text-white px-6 py-4 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300';
                successMsg.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-2xl ml-3"></i>
                        <div>
                            <div class="font-bold">درخواست شما با موفقیت ثبت شد</div>
                            <div class="text-sm mt-1">کارشناسان ما در ۲۴ ساعت آینده با شما تماس خواهند گرفت</div>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(successMsg);
                
                // نمایش پیام
                setTimeout(() => {
                    successMsg.style.transform = 'translateX(0)';
                }, 10);
                
                // بازنشانی فرم
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                form.reset();
                
                // مخفی کردن پیام
                setTimeout(() => {
                    successMsg.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        document.body.removeChild(successMsg);
                    }, 300);
                }, 5000);
            }, 1500);
        });
    }

    // مدیریت منوی موبایل
    const mobileMenuButton = document.querySelector('.lg\\:hidden');
    const nav = document.querySelector('nav');
    
    if (mobileMenuButton && nav) {
        mobileMenuButton.addEventListener('click', () => {
            nav.classList.toggle('hidden');
            nav.classList.toggle('flex');
            nav.classList.toggle('absolute');
            nav.classList.toggle('top-full');
            nav.classList.toggle('left-0');
            nav.classList.toggle('right-0');
            nav.classList.toggle('bg-slate-900');
            nav.classList.toggle('p-6');
            nav.classList.toggle('rounded-lg');
            nav.classList.toggle('mt-2');
            nav.classList.toggle('flex-col');
            nav.classList.toggle('space-y-4');
            nav.classList.toggle('space-y-reverse');
            nav.classList.toggle('space-x-8');
            nav.classList.toggle('space-x-reverse');
        });
    }
});
