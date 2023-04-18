import './bootstrap';
import '../css/app.scss'
import * as bootstrap from 'bootstrap'
import { createApp } from 'vue';
import Welcome from "./welcome.vue";

createApp(Welcome).mount("#app");