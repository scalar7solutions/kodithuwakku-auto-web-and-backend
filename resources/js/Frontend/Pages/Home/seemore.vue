<template>
    <AppLayout>

  <div class="lease-section">
    <!-- Tabs Header -->
    <div class="tabs-container">
      <h3>LEASE A NEW CAR</h3>
      <div class="tabs">
        <!-- Render a button for each manufactures -->
        <button v-for="manufactures in manufactures" :key="manufactures.id" class="tab-btn"
          :class="{ active: activeTab === manufactures.title }" @click="setActiveTab(manufactures.title)">
          {{ manufactures.title }}
        </button>
      </div>
    </div>

    <transition name="tab-transition" mode="out-in">
      <div v-if="manufactures" class="tab-contentn" :key="activeTab">
        <div class="car-grid">
          <div class="car-card" v-for="(car, index) in filteredVehicles" :key="index">
            <div class="image-container">
              <img             :src="car.media.find(item => item.custom_properties?.type === 'vehicle_main')?.original_url"

                alt="Car Image" class="car-image" />
              <div class="image-counter">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="2" y="2" width="16" height="16" rx="2" />
                  <circle cx="8.5" cy="8.5" r="1.5" />
                  <path d="M20.4 14.5L16 10 4 20" />
                </svg>
                <span>{{ car.image_count || 0 }}</span>
              </div>
            </div>

            <!-- CARD CONTENT -->
            <div class="card-content">
              <div class="price-section">
                <div class="price-left">
                  <span class="label">price</span>
                  <span class="price">${{ car.price || "0" }}</span>
                  <span class="price-note">{{
                    car.priceNote || "Price includes VAT"
                  }}</span>
                </div>
                <div class="price-right">
                  <div class="detail-item">
                    {{ car.engine_capacity }} Engine
                  </div>
                  <div class="detail-item">
                    {{
                      car.year || "24 Month Contract"
                    }}
                    Reg Year
                  </div>
                  <div class="detail-item">

                    <template v-if="car.used_status === 'Used'">
                      {{ car.mileage }} Miles P/A
                    </template>
                    <template v-else>
                      <span style="color: green;">BRAND NEW</span>
                    </template>
                  </div>


                </div>
              </div>

              <!-- CAR DETAILS -->
              <div class="car-details">
                <h2 class="car-name">{{ getManufacturerModel(car) }}</h2>

                <p class="car-model" :class="availabilityColor(car.availability)">
                  {{ car.availability }}
                </p>

              </div>

              <!-- FEATURES GRID -->
              <div class="features-grid">
                <div class="feature-item">
                  <img class="ficon" src="/images/Assets/seat.svg" alt="Seat icon" />
                  <span>{{ car.seats }} Seats</span>
                </div>
                <div class="feature-item">
                  <img class="ficon" src="/images/Assets/doors.svg" alt="Door icon" />
                  <span>{{ car.doors }} Doors</span>
                </div>
                <div class="feature-item">
                  <img class="ficon" src="/images/Assets/passenger.svg" alt="Hatchback icon" />
                  <span>{{ car.passengers
                    }} persons </span>
                </div>
                <div class="feature-item">
                  <img class="ficon" src="/images/Assets/flash.svg" alt="Electric icon" />
                  <span>{{ car.fuel_type }}</span>
                </div>
                <div class="feature-item">
                  <img class="ficon" src="/images/Assets/automatc.svg" alt="Automatic icon" />
                  <span>{{ car.transmission }}</span>
                </div>
                <div class="feature-item">
                  <img class="ficon" src="/images/Assets/miles.svg" alt="Miles icon" />
                  <span>{{ car.range }} Miles</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- If activeTab doesn't match any manufactures -->
      <div v-else:key="activeTab">
        <p>No cars found for this manufactures.</p>
      </div>
      
    </transition>

    <br><br>
  </div>
</AppLayout>

</template>

  <script>
  import AppLayout from '@@/Layouts/AppLayout.vue';

  export default {
    components: {
      AppLayout,
    },
    name: "LeaseCar",
  props: {
    countries: {
      type: Array,
      default: () => [],
    },

    vehicles: {
      type: Array,
      default: () => [],
    },
    models: {
      type: Array,
      default: () => []
    },
    manufactures: { type: Array, default: () => [] }
  },
  data() {
    return {
      activeTab: "",
    };
  },
  computed: {
    activemanufactures() {

      const found = this.manufactures.find((c) => c.title === this.activeTab);
      return found;
    },

    filteredVehicles() {
  if (!this.activemanufactures) {
    return [];
  }
  return this.vehicles.filter((vehicle) => {
    return vehicle.manufacture_id === this.activemanufactures.id;
  });
}


  },
  mounted() {
    console.log("activemanufactures :", this.manufactures);
    console.log("Vehicles :", this.vehicles);
    console.log("models :", this.models);

    if (this.manufactures.length > 0) {
      this.activeTab = this.manufactures[0].title;
    } else {

    }
  },
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
      const manu = this.manufactures.find(m => m.id === car.manufacture_id);

      const model = this.models.find(m => m.id === car.vehicle_model_id);
      const combined = `${manu.name || manu.title} ${model.title}`;
      return combined;
    }

    ,
    setActiveTab(title) {
      console.log("Setting activeTab to:", title);
      this.activeTab = title;
    },
  },
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
    text-align: center;
    margin-bottom: 20px;
  }
  
  .tabs {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
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
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
  }
  
  /* On tablets (<= 768px), show two columns */
  @media (max-width: 768px) {
    .car-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  
  /* On phones (<= 480px), show one column */
  @media (max-width: 480px) {
    .car-grid {
      grid-template-columns: 1fr;
    }
  }
  
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
    padding: 15px;
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
  
  .car-details {
    margin-bottom: 10px;
  }
  
  .features-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    row-gap: 0.75rem;
    column-gap: 1.5rem;
    margin-top: 10px;
  }
  
  .feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .ficon {
    width: 18px;
    height: 18px;
  }
 
  
  </style>
  