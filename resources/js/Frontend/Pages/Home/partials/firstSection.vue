<template>
  <div class="lease-section container px-3" v-if="manufactures.length > 0">
    <!-- Tabs Header -->
    <div class="tabs-container text-center pt-3 pb-5">
       <h1 class="secondFontStyle" style="font-weight: 600;">
        VEHICLE STOCK
      </h1>
      <div class="tabs">
        <button v-for="manufactures in manufactures.slice(0, 6)" :key="manufactures.id" class="tab-btn"
          :class="{ active: activeTab === manufactures.title }" @click="setActiveTab(manufactures.title)">{{
            manufactures.title }}</button>
      </div>
    </div>


    <transition name="tab-transition" mode="out-in">

  <!-- —— when there *are* cars —— -->
  <div
    v-if="filteredVehicles.length > 0"
    class="tab-contentn"
     :key="activeTab + '-cars'"
  >
    <div class="car-grid">
      <div
        class="car-card"
        v-for="(car, index) in filteredVehicles.slice(0, 8)"
        :key="index"
      >
        <Link
          class="card border shadow-sm d-flex flex-column h-100"
          type="button"
          :href="route('product', {
            model: $root.stringToSlug(car.manufacture.title),
            slug:
              $root.stringToSlug(car.manufacture.title) +
              '-' +
              $root.stringToSlug(car.vehicle_model.title),
            id: car.id
          })"
        >
          <div class="image-container">
            <img
              :src="getMainImage(car)"
              alt="Car Image"
              class="car-image"
            />
            <div class="image-counter">
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
              >
                <rect x="2" y="2" width="16" height="16" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <path d="M20.4 14.5L16 10 4 20" />
              </svg>
              {{ car.media.filter(img => img.custom_properties?.type === 'vehicle_gallery').length }}
            </div>
          </div>

          <div class="card-content">
            <div class="price-section">
              <div class="price-left">
                <span class="label">Price</span>
                <span class="price">${{ car.price || "0" }}</span>
                <span class="price-note">{{ car.priceNote || "Price includes VAT" }}</span>
              </div>
              <div class="price-right">
                <div class="detail-item">
                  <template v-if="car.used_status === 'Used'">
                    {{ car.engine_capacity }} Initial Payment
                  </template>
                  <template v-else>
                    {{ car.engine_capacity }} Engine
                  </template>
                </div>
                <div class="detail-item">
                  {{ car.year || "24 Month Contract" }} Reg Year
                </div>
                <div class="detail-item">
                  <template v-if="car.used_status === 'Used'">
                    {{ car.mileage }} Miles P/A
                  </template>
                  <template v-else>
                    <span style="color: green;">BRAND NEW</span>
                  </template>
                </div>
                <div class="detail-item" v-if="car.monthly_price">
                  {{ '$' + car.monthly_price }} Per Month
                </div>
              </div>
            </div>

            <div class="car-details">
              <h2 v-if="car.manufacture && car.vehicle_model" class="car-name">
                {{ getManufacturerModel(car) }}
              </h2>
              <h2 v-else class="car-name"></h2>
              <p class="car-model" :class="availabilityColor(car.availability)">
                {{ car.availability }}
              </p>
            </div>

            <div class="features-grid">
              <div class="feature-item feature-left">
                <img class="ficon" src="/images/Assets/seat.svg" alt="Seat icon" />
                <span>{{ car.seats }} Seats</span>
              </div>
              <div class="feature-item feature-right">
                <img class="ficon" src="/images/Assets/doors.svg" alt="Door icon" />
                <span>{{ car.doors }} Doors</span>
              </div>
              <div class="feature-item feature-left">
                <img class="ficon" src="/images/Assets/passenger.svg" alt="Passengers icon" />
                <span>{{ car.passengers }} persons</span>
              </div>
              <div class="feature-item feature-right">
                <img class="ficon" src="/images/Assets/flash.svg" alt="Fuel icon" />
                <span>{{ car.fuel_type }}</span>
              </div>
              <div class="feature-item feature-left">
                <img class="ficon" src="/images/Assets/automatc.svg" alt="Transmission icon" />
                <span>{{ car.transmission }}</span>
              </div>
              <div class="feature-item feature-right">
                <img class="ficon" src="/images/Assets/miles.svg" alt="Range icon" />
                <span>{{ car.range }} Miles</span>
              </div>
            </div>
          </div>
        </Link>
      </div>
    </div>
  </div>

  <!-- —— when *no* cars —— -->
  <div
    v-else
    class="tab-contentn placeholder-content"
    :key="activeTab + '-none'"
  >
    <img
      src="/images/Assets/NotAv.png"
      alt="No available cars"
      class="placeholder-image"
    />
    <p class="no-cars-message">
      No available cars from this brand.
    </p>
  </div>

</transition>


    <!-- Template snippet -->
    <div
  v-if="filteredVehicles.length > 0"
  class="see-more-container"
>
  <a href="/available-cars" class="see-more-link">View More Details</a>
</div>

  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {

    Link
  },
  name: "LeaseCar",

  props: {

    countries: {
      type: Array,
      default: () => []
    },

    vehicles: {
      type: Array,
      default: () => []
    },
    models: {
      type: Array,
      default: () => []
    },
    manufactures: { type: Array, default: () => [] },



  },
  data() {
    return {
      activeTab: "",
      componentId: "firstSection_" + Date.now() // Unique identifier for this component instance
    };
  },
  computed: {
    activemanufactures() {
      const found = this.manufactures.find(c => c.title === this.activeTab);
      return found;
    },

    filteredVehicles() {
      if (!this.activemanufactures) {
        console.log("FirstSection - No active manufacturer selected");
        return [];
      }

      const filtered = this.vehicles.filter(vehicle => {
        // Check both manufacture_id and manufacture object
        const matchesId = vehicle.manufacture_id === this.activemanufactures.id;
        const matchesObject = vehicle.manufacture && vehicle.manufacture.id === this.activemanufactures.id;
        const matchesTitle = vehicle.manufacture && vehicle.manufacture.title === this.activemanufactures.title;

        return matchesId || matchesObject || matchesTitle;
      });

      console.log(`FirstSection - Filtered ${filtered.length} vehicles for ${this.activemanufactures.title}`);
      return filtered;
    }
  },
  mounted() {
    console.log("FirstSection - Vehicles Data:", this.vehicles);
    console.log("FirstSection - Manufactures Data:", this.manufactures);
    console.log("FirstSection - Models Data:", this.models);

    if (this.manufactures.length > 0) {
      this.activeTab = this.manufactures[0].title;
    }

    // Add a small delay to ensure other components have finished loading
    this.$nextTick(() => {
      console.log("FirstSection - Active Tab:", this.activeTab);
      console.log("FirstSection - Filtered Vehicles:", this.filteredVehicles);
    });
  }
  ,
  methods: {
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
    getManufacturerModel(car) {
      // First check if car has the manufacture and vehicle_model objects directly
      if (car && car.manufacture && car.vehicle_model) {
        return `${car.manufacture.title || car.manufacture.name || ""} ${car.vehicle_model.title || car.vehicle_model.name || ""}`.trim();
      }

      // Fallback to ID-based lookup if direct objects aren't available
      if (!car || !car.manufacture_id || !car.vehicle_model_id) {
        console.warn("Invalid car data or missing IDs:", car);
        return "";
      }

      const manu = this.manufactures.find(m => m.id === car.manufacture_id) || {};
      const model = this.models.find(m => m.id === car.vehicle_model_id) || {};

      return `${manu.name || manu.title || ""} ${model.title || model.name || ""}`.trim();
    },


    setActiveTab(title) {
      console.log("Setting activeTab to:", title);
      this.activeTab = title;
    },
     getMainImage(car) {
    // first try to find the one tagged “vehicle_main”
    const main = car.media.find(
      m => m.custom_properties?.type === 'vehicle_main'
    );
    // if that fails, fall back to the very first media item
    const fallback = car.media[0];
    // return the URL or a placeholder if nothing’s there
    return main?.original_url || fallback?.original_url || '/images/placeholder.png';
  },
  }
};
</script>

<style scoped>
.availability-available {
  color: green;
}

.availability-arriving {
  color: orange;
}

.availability-sold {
  color: red;
}

/* Container for tabs */
.tabs-container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.tabs {
  display: flex;
  justify-content: center;
  flex-wrap: nowrap;
  gap: 0.5rem;
}

/* Transition fade in/out */
.tab-transition-enter-active,
.tab-transition-leave-active {
  transition: opacity 0.3s;
}

.tab-transition-enter,
.tab-transition-leave-to {
  opacity: 0;
}

.car-grid {
  display: grid;
  width: 100%;                          /* fill parent */
  gap: 1rem;                            /* match your other spacing */
  /* auto-fit as many ≥280px columns as will fit, each expanding equally */
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  justify-content: center;             /* center the whole grid if it’s narrower */
}

/* On tablets (<= 768px), show two columns */
/* @media (max-width: 768px) {
  .car-grid {
    grid-template-columns: repeat(2, 1fr);
  }
} */

/* On phones (<= 480px), show one column */
/* @media (max-width: 480px) {
  .car-grid {
    grid-template-columns: 1fr;
  }
} */

.car-card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  background: #fff;
}

.image-container {
  position: relative;
}

.car-image {
  width: 100%;
  display: block;
}

.image-counter {
  position: absolute;
  bottom: 10px;
  right: 10px;
  background: rgba(255, 255, 255, 0.8);
  padding: 5px;
  border-radius: 4px;
  display: flex;
  align-items: center;
}

.card-content {
  padding: 20px;
}

.price-section {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.price-left .label {
  font-size: 0.9em;
  color: #555;
}

.price{
  font-weight: 500;
}

.price-left .price-note {
  display: block;
  font-size: 0.85rem;
  color: #777;
}



.car-details {
  margin-bottom: 10px;
}

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

.see-more-container {
  display: flex;
  margin: 40px 0;

   justify-content: flex-end;
}

.see-more-link {
  display: inline-block;
  padding: 10px 20px;
  background-color: #f0f0f0;
  color: #000;
  text-decoration: none;
  font-family: Arial, sans-serif;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  border: 1px solid #ccc;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.see-more-link:hover {
  background-color: #e0e0e0;
  cursor: pointer;
}

.see-more-link:focus {
  outline: 2px solid #000;
  outline-offset: 2px;
}




@media (max-width: 605px) {
  .car-grid {
    grid-template-columns: 1fr;  /* one column that spans 100% */
  }
  /* drop any 280px cap so the card stretches edge-to-edge: */
  .car-card {
    max-width: none;
  }
}

/* bring the tabs above any overlapping element and make sure they receive clicks */
.tabs-container,
.tabs,
.tab-btn {
  position: relative;
  z-index: 10;           /* anything above the default “0” will do */
  pointer-events: auto;  /* override any parent that might’ve disabled them */
}




@media (max-width: 1167px) {
  .tabs-container {
    flex-direction: column;
    align-items: center;
  }
  .tabs {
    margin-top: 1rem;
  }
}

/* ↓ when the viewport is ≤940px ↓ */
/* wrap into two rows of three buttons */
@media (max-width: 940px) {
  .tabs {
    flex-wrap: wrap;
    max-width: 600px;            /* optional: cap container width */
    margin: 0 auto;              /* center it */
  }
  .tab-btn {
    flex: 0 0 calc(33.333% - 0.666rem);
    max-width: calc(33.333% - 0.666rem);
    margin: 0.333rem 0;          /* vertical gutter between rows */
    text-align: center;
  }
}


/* Only at very small screens ≤400px: force 2×3 layout & shrink text */
@media (max-width: 400px) {
  .tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    max-width: 100%;
    margin: 0 auto;
  }

  .tab-btn {
    flex: 0 0 calc(33.333% - 0.333rem);
    max-width: calc(33.333% - 0.333rem);
    text-align: center;
    white-space: nowrap;

    /* shrink the text so it never overflows */
    font-size: clamp(0.6rem, 3vw, 0.8rem);
    padding: 0.3rem 0.5rem;
  }
}







.placeholder-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

}


.placeholder-image {
   width: clamp(200px, 20vw, 150px);

  height: auto;
  margin-bottom: 1rem;

}


.no-cars-message {
  font-size: 1.1rem;
  color: #555;
}


</style>
