// داده‌ها و حالت‌ها
const adminProfileData = {
    currentPage: 'adminProfile',
    currentTab: 'profile',
    adminStats: {
        totalAdmins: 8,
        onlineAdmins: 3,
        activeAdmins: 7,
        blockedAdmins: 1
    },
    activityLogs: [
        { id: 1, time: '۱۰:۳۰ امروز', action: 'ورود به سیستم', details: 'ورود موفق از مرورگر Chrome', ip: '192.168.1.100', status: 'success' },
        { id: 2, time: '۱۰:۴۵ امروز', action: 'ویرایش کاربر', details: 'ویرایش اطلاعات کاربر USR-001', ip: '192.168.1.100', status: 'success' },
        { id: 3, time: '۱۱:۲۰ امروز', action: 'تایید تراکنش', details: 'تایید تراکنش TX-789123', ip: '192.168.1.100', status: 'success' }
    ],
    adminList: [
        { id: 'ADM-001', name: 'مدیر کل', role: 'سوپر ادمین', email: 'admin@filestore.ir', lastLogin: 'امروز - ۱۰:۳۰', status: 'active', online: true },
        { id: 'ADM-002', name: 'مریم حسینی', role: 'ادمین مالی', email: 'finance@filestore.ir', lastLogin: 'امروز - ۰۹:۱۵', status: 'active', online: true },
        { id: 'ADM-003', name: 'رضا کریمی', role: 'مدیر محتوا', email: 'content@filestore.ir', lastLogin: 'دیروز - ۱۴:۲۰', status: 'active', online: false }
    ]
};

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    initializeAdminProfilePanel();
    setupEventListeners();
    showPage('adminProfile');
});

// مقداردهی اولیه پنل پروفایل ادمین
function initializeAdminProfilePanel() {
    // تنظیم نوار پیشرفت
    setupProgressBar();
    
    // بارگذاری آمار
    updateAdminStats();
    
    // بارگذاری فعالیت‌های اخیر
    loadActivityLogs();
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
            
            // به‌روزرسانی منوی فعال
            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

    // دکمه پروفایل
    document.getElementById('profileBtn')?.addEventListener('click', function(e) {
        e.preventDefault();
        showPage('adminProfile');
    });

    // تب‌های پروفایل
    document.querySelectorAll('#adminProfile .tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            switchProfileTab(tabId);
        });
    });

    // ذخیره پروفایل
    document.getElementById('saveProfileBtn')?.addEventListener('click', function() {
        showNotification('ذخیره پروفایل', 'اطلاعات پروفایل با موفقیت به‌روزرسانی شد.', 'success');
    });

    // تغییر رمز عبور
    document.getElementById('changePasswordBtn')?.addEventListener('click', function() {
        showNotification('تغییر رمز عبور', 'رمز عبور با موفقیت تغییر کرد.', 'success');
    });

    // تغییر آواتار
    document.getElementById('changeAvatarBtn')?.addEventListener('click', function() {
        showConfirmModal('تغییر آواتار', 'آیا مایل به تغییر تصویر پروفایل هستید؟', function() {
            // در اینجا منطق آپلود تصویر پیاده‌سازی می‌شود
            showNotification('تغییر آواتار', 'تصویر پروفایل با موفقیت تغییر کرد.', 'success');
        });
    });

    // خاتمه همه نشست‌ها
    document.getElementById('terminateAllSessionsBtn')?.addEventListener('click', function() {
        showConfirmModal('خاتمه نشست‌ها', 'آیا از خاتمه دادن به همه نشست‌های فعال مطمئن هستید؟', function() {
            showNotification('خاتمه نشست‌ها', 'تمام نشست‌های غیرفعلی با موفقیت خاتمه یافتند.', 'success');
        });
    });

    // افزودن ادمین جدید
    document.getElementById('addAdminBtn')?.addEventListener('click', function() {
        showAdminModal();
    });

    // افزودن نقش جدید
    document.getElementById('addRoleBtn')?.addEventListener('click', function() {
        showRoleModal();
    });

    // دکمه خروج
    document.getElementById('logoutBtn')?.addEventListener('click', function() {
        showConfirmModal('خروج از سیستم', 'آیا از خروج از پنل مدیریت مطمئن هستید؟', function() {
            showNotification('خروج موفق', 'شما با موفقیت از پنل خارج شدید.', 'success');
            // در اینجا می‌توانید کاربر را به صفحه لاگین هدایت کنید
        });
    });

    // Dropdown منوی کاربر
    setupDropdowns();

    // جستجوی ادمین
    const adminSearch = document.getElementById('adminSearch');
    adminSearch?.addEventListener('input', function() {
        if (this.value.length >= 2) {
            searchAdmins(this.value);
        }
    });

    // مدال
    setupModal();
}

// نمایش صفحه
function showPage(pageId) {
    // نمایش صفحه انتخاب شده
    document.querySelectorAll('.page-content').forEach(page => {
        page.classList.remove('active');
    });
    
    const targetPage = document.getElementById(pageId);
    if (targetPage) {
        targetPage.classList.add('active');
        adminProfileData.currentPage = pageId;
        
        // اسکرول به بالا
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // اگر صفحه ادمین‌ها بود، اطلاعات را به‌روزرسانی کن
        if (pageId === 'admins') {
            updateAdminStats();
            loadAdminList();
        }
    }
}

// تغییر تب پروفایل
function switchProfileTab(tabId) {
    // به‌روزرسانی تب فعال
    document.querySelectorAll('#adminProfile .tab').forEach(tab => {
        tab.classList.remove('active');
        if (tab.getAttribute('data-tab') === tabId) {
            tab.classList.add('active');
        }
    });

    // نمایش محتوای تب
    document.querySelectorAll('#adminProfile .tab-content').forEach(content => {
        content.style.display = 'none';
        if (content.id === tabId + 'Tab') {
            content.style.display = 'block';
        }
    });
    
    adminProfileData.currentTab = tabId;
}

// به‌روزرسانی آمار ادمین‌ها
function updateAdminStats() {
    // در اینجا می‌توانید آمار را از سرور دریافت کنید
    const stats = adminProfileData.adminStats;
    
    // به‌روزرسانی عناصر HTML
    const statElements = {
        'totalAdmins': document.querySelector('.stat-card:nth-child(1) .text-2xl'),
        'onlineAdmins': document.querySelector('.stat-card:nth-child(2) .text-2xl'),
        'activeAdmins': document.querySelector('.stat-card:nth-child(3) .text-2xl'),
        'blockedAdmins': document.querySelector('.stat-card:nth-child(4) .text-2xl')
    };
    
    for (const [key, element] of Object.entries(statElements)) {
        if (element && stats[key]) {
            element.textContent = stats[key];
        }
    }
}

// بارگذاری لاگ فعالیت‌ها
function loadActivityLogs() {
    // در اینجا می‌توانید لاگ‌ها را از سرور دریافت کنید
    const logs = adminProfileData.activityLogs;
    
    // به‌روزرسانی جدول فعالیت‌ها
    const tbody = document.querySelector('#activityTab tbody');
    if (tbody) {
        tbody.innerHTML = '';
        
        logs.forEach(log => {
            const statusClass = log.status === 'success' ? 'badge-success' : 'badge-danger';
            const row = `
                <tr>
                    <td>${log.time}</td>
                    <td>${log.action}</td>
                    <td>${log.details}</td>
                    <td>${log.ip}</td>
                    <td><span class="badge ${statusClass}">${log.status === 'success' ? 'موفق' : 'ناموفق'}</span></td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    }
}

// بارگذاری لیست ادمین‌ها
function loadAdminList() {
    // در اینجا می‌توانید لیست ادمین‌ها را از سرور دریافت کنید
    const admins = adminProfileData.adminList;
    
    // به‌روزرسانی جدول ادمین‌ها
    const tbody = document.querySelector('#admins tbody');
    if (tbody) {
        tbody.innerHTML = '';
        
        admins.forEach(admin => {
            const statusClass = admin.status === 'active' ? 'status-success' : 
                              admin.status === 'inactive' ? 'status-warning' : 'status-danger';
            const onlineDot = admin.online ? 
                '<span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>' : 
                '<span class="w-2 h-2 bg-slate-500 rounded-full"></span>';
            
            const roleClass = admin.role === 'سوپر ادمین' ? 'role-super-admin' :
                            admin.role === 'ادمین مالی' ? 'role-admin' :
                            admin.role === 'مدیر محتوا' ? 'role-moderator' : 'role-support';
            
            const row = `
                <tr>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="user-avatar">${admin.name.split(' ').map(n => n[0]).join('')}</div>
                                ${admin.online ? '<span class="absolute bottom-0 left-0 w-3 h-3 bg-emerald-500 border-2 border-slate-900 rounded-full"></span>' : ''}
                            </div>
                            <div>
                                <p class="font-medium text-white">${admin.name}</p>
                                <p class="text-xs text-slate-400">ID: ${admin.id}</p>
                            </div>
                        </div>
                    </td>
                    <td><span class="role-badge ${roleClass}">${admin.role}</span></td>
                    <td>${admin.email}</td>
                    <td>${admin.lastLogin}</td>
                    <td>
                        <div class="flex items-center gap-2">
                            <span class="status-badge ${statusClass}">${admin.status === 'active' ? 'فعال' : 'غیرفعال'}</span>
                            ${onlineDot}
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn hover-lift" onclick="viewAdmin('${admin.id}')">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="action-btn hover-lift" onclick="editAdmin('${admin.id}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-btn action-btn-danger hover-lift" onclick="deleteAdmin('${admin.id}')">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    }
}

// جستجوی ادمین
function searchAdmins(query) {
    console.log('جستجوی ادمین برای:', query);
    // در اینجا می‌توانید جستجو را پیاده‌سازی کنید
}

// نمایش مدال ادمین جدید
function showAdminModal() {
    const content = `
        <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-slate-300 mb-2">نام</label>
                    <input type="text" class="form-input" placeholder="نام">
                </div>
                <div>
                    <label class="block text-slate-300 mb-2">نام خانوادگی</label>
                    <input type="text" class="form-input" placeholder="نام خانوادگی">
                </div>
            </div>
            
            <div>
                <label class="block text-slate-300 mb-2">ایمیل</label>
                <input type="email" class="form-input" placeholder="example@filestore.ir">
            </div>
            
            <div>
                <label class="block text-slate-300 mb-2">نقش</label>
                <select class="form-select">
                    <option>سوپر ادمین</option>
                    <option>ادمین مالی</option>
                    <option>مدیر محتوا</option>
                    <option>پشتیبانی</option>
                </select>
            </div>
            
            <div>
                <label class="block text-slate-300 mb-2">رمز عبور موقت</label>
                <input type="password" class="form-input" placeholder="رمز عبور موقت">
                <p class="text-xs text-slate-400 mt-1">ادمین باید پس از اولین ورود رمز عبور را تغییر دهد</p>
            </div>
        </div>
    `;
    
    showModal('افزودن ادمین جدید', content, function() {
        showNotification('افزودن ادمین', 'ادمین جدید با موفقیت اضافه شد.', 'success');
    });
}

// نمایش مدال نقش جدید
function showRoleModal() {
    const content = `
        <div class="space-y-4">
            <div>
                <label class="block text-slate-300 mb-2">نام نقش</label>
                <input type="text" class="form-input" placeholder="مثال: مدیر فروش">
            </div>
            
            <div>
                <label class="block text-slate-300 mb-2">توضیحات</label>
                <textarea class="form-input" rows="3" placeholder="توضیحات نقش"></textarea>
            </div>
            
            <div>
                <label class="block text-slate-300 mb-2">دسترسی‌ها</label>
                <div class="bg-slate-800/50 rounded-xl p-4 max-h-60 overflow-y-auto">
                    <div class="space-y-3">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded bg-slate-800 border-slate-700 text-primary">
                            <span class="text-slate-300 text-sm">مشاهده داشبورد</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded bg-slate-800 border-slate-700 text-primary">
                            <span class="text-slate-300 text-sm">مدیریت کاربران</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded bg-slate-800 border-slate-700 text-primary">
                            <span class="text-slate-300 text-sm">مدیریت محصولات</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded bg-slate-800 border-slate-700 text-primary">
                            <span class="text-slate-300 text-sm">مشاهده تراکنش‌ها</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded bg-slate-800 border-slate-700 text-primary">
                            <span class="text-slate-300 text-sm">پاسخ به تیکت‌ها</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    showModal('افزودن نقش جدید', content, function() {
        showNotification('افزودن نقش', 'نقش جدید با موفقیت ایجاد شد.', 'success');
    });
}

// توابع عملیات ادمین
function viewAdmin(adminId) {
    console.log('مشاهده ادمین:', adminId);
    // در اینجا می‌توانید صفحه مشاهده ادمین را نمایش دهید
}

function editAdmin(adminId) {
    console.log('ویرایش ادمین:', adminId);
    // در اینجا می‌توانید صفحه ویرایش ادمین را نمایش دهید
}

function deleteAdmin(adminId) {
    showConfirmModal('حذف ادمین', `آیا از حذف ادمین ${adminId} مطمئن هستید؟`, function() {
        showNotification('حذف ادمین', 'ادمین با موفقیت حذف شد.', 'success');
    });
}

// تنظیم Dropdown ها
function setupDropdowns() {
    // منوی کاربر
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userMenu = document.getElementById('userMenu');

    userMenuBtn?.addEventListener('click', function(e) {
        e.stopPropagation();
        userMenu.classList.toggle('active');
    });

    // بستن dropdown ها با کلیک خارج
    document.addEventListener('click', function() {
        userMenu?.classList.remove('active');
    });

    // جلوگیری از بسته شدن dropdown با کلیک داخل
    userMenu?.addEventListener('click', function(e) {
        e.stopPropagation();
    });
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

// بستن اعلان
document.getElementById('closeNotification')?.addEventListener('click', function() {
    document.getElementById('notificationPopup').classList.remove('show');
});

// نمایش تب پیش‌فرض
switchProfileTab('profile');
