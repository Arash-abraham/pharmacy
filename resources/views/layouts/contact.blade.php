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