import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            borderWidth: {
                'custom': '0.5px',
            },
          keyframes: {
    floatBounce: {
        '0%, 100%': { transform: 'translateY(200%)', opacity: '0' }, // Ubah 70% menjadi 140%
        '25%': { transform: 'translateY(60%)', opacity: '0.5' }, // Ubah 30% menjadi 60%
        '50%': { transform: 'translateY(0)', opacity: '1' },
        '75%': { transform: 'translateY(-20%)', opacity: '1' }, // Ubah -10% menjadi -20%
    },
},
animation: {
    floatBounce: 'floatBounce 3s cubic-bezier(0.42, 0.0, 0.58, 1.0) infinite',
},
        },
    },

    plugins: [forms],
};
