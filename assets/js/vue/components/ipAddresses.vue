<template>
    <div v-show="initialized">
        <table v-if="ipAddresses.length > 0" class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>IP Address</th>
                    <th>Country Code</th>
                    <th>Country</th>
                    <th>Region</th>
                    <th>City</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Zip Code</th>
                    <th>Time Zone</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ipAddress in ipAddresses" :key="ipAddress.id">
                    <td>{{ ipAddress.ip }}</td>
                    <td>{{ ipAddress.countryCode }}</td>
                    <td>{{ ipAddress.country }}</td>
                    <td>{{ ipAddress.region }}</td>
                    <td>{{ ipAddress.city }}</td>
                    <td>{{ ipAddress.latitude }}</td>
                    <td>{{ ipAddress.longitude }}</td>
                    <td>{{ ipAddress.zipCode }}</td>
                    <td>{{ ipAddress.timeZone }}</td>
                </tr>
            </tbody>
        </table>
        <h4 v-else>IP addresses not found</h4>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "ipAddresses",
        data() {
            return {
                initialized: false,
                ipAddresses: []
            }
        },
        created: function() {
            this.getIpAddresses();
        },
        methods: {
            getIpAddresses: function() {
                axios
                    .get('/api/ip/stored')
                    .then(response => this.ipAddresses = response.data)
                    .catch(error => console.log(error))
                    .finally(() => this.initialized = true);
            },
        },
    }
</script>
