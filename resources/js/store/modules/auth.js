import AuthService from "../../services/AuthService";

export const namespaced = true;

export const state = {
    user: null,
    users: null,
    token: window.localStorage.getItem("token"),
};

export const mutations = {
    SET_USER(state, user) {
        state.user = user;
    },

    SET_USERS(state, users) {
        state.users = users;
    },

    CLEAR_USER() {
        window.localStorage.clear();
        location.reload();
    },

    SET_TOKEN(state, token) {
        state.token = token;
        window.localStorage.setItem("token", token);
    },

};

export const actions = {
    login({ commit }, payload) {
        return AuthService.login(payload)
        .then(response => {
            commit("SET_TOKEN", response.data.access_token);
        })
        .catch(error => {
            console.log(error);
        });
    },
    logout({ commit }) {
        return AuthService.logout()
        .then(() => {
            commit("CLEAR_USER");
        })
        .catch(() => {
            commit("CLEAR_USER");
        });
    },
    getAllUsers({ commit}) {
        return AuthService.fetchUsers()
        .then((response) => {
            commit("SET_USERS", response.data.users)
        })
        .catch((error) => {
            console.log(error);
        });
    }
};

export const getters = {
    authUser: state => {
        return state.user;
    },

    getUsers: state => {
        return state.users;
    },

    loggedIn: state => {
        return !!state.user;
    }
};