<template>
    <div class="container">
        <router-view></router-view>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
// const default_layout = "default";

export default {
    computed: {
        ...mapGetters("auth", ["getGuest"]),
    },
    data() {
        return {
            
        }
    },
    methods: {
        ...mapActions('auth', ["logout"]),
    }
};
</script>