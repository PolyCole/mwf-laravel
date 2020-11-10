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

import { extend } from 'vee-validate';
import { required, email } from 'vee-validate/dist/rules';

// Add the required rule
extend('required', {
    ...required,
    message: 'This field is required'
});

// Add the email rule
extend('email', {
    ...email,
    message: 'This field must be a valid email'
});

import { ValidationProvider } from 'vee-validate';

// Register it globally
// main.js or any entry file.
Vue.component('ValidationProvider', ValidationProvider);

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const store = new Vuex.Store(storeData);
new Vue({
    el: '#app',
    router: router,
    store: store,
    data: {
        defaults: "anonymous"
    }
});
