import './bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from 'vue'
import { createPinia } from 'pinia';

import App from './App.vue'
import router from './router'

const pinia = createPinia()

createApp(App).use(router).use(pinia).mount('#app')








