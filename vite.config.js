import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
    laravel({
        input: [
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/js/admin/trick-catalog/index.js',
            'resources/js/admin/trick-catalog/create.js',
            'resources/js/admin/trick-catalog/edit.js',
        ],
        refresh: true,
    }),

    vue(),

    tailwindcss(),
    ],
})