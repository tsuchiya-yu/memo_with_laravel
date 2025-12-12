const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'SF Pro Display', 'Noto Sans JP', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'primary-red':'#CB191B',
                'secondry-red':'#f2cdca',
                'thin-gray':'#c1c0c8',
                'link-blue':'#0066cc',
                'bg-default':'#f5f5f7',
                'bg-surface':'#ffffff',
                'stroke':'#d7d7dc',
                'text-primary':'#0b0d15',
                'text-secondary':'#5c5f6d',
                'accent':'#ff5a5f',
                'accent-alt':'#0071e3',
                'success':'#0e8d5b',
            },
            boxShadow: {
                card: '0 20px 60px rgba(11,13,21,0.08)',
                inner: '0 4px 18px rgba(11,13,21,0.06)',
            },
            borderRadius: {
                '2xl': '1.5rem',
                base: '16px',
                full: '9999px',
            },
            spacing: {
                18: '4.5rem',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
