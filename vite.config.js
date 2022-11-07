import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler'
        }
    },
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/dashboard.scss',
                'resources/js/app.js',
                'resources/js/dashboard.js',
            ],
            refresh: true,
        }),

        // vue()   
    ],
});
