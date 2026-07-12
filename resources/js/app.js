import './bootstrap'
import '../css/app.css'
import searchableCheckboxList from './alpine/searchableCheckboxList'
import behaviorPreview from './alpine/behaviorPreview'

import Alpine from 'alpinejs'

import { createApp } from 'vue'
import AdminEditor from './components/editor/AdminEditor.vue'
import ResourceEditor from './components/editor/ResourceEditor.vue'

import {
    buildBehaviorEmail,
    buildResourceEmail,
    copyResourceEmail
} from './utils/resourceEmailFormatter'

/*
|--------------------------------------------------------------------------
| Alpine
|--------------------------------------------------------------------------
*/

window.Alpine = Alpine

Alpine.data(
    'searchableCheckboxList',
    searchableCheckboxList
)

Alpine.data(
    'behaviorPreview',
    behaviorPreview
)
 
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

// RESOURCE EMAIL FORMATTER
window.ResourceEmailFormatter = {
    buildBehaviorEmail,
    buildResourceEmail,
    copyResourceEmail
}