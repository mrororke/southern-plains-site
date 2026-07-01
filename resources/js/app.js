import './bootstrap'
import Alpine from 'alpinejs'
import { createApp } from 'vue'

import AdminEditor from './components/editor/AdminEditor.vue'

window.Alpine = Alpine
Alpine.start()

createApp(AdminEditor).mount('#app')