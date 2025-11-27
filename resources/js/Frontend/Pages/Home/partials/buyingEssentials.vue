<template>
  <div class="container-fluid backgroundColor w-100">
    <div class="container-fluid py-5">
      <h1 class="text-center secondFontStyle pt-3 pb-5" style="font-weight: 600;">Buying Essentials</h1>
      <div class="row text-center pb-5">
        <div class="col-md-6 col-xl-3 pb-4">
          <div class="card h-100 bg-white border text-center px-3">
            <div class="imageEssentials mt-5 pb-4">
              <img src="/images/data-collection.png" width="100" class="" alt="...">
            </div>
            <div class="card-body">
              <h4 class="card=title fw-bold secondFontStyle">Get Informed
              </h4>
              <p class="card-text my-4 pb-3">Visit the "
                <Link :href="route('knowledge.center')">Knowledge Centre</Link>" to understand how to evaluate vehicle
                quality using the "Auction Sheet."
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 pb-4">
          <div class="card h-100 bg-white border text-center px-3">
            <div class="imageEssentials mt-5 pb-4">
              <img src="/images/car-insurance.png" width="100" class="" alt="...">
            </div>
            <div class="card-body">
              <h4 class="card=title fw-bold secondFontStyle">Find Your Vehicle
              </h4>
              <p class="card-text my-4 pb-3">Explore the "<Link :href="route('live.auction')">LIVE AUCTION</Link>" section, refine your search with "SEARCH" or
                "ADVANCED SEARCH," and check the "Auction Sheet" for details.

              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 pb-4">
          <div class="card h-100 bg-white border text-center px-3">
            <div class="imageEssentials mt-5 pb-4">
              <img src="/images/new-car.png" width="100" class="" alt="...">
            </div>
            <div class="card-body">
              <h4 class="card=title fw-bold secondFontStyle">Review Prices
              </h4>
              <p class="card-text my-4 pb-3">Use "Statistics by Model" to compare previous sold prices for vehicles in
                similar condition.

              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3 pb-4">
          <div class="card h-100 bg-white border text-center px-3">
            <div class="imageEssentials mt-5 pb-4">
              <img src="/images/search.png" width="100" class="" alt="...">
            </div>
            <div class="card-body">
              <h4 class="card=title fw-bold secondFontStyle">Place Your Bid</h4>
              <p class="card-text my-4 pb-3">Secure your bid with a refundable deposit via our Online Payment system.
                Reach out to our Sales Staff for guidance anytime.

              </p>
            </div>
          </div>
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
  }
}
</script>

<style></style>