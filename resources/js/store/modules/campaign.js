import CampaignService from "../../services/CampaignService";

export const namespaced = true;

export const state = {
    adCampaigns: null
};

export const mutations = {
    SET_CAMPAIGNS(state, payload) {
        state.adCampaigns = payload;
    }
};

export const actions = {
    storeCampaign(payload, postData) {
        return CampaignService.storeCampaign(postData)
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.log(error);
        });
    },
    updateCampaign(payload, postData) {
        return CampaignService.updateCampaign(postData)
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.log(error);
        });
    },
    fetchCampaigns({ commit }) {
        return CampaignService.fetchAllCampaigns()
        .then((response) => {
            commit("SET_CAMPAIGNS", response.data.data);
        })
        .catch(() => {
            console.log(error);
        });
    }
};

export const getters = {
    getCampaigns: state => {
        return state.adCampaigns;
    }
};