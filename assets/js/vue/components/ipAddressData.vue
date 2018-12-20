<template>
    <div>
        <div class="row">
            <div class="col-3 font-weight-bold">Ip Address</div>
            <div class="col-9">{{ ipInfo.ip }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">Country Code</div>
            <div class="col-9">{{ ipInfo.countryCode }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">Country</div>
            <div class="col-9">{{ ipInfo.country }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">Region</div>
            <div class="col-9">{{ ipInfo.region }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">City</div>
            <div class="col-9">{{ ipInfo.city }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">Latitude</div>
            <div class="col-9">{{ ipInfo.latitude }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">Longitude</div>
            <div class="col-9">{{ ipInfo.longitude }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">Zip Code</div>
            <div class="col-9">{{ ipInfo.zipCode }}</div>
        </div>
        <div class="row">
            <div class="col-3 font-weight-bold">Time Zone</div>
            <div class="col-9">{{ ipInfo.timeZone }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ipAddressData',
        props: {
            ipInfo: Object,
        }
    }
</script>
