<template>
  <div class="lease-section container px-3" v-if="limitedManufactures.length">
    <h1 class="secondFontStyle fw-semibold">BROWSE BY CAR BRAND</h1>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 mt-3">
      <div class="col" v-for="brand in limitedManufactures" :key="brand.MARKA_NAME">
        <div
          class="brand-card h-100 d-flex align-items-center p-2"
          :href="route('live.auction', { ...FIXED_PARAMS, manufacturer: brand.MARKA_NAME })"
        >
          <div class="brand-logo">
            <img v-if="brand.logoUrl" :src="brand.logoUrl" :alt="brand.MARKA_NAME + ' logo'" class="img-fluid" />
            <img v-else-if="brand.logo" :src="brand.logo" :alt="brand.MARKA_NAME + ' logo (API)'" />
            <div v-else class="brand-placeholder">{{ brand.MARKA_NAME[0] }}</div>
          </div>
          <div class="brand-info">
            <span class="brand-name">{{ brand.MARKA_NAME }}</span>
            <span class="brand-count" v-if="brand.count">({{ brand.count }})</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>




<script setup>
import { defineProps, computed } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
  auction_manufactures: {
    type: Array,
    // not "required: true" – give it a safe default
    default: () => [],
  },
})

const commonBrandNames = [
  "TOYOTA","HONDA","NISSAN","MAZDA","MITSUBISHI",
  "SUBARU","SUZUKI","DAIHATSU","ISUZU","LEXUS",
  "BMW","MERCEDES BENZ","AUDI","VOLKSWAGEN","PORSCHE",
  "VOLVO","FORD","CHEVROLET","YAMAHA","CITROEN",
  "PEUGEOT","CADILLAC","HINO","JEEP","LAND ROVER",
  "JAGUAR","MINI","TESLA","BENTLEY","FERRARI"
]

// all the static query-params you always want
const FIXED_PARAMS = {
  available_days: 0,
  chassis:        0,
  color:          0,
  engine:         0,
  grade:          0,
  lot_no:         '',
  mileage_from:   0,
  mileage_to:     0,
  model:          0,
  search:         'true',
  start_price:    0,
  year_from:      0,
  year_to:        0,
}

// SAFE computed: if auction_manufactures is null or not an array,
// we treat it as []
const limitedManufactures = computed(() => {
  const list = Array.isArray(props.auction_manufactures)
    ? props.auction_manufactures
    : []

  return list
    .filter(b => b?.MARKA_NAME && commonBrandNames.includes(b.MARKA_NAME.toUpperCase()))
    .map(b => ({
      ...b,
      // build the public URL; e.g. '/images/logos/audi.png'
      logoUrl: `/images/logos/${b.MARKA_NAME.toLowerCase()}.png`,
    }))
})
</script>



<style scoped>
.brands-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    /* 7 columns */
    gap: 16px;
    margin-top: 16px;
}

.brand-card {
  display: flex;
  align-items: center;
  background: #fff;
  border-radius: 8px;
  border: 1px solid #e0e0e0;
  padding: 12px;
  transition: box-shadow 0.2s;
  cursor: pointer;
  text-decoration: none;  
  color: inherit;         
}

.brand-card:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.brand-logo {
  width: 48px;
  height: 48px;
  margin-right: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.brand-logo img {
    max-width: 100%;
    max-height: 100%;
    height: auto;
    width: auto;
}

.brand-placeholder {
    width: 48px;
    height: 48px;
    background: #f0f0f0;
    color: #888;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    border-radius: 50%;
}

.brand-info {
    display: flex;
    flex-direction: column;
}

.brand-name {
    font-weight: 500;
    font-size: 13px;
}

.brand-count {
    color: #888;
    font-size: 0.95rem;
}
</style>