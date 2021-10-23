<template>
    <div class="container">
        
        <div class="jumbotron-fluid">
            <h1 class="display-4">Welcome</h1>
            <p class="lead">Eskimi Test</p>
            <hr class="my-4">            
            
            <p class="lead text-right">
                <router-link to="signout" class="btn btn-primary btn-lg ml-5">Logout</router-link>
            </p>          
            
        </div>

        <div class="row mt-5 mb-5">
            <router-link to="/create-ad-campaign" class="btn btn-success">Create</router-link>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Total Budget</th>
                    <th scope="col">Daily Budget</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(ads, index) in getCampaigns" :key="index">
                    <th scope="row"> {{ index + 1 }} </th>
                    <td> {{ ads.name }} </td>                    
                    <td> {{ ads.from_date }} </td>                    
                    <td> {{ ads.to_date }} </td>                    
                    <td> {{ ads.total_budget }} </td>                    
                    <td> {{ ads.daily_budget }} </td>                     
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"  v-on:click="name =ads.name, from_date = ads.from_date, to_date = ads.to_date, total = ads.total_budget, daily = ads.daily_budget, image = ads.banner_1">Preview</button>
                        <button type="button" class="btn btn-warning btn-sm" v-on:click="modify(ads.id, ads.name, ads.from_date, ads.to_date, ads.total_budget, ads.daily_budget)">Edit</button>
                    </td>                    
                </tr> 
            </tbody>
        </table>  

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="pr-5 text-bold">Name:</span> {{name}}
                        </h5>
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="pr-5 text-bold">From:</span>{{from_date}}
                        </h5>
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="pr-5 text-bold">To:</span>{{to_date}}
                        </h5>
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="pr-5 text-bold">Total:</span>{{total}}
                        </h5>
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="pr-5 text-bold">Daily:</span>{{daily}}
                        </h5>
                        <img :src="image" alt="" class="img-responsive mt-3" style="width:400px">
                        <img :src="'storage/'+image" alt="" class="img-responsive mt-3" style="width:400px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
    mounted() {
        this.fetchCampaigns();
    },

    data() {
        return {
            name: '',
            from_data: '',
            to_data: '',
            total: '',
            daily: '',
            image: ''
        }
    },

	computed: {
        ...mapGetters('campaign', ["getCampaigns"]),
    },

    methods: {
        ...mapActions('campaign', ['fetchCampaigns']),
        ...mapActions('auth', ['logout']),
        modify(id, name, from_date, to_date, total_budget, daily_budget) {
            window.localStorage.removeItem('id');
            window.localStorage.removeItem('name');
            window.localStorage.removeItem('from_date');
            window.localStorage.removeItem('to_date');
            window.localStorage.removeItem('total_budget');
            window.localStorage.removeItem('daily_budget');

            window.localStorage.setItem('id', id);
            window.localStorage.setItem('name', name);
            window.localStorage.setItem('from_date', from_date);
            window.localStorage.setItem('to_date', to_date);
            window.localStorage.setItem('total_budget', total_budget);
            window.localStorage.setItem('daily_budget', daily_budget); 
            
            this.$router.push({name: 'EditCampaign'});
        },
    },

};
</script>