document.addEventListener('DOMContentLoaded', function() {
    // نوار پیشرفت اسکرول
    window.addEventListener('scroll', function() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById('progressBar').style.width = scrolled + '%';
    });
    
    // مدیریت منوی موبایل
    const menuToggle = document.getElementById('menuToggle');
    const closeSidebar = document.getElementById('closeSidebar');
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
        });
    }
    
    if (closeSidebar) {
        closeSidebar.addEventListener('click', function() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
    }
    
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
    }
    
    // مدیریت صفحات
    const pageLinks = document.querySelectorAll('[data-page]');
    const pageContents = document.querySelectorAll('.page-content');
    const pageTitle = document.getElementById('pageTitle');
    
    // عناوین صفحات
    const pageTitles = {
        'dashboard': 'داشبورد',
        'myFiles': 'فایل‌های من',
        'upload': 'آپلود فایل',
        'shared': 'اشتراک‌گذاری',
        'favorites': 'علاقه‌مندی‌ها',
        'wallet': 'کیف پول',
        'transactions': 'تراکنش‌ها',
        'purchases': 'خریدهای من',
        'sales': 'فروش‌های من',
        'profile': 'پروفایل',
        'security': 'امنیت و رمز عبور',
        'notifications': 'اعلان‌ها',
        'settings': 'تنظیمات'
    };
    
    // تغییر صفحه
    function changePage(pageId) {
        // مخفی کردن همه صفحات
        pageContents.forEach(content => {
            content.classList.remove('active');
        });
        
        // نمایش صفحه انتخاب شده
        const targetPage = document.getElementById(pageId);
        if (targetPage) {
            targetPage.classList.add('active');
        }
        
        // به‌روزرسانی عنوان صفحه
        if (pageTitles[pageId]) {
            pageTitle.textContent = pageTitles[pageId];
        }
        
        // به‌روزرسانی منوی فعال
        pageLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('data-page') === pageId) {
                link.classList.add('active');
            }
        });
        
        // بستن منوی موبایل
        if (window.innerWidth < 768) {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        }
        
        // اسکرول به بالای صفحه
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    // رویداد کلیک روی لینک‌های صفحه
    pageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const pageId = this.getAttribute('data-page');
            changePage(pageId);
        });
    });
    
    // مدیریت مودال خروج
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutModal = document.getElementById('logoutModal');
    const confirmLogout = document.getElementById('confirmLogout');
    const cancelLogout = document.getElementById('cancelLogout');
    
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            logoutModal.classList.add('active');
        });
    }
    
    if (confirmLogout) {
        confirmLogout.addEventListener('click', function() {
            // در اینجا کد خروج از حساب کاربری قرار می‌گیرد
            alert('شما با موفقیت از حساب کاربری خارج شدید.');
            logoutModal.classList.remove('active');
            // ریدایرکت به صفحه اصلی
            window.location.href = '#';
        });
    }
    
    if (cancelLogout) {
        cancelLogout.addEventListener('click', function() {
            logoutModal.classList.remove('active');
        });
    }
    
    // بستن مودال با کلیک بیرون
    logoutModal.addEventListener('click', function(e) {
        if (e.target === logoutModal) {
            logoutModal.classList.remove('active');
        }
    });
    
    // مدیریت آپلود فایل
    const dropZone = document.getElementById('dropZone');
    const selectFilesBtn = document.getElementById('selectFilesBtn');
    const fileInput = document.getElementById('fileInput');
    const fileInfoForm = document.getElementById('fileInfoForm');
    
    if (dropZone && fileInput) {
        // کشیدن و رها کردن
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--primary)';
            this.style.backgroundColor = 'rgba(99, 102, 241, 0.1)';
        });
        
        dropZone.addEventListener('dragleave', function() {
            this.style.borderColor = '';
            this.style.backgroundColor = '';
        });
        
        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '';
            this.style.backgroundColor = '';
            
            if (e.dataTransfer.files.length) {
                handleFileSelect(e.dataTransfer.files);
            }
        });
        
        // انتخاب فایل با دکمه
        if (selectFilesBtn) {
            selectFilesBtn.addEventListener('click', function() {
                fileInput.click();
            });
        }
        
        // انتخاب فایل با اینپوت
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length) {
                handleFileSelect(e.target.files);
            }
        });
        
        // تابع مدیریت فایل‌های انتخاب شده
        function handleFileSelect(files) {
            console.log('فایل‌های انتخاب شده:', files);
            
            // نمایش فرم اطلاعات فایل
            if (fileInfoForm) {
                fileInfoForm.classList.remove('hidden');
                
                // اسکرول به فرم
                fileInfoForm.scrollIntoView({ behavior: 'smooth' });
            }
            
            // نمایش پیام موفقیت
            showNotification(`${files.length} فایل انتخاب شد`);
        }
    }
    
    // نمایش نوتیفیکیشن
    function showNotification(message, type = 'success') {
        const colors = {
            'success': 'bg-emerald-600',
            'error': 'bg-red-600',
            'info': 'bg-blue-600',
            'warning': 'bg-amber-600'
        };
        
        const notification = document.createElement('div');
        notification.className = `fixed top-24 right-6 ${colors[type]} text-white px-4 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} ml-2"></i>
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
                if (notification.parentNode) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
    
    // نمایش/مخفی کردن رمز عبور
    document.querySelectorAll('.fa-eye').forEach(icon => {
        icon.addEventListener('click', function() {
            const input = this.closest('.relative').querySelector('input');
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
    
    // مقداردهی اولیه
    console.log('پنل کاربری فایل استور با تمام صفحات آماده است!');
});
