// Simple password strength indicator
const passwordInput = document.getElementById('password');
const strengthBar = document.getElementById('strengthBar');

passwordInput.addEventListener('input', function() {
    const password = this.value;
    let strength = 0;
    
    if (password.length > 0) strength += 20;
    if (password.length >= 8) strength += 30;
    if (/[A-Z]/.test(password)) strength += 20;
    if (/\d/.test(password)) strength += 20;
    if (/[^A-Za-z0-9]/.test(password)) strength += 10;
    
    strengthBar.style.width = strength + '%';
    
    if (strength < 50) {
        strengthBar.style.backgroundColor = '#ff4757';
    } else if (strength < 80) {
        strengthBar.style.backgroundColor = '#ffa502';
    } else {
        strengthBar.style.backgroundColor = '#2ed573';
    }
});