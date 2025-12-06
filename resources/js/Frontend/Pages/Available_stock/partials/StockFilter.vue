<template>
  <Banner :selected-country="selectedCountry" />

  <div class="container4 mt-5 mb-5">
    <div class="row">
      <div class="col-lg-3 position-relative">
        <div class="p-3 filter-sidebar" :class="{ 'sticky-filter': isSticky }">
          <div class="card-body">
            <h3 class="mb-4">Filter Car</h3>
            <div class="d-flex flex-column">
              <input type="text" class="form-control rounded mb-2" placeholder="Search vehicles..." v-model="keyword" />
              <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-primary" @click="search">Search</button>
                <button class="btn btn-secondary" @click="clearSearch">Clear</button>
              </div>
            </div>
            <div class="accordion" id="accordionExample">
              <div class="accordion-item border-0 mb-2">
                <h2 class="accordion-header">
                  <button class="accordion-button rounded" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">TYPE</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <Types />
                  </div>
                </div>
              </div>

              <div class="accordion-item border-0 mb-2">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseTwo">MANUFACTURER</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <Manufactures />
                  </div>
                </div>
              </div>

              <div class="accordion-item border-0 mb-2">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">MODEL</button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <Models />
                  </div>
                </div>
              </div>

              <!-- <div class="accordion-item border-0 mb-2">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">COUNTRY</button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <Countries :countries="$page.props.countries" />
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>

      <!--SORT BY BUTTON-->
      <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <select class="form-select w-auto ms-auto" v-model="sortBy" @change="applySort">
            <option value>Sort by</option>
            <option value="priceLowHigh">Price: Low to High</option>
            <option value="priceHighLow">Price: High to Low</option>
            <option value="newest">Newest Arrivals</option>
          </select>
        </div>



        <div v-if="isLoading" class="text-center">
          <p>Loading vehicles...</p>
        </div>


        <!-- <div v-else-if="$page.props.vehicles && $page.props.vehicles.length > 0"
          class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col" v-for="vehicle in $page.props.vehicles" :key="vehicle.id">
            <Link class="text-decoration-none text-dark" :href="route('product', {
              model: $root.stringToSlug(vehicle.manufacture.title),
              slug: $root.stringToSlug(vehicle.manufacture.title) + '-' + $root.stringToSlug(vehicle.vehicle_model.title),
              id: vehicle.id
            })">
            <div class="card car-card h-100 position-relative">
              <span class="badge badge-corner" :class="vehicle.latest ? 'bg-success' : 'bg-primary'">
                {{ vehicle.latest ? 'NEW ARRIVAL' : 'ON DEMAND' }}
              </span>

              <img :src="vehicle.media.find(item => item.custom_properties?.type === 'vehicle_main')?.original_url"
                class="card-img-top" :alt="vehicle.model + ' ' + vehicle.model"
                style="height: 200px; object-fit: cover;" />

              <div class="card-body d-flex flex-column">
                <small class="text-muted">chassis_no {{ vehicle.chassis_no }}</small>
                <h5 class="card-title">
                  {{ vehicle.year }} {{ vehicle?.manufacture?.title }} {{ vehicle?.vehicle_model?.title }}
                </h5>
                <p class="card-text">{{ vehicle.drive_type }}</p>
                <p class="card-text">{{ vehicle.seats }}-Seater</p>
                <p class="card-text">{{ vehicle.engine_capacity }}CC</p>

                <div class="mt-auto">
                  <small class="text-muted">Minimum Down Payment:</small>
                  <p class="mb-0">${{ vehicle.initial_payment }}</p>
                </div>
                <br />
                <span class="btn btn-black-gradient">View More</span>
              </div>
            </div>
            </Link>
          </div>
        </div> -->

       <div v-else-if="$page.props.vehicles.data.length" class="cards-grid">
        
            
          <div class="card-wrapper"
             v-for="vehicle in $page.props.vehicles.data"
             :key="vehicle.id">
            <Link
              class="card car-card h-100 position-relative text-decoration-none text-dark"
              :href="route('product', {
                model: $root.stringToSlug(vehicle.manufacture.title),
                slug: $root.stringToSlug(vehicle.manufacture.title) + '-' + $root.stringToSlug(vehicle.vehicle_model.title),
                id: vehicle.id
              })"
            >
              <!-- IMAGE + COUNTER -->
              <div class="image-container">
                <img
                  :src="vehicle.media.find(m => m.custom_properties?.type === 'vehicle_main')?.original_url"
                  alt="Car Image"
                  class="car-image img-fluid"
                />
                <div class="image-counter">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="2" width="16" height="16" rx="2" />
                    <circle cx="8.5" cy="8.5" r="1.5" />
                    <path d="M20.4 14.5L16 10 4 20" />
                  </svg>
                  <span>{{ vehicle.media?.length || 0 }}</span>
                </div>
              </div>

              <!-- CARD CONTENT -->
              <div class="card-content">
                <div class="price-section">
                  <div class="price-left">
                    <span class="label">Price</span>
                   <span class="price">
  {{ formatPrice(vehicle.price) }}
  <span class="currency">LKR</span>
</span>

                    <span class="price-note">{{ vehicle.priceNote || 'Price includes VAT' }}</span>
                  </div>
                  <div class="price-right">
                    <div class="detail-item">
                      <template v-if="vehicle.used_status === 'Used'">{{ vehicle.engine_capacity }} Initial Payment</template>
                      <template v-else>{{ vehicle.engine_capacity }} Engine</template>
                    </div>
                    <div class="detail-item">{{ vehicle.year || '24 Month Contract' }} Reg Year</div>
                    <div class="detail-item">
                      <template v-if="vehicle.used_status === 'Used'">
                        {{ vehicle.mileage }} Miles P/A
                      </template>
                      <template v-else>
                        <span style="color: green;">BRAND NEW</span>
                      </template>
                    </div>
                    <div class="detail-item" v-if="vehicle.monthly_price">
  {{ formatPrice(vehicle.monthly_price) }}
  <span class="currency">LKR</span> Per Month
</div>

                  </div>
                </div>


                <div class="car-details mb-2">
                  <h2 class="car-name">
                    {{ vehicle.manufacture.title }} {{ vehicle.vehicle_model.title }}
                  </h2>
                  <p class="car-model"
                    :class="{
                      'availability-available': vehicle.availability==='Available',
                      'availability-arriving':  vehicle.availability==='Arriving',
                      'availability-sold':      vehicle.availability==='Sold'
                    }"
                  >
                    {{ vehicle.availability }}
                  </p>
                </div>

                <div class="features-grid">
                  <div class="feature-item feature-left">
                    <img class="ficon" src="/images/Assets/seat.svg" alt="Seat icon" />
                    <span>{{ vehicle.seats }} Seats</span>
                  </div>
                  <div class="feature-item feature-right">
                    <img class="ficon" src="/images/Assets/doors.svg" alt="Door icon" />
                    <span>{{ vehicle.doors }} Doors</span>
                  </div>
                  <div class="feature-item feature-left">
                    <img class="ficon" src="/images/Assets/passenger.svg" alt="Passengers icon" />
                    <span>{{ vehicle.passengers }} persons</span>
                  </div>
                  <div class="feature-item feature-right">
                    <img class="ficon" src="/images/Assets/flash.svg" alt="Fuel icon" />
                    <span>{{ vehicle.fuel_type }}</span>
                  </div>
                  <div class="feature-item feature-left">
                    <img class="ficon" src="/images/Assets/automatc.svg" alt="Transmission icon" />
                    <span>{{ vehicle.transmission }}</span>
                  </div>
                  <div class="feature-item feature-right">
                    <img class="ficon" src="/images/Assets/miles.svg" alt="Range icon" />
                    <span>{{ vehicle.range }} Miles</span>
                  </div>
                </div>
              </div>
            </Link>
          </div>
        </div>

        <!-- pagination -->
<div v-if="$page.props.vehicles.links.length" class="mt-4 flex justify-center">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li
        v-for="link in $page.props.vehicles.links"
        :key="link.label"
        :class="['page-item', { active: link.active, disabled: !link.url }]"
      >
        <Link
          class="page-link"
          :href="link.url"
          v-html="link.label"
        ></Link>
      </li>
    </ul>
  </nav>
</div>



        

        <div v-else class="text-center">
          <p>No vehicles found matching your filters.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Types from "./models/Types.vue";
import Manufactures from "./models/Manufactures.vue";
import Models from "./models/Models.vue";
import Countries from "./models/Countries.vue";
import Banner from "./Banner.vue";

export default {
  components: {
    Types,
    Manufactures,
    Models,
    Countries,
    Link,
    Banner,
  },
  name: "AvailableStockIndex",

  data() {
    return {
      isSticky: false,
      sortBy: this.$page.props.requestQuery.sortBy || "",
      keyword: this.$page.props.requestQuery.keyword || "",
      isLoading: false,
    };
  },
  computed: {
    selectedCountry() {
      return this.$page.props.selectedCountry || null;
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  methods: {
    handleScroll() {
      const scrollY = window.scrollY;
      const offsetTop = this.$refs.filterSidebar?.offsetTop || 0;
      this.isSticky = scrollY > offsetTop;
    },
    search() {
      this.isLoading = true;
      this.$inertia.reload({
        method: "POST",
        data: {
          _method: "GET",
          keyword: this.keyword,
        },
        onFinish: () => {
          this.isLoading = false;
        },
      });
    },
    clearSearch() {
      this.keyword = "";
      this.isLoading = true;
      this.$inertia.visit('/available-cars', {
        method: 'get',
        onFinish: () => {
          this.isLoading = false;
        },
      });
    },
    applySort() {
    this.isLoading = true

    // merge in any existing filters so you don't wipe them out
    const query = {
      ...this.$page.props.requestQuery,
      sortBy: this.sortBy
    }

    this.$inertia.get(
      window.location.pathname,
      query,
      {
        preserveScroll: true,
        onFinish: () => { this.isLoading = false }
      }
    )
  },
   formatPrice(value) {
    if (value === null || value === undefined) return "0";
    const num = Number(value) || 0;

    // Add thousand separators, no decimals
    return num.toLocaleString("en-LK", {
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    });
  },
  },
};
</script>
<style scoped>
.container4 {
    width: 100%;
    max-width: 1800px;
    margin: 0 auto;
    padding: 0 1rem;
}
.btn-black-gradient {
  background: linear-gradient(45deg, #ece8e8, #b3acac);
  color: rgb(0, 0, 0);
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 0.25rem;
  text-decoration: none;
  transition: background 0.3s ease;
}

.btn-black-gradient:hover {
  background: linear-gradient(45deg, #afa9a9, #f3efef);
}

.badge-corner {
  position: absolute;
  top: 10px;
  left: 10px;
  padding: 0.5em;
  font-size: 0.75em;
}

/* .car-card {
  overflow: hidden;
  border: 1px solid #eaeaea;
  transition: transform 0.3s;
} */
/* 
.car-card:hover {
  transform: translateY(-5px);
} */

.btn-outline-secondary {
  font-weight: 600;
}

.bg-color-1 {
  background-color: #e4f7ff;
}

.filter-sidebar {
  border: 1px solid #eaeaea;
}

.sticky-filter {
  position: sticky;
  top: 70px;
  z-index: 10;
}

.form-control {
  background-color: #F7F7F7;
  border: 1px solid #9EA3B9;
  border-radius: 0;
  padding: 0.75rem;
  margin-bottom: 1.5rem;
}

.similar-cars .card {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
}

.similar-cars .d-flex {
  flex-direction: column;
  align-items: start;
}

.similar-cars .btn {
  margin-top: 10px;
}

@media (max-width: 768px) {
  .car-title {
    flex-direction: column;
  }

  .main-image-container {
    height: 300px;
  }

  .row-car {
    justify-content: center;
    overflow-x: auto;
    white-space: nowrap;
  }
}

.accordion-button {
  border: 1px solid #ccc;
  background-color: white;
  color: #04245D;
  font-weight: bold;
  padding: 1rem;
}

.accordion-button:not(.collapsed) {
  background-color: white;
  color: #04245D;
  box-shadow: none;
}

.accordion-collapse {
  background-color: white;
}

.main-container {
  max-width: 80%;
  margin: 2rem auto;
  padding: 1rem;
}

.breadcrumb {
  margin-top: 1rem;
}

.price-tag {
  background-color: #343a40;
  color: white;
  padding: 1rem;
  border-radius: 0.25rem;
}

.price-tag small {
  display: block;
  font-size: 0.875rem;
  opacity: 0.8;
}

.gallery-container {
  width: 100%;
  margin-top: 1rem;
  margin-bottom: 3rem;
}

.main-image-container {
  width: 100%;
  height: 700px;
  overflow: hidden;
  border-radius: 0.5rem;
  margin-bottom: 1rem;
}

.main-image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.row-car {
  display: flex;
  flex-wrap: wrap;
  gap: 1.7rem;
}

@media (max-width: 768px) {
  .row-car {
    gap: 1rem;
  }
}

.thumbnail {
  height: 120px;
  object-fit: cover;
  border-radius: 0.25rem;
  cursor: pointer;
  opacity: 0.7;
  transition: opacity 0.3s ease;
  margin: 0;
}

@media (max-width: 768px) {
  .thumbnail {
    height: 80px;
  }
}

.thumbnail:hover {
  opacity: 1;
}

.thumbnail.active {
  opacity: 1;
  border: 2px solid #343a40;
}

.social-icons {
  display: flex;
  gap: 0.5rem;
}

.card {
  transition: transform 0.2s;
  height: 100%;
  color: #04245D;
}

.card:hover {
  transform: translateY(-5px);
}

.card-img-top {
  height: 200px;
  object-fit: cover;
}

.price {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 1rem;
  color: #04245D;
}

.car-title {
  z-index: 10;
  background-color: rgba(255, 255, 255, 0.8);
  position: sticky;
  top: 70px;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  margin-bottom: 1rem;
  color: #04245D;
}

.filter-sidebar {
  position: sticky;
  top: 20px;
}

@media (max-width: 768px) {
  .car-title {
    position: static;
    top: auto;
  }
}

.car-details {
  display: flex;
  flex-direction: column;
  align-items: left;
  color: #04245D;
}

.price-tag {
  font-size: 1.25rem;
  font-weight: bold;
}

.car-specs {
  margin-top: 1rem;
}

.accordion {
  margin-top: 3rem;
}

.share-section {
  padding: 1rem;
  margin-top: 1rem;
}

footer {
  margin-top: 1rem;
  padding: 1rem;
}

.btn-primary {
  background-color: #9EA3B9;
  border-color: #9EA3B9;
}

.btn-primary:hover {
  background-color: #7D8199;
  border-color: #7D8199;
}

.btn-outline-dark {
  color: #9EA3B9;
  border-color: #9EA3B9;
}

.btn-outline-dark:hover {
  color: #7D8199;
  border-color: #7D8199;
  background-color: #9EA3B9;
}



/* from FirstSection.vue */
.car-card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  background: #fff;
  transition: transform 0.3s;
}
.car-card:hover {
  transform: translateY(-5px);
}

.image-container { position: relative; }
.car-image { width: 100%; display: block; }

.image-counter {
  position: absolute;
  bottom: 10px;
  right: 10px;
  background: rgba(255,255,255,0.8);
  padding: 5px;
  border-radius: 4px;
  display: flex;
  align-items: center;
}

.card-content { padding: 20px; }

.price-section {
  display: flex;
   flex-wrap: wrap; 
  justify-content: space-between;
  margin-bottom: 10px;
}

.price-left .price {
  font-size: 28px;       /* ← copy the exact rem/em value from FirstSection.vue */
  font-weight: 500;
  color: #000;             /* ← black (or whatever text‐dark colour you used) */
  display: block;
  margin: 0.2rem 0;
}

.price{
  font-weight: 500;
  font-size: 1.3rem !important;
}

.car-name {
  font-size: 1rem;        /* smaller than default h2 */
  font-weight: 600;       /* still a bit bold */
  line-height: 1.3;
  margin-bottom: 0.15rem; /* tighter spacing */
}
@media (max-width: 768px) {
  .car-name {
    font-size: 0.9rem;
  }
}



/* Smaller LKR label next to the number */
.price-left .currency,
.detail-item .currency {
  font-size: 0.5em;
  margin-left: 0.25rem;
  opacity: 0.8; /* optional: slightly lighter */
}


.price-left .price-note {
  display: block;
  font-size: 0.85rem;
  color: #777;
}




.price-left .label { font-size: 0.9em; color: #555; }


/* availability classes */
.availability-available { color: green; }
.availability-arriving  { color: orange; }
.availability-sold      { color: red; }

/* features grid */
.features-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.75rem 1.5rem;
  margin-top: 10px;  
}

.feature-item { 
  display: flex; 
  align-items: center; 
  gap: 0.5rem; 
}

.feature-item.feature-left {
  justify-content: flex-start;
}

.feature-item.feature-right {
  justify-content: flex-start;
  margin-left: 30px;
}

.ficon { 
  width: 18px; 
  height: 18px; 
}

/* responsive columns (optional if you rely on Bootstrap row-cols) */
@media (max-width: 768px) { .row-cols-md-2 .col { max-width: 50%; } }
@media (max-width: 480px) { .row-cols-1 .col { max-width: 100%; } }


.cards-grid {
  display: grid;
  width: 100%; 
  gap: 1rem;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  justify-content: center;
}

@media (max-width: 599px) {
  .cards-grid {
    
    grid-template-columns: 1fr;
  }

 
  .card-wrapper,
  .card {
    max-width: none;        
    width: 100%;            
  }
}

/* 1. Make the list display inline‑flex and center it */
.pagination {
  display: inline-flex;
  justify-content: center;
  list-style: none;
  padding-left: 0;
  margin: 1rem 0;
}

/* 2. Space out each item */
.pagination .page-item {
  margin: 0 0.25rem;
}

/* 3. Base page links: white background, light border, blue text */
.pagination .page-link {
  display: block;
  padding: 0.5rem 0.75rem;
  background-color: #fff;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  color: #042b54;
  text-decoration: none;
  transition: background-color 0.2s;
}

/* 4. Hover state for non‑active links */
.pagination .page-item:not(.active) .page-link:hover {
  background-color: #f1f5fb;
}

/* 5. Active page: solid blue background, white text */
.pagination .page-item.active .page-link {
  z-index: 1;
  background-color: #073567;
  border-color: #007bff;
  color: #fff;
  cursor: default;
}

/* 6. Disabled arrows/pages: greyed‑out and non‑clickable */
.pagination .page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  background-color: #fff;
  border-color: #dee2e6;
  opacity: 0.6;
}

.cards-grid {
  display: grid;
  gap: 1rem;
  /* 4 across on large screens */
  grid-template-columns: repeat(4, minmax(0, 1fr));
}

/* 3 across on ~XL and below */
@media (max-width: 1400px) {
  .cards-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
}

/* 2 across on tablets */
@media (max-width: 992px) {
  .cards-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}

/* 1 across on phones */
@media (max-width: 600px) {
  .cards-grid { grid-template-columns: 1fr; }
}


</style>