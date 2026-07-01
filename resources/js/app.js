console.log('🔥 APP.JS IS RUNNING');
import './bootstrap'
import Alpine from 'alpinejs'
import { createApp } from 'vue'
import EmailEditor from './components/EmailEditor.vue'

window.Alpine = Alpine
Alpine.start()

const app = createApp({})

app.component('email-editor', EmailEditor)

app.mount('#app')