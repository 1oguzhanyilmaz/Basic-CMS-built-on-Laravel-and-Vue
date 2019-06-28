
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

import moment from "moment";

import App from './components/App';
import Home from './components/Home';
import About from './components/About';
import Contact from './components/Contact';
import Post from './components/Post';
import CategoryPosts from './components/CategoryPosts';
import NotFoundComponent from './components/NotFoundComponent';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/',            name: 'home',       component: Home,},
        { path: '/about',       name: 'about',      component: About,},
        { path: '/contact',     name: 'contact',    component: Contact,},
        { path: '/posts/:slug', name: 'post',       component: Post,},
        { path: '/categories/:slug/posts', name: 'category-posts',  component: CategoryPosts,},
        { path: '*', name: 'not-found', component: NotFoundComponent},
    ],
});

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY')
    }
});

const app = new Vue({
    el: '#app',
    template: '<App/>',
    router: router,
    components: { App },
});