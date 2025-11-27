<template>
  <div :key="refreshKey">
    <Topnavigationbar style="top: 0;" />
    <slot />
    <Footer />
  </div>
</template>

<script>
import Topnavigationbar from "./partials/Topnavigationbar.vue";
import Footer from "./partials/Footer.vue";
import { eventBus } from "./partials/eventBus"; 

export default {
  components: {
    Topnavigationbar,
    Footer
  },
  data() {
    return {
      refreshKey: 0, 
    };
  },
  mounted() {
    // console.log("Listening for refresh event in AppLayout");
    eventBus.on("refreshAppLayout", this.refreshLayout);
  },
  methods: {
    refreshLayout() {
      // console.log("Refresh event triggered in AppLayout!");
      this.refreshKey++;
    },
  },
  beforeUnmount() {
    eventBus.off("refreshAppLayout", this.refreshLayout); 
  }
};
</script>
