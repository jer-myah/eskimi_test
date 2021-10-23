/*
 * API interface
 * s the base URL for the API
 * store the token in local storage
 * append the token to all requests
*/

import axios from "axios";
import store from "../store/index.js";

export const apiClient = axios.create({
    baseURL: "http://localhost/api"
});

/*
 * Add a request interceptor
    @param config
*/
apiClient.interceptors.request.use(
    function(config) {
        const token = window.localStorage.getItem("token");
        if (token != null) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    function(error) {
        return Promise.reject(error.response);
    }
);

/*
 * Add a response interceptor
 */
apiClient.interceptors.response.use(
    response => {
        return response;
    },
    function(error) {
        if (error.response.status === 401) {
            store.dispatch("auth/logout");
        }
        return Promise.reject(error.response);
    }
);