<template>
  <section class="buying-essentials-section">
    <div class="lease-section container px-3">
      <div class="tabs-container text-center pb-5">
        <!-- <h1 class="secondFontStyle vehicle-title">ARRIVINGS</h1> -->
      </div>

      <!-- When cars exist -->
      <div v-if="arrivingVehicles.length > 0" class="tab-contentn">
        <div class="car-grid">
          <div class="car-card" v-for="(car, index) in visibleVehicles" :key="car?.id ?? index">
            <Link
              class="card border shadow-sm d-flex flex-column h-100"
              type="button"
              :href="
                route('product', {
                  model: $root.stringToSlug(car.manufacture.title),
                  slug:
                    $root.stringToSlug(car.manufacture.title) +
                    '-' +
                    $root.stringToSlug(car.vehicle_model.title),
                  id: car.id,
                })
              "
            >
              <div class="image-container">
                <img :src="getMainImage(car)" alt="Car Image" class="car-image" />
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
                  {{
                    (car.media || []).filter((img) => img.custom_properties?.type === "vehicle_gallery")
                      .length
                  }}
                </div>
              </div>

              <div class="card-content">
                <div class="price-section">
                  <!-- price section intentionally kept commented as in your original -->
                </div>

                <div class="car-details">
                  <h2 v-if="car.manufacture && car.vehicle_model" class="car-name">
                    {{ getManufacturerModel(car) }}
                  </h2>
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

        <!-- Pagination (Inertia paginator if available, otherwise client-side) -->
        <div v-if="paginationMode === 'inertia' && (paginationLinks || []).length" class="mt-4 flex justify-center">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li
                v-for="link in paginationLinks"
                :key="link.label"
                :class="['page-item', { active: link.active, disabled: !link.url }]"
              >
                <Link class="page-link" :href="link.url" v-html="link.label"></Link>
              </li>
            </ul>
          </nav>
        </div>

        <div v-else-if="paginationMode === 'client' && pageCount > 1" class="mt-4 flex justify-center">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item" :class="{ disabled: currentPage <= 1 }">
                <button class="page-link" type="button" @click="goToPage(currentPage - 1)" :disabled="currentPage <= 1">
                  &laquo;
                </button>
              </li>

              <li
                v-for="p in pagesToShow"
                :key="p"
                class="page-item"
                :class="{ active: p === currentPage }"
              >
                <button class="page-link" type="button" @click="goToPage(p)">{{ p }}</button>
              </li>

              <li class="page-item" :class="{ disabled: currentPage >= pageCount }">
                <button class="page-link" type="button" @click="goToPage(currentPage + 1)" :disabled="currentPage >= pageCount">
                  &raquo;
                </button>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <!-- When no cars -->
      <div v-else class="tab-contentn placeholder-content">
        <img src="/images/Assets/NotAv.png" alt="No available cars" class="placeholder-image" />
        <p class="no-cars-message">No arriving vehicles at the moment.</p>
      </div>
    </div>
  </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  name: "ArrivingsList",
  components: { Link },
  props: {
    /**
     * Supports BOTH:
     * 1) Array of vehicles
     * 2) Inertia/Laravel paginator object { data: [], links: [] }
     */
    vehicles: { type: [Array, Object], default: () => [] },
    manufactures: { type: Array, default: () => [] },
    models: { type: Array, default: () => [] },
  },
  data() {
    return {
      perPage: 12,
      currentPage: 1, // used only for client-side pagination
    };
  },
  computed: {
    isInertiaPaginator() {
      return (
        this.vehicles &&
        typeof this.vehicles === "object" &&
        Array.isArray(this.vehicles.data) &&
        Array.isArray(this.vehicles.links)
      );
    },
    paginationMode() {
      return this.isInertiaPaginator ? "inertia" : "client";
    },
    vehiclesList() {
      return this.isInertiaPaginator ? this.vehicles.data : (this.vehicles || []);
    },
    paginationLinks() {
      return this.isInertiaPaginator ? (this.vehicles.links || []) : [];
    },

    arrivingVehicles() {
      // extra safety: filter again on frontend
      return (this.vehiclesList || []).filter(
        (v) => (v.availability || "").toLowerCase() === "arriving"
      );
    },

    pageCount() {
      if (this.paginationMode !== "client") return 1;
      const total = this.arrivingVehicles.length || 0;
      return Math.max(1, Math.ceil(total / this.perPage));
    },

    visibleVehicles() {
      // Inertia pagination: backend should already return 12 per page (still slice as a safety)
      if (this.paginationMode === "inertia") {
        return this.arrivingVehicles.slice(0, this.perPage);
      }

      // Client pagination fallback
      const start = (this.currentPage - 1) * this.perPage;
      return this.arrivingVehicles.slice(start, start + this.perPage);
    },

    pagesToShow() {
      // simple 1..N (you can enhance to ellipsis later)
      const pages = [];
      for (let i = 1; i <= this.pageCount; i++) pages.push(i);
      return pages;
    },
  },
  watch: {
    // if list changes (filters/data reload), keep page valid
    arrivingVehicles() {
      if (this.paginationMode === "client") {
        if (this.currentPage > this.pageCount) this.currentPage = this.pageCount;
        if (this.currentPage < 1) this.currentPage = 1;
      }
    },
  },
  methods: {
    goToPage(page) {
      if (this.paginationMode !== "client") return;
      const p = Math.min(this.pageCount, Math.max(1, page));
      this.currentPage = p;
      if (typeof window !== "undefined") {
        window.scrollTo({ top: 0, behavior: "smooth" });
      }
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
    getManufacturerModel(car) {
      if (car && car.manufacture && car.vehicle_model) {
        return `${car.manufacture.title || car.manufacture.name || ""} ${
          car.vehicle_model.title || car.vehicle_model.name || ""
        }`.trim();
      }

      const manu = this.manufactures.find((m) => m.id === car.manufacture_id) || {};
      const model = this.models.find((m) => m.id === car.vehicle_model_id) || {};
      return `${manu.name || manu.title || ""} ${model.title || model.name || ""}`.trim();
    },
    formatPrice(value) {
      if (value === null || value === undefined) return "0";
      const num = Number(value) || 0;
      return num.toLocaleString("en-LK", { minimumFractionDigits: 0, maximumFractionDigits: 0 });
    },
    getMainImage(car) {
      const main = (car.media || []).find((m) => m.custom_properties?.type === "vehicle_main");
      const fallback = (car.media || [])[0];
      return main?.original_url || fallback?.original_url || "/images/placeholder.png";
    },
  },
};
</script>

<style scoped>
.vehicle-title {
  font-size: clamp(1.6rem, 3vw, 2.3rem);
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #0f172a;
  margin: 0;
}

.car-grid {
  display: grid;
  width: 100%;
  gap: 1rem;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  justify-content: center;
}

@media (min-width: 768px) and (max-width: 1023px) {
  .car-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1024px) and (max-width: 1366px) {
  .car-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 767px) {
  .car-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

.car-card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  background: #fff;
  margin-bottom: 2rem;
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
  gap: 6px;
}

.card-content {
  padding: 20px;
}

.price-section {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
  gap: 12px;
}

.price {
  font-weight: 500;
  font-size: 1.4rem;
}

.price .currency {
  font-size: 0.5em;
  margin-left: 0.25rem;
  opacity: 0.8;
  font-weight: 500;
}

.price-note {
  display: block;
  font-size: 0.85rem;
  color: #777;
}

.car-name {
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.3;
  margin-bottom: 0.15rem;
}

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

.ficon {
  width: 18px;
  height: 18px;
}

.availability-available {
  color: green;
}

.availability-arriving {
  color: orange;
}

.availability-sold {
  color: red;
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

/* Pagination styling (same style as your other file) */
.pagination {
  display: inline-flex;
  justify-content: center;
  list-style: none;
  padding-left: 0;
  margin: 1rem 0;
}

.pagination .page-item {
  margin: 0 0.25rem;
}

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

.pagination .page-item:not(.active) .page-link:hover {
  background-color: #f1f5fb;
}

.pagination .page-item.active .page-link {
  z-index: 1;
  background-color: #073567;
  border-color: #007bff;
  color: #fff;
  cursor: default;
}

.pagination .page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  background-color: #fff;
  border-color: #dee2e6;
  opacity: 0.6;
}

/* Button links (client mode) should look identical */
button.page-link {
  appearance: none;
  cursor: pointer;
}
button.page-link:disabled {
  cursor: default;
}
</style>
