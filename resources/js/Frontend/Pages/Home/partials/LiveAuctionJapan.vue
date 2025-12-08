<template>
  <section v-if="brandList.length" class="lease-section container px-3">
    <div class="tabs-container mb-4">
      <h1 class="secondFontStyle" style="font-weight:600;">
        LIVE AUCTION IN JAPAN
      </h1>
      <div class="tabs">
        <button
          class="tab-btn"
          :class="{ active: tabBrand === null }"
          @click.prevent="selectBrand(null)"
        >All</button>
        <button
          v-for="brand in brandList"
          :key="brand"
          class="tab-btn"
          :class="{ active: tabBrand === brand }"
          @click.prevent="selectBrand(brand)"
        >{{ brand }}</button>
      </div>
    </div>

    
    <div class="car-grid">
      <div
        class="car-card"
        v-for="(car, i) in displayedVehicles"
        :key="car.ID || i"
      >
        <Link :href="route('live.auction.show', { id: car.ID })" class="card">

        <div class="image-wrapper">
          <img
            v-if="car.IMAGES"
            :src="car.IMAGES.split('#')[0].replace('&h=50','')"
            class="main-image"
            @error="e => e.target.src = '/images/Assets/noimg.png'"
          />
          <div v-else class="no-image-placeholder">
            No Photo
          </div>
        </div>






          <!-- ROW 1: NAME & YEAR -->
          <div class="row row-1">
            <h3 class="car-name">{{ car.MARKA_NAME }} {{ car.MODEL_NAME }}</h3>
            <span class="value">{{ car.YEAR }}</span>
          </div>

          <hr/>

          <!-- ROW 2: LOT & AUCTION -->
          <div class="row row-2">
            <div class="detail-block">
              <!-- insert your icon here, e.g. <CarIcon /> -->
              <span class="label">Lot No</span>
              <span class="value">{{ car.LOT }}</span>
            </div>
            <div class="detail-block">
              <!-- insert your icon here -->
              <span class="label">Auction</span>
              <span class="value">{{ car.AUCTION }}</span>
            </div>
          </div>

          <hr/>

          <!-- ROW 3: MILEAGE & ENGINE -->
          <div class="row row-3">
            <div class="detail-block">
              <!-- insert your icon here -->
              <span class="label">Mileage</span>
              <span class="value">{{ car.MILEAGE }} KM</span>
            </div>
            <div class="detail-block">
              <!-- insert your icon here -->
              <span class="label">Engine</span>
              <span class="value">{{ car.ENG_V }} CC</span>
            </div>
          </div>

        </Link>
      </div>
    </div>
  </section>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
  name: 'LiveAuctionJapan',
  components: { Link },
  props: {
    brandList: Array,
    japanAuctionVehicles: Array,
    tabBrand: String
  },
  methods: {
    selectBrand(brand) {
      Inertia.reload({
        preserveState: true,
        preserveScroll: true,
        only: ['japanAuctionVehicles','tabBrand'],
        data: { tabBrand: brand }
      })
    },


  },
  computed: {
    displayedVehicles() {
      if (!this.tabBrand) {
        return this.brandList
          .map(b => this.japanAuctionVehicles.find(v => v.MARKA_NAME === b))
          .filter(Boolean)
      }
      return this.japanAuctionVehicles
        .filter(v => v.MARKA_NAME === this.tabBrand)
        .slice(0,8)
    }
  }
}
</script>

<style scoped>
.tabs-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  margin-bottom: 1.5rem;
  padding: 1rem 0;
}
.tabs {
  display: flex;
  gap: 0.5rem;
  overflow-x: auto;
}
.tab-btn {
  padding: 0.5rem 1rem;
  border: 1px solid #ddd;
  border-radius: 9999px;
  background: #fff;
  cursor: pointer;
  white-space: nowrap;
  transition: background-color 0.2s, color 0.2s;
}
.tab-btn.active {
  background: #000;
  color: #fff;
  border-color: #000;
}

.car-grid {
  display: grid;
  gap: 1rem;
  grid-template-columns: repeat(auto-fit, minmax(280px,1fr));
}

.car-card {
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  overflow: hidden;
}

.card {
  display: flex;
  flex-direction: column;
  text-decoration: none;
  color: inherit;
}

.image-wrapper {
  position: relative;
  width: 100%;
  height: 250px;
  background-color: #f7fafc;
  overflow: hidden;
}

.main-image {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}


.row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.75rem 1rem;
}
.row + hr {
  margin: 0;
  border: none;
  border-top: 1px solid #e2e8f0;
}

.car-name {
  font-size: 20px;
  font-weight: 600;
  margin: 0;
}
.value {
  font-size: 15px;
  font-weight: 600;
  color: #2d3748;
}

.detail-block {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}
.label {
  font-size: 15px;
  color: #718096;
}




.no-image-placeholder {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #a0aec0;
  font-size: 0.875rem;
}


.row.row-2,
.row.row-3 {
  display: grid;
  grid-template-columns: auto auto;
  align-items: start;
  padding: 0.75rem 1rem;
}


.row .detail-block {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}



.row.row-2 > .detail-block:nth-child(2),
.row.row-3 > .detail-block:nth-child(2) {
  justify-self: end;
  align-items: flex-end;
  text-align: right;
}


.row.row-1 {

  justify-content: flex-start;
  gap: 0.5rem;
}





</style>
