<template>
    <div class="container">
        <div>
            <router-link to="/campaigns">Campaigns</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>

                    <div class="card-body">
                        <form @submit.prevent="editCampaign()">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="form.name" required autocomplete="name" autofocus>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="from_date" class="col-md-4 col-form-label text-md-right">From</label>

                                <div class="col-md-6">
                                    <input id="from_date" type="date" class="form-control" v-model="form.from_date" required>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="to_date" class="col-md-4 col-form-label text-md-right">To</label>

                                <div class="col-md-6">
                                    <input id="to_date" type="date" class="form-control" v-model="form.to_date" required>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="total_budget" class="col-md-4 col-form-label text-md-right">Total Budget</label>

                                <div class="col-md-6">
                                    <input id="total_budget" type="number" class="form-control" v-model="form.total_budget" required>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="daily_budget" class="col-md-4 col-form-label text-md-right">Daily Budget</label>

                                <div class="col-md-6">
                                    <input id="daily_budget" type="number" class="form-control" v-model="form.daily_budget" required>                                    
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import { mapGetters } from 'vuex'
    export default {
        data () {
            return {
                form: {
                    name: window.localStorage.getItem('name'),
                    from_date: window.localStorage.getItem('from_date'),
                    to_date: window.localStorage.getItem('to_date'),
                    total_budget: window.localStorage.getItem('total_budget'),
                    daily_budget: window.localStorage.getItem('daily_budget'),                    
                },
            }
        },
        computed: {
            // ...mapGetters("auth", ["authUser"]),
        },
        methods: {
            editCampaign() {                
                this.$store.dispatch("campaign/updateCampaign", this.form).then(() => {                    
                    this.$router.push("campaigns");                    
                });
            },
            
        },

    }
</script>