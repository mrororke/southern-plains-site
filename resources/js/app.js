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
    buildResourceHtml,
    stripHtml,
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
| Lucide Icons
|--------------------------------------------------------------------------
*/

import { createIcons, icons } from 'lucide';

document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});

/*
|--------------------------------------------------------------------------
| Vue
|--------------------------------------------------------------------------
| Register reusable Vue components
|--------------------------------------------------------------------------
*/

document
    .querySelectorAll('[data-admin-rich-text]')
    .forEach((element) => {
        createApp(AdminEditor, {
            value: element.dataset.value ?? ''
        }).mount(element)
    })

const resourceEditor = document.getElementById('body-editor')

if (resourceEditor) {
    createApp(ResourceEditor, {
        value: resourceEditor.dataset.value
    }).mount(resourceEditor)
}

/*
|--------------------------------------------------------------------------
| Resource Email Formatter
|--------------------------------------------------------------------------
*/

window.ResourceEmailFormatter = {
    buildBehaviorEmail,
    buildResourceEmail,
    buildResourceHtml,
    stripHtml,
    copyResourceEmail
}