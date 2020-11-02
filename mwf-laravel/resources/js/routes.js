import VueRouter from 'vue-router';
import Home from './views/Home.vue';
import About from './views/About.vue'


let routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path:'/about',
        component: About,
        name: 'name'
    }
]

export default new VueRouter({
    routes
});
