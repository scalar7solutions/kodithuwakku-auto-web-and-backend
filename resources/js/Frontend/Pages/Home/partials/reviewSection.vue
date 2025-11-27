<template>
  <div class="container">
    <div class="row my-5 align-items-center">
      <div class="col-md-3 p-3">
        <h1 class="mb-3 fw-bold">Reviews From Our Customer</h1>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
          pulvinar dapibus leo.</p> -->
      </div>
      <div class="col-md-9 col-sm-12 ps-3">
        <div class="swiper mySwiper4" style="width: 100% !important;">
          <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="review in reviews" :key="review.index">
              <div class="card bg-custom-c" style="height:auto">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3">
                      <div class="profile-image">
                        <img :src="review.image" alt="">
                      </div>
                    </div>
                    <div class="col-9 text-start">
                      <h5 class="card-title">{{ review.name }}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">{{ review.duration }}</h6>
                    </div>
                  </div>
                  <div class="my-3">
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                  </div>
                  <div class="details" style="overflow-y: auto !important; height: 110px;">
                    <p class="card-text">{{ review.comment }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
          <!-- <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

export default {
  props: {
    reviews: Array
  },
  data() {

    return {

    }
  },
  mounted() {

    var swiper = new Swiper(".mySwiper4", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 30,
        },
        764: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1250: {
          slidesPerView: 3,
          spaceBetween: 30,
        }
      },
      // navigation: {
      //     nextEl: ".swiper-button-next",
      //     prevEl: ".swiper-button-prev",
      //   },
    });
  }
}
</script>

<style scoped>
.bg-custom-c{
  background-color: rgb(231, 230, 236);
}
</style>