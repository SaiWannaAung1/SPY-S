require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import MainApp from "./components/Main.vue";
import StoreData from "./store";
import {routes} from "./routes";

Vue.use(VueRouter);
Vue.use(Vuex);


const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode:'history'
})


const app = new Vue({
    el: '#app',
    router,
    store,
    components:{
        MainApp
    }
});
