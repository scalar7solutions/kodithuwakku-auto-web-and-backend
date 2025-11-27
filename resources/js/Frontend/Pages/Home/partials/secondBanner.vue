<template>
  <div class="container-fluid mb-4 w-100">
    <div class="row middleBanner align-items-center">
      <div class="col-md-7 col-sm-12">
        <div class="body">
          <div class="row mx-5 pe-3 my-3">
            <div class="col-12 px-1 me-5">
              <h1 class="chooseHeadText text-white" style="font-weight: 600; font-size: 40px;">Why Choose Us</h1>
              <div>
                <p class="chooseSubText text-white">
                  Our Japanese car auctions offer great benefits, including affordable prices, a wide selection of vehicles, and high-quality cars with detailed histories.
                </p>
                <Link type="button" class="btn valueYourCarBtn rounded-1 text-white px-4 py-2 mt-3" :href="route('live.auction')">VEHICLE AUCTION</Link>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-sm-12 px-0">
        <div class="bannerRightImage">
          <img src="images/second-banner.jpg" class="w-100" alt=""
            style="object-fit: cover;">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
  components: {
   
   Link
 },
}
</script>

<style>

</style>