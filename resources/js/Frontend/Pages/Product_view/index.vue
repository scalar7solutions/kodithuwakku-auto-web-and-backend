<template>
    <AppLayout>

        <Banner />

        <product :vehicle="vehicle" :randomVehicles="randomVehicles" />
        <!-- <StockTable /> -->

    </AppLayout>
</template>

<script>
// import $ from 'jquery';
import AppLayout from '@@/Layouts/AppLayout.vue';
import Banner from './partials/Banner.vue';
import product from './partials/product.vue';

export default {
    components: {
        AppLayout,
        Banner,
        product,
    },
    props: {
        vehicle: Object, 
        randomVehicles: Array, 
    },
    mounted() {
        console.log(this.$root.getQueryParam('brand'))

        $(document).ready(function () {
            $("html, body").animate({ scrollTop: 0 }, "fastest");
            return false;
        });
       
    }
}
</script>

<style>
/* add to a global stylesheet (e.g. in main .css) */
*, *::before, *::after {
  box-sizing: border-box;
}

/* html, body {
  max-width: 100%;
  overflow-x: hidden;
} */


</style>