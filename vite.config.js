import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // build: {
    //     outDir: 'public', // Ensure output is placed in the public directory
    // }
    // server: {
    //     host: '0.0.0.0',  // Allows access from all network interfaces
    //     port: 8000,        // Default Vite port
    //     hmr: {
    //         host: '409b-49-148-190-209.ngrok-free.app', // Replace with your ngrok domain
    //         protocol: 'ws', // WebSocket Secure for ngrok (if using HTTPS)
    //     },
    // }
});
