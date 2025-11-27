<template>
  <AppLayout>

      <Banner />

      <Content />

      <!-- <StockTable /> -->

  </AppLayout>
</template>

<script>
// import $ from 'jquery';
import AppLayout from '@@/Layouts/AppLayout.vue';
import Banner from './partials/Banner.vue';

import Content from './partials/content.vue';

export default {
  components: {
      AppLayout,
      Banner,
      Content
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

<style></style>