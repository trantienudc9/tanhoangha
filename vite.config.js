import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/product_form.js',
                'resources/js/pages/add_background.js',
            ],
            refresh: true,
        }),
    ],

    resolve: {
        alias: {
            '$': 'jquery/src/jquery'
        },
    },

    optimizeDeps: {
        include: ['tinymce']
    },

});
