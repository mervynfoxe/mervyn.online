import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/prezet.css',
                'resources/js/app.js',
                'resources/css/legacy.css',
                'resources/js/legacy.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        https: false,
        host: true,
        port: 3009,
        hmr: {host: 'localhost', protocol: 'ws'},
        cors: {
            origin: [
                /^https?:\/\/.*\.lndo\.site(:\d+)?$/, // allow lando dev origins
            ]
        }
    },
});
