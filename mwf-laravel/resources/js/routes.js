import VueRouter from 'vue-router';
import Home from './views/Home.vue';
import NewPost from './views/NewPost.vue';
import Posts from './views/Posts.vue';
import Login from './views/Login.vue';
import Register from './views/Register.vue';


let routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path:'/new',
        component: NewPost,
        name: 'new'
    },
    {
        path:'/posts',
        component: Posts,
        name: 'posts'
    },
    {
        path:'/login',
        component: Login,
        name: 'login'
    },
    {
        path:'/register',
        component: Register,
        name: 'register'
    },
]

export default new VueRouter({
    routes,
    mode: 'history'
});
