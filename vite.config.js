import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    resolve: {
        // PROAKTIF: Alias path standar untuk mempermudah struktur import JS/Alpine
        alias: {
            '@': '/resources/js',
        },
    },
    server: {
        watch: {
            // Optimal: Mencegah Vite infinite reload ketika Laravel mem-build cache view
            ignored: ['**/storage/framework/views/**'],
        },
    },
});