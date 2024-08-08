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
                'resources/js/pages/create_product.js',
                'resources/js/pages/users.js',
                'resources/js/pages/items_products.js',
                'resources/js/pages/parameters.js',
                'resources/js/pages/product_types.js',
                // Thêm dòng này để import DataTables
                // 'node_modules/datatables.net-dt/css/jquery.dataTables.css',
                // 'node_modules/datatables.net/js/jquery.dataTables.js',
                // 'node_modules/tinymce/tinymce.min.js',
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
