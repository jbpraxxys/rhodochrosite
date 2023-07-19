import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel([
            'resources/scss/user.scss',
            'resources/ts/app.ts',
            'resources/scss/admin.scss',
            'resources/ts/admin.ts',
        ]),
        // react(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': 'resources/ts'
        }
    }
});