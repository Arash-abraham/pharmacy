// داده‌های اولیه
let cartData = {
    items: [
        {
            id: 1,
            name: "قالب فروشگاهی React پیشرفته",
            price: 120000,
            originalPrice: 150000,
            quantity: 1,
            discount: 30000
        },
        {
            id: 2,
            name: "اپلیکیشن فروشگاهی Flutter",
            price: 250000,
            originalPrice: 250000,
            quantity: 1,
            discount: 0
        },
        {
            id: 3,
            name: "پکیج آموزش React Native",
            price: 180000,
            originalPrice: 180000,
            quantity: 1,
            discount: 0
        }
    ],
    wallet: 10000,
    coupon: {
        code: "",
        discount: 0,
        applied: false
    },
    selectedPaymentMethod: "wallet"
};

document.addEventListener('DOMContentLoaded', function() {
    // محاسبات اولیه
    updateCartCalculations();
    
    // مدیریت تعداد آیتم‌ها
    document.querySelectorAll('.increase-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item');
            increaseQuantity(itemId);
        });
    });
    
    document.querySelectorAll('.decrease-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item');
            decreaseQuantity(itemId);
        });
    });
    
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            const itemId = this.getAttribute('data-item');
            const newQuantity = parseInt(this.value);
            if (newQuantity > 0) {
                updateQuantity(itemId, newQuantity);
            } else {
                showDeleteConfirm(itemId);
            }
        });
    });
    
    // حذف آیتم‌ها
    document.querySelectorAll('.remove-item-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item');
            showDeleteConfirm(itemId);
        });
    });
    
    // مدیریت کد تخفیف
    const couponInput = document.getElementById('couponInput');
    const applyCouponBtn = document.getElementById('applyCouponBtn');
    const couponMessage = document.getElementById('couponMessage');
    
    applyCouponBtn.addEventListener('click', applyCoupon);
    
    couponInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            applyCoupon();
        }
    });
    
    // مدیریت روش پرداخت
    document.querySelectorAll('.payment-method').forEach(method => {
        method.addEventListener('click', function() {
            const methodType = this.getAttribute('data-method');
            selectPaymentMethod(methodType);
        });
    });
    
    // دکمه پرداخت
    const checkoutBtn = document.getElementById('checkoutBtn');
    checkoutBtn.addEventListener('click', processPayment);
    
    // مدیریت مودال حذف
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    let itemToDelete = null;
    
    confirmDeleteBtn.addEventListener('click', function() {
        if (itemToDelete) {
            removeItem(itemToDelete);
            hideModal('confirmDeleteModal');
            itemToDelete = null;
        }
    });
    
    cancelDeleteBtn.addEventListener('click', function() {
        hideModal('confirmDeleteModal');
        itemToDelete = null;
    });
    
    // دکمه مشاهده سفارشات
    document.getElementById('viewOrdersBtn').addEventListener('click', function() {
        showNotification('در حال انتقال به صفحه سفارشات...', 'info');
        setTimeout(() => {
            window.location.href = 'orders.html';
        }, 1000);
    });
    
    // استایل‌های اولیه
    selectPaymentMethod('wallet');
});

// افزایش تعداد
function increaseQuantity(itemId) {
    const item = cartData.items.find(item => item.id == itemId);
    if (item) {
        item.quantity++;
        updateItemDisplay(itemId);
        updateCartCalculations();
        showNotification('تعداد محصول افزایش یافت', 'info');
    }
}

// کاهش تعداد
function decreaseQuantity(itemId) {
    const item = cartData.items.find(item => item.id == itemId);
    if (item) {
        if (item.quantity > 1) {
            item.quantity--;
            updateItemDisplay(itemId);
            updateCartCalculations();
            showNotification('تعداد محصول کاهش یافت', 'info');
        } else {
            showDeleteConfirm(itemId);
        }
    }
}

// بروزرسانی تعداد
function updateQuantity(itemId, newQuantity) {
    const item = cartData.items.find(item => item.id == itemId);
    if (item) {
        item.quantity = newQuantity;
        updateItemDisplay(itemId);
        updateCartCalculations();
        showNotification('تعداد محصول بروزرسانی شد', 'info');
    }
}

// نمایش تأیید حذف
function showDeleteConfirm(itemId) {
    itemToDelete = itemId;
    showModal('confirmDeleteModal');
}

// حذف آیتم
function removeItem(itemId) {
    cartData.items = cartData.items.filter(item => item.id != itemId);
    
    // بروزرسانی نمایش
    const itemElement = document.querySelector(`[data-item="${itemId}"]`).closest('.cart-item');
    if (itemElement) {
        itemElement.style.opacity = '0';
        itemElement.style.transform = 'translateX(20px)';
        setTimeout(() => {
            itemElement.remove();
            updateCartCalculations();
            checkEmptyCart();
            showNotification('محصول از سبد خرید حذف شد', 'info');
        }, 300);
    }
}

// بررسی سبد خرید خالی
function checkEmptyCart() {
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const emptyCart = document.getElementById('emptyCart');
    const cartItemsCount = document.getElementById('cartItemsCount');
    
    if (cartData.items.length === 0) {
        cartItemsContainer.classList.add('hidden');
        emptyCart.classList.remove('hidden');
        cartItemsCount.textContent = '۰ محصول';
        document.getElementById('checkoutBtn').disabled = true;
    } else {
        cartItemsCount.textContent = `${cartData.items.length} محصول`;
        document.getElementById('checkoutBtn').disabled = false;
    }
}

// بروزرسانی نمایش آیتم
function updateItemDisplay(itemId) {
    const item = cartData.items.find(item => item.id == itemId);
    if (item) {
        const input = document.querySelector(`.quantity-input[data-item="${itemId}"]`);
        const totalElement = document.querySelector(`.item-total[data-item="${itemId}"]`);
        
        if (input) input.value = item.quantity;
        if (totalElement) {
            const itemTotal = item.price * item.quantity;
            totalElement.textContent = formatPrice(itemTotal) + ' تومان';
        }
    }
}

// اعمال کد تخفیف
function applyCoupon() {
    const couponInput = document.getElementById('couponInput');
    const couponMessage = document.getElementById('couponMessage');
    const code = couponInput.value.trim();
    
    if (!code) {
        couponMessage.textContent = 'لطفا کد تخفیف را وارد کنید';
        couponMessage.className = 'mt-3 text-sm text-red-400';
        couponMessage.classList.remove('hidden');
        return;
    }
    
    // شبیه‌سازی اعتبارسنجی کد تخفیف
    const validCoupons = {
        'OFF20': 20000,
        'SAVE30': 30000,
        'WELCOME10': 10000
    };
    
    if (validCoupons[code]) {
        cartData.coupon.code = code;
        cartData.coupon.discount = validCoupons[code];
        cartData.coupon.applied = true;
        
        couponMessage.textContent = `کد تخفیف با موفقیت اعمال شد! ${formatPrice(validCoupons[code])} تومان تخفیف`;
        couponMessage.className = 'mt-3 text-sm text-emerald-400';
        couponMessage.classList.remove('hidden');
        
        couponInput.classList.add('coupon-success');
        couponInput.classList.remove('coupon-error');
        
        updateCartCalculations();
        showNotification('کد تخفیف با موفقیت اعمال شد', 'success');
    } else {
        couponMessage.textContent = 'کد تخفیف معتبر نیست';
        couponMessage.className = 'mt-3 text-sm text-red-400';
        couponMessage.classList.remove('hidden');
        
        couponInput.classList.add('coupon-error');
        couponInput.classList.remove('coupon-success');
        
        showNotification('کد تخفیف معتبر نیست', 'error');
    }
}

// انتخاب روش پرداخت
function selectPaymentMethod(method) {
    cartData.selectedPaymentMethod = method;
    
    // بروزرسانی نمایش
    document.querySelectorAll('.payment-method').forEach(el => {
        el.classList.remove('selected');
        const radio = el.querySelector('.payment-radio div:last-child');
        radio.classList.add('hidden');
    });
    
    const selectedMethod = document.querySelector(`[data-method="${method}"]`);
    selectedMethod.classList.add('selected');
    const selectedRadio = selectedMethod.querySelector('.payment-radio div:last-child');
    selectedRadio.classList.remove('hidden');
    
    // بروزرسانی محاسبات
    updateCartCalculations();
}

// محاسبات سبد خرید
function updateCartCalculations() {
    // محاسبه جمع کل
    let subtotal = 0;
    let totalDiscount = 0;
    
    cartData.items.forEach(item => {
        subtotal += item.price * item.quantity;
        totalDiscount += item.discount * item.quantity;
    });
    
    // اعمال کد تخفیف
    let couponDiscount = cartData.coupon.applied ? cartData.coupon.discount : 0;
    
    // محاسبه کسر از کیف پول
    let walletDeduction = 0;
    if (cartData.selectedPaymentMethod === 'wallet') {
        walletDeduction = Math.min(cartData.wallet, subtotal - couponDiscount);
    }
    
    // محاسبه مبلغ نهایی
    let total = subtotal - couponDiscount - walletDeduction;
    
    // بروزرسانی نمایش
    document.getElementById('subtotalAmount').textContent = formatPrice(subtotal);
    document.getElementById('productsDiscount').textContent = formatPrice(totalDiscount);
    
    const couponDiscountRow = document.getElementById('couponDiscountRow');
    const couponDiscountAmount = document.getElementById('couponDiscountAmount');
    
    if (couponDiscount > 0) {
        couponDiscountRow.classList.remove('hidden');
        couponDiscountAmount.textContent = formatPrice(couponDiscount);
    } else {
        couponDiscountRow.classList.add('hidden');
    }
    
    document.getElementById('walletDeduction').textContent = formatPrice(walletDeduction);
    document.getElementById('totalAmount').textContent = formatPrice(total);
    
    // بروزرسانی کیف پول باقی‌مانده
    const remainingWallet = cartData.wallet - walletDeduction;
    document.getElementById('remainingWallet').textContent = formatPrice(remainingWallet) + ' تومان';
    
    // بروزرسانی موجودی کیف پول
    document.getElementById('walletAmount').textContent = formatPrice(cartData.wallet);
}

// پردازش پرداخت
function processPayment() {
    const checkoutBtn = document.getElementById('checkoutBtn');
    
    // غیرفعال کردن دکمه برای جلوگیری از کلیک مجدد
    checkoutBtn.disabled = true;
    checkoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin ml-3"></i> در حال پردازش...';
    
    // شبیه‌سازی پردازش پرداخت
    setTimeout(() => {
        // محاسبه مبلغ نهایی
        let subtotal = 0;
        cartData.items.forEach(item => {
            subtotal += item.price * item.quantity;
        });
        
        let couponDiscount = cartData.coupon.applied ? cartData.coupon.discount : 0;
        let walletDeduction = cartData.selectedPaymentMethod === 'wallet' ? 
            Math.min(cartData.wallet, subtotal - couponDiscount) : 0;
        
        let total = subtotal - couponDiscount - walletDeduction;
        
        // کسر از کیف پول
        if (walletDeduction > 0) {
            cartData.wallet -= walletDeduction;
        }
        
        // تولید شماره سفارش
        const orderNumber = 'ORD-' + new Date().getFullYear() + '-' + 
            Math.random().toString().substr(2, 5);
        
        // تاریخ پرداخت
        const now = new Date();
        const paymentDate = now.toLocaleDateString('fa-IR') + ' - ' + 
            now.toLocaleTimeString('fa-IR', {hour: '2-digit', minute:'2-digit'});
        
        // بروزرسانی مودال موفقیت
        document.getElementById('orderNumber').textContent = orderNumber;
        document.getElementById('paymentDate').textContent = paymentDate;
        document.getElementById('paymentAmount').textContent = formatPrice(total) + ' تومان';
        
        // نمایش مودال موفقیت
        showModal('successModal');
        
        // ریست سبد خرید
        cartData.items = [];
        cartData.coupon = {
            code: "",
            discount: 0,
            applied: false
        };
        
        // بروزرسانی نمایش
        setTimeout(() => {
            document.getElementById('cartItemsContainer').innerHTML = '';
            checkEmptyCart();
            updateCartCalculations();
            
            // ریست دکمه پرداخت
            checkoutBtn.disabled = false;
            checkoutBtn.innerHTML = '<i class="fas fa-shopping-bag ml-3"></i> پرداخت و تکمیل خرید';
            
            // پاک کردن کد تخفیف
            document.getElementById('couponInput').value = '';
            document.getElementById('couponInput').classList.remove('coupon-success', 'coupon-error');
            document.getElementById('couponMessage').classList.add('hidden');
        }, 1000);
        
    }, 2000);
}

// نمایش مودال
function showModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// مخفی کردن مودال
function hideModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// نمایش نوتیفیکیشن
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-emerald-600' : 
                   type === 'error' ? 'bg-red-600' : 
                   'bg-indigo-600';
    
    notification.className = `fixed top-24 left-6 ${bgColor} text-white px-4 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
    notification.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} ml-2"></i>
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

// فرمت قیمت
function formatPrice(price) {
    return new Intl.NumberFormat('fa-IR').format(price);
}

// بستن مودال با کلیک بیرون
document.querySelectorAll('.modal-overlay').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            hideModal(this.id);
        }
    });
});

// بستن مودال با کلید Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.querySelectorAll('.modal-overlay.active').forEach(modal => {
            hideModal(modal.id);
        });
    }
});
