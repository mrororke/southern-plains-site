import './bootstrap'
import '../css/app.css'
import searchableCheckboxList from './alpine/searchableCheckboxList'
import behaviorPreview from './alpine/behaviorPreview'
import resourceLibrary from './admin/resource-library/index'

import Alpine from 'alpinejs'

import { createApp } from 'vue'
import RichTextEditor from './components/editor/RichTextEditor.vue'

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

Alpine.data(
    'resourceLibrary',
    resourceLibrary
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
        createApp(RichTextEditor, {
            name: element.dataset.name,
            value: element.dataset.value ?? ''
        }).mount(element)
    })


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