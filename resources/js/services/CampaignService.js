import * as Api from "./Api.js";

export default {
    async storeCampaign(postData) {
        console.log(postData);
        return await Api.apiClient.post("/advertising-campaign/create", postData);
    },

    async storeCampaign(id, postData) {
        return await Api.apiClient.post("/advertising-campaign/update/"+id, postData);
    },

    fetchAllCampaigns() {
        return Api.apiClient.get("/advertising-campaigns");
    },

    updateCampaign(payload) {
        let id = window.localStorage.getItem('id')
        return Api.apiClient.put("/advertising-campaign/update/"+id, payload);
    },
};