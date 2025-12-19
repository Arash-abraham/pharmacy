document.addEventListener('DOMContentLoaded', function() {
    // نوار پیشرفت اسکرول
    window.addEventListener('scroll', function() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById('progressBar').style.width = scrolled + '%';
    });
    
    // دکمه بازگشت
    const backBtn = document.getElementById('backBtn');
    if (backBtn) {
        backBtn.addEventListener('click', function() {
            // در اینجا می‌توانید کاربر را به صفحه تیکت‌ها برگردانید
            // برای نمونه:
            // window.location.href = 'tickets.html';
            
            // یا اگر می‌خواهید فقط یک پیام نشان دهید:
            if (confirm('آیا مایل به بازگشت به صفحه تیکت‌ها هستید؟')) {
                // شبیه‌سازی بازگشت به صفحه قبل
                history.back();
            }
        });
    }
    
    // مدیریت ارسال پاسخ
    const sendBtn = document.getElementById('sendBtn');
    const messageInput = document.getElementById('messageInput');
    
    if (sendBtn && messageInput) {
        sendBtn.addEventListener('click', function() {
            if (messageInput.value.trim() !== '') {
                const emailCopy = document.getElementById('emailCopy').checked;
                const urgentReply = document.getElementById('urgentReply').checked;
                
                let message = 'پاسخ شما با موفقیت ارسال شد.';
                if (emailCopy) message += ' کپی به ایمیل شما ارسال خواهد شد.';
                if (urgentReply) message += ' درخواست پاسخ فوری ثبت شد.';
                
                alert(message);
                messageInput.value = '';
                
                // اضافه کردن پیام جدید به تاریخچه (به صورت شبیه‌سازی شده)
                addNewMessage(messageInput.value);
            } else {
                alert('لطفاً پیام خود را وارد کنید.');
                messageInput.focus();
            }
        });
    }
    
    // مدیریت پیش‌نمایش
    const previewBtn = document.getElementById('previewBtn');
    if (previewBtn && messageInput) {
        previewBtn.addEventListener('click', function() {
            if (messageInput.value.trim() !== '') {
                alert('پیش‌نمایش:\n\n' + messageInput.value);
            } else {
                alert('لطفاً ابتدا پیامی وارد کنید.');
            }
        });
    }
    
    // مدیریت آپلود فایل
    const fileUpload = document.getElementById('fileUpload');
    if (fileUpload) {
        fileUpload.addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.multiple = true;
            input.accept = 'image/*,.pdf,.doc,.docx,.zip,.rar,.txt';
            input.onchange = function(e) {
                if (e.target.files.length) {
                    alert(`${e.target.files.length} فایل انتخاب شد\n` + 
                          Array.from(e.target.files).map(f => f.name).join('\n'));
                }
            };
            input.click();
        });
        
        // کشیدن و رها کردن
        fileUpload.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--primary)';
            this.style.backgroundColor = 'rgba(99, 102, 241, 0.1)';
        });
        
        fileUpload.addEventListener('dragleave', function() {
            this.style.borderColor = '';
            this.style.backgroundColor = '';
        });
        
        fileUpload.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '';
            this.style.backgroundColor = '';
            
            if (e.dataTransfer.files.length) {
                alert(`${e.dataTransfer.files.length} فایل انتخاب شد\n` + 
                      Array.from(e.dataTransfer.files).map(f => f.name).join('\n'));
            }
        });
    }
    
    // تابع برای اضافه کردن پیام جدید به تاریخچه
    function addNewMessage(message) {
        // در اینجا می‌توانید پیام جدید را به لیست تاریخچه اضافه کنید
        // برای نمونه، یک پیام جدید ایجاد کنید و به DOM اضافه کنید
        console.log('پیام جدید اضافه شد:', message);
    }
    
    // اسکرول به پایین صفحه برای نمایش جدیدترین پیام‌ها
    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: 'smooth'
    });
    
    console.log('صفحه تیکت پشتیبانی آماده است!');
});
