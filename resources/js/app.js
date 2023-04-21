import './bootstrap';
import '../css/app.scss'
import { createApp } from 'vue/dist/vue.esm-bundler';
import App from "./App.vue";
import router from "./Router/index.js"

const app = createApp(App);
app.use(router);
app.mount("#app");