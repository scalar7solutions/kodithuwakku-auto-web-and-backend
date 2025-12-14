<template>
  <AppLayout>

      <Banner />
    <ArrivingsList
      :vehicles="vehicles"
      :manufactures="manufactures"
      :models="models"
    />
  </AppLayout>
</template>

<script>
import AppLayout from '@@/Layouts/AppLayout.vue';
import ArrivingsList from './arrivingslist.vue';
import Banner from './Banner.vue';

export default {
  components: { AppLayout, ArrivingsList,Banner },
  props: {
    vehicles: { type: Array, default: () => [] },
    manufactures: { type: Array, default: () => [] },
    models: { type: Array, default: () => [] },
  },
};
</script>
