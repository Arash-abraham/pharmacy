/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
      extend: {
        colors: {
          'purple-400': '#8b5cf6',
          'purple-600': '#7c3aed',
          'purple-700': '#6d28d9',
        },
      },
    },
    plugins: [],
  }