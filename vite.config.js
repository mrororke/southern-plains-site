import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/dashboard-v2.css',
                'resources/js/app.js',
                'resources/js/admin/trick-catalog/index.js',
                'resources/js/admin/trick-catalog/create.js',
                'resources/js/admin/trick-catalog/edit.js',
                'resources/js/admin/behavior-catalog/index.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
})