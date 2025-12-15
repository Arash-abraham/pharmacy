// حالت‌های مختلف کاربر
const USER_STATES = {
    NOT_LOGGED_IN: 'not_logged_in',
    LOGGED_IN_NOT_PURCHASED: 'logged_in_not_purchased',
    AUTHORIZED: 'authorized'
};

// حالت فعلی کاربر (می‌توانید این را تغییر دهید)
let currentUserState = USER_STATES.NOT_LOGGED_IN;

document.addEventListener('DOMContentLoaded', function() {
    // نوار پیشرفت اسکرول
    window.addEventListener('scroll', function() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById('progressBar').style.width = scrolled + '%';
    });
    
    // انیمیشن اسکرول
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.stagger-animation > *').forEach(el => {
        observer.observe(el);
    });
    
    // گالری تصاویر
    const thumbnails = document.querySelectorAll('.gallery-thumb');
    const mainImage = document.getElementById('mainImage');
    
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const imgSrc = this.querySelector('img').src;
            mainImage.src = imgSrc;
        });
    });
    
    // سیستم تب‌ها
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            this.classList.add('active');
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
            
            // اگر تب دانلود انتخاب شد، وضعیت کاربر را بروزرسانی کن
            if (tabId === 'download') {
                updateDownloadSection();
            }
        });
    });
    
    // سیستم امتیازدهی
    const ratingStars = document.querySelectorAll('.rating-star');
    let currentRating = 0;
    
    ratingStars.forEach(star => {
        star.addEventListener('mouseover', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            highlightStars(rating);
        });
        
        star.addEventListener('mouseout', function() {
            highlightStars(currentRating);
        });
        
        star.addEventListener('click', function() {
            currentRating = parseInt(this.getAttribute('data-rating'));
            highlightStars(currentRating);
        });
    });
    
    function highlightStars(rating) {
        ratingStars.forEach(star => {
            star.classList.remove('active', 'hovered');
            const starRating = parseInt(star.getAttribute('data-rating'));
            
            if (starRating <= rating) {
                star.classList.add('active');
            }
        });
    }
    
    // دکمه‌های خرید
    const addToCartBtn = document.getElementById('addToCart');
    const buyNowBtn = document.getElementById('buyNow');
    
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-emerald-600' : 'bg-indigo-600';
        
        notification.className = `fixed top-24 left-6 ${bgColor} text-white px-4 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle ml-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function() {
            showNotification('محصول به سبد خرید اضافه شد!');
        });
    }
    
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function() {
            showNotification('در حال انتقال به صفحه پرداخت...', 'info');
            // بعد از خرید موفق، وضعیت کاربر را تغییر دهید
            setTimeout(() => {
                currentUserState = USER_STATES.AUTHORIZED;
                updateDownloadSection();
                showNotification('خرید با موفقیت انجام شد! اکنون می‌توانید فایل‌ها را دانلود کنید.');
            }, 2000);
        });
    }
    
    // دکمه ورود
    const loginButton = document.getElementById('loginButton');
    const loginToDownload = document.getElementById('loginToDownload');
    
    function handleLogin() {
        showNotification('در حال ورود به حساب کاربری...', 'info');
        setTimeout(() => {
            currentUserState = USER_STATES.LOGGED_IN_NOT_PURCHASED;
            updateDownloadSection();
            showNotification('با موفقیت وارد شدید!');
        }, 1500);
    }
    
    if (loginButton) {
        loginButton.addEventListener('click', handleLogin);
    }
    
    if (loginToDownload) {
        loginToDownload.addEventListener('click', handleLogin);
    }
    
    // دکمه خرید در بخش دانلود
    const buyToDownload = document.getElementById('buyToDownload');
    if (buyToDownload) {
        buyToDownload.addEventListener('click', function() {
            showNotification('در حال انتقال به صفحه پرداخت...', 'info');
            setTimeout(() => {
                currentUserState = USER_STATES.AUTHORIZED;
                updateDownloadSection();
                showNotification('خرید با موفقیت انجام شد! اکنون می‌توانید فایل‌ها را دانلود کنید.');
            }, 2000);
        });
    }
    
    // تابع بروزرسانی بخش دانلود
    function updateDownloadSection() {
        const statusNotLoggedIn = document.getElementById('statusNotLoggedIn');
        const statusNotPurchased = document.getElementById('statusNotPurchased');
        const statusAuthorized = document.getElementById('statusAuthorized');
        const downloadFiles = document.getElementById('downloadFiles');
        
        // ابتدا همه را مخفی کن
        if (statusNotLoggedIn) statusNotLoggedIn.style.display = 'none';
        if (statusNotPurchased) statusNotPurchased.style.display = 'none';
        if (statusAuthorized) statusAuthorized.style.display = 'none';
        if (downloadFiles) downloadFiles.style.display = 'none';
        
        // بر اساس وضعیت کاربر، بخش مناسب را نمایش بده
        switch(currentUserState) {
            case USER_STATES.NOT_LOGGED_IN:
                if (statusNotLoggedIn) statusNotLoggedIn.style.display = 'flex';
                break;
                
            case USER_STATES.LOGGED_IN_NOT_PURCHASED:
                if (statusNotPurchased) statusNotPurchased.style.display = 'flex';
                break;
                
            case USER_STATES.AUTHORIZED:
                if (statusAuthorized) statusAuthorized.style.display = 'flex';
                if (downloadFiles) downloadFiles.style.display = 'block';
                break;
        }
    }
    
    // دکمه‌های دانلود فایل
    const downloadFileButtons = document.querySelectorAll('.download-file-btn');
    downloadFileButtons.forEach(button => {
        button.addEventListener('click', function() {
            const fileType = this.getAttribute('data-file');
            simulateDownload(fileType);
        });
    });
    
    // شبیه‌سازی دانلود
    function simulateDownload(fileType) {
        const fileNames = {
            'main': 'فایل اصلی پروژه',
            'docs': 'مستندات کامل محصول',
            'graphics': 'فایل‌های گرافیکی و آیکون‌ها',
            'components': 'کامپوننت‌های اضافی'
        };
        
        const fileSize = {
            'main': '45.2 MB',
            'docs': '3.1 MB',
            'graphics': '15.7 MB',
            'components': '8.3 MB'
        };
        
        const fileName = fileNames[fileType] || 'فایل محصول';
        const size = fileSize[fileType] || '-- MB';
        
        showNotification(`شروع دانلود ${fileName}...`, 'info');
        
        // نمایش پیش‌رفت دانلود
        document.getElementById('downloadingFile').textContent = `${fileName} (${size})`;
        const progressBar = document.getElementById('downloadProgressBar');
        const progressText = document.getElementById('downloadProgressText');
        const downloadSpeed = document.getElementById('downloadSpeed');
        const downloadTime = document.getElementById('downloadTime');
        
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 10;
            if (progress > 100) progress = 100;
            
            progressBar.style.width = progress + '%';
            progressText.textContent = Math.round(progress) + '%';
            
            // شبیه‌سازی سرعت و زمان باقی‌مانده
            const speed = (5 + Math.random() * 3).toFixed(1);
            const time = Math.round((100 - progress) / speed);
            
            downloadSpeed.textContent = speed + ' MB/s';
            downloadTime.textContent = time + ' ثانیه';
            
            if (progress >= 100) {
                clearInterval(interval);
                showNotification(`دانلود ${fileName} با موفقیت انجام شد!`);
                
                // ریست پیش‌رفت بعد از 3 ثانیه
                setTimeout(() => {
                    progressBar.style.width = '0%';
                    progressText.textContent = '۰٪';
                    downloadSpeed.textContent = '--';
                    downloadTime.textContent = '--';
                }, 3000);
            }
        }, 200);
    }
    
    // پشتیبانی آنلاین
    const supportBadge = document.getElementById('supportBadge');
    if (supportBadge) {
        supportBadge.addEventListener('click', function() {
            showNotification('اتصال به پشتیبانی آنلاین...', 'info');
        });
    }
    
    // کپی کد
    const copyButtons = document.querySelectorAll('.copy-code-btn');
    copyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const code = this.closest('.code-preview').querySelector('code').textContent;
            navigator.clipboard.writeText(code)
                .then(() => {
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check"></i>';
                    showNotification('کد با موفقیت کپی شد!');
                    
                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                    }, 2000);
                });
        });
    });
    
    // پاسخ به کامنت‌ها
    const replyButtons = document.querySelectorAll('.comment-item button:last-child');
    replyButtons.forEach(button => {
        if (button.textContent.includes('پاسخ')) {
            button.addEventListener('click', function() {
                const commentItem = this.closest('.comment-item');
                const replyForm = document.createElement('div');
                replyForm.className = 'mr-8 mt-4 bg-slate-800/30 rounded-xl p-4';
                replyForm.innerHTML = `
                    <div class="mb-4">
                        <textarea class="w-full bg-slate-800/50 border border-slate-700 rounded-lg p-4 text-white placeholder-slate-500" 
                                  rows="3" 
                                  placeholder="پاسخ خود را بنویسید..."></textarea>
                    </div>
                    <div class="flex justify-end space-x-3 space-x-reverse">
                        <button class="text-slate-400 hover:text-white transition-colors text-sm cancel-reply">
                            لغو
                        </button>
                        <button class="primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 px-4 py-2 rounded-lg text-sm font-medium">
                            ثبت پاسخ
                        </button>
                    </div>
                `;
                
                commentItem.appendChild(replyForm);
                
                replyForm.querySelector('.cancel-reply').addEventListener('click', function() {
                    replyForm.remove();
                });
            });
        }
    });
    
    // مدیریت responsive منو
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
        });
    }
    
    // حالت اولیه را تنظیم کن
    updateDownloadSection();
});
