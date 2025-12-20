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
    
    // مشاهده عناصر برای انیمیشن
    document.querySelectorAll('.stagger-animation > *').forEach(el => {
        observer.observe(el);
    });
    
    // مدیریت سبد خرید (فقط نمایش/مخفی)
    const cartButton = document.getElementById('cartButton');
    const cartDropdown = document.querySelector('.cart-dropdown');
    
    if (cartButton && cartDropdown) {
        // باز و بسته کردن سبد خرید با کلیک
        cartButton.addEventListener('click', function(e) {
            e.stopPropagation();
            cartDropdown.classList.toggle('active');
        });
        
        // بستن سبد خرید با کلیک بیرون
        document.addEventListener('click', function(e) {
            if (!cartButton.contains(e.target) && !cartDropdown.contains(e.target)) {
                cartDropdown.classList.remove('active');
            }
        });
    }
    
    // مدیریت مودال جستجو
    const searchButton = document.getElementById('searchButton');
    const searchModal = document.getElementById('searchModal');
    const searchClose = document.getElementById('searchClose');
    const searchInput = document.getElementById('searchInput');
    
    if (searchButton && searchModal) {
        // باز کردن مودال جستجو
        searchButton.addEventListener('click', function() {
            searchModal.classList.add('active');
            setTimeout(() => {
                if (searchInput) searchInput.focus();
            }, 100);
        });
        
        // بستن مودال جستجو
        if (searchClose) {
            searchClose.addEventListener('click', function() {
                searchModal.classList.remove('active');
            });
        }
        
        // بستن مودال با کلید Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchModal.classList.contains('active')) {
                searchModal.classList.remove('active');
            }
        });
        
        // بستن مودال با کلیک بیرون
        searchModal.addEventListener('click', function(e) {
            if (e.target === searchModal) {
                searchModal.classList.remove('active');
            }
        });
    }
    
    // جستجوی ساده
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const searchResults = document.getElementById('searchResults');
            
            if (searchTerm.length === 0) {
                // نمایش پیشنهادهای اولیه
                searchResults.innerHTML = `
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
                `;
                return;
            }
            
            // نمونه فایل‌های تستی
            const testItems = [
                { title: "قالب فروشگاهی React پیشرفته", desc: "قالب کامل فروشگاهی با امکانات مدرن و ریسپانسیو", price: "120,000 تومان" },
                { title: "پکیج UI/UX کامل", desc: "مجموعه کامل المان‌های طراحی رابط کاربری", price: "95,000 تومان" },
                { title: "آموزش React Native از صفر", desc: "دوره کامل آموزش React Native به زبان فارسی", price: "180,000 تومان" },
                { title: "سیستم مدیریت محتوا", desc: "CMS کامل با پنل مدیریت پیشرفته", price: "320,000 تومان" },
                { title: "اپلیکیشن فروشگاهی Flutter", desc: "اپلیکیشن فروشگاهی کامل با Flutter و Firebase", price: "250,000 تومان" },
                { title: "پک موشن گرافیک", desc: "انیمیشن‌های آماده برای پروژه‌های ویدئویی", price: "75,000 تومان" },
                { title: "آموزش Node.js پیشرفته", desc: "آموزش جامع Node.js از مقدماتی تا پیشرفته", price: "140,000 تومان" }
            ];
            
            // فیلتر کردن بر اساس جستجو
            const filteredItems = testItems.filter(item => 
                item.title.toLowerCase().includes(searchTerm) || 
                item.desc.toLowerCase().includes(searchTerm)
            );
            
            // نمایش نتایج
            if (filteredItems.length > 0) {
                let resultsHTML = `<h3 class="text-xl font-bold mb-4">${filteredItems.length} نتیجه یافت شد:</h3>`;
                filteredItems.forEach(item => {
                    resultsHTML += `
                        <div class="search-result-item">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="font-bold text-lg mb-1">${item.title}</h4>
                                    <p class="text-slate-400 text-sm">${item.desc}</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-lg font-bold ml-4">${item.price}</span>
                                    <i class="fas fa-arrow-left text-slate-500"></i>
                                </div>
                            </div>
                        </div>
                    `;
                });
                searchResults.innerHTML = resultsHTML;
            } else {
                searchResults.innerHTML = `
                    <div class="text-center py-8">
                        <i class="fas fa-search text-4xl text-slate-500 mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">نتیجه‌ای یافت نشد</h3>
                        <p class="text-slate-400">لطفاً عبارت جستجوی خود را تغییر دهید</p>
                    </div>
                `;
            }
        });
    }
    
    // کلیک روی تگ‌های جستجو
    document.querySelectorAll('.search-tag').forEach(tag => {
        tag.addEventListener('click', function() {
            if (searchInput) {
                searchInput.value = this.textContent;
                searchInput.dispatchEvent(new Event('input'));
                searchInput.focus();
            }
        });
    });
    
    // باز و بسته کردن سوالات متداول
    const faqItems = document.querySelectorAll('.glass.rounded-2xl.p-6.mb-6.card-hover, .glass.rounded-2xl.p-6.card-hover');
    faqItems.forEach(item => {
        const header = item.querySelector('.flex.justify-between.items-center');
        const content = item.querySelector('.mt-4');
        
        if (header && content) {
            header.addEventListener('click', () => {
                const isHidden = content.classList.contains('hidden');
                
                // بستن همه آیتم‌ها
                faqItems.forEach(otherItem => {
                    const otherContent = otherItem.querySelector('.mt-4');
                    if (otherContent) {
                        otherContent.classList.add('hidden');
                        const icon = otherItem.querySelector('.fa-chevron-down');
                        if (icon) {
                            icon.classList.remove('fa-chevron-up');
                            icon.classList.add('fa-chevron-down');
                        }
                    }
                });
                
                // باز کردن آیتم فعلی اگر بسته بود
                if (isHidden) {
                    content.classList.remove('hidden');
                    const icon = header.querySelector('.fa-chevron-down');
                    if (icon) {
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    }
                }
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
            nav.classList.toggle('space-x-8');
            nav.classList.toggle('space-x-reverse');
        });
    }
    
    // افکت ریپل برای دکمه‌های افزودن به سبد خرید
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // افکت ریپل
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
            
            // نمایش پیام موفقیت
            showNotification('محصول به سبد خرید اضافه شد!');
        });
    });
    
    // تابع نمایش نوتیفیکیشن
    function showNotification(message) {
        // ایجاد عنصر نوتیفیکیشن
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 left-6 bg-emerald-600 text-white px-4 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle ml-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // نمایش نوتیفیکیشن
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);
        
        // مخفی کردن نوتیفیکیشن بعد از 3 ثانیه
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
});
