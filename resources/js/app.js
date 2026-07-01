import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from 'vue';
import EmailEditor from './components/EmailEditor.vue';


createApp({
    components: {
        EmailEditor,
    },
}).mount('#app');