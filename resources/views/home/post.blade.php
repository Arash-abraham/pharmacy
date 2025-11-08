<!DOCTYPE html>
<html lang="fa" dir="rtl" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>وقتی یک بک‌اند دولوپر فرانت‌اند رو هک می‌کنه</title>
    <meta name="description" content="تجربه‌ای از ساخت یک UI خفن با Tailwind و بدون نفرت همیشگی از فرانت‌اند. آیا می‌شه عاشق CSS شد؟" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="http://127.0.0.1:8000/js/head-tag.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
    
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
        
        .post-content h2 {
            font-size: 1.875rem;
            font-weight: bold;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #ef4444;
        }
        
        .post-content h3 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            color: #a855f7;
        }
        
        .post-content p {
            margin-bottom: 1rem;
            line-height: 1.8;
        }
        
        .post-content ul, .post-content ol {
            margin-right: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .post-content li {
            margin-bottom: 0.5rem;
        }
        
        .post-content code {
            background-color: rgba(168, 85, 247, 0.1);
            padding: 0.125rem 0.375rem;
            border-radius: 0.375rem;
            font-family: monospace;
            font-size: 0.875rem;
        }
        
        .post-content pre {
            background-color: rgba(15, 23, 42, 0.8);
            padding: 1rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            margin-bottom: 1.5rem;
        }
        
        .post-content blockquote {
            border-right: 4px solid #a855f7;
            padding-right: 1rem;
            margin: 1.5rem 0;
            font-style: italic;
            background-color: rgba(168, 85, 247, 0.05);
            padding: 1rem;
            border-radius: 0.5rem;
        }
        
        .post-content img {
            border-radius: 0.75rem;
            margin: 1.5rem 0;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .comment-reply {
            margin-right: 3rem;
            border-right: 2px solid rgba(168, 85, 247, 0.3);
            padding-right: 1rem;
        }
    </style>
</head>

<body class="bg-light-bg dark:bg-dark-bg text-light-text dark:text-dark-text min-h-screen font-sans transition-all duration-500">
    <!-- Header Section -->
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
                <a href="index.html" class="text-2xl font-black bg-gradient-to-r from-accent-red via-accent-purple to-accent-pink bg-clip-text text-transparent">
                    Arash-abraham
                </a>
                <div class="hidden md:flex items-center space-x-reverse space-x-8 text-sm font-medium">
                    <a href="index.html#home" class="hover:text-accent-purple transition">خانه</a>
                    <a href="index.html#posts" class="hover:text-accent-purple transition">نوشته‌ها</a>
                    <a href="index.html#about" class="hover:text-accent-purple transition">درباره من</a>
                    <a href="index.html#contact" class="hover:text-accent-red transition">تماس</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Post Header -->
    <section class="pt-32 pb-16 px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-96 h-96 bg-accent-purple rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-20 w-80 h-80 bg-accent-red rounded-full blur-3xl animate-pulse"></div>
        </div>
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <div class="flex flex-wrap justify-center gap-3 mb-6">
                <span class="px-3 py-1 bg-accent-purple/20 rounded-full text-xs text-accent-purple">Tailwind</span>
                <span class="px-3 py-1 bg-accent-red/20 rounded-full text-xs text-accent-red">فرانت‌اند</span>
                <span class="px-3 py-1 bg-accent-pink/20 rounded-full text-xs text-accent-pink">تجربه شخصی</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-accent-red via-accent-purple to-accent-pink bg-clip-text text-transparent">
                وقتی یک بک‌اند دولوپر فرانت‌اند رو هک می‌کنه
            </h1>
            <p class="text-lg text-light-muted dark:text-dark-muted max-w-2xl mx-auto mb-6 leading-relaxed">
                تجربه‌ای از ساخت یک UI خفن با Tailwind و بدون نفرت همیشگی از فرانت‌اند. آیا می‌شه عاشق CSS شد؟
            </p>
            <div class="flex items-center justify-center gap-4 text-sm text-light-muted dark:text-dark-muted">
                <span>۷ نوامبر ۱۴۰۴</span>
                <span>•</span>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>۱.۲K</span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span>۴۲</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Post Content -->
    <section class="px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white dark:bg-dark-card/80 glass rounded-3xl p-8 shadow-2xl border border-light-border dark:border-dark-border">
                <div class="post-content">
                    <p class="text-lg mb-6">
                        همیشه به عنوان یک توسعه‌دهنده بک‌اند، از کار با CSS و فرانت‌اند فراری بودم. رابط کاربری برای من همیشه یک مانع بزرگ بود تا اینکه با Tailwind آشنا شدم و دنیای جدیدی برایم باز شد.
                    </p>
                    
                    <img src="tailwind.jpg" alt="Tailwind CSS Experience" class="w-full rounded-2xl shadow-xl my-8">
                    
                    <h2>اولین برخورد با Tailwind</h2>
                    
                    <p>
                        یادم می‌آید اولین باری که Tailwind را دیدم، با خودم گفتم: "این چه آشغالی است؟ چرا باید این همه کلاس به المان‌ها اضافه کنم؟" اما بعد از چند پروژه کوچک، متوجه شدم که چقدر سریع می‌توانم رابط کاربری بسازم.
                    </p>
                    
                    <div class="bg-gradient-to-br from-accent-purple/10 to-accent-red/10 rounded-2xl p-6 my-8 border border-accent-purple/20">
                        <h3 class="text-xl font-bold mb-4 text-accent-purple">نکته طلایی</h3>
                        <p class="mb-0">
                            Tailwind به شما اجازه می‌دهد بدون ترک فایل HTML، استایل‌های پیچیده ایجاد کنید. این برای توسعه‌دهندگان بک‌اند که عادت به جا به جایی بین فایل‌ها ندارند، یک موهبت است.
                        </p>
                    </div>
                    
                    <h2>مقایسه با CSS معمولی</h2>
                    
                    <p>
                        در گذشته، برای ساخت یک کارت ساده باید فایل CSS جداگانه می‌نوشتم:
                    </p>
                    
                    <pre class="text-white"><code>.card {
    background: white;
    border-radius: 0.5rem;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #e2e8f0;
}</code></pre>
                    
                    <p>
                        اما با Tailwind فقط کافی است کلاس‌ها را به المان اضافه کنم:
                    </p>
                    
                    <pre class="text-white"><code>&lt;div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200"&gt;
    محتوای کارت
&lt;/div&gt;</code></pre>
                    
                    <h2>تجربه شخصی من</h2>
                    
                    <p>
                        در پروژه اخیرم، تصمیم گرفتم کل فرانت‌اند را خودم با Tailwind بسازم. نتیجه شگفت‌انگیز بود:
                    </p>
                    
                    <ul>
                        <li>سرعت توسعه ۳ برابر شد</li>
                        <li>نیاز به تصمیم‌گیری برای نام کلاس‌ها از بین رفت</li>
                        <li>Design System یکپارچه‌ای داشتم</li>
                        <li>رابط کاربری responsive به راحتی پیاده‌سازی شد</li>
                    </ul>
                    
                    <blockquote>
                        "Tailwind CSS مانند داشتن یک جعبه ابزار کامل است که به شما اجازه می‌دهد بدون دردسر، هر المان UI که می‌خواهید بسازید."
                    </blockquote>
                    
                    <h2>نتیجه‌گیری</h2>
                    
                    <p>
                        اگر شما هم یک توسعه‌دهنده بک‌اند هستید و از فرانت‌اند می‌ترسید، Tailwind می‌تواند ناجی شما باشد. این فریم‌ورک به شما امکان می‌دهد رابط کاربری زیبا و responsive بسازید بدون اینکه مجبور باشید CSS پیشرفته بدانید.
                    </p>
                    
                    <p>
                        امتحان کردن آن ضرری ندارد. شاید شما هم مثل من، از یک توسعه‌دهنده بک‌اند که از CSS فراری بود، به کسی تبدیل شوید که از ساختن رابط کاربری لذت می‌برد!
                    </p>
                </div>
                
                <!-- Post Actions -->
                <div class="mt-12 pt-8 border-t border-light-border dark:border-dark-border">
                    <div class="flex flex-wrap justify-between items-center gap-4">
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-accent-purple/10 text-accent-purple rounded-lg hover:bg-accent-purple/20 transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                </svg>
                                <span>۱۲۴ پسند</span>
                            </button>
                            
                            <button class="px-4 py-2 bg-accent-red/10 text-accent-red rounded-lg hover:bg-accent-red/20 transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span>اشتراک‌گذاری</span>
                            </button>
                        </div>
                        
                        <a href="index.html#posts" class="px-4 py-2 border border-accent-purple rounded-lg font-bold hover:bg-accent-purple/10 transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>بازگشت به نوشته‌ها</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Comments Section -->
            <div class="mt-12 bg-white dark:bg-dark-card/80 glass rounded-2xl p-8 shadow-xl border border-light-border dark:border-dark-border">
                <h3 class="text-2xl font-bold mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-accent-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    نظرات (۸)
                </h3>
                
                <!-- Comment Form -->
                <div class="mb-8 p-6 bg-gradient-to-br from-accent-purple/5 to-accent-red/5 rounded-xl border border-accent-purple/20">
                    <h4 class="font-bold mb-4 text-lg">نظر خود را بنویسید</h4>
                    <form class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="comment-name" class="block text-sm font-medium text-light-muted dark:text-dark-muted">نام شما</label>
                                <input type="text" id="comment-name" class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm" placeholder="اسمتون رو وارد کنید" required>
                            </div>
                            <div class="space-y-2">
                                <label for="comment-email" class="block text-sm font-medium text-light-muted dark:text-dark-muted">ایمیل</label>
                                <input type="email" id="comment-email" class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm" placeholder="email@example.com" required>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="comment-message" class="block text-sm font-medium text-light-muted dark:text-dark-muted">نظر شما</label>
                            <textarea id="comment-message" rows="4" class="w-full px-4 py-3 rounded-xl bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm resize-none" placeholder="نظرتون رو اینجا بنویسید..." required></textarea>
                        </div>
                        
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-accent-red to-accent-purple rounded-xl font-bold text-white hover:scale-[1.02] transition-transform shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group">
                            <span>ارسال نظر</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>
                
                <!-- Comments List -->
                <div class="space-y-6">
                    <!-- Comment 1 -->
                    <div class="bg-white/50 dark:bg-dark-card/50 rounded-xl p-6 border border-light-border dark:border-dark-border">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent-purple to-accent-red rounded-full flex items-center justify-center text-white font-bold text-lg">
                                م
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="font-bold">محمد رضایی</h5>
                                    <span class="text-xs text-light-muted dark:text-dark-muted">۲ روز پیش</span>
                                </div>
                                <p class="text-sm text-light-muted dark:text-dark-muted mb-3 leading-relaxed">
                                    واقعاً همینه! منم همیشه از CSS فراری بودم تا اینکه Tailwind رو امتحان کردم. حالا حتی دارم فرانت‌اند پروژه‌هام رو خودم می‌نویسم!
                                </p>
                                <div class="flex items-center gap-4 text-xs">
                                    <button class="flex items-center gap-1 text-accent-purple hover:text-accent-red transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                        </svg>
                                        <span>۱۲</span>
                                    </button>
                                    <button class="flex items-center gap-1 text-light-muted dark:text-dark-muted hover:text-accent-purple transition reply-btn">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                        </svg>
                                        <span>پاسخ</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Reply 1 -->
                        <div class="comment-reply mt-4">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-accent-red to-accent-pink rounded-full flex items-center justify-center text-white font-bold text-sm">
                                    ع
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h5 class="font-bold text-sm">علی محمدی</h5>
                                        <span class="text-xs text-light-muted dark:text-dark-muted">۱ روز پیش</span>
                                    </div>
                                    <p class="text-sm text-light-muted dark:text-dark-muted mb-3 leading-relaxed">
                                        دقیقاً! منم همین تجربه رو داشتم. Tailwind واقعاً بازی رو عوض کرده.
                                    </p>
                                    <div class="flex items-center gap-4 text-xs">
                                        <button class="flex items-center gap-1 text-accent-purple hover:text-accent-red transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                            </svg>
                                            <span>۳</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment 2 -->
                    <div class="bg-white/50 dark:bg-dark-card/50 rounded-xl p-6 border border-light-border dark:border-dark-border">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent-pink to-accent-purple rounded-full flex items-center justify-center text-white font-bold text-lg">
                                س
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="font-bold">سارا کریمی</h5>
                                    <span class="text-xs text-light-muted dark:text-dark-muted">۳ روز پیش</span>
                                </div>
                                <p class="text-sm text-light-muted dark:text-dark-muted mb-3 leading-relaxed">
                                    من به عنوان یک توسعه‌دهنده فرانت‌اند، باید بگم که Tailwind واقعاً زندگی رو راحت کرده. مخصوصاً برای پروژه‌های کوچک و متوسط که نمی‌خوایم وقت زیادی رو صرف تنظیمات CSS کنیم.
                                </p>
                                <div class="flex items-center gap-4 text-xs">
                                    <button class="flex items-center gap-1 text-accent-purple hover:text-accent-red transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                        </svg>
                                        <span>۸</span>
                                    </button>
                                    <button class="flex items-center gap-1 text-light-muted dark:text-dark-muted hover:text-accent-purple transition reply-btn">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                        </svg>
                                        <span>پاسخ</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment 3 -->
                    <div class="bg-white/50 dark:bg-dark-card/50 rounded-xl p-6 border border-light-border dark:border-dark-border">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent-red to-accent-pink rounded-full flex items-center justify-center text-white font-bold text-lg">
                                ر
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="font-bold">رضا احمدی</h5>
                                    <span class="text-xs text-light-muted dark:text-dark-muted">۴ روز پیش</span>
                                </div>
                                <p class="text-sm text-light-muted dark:text-dark-muted mb-3 leading-relaxed">
                                    یه سوال داشتم: برای پروژه‌های بزرگ و تیم‌های چندنفره، استفاده از Tailwind رو توصیه می‌کنید؟ نگرانم که فایل HTML شلوغ بشه.
                                </p>
                                <div class="flex items-center gap-4 text-xs">
                                    <button class="flex items-center gap-1 text-accent-purple hover:text-accent-red transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                        </svg>
                                        <span>۵</span>
                                    </button>
                                    <button class="flex items-center gap-1 text-light-muted dark:text-dark-muted hover:text-accent-purple transition reply-btn">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                        </svg>
                                        <span>پاسخ</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Load More Comments -->
                <div class="text-center mt-8">
                    <button class="px-6 py-3 border border-accent-purple rounded-xl font-bold hover:bg-accent-purple/10 transition flex items-center gap-2 mx-auto">
                        <span>نمایش نظرات بیشتر</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Author Info -->
            <div class="mt-12 bg-white dark:bg-dark-card/80 glass rounded-2xl p-6 shadow-xl border border-light-border dark:border-dark-border">
                <div class="flex items-center gap-4">
                    <img src="http://127.0.0.1:8000/img/photo_2025-10-23_13-04-02.jpg" alt="Arash-abraham" class="w-16 h-16 rounded-full border-2 border-accent-purple/50" />
                    <div>
                        <h3 class="text-xl font-bold">Arash-abraham</h3>
                        <p class="text-light-muted dark:text-dark-muted text-sm mt-1">
                            توسعه‌دهنده بک‌اند که گاهی با فرانت‌اند صلح می‌کند! عاشق کد زدن توی تاریکی، کشف اسرار تاریخ، غرق شدن در دنیای انیمه و گیم.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Related Posts -->
            <div class="mt-12">
                <h3 class="text-2xl font-bold mb-6 text-center">نوشته‌های مرتبط</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="#" class="group bg-white dark:bg-dark-card/70 glass rounded-2xl p-5 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 border border-light-border dark:border-dark-border hover:border-accent-purple/40">
                        <div class="flex items-start gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-accent-purple to-accent-red rounded-lg flex items-center justify-center text-white text-lg font-bold shrink-0">
                                <span>پ</span>
                            </div>
                            <div>
                                <h4 class="font-bold group-hover:text-accent-purple transition line-clamp-2">چرا هنوز از PHP استفاده می‌کنم؟</h4>
                                <p class="text-xs text-light-muted dark:text-dark-muted mt-2">۵ نوامبر</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="group bg-white dark:bg-dark-card/70 glass rounded-2xl p-5 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 border border-light-border dark:border-dark-border hover:border-accent-red/40">
                        <div class="flex items-start gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-accent-red to-accent-pink rounded-lg flex items-center justify-center text-white text-lg font-bold shrink-0">
                                <span>ل</span>
                            </div>
                            <div>
                                <h4 class="font-bold group-hover:text-accent-purple transition line-clamp-2">لینوکس روی سیستم گیمینگ: جنگ یا صلح؟</h4>
                                <p class="text-xs text-light-muted dark:text-dark-muted mt-2">۶ نوامبر</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-white/90 dark:bg-dark-card/90 glass backdrop-blur-xl border-t border-light-border dark:border-dark-border">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- بخش اطلاعات شخصی -->
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
    
                <!-- بخش جدید: تکنولوژی‌ها -->
                <div>
                    <h3 class="font-bold mb-4">تکنولوژی‌ها</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 bg-accent-purple/10 text-accent-purple text-xs rounded-lg border border-accent-purple/20">PHP</span>
                        <span class="px-2 py-1 bg-accent-red/10 text-accent-red text-xs rounded-lg border border-accent-red/20">Laravel</span>
                        <span class="px-2 py-1 bg-accent-pink/10 text-accent-pink text-xs rounded-lg border border-accent-pink/20">Node.js</span>
                        <span class="px-2 py-1 bg-accent-purple/10 text-accent-purple text-xs rounded-lg border border-accent-purple/20">Linux</span>
                        <span class="px-2 py-1 bg-accent-red/10 text-accent-red text-xs rounded-lg border border-accent-red/20">MySQL</span>
                        <span class="px-2 py-1 bg-accent-pink/10 text-accent-pink text-xs rounded-lg border border-accent-pink/20">Git</span>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-xs font-bold mb-2 text-light-muted dark:text-dark-muted">در حال یادگیری</h4>
                        <div class="flex gap-2">
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 text-xs rounded-lg border border-gray-200 dark:border-gray-700">AI/ML</span>
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 text-xs rounded-lg border border-gray-200 dark:border-gray-700">Rust</span>
                        </div>
                    </div>
                </div>
    
                <!-- بخش آخرین پست‌ها (حالا سمت راست‌تر) -->
                <div>
                    <h3 class="font-bold mb-4">آخرین پست‌ها</h3>
                    <div class="space-y-3">
                        <a href="#" class="group flex items-start gap-3 p-2 rounded-lg hover:bg-white/50 dark:hover:bg-dark-card/50 transition">
                            <div class="w-10 h-10 bg-gradient-to-br from-accent-purple to-accent-red rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0">
                                <img src="http://127.0.0.1:8000/img/photo_2025-10-23_13-04-02.jpg" alt="">
                            </div>
                            <div>
                                <h4 class="text-sm font-medium group-hover:text-accent-purple transition line-clamp-2">لینوکس روی سیستم گیمینگ</h4>
                                <p class="text-xs text-light-muted dark:text-dark-muted mt-1">۶ نوامبر</p>
                            </div>
                        </a>
                        
                        <a href="#" class="group flex items-start gap-3 p-2 rounded-lg hover:bg-white/50 dark:hover:bg-dark-card/50 transition">
                            <div class="w-10 h-10 bg-gradient-to-br from-accent-red to-accent-pink rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0">
                                <img src="http://127.0.0.1:8000/img/photo_2025-10-23_13-04-02.jpg" alt="">
                            </div>
                            <div>
                                <h4 class="text-sm font-medium group-hover:text-accent-purple transition line-clamp-2">چرا هنوز از PHP استفاده می‌کنم؟</h4>
                                <p class="text-xs text-light-muted dark:text-dark-muted mt-1">۵ نوامبر</p>
                            </div>
                        </a>
                    </div>
                </div>
    
                <!-- بخش همکاری -->
                <div class="md:col-span-4 mt-4">
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
                <p class="text-left dir-ltr">&copy; 2024 Arash-abraham. All rights reserved.</p>
                <p class="mt-1 md:mt-0">کدها در <span class="text-accent-purple"><a href="">GitHub</a></span> موجود است</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/post.js') }}"></script>
</body>
</html>