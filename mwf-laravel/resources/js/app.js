import router from './routes';
import Vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import storeData from './store.js';

window._ = require('lodash');

window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(Vuex);

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const store = new Vuex.Store(storeData);
new Vue({
    el: '#app',
    router: router,
    store: store
});
