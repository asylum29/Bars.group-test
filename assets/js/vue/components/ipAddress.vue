<template>
    <div>
        <div class="form-inline mb-2">
            <label>Ip address</label>
            <vue-bootstrap-typeahead
                    class="ml-2 mr-2"
                    placeholder="Enter ip address..."
                    v-model="ipAddress"
                    :data="ipAddresses"
                    :serializer="e => e.ip"
            />
            <button v-on:click="getIpInfo" class="btn btn-primary">
                Get data
            </button>
        </div>
        <ipAddressData v-if="ipInfo" :ipInfo="ipInfo"/>
        <h4 v-show="message">{{ message }}</h4>
    </div>
</template>

<script>
    import ipAddressData from './ipAddressData';
    import axios from 'axios';

    export default {
        name: "ipAddress",
        data() {
            return {
                ipAddresses: [],
                ipAddress: '',
                ipInfo: null,
                message: ''
            }
        },
        created: function() {
            this.getCities();
        },
        methods: {
            getCities: function() {
                axios
                    .get('/api/ip/addresses')
                    .then(response => this.ipAddresses = response.data)
                    .catch(error => console.log(error));
            },
            getIpInfo: function (event) {
                this.message = 'Loading...';
                this.ipInfo = null;
                axios
                    .get('/api/ip/get', { params: { ip: this.ipAddress }})
                    .then(response => {
                        let data = response.data;
                        if (data.error) {
                            this.message = data.error;
                        } else {
                            this.message = '';
                            this.ipInfo = data;
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        this.message = 'An error has occurred';
                    });
            }
        },
        components: {ipAddressData}
    }
</script>
