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