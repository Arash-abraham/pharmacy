// داده‌ها و حالت‌ها
const adminData = {
    currentPage: 'adminDashboard',
    notifications: [
        { id: 1, type: 'success', title: 'فروش جدید', message: 'یک فروش جدید ثبت شد', time: '۲ دقیقه پیش' },
        { id: 2, type: 'info', title: 'کاربر جدید', message: 'کاربر جدید ثبت نام کرد', time: '۱۵ دقیقه پیش' },
        { id: 3, type: 'warning', title: 'خطای سیستم', message: 'یک خطای کوچک در سیستم رخ داد', time: '۱ ساعت پیش' }
    ],
    products: [
        { id: 1, name: 'قالب فروشگاهی لوکس', category: 'قالب وب', price: 129000, sales: 245, rating: 4.8, status: 'active' },
        { id: 2, name: 'کیت افکت‌های صوتی', category: 'افکت صوتی', price: 89000, sales: 128, rating: 4.5, status: 'pending' },
        { id: 3, name: 'پک آیکون مدرن', category: 'گرافیک', price: 159000, sales: 321, rating: 4.9, status: 'active' }
    ]
};

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    initializeAdminPanel();
    setupCharts();
    setupEventListeners();
});

// مقداردهی اولیه پنل ادمین
function initializeAdminPanel() {
    // تنظیم نوار پیشرفت
    setupProgressBar();
    
    // تنظیم تاریخ و ساعت
    updateDateTime();
    setInterval(updateDateTime, 60000);
}

// تنظیم نمودارها - به صورت سالانه
function setupCharts() {
    // ماه‌های فارسی
    const persianMonths = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
    
    // نمودار درآمد سالانه
    const revenueCtx = document.getElementById('revenueChart')?.getContext('2d');
    if (revenueCtx) {
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: persianMonths,
                datasets: [{
                    label: 'درآمد (میلیون تومان)',
                    data: [45, 52, 48, 60, 65, 70, 68, 75, 80, 85, 90, 95],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#10b981',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn',
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        titleColor: '#cbd5e1',
                        bodyColor: '#cbd5e1',
                        borderColor: '#10b981',
                        borderWidth: 1,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${context.parsed.y}M`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            },
                            callback: function(value) {
                                return value + 'M';
                            }
                        },
                        title: {
                            display: true,
                            text: 'میلیون تومان',
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn',
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        },
                        title: {
                            display: true,
                            text: 'ماه‌های سال ۱۴۰۲',
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn',
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    }

    // نمودار کاربران سالانه
    const usersCtx = document.getElementById('usersChart')?.getContext('2d');
    if (usersCtx) {
        new Chart(usersCtx, {
            type: 'bar',
            data: {
                labels: persianMonths,
                datasets: [{
                    label: 'کاربران جدید',
                    data: [320, 380, 420, 480, 520, 580, 620, 680, 720, 780, 820, 880],
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderColor: '#3b82f6',
                    borderWidth: 1,
                    borderRadius: 6,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        titleColor: '#cbd5e1',
                        bodyColor: '#cbd5e1',
                        borderColor: '#3b82f6',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        },
                        title: {
                            display: true,
                            text: 'تعداد کاربران',
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn',
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        },
                        title: {
                            display: true,
                            text: 'ماه‌های سال ۱۴۰۲',
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn',
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    }

    // نمودار فروش ماهانه سالانه
    const monthlySalesCtx = document.getElementById('monthlySalesChart')?.getContext('2d');
    if (monthlySalesCtx) {
        new Chart(monthlySalesCtx, {
            type: 'line',
            data: {
                labels: persianMonths,
                datasets: [
                    {
                        label: 'فروش (میلیون تومان)',
                        data: [45, 52, 48, 60, 65, 70, 68, 75, 80, 85, 90, 95],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'درآمد (میلیون تومان)',
                        data: [38, 45, 42, 52, 58, 62, 60, 68, 72, 78, 82, 88],
                        borderColor: '#8b5cf6',
                        backgroundColor: 'rgba(139, 92, 246, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    }
                }
            }
        });
    }

    // نمودار تحلیلی ۳ ساله
    const analyticsCtx = document.getElementById('analyticsChart')?.getContext('2d');
    if (analyticsCtx) {
        const years = ['۱۴۰۰', '۱۴۰۱', '۱۴۰۲'];
        new Chart(analyticsCtx, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [
                    {
                        label: 'کاربران جدید',
                        data: [2840, 3250, 3880],
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: '#3b82f6',
                        borderWidth: 1
                    },
                    {
                        label: 'فروش‌ها',
                        data: [2450, 2980, 3520],
                        backgroundColor: 'rgba(16, 185, 129, 0.7)',
                        borderColor: '#10b981',
                        borderWidth: 1
                    },
                    {
                        label: 'درآمد (میلیون)',
                        data: [185, 225, 285],
                        backgroundColor: 'rgba(139, 92, 246, 0.7)',
                        borderColor: '#8b5cf6',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    }
                }
            }
        });
    }
}

// تنظیم رویدادها
function setupEventListeners() {
    // منوی موبایل
    const menuToggle = document.getElementById('menuToggle');
    const closeSidebar = document.getElementById('closeSidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebar = document.querySelector('.sidebar');

    menuToggle?.addEventListener('click', () => {
        sidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
    });

    closeSidebar?.addEventListener('click', closeMobileMenu);
    sidebarOverlay?.addEventListener('click', closeMobileMenu);

    function closeMobileMenu() {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    }

    // تغییر صفحات
    document.querySelectorAll('.sidebar-item[data-page]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const pageId = this.getAttribute('data-page');
            showPage(pageId);
            closeMobileMenu();
        });
    });

    // Dropdown ها
    setupDropdowns();

    // جستجو
    const searchInput = document.getElementById('searchInput');
    searchInput?.addEventListener('input', function() {
        if (this.value.length >= 2) {
            // جستجو انجام شود
            console.log('جستجو برای:', this.value);
        }
    });

    // دکمه خروج
    document.getElementById('logoutBtn')?.addEventListener('click', function() {
        showConfirmModal('خروج از سیستم', 'آیا از خروج از پنل مدیریت مطمئن هستید؟', function() {
            showNotification('خروج موفق', 'شما با موفقیت از پنل خارج شدید.', 'success');
            // در اینجا می‌توانید کاربر را به صفحه لاگین هدایت کنید
        });
    });

    // تب‌های تنظیمات
    document.querySelectorAll('.tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            switchTab(tabId);
        });
    });

    // ذخیره تنظیمات
    document.getElementById('saveSettings')?.addEventListener('click', function() {
        showNotification('ذخیره تنظیمات', 'تنظیمات با موفقیت ذخیره شدند.', 'success');
    });

    // افزودن کاربر
    document.getElementById('addUserBtn')?.addEventListener('click', function() {
        showUserModal();
    });

    // افزودن فروشنده
    document.getElementById('addSellerBtn')?.addEventListener('click', function() {
        showSellerModal();
    });

    // افزودن محصول
    document.getElementById('addProductBtn')?.addEventListener('click', function() {
        showProductModal();
    });

    // افزودن دسته‌بندی
    document.getElementById('addCategoryBtn')?.addEventListener('click', function() {
        showCategoryModal();
    });

    // تنظیمات کمیسیون
    document.getElementById('commissionSettingsBtn')?.addEventListener('click', function() {
        switchTab('financial');
        showPage('settings');
    });

    // اسلایدر کمیسیون
    const commissionSlider = document.getElementById('defaultCommission');
    const commissionDisplay = document.getElementById('commissionDisplay');
    const commissionValue = document.getElementById('commissionValue');
    
    if (commissionSlider) {
        commissionSlider.addEventListener('input', function() {
            const value = this.value;
            commissionDisplay.textContent = value + '%';
            commissionValue.textContent = value + '%';
            commissionValue.style.left = value * 2 + '%';
        });
    }

    // پاک کردن لاگ‌ها
    document.getElementById('clearLogsBtn')?.addEventListener('click', function() {
        showConfirmModal('پاک کردن لاگ‌ها', 'آیا از پاک کردن تمام لاگ‌های سیستم مطمئن هستید؟', function() {
            showNotification('لاگ‌ها پاک شد', 'تمامی لاگ‌های سیستم با موفقیت پاک شدند.', 'success');
        });
    });

    // دانلود لاگ‌ها
    document.getElementById('downloadLogsBtn')?.addEventListener('click', function() {
        showNotification('دانلود شروع شد', 'فایل لاگ‌ها در حال دانلود است.', 'info');
    });

    // مدال
    setupModal();
}

// نمایش صفحه
function showPage(pageId) {
    // به‌روزرسانی منو
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('data-page') === pageId) {
            item.classList.add('active');
        }
    });

    // نمایش صفحه انتخاب شده
    document.querySelectorAll('.page-content').forEach(page => {
        page.classList.remove('active');
    });
    
    const targetPage = document.getElementById(pageId);
    if (targetPage) {
        targetPage.classList.add('active');
        adminData.currentPage = pageId;
        
        // اسکرول به بالا
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // اگر صفحه گزارش‌ها بود، نمودارها را به‌روزرسانی کن
        if (pageId === 'reports') {
            setTimeout(setupCharts, 100);
        }
    }
}

// تنظیم Dropdown ها
function setupDropdowns() {
    // اعلان‌ها
    const notificationsBtn = document.getElementById('notificationsBtn');
    const notificationsMenu = document.getElementById('notificationsMenu');

    notificationsBtn?.addEventListener('click', function(e) {
        e.stopPropagation();
        notificationsMenu.classList.toggle('active');
    });

    // پیام‌ها
    const messagesBtn = document.getElementById('messagesBtn');
    const messagesMenu = document.getElementById('messagesMenu');

    messagesBtn?.addEventListener('click', function(e) {
        e.stopPropagation();
        messagesMenu.classList.toggle('active');
    });

    // منوی کاربر
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userMenu = document.getElementById('userMenu');

    userMenuBtn?.addEventListener('click', function(e) {
        e.stopPropagation();
        userMenu.classList.toggle('active');
    });

    // بستن dropdown ها با کلیک خارج
    document.addEventListener('click', function() {
        notificationsMenu?.classList.remove('active');
        messagesMenu?.classList.remove('active');
        userMenu?.classList.remove('active');
    });

    // جلوگیری از بسته شدن dropdown با کلیک داخل
    [notificationsMenu, messagesMenu, userMenu].forEach(menu => {
        menu?.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
}

// نمایش اعلان
function showNotification(title, message, type = 'info') {
    const notificationPopup = document.getElementById('notificationPopup');
    const notificationTitle = document.getElementById('notificationTitle');
    const notificationMessage = document.getElementById('notificationMessage');
    
    if (!notificationPopup || !notificationTitle || !notificationMessage) return;

    // تنظیم نوع اعلان
    const alert = notificationPopup.querySelector('.alert');
    alert.className = 'alert';
    
    switch(type) {
        case 'success':
            alert.classList.add('alert-success');
            break;
        case 'warning':
            alert.classList.add('alert-warning');
            break;
        case 'danger':
            alert.classList.add('alert-danger');
            break;
        default:
            alert.classList.add('alert-info');
    }

    // تنظیم محتوا
    notificationTitle.textContent = title;
    notificationMessage.textContent = message;

    // نمایش اعلان
    notificationPopup.classList.add('show');

    // بستن خودکار بعد از 5 ثانیه
    setTimeout(() => {
        notificationPopup.classList.remove('show');
    }, 5000);
}

// تنظیم مدال
function setupModal() {
    const modalOverlay = document.getElementById('modalOverlay');
    const modalClose = document.getElementById('modalClose');
    const modalCancel = document.getElementById('modalCancel');

    modalClose?.addEventListener('click', hideModal);
    modalCancel?.addEventListener('click', hideModal);
    modalOverlay?.addEventListener('click', function(e) {
        if (e.target === modalOverlay) {
            hideModal();
        }
    });
}

// نمایش مدال
function showModal(title, content, onConfirm = null) {
    const modalOverlay = document.getElementById('modalOverlay');
    const modalTitle = document.getElementById('modalTitle');
    const modalBody = document.getElementById('modalBody');
    const modalConfirm = document.getElementById('modalConfirm');

    if (!modalOverlay || !modalTitle || !modalBody || !modalConfirm) return;

    modalTitle.textContent = title;
    modalBody.innerHTML = content;
    
    if (onConfirm) {
        modalConfirm.onclick = function() {
            onConfirm();
            hideModal();
        };
    }

    modalOverlay.classList.add('active');
}

// پنهان کردن مدال
function hideModal() {
    const modalOverlay = document.getElementById('modalOverlay');
    modalOverlay?.classList.remove('active');
}

// نمایش مدال تایید
function showConfirmModal(title, message, onConfirm) {
    const content = `
        <div class="text-center py-4">
            <i class="fas fa-question-circle text-4xl text-amber-500 mb-4"></i>
            <p class="text-lg text-white mb-2">${title}</p>
            <p class="text-slate-300">${message}</p>
        </div>
    `;
    
    showModal(title, content, onConfirm);
}

// نمایش مدال کاربر
function showUserModal() {
    const content = `
        <div class="space-y-4">
            <div>
                <label class="block text-slate-300 mb-2">نام کامل</label>
                <input type="text" class="form-input" placeholder="نام و نام خانوادگی">
            </div>
            <div>
                <label class="block text-slate-300 mb-2">ایمیل</label>
                <input type="email" class="form-input" placeholder="example@email.com">
            </div>
            <div>
                <label class="block text-slate-300 mb-2">نوع کاربر</label>
                <select class="form-select">
                    <option>کاربر عادی</option>
                    <option>فروشنده</option>
                    <option>مدیر</option>
                </select>
            </div>
            <div>
                <label class="block text-slate-300 mb-2">رمز عبور</label>
                <input type="password" class="form-input" placeholder="رمز عبور">
            </div>
        </div>
    `;
    
    showModal('افزودن کاربر جدید', content, function() {
        showNotification('موفقیت', 'کاربر جدید با موفقیت اضافه شد.', 'success');
    });
}

// نمایش مدال فروشنده
function showSellerModal() {
    const content = `
        <div class="space-y-4">
            <div>
                <label class="block text-slate-300 mb-2">نام فروشگاه</label>
                <input type="text" class="form-input" placeholder="نام فروشگاه">
            </div>
            <div>
                <label class="block text-slate-300 mb-2">توضیحات فروشگاه</label>
                <textarea class="form-input" rows="3" placeholder="توضیحات فروشگاه"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-slate-300 mb-2">مالک فروشگاه</label>
                    <select class="form-select">
                        <option value="">انتخاب کاربر</option>
                        <option value="1">علی محمدی</option>
                        <option value="2">مریم حسینی</option>
                        <option value="3">رضا کریمی</option>
                    </select>
                </div>
                <div>
                    <label class="block text-slate-300 mb-2">دسته‌بندی</label>
                    <select class="form-select">
                        <option>قالب وبسایت</option>
                        <option>افکت صوتی</option>
                        <option>گرافیک و طرح</option>
                        <option>ویدئو و انیمیشن</option>
                    </select>
                </div>
            </div>
        </div>
    `;
    
    showModal('افزودن فروشنده جدید', content, function() {
        showNotification('موفقیت', 'فروشنده جدید با موفقیت اضافه شد.', 'success');
    });
}

// نمایش مدال محصول
function showProductModal() {
    const content = `
        <div class="space-y-4">
            <div>
                <label class="block text-slate-300 mb-2">نام محصول</label>
                <input type="text" class="form-input" placeholder="نام محصول">
            </div>
            <div>
                <label class="block text-slate-300 mb-2">توضیحات محصول</label>
                <textarea class="form-input" rows="3" placeholder="توضیحات محصول"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-slate-300 mb-2">قیمت (تومان)</label>
                    <input type="number" class="form-input" placeholder="قیمت محصول">
                </div>
                <div>
                    <label class="block text-slate-300 mb-2">دسته‌بندی</label>
                    <select class="form-select">
                        <option>قالب وبسایت</option>
                        <option>افکت صوتی</option>
                        <option>گرافیک و طرح</option>
                        <option>ویدئو و انیمیشن</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-slate-300 mb-2">فروشنده</label>
                    <select class="form-select">
                        <option>علی محمدی</option>
                        <option>مریم حسینی</option>
                        <option>رضا کریمی</option>
                    </select>
                </div>
                <div>
                    <label class="block text-slate-300 mb-2">وضعیت</label>
                    <select class="form-select">
                        <option>فعال</option>
                        <option>غیرفعال</option>
                        <option>در انتظار تایید</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-slate-300 mb-2">آپلود تصویر</label>
                <input type="file" class="form-input" accept="image/*">
            </div>
        </div>
    `;
    
    showModal('افزودن محصول جدید', content, function() {
        showNotification('موفقیت', 'محصول جدید با موفقیت اضافه شد.', 'success');
    });
}

// نمایش مدال دسته‌بندی
function showCategoryModal() {
    const content = `
        <div class="space-y-4">
            <div>
                <label class="block text-slate-300 mb-2">نام دسته‌بندی</label>
                <input type="text" class="form-input" placeholder="نام دسته‌بندی">
            </div>
            <div>
                <label class="block text-slate-300 mb-2">توضیحات</label>
                <textarea class="form-input" rows="3" placeholder="توضیحات دسته‌بندی"></textarea>
            </div>
            <div>
                <label class="block text-slate-300 mb-2">آیکون</label>
                <select class="form-select">
                    <option value="fa-code">کد</option>
                    <option value="fa-music">موسیقی</option>
                    <option value="fa-palette">گرافیک</option>
                    <option value="fa-video">ویدئو</option>
                    <option value="fa-plug">پلاگین</option>
                </select>
            </div>
            <div>
                <label class="block text-slate-300 mb-2">رنگ</label>
                <select class="form-select">
                    <option value="purple">بنفش</option>
                    <option value="blue">آبی</option>
                    <option value="green">سبز</option>
                    <option value="red">قرمز</option>
                    <option value="yellow">زرد</option>
                </select>
            </div>
        </div>
    `;
    
    showModal('افزودن دسته‌بندی جدید', content, function() {
        showNotification('موفقیت', 'دسته‌بندی جدید با موفقیت اضافه شد.', 'success');
    });
}

// تغییر تب
function switchTab(tabId) {
    // به‌روزرسانی تب فعال
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
        if (tab.getAttribute('data-tab') === tabId) {
            tab.classList.add('active');
        }
    });

    // نمایش محتوای تب
    document.querySelectorAll('.tab-content').forEach(content => {
        content.style.display = 'none';
        if (content.id === tabId + 'Tab') {
            content.style.display = 'block';
        }
    });
}

// تنظیم نوار پیشرفت
function setupProgressBar() {
    const progressBar = document.getElementById('progressBar');
    
    window.addEventListener('scroll', function() {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        
        if (progressBar) {
            progressBar.style.width = scrolled + '%';
        }
    });
}

// به‌روزرسانی تاریخ و ساعت
function updateDateTime() {
    // در صورت نیاز می‌توانید تاریخ و ساعت را در جایی نمایش دهید
    const now = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    const persianDate = now.toLocaleDateString('fa-IR', options);
    // console.log(persianDate);
}

// بستن اعلان
document.getElementById('closeNotification')?.addEventListener('click', function() {
    document.getElementById('notificationPopup').classList.remove('show');
});

// نمایش صفحه پیش‌فرض
showPage('adminDashboard');
