<template>


    <!-- <div class="container main-container section"> -->
        <!-- Car Details -->
        <!-- <div class="row justify-content-left"> -->
            <!-- Left Column: Main Image and Thumbnails -->

            <!-- <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="justify-content-between align-items-start mb-3">
                    <div class="title-container">
                        <h2 class="main-title">LEASE A BRAND NEW CAR</h2>
                    </div>
                </div>

                <div class="mb-4  ">
                    <div class="mb-4 ">
                        <swiper
                            ref="mainSwiper"
                            :modules="modules"
                            :loop="true"
                            :spaceBetween="1"
                            :slidesPerView="1"
                            :navigation="true"
                            :thumbs="{ swiper: thumbsSwiper }"
                            @slideChange="onSlideChange"
                            class="mySwiper2"
                            >
                            <swiper-slide v-for="(img, index) in allImages" :key="index">

                                <img
                                :src="img.original_url"
                                :alt="img.alt || 'Car image'"
                                class="main-image rounded"
                                />
                            </swiper-slide>
                            </swiper>
                    </div>

                    <div class="thumbnails-container">
                       <swiper
                            ref="thumbsSwiper"
                            @swiper="setThumbsSwiper"
                            :modules="modules"
                            :loop="true"
                            :spaceBetween="10"
                            :slidesPerView="4"
                            :freeMode="true"
                            :grabCursor="true"
                            :watchSlidesProgress="true"
                            :watchSlidesVisibility="true"
                            class="mySwiper"
                            >
                             <swiper-slide
                                v-for="(img, index) in allImages"
                                :key="index"
                                
                                @click="setMainImage(index)"
                            >
                                <img
                                :src="img.original_url"
                                :alt="img.alt || 'Thumbnail'"
                                :class="[
                                    'thumbnail',
                                    { 'active-thumb': currentThumbIndex === index }
                                    ]"
                                />
                            </swiper-slide>
                            </swiper>
                    </div>
                </div>
            </div> -->

            <!-- Right Column: Car Details -->
            <!-- <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="car-details"> -->
                    <!-- New Buttons Section -->
                    <!-- <div class="status-buttons">
                        <a class="status-label">
                            {{ vehicle.used_status }}
                        </a>
                    </div> -->

                    <!-- <h3>{{ vehicle.manufacture.title }} {{ vehicle.vehicle_model.title }}</h3>
                    <p :class="availabilityColor(vehicle.availability)">{{ vehicle.availability }}</p>
                    <h4 class="price">${{ vehicle.price || '0' }}</h4>
                    <div class="car-details">
                        <div class="description mb-3">
                            ✔ Engine Capacity {{ vehicle.engine_capacity }} CC<br>
                            ✔ {{ vehicle.condition }} Condition<br>
                            ✔ {{ vehicle.transmission }} Transmission <br>
                            ✔ {{ vehicle.drive_type }} <br>
                            ✔ Fuel Type {{ vehicle.fuel_type }}
                        </div>
                    </div> -->
                    <!-- <div class="action-buttons">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quoteModal">Inquire
                            Now</button> -->
                        <!-- <button class="btn2 btn-primary" data-bs-toggle="modal" data-bs-target="#quoteModal">Contact
                                us</button> -->
                    <!-- </div>
                </div>
            </div>
        </div>
    </div> -->

<div class="container-fluid px-3 px-md-5 main-container section">
    <!-- Breadcrumbs: pushes content down below the nav -->
    <div class="breadcrumbs mb-4">
      <a href="/">Home</a> /
      <a href="/available-cars">Listings</a> /
      <span class="current">
        {{ vehicle.manufacture.title }} {{ vehicle.vehicle_model.title }}
      </span>
    </div>
    <!-- HEADER ROW: Title + Pills on left, Action-panel on right -->
    <div class="d-flex justify-content-between align-items-start mb-4">
      <div>
        <!-- Vehicle Title -->
        <h1 class="vehicle-title mb-2">
          {{ vehicle.manufacture.title }} {{ vehicle.vehicle_model.title }}<br>
          
        </h1>
        <!-- Detail Pills -->
        <div class="details-grid">
          <div class="detail-item"><i class="fa-solid fa-calendar-days"></i><span class="label"></span><span
              class="value">{{ vehicle.year }}</span></div>
          <div class="detail-item"><i class="fa-solid fa-tachometer-alt"></i><span class="label"></span><span
              class="value">{{ vehicle.mileage }}KM</span></div>
          <div class="detail-item"><i class="fa-solid fa-cogs"></i><span class="label"></span><span class="value">{{
            vehicle.transmission }}</span></div>
          <div class="detail-item"><i class="fa-solid fa-gas-pump"></i><span class="label"></span><span class="value">{{
            vehicle.fuel_type }}</span></div>
        </div>
      </div>
      <!-- Action-panel floated right -->
      <div class="action-panel ms-4">
        <!-- Share and Save Buttons -->
        <!-- <div class="share-save mb-3 d-flex justify-content-center gap-3">
          <button class="btn-icon share-btn">
            <span>Share</span>
            <i class="fa-solid fa-arrow-up-from-bracket"></i>

          </button>
          <button class="btn-icon save-btn">
            <span>Save</span>
            <i class="fa-solid fa-bookmark"></i>

          </button>
        </div> -->
        <!-- Price -->
        <div class="main-price mb-3 text-center">
          {{ vehicle.monthly_price_currency === 'USD' ? '$' : 'LKR ' }}
          {{ Number(vehicle.monthly_price || 0).toLocaleString() }}
        </div>
        <!-- Make Offer -->
        <!-- <div class="offer-text text-center" @click="startApplication">
          <i class="fa-solid fa-tag bold"></i>
          <span class="bold"> Make An Offer Price</span>
        </div> -->
      </div>
    </div>
    <!-- Image & Thumbnails Layout -->

   <div class="row mb-4 align-items-stretch">

      <!-- Large left image -->
      <div class="col-lg-7 mb-3 mb-lg-0 px-2 pe-lg-1">
        <div class="main-image-container position-relative">

          <div v-if="!mainImageLoaded" class="skeleton-placeholder"></div>

          <img :src="allImages[currentThumbIndex].original_url" 
                :alt="allImages[currentThumbIndex].alt"
                class="main-image" 
                @click="openGrid" 
                @load="onMainLoad"
                :class="{ 'is-loaded': mainImageLoaded }" />


          <div v-if="hasVideo" class="video-overlay" @click="playVideo">
            <i class="bi bi-play-circle"></i>
            <span>Video</span>
          </div>
        </div>
      </div>

      <!-- 2×2 Thumbnail grid -->
      <div class="col-lg-5 px-2 ps-lg-2 d-flex flex-column">
        <div class="thumbnail-grid flex-fill">
          <div v-for="(img, idx) in allImages.slice(1, 5)" :key="idx" class="thumbnail-wrapper"
            @click="openGallery(idx + 1)">

            <div v-if="!thumbLoaded[idx + 1]" class="skeleton-placeholder"></div>
            <img 
                :src="img.original_url" 
                class="thumbnail-img" 
                @load="onThumbLoad(idx + 1)"
                :class="{ 'is-loaded': thumbLoaded[idx + 1] }" />
            <div v-if="idx === 3" class="gallery-button"  @click="openGrid">
              <i class="fa-solid fa-images"></i>
              <span>More Images</span>
            </div>
          </div>
        </div>
      </div>
    </div>


 <!-- right before your swiper-lightbox modal: -->
 <GalleryGrid
    :visible="isGridOpen"
    :images="allImages"
    :categories="['All', ...new Set(allImages.map(i=>i.custom_properties?.category))]"
    @close="isGridOpen = false"
    @select="openGallery" 
  />


    <!-- Fullscreen gallery modal -->
    <transition name="fade">
      <div v-if="isGalleryOpen" class="gallery-modal">
        <button class="close-btn" @click="closeGallery">&times;</button>

        <swiper ref="gallerySwiper" :modules="modules" class="gallery-swiper" :initial-slide="galleryIndex" navigation
          loop :slides-per-view="1" :space-between="0" :centered-slides="false">
          <swiper-slide v-for="(img, idx) in allImages" :key="idx">
            <img :src="img.original_url" :alt="img.alt" class="gallery-slide-img" />
          </swiper-slide>
        </swiper>
      </div>
    </transition>




</div>


    <!-- Modal -->
    <div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quoteModalLabel">Request a Quote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" @submit.prevent="submitEnquiry">
                        <div class="col-md-6">
                            <input type="text" class="form-control rounded-0" v-model="form.vehicle_name" disabled />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Your Name" v-model="form.name" />
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="email" class="form-control" placeholder="Your Email" v-model="form.email" />
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control" placeholder="Your Mobile Number"
                                v-model="form.mobile" />
                        </div>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example"
                                v-model="form.purchase_time">
                                <option value selected>When Are You Hoping To Purchase ?</option>
                                <option value="Immediately">Immediately</option>
                                <option value="Next Week">Next Week</option>
                                <option value="Two Weeks">Two Weeks</option>
                                <option value="One Month">One Month</option>
                                <option value="Not Sure">Not Sure</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="form-select" aria-label="Default select example"
                                v-model="form.payment_method">
                                <option value selected>Payment Method</option>
                                <option value="Full Lease">Full Lease</option>
                                <option value="Half Lease">Half Lease</option>
                                <option value="Cash">Cash</option>
                                <option value="Loan">Loan</option>
                                <option value="Half Loan">Half Loan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <textarea class="form-control" aria-label="With textarea" placeholder="Your Address"
                                    v-model="form.address"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <textarea class="form-control" aria-label="With textarea" placeholder="Your Message"
                                    rows="3" v-model="form.message"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <div class="container summary">
        <h1 class="fw-bold text-start">Vehicle summary</h1>
        <div class="summary-grid">
            <div class="summary-item">
                <span class="label">Vehicle Name</span>
                <span class="value">{{ vehicle.manufacture.title }} {{ vehicle.vehicle_model.title }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Make</span>
                <span class="value">{{ vehicle.manufacture.title }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Vehicle type</span>
                <span class="value">{{ vehicle.vehicle_type.title }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Condition</span>
                <span class="value">{{ vehicle.condition }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Fuel</span>
                <span class="value">{{ vehicle.fuel_type }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Vehicle Seats</span>
                <span class="value">{{ vehicle.seats }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Vehicle Doors</span>
                <span class="value">{{ vehicle.doors }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Ex Color</span>
                <span class="value">{{ vehicle.ex_color.name }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Transmission</span>
                <span class="value">{{ vehicle.transmission }}</span>
            </div>
            <div class="summary-item">
                <span class="label">In Color</span>
                <span class="value">{{ vehicle.in_color.name }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Chassis ID</span>
                <span class="value">{{ vehicle.chassis_no }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Passengers</span>
                <span class="value">{{ vehicle.passengers }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Engine CC</span>
                <span class="value">{{ vehicle.engine_capacity }}CC</span>
            </div>
            <div class="summary-item">
                <span class="label">Drive Type</span>
                <span class="value">{{ vehicle.drive_type }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Auction Grade</span>
                <span class="value">{{ vehicle.auction_grade }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Year</span>
                <span class="value">{{ vehicle.year }}</span>
            </div>
            <div class="summary-item">
                <span class="label">Mileage</span>
                <span class="value">{{ vehicle.mileage }}KM</span>
            </div>
            <div class="summary-item">
                <span class="label">Availability</span>
                <span class="value" :class="availabilityColor(vehicle.availability)">{{ vehicle.availability
                }}</span>
            </div>
        </div>

        <div class="description">
            <h1 class="fw-bold text-start">Description</h1>
            <div id="interiorFeatures" class="accordion-collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li v-html="$page.props.vehicle.editorContent"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Similar Cars -->
    <div class="container section mt-4 px-3 px-sm-4" v-if="randomVehicles">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h3 class="fw-bold text-start text-center">You might also be interested</h3><br>
                <div class="car-grid">
                    <div class="car-card" v-for="(car, index) in randomVehicles.slice(0, 4)" :key="index">
                        <Link class="card border shadow-sm d-flex flex-column h-100" type="button" :href="route('product', {
                            model: $root.stringToSlug(car.manufacture.title),
                            slug: ($root.stringToSlug(car.manufacture.title) + '-' + $root.stringToSlug(car.vehicle_model.title)),
                            id: car.id
                        })">
                        <div class="image-container">
                            <img :src="car.media.find(item => item.custom_properties?.type === 'vehicle_main')?.original_url || 'https://via.placeholder.com/400x200'"
                                alt="Car Image" class="car-image" />
                            <div class="image-counter">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <rect x="2" y="2" width="16" height="16" rx="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <path d="M20.4 14.5L16 10 4 20" />
                                </svg>
                                
                                <span>{{ car.media.length }}</span>
                            </div>
                        </div>

                        <!-- CARD CONTENT -->
                        <div class="card-content">
                            <div class="price-section">
                                <div class="price-left">
                                    <span class="label">From</span>
                                    <span class="price">${{ car.monthly_payment || car.price || 'N/A' }}</span>
                                    <span class="price-note">
                                        {{ car.priceNote || "Per Month (Inc. VAT)" }}
                                    </span>
                                    <p class="mb-0">${{ car.initial_payment?.toLocaleString() || 'N/A' }} Initial
                                        Payment</p>
                                </div>
                                <div class="price-right">
                                    <div class="detail-item1">{{ car.engine_capacity || 'N/A' }}CC</div>
                                    <div class="detail-item1">
                                        {{ car.year || 'N/A' }} RegYear
                                    </div>
                                    <div class="detail-item1">
                                        <template v-if="car.used_status === 'Used'">{{ car.mileage || 'N/A' }} Miles
                                            P/A</template>
                                        <template v-else>
                                            <span style="color: green;">BRAND NEW</span>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- CAR DETAILS -->
                            <div class="car-details">
                                <h2 class="car-name">{{ getManufacturerModel(car) }}</h2>
                                <p class="car-model" :class="availabilityColor(car.availability)">{{
                                    car.availability || 'N/A' }}</p>
                            </div>

                            <!-- FEATURES GRID -->
                            <div class="features-grid">
                                <div class="feature-item">
                                    <img class="ficon" src="/images/Assets/seat.svg" alt="Seat icon" />
                                    <span>{{ car.seats || 'N/A' }} Seats</span>
                                </div>
                                <div class="feature-item">
                                    <img class="ficon" src="/images/Assets/doors.svg" alt="Door icon" />
                                    <span>{{ car.doors || 'N/A' }} Doors</span>
                                </div>
                                <div class="feature-item">
                                    <img class="ficon" src="/images/Assets/passenger.svg" alt="Hatchback icon" />
                                    <span>{{ car.passengers || 'N/A' }} persons</span>
                                </div>
                                <div class="feature-item">
                                    <img class="ficon" src="/images/Assets/flash.svg" alt="Electric icon" />
                                    <span>{{ car.fuel_type || 'N/A' }}</span>
                                </div>
                                <div class="feature-item">
                                    <img class="ficon" src="/images/Assets/automatc.svg" alt="Automatic icon" />
                                    <span>{{ car.transmission || 'N/A' }}</span>
                                </div>
                                <div class="feature-item">
                                    <img class="ficon" src="/images/Assets/miles.svg" alt="Miles icon" />
                                    <span>{{ car.range || car.mileage || 'N/A' }} Miles</span>
                                </div>
                            </div>
                        </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import Swal from "sweetalert2";
import AppLayout from "@@/Layouts/AppLayout.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/thumbs";
import { Mousewheel, FreeMode, Navigation, Thumbs } from "swiper/modules";
import GalleryGrid from './GalleryGrid.vue';


export default {
    components: {
        AppLayout,
        Swiper,
        SwiperSlide,
        Link,
        GalleryGrid,
    },


    setup() {
        return { modules: [Mousewheel, FreeMode, Thumbs, Navigation, Keyboard] }
    },

    props: {
        vehicle: Object,
        randomVehicles: Object,
    },
    data() {
        return {
            isGridOpen: false,
            isGalleryOpen: false,
            galleryIndex: 0,
            mainImageLoaded: false,
            thumbLoaded: {},
            form: useForm({
                vehicle_name:
                    this.$page.props.vehicle.manufacture.title +
                    " " +
                    this.$page.props.vehicle.vehicle_model.title +
                    " " +
                    this.$page.props.vehicle.ex_color.name,
                vehicle_url: route("product", {
                    model: this.$root.stringToSlug(
                        this.$page.props.vehicle.manufacture.title
                    ),
                    slug:
                        this.$root.stringToSlug(
                            this.$page.props.vehicle.manufacture.title
                        ) +
                        "-" +
                        this.$root.stringToSlug(
                            this.$page.props.vehicle.vehicle_model.title
                        ),
                    id: this.$page.props.vehicle.id,
                }),
                vehicle_id: this.$page.props.vehicle.id,
                stock_type: "local",
                name: "",
                email: "",
                mobile: "",
                purchase_time: "",
                payment_method: "",
                address: "",
                message: "",
            }),
            mainImages: this.vehicle.media.filter(
                (image) => image.custom_properties?.type === "vehicle_gallery"
            ),
            thumbnailImages: this.vehicle.media.filter(
                (image) => image.custom_properties?.type === "vehicle_gallery"
            ),
            currentThumbIndex: 0,
            thumbsSwiper: null
        };
    },
    setup() {
        return {
            modules: [Mousewheel, FreeMode, Thumbs, Navigation],
        };
    },
    mounted() {
        console.log(this.$refs.thumbsSwiper);
    },
    methods: {
        // setMainImage(index) {
        //     this.currentThumbIndex = index;
        //     this.$nextTick(() => {
        //         const swiper = this.$refs.mainSwiper.$el.swiper;
        //         if (this.$refs.mainSwiper.$el.swiper) {
        //             console.log(swiper);
        //             this.$refs.mainSwiper.$el.swiper.slideTo(index);
        //         }
        //     });
        // },
        submitEnquiry() {
            this.form.post(route("submit-inquiry"), {
                preserveScroll: true,
                onSuccess: () => {
                    console.log("saved"),
                        this.form.reset(
                            "name",
                            "email",
                            "mobile",
                            "purchase_time",
                            "payment_method",
                            "address",
                            "message"
                        ),
                        Swal.fire({
                            icon: "success",
                            title: "Inquiry Submitted Successfully",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                },
                onError: () => {
                    console.log("error"),
                        Swal.fire({
                            icon: "error",
                            title: "Something went wrong! Please try again later",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                },
            });
        },
        startApplication() {
            window.location.href = route("application", { id: this.vehicle.id });
        },
        viewGallery() {
            console.log("View gallery clicked");
        },
        getManufacturerModel(car) {
            const baseName = `${car.manufacture?.title || ''} ${car.vehicle_model?.title || ''}`;
            const additionalDetails = [
                // car.transmission || 'Auto',
                // `${car.doors || '5'}dr`
            ].filter(Boolean).join(' ');
            return `${baseName} ${additionalDetails}`.trim();
        },
        availabilityColor(status) {
            switch (status) {
                case "Available":
                    return "availability-available";
                case "Arriving":
                    return "availability-arriving";
                case "Sold":
                    return "availability-sold";
                default:
                    return "";
            }
        },
   // capture thumb‐carousel instance
    setThumbsSwiper(swiper) {
      this.thumbsSwiper = swiper;
  },

    // jump main carousel to clicked thumbnail
    setMainImage(index) {
      this.currentThumbIndex = index;
      // Vue-Swiper exposes the real swiper as `.swiper`
      const main = this.$refs.mainSwiper;
      if (main && main.swiper) {
        main.swiper.slideTo(index);
      }
    },

     onSlideChange(swiper) {
    // realIndex is the zero-based slide number
    this.currentThumbIndex = swiper.realIndex
  },

  
  openGrid() { this.isGridOpen = true },
    handleGridSelect(i) { this.openGallery(i + 1) },
    openGallery(startIdx) {
      this.galleryIndex = startIdx - 1
      this.isGalleryOpen = true
      this.$nextTick(() => {
        this.$refs.gallerySwiper?.swiper.slideTo(this.galleryIndex)
      })
    },
    closeGallery() { this.isGalleryOpen = false },
    onMainLoad() { this.mainImageLoaded = true },
    onThumbLoad(idx) { this.$set(this.thumbLoaded, idx, true) },
  


  
    },
    computed: {
        // thumbnailImages() {
        // return this.vehicle.media.filter(
        // img => img.custom_properties?.type === "vehicle_gallery"
        // );
        // },
        // mainImages() {
        //     // ← mirror thumbnailImages exactly
        //     return this.thumbnailImages;
        // },

        //  allImages() {
        //         // find the single “main” image
        //         const main = this.vehicle.media.find(m => m.custom_properties?.type === 'vehicle_main')
        //         // grab all the gallery shots
        //         const gallery = this.vehicle.media.filter(m => m.custom_properties?.type === 'vehicle_gallery')
        //         // if there is a main, put it first; otherwise just gallery
        //         return main ? [main, ...gallery] : gallery
        //     }

        allImages() {
            const main = this.vehicle.media.find(m => m.custom_properties?.type === 'vehicle_main')
            const gallery = this.vehicle.media.filter(m => m.custom_properties?.type === 'vehicle_gallery')
            return main ? [main, ...gallery] : gallery
    }
            
        

  },
};
</script>

<style scoped>


/* Container for the buttons */
.action-buttons {
    display: flex;
    justify-content: left;
    margin: 20px 0;
}

.btn.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn.btn-primary:hover {
    background-color: #0056b3;
}

.btn2.btn-primary {
    background-color: transparent;
    color: #007bff;
    border: 2px solid #007bff;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn2.btn-primary:hover {
    background-color: #007bff;
    color: white;
}

.availability-available {
    color: #22c55e;

}

.availability-arriving {
    color: #f97316;
}

.availability-sold {
    color: #ef4444;
}

.main-container {
    background: #ffffff;
    padding: 30px;
    max-width: 1400px;
    margin: 0 auto;
}

.title-container {
    background: #ffffff;
    padding: 20px;
}

.main-title {
    font-weight: bold;
    color: #000000;
    margin: 0;
    font-size: 2.5rem;
}

.thumbnails-container .swiper-slide {
    display: flex;
    justify-content: center;
}

.main-image {
    width: 100%;
    height: 50vh;
    min-height: 300px;
    max-height: 550px;
    object-fit: cover;
     cursor: pointer;
}

.thumbnail {
    width: 100%;
    height: 100px;
    object-fit: cover;
    cursor: pointer;
}

.thumbnail.active {
    border: 2px solid #fff;
}

/* Car Details Section */
.car-details {
    padding: 0;
}

.status-buttons {
    display: flex;
    gap: 10px;
    margin-bottom: 30px;
    margin-top: 18%;
}

.status-label {
    border: 2px solid #000;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    text-decoration: none;
    color: #000;
    font-weight: bold;
    display: inline-block;
}

.car-details h3 {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.car-details .text-muted {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.car-details .price {
    font-size: 3rem;
    font-weight: bold;
    color: #000;
    margin-bottom: 0.5rem;
}

.car-details .description {
    font-size: 1.2rem;
    line-height: 2;
    margin-bottom: 1.5rem;
    text-align: left;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.car-details .btn,
.car-details .btn2 {
    font-size: 1.3rem;
    padding: 0.5rem 1rem;
    text-align: center;
    display: inline-block;
    cursor: pointer;
}


.car-details .btn {
    background-color: #000000 !important;
    border-color: #000000 !important;
}

.car-details .btn:hover {
    color: #000000 !important;
    background-color: #ffffff !important;
    border-color: #000000 !important;
}


/* Summary Section */
.summary {
    max-width: 1400px;
    margin: 20px auto;
    background-color: rgb(255, 255, 255);
    padding: 30px;
    border-radius: 8px;
}

h1 {
    font-size: 32px;
    color: #333;
    margin-bottom: 30px;
}

.summary-grid {
    font-size: 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}

.summary-item {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.label {
    font-size: 20px;
    color: #333;
    font-weight: 500;
    font-family: 'Inter', sans-serif;
}

.value {
    font-family: 'Inter', sans-serif;
    font-weight: 400;
    text-align: right;
}

.available {
    color: #22c55e;
}

.description {
    margin-top: 30px;
}

.description h2 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    margin-bottom: 20px;
    color: #333;
}

.car-details h3 {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    margin-bottom: 15px;
    color: #444;
}

.car-details p {
    font-family: 'Inter', sans-serif;
    margin-bottom: 10px;
}

.features-list {
    margin-top: 15px;
    padding-left: 20px;
}

.features-list li {
    font-family: 'Inter', sans-serif;
    margin-bottom: 8px;
    color: #666;
    line-height: 1.4;
}

.spec-item {
    margin-bottom: 12px;
}

/* Modal Styles */
.modal-dialog {
    max-width: 90%;
    margin: 1.75rem auto;
}

.modal-content {
    padding: 15px;
}

.form-control,
.form-select {
    font-size: 1rem;
    padding: 0.75rem;
}

/* Similar Cars Section */
.section {
    padding: 30px 0;
}

.car-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.car-card {
    display: flex;
    flex-direction: column;
}

.card {
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.2s;
}

.card:hover {
    transform: scale(1.02);
}

.image-container {
    position: relative;
    width: 100%;
    padding-top: 56.25%;
    /* 16:9 Aspect Ratio */
}

.car-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-counter {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    padding: 5px 10px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.9rem;
}

.card-content {
    padding: 15px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.price-section {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.price-left {
    display: flex;
    flex-direction: column;
}

.price-left .label {
    font-size: 0.9rem;
    color: #6c757d;
    text-transform: uppercase;
}

.price-left .price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #000;
}

.price-left .price-note {
    font-size: 0.9rem;
    color: #6c757d;
}

.price-left p {
    font-size: 1rem;
    margin: 0;
}

.price-left small {
    font-size: 0.9rem;
    color: #6c757d;
}

.price-right {
    display: flex;
    flex-direction: column;
    text-align: right;
}

.detail-item1 {
    font-size: 0.9rem;
    color: #333;
    margin-bottom: 5px;
}

.car-details {
    margin-bottom: 15px;
}

.car-name {
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.car-model {
    font-size: 0.9rem;
}

.text-success {
    color: #22c55e;
}

.text-danger {
    color: #ef4444;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin-top: 10px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.ficon {
    width: 16px;
    height: 16px;
}

/* Responsive Adjustments */
@media (max-width: 1200px) {
    .car-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .main-container {
        padding: 20px;
    }

    .main-title {
        font-size: 2rem;
    }

    .car-details h3 {
        font-size: 2.5rem;
    }

    .car-details .price {
        font-size: 2.5rem;
    }
}

@media (max-width: 992px) {
    .car-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .main-image {
        height: 40vh;
        max-height: 450px;
    }

    .thumbnail {
        height: 80px;
    }

    .car-details h3 {
        font-size: 2rem;
    }

    .car-details .price {
        font-size: 2rem;
    }

    .car-details .description {
        font-size: 1rem;
        line-height: 1.8;
    }

    .action-buttons {
        flex-direction: column;
    }

    .car-details .btn,
    .car-details .btn2 {
        font-size: 1.1rem;
        padding: 0.5rem;
    }

    .summary-grid {
        grid-template-columns: 1fr;
    }

    .summary-item {
        grid-template-columns: 1fr 1fr;
    }

    .label,
    .value {
        font-size: 18px;
    }

    h1 {
        font-size: 28px;
    }

    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .main-container {
        padding: 15px;
    }

    .main-title {
        font-size: 1.8rem;
    }

    .main-image {
        height: 35vh;
        max-height: 350px;
    }

    .thumbnail {
        height: 60px;
    }

    .car-details h3 {
        font-size: 1.8rem;
    }

    .car-details .price {
        font-size: 1.8rem;
    }

    .car-details .description {
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .status-buttons {
        margin-top: 10px;
    }

    .status-label {
        font-size: 12px;
        padding: 4px 12px;
    }

    .car-details .btn,
    .car-details .btn2 {
        font-size: 1rem;
        padding: 0.5rem;
    }

    .summary-grid {
        gap: 15px;
    }

    .summary-item {
        grid-template-columns: 1fr;
        text-align: left;
    }

    .label,
    .value {
        font-size: 16px;
        text-align: left;
    }

    .value {
        margin-top: 5px;
    }

    h1 {
        font-size: 24px;
    }

    .car-grid {
        grid-template-columns: 1fr;
    }

    .price-left .price {
        font-size: 1.3rem;
    }

    .price-left .price-note {
        font-size: 0.8rem;
    }

    .price-left p {
        font-size: 0.9rem;
    }

    .detail-item {
        font-size: 0.8rem;
    }

    .car-name {
        font-size: 1rem;
    }

    .car-model {
        font-size: 0.8rem;
    }

    .features-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }

    .feature-item {
        font-size: 0.9rem;
    }

    .ficon {
        width: 14px;
        height: 14px;
    }
}

@media (max-width: 576px) {
    .main-container {
        padding: 10px;
    }

    .main-title {
        font-size: 1.5rem;
    }

    .main-image {
        height: 30vh;
        max-height: 300px;
    }

    .thumbnail {
        height: 50px;
    }

    .car-details h3 {
        font-size: 1.5rem;
    }

    .car-details .price {
        font-size: 1.5rem;
    }

    .car-details .description {
        font-size: 0.85rem;
        line-height: 1.5;
    }

    .car-details .btn,
    .car-details .btn2 {
        font-size: 0.9rem;
        padding: 0.4rem;
    }

    .label,
    .value {
        font-size: 14px;
    }

    h1 {
        font-size: 20px;
    }

    .modal-dialog {
        max-width: 95%;
    }

    .form-control,
    .form-select {
        font-size: 0.9rem;
        padding: 0.5rem;
    }
}


.thumbnails-container,
.thumbnails-container .swiper-slide {
  /* allow glow to show outside the slide */
  overflow: visible !important;
}

.thumbnail {
  width: 100%;
  height: 100px;
  object-fit: cover;
  cursor: pointer;
  transition:
    border-color 0.3s ease,
    box-shadow   0.3s ease,
    transform    0.3s ease;
}

.thumbnail:hover {
  transform: scale(1.05);
}

.active-thumb {
  /* full light-blue border */
  border: 2px solid #00bfff !important;
  border-radius: 4px;
  /* stronger glow */
  box-shadow: 0 0 8px rgba(0, 191, 255, 0.6) !important;
  /* lift it above its siblings */
  position: relative;
  z-index: 10;
}



.breadcrumbs { font-size:1.1rem; color:#666; margin-bottom:1rem; }
.breadcrumbs a { color:#666; text-decoration:none; }
.breadcrumbs .current { font-weight:500; color:#333; }

.details-grid {
  display:flex; flex-wrap:wrap; gap:.75rem;
}
.detail-item {
  background:linear-gradient(90deg,#0d1b2a,#273b51,#222b35);
  color:#fff; padding:.5rem 1rem; border-radius:20px;
  display:flex; align-items:center; gap:.5rem;
}

.main-image-container { position:relative; width:100%; height:100%; overflow:hidden; }
.main-image { width:100%; height:100%; object-fit:cover; border-radius:1rem 0 0 1rem; }
.thumbnail-grid {
  display:grid; grid-template:repeat(2,1fr)/repeat(2,1fr);
  gap:.5rem;
}
.thumbnail-wrapper { position:relative; overflow:hidden; }
.thumbnail-img { width:100%; height:100%; object-fit:cover; cursor:pointer; }
.gallery-button {
  position:absolute; bottom:8px; right:8px;
  background:rgba(255,255,255,.9); border-radius:20px;
  padding:6px 12px; display:inline-flex; align-items:center; gap:6px;
  font-size:.9rem; color:#050B20; cursor:pointer;
}
.gallery-modal {
  position:fixed; inset:0; background:rgba(0,0,0,.8);
  display:flex; align-items:center; justify-content:center; z-index:2000;
}
.gallery-swiper { width:90vw; height:90vh; }
.gallery-slide-img { width:100%; height:100%; object-fit:contain; }
.close-btn {
  position:absolute; top:1rem; right:1rem; background:rgba(255,255,255,.9);
  border:none; width:2.5rem; height:2.5rem; border-radius:50%;
  display:flex; align-items:center; justify-content:center; font-size:1.5rem;
}


@keyframes shimmer { from { background-position:-200%0 } to { background-position:200%0 } }
.main-image.is-loaded,
.thumbnail-img.is-loaded { opacity:1; transition:opacity .4s; z-index:2; }



/* Desktop only: curve the main image’s left side,
   and the top-right (2nd) & bottom-right (4th) thumbnails */
@media (min-width: 992px) {
  .main-image {
    /* top-left & bottom-left */
    border-radius: 1rem 0 0 1rem !important;
  }
  /* 2×2 grid: the second cell → top-right */
  .thumbnail-grid > .thumbnail-wrapper:nth-child(2) .thumbnail-img {
    border-top-right-radius: 1rem;
  }
  /* 2×2 grid: the fourth cell → bottom-right */
  .thumbnail-grid > .thumbnail-wrapper:nth-child(4) .thumbnail-img {
    border-bottom-right-radius: 1rem;
  }
}

/* Mobile (and tablet) remove *all* rounding */
@media (max-width: 991px) {
  .main-image,
  .thumbnail-img {
    border-radius: 0 !important;
  }
}



.vehicle-title {
  font-size: 2.5rem;    
  font-weight: 700;     
}


.main-price {
  font-size: 2rem;     
  font-weight: 800;     
}
@media (max-width: 768px) {
  .vehicle-title { font-size: 2rem; }
  .main-price    { font-size: 2.5rem; }
}

@media (max-width: 576px) {
  .vehicle-title { font-size: 1.8rem; }
  .main-price    { font-size: 2rem; }
}


/* keep label + value on one row at mobile */
@media (max-width: 770px) {
  .summary-item {
    /* two columns: label then value */
    display: grid;
    grid-template-columns: auto 1fr;
    align-items: center;
    gap: 0.5rem;
  }
  .summary-item .label {
    /* optional: make labels right-aligned */
    text-align: left;
  }
  .summary-item .value {
    text-align: right;
  }
}


/* shrink the gallery‑button on small devices */
@media (max-width: 576px) {
  .gallery-button {
    padding: 4px 8px !important;
    font-size: 0.75rem !important;
    bottom: 4px;
    right: 4px;
  }
  .gallery-button i {
    font-size: 1rem !important;
  }
}



/* tablets */
@media (max-width: 768px) {
  .vehicle-title {
    font-size: 2rem;
  }
  .main-price {
    font-size: 1.8rem;
  }
  .details-grid .detail-item {
    font-size: 0.85rem;
    padding: 0.4rem 0.8rem;
  }
  .btn,
  .btn2,
  .btn-icon {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
  }
}

/* phones */
@media (max-width: 576px) {
  .vehicle-title {
    font-size: 1.6rem;
  }
  .main-price {
    font-size: 1.6rem;
  }
  .details-grid .detail-item {
    font-size: 0.7rem;
    padding: 0.3rem 0.6rem;
  }
  .btn,
  .btn2,
  .btn-icon {
    font-size: 0.8rem;
    padding: 0.4rem 0.8rem;
  }
  /* shrink the gallery‑button too */
  .gallery-button {
    padding: 4px 8px !important;
    font-size: 0.75rem !important;
    bottom: 4px;
    right: 4px;
  }
  .gallery-button i {
    font-size: 1rem !important;
  }
}



:deep(.gallery-swiper .swiper-button-next),
:deep(.gallery-swiper .swiper-button-prev) {
  width: 24px;
  height: 24px;
  background-color: rgb(208, 204, 204);
  color: #003366;
  font-weight: 600;
  border-radius: 50%;        
 
  display: flex;             
  align-items: center;
  justify-content: center;
  padding: 14px;
}

:deep(.gallery-swiper .swiper-button-next::after),
:deep(.gallery-swiper .swiper-button-prev::after) {
  font-size: 18px;
}


</style>