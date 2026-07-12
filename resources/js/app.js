import './bootstrap'
import '../css/app.css'

import Alpine from 'alpinejs'

import { createApp } from 'vue'
import AdminEditor from './components/editor/AdminEditor.vue'
import ResourceEditor from './components/editor/ResourceEditor.vue'

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


const el = document.getElementById('notes-editor')

if (el) {
    createApp(AdminEditor, {
        value: el.dataset.value
    }).mount(el)
}

const resourceEditor = document.getElementById('body-editor')

if (resourceEditor) {
    createApp(ResourceEditor, {
        value: resourceEditor.dataset.value
    }).mount(resourceEditor)
}