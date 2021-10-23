import Vue from 'vue';
import router from './router';
import store from './store';
import App from './components/App.vue';

require('./bootstrap');

// Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
});
