import * as Api from "./Api.js";

export default {
    login(payload) {
        return Api.apiClient.post("/login", payload);
    },

    logout() {
        return Api.apiClient.post("/logout");
    },

    async fetchUsers() {
        return await Api.apiClient.get("/users");
    },
};