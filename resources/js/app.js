import './bootstrap'
import '../css/app.css'

import Alpine from 'alpinejs'
import { createApp } from 'vue'

import AdminEditor from './components/editor/AdminEditor.vue'

/*
|--------------------------------------------------------------------------
| Alpine
|--------------------------------------------------------------------------
*/

window.Alpine = Alpine
Alpine.start()

/*
|--------------------------------------------------------------------------
| Vue
|--------------------------------------------------------------------------
| Register reusable Vue components
|--------------------------------------------------------------------------
*/

const vueMount = document.getElementById('admin-app')

if (vueMount) {

    const app = createApp({})

    app.component('admin-editor', AdminEditor)

    app.mount('#admin-app')
}