console.log('🔥 APP.JS IS RUNNING');
import './bootstrap'
import Alpine from 'alpinejs'
import { createApp } from 'vue'
import EmailEditor from './components/EmailEditor.vue'

window.Alpine = Alpine
Alpine.start()

// register globally
createApp(AdminEditor).mount('#app')