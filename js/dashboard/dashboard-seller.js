// فقط JavaScript برای تعاملات (نه برای داده‌های نمونه)

// متغیرهای سراسری
let selectedProducts = [];
let currentPage = 1;
const productsPerPage = 5;
let charts = {};

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    // راه‌اندازی منو
    setupMenu();
    
    // راه‌اندازی نمودارها
    setupCharts();
    
    // راه‌اندازی تعاملات
    setupInteractions();
    
    // راه‌اندازی فرم‌ها
    setupForms();
    
    // راه‌اندازی اعلان‌ها
    setupNotifications();
    
    // راه‌اندازی نوار پیشرفت
    setupProgressBar();
});

// راه‌اندازی منو
function setupMenu() {
    const menuToggle = document.getElementById('menuToggle');
    const closeSidebar = document.getElementById('closeSidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebar = document.querySelector('.sidebar');
    
    // باز کردن منو در موبایل
    menuToggle.addEventListener('click', function() {
        sidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
    });
    
    // بستن منو در موبایل
    closeSidebar.addEventListener('click', closeMobileMenu);
    sidebarOverlay.addEventListener('click', closeMobileMenu);
    
    // بستن منو موبایل
    function closeMobileMenu() {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    }
    
    // تغییر صفحات
    document.querySelectorAll('.sidebar-item[data-page]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const pageId = this.getAttribute('data-page');
            
            // به روزرسانی وضعیت فعال منو
            document.querySelectorAll('.sidebar-item').forEach(el => {
                el.classList.remove('active');
            });
            this.classList.add('active');
            
            // نمایش صفحه انتخاب شده
            showPage(pageId);
            
            // بستن منو در موبایل
            closeMobileMenu();
        });
    });
    
    // دکمه‌های تغییر صفحه در محتوا
    document.querySelectorAll('button[data-page]').forEach(button => {
        button.addEventListener('click', function() {
            const pageId = this.getAttribute('data-page');
            
            // به روزرسانی منو
            document.querySelectorAll('.sidebar-item').forEach(el => {
                el.classList.remove('active');
                if (el.getAttribute('data-page') === pageId) {
                    el.classList.add('active');
                }
            });
            
            // نمایش صفحه
            showPage(pageId);
        });
    });
    
    // دکمه خروج
    document.getElementById('logoutBtn').addEventListener('click', function() {
        if (confirm('آیا از خروج از پنل مطمئن هستید؟')) {
            showNotification('خروج از سیستم', 'شما با موفقیت از پنل فروشنده خارج شدید.', 'success');
            setTimeout(() => {
                window.location.href = '#';
            }, 1500);
        }
    });
}

// نمایش صفحه
function showPage(pageId) {
    // پنهان کردن همه صفحات
    document.querySelectorAll('.page-content').forEach(page => {
        page.classList.remove('active');
    });
    
    // نمایش صفحه انتخاب شده
    const targetPage = document.getElementById(pageId);
    if (targetPage) {
        targetPage.classList.add('active');
        
        // به روزرسانی عنوان صفحه
        const pageTitle = document.getElementById('pageTitle');
        if (pageTitle) {
            pageTitle.textContent = targetPage.querySelector('h1')?.textContent || 'داشبورد فروش';
        }
        
        // اسکرول به بالا
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

// راه‌اندازی نمودارها
function setupCharts() {
    // نمودار فروش
    const salesCtx = document.getElementById('salesChart')?.getContext('2d');
    if (salesCtx) {
        charts.salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنجشنبه', 'جمعه'],
                datasets: [{
                    label: 'تعداد فروش',
                    data: [12, 19, 8, 15, 12, 18, 14],
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#cbd5e1',
                            font: {
                                family: 'Vazirmatn'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#cbd5e1',
                        borderColor: '#6366f1',
                        borderWidth: 1,
                        rtl: true,
                        titleFont: {
                            family: 'Vazirmatn'
                        },
                        bodyFont: {
                            family: 'Vazirmatn'
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
    
    // نمودار درآمد
    const earningsCtx = document.getElementById('earningsChart')?.getContext('2d');
    if (earningsCtx) {
        charts.earningsChart = new Chart(earningsCtx, {
            type: 'bar',
            data: {
                labels: ['مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                datasets: [{
                    label: 'درآمد (هزار تومان)',
                    data: [1850, 2400, 2800, 3200, 2750, 3100],
                    backgroundColor: 'rgba(16, 185, 129, 0.7)',
                    borderColor: '#10b981',
                    borderWidth: 1
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
    
    // نمودار وضعیت محصولات
    const productsStatusCtx = document.getElementById('productsStatusChart')?.getContext('2d');
    if (productsStatusCtx) {
        charts.productsStatusChart = new Chart(productsStatusCtx, {
            type: 'doughnut',
            data: {
                labels: ['فعال', 'در انتظار تایید', 'پیش‌نویس'],
                datasets: [{
                    data: [18, 4, 2],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.7)',
                        'rgba(245, 158, 11, 0.7)',
                        'rgba(107, 114, 128, 0.7)'
                    ],
                    borderColor: [
                        '#10b981',
                        '#f59e0b',
                        '#6b7280'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
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
    
    // نمودار کمیسیون‌ها
    const commissionsCtx = document.getElementById('commissionsChart')?.getContext('2d');
    if (commissionsCtx) {
        charts.commissionsChart = new Chart(commissionsCtx, {
            type: 'line',
            data: {
                labels: ['هفته ۱', 'هفته ۲', 'هفته ۳', 'هفته ۴'],
                datasets: [{
                    label: 'کمیسیون (هزار تومان)',
                    data: [450, 620, 580, 720],
                    borderColor: '#8b5cf6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
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
    
    // نمودار بازدید ساعتی
    const hourlyVisitsCtx = document.getElementById('hourlyVisitsChart')?.getContext('2d');
    if (hourlyVisitsCtx) {
        charts.hourlyVisitsChart = new Chart(hourlyVisitsCtx, {
            type: 'bar',
            data: {
                labels: ['۸-۱۰', '۱۰-۱۲', '۱۲-۱۴', '۱۴-۱۶', '۱۶-۱۸', '۱۸-۲۰', '۲۰-۲۲'],
                datasets: [{
                    label: 'تعداد بازدید',
                    data: [45, 78, 92, 124, 88, 65, 42],
                    backgroundColor: 'rgba(99, 102, 241, 0.7)',
                    borderColor: '#6366f1',
                    borderWidth: 1
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
    
    // نمودار فروش دسته‌ها
    const categorySalesCtx = document.getElementById('categorySalesChart')?.getContext('2d');
    if (categorySalesCtx) {
        charts.categorySalesChart = new Chart(categorySalesCtx, {
            type: 'pie',
            data: {
                labels: ['قالب وبسایت', 'آموزش و دوره', 'پلاگین و افزونه', 'اسکریپت و کد'],
                datasets: [{
                    data: [63, 32, 24, 18],
                    backgroundColor: [
                        'rgba(99, 102, 241, 0.7)',
                        'rgba(16, 185, 129, 0.7)',
                        'rgba(245, 158, 11, 0.7)',
                        'rgba(139, 92, 246, 0.7)'
                    ],
                    borderColor: [
                        '#6366f1',
                        '#10b981',
                        '#f59e0b',
                        '#8b5cf6'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
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
    
    // نمودار توزیع امتیازها
    const ratingsCtx = document.getElementById('ratingsChart')?.getContext('2d');
    if (ratingsCtx) {
        charts.ratingsChart = new Chart(ratingsCtx, {
            type: 'bar',
            data: {
                labels: ['۱ ستاره', '۲ ستاره', '۳ ستاره', '۴ ستاره', '۵ ستاره'],
                datasets: [{
                    label: 'تعداد نظرات',
                    data: [2, 3, 5, 12, 26],
                    backgroundColor: 'rgba(245, 158, 11, 0.7)',
                    borderColor: '#f59e0b',
                    borderWidth: 1
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

// راه‌اندازی تعاملات
function setupInteractions() {
    // اعلان‌های فروشنده
    const sellerNotificationsBtn = document.getElementById('sellerNotificationsBtn');
    if (sellerNotificationsBtn) {
        sellerNotificationsBtn.addEventListener('click', function() {
            showNotification('اعلان‌های فروشنده', '۵ اعلان خوانده نشده دارید. برای مشاهده به بخش اعلان‌ها مراجعه کنید.', 'info');
        });
    }
    
    // دکمه‌های عملکرد سریع در داشبورد
    document.querySelectorAll('#sellerDashboard button[data-page]').forEach(btn => {
        btn.addEventListener('click', function() {
            const pageId = this.getAttribute('data-page');
            
            // به روزرسانی منو
            document.querySelectorAll('.sidebar-item').forEach(el => {
                el.classList.remove('active');
                if (el.getAttribute('data-page') === pageId) {
                    el.classList.add('active');
                }
            });
            
            // نمایش صفحه
            showPage(pageId);
        });
    });
    
    // فیلتر محصولات
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // حذف کلاس فعال از همه دکمه‌ها
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                b.classList.add('bg-slate-800', 'hover:bg-slate-700');
            });
            
            // اضافه کردن کلاس فعال به دکمه انتخاب شده
            this.classList.remove('bg-slate-800', 'hover:bg-slate-700');
            this.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
            
            // اعمال فیلتر
            const filter = this.getAttribute('data-filter');
            let filterText = '';
            switch(filter) {
                case 'all': filterText = 'همه محصولات'; break;
                case 'active': filterText = 'فعال'; break;
                case 'pending': filterText = 'در انتظار تایید'; break;
                case 'draft': filterText = 'پیش‌نویس'; break;
            }
            
            showNotification('اعمال فیلتر', `فیلتر "${filterText}" اعمال شد.`, 'info');
        });
    });
    
    // جستجوی محصولات
    const productSearch = document.getElementById('productSearch');
    if (productSearch) {
        productSearch.addEventListener('input', function() {
            if (this.value.length >= 2) {
                showNotification('جستجوی محصولات', `در حال جستجو برای "${this.value}"...`, 'info');
            }
        });
    }
    
    // مرتب‌سازی محصولات
    const productSort = document.getElementById('productSort');
    if (productSort) {
        productSort.addEventListener('change', function() {
            let sortText = '';
            switch(this.value) {
                case 'newest': sortText = 'جدیدترین'; break;
                case 'best-selling': sortText = 'پرفروش‌ترین'; break;
                case 'price-high': sortText = 'گران‌ترین'; break;
                case 'price-low': sortText = 'ارزان‌ترین'; break;
            }
            
            showNotification('مرتب‌سازی محصولات', `مرتب‌سازی بر اساس "${sortText}" اعمال شد.`, 'info');
        });
    }
    
    // انتخاب دسته‌ای محصولات
    setupBulkActions();
    
    // بهینه‌سازی هوشمند
    const optimizeProducts = document.getElementById('optimizeProducts');
    if (optimizeProducts) {
        optimizeProducts.addEventListener('click', function() {
            showNotification('بهینه‌سازی هوشمند', 'سیستم در حال تحلیل و بهینه‌سازی محصولات شما است...', 'info');
            
            setTimeout(() => {
                showNotification('بهینه‌سازی کامل', '۳ پیشنهاد بهینه‌سازی برای محصولات شما اعمال شد.', 'success');
            }, 2000);
        });
    }
    
    // فیلتر نظرات
    document.querySelectorAll('.filter-review-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // حذف کلاس فعال از همه دکمه‌ها
            document.querySelectorAll('.filter-review-btn').forEach(b => {
                b.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                b.classList.add('bg-slate-800', 'hover:bg-slate-700');
            });
            
            // اضافه کردن کلاس فعال به دکمه انتخاب شده
            this.classList.remove('bg-slate-800', 'hover:bg-slate-700');
            this.classList.add('bg-indigo-600', 'hover:bg-indigo-700');
            
            // اعمال فیلتر
            const filter = this.getAttribute('data-filter');
            filterReviews(filter);
        });
    });
    
    // مرتب‌سازی نظرات
    const reviewSort = document.getElementById('reviewSort');
    if (reviewSort) {
        reviewSort.addEventListener('change', function() {
            showNotification('مرتب‌سازی نظرات', `نظرات بر اساس ${this.options[this.selectedIndex].text} مرتب شدند.`, 'info');
        });
    }
    
    // ایجاد گزارش جدید
    const generateReport = document.getElementById('generateReport');
    if (generateReport) {
        generateReport.addEventListener('click', function() {
            showNotification('ایجاد گزارش', 'گزارش جدید در حال ایجاد است...', 'info');
            
            setTimeout(() => {
                showNotification('ایجاد موفق', 'گزارش با موفقیت ایجاد و به لیست گزارش‌ها اضافه شد.', 'success');
            }, 2000);
        });
    }
    
    // تیکت جدید
    const newTicketBtn = document.getElementById('newTicketBtn');
    if (newTicketBtn) {
        newTicketBtn.addEventListener('click', function() {
            // اسکرول به فرم تیکت جدید
            document.querySelector('#sellerSupport .stat-card:last-child')?.scrollIntoView({ behavior: 'smooth' });
        });
    }
    
    // اسکرول به بخش‌های راهنما
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId.startsWith('#')) {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
    
    // تغییر روش برداشت
    const withdrawMethod = document.getElementById('withdrawMethod');
    const bankInfo = document.getElementById('bankInfo');
    
    if (withdrawMethod && bankInfo) {
        withdrawMethod.addEventListener('change', function() {
            if (this.value === 'bank') {
                bankInfo.style.display = 'block';
            } else {
                bankInfo.style.display = 'none';
            }
        });
    }
    
    // درخواست برداشت
    const requestWithdrawal = document.getElementById('requestWithdrawal');
    const withdrawAmount = document.getElementById('withdrawAmount');
    
    if (requestWithdrawal && withdrawAmount) {
        requestWithdrawal.addEventListener('click', function() {
            const amount = parseInt(withdrawAmount.value);
            
            if (!amount || amount < 100000) {
                showNotification('خطا در مبلغ', 'حداقل مبلغ برداشت ۱۰۰,۰۰۰ تومان است.', 'error');
                return;
            }
            
            if (amount > 3450000) {
                showNotification('خطا در مبلغ', 'مبلغ درخواستی بیشتر از موجودی قابل برداشت است.', 'error');
                return;
            }
            
            const fee = amount * 0.02;
            const netAmount = amount - fee;
            
            if (confirm(`آیا از درخواست برداشت ${amount.toLocaleString()} تومان مطمئن هستید؟\nکارمزد: ${fee.toLocaleString()} تومان\nمبلغ قابل دریافت: ${netAmount.toLocaleString()} تومان`)) {
                showNotification('درخواست برداشت', 'درخواست برداشت شما ثبت شد و در حال پردازش است.', 'success');
                
                // بازنشانی فرم
                withdrawAmount.value = '';
            }
        });
    }
    
    // خروجی اکسل درآمدها
    const exportEarnings = document.getElementById('exportEarnings');
    if (exportEarnings) {
        exportEarnings.addEventListener('click', function() {
            showNotification('در حال تولید خروجی', 'گزارش درآمدها در حال تولید و دانلود است...', 'info');
            
            setTimeout(() => {
                showNotification('دانلود موفق', 'گزارش درآمدها با موفقیت دانلود شد.', 'success');
            }, 1500);
        });
    }
    
    // تغییر بازه زمانی تحلیل
    const analyticsPeriod = document.getElementById('analyticsPeriod');
    if (analyticsPeriod) {
        analyticsPeriod.addEventListener('change', function() {
            showNotification('تغییر بازه زمانی', `داده‌های تحلیل برای ${this.options[this.selectedIndex].text} بارگیری شد.`, 'info');
        });
    }
    
    // تغییر بازه زمانی نمودار فروش
    const salesChartRange = document.getElementById('salesChartRange');
    if (salesChartRange && charts.salesChart) {
        salesChartRange.addEventListener('change', function() {
            const days = parseInt(this.value);
            // در اینجا می‌توانیم داده‌های جدید بر اساس روزهای انتخابی بارگیری کنیم
            // برای نمونه، داده‌های تصادفی تولید می‌کنیم
            const newData = Array.from({length: days}, () => Math.floor(Math.random() * 20) + 5);
            const newLabels = Array.from({length: days}, (_, i) => `${i+1} روز پیش`);
            
            charts.salesChart.data.labels = newLabels;
            charts.salesChart.data.datasets[0].data = newData;
            charts.salesChart.update();
            
            showNotification('به‌روزرسانی نمودار', `نمودار فروش برای ${days} روز گذشته به‌روزرسانی شد.`, 'info');
        });
    }
}

// راه‌اندازی انتخاب دسته‌ای
function setupBulkActions() {
    const selectAll = document.getElementById('selectAllProducts');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    const activateSelected = document.getElementById('activateSelected');
    const deleteSelected = document.getElementById('deleteSelected');
    
    if (!selectAll) return;
    
    // انتخاب همه
    selectAll.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        
        updateSelectedProducts();
    });
    
    // به روزرسانی شمارش انتخاب شده
    function updateSelectedProducts() {
        const checkboxes = document.querySelectorAll('.product-checkbox:checked');
        selectedProducts = Array.from(checkboxes).map(cb => cb.value);
        
        if (selectedCount) {
            selectedCount.textContent = `${selectedProducts.length} محصول انتخاب شده`;
        }
        
        if (bulkActions) {
            bulkActions.style.display = selectedProducts.length > 0 ? 'flex' : 'none';
        }
    }
    
    // فعال‌سازی انتخاب‌ها
    if (activateSelected) {
        activateSelected.addEventListener('click', function() {
            if (selectedProducts.length === 0) return;
            
            if (confirm(`آیا از فعال‌سازی ${selectedProducts.length} محصول انتخاب شده مطمئن هستید؟`)) {
                showNotification('فعال‌سازی محصولات', `${selectedProducts.length} محصول با موفقیت فعال شدند.`, 'success');
                
                // بازنشانی انتخاب‌ها
                selectedProducts = [];
                document.querySelectorAll('.product-checkbox').forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateSelectedProducts();
            }
        });
    }
    
    // حذف انتخاب‌ها
    if (deleteSelected) {
        deleteSelected.addEventListener('click', function() {
            if (selectedProducts.length === 0) return;
            
            if (confirm(`آیا از حذف ${selectedProducts.length} محصول انتخاب شده مطمئن هستید؟ این عمل قابل بازگشت نیست.`)) {
                showNotification('حذف محصولات', `${selectedProducts.length} محصول با موفقیت حذف شدند.`, 'success');
                
                // بازنشانی انتخاب‌ها
                selectedProducts = [];
                document.querySelectorAll('.product-checkbox').forEach(cb => cb.checked = false);
                selectAll.checked = false;
                updateSelectedProducts();
            }
        });
    }
    
    // راه‌اندازی رویدادهای چک‌باکس محصولات
    document.querySelectorAll('.product-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectedProducts();
            
            // بررسی وضعیت "انتخاب همه"
            const selectAll = document.getElementById('selectAllProducts');
            if (selectAll) {
                const allCheckboxes = document.querySelectorAll('.product-checkbox');
                const checkedCount = document.querySelectorAll('.product-checkbox:checked').length;
                selectAll.checked = checkedCount === allCheckboxes.length;
                selectAll.indeterminate = checkedCount > 0 && checkedCount < allCheckboxes.length;
            }
        });
    });
    
    // ویرایش محصول
    document.querySelectorAll('.product-edit').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            showNotification('ویرایش محصول', `در حال بارگذاری اطلاعات محصول #${productId}...`, 'info');
            setTimeout(() => {
                showPage('addProduct');
            }, 1000);
        });
    });
    
    // مشاهده محصول
    document.querySelectorAll('.product-view').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            showNotification('مشاهده محصول', `در حال باز کردن صفحه محصول #${productId}...`, 'info');
        });
    });
}

// فیلتر نظرات
function filterReviews(filter) {
    const reviews = document.querySelectorAll('#reviewsList > div');
    
    reviews.forEach(review => {
        let show = true;
        
        switch(filter) {
            case 'unanswered':
                show = review.getAttribute('data-answered') === 'false';
                break;
            case '5star':
                show = review.getAttribute('data-rating') === '5';
                break;
            case 'with-response':
                show = review.getAttribute('data-answered') === 'true';
                break;
            // 'all' - همه را نشان بده
        }
        
        review.style.display = show ? 'block' : 'none';
    });
    
    let filterText = '';
    switch(filter) {
        case 'all': filterText = 'همه نظرات'; break;
        case 'unanswered': filterText = 'پاسخ داده نشده'; break;
        case '5star': filterText = '۵ ستاره'; break;
        case 'with-response': filterText = 'دارای پاسخ'; break;
    }
    
    showNotification('اعمال فیلتر', `فیلتر "${filterText}" اعمال شد.`, 'info');
}

// راه‌اندازی فرم‌ها
function setupForms() {
    // آپلود فایل محصول
    const fileUploadZone = document.getElementById('fileUploadZone');
    const selectFileBtn = document.getElementById('selectFileBtn');
    const selectedFileInfo = document.getElementById('selectedFileInfo');
    
    if (fileUploadZone && selectFileBtn) {
        // شبیه‌سازی انتخاب فایل
        selectFileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // برای نمونه، فقط یک حالت موفق نشان می‌دهیم
            selectedFileInfo.classList.remove('hidden');
            fileUploadZone.innerHTML = `
                <i class="fas fa-check-circle text-4xl text-emerald-500 mb-4"></i>
                <p class="font-medium text-white mb-2">فایل با موفقیت آپلود شد</p>
                <p class="text-sm text-slate-400 mb-4">product_files.zip (۴۸.۵ MB)</p>
                <button class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300" id="removeFileBtn">
                    حذف فایل
                </button>
            `;
            
            // دکمه حذف فایل
            document.getElementById('removeFileBtn')?.addEventListener('click', function(e) {
                e.stopPropagation();
                resetFileUpload();
            });
        });
        
        // کشیدن و رها کردن (Drag & Drop)
        fileUploadZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-indigo-500', 'bg-indigo-500/10');
        });
        
        fileUploadZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-indigo-500', 'bg-indigo-500/10');
        });
        
        fileUploadZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-indigo-500', 'bg-indigo-500/10');
            
            selectedFileInfo.classList.remove('hidden');
            fileUploadZone.innerHTML = `
                <i class="fas fa-check-circle text-4xl text-emerald-500 mb-4"></i>
                <p class="font-medium text-white mb-2">فایل با موفقیت آپلود شد</p>
                <p class="text-sm text-slate-400 mb-4">${e.dataTransfer.files[0]?.name || 'فایل آپلود شده'}</p>
                <button class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300" id="removeFileBtn">
                    حذف فایل
                </button>
            `;
            
            // دکمه حذف فایل
            document.getElementById('removeFileBtn')?.addEventListener('click', function(e) {
                e.stopPropagation();
                resetFileUpload();
            });
        });
        
        function resetFileUpload() {
            selectedFileInfo.classList.add('hidden');
            fileUploadZone.innerHTML = `
                <i class="fas fa-cloud-upload-alt text-4xl text-indigo-500 mb-4"></i>
                <p class="font-medium text-white mb-2" id="fileUploadText">فایل اصلی محصول را اینجا رها کنید</p>
                <p class="text-sm text-slate-400 mb-4">یا برای انتخاب فایل کلیک کنید</p>
                <button class="px-6 py-2 primary-gradient text-white rounded-lg transition-all duration-300" id="selectFileBtn">
                    انتخاب فایل
                </button>
                <p class="text-xs text-slate-500 mt-4">حداکثر حجم فایل: ۵۰۰ مگابایت | فرمت‌های مجاز: ZIP, RAR</p>
            `;
            
            // رویدادهای دکمه جدید
            document.getElementById('selectFileBtn')?.addEventListener('click', function(e) {
                e.stopPropagation();
                
                selectedFileInfo.classList.remove('hidden');
                fileUploadZone.innerHTML = `
                    <i class="fas fa-check-circle text-4xl text-emerald-500 mb-4"></i>
                    <p class="font-medium text-white mb-2">فایل با موفقیت آپلود شد</p>
                    <p class="text-sm text-slate-400 mb-4">product_files.zip (۴۸.۵ MB)</p>
                    <button class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300" id="removeFileBtn">
                        حذف فایل
                    </button>
                `;
                
                document.getElementById('removeFileBtn')?.addEventListener('click', function(e) {
                    e.stopPropagation();
                    resetFileUpload();
                });
            });
        }
    }
    
    // پیش‌نمایش محصول
    const productTitle = document.getElementById('productTitle');
    const productCategory = document.getElementById('productCategory');
    const productPrice = document.getElementById('productPrice');
    const previewTitle = document.getElementById('previewTitle');
    const previewCategory = document.getElementById('previewCategory');
    const previewPrice = document.getElementById('previewPrice');
    
    if (productTitle && previewTitle) {
        productTitle.addEventListener('input', function() {
            previewTitle.textContent = this.value || 'عنوان محصول';
        });
    }
    
    if (productCategory && previewCategory) {
        productCategory.addEventListener('change', function() {
            const categoryText = this.options[this.selectedIndex]?.text || 'دسته‌بندی';
            previewCategory.textContent = categoryText === 'انتخاب دسته‌بندی' ? 'دسته‌بندی' : categoryText;
        });
    }
    
    if (productPrice && previewPrice) {
        productPrice.addEventListener('input', function() {
            const price = this.value ? parseInt(this.value).toLocaleString() : '۰';
            previewPrice.textContent = `${price} تومان`;
        });
    }
    
    // انتشار محصول
    const publishProduct = document.getElementById('publishProduct');
    if (publishProduct) {
        publishProduct.addEventListener('click', function() {
            // اعتبارسنجی فرم
            if (!productTitle?.value.trim()) {
                showNotification('خطا در فرم', 'لطفا عنوان محصول را وارد کنید.', 'error');
                productTitle?.focus();
                return;
            }
            
            if (!productPrice?.value || parseInt(productPrice.value) <= 0) {
                showNotification('خطا در فرم', 'لطفا قیمت محصول را وارد کنید.', 'error');
                productPrice?.focus();
                return;
            }
            
            // شبیه‌سازی ارسال فرم
            showNotification('در حال انتشار', 'محصول در حال انتشار است...', 'info');
            
            setTimeout(() => {
                showNotification('انتشار موفق', 'محصول با موفقیت منتشر شد و در صف تایید قرار گرفت.', 'success');
                
                // بازنشانی فرم
                if (productTitle) productTitle.value = '';
                if (productPrice) productPrice.value = '';
                if (productCategory) productCategory.selectedIndex = 0;
                if (previewTitle) previewTitle.textContent = 'عنوان محصول';
                if (previewCategory) previewCategory.textContent = 'دسته‌بندی';
                if (previewPrice) previewPrice.textContent = '۰ تومان';
                
                // بازگشت به صفحه محصولات
                setTimeout(() => {
                    showPage('products');
                }, 1500);
            }, 2000);
        });
    }
    
    // ذخیره پیش‌نویس
    const saveDraft = document.getElementById('saveDraft');
    if (saveDraft) {
        saveDraft.addEventListener('click', function() {
            showNotification('ذخیره پیش‌نویس', 'محصول به عنوان پیش‌نویس ذخیره شد.', 'success');
        });
    }
    
    // پیش‌نمایش محصول
    const previewProductBtn = document.getElementById('previewProduct');
    if (previewProductBtn) {
        previewProductBtn.addEventListener('click', function() {
            showNotification('پیش‌نمایش', 'در حال باز کردن پیش‌نمایش محصول...', 'info');
        });
    }
    
    // اعتبارسنجی فرم‌های دیگر
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // در یک پیاده‌سازی واقعی، اینجا فرم به سرور ارسال می‌شود
            showNotification('ارسال فرم', 'اطلاعات با موفقیت ذخیره شد.', 'success');
        });
    });
}

// راه‌اندازی اعلان‌ها
function setupNotifications() {
    const notificationPopup = document.getElementById('notificationPopup');
    const closeNotification = document.getElementById('closeNotification');
    
    if (closeNotification) {
        closeNotification.addEventListener('click', function() {
            notificationPopup.classList.remove('show');
        });
    }
    
    // بسته شدن خودکار اعلان
    window.showNotification = function(title, message, type = 'info') {
        const titleElement = document.getElementById('notificationTitle');
        const messageElement = document.getElementById('notificationMessage');
        
        if (titleElement && messageElement) {
            titleElement.textContent = title;
            messageElement.textContent = message;
            
            // تغییر رنگ بر اساس نوع
            const borderColors = {
                'success': '#10b981',
                'error': '#ef4444',
                'warning': '#f59e0b',
                'info': '#6366f1'
            };
            
            notificationPopup.querySelector('.border-r-4').style.borderColor = borderColors[type] || '#6366f1';
            
            // نمایش اعلان
            notificationPopup.classList.add('show');
            
            // بسته شدن خودکار بعد از 5 ثانیه
            setTimeout(() => {
                notificationPopup.classList.remove('show');
            }, 5000);
        }
    };
}

// راه‌اندازی نوار پیشرفت
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
