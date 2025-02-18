import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/livewire/**/*.blade.php',
        './app/Livewire/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#4F46E5', // Example custom primary color (Indigo)
                danger: '#EF4444',  // Custom red color for alerts
                success: '#22C55E', // Green color for success states
            },
            boxShadow: {
                'soft': '0 4px 6px rgba(0, 0, 0, 0.1)',
                'xl-soft': '0 10px 20px rgba(0, 0, 0, 0.15)',
            },
        },
    },

    plugins: [forms],
};
