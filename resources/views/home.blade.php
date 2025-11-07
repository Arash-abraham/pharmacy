<!DOCTYPE html>
<html lang="fa" dir="rtl" class="dark scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Arash-abraham | Home</title>
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
    </head>

    <body class="bg-light-bg dark:bg-dark-bg text-light-text dark:text-dark-text min-h-screen font-sans transition-all duration-500">

        <!-- Theme Toggle -->
        <button id="theme-toggle" class="fixed top-6 left-6 z-50 p-3 rounded-full glass border border-accent-purple/30 hover:border-accent-red/50 transition-all hover:scale-110 shadow-lg bg-white/80 dark:bg-dark-card/80">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path id="moon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                <path id="sun" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707-.707M6.343 17.657l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
        </button>

        <!-- Navigation -->
        <nav class="fixed top-0 w-full bg-white/70 dark:bg-dark-card/70 glass backdrop-blur-xl border-b border-light-border dark:border-dark-border z-40">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="text-2xl font-black bg-gradient-to-r from-accent-red via-accent-purple to-accent-pink bg-clip-text text-transparent">
                        Arash-abraham
                    </a>
                    <div class="hidden md:flex items-center space-x-reverse space-x-8 text-sm font-medium">
                        <a href="#home" class="hover:text-accent-purple transition">خانه</a>
                        <a href="#posts" class="hover:text-accent-purple transition">نوشته‌ها</a>
                        <a href="#about" class="hover:text-accent-purple transition">درباره من</a>
                        <a href="#contact" class="hover:text-accent-red transition">تماس</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="hero-bg pt-32 pb-24 px-6 relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-20 left-20 w-96 h-96 bg-accent-purple rounded-full blur-3xl animate-pulse-slow"></div>
                <div class="absolute bottom-20 right-20 w-80 h-80 bg-accent-red rounded-full blur-3xl animate-pulse"></div>
            </div>
            <div class="max-w-5xl mx-auto text-center relative z-10">
                <div class="mb-8 animate-float">
                    <img src="{{ asset('img/photo_2025-10-23_13-04-02.jpg') }}" alt="Arash-abraham" class="w-40 h-40 rounded-full mx-auto border-4 border-accent-purple/50 shadow-2xl animate-glow object-cover" />
                </div>
                <h1 class="text-6xl md:text-8xl font-black mb-6 bg-gradient-to-r from-accent-red via-accent-purple to-accent-pink bg-clip-text text-transparent">
                    Arash-abraham
                </h1>
                <p class="text-2xl md:text-3xl mb-8 font-light">
                    توسعه‌دهنده بک‌اند | در راه Full-Stack
                </p>
                <p class="text-lg text-light-muted dark:text-dark-muted max-w-2xl mx-auto mb-10 leading-relaxed">
                    اینجا جاییه که راجب هرچیزی از جمله کد ، گیم ، انیمه و تاریخ حرف می‌زنم.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="#posts" class="px-8 py-4 bg-gradient-to-r from-accent-red to-accent-purple rounded-full font-bold text-white hover:scale-105 transition transform shadow-lg">
                        نوشته‌هام
                    </a>
                    <a href="#about" class="px-8 py-4 border-2 border-accent-purple rounded-full font-bold hover:bg-accent-purple/10 transition">
                        درباره من
                    </a>
                </div>
            </div>
        </section>

        <!-- Featured Post -->
        <section id="featured" class="px-6 py-16">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl font-bold mb-12 text-center bg-gradient-to-r from-accent-red to-accent-purple bg-clip-text text-transparent">
                    نوشتهٔ ویژه
                </h2>
                <article class="bg-white dark:bg-dark-card/80 glass rounded-3xl p-10 shadow-2xl border border-light-border dark:border-dark-border hover:border-accent-red/50 transition-all hover:animate-glow">
                    <div class="grid md:grid-cols-3 gap-8 items-center">
                        <div class="md:col-span-1">
                            <div class="bg-gradient-to-br from-accent-red to-accent-purple rounded-2xl h-64 flex items-center justify-center text-8xl font-black text-white/10">
                                A
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <h3 class="text-3xl font-bold mb-4">وقتی یک بک‌اند دولوپر فرانت‌اند رو هک می‌کنه</h3>
                            <p class="text-light-muted dark:text-dark-muted mb-6 leading-relaxed">
                                تجربه‌ای از ساخت یک UI خفن با Tailwind و بدون نفرت همیشگی از فرانت‌اند. آیا می‌شه عاشق CSS شد؟
                            </p>
                            <div class="flex flex-wrap gap-3 mb-6">
                                <span class="px-3 py-1 bg-accent-purple/20 rounded-full text-xs text-accent-purple">Tailwind</span>
                                <span class="px-3 py-1 bg-accent-red/20 rounded-full text-xs text-accent-red">فرانت‌اند</span>
                                <span class="px-3 py-1 bg-accent-pink/20 rounded-full text-xs text-accent-pink">تجربه شخصی</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-light-muted dark:text-dark-muted">
                                <span>۷ نوامبر ۱۴۰۴</span>
                                <a href="#" class="text-accent-purple hover:text-accent-red font-medium flex items-center gap-1">
                                    ادامه خواندن <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <!-- Recent Posts -->
        <section id="posts" class="px-6 py-20">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl font-bold mb-16 text-center bg-gradient-to-r from-accent-red via-accent-purple to-accent-pink bg-clip-text text-transparent">
                    آخرین نوشته‌ها
                </h2>
                
                <a href="" class="text-accent-red hover:text-accent-red/80 transition-colors">
                    <div class="flex items-center gap-2">
                        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M7 7h10v10"/>
                        </svg>
                        <span class="text-sm font-kalamehMedium">همه نوشته ها</span>
                    </div>
                </a>

                <br/>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Post 1 -->
                    <article class="group bg-white dark:bg-dark-card/70 glass rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all hover:-translate-y-2 border border-light-border dark:border-dark-border hover:border-accent-red/40">
                        <div class="h-56 bg-gradient-to-br from-accent-purple/40 to-accent-red/40 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition"></div>
                            <div class="flex items-center justify-center h-full">
                                <span class="text-7xl font-black text-white/20">۱</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 group-hover:text-accent-purple transition">لینوکس روی سیستم گیمینگ: جنگ یا صلح؟</h3>
                            <p class="text-light-muted dark:text-dark-muted text-sm mb-4">
                                تجربه نصب اوبونتو روی RX 580 و مادربرد H610 — از برفک صفحه تا گیمینگ روان.
                            </p>
                            <div class="flex justify-between items-center text-xs text-light-muted dark:text-dark-muted">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span>۱.۲K</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span>۴۲</span>
                                    </div>
                                </div>
                                <a href="#" class="text-accent-purple group-hover:text-accent-red">بخوان</a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Post 2 -->
                    <article class="group bg-white dark:bg-dark-card/70 glass rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all hover:-translate-y-2 border border-light-border dark:border-dark-border hover:border-accent-purple/40">
                        <div class="h-56 bg-gradient-to-br from-accent-pink/40 to-accent-purple/40 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition"></div>
                            <div class="flex items-center justify-center h-full">
                                <span class="text-7xl font-black text-white/20">۲</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 group-hover:text-accent-purple transition">چرا هنوز از PHP استفاده می‌کنم؟</h3>
                            <p class="text-light-muted dark:text-dark-muted text-sm mb-4">
                                دفاع از یک زبان قدیمی در دنیای Node.js و Python — مزایایی که نمی‌بینید.
                            </p>
                            <div class="flex justify-between items-center text-xs text-light-muted dark:text-dark-muted">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span>۲.۵K</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span>۸۷</span>
                                    </div>
                                </div>
                                <a href="#" class="text-accent-purple group-hover:text-accent-red">بخوان</a>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Post 3 -->
                    <article class="group bg-white dark:bg-dark-card/70 glass rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all hover:-translate-y-2 border border-light-border dark:border-dark-border hover:border-accent-pink/40">
                        <div class="h-56 bg-gradient-to-br from-accent-red/40 to-accent-pink/40 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition"></div>
                            <div class="flex items-center justify-center h-full">
                                <span class="text-7xl font-black text-white/20">۳</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 group-hover:text-accent-purple transition">گیمینگ با RX 580 در سال ۲۰۲۴</h3>
                            <p class="text-light-muted dark:text-dark-muted text-sm mb-4">
                                هنوز هم می‌تونه جدیدترین بازی‌ها رو اجرا کنه؟ تست عملکرد در بازی‌های مختلف.
                            </p>
                            <div class="flex justify-between items-center text-xs text-light-muted dark:text-dark-muted">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span>۳.۱K</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <span>۱۲۴</span>
                                    </div>
                                </div>
                                <a href="#" class="text-accent-purple group-hover:text-accent-red">بخوان</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="px-6 py-24">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold mb-16 text-center bg-gradient-to-r from-accent-red to-accent-purple bg-clip-text text-transparent">
                    درباره Arash-abraham
                </h2>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="order-2 md:order-1">
                        <img src="{{ asset('img/photo_2025-10-23_13-04-02.jpg') }}" alt="Arash-abraham" class="w-full rounded-2xl shadow-2xl glow border-4 border-accent-purple/50" />
                    </div>
                    <div class="order-1 md:order-2 space-y-6">
                        <h3 class="text-3xl font-bold">سلام، من Arash-abraham هستم</h3>
                        <p class="text-lg text-light-muted dark:text-dark-muted leading-relaxed">
                            یه توسعه‌دهنده بک‌اند که از فرانت‌اند متنفره (ولی گاهی مجبوره باهاش دوست بشه). 
                            عاشق لینوکس، گیمینگ با RX 580، و گپ زدن با هوش مصنوعی درباره آینده.
                        </p>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div><span class="text-accent-purple font-medium">زبان‌ها:</span> PHP, Node.js, Python, JS</div>
                            <div><span class="text-accent-red font-medium">فریم‌ورک‌ها:</span> Laravel, Next.js, LiveWire</div>
                            <div><span class="text-accent-pink font-medium">علاقه‌مندی‌ها:</span> گیمینگ، انیمه، هوش مصنوعی</div>
                            <div><span class="text-accent-purple font-medium">سیستم:</span> Ubuntu + RX 580</div>
                        </div>
                        <div class="flex gap-4 mt-8">
                            <a href="https://github.com" class="p-3 bg-accent-purple/20 rounded-full hover:bg-accent-purple/40 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                            <a href="https://instagram.com" class="p-3 bg-accent-red/20 rounded-full hover:bg-accent-red/40 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Contact Section -->
        <section id="contact" class="px-6 py-16 bg-light-bg dark:bg-dark-bg">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4 bg-gradient-to-r from-accent-red to-accent-purple bg-clip-text text-transparent">
                        تماس با من
                    </h2>
                    <p class="text-light-muted dark:text-dark-muted text-sm">پیامت رو برام بفرست، خوشحال می‌شم بشنوم</p>
                </div>
                
                <div class="bg-white dark:bg-dark-card/90 glass rounded-2xl p-8 shadow-xl border border-light-border dark:border-dark-border hover:shadow-2xl transition-all">
                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="name" class="block text-xs font-medium text-light-muted dark:text-dark-muted">نام شما</label>
                                <input type="text" id="name" class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm" placeholder="اسمتون رو وارد کنید">
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="block text-xs font-medium text-light-muted dark:text-dark-muted">ایمیل</label>
                                <input type="email" id="email" class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm" placeholder="email@example.com">
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="subject" class="block text-xs font-medium text-light-muted dark:text-dark-muted">موضوع</label>
                            <input type="text" id="subject" class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm" placeholder="موضوع پیام">
                        </div>
                        
                        <div class="space-y-2">
                            <label for="message" class="block text-xs font-medium text-light-muted dark:text-dark-muted">پیام شما</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm resize-none" placeholder="پیامتون رو اینجا بنویسید..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-accent-red to-accent-purple rounded-xl font-bold text-white hover:scale-[1.02] transition-transform shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group">
                            <span>ارسال پیام</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                    
                    <div class="mt-6 pt-6 border-t border-light-border dark:border-dark-border">
                        <div class="flex items-center justify-center gap-6 text-xs text-light-muted dark:text-dark-muted">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span>arash@example.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white/90 dark:bg-dark-card/90 glass backdrop-blur-xl border-t border-light-border dark:border-dark-border">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <a href="#" class="text-2xl font-black bg-gradient-to-r from-accent-red via-accent-purple to-accent-pink bg-clip-text text-transparent inline-block">
                            Arash-abraham
                        </a>
                        <p class="text-light-muted dark:text-dark-muted text-sm mt-3 leading-relaxed">
                            توسعه‌دهنده بک‌اند، عاشق لینوکس. اینجا درباره تکنولوژی، کد و زندگی می‌نویسم.
                        </p>
                        <div class="flex gap-3 mt-4">
                            <a href="#" class="p-2 bg-accent-purple/10 rounded-lg hover:bg-accent-purple/20 transition hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </a>
                            <a href="#" class="p-2 bg-accent-purple/10 rounded-lg hover:bg-accent-purple/20 transition hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <a href="#" class="p-2 bg-accent-purple/10 rounded-lg hover:bg-accent-purple/20 transition hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-bold mb-4">آخرین پست‌ها</h3>
                        <div class="space-y-3">
                            <a href="#" class="group flex items-start gap-3 p-2 rounded-lg hover:bg-white/50 dark:hover:bg-dark-card/50 transition">
                                <div class="w-10 h-10 bg-gradient-to-br from-accent-purple to-accent-red rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0">
                                    لینوکس
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium group-hover:text-accent-purple transition line-clamp-2">لینوکس روی سیستم گیمینگ</h4>
                                    <p class="text-xs text-light-muted dark:text-dark-muted mt-1">۶ نوامبر</p>
                                </div>
                            </a>
                            
                            <a href="#" class="group flex items-start gap-3 p-2 rounded-lg hover:bg-white/50 dark:hover:bg-dark-card/50 transition">
                                <div class="w-10 h-10 bg-gradient-to-br from-accent-red to-accent-pink rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0">
                                    PHP
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium group-hover:text-accent-purple transition line-clamp-2">چرا هنوز از PHP استفاده می‌کنم؟</h4>
                                    <p class="text-xs text-light-muted dark:text-dark-muted mt-1">۵ نوامبر</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="md:col-span-3 mt-4">
                        <div class="bg-gradient-to-r from-accent-purple/10 to-accent-red/10 rounded-xl p-4 border border-accent-purple/20">
                            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                                <div class="text-center md:text-right">
                                    <h3 class="text-base font-bold mb-1">آماده همکاری هستی؟</h3>
                                    <p class="text-sm text-light-muted dark:text-dark-muted">بیا با هم یه پروژه خفن بسازیم</p>
                                </div>
                                <div class="flex gap-2">
                                    <a href="#contact" class="px-4 py-2 bg-gradient-to-r from-accent-red to-accent-purple rounded-lg text-white font-bold hover:scale-105 transition shadow">
                                        شروع پروژه
                                    </a>
                                    <a href="#about" class="px-4 py-2 border border-accent-purple rounded-lg font-bold hover:bg-accent-purple/10 transition">
                                        درباره من
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-gradient-to-r from-transparent via-accent-purple/30 to-transparent my-6"></div>
                <div class="flex flex-col md:flex-row justify-between items-center text-xs text-light-muted dark:text-dark-muted">
                    <p>© ۱۴۰۴ Arash-abraham - ساخته شده با Tailwind و عشق</p>
                    <p class="mt-1 md:mt-0">کدها در <span class="text-accent-purple">GitHub</span> موجود است</p>
                </div>
            </div>
        </footer>

    <!-- Theme Toggle Script -->
    <script>
        const toggle = document.getElementById('theme-toggle');
        const moon = document.getElementById('moon');
        const sun = document.getElementById('sun');

        // Load theme from localStorage
        const savedTheme = localStorage.getItem('theme') || 'dark';

        // Apply saved theme
        if (savedTheme === 'light') {
        enableLightMode();
        } else {
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
        } else {
            enableLightMode();
        }
        });
        
        // اسکرول نرم برای لینک‌های داخلی
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
    </script>
    </body>
</html>