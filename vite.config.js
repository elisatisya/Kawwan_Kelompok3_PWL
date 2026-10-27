import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
    'resources/css/styles.css',
    'resources/js/script.js',
    'resources/css/dokter.css',
    'resources/js/dokter-dashboard.js',
],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
