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
