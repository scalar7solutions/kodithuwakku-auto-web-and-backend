<template>
  <AppLayout>
     <Banner />
    <CustomerGrid :customers="$page.props.customers || []" />
  </AppLayout>
</template>

<script>
import AppLayout from '@@/Layouts/AppLayout.vue';
import CustomerGrid from './partials/CustomerGrid.vue';
import Banner from './partials/Banner.vue';

export default {
  name: "OurCustomerIndex",
  components: {
    AppLayout,
    CustomerGrid,
    Banner,
  },
};
</script>
