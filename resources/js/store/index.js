import Vue from 'vue'
import Vuex from 'vuex'
import * as auth from "./modules/auth.js";
import * as campaign from "./modules/campaign.js";
    
Vue.use(Vuex);

export default new Vuex.Store({
    strict: true,

    modules: {
        auth,
        campaign
    }
})
