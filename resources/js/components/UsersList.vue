<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Users</div>

                    <div class="card-body">
                        <datatable :columns="columns" :data="rows"></datatable>
                        <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Vue from 'vue';
    import { VuejsDatatableFactory } from 'vuejs-datatable';

    Vue.use( VuejsDatatableFactory );
    VuejsDatatableFactory
    .registerTableType( 'my-awesome-table', tableType => {
        tableType
            .mergeSettings( /* ... */ )
            .setFilterHandler( /* ... */ )
            .setSortHandler( /* ... */ );
    } );

    export default {
        name: 'UsersList',
        components: { VuejsDatatableFactory },
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                columns: [
                        {label: 'id', field: 'id'}, 
                        {label: 'Name', field: 'name'},
                        {label: 'Email', field: 'email'},
                        {label: 'Address', representedAs: ({address}) => `${address.street}, ${address.suite}, ${address.city}, ${address.zipcode}`, interpolate: true},
                        {label: 'Geo',  representedAs: ({address}) => `${address.geo.lat}, ${address.geo.lng}`, interpolate: true},
                        {label: 'Phone', field: 'phone'},
                        {label: 'Website', field: 'website'},
                        {label: 'Action', representedAs: ({id}) => `<a href="users/${id}">details</a>`, interpolate: true},
                    ],
                rows: [
                ],
                page: 1,
                per_page: 10,
            }
        },
        methods:{
            getUsers: function() {
                axios.get('/users-data').then(function(response){
                    this.rows = response.data.data;
                }.bind(this));
            }
        },
        created: function(){
            this.getUsers()
        }
    }
</script>