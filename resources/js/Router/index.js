import { createRouter, createWebHistory } from 'vue-router'
import Calendar from '../Components/Calendar.vue'

const routes = [
    {
        path: "/",
        name: "calendar",
        component: Calendar,
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;