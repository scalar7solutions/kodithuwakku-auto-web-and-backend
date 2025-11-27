<template>
   <section class="categorySection my-5 mb-0 pt-2 container">
      <div class="row text-left w-100">
        <div class="col-md-12 categorySectionColumn pe-5 ps-0 mb-0">
          <div class="row align-items-center ps-0">
            <div class="col-8 ps-3">
              <h2 class="headText secondFontStyle text-left fw-semibold">Browse by Make</h2>
            </div>
            <!-- <div class="col-4 ps-3 text-end">
              <p class="viewAll fw-bold" type="button">Show All<i class="fa fa-arrow-circle-right ms-2 fs-5"
                  aria-hidden="true"></i></p>
            </div> -->
          </div>
          <div class="row text-center align-items-center">
            <div class="col-md-2 col-sm-6 col-3 mt-5" v-for="manufacture in category_manufactures" :key="manufacture.id">
              <Link method="post" as="button" :href="route('live.auction')" :data=" {'_method':'GET', 'manufacturer':manufacture.name, 'search':true}" class="text-decoration-none text-reset border-0 bg-white">
              <div class="img w-100">
                <img
                  :src="manufacture.media ? (manufacture.media.length > 0 ? manufacture.media[0].original_url : '') : ''"
                  alt="" class="imgStyleClass w-100" height="60">
              </div>
              <div class="text">
                <h5 class="topicText mt-5">{{ manufacture.name }}</h5>
              </div>
              </Link>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 categorySectionColumn ps-5 pe-0">
          <div class="row align-items-center ps-3">
            <div class="col-8 ps-3">
              <h2 class="headText secondFontStyle text-left fw-semibold">Browse by Body</h2>
            </div>
            <div class="col-4 ps-3 text-end">
              <p class="viewAll fw-bold" type="button">Show All<i class="fa fa-arrow-circle-right ms-2 fs-5"
                  aria-hidden="true"></i></p>
            </div>
          </div>
          <div class="row text-center align-items-center ps-3">
            <div class="col-md-3 col-sm-6 col-3 mt-5" v-for="vehicle_type in vehicle_types.filter((t) => t.featured == 1)" :key="vehicle_type.id">
              <Link method="post" as="button" :href="route('available')" :data="{'_method':'GET', 'type':vehicle_type.id}" class="text-decoration-none text-reset border-0 bg-white">
              <div class="img w-100">
                <img :src="vehicle_type.media[0].original_url" alt=""
                  class="imgStyleClass w-75 h-100">
              </div>
              <div class="text">
                <h5 class="topicText mt-2"> {{ vehicle_type.title }}</h5>
              </div>
              </Link>
            </div>
          </div>
        </div> -->
      </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { data } from 'jquery';

export default {
  components:{
    Link
  },
  data(){
    return {};
  },
  props:{
    vehicle_types:Object,
    category_manufactures:Object
  }
}
</script>

<style>

</style>