import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 'resources/js/app.js',
                'resources/css/materialize.css', 'resources/js/materialize.js',
                'resources/css/myEstilos.css', 
                'resources/css/styles.css',
            ],
            refresh: true,
        }),
    ],
});
