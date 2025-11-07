const toggle = document.getElementById('theme-toggle');
const moon = document.getElementById('moon');
const sun = document.getElementById('sun');

// Load theme from localStorage
const savedTheme = localStorage.getItem('theme') || 'dark';

// Apply saved theme
if (savedTheme === 'light') {
    enableLightMode();
} 
else {
    enableDarkMode();
}

function enableLightMode() {
    document.documentElement.classList.add('light');
    document.documentElement.classList.remove('dark');
    moon.classList.add('hidden');
    sun.classList.remove('hidden');
    localStorage.setItem('theme', 'light');
}

function enableDarkMode() {
    document.documentElement.classList.add('dark');
    document.documentElement.classList.remove('light');
    sun.classList.add('hidden');
    moon.classList.remove('hidden');
    localStorage.setItem('theme', 'dark');
}

toggle.addEventListener('click', () => {
    if (document.documentElement.classList.contains('light')) {
        enableDarkMode();
    } 
    else {
        enableLightMode();
    }
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
