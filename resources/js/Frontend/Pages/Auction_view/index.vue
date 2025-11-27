<template>
  
    <AppLayout>

        <Banner :details="details" :v-images="vImages"/>

        <Details
     
   />

      <!-- <StatDetails/>
      <VehicleDetails/>
      <ContactUs/> -->
      

      

  
        
    </AppLayout>
  
</template>

<script>

// import $ from 'jquery';
import AppLayout from '@@/Layouts/AppLayout.vue';
import Banner from './partials/Banner.vue';
// import VehicleDetails from './partials/Vehicle_details.vue';
import Details from './partials/Details.vue';
// import ContactUs from './partials/Models/ContactUs.vue';
import StatDetails from './partials/Models/StatDetails.vue';
import VehicleDetails from './partials/Models/VehicleDetails.vue';
import ContactUs from './partials/Models/ContactUs.vue';

export default {
    components:{
        
        AppLayout,
        Banner,
        VehicleDetails,
        Details,
        ContactUs,
        StatDetails
    },
    props:{
        details: Object,
        vImages: Array,
        statsYears:    Array,
        statsYears:Array,
        statsChassis:Array,
        statsConditions:Array,
        requestQuery:Object,
        vehicleStatsList:Array,
        manufactures:Array,
        models:Array,
        grades:Array,
        auctionGrades:Array,
        chassisNumbers:Array,
        colors:      Array,
        
        
    },
    mounted(){
        $(document).ready(function() {
      $("html, body").animate({ scrollTop: 0 }, "fastest");
      return false;
    });
    }
}
</script>

<style>


.offcanvas {
  z-index: 3000 !important;
}


.offcanvas-backdrop {
  z-index: 1000 !important;
}

.filter-container {
    width: 100% !important;
    max-width: 1700px !important;
    margin: 0 auto;
    
}

</style>