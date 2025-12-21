// نوار پیشرفت اسکرول
window.addEventListener('scroll', function() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById('progressBar').style.width = scrolled + '%';
});

// انیمیشن مهارت‌ها
function animateSkills() {
    const skillLevels = document.querySelectorAll('.skill-level');
    skillLevels.forEach(skill => {
        const width = skill.style.width;
        skill.style.width = '0';
        setTimeout(() => {
            skill.style.width = width;
        }, 100);
    });
}

// مشاهده برای انیمیشن مهارت‌ها
const observerOptions = {
    threshold: 0.5
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateSkills();
        }
    });
}, observerOptions);

// مشاهده بخش تیم
const teamSection = document.querySelector('.developer-card');
if (teamSection) {
    observer.observe(teamSection);
}

// مدیریت منوی موبایل
document.addEventListener('DOMContentLoaded', function() {
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
});
