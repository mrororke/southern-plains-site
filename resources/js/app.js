import './bootstrap'
import '../css/app.css';

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
| Only mount if the element exists (prevents errors on non-Vue pages)
|--------------------------------------------------------------------------
*/

const vueMount = document.getElementById('app')

if (vueMount) {
    createApp(AdminEditor).mount('#app')
}