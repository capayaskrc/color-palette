const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['MuseoSans', ...defaultTheme.fontFamily.sans],
            },
            fontWeight: {
                '500': '500',
                '700': '700',
            },
        },
    },

};
