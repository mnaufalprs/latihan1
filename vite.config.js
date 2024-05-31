import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            // input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'],
            refresh: true,
            // valetTls: 'https://nav-app-prod3-bhhbpeznua-as.a.run.app',
            https: true,
        }),
    ],
});
