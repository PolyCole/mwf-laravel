import VueRouter from 'vue-router';
import Home from './views/Home.vue';
import About from './views/About.vue';
import Posts from './views/Posts.vue';


let routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path:'/about',
        component: About,
        name: 'about'
    },
    {
        path:'/posts',
        component: Posts,
        name: 'posts'
    }
]

export default new VueRouter({
    routes
});
