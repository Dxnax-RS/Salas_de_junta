import './bootstrap';
import '../css/app.scss'
import { createApp } from 'vue/dist/vue.esm-bundler';
import Welcome from "./Welcome.vue";

const app = createApp({});

app.component('welcome', Welcome);
app.mount('#app');