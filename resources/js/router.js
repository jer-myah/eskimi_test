import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store/index'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'Welcome',
            component: () => import('./pages/Welcome.vue')
        },
        {
            path: '/register',
            name: 'Register',
            component: () => import('./pages/Register.vue')
        },
        {
            path: '/login',
            name: 'Login',
            component: () => import('./pages/Login.vue')
        },
        {
            path: '/campaigns',
            name: 'Campaigns',
            component: () => import('./pages/Campaigns.vue')
        },
        {
            path: '/create-ad-campaign',
            name: 'CreateCampaign',
            component: () => import('./pages/CreateCampaign.vue')            
        },
        {
            path: '/edit-ad-campaign',
            name: 'EditCampaign',
            component: () => import('./pages/EditCampaign.vue')            
        }, 
        {
            path: '/signout',
            redirect: '/',
            beforeRouteEnter(to, from, next) {
                store.dispatch('auth/logout').then(res => next() )
            }
        }       
    ]
});



export default router