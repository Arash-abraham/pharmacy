// نوار پیشرفت اسکرول
window.addEventListener('scroll', function() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById('progressBar').style.width = scrolled + '%';
});

// فعال کردن لینک‌های فهرست مطالب هنگام اسکرول
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.toc-link');
    
    function activateNavLink() {
        let scrollY = window.pageYOffset;
        
        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');
            
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }
    
    window.addEventListener('scroll', activateNavLink);
    
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
    
    // هموارسازی اسکرول برای لینک‌های داخلی
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
                
                // بستن منوی موبایل در صورت باز بودن
                if (nav && !nav.classList.contains('hidden')) {
                    mobileMenuButton.click();
                }
            }
        });
    });
});
