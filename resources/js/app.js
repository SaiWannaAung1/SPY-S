require('./bootstrap');
import VueRouter from 'vue-router'
import Home from "./components/Home"
import About from "./components/About"

window.Vue = require('vue');

Vue.use(VueRouter)
const router = new VueRouter({
    mode:'history',
    routes:[
        {
           path:'/testhome',
            component:Home,
        },     {
            path:'/testabout',
            component:About,
        },
    ],
})


Vue.component('app', require('./App.vue').default);


const app = new Vue({
    router,
    el: '#app',
});
