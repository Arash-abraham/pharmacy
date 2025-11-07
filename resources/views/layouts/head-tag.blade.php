<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>@yield('title','Arash-Abraham')</title>
<meta name="description" content="وبلاگ شخصی Arash-abraham — جایی که هوش مصنوعی، کد، گیمینگ و زندگی با هم برخورد می‌کنند." />

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
    darkMode: 'class',
    theme: {
        extend: {
        colors: {
            'dark-bg': '#0a0a14',
            'dark-card': '#14142a',
            'dark-text': '#e2e8f0',
            'dark-muted': '#94a3b8',
            'dark-border': '#334155',
            
            'light-bg': '#f8fafc',
            'light-card': '#ffffff',
            'light-text': '#1e293b',
            'light-muted': '#64748b',
            'light-border': '#e2e8f0',
            
            'accent-red': '#ef4444',
            'accent-purple': '#a855f7',
            'accent-pink': '#ec4899',
        },
        fontFamily: {
            sans: ['Vazirmatn', 'ui-sans-serif', 'system-ui'],
        },
        animation: {
            'float': 'float 6s ease-in-out infinite',
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            'glow': 'glow 2s ease-in-out infinite alternate',
        },
        keyframes: {
            float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-20px)' } },
            glow: { '0%': { boxShadow: '0 0 20px rgba(168, 85, 247, 0.4)' }, '100%': { boxShadow: '0 0 40px rgba(239, 68, 68, 0.5)' } },
        }
        },
    },
    }
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" />

<style>
    .dir-ltr {
        direction: ltr;
    }
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-track { background: #f8fafc; }
    ::-webkit-scrollbar-thumb { background: rgba(168, 85, 247, 0.7); border-radius: 9999px; }
    ::-webkit-scrollbar-thumb:hover { background: #ef4444; }
    
    .dark ::-webkit-scrollbar-track { background: #0a0a14; }
    .dark ::-webkit-scrollbar-thumb { background: rgba(168, 85, 247, 0.7); }

    /* Glassmorphism */
    .glass { backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }

    /* Hero Background */
    .hero-bg { background: #0a0a14; }
    .light .hero-bg { background: #f8fafc; }

    html {
        scroll-behavior: smooth;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes glow {
        0% { box-shadow: 0 0 20px rgba(168, 85, 247, 0.4); }
        100% { box-shadow: 0 0 40px rgba(239, 68, 68, 0.5); }
    }
    
    section {
        scroll-margin-top: 80px;
    }
</style>