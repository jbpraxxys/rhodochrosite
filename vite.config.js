import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import compression from 'vite-plugin-compression';

export default defineConfig({
    plugins: [
        laravel([
            'resources/scss/user.scss',
            'resources/ts/app.ts',
            'resources/scss/admin.scss',
            'resources/ts/admin.ts',
        ]),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        compression({
            algorithm: 'gzip',
            ext: '.gz',
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/ts'
        }
    },
    build: {
        rollupOptions: {
            input: {
                app: 'resources/ts/app.ts', // Entry point for TypeScript
                admin: 'resources/ts/admin.ts', // Entry point for TypeScript
                style: 'resources/scss/user.scss', // Entry point for CSS
                adminstyle: 'resources/scss/admin.scss', // Entry point for CSS
            },
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.toString().split('node_modules/')[1].split('/')[0].toString();
                    }
                },
            },
        },
        minify: 'esbuild',
    },
});