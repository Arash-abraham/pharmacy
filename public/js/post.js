// Reply functionality
document.querySelectorAll('.reply-btn').forEach(button => {
    button.addEventListener('click', function() {
        const comment = this.closest('.bg-white\\/50, .bg-dark-card\\/50');
        const replyForm = document.createElement('div');
        replyForm.className = 'comment-reply mt-4 p-4 bg-gradient-to-br from-accent-purple/5 to-accent-red/5 rounded-xl border border-accent-purple/20';
        replyForm.innerHTML = `
            <h5 class="font-bold mb-3 text-sm">پاسخ به نظر</h5>
            <form class="space-y-3">
                <div class="space-y-2">
                    <textarea rows="3" class="w-full px-3 py-2 rounded-lg bg-white/80 dark:bg-dark-card/60 border border-light-border dark:border-dark-border focus:outline-none focus:ring-2 focus:ring-accent-purple/30 focus:border-accent-purple/50 transition text-sm resize-none" placeholder="پاسخ خود را بنویسید..." required></textarea>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="px-4 py-2 bg-gradient-to-r from-accent-red to-accent-purple rounded-lg text-white font-bold text-sm hover:scale-[1.02] transition-transform">
                        ارسال پاسخ
                    </button>
                    <button type="button" class="px-4 py-2 border border-accent-purple rounded-lg font-bold text-sm hover:bg-accent-purple/10 transition cancel-reply">
                        انصراف
                    </button>
                </div>
            </form>
        `;
        
        comment.appendChild(replyForm);
        
        // Cancel reply
        replyForm.querySelector('.cancel-reply').addEventListener('click', function() {
            replyForm.remove();
        });
    });
});