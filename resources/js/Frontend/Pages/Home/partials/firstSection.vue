<template>
  <div class="vehicle-stock-section" v-if="manufactures.length > 0">
    <!-- Section Header -->
    <div class="section-header">
      <div class="header-badge">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M12 2L2 7l10 5 10-5-10-5z"/>
          <path d="M2 17l10 5 10-5"/>
          <path d="M2 12l10 5 10-5"/>
        </svg>
        <span>Premium Collection</span>
      </div>
      <h1 class="section-title">Vehicle Stock</h1>
      <p class="section-subtitle">Explore our curated selection of premium vehicles from top manufacturers</p>
    </div>

    <!-- Brand Tabs -->
    <div class="tabs-wrapper">
      <div class="tabs-container">
        <button
          v-for="manufacturer in manufactures.slice(0, 6)"
          :key="manufacturer.id"
          class="tab-button"
          :class="{ active: activeTab === manufacturer.title }"
          @click="setActiveTab(manufacturer.title)"
        >
          <span class="tab-text">{{ manufacturer.title }}</span>
          <span class="tab-indicator"></span>
        </button>
      </div>
    </div>

    <!-- Vehicle Grid with Transition -->
    <transition name="fade-slide" mode="out-in">
      <!-- When vehicles are available -->
      <div
        v-if="filteredVehicles.length > 0"
        class="vehicles-grid"
        :key="activeTab + '-cars'"
      >
        <div
          class="vehicle-card"
          v-for="(car, index) in filteredVehicles.slice(0, 8)"
          :key="car.id"
          :style="{ animationDelay: `${index * 0.1}s` }"
        >
          <Link
            class="card-link"
            :href="route('product', {
              model: $root.stringToSlug(car.manufacture.title),
              slug: $root.stringToSlug(car.manufacture.title) + '-' + $root.stringToSlug(car.vehicle_model.title),
              id: car.id
            })"
          >
            <!-- Image Section -->
            <div class="card-image-wrapper">
              <img
                :src="getMainImage(car)"
                :alt="getManufacturerModel(car)"
                class="card-image"
              />
              <div class="image-overlay">
                <div class="overlay-badge">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <path d="M21 15l-5-5L5 21"/>
                  </svg>
                  <span>{{ car.media.filter(img => img.custom_properties?.type === 'vehicle_gallery').length }}</span>
                </div>
              </div>

              <!-- Status Badge -->
              <div class="status-badge" :class="getStatusClass(car.availability)">
                <span class="status-dot"></span>
                {{ car.availability }}
              </div>
            </div>

            <!-- Card Content -->
            <div class="card-content">
              <!-- Vehicle Title -->
              <h3 class="vehicle-title">{{ getManufacturerModel(car) }}</h3>

              <!-- Price Section -->
              <div class="price-container">
                <div class="price-main">
                  <span class="price-label">Starting at</span>
                  <span class="price-value">${{ formatPrice(car.price) }}</span>
                </div>
                <div class="price-note">{{ car.priceNote || "Price includes VAT" }}</div>
              </div>

              <!-- Quick Details -->
              <div class="quick-details">
                <div class="detail-chip">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                  </svg>
                  <span>{{ car.year }} Year</span>
                </div>
                <div class="detail-chip">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 2v20M2 12h20"/>
                  </svg>
                  <span>{{ car.engine_capacity }}</span>
                </div>
                <div class="detail-chip" v-if="car.used_status !== 'Used'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                  </svg>
                  <span class="new-badge">Brand New</span>
                </div>
                <div class="detail-chip" v-else>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                  </svg>
                  <span>{{ car.mileage }} Miles</span>
                </div>
              </div>

              <!-- Features Grid -->
              <div class="features-grid">
                <div class="feature-item">
                  <div class="feature-icon">
                    <img src="/images/Assets/seat.svg" alt="Seats" />
                  </div>
                  <span>{{ car.seats }} Seats</span>
                </div>
                <div class="feature-item">
                  <div class="feature-icon">
                    <img src="/images/Assets/doors.svg" alt="Doors" />
                  </div>
                  <span>{{ car.doors }} Doors</span>
                </div>
                <div class="feature-item">
                  <div class="feature-icon">
                    <img src="/images/Assets/passenger.svg" alt="Passengers" />
                  </div>
                  <span>{{ car.passengers }} Persons</span>
                </div>
                <div class="feature-item">
                  <div class="feature-icon">
                    <img src="/images/Assets/flash.svg" alt="Fuel" />
                  </div>
                  <span>{{ car.fuel_type }}</span>
                </div>
                <div class="feature-item">
                  <div class="feature-icon">
                    <img src="/images/Assets/automatc.svg" alt="Transmission" />
                  </div>
                  <span>{{ car.transmission }}</span>
                </div>
                <div class="feature-item">
                  <div class="feature-icon">
                    <img src="/images/Assets/miles.svg" alt="Range" />
                  </div>
                  <span>{{ car.range }} Mi</span>
                </div>
              </div>

              <!-- Monthly Price -->
              <div class="monthly-price" v-if="car.monthly_price">
                <span class="monthly-label">From</span>
                <span class="monthly-value">${{ car.monthly_price }}/mo</span>
              </div>

              <!-- View Details Button -->
              <div class="card-action">
                <span class="action-text">View Details</span>
                <svg class="action-arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="5" y1="12" x2="19" y2="12"/>
                  <polyline points="12 5 19 12 12 19"/>
                </svg>
              </div>
            </div>
          </Link>
        </div>
      </div>

      <!-- When no vehicles are available -->
      <div
        v-else
        class="empty-state"
        :key="activeTab + '-empty'"
      >
        <div class="empty-content">
          <img
            src="/images/Assets/NotAv.png"
            alt="No vehicles available"
            class="empty-image"
          />
          <h3 class="empty-title">No Vehicles Available</h3>
          <p class="empty-text">We currently don't have any vehicles from this manufacturer. Check back soon!</p>
        </div>
      </div>
    </transition>

    <!-- View More Button -->
    <div v-if="filteredVehicles.length > 0" class="view-more-section">
      <a href="/available-cars" class="view-more-button">
        <span>Explore All Vehicles</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="5" y1="12" x2="19" y2="12"/>
          <polyline points="12 5 19 12 12 19"/>
        </svg>
      </a>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link
  },
  name: "VehicleStockSection",
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
    manufactures: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      activeTab: ""
    };
  },
  computed: {
    activemanufactures() {
      return this.manufactures.find(c => c.title === this.activeTab);
    },
    filteredVehicles() {
      if (!this.activemanufactures) {
        return [];
      }

      return this.vehicles.filter(vehicle => {
        const matchesId = vehicle.manufacture_id === this.activemanufactures.id;
        const matchesObject = vehicle.manufacture && vehicle.manufacture.id === this.activemanufactures.id;
        const matchesTitle = vehicle.manufacture && vehicle.manufacture.title === this.activemanufactures.title;
        return matchesId || matchesObject || matchesTitle;
      });
    }
  },
  mounted() {
    if (this.manufactures.length > 0) {
      this.activeTab = this.manufactures[0].title;
    }
  },
  methods: {
    formatPrice(price) {
      if (!price) return "0";
      return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    getStatusClass(status) {
      const statusMap = {
        'Available': 'status-available',
        'Arriving': 'status-arriving',
        'Sold': 'status-sold'
      };
      return statusMap[status] || '';
    },
    getManufacturerModel(car) {
      if (car && car.manufacture && car.vehicle_model) {
        return `${car.manufacture.title || car.manufacture.name || ""} ${car.vehicle_model.title || car.vehicle_model.name || ""}`.trim();
      }

      if (!car || !car.manufacture_id || !car.vehicle_model_id) {
        return "";
      }

      const manu = this.manufactures.find(m => m.id === car.manufacture_id) || {};
      const model = this.models.find(m => m.id === car.vehicle_model_id) || {};
      return `${manu.name || manu.title || ""} ${model.title || model.name || ""}`.trim();
    },
    setActiveTab(title) {
      this.activeTab = title;
    },
    getMainImage(car) {
      const main = car.media.find(m => m.custom_properties?.type === 'vehicle_main');
      const fallback = car.media[0];
      return main?.original_url || fallback?.original_url || '/images/placeholder.png';
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

* {
  box-sizing: border-box;
}

.vehicle-stock-section {
  background: #ffffff;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* ===== SECTION HEADER ===== */
.section-header {
  text-align: center;
  margin-bottom: 60px;
  animation: fadeInUp 0.8s ease-out;
}

.header-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 8px 20px;
  border-radius: 50px;
  font-size: 13px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 20px;
}

.section-title {
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 800;
  color: #1a202c;
  margin: 0 0 16px 0;
  letter-spacing: -0.02em;
}

.section-subtitle {
  font-size: clamp(1rem, 2vw, 1.25rem);
  color: #718096;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ===== TABS ===== */
.tabs-wrapper {
  margin-bottom: 50px;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  scrollbar-width: none;
}

.tabs-wrapper::-webkit-scrollbar {
  display: none;
}

.tabs-container {
  display: flex;
  justify-content: center;
  gap: 12px;
  flex-wrap: wrap;
  padding: 4px;
  min-width: min-content;
}

.tab-button {
  position: relative;
  background: #f7fafc;
  border: 2px solid #e2e8f0;
  color: #4a5568;
  padding: 14px 28px;
  border-radius: 12px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  overflow: hidden;
}

.tab-button:hover {
  background: #edf2f7;
  border-color: #cbd5e0;
  transform: translateY(-2px);
}

.tab-button.active {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-color: #667eea;
  color: white;
  box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.tab-text {
  position: relative;
  z-index: 2;
}

.tab-indicator {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(90deg, #667eea, #764ba2);
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.tab-button.active .tab-indicator {
  transform: scaleX(1);
}

/* ===== TRANSITIONS ===== */
.fade-slide-enter-active {
  animation: fadeSlideIn 0.5s ease-out;
}

.fade-slide-leave-active {
  animation: fadeSlideOut 0.3s ease-in;
}

@keyframes fadeSlideIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeSlideOut {
  from {
    opacity: 1;
    transform: translateY(0);
  }
  to {
    opacity: 0;
    transform: translateY(-20px);
  }
}

/* ===== VEHICLE GRID ===== */
.vehicles-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 30px;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 20px;
}

.vehicle-card {
  animation: cardSlideIn 0.6s ease-out backwards;
}

@keyframes cardSlideIn {
  from {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

.card-link {
  display: block;
  background: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  text-decoration: none;
  color: inherit;
  height: 100%;
}

.card-link:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

/* ===== IMAGE SECTION ===== */
.card-image-wrapper {
  position: relative;
  width: 100%;
  padding-top: 66.67%;
  overflow: hidden;
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.card-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.card-link:hover .card-image {
  transform: scale(1.08);
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.3) 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.card-link:hover .image-overlay {
  opacity: 1;
}

.overlay-badge {
  position: absolute;
  bottom: 16px;
  right: 16px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  padding: 8px 14px;
  border-radius: 50px;
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  font-weight: 600;
  color: #2d3748;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* ===== STATUS BADGE ===== */
.status-badge {
  position: absolute;
  top: 16px;
  left: 16px;
  display: flex;
  align-items: center;
  gap: 6px;
  padding: 8px 16px;
  border-radius: 50px;
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.5; }
}

.status-available {
  background: rgba(72, 187, 120, 0.95);
  color: white;
}

.status-available .status-dot {
  background: white;
}

.status-arriving {
  background: rgba(237, 137, 54, 0.95);
  color: white;
}

.status-arriving .status-dot {
  background: white;
}

.status-sold {
  background: rgba(245, 101, 101, 0.95);
  color: white;
}

.status-sold .status-dot {
  background: white;
}

/* ===== CARD CONTENT ===== */
.card-content {
  padding: 24px;
}

.vehicle-title {
  font-size: 20px;
  font-weight: 700;
  color: #1a202c;
  margin: 0 0 16px 0;
  line-height: 1.3;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* ===== PRICE SECTION ===== */
.price-container {
  background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
  padding: 16px;
  border-radius: 12px;
  margin-bottom: 16px;
}

.price-main {
  display: flex;
  flex-direction: column;
  gap: 4px;
  margin-bottom: 6px;
}

.price-label {
  font-size: 12px;
  font-weight: 600;
  color: #718096;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.price-value {
  font-size: 28px;
  font-weight: 800;
  color: #667eea;
  letter-spacing: -0.02em;
}

.price-note {
  font-size: 12px;
  color: #a0aec0;
  font-weight: 500;
}

/* ===== QUICK DETAILS ===== */
.quick-details {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 16px;
}

.detail-chip {
  display: flex;
  align-items: center;
  gap: 6px;
  background: white;
  border: 1.5px solid #e2e8f0;
  padding: 6px 12px;
  border-radius: 50px;
  font-size: 12px;
  font-weight: 600;
  color: #4a5568;
}

.detail-chip svg {
  flex-shrink: 0;
  color: #667eea;
}

.new-badge {
  color: #48bb78;
}

/* ===== FEATURES GRID ===== */
.features-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px;
  padding: 16px 0;
  border-top: 1px solid #e2e8f0;
  border-bottom: 1px solid #e2e8f0;
  margin-bottom: 16px;
}

.feature-item {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 13px;
  font-weight: 500;
  color: #4a5568;
}

.feature-icon {
  width: 32px;
  height: 32px;
  background: #f7fafc;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.feature-icon img {
  width: 18px;
  height: 18px;
  object-fit: contain;
}

/* ===== MONTHLY PRICE ===== */
.monthly-price {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 12px 16px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 16px;
}

.monthly-label {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  opacity: 0.9;
}

.monthly-value {
  font-size: 18px;
  font-weight: 700;
}

/* ===== CARD ACTION ===== */
.card-action {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 18px;
  background: #f7fafc;
  border-radius: 10px;
  font-weight: 600;
  color: #667eea;
  transition: all 0.3s ease;
}

.card-link:hover .card-action {
  background: #667eea;
  color: white;
  transform: translateX(4px);
}

.action-arrow {
  transition: transform 0.3s ease;
}

.card-link:hover .action-arrow {
  transform: translateX(4px);
}

/* ===== EMPTY STATE ===== */
.empty-state {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 80px 20px;
  min-height: 400px;
}

.empty-content {
  text-align: center;
  max-width: 400px;
}

.empty-image {
  width: 200px;
  height: auto;
  margin-bottom: 24px;
  opacity: 0.8;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

.empty-title {
  font-size: 24px;
  font-weight: 700;
  color: #2d3748;
  margin: 0 0 12px 0;
}

.empty-text {
  font-size: 16px;
  color: #718096;
  line-height: 1.6;
  margin: 0;
}

/* ===== VIEW MORE SECTION ===== */
.view-more-section {
  text-align: center;
  margin-top: 60px;
  padding-top: 40px;
  border-top: 2px solid #e2e8f0;
}

.view-more-button {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 16px 32px;
  border-radius: 50px;
  font-size: 16px;
  font-weight: 700;
  text-decoration: none;
  box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
  transition: all 0.3s ease;
}

.view-more-button:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
}

.view-more-button svg {
  transition: transform 0.3s ease;
}

.view-more-button:hover svg {
  transform: translateX(4px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
  .vehicle-stock-section {
    padding: 60px 20px;
  }

  .vehicles-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
  }
}

@media (max-width: 768px) {
  .vehicle-stock-section {
    padding: 50px 16px;
  }

  .section-header {
    margin-bottom: 40px;
  }

  .section-title {
    font-size: 2.5rem;
  }

  .tabs-container {
    flex-wrap: wrap;
    justify-content: center;
  }

  .tab-button {
    padding: 12px 20px;
    font-size: 14px;
  }

  .vehicles-grid {
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 20px;
    padding: 0 8px;
  }

  .price-value {
    font-size: 24px;
  }

  .features-grid {
    gap: 10px;
  }
}

@media (max-width: 480px) {
  .vehicle-stock-section {
    padding: 40px
    }
}
</style>
