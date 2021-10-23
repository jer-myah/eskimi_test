<template>
    <div class="container">
        <div>
            <router-link to="/campaigns">Campaigns</router-link>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form @submit.prevent="createCampaign()">

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

                            <div class="form-group row">
                                <label for="banner_1" class="col-md-4 col-form-label text-md-right">Banner</label> 

                                <div class="col-md-6">
                                    <input id="banners" type="file" class="form-control" multiple @change="handleFileChange($event)" required>                                    
                                </div>
                            </div>

                            <label v-if="max_num_image" for="" class="col-md-4 col-form-label text-sm-right">Number of Images should not exceed 5</label>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send
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
                max_num_image: false,
                form: {
                    name: '',
                    from_date: '',
                    to_date: '',
                    total_budget: '',
                    daily_budget: '',
                    banner_1: '',
                    banner_2: '',
                    banner_3: '',
                    banner_4: '',
                    banner_5: '',
                },
                banners: []
            }
        },
        computed: {
            // ...mapGetters("auth", ["authUser"]),
        },
        methods: {
            createCampaign() {
                this.form.banner_1 = this.banners[0],
                this.form.banner_2 = this.banners[1],
                this.form.banner_3 = this.banners[2],
                this.form.banner_4 = this.banners[3],
                this.form.banner_5 = this.banners[4],

                this.$store.dispatch("campaign/storeCampaign", this.form).then(() => {                    
                    this.$router.push("campaigns");                    
                });
            },
            handleFileChange($event) {
                if ($event.target.files.length > 5) {
                    this.max_num_image = true;
                } else {
                    let index = 0;
                    let total = $event.target.files.length;
                    while (index < total ) {
                        this.banners.push($event.target.files[index]);
                        index++;
                    }                 
                }
            }
        },

    }
</script>