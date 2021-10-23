<template>
    <div class="container">
        <div class="jumbotron-fluid">
            <h1 class="display-4">Welcome</h1>
            <p class="lead">Eskimi Test</p>
            <hr class="my-4">            
            <p class="lead">
                <router-link class="btn btn-primary btn-lg ml-5" to="login" role="button">Login</router-link>
                <router-link class="btn btn-primary btn-lg" to="register" role="button">Register</router-link>
            </p>               
        </div>
        
        <div>
            <div class="mt-5 mb-5">
                You may use any of the emails in the table below to login or proceed to register. Password is "password".
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sn</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in getUsers" :key="index">
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ user.email }}</td>                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    export default {
        name: 'Welcome',
        mounted() {
            this.getAllUsers();
        },

        computed: {
            ...mapGetters('auth', ['getUsers'])
        },

        methods: {
            ...mapActions('auth', ['getAllUsers']),
        },

    }
</script>
