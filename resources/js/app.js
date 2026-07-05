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

const el = document.getElementById('admin-app')

if (el) {
    const app = createApp({
        components: {
            AdminEditor
        }
    })

    app.mount(el)
}