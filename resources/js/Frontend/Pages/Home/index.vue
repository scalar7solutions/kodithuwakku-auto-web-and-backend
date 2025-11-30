<template>
  <AppLayout>


    <TopBanner :vehicles="vehicles" :manufactures="manufactures" :models="models" :vehicleTypes = "vehicleTypes"

      :selectedManufacturer="$page.props.selectedManufacturer" :selectedModel="$page.props.selectedModel" />

       <!-- <Filter/> -->
       <br>

        <Browsebycarbrand :auction_manufactures ="auction_manufactures"
        :vehicles-list="$page.props.vehiclesList"/>

       <br>

    <!-- <AuctionVehicles :live_auction_vehicles_list="live_auction_vehicles_list" /> -->
      <!-- <LiveAuctionJapan
      :brand-list="brandList"
      :japan-auction-vehicles="japanAuctionVehicles"
      :tab-brand="$page.props.tabBrand"
    /> -->
    <br>
 <FirstSection :countries="countries" :vehicles="vehicles" :manufactures="manufactures" :models="models" />
 <br>
    <SecondSection />

    <br>
    <FourthSection />

   <ThirdSection />


  </AppLayout>
</template>

<script>

import AppLayout from '@@/Layouts/AppLayout.vue';
import TopBanner from './partials/TopBanner.vue';
import FirstSection from './partials/firstSection.vue';
import SecondSection from './partials/secondSection.vue';
import ThirdSection from './partials/thirdSection.vue';
import FourthSection from './partials/fourthSection.vue';
import Types from '../Available_stock/partials/models/Types.vue';
import AuctionVehicles from './partials/auctionVehicles.vue';
import Browsebycarbrand from './partials/Browsebycarbrand.vue';
import LiveAuctionJapan  from './partials/LiveAuctionJapan.vue';
import Filter from './partials/Filter.vue';


export default {
  components: {
    AppLayout,
    TopBanner,
    FirstSection,
    SecondSection,
    ThirdSection,
    FourthSection,
    AuctionVehicles,
    Browsebycarbrand,
    LiveAuctionJapan,
    Filter
  },
  props: {
    auction_manufactures: {
      type: Array,
      default: () => []
    },

    vehicles: {
      type: Array,
      default: () => []
    },
    countries: {
      type: Array,
      default: () => []
    },
    manufactures: {
      type: Array,
      default: () => [],
    },
    models: {
      type: Array,
      default: () => []
    },
    vehicleTypes:{
      type: Array,
      default: () => []
    },
    live_auction_vehicles_list: Array,

    brandList: {
     type: Array,
     default: () => []
   },

   japanAuctionVehicles: {
    type: Array,
     default: () => []
   },
   tabBrand:             { type: String, default: null },

  },
  mounted() {
  console.log('Countries in Header:', this.$page.props.countries);
  localStorage.removeItem('selectedCountry');
  this.selectedCountry = null;
}

}
</script>

<style></style>
