require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import router from './routes'; // Routes from routes.js file

window.Event = new Vue();

const app = new Vue({
    el: '#app',
    router
});
