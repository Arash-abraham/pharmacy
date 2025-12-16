// تابع فرمت کردن اعداد با کاما
function formatNumber(number) {
    return new Intl.NumberFormat('fa-IR').format(number);
}

// به‌روزرسانی نمایش قیمت‌ها
function updatePriceDisplay() {
    // قیمت اصلی
    const priceElements = document.querySelectorAll('.price-display');
    priceElements.forEach(el => {
        const price = el.getAttribute('data-price');
        if (price) {
            el.textContent = formatNumber(parseInt(price)) + ' تومان';
        }
    });
    
    // قیمت قبل از تخفیف
    const originalPriceElements = document.querySelectorAll('.original-price');
    originalPriceElements.forEach(el => {
        const price = el.getAttribute('data-price');
        if (price) {
            el.textContent = formatNumber(parseInt(price));
        }
    });
}

// بارگذاری اولیه
document.addEventListener('DOMContentLoaded', function() {
    updatePriceDisplay();
    
    // به‌روزرسانی نمایش قیمت در اسلایدر
    const priceRange = document.getElementById('priceRange');
    const currentPrice = document.getElementById('currentPrice');
    const maxPrice = document.getElementById('maxPrice');
    
    maxPrice.textContent = formatNumber(3000000) + ' تومان';
    currentPrice.textContent = formatNumber(parseInt(priceRange.value)) + ' تومان';
    
    // محاسبه تعداد محصولات هر دسته
    updateCategoryCounts();
});

// به‌روزرسانی تعداد محصولات هر دسته
function updateCategoryCounts() {
    const categories = ['web', 'app', 'graphic', 'education'];
    
    categories.forEach(category => {
        const count = document.querySelectorAll(`.product-card[data-category="${category}"]`).length;
        const countElement = document.querySelector(`[onclick*="${category}"] .text-slate-500`);
        if (countElement) {
            countElement.textContent = `(${count})`;
        }
    });
}

// به‌روزرسانی قیمت در اسلایدر
function updatePriceRange() {
    const priceRange = document.getElementById('priceRange');
    const currentPrice = document.getElementById('currentPrice');
    currentPrice.textContent = formatNumber(parseInt(priceRange.value)) + ' تومان';
}

// وضعیت فیلترها
const filters = {
    category: [],
    status: [],
    tag: [],
    maxPrice: 3000000,
    search: ''
};

// اضافه/حذف فیلتر
function toggleFilter(type, value) {
    const checkbox = document.getElementById(`filter-${type}-${value}`);
    const index = filters[type].indexOf(value);
    
    if (index > -1) {
        // حذف فیلتر
        filters[type].splice(index, 1);
        checkbox.classList.remove('checked');
    } else {
        // اضافه کردن فیلتر
        filters[type].push(value);
        checkbox.classList.add('checked');
        
        // برای تگ‌ها، کلاس active هم اضافه کن
        if (type === 'tag') {
            const tagElement = document.querySelector(`.tag[onclick*="${value}"]`);
            if (tagElement) {
                tagElement.classList.add('active');
            }
        }
    }
    
    updateActiveFilters();
}

// فیلتر کردن بر اساس دسته‌بندی (با کلیک روی بج دسته‌بندی)
function filterByCategory(category) {
    // اگر قبلا انتخاب شده، حذفش کن
    const index = filters.category.indexOf(category);
    const checkbox = document.getElementById(`filter-category-${category}`);
    
    if (index > -1) {
        filters.category.splice(index, 1);
        checkbox.classList.remove('checked');
    } else {
        // فقط این دسته رو انتخاب کن (بقیه رو حذف کن)
        filters.category = [category];
        
        // همه چک‌باکس‌های دسته‌بندی رو ریست کن
        document.querySelectorAll('[id^="filter-category-"]').forEach(cb => {
            cb.classList.remove('checked');
        });
        
        // این یکی رو انتخاب کن
        checkbox.classList.add('checked');
    }
    
    updateActiveFilters();
    applyFilters();
}

// اعمال فیلترها
function applyFilters() {
    const products = document.querySelectorAll('.product-card');
    const maxPrice = parseInt(document.getElementById('priceRange').value);
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    let visibleCount = 0;
    
    products.forEach(product => {
        let showProduct = true;
        
        // فیلتر قیمت
        const price = parseInt(product.dataset.price);
        if (price > maxPrice) {
            showProduct = false;
        }
        
        // فیلتر جستجو
        if (searchTerm) {
            const name = product.dataset.name.toLowerCase();
            if (!name.includes(searchTerm)) {
                showProduct = false;
            }
        }
        
        // فیلتر دسته‌بندی
        if (filters.category.length > 0) {
            const category = product.dataset.category;
            if (!filters.category.includes(category)) {
                showProduct = false;
            }
        }
        
        // فیلتر وضعیت
        if (filters.status.length > 0) {
            const status = product.dataset.status;
            if (!filters.status.includes(status)) {
                showProduct = false;
            }
        }
        
        // فیلتر تگ‌ها
        if (filters.tag.length > 0) {
            const tags = product.dataset.tags.split(',');
            let tagMatch = false;
            
            filters.tag.forEach(filterTag => {
                if (tags.includes(filterTag)) {
                    tagMatch = true;
                }
            });
            
            if (!tagMatch) {
                showProduct = false;
            }
        }
        
        // نمایش/مخفی کردن محصول
        if (showProduct) {
            product.style.display = 'block';
            product.classList.add('filtered-item');
            visibleCount++;
        } else {
            product.style.display = 'none';
            product.classList.remove('filtered-item');
        }
    });
    
    // به‌روزرسانی تعداد نتایج
    document.getElementById('resultCount').textContent = visibleCount;
    
    // نمایش پیام عدم یافتن محصول
    const noProducts = document.getElementById('noProducts');
    if (visibleCount === 0) {
        noProducts.classList.remove('hidden');
    } else {
        noProducts.classList.add('hidden');
    }
}

// به‌روزرسانی نمایش فیلترهای فعال
function updateActiveFilters() {
    const container = document.getElementById('activeFiltersContainer');
    container.innerHTML = '';
    
    // قیمت
    const maxPrice = document.getElementById('priceRange').value;
    if (parseInt(maxPrice) < 3000000) {
        const priceFilter = document.createElement('div');
        priceFilter.className = 'active-filter';
        priceFilter.innerHTML = `
            <span>حداکثر قیمت: ${formatNumber(parseInt(maxPrice))} تومان</span>
            <button onclick="resetPriceFilter()" class="mr-2 text-slate-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(priceFilter);
    }
    
    // دسته‌بندی
    filters.category.forEach(cat => {
        const filter = document.createElement('div');
        filter.className = 'active-filter';
        const categoryName = getCategoryName(cat);
        filter.innerHTML = `
            <span>دسته‌بندی: ${categoryName}</span>
            <button onclick="removeFilter('category', '${cat}')" class="mr-2 text-slate-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(filter);
    });
    
    // وضعیت
    filters.status.forEach(status => {
        const filter = document.createElement('div');
        filter.className = 'active-filter';
        filter.innerHTML = `
            <span>وضعیت: ${getStatusName(status)}</span>
            <button onclick="removeFilter('status', '${status}')" class="mr-2 text-slate-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(filter);
    });
    
    // تگ‌ها
    filters.tag.forEach(tag => {
        const filter = document.createElement('div');
        filter.className = 'active-filter';
        filter.innerHTML = `
            <span>تگ: ${tag}</span>
            <button onclick="removeFilter('tag', '${tag}')" class="mr-2 text-slate-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(filter);
    });
}

// حذف یک فیلتر خاص
function removeFilter(type, value) {
    const index = filters[type].indexOf(value);
    if (index > -1) {
        filters[type].splice(index, 1);
        
        // به‌روزرسانی نمایش چک‌باکس
        const checkbox = document.getElementById(`filter-${type}-${value}`);
        if (checkbox) {
            checkbox.classList.remove('checked');
        }
        
        // برای تگ‌ها، کلاس active هم حذف کن
        if (type === 'tag') {
            const tagElement = document.querySelector(`.tag[onclick*="${value}"]`);
            if (tagElement) {
                tagElement.classList.remove('active');
            }
        }
        
        updateActiveFilters();
        applyFilters();
    }
}

// ریست فیلتر قیمت
function resetPriceFilter() {
    document.getElementById('priceRange').value = 3000000;
    updatePriceRange();
    applyFilters();
}

// حذف همه فیلترها
function clearAllFilters() {
    // ریست فیلترهای چک‌باکس
    document.querySelectorAll('.filter-checkbox.checked').forEach(cb => {
        cb.classList.remove('checked');
    });
    
    // ریست تگ‌های فعال
    document.querySelectorAll('.tag.active').forEach(tag => {
        tag.classList.remove('active');
    });
    
    // ریست جستجو
    document.getElementById('searchInput').value = '';
    
    // ریست اسلایدر قیمت
    document.getElementById('priceRange').value = 3000000;
    updatePriceRange();
    
    // ریست آبجکت فیلترها
    filters.category = [];
    filters.status = [];
    filters.tag = [];
    filters.maxPrice = 3000000;
    filters.search = '';
    
    updateActiveFilters();
    applyFilters();
}

// مرتب‌سازی محصولات
function sortProducts() {
    const sortValue = document.getElementById('sortSelect').value;
    const container = document.getElementById('productsContainer');
    const visibleProducts = Array.from(container.querySelectorAll('.product-card[style*="block"], .product-card:not([style*="none"])'));
    
    // فقط محصولات قابل مشاهده را مرتب کن
    if (visibleProducts.length === 0) return;
    
    const sortedProducts = visibleProducts.sort((a, b) => {
        switch(sortValue) {
            case 'price-low':
                return parseInt(a.dataset.price) - parseInt(b.dataset.price);
            case 'price-high':
                return parseInt(b.dataset.price) - parseInt(a.dataset.price);
            case 'sales':
                return parseInt(b.dataset.sales) - parseInt(a.dataset.sales);
            case 'new':
                return parseInt(b.dataset.id) - parseInt(a.dataset.id);
            default:
                return parseInt(a.dataset.id) - parseInt(b.dataset.id);
        }
    });
    
    // جدا کردن همه محصولات
    const allProducts = Array.from(container.querySelectorAll('.product-card'));
    allProducts.forEach(product => {
        container.removeChild(product);
    });
    
    // اضافه کردن دوباره به ترتیب جدید
    sortedProducts.forEach(product => {
        container.appendChild(product);
    });
    
    // اضافه کردن بقیه محصولات (مخفی شده)
    allProducts.forEach(product => {
        if (!sortedProducts.includes(product)) {
            container.appendChild(product);
        }
    });
}

// تابع کمکی برای نام دسته‌بندی
function getCategoryName(cat) {
    const names = {
        'web': 'قالب وب',
        'app': 'اپلیکیشن',
        'graphic': 'گرافیک',
        'education': 'آموزشی'
    };
    return names[cat] || cat;
}

// تابع کمکی برای نام وضعیت
function getStatusName(status) {
    const names = {
        'discount': 'تخفیف‌دار',
        'new': 'جدید',
        'popular': 'پرفروش'
    };
    return names[status] || status;
}

// جستجو با تایپ
document.getElementById('searchInput').addEventListener('input', function(e) {
    filters.search = e.target.value.toLowerCase();
    applyFilters();
});
// نوار پیشرفت اسکرول
window.addEventListener('scroll', () => {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById('progressBar').style.width = scrolled + '%';
});

// محدوده قیمت با دو اسلایدر
const priceFromRange = document.getElementById('priceFromRange');
const priceToRange = document.getElementById('priceToRange');
const priceFromValue = document.getElementById('priceFromValue');
const priceToValue = document.getElementById('priceToValue');

function formatPersian(num) {
    return Number(num).toLocaleString('fa-IR') + ' تومان';
}

priceFromRange.addEventListener('input', function() {
    let fromVal = parseInt(this.value);
    let toVal = parseInt(priceToRange.value);
    
    if (fromVal > toVal) {
        priceToRange.value = fromVal;
        priceToValue.textContent = formatPersian(fromVal);
    }
    
    priceFromValue.textContent = formatPersian(fromVal);
});

priceToRange.addEventListener('input', function() {
    let toVal = parseInt(this.value);
    let fromVal = parseInt(priceFromRange.value);
    
    if (toVal < fromVal) {
        priceFromRange.value = toVal;
        priceFromValue.textContent = formatPersian(toVal);
    }
    
    priceToValue.textContent = formatPersian(toVal);
});
