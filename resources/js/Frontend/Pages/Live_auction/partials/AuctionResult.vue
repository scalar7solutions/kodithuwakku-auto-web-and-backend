<template>
  <section class="container-fluid px-5 px-md-6 mobileResponsiveForPadding my-5">
    <div v-if="
      !$page.props.vehiclesList ||
      $page.props.vehiclesList.length <= 0
    ">
      <div class="text-center">
        <div>
          <img src="/images/car-front-in-magnifier-glass.png" width="100" alt />
        </div>
        <div class="h5 fw-bold text-secondary pt-3">Please select your vehicle make.</div>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-12       col-md-6    col-lg-4    col-xl-3" v-for="vehicle in $page.props.vehiclesList" :key="vehicle.ID">
        <Link :href="route('auction', {
              id: vehicle.ID,
              model: $root.stringToSlug(vehicle.MARKA_NAME),
              slug: $root.stringToSlug(vehicle.MARKA_NAME) + '-' + stringToSlug(vehicle.MODEL_NAME),
            })" class="text-decoration-none">
        <div class="vehicle-card h-100">
          <div class="card-image">
            <img :src="getFirstImage(vehicle.IMAGES)"
              class="w-100 card-img"
             alt 
             />
            <!-- <div class="status-badge" :class="{ 'sold': vehicle.STATUS === 'SOLD', 'not-sold': vehicle.STATUS !== 'SOLD' }">
                {{ vehicle.STATUS === 'SOLD' ? 'Sold' : 'Not Sold' }}
              </div> -->
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold mb-3">
              {{ vehicle.MARKA_NAME }} {{ vehicle.MODEL_NAME }}
            </h5>

            <div class="vehicle-details">
              <div class="detail-item">
                <span class="detail-label">Year</span>
                <span class="detail-value">{{ vehicle.YEAR }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Lot No</span>
                <span class="detail-value">{{ vehicle.LOT }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Auction</span>
                <span class="detail-value">{{ vehicle.AUCTION }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Date</span>
                <span class="detail-value">{{ vehicle.AUCTION_DATE }}</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Mileage</span>
                <span class="detail-value">{{ vehicle.MILEAGE }} KM</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Engine</span>
                <span class="detail-value">{{ vehicle.ENG_V }} CC</span>
              </div>
              <div class="detail-item">
                <span class="detail-label">Color</span>
                <span class="detail-value">{{ vehicle.COLOR }}</span>
              </div>
              <div class="detail-item">
                <Link :href="$root.getUser()
                    ? route('auction', {
                      id: vehicle.ID,
                      model: $root.stringToSlug(vehicle.MARKA_NAME),
                      slug: $root.stringToSlug(vehicle.MARKA_NAME) + '-' + stringToSlug(vehicle.MODEL_NAME),
                    })
                    : route('user.login')
                  " class="d-flex justify-content-center align-items-center h-100 btn btn-seemore detail-label">MORE DETAILS
                </Link>
                <!-- <span class="detail-value">{{ vehicle.STATUS }}</span> -->
              </div>
            </div>
          </div>
        </div>
        </Link>
      </div>
    </div>

    <!-- only render pagination if there’s more than 1 page -->


     <div
        v-if="vehiclesListCount > 0"
        class="d-flex justify-content-between align-items-center mt-4 mb-2"
      >
        <!-- Results text -->
        <p class="text-secondary mb-0">
          Showing <span class="fw-semibold">{{ firstItem }}</span>
          to <span class="fw-semibold">{{ lastItem }}</span>
          of <span class="fw-semibold">{{ vehiclesListCount }}</span>
          results
        </p>

        <!-- Pager -->
        <div v-if="computedLastPage > 1">
          <Pagination
            :total="vehiclesListCount"
            :currentPage="currentPage"
            :lastPage="computedLastPage"
            @goto="gotoPage"
          />
        </div>
  </div>


  </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "../../../components/Pagination.vue";

export default {

  props: {
    vehiclesList:      Array,
    vehiclesListCount: Number,
     requestQuery:      Object,

  },
  components: {
    Link,
    Pagination
  },
  data() {
    return {
      index: ""
    };
  },
  computed: {
     computedLastPage() {
      return Math.max(1, Math.ceil(this.vehiclesListCount  /* prop */ / 12))
    },


  // clamp the raw ?page=N into [1 .. lastPage]
  currentPage() {
    const raw = parseInt(this.requestQuery.page ?? 1, 10);
    if (raw < 1)                return 1;
     if (raw > this.computedLastPage) return this.computedLastPage
    return raw;
  },

  // total count of vehicles
  vehiclesListCount() {
    return this.$page.props.vehiclesListCount ?? 0;
  },

  // first item index
  firstItem() { 
      return (this.currentPage - 1) * 12 + 1 
    },
    lastItem()  { 
      return Math.min(this.vehiclesListCount /* prop */, this.currentPage * 12) 
    },
  },

  mounted() {
  const raw = parseInt(this.$page.props.requestQuery.page ?? 1, 10);
  if (raw > this.computedLastPage) {
    this.gotoPage(this.computedLastPage);
  }
},
  methods: {
    stringToSlug(str) {
      return str
        .toLowerCase() 
        .trim()
        .replace(/[^\w\s-]/g, "") 
        .replace(/\s+/g, "-") 
        .replace(/--+/g, "-") 
        .replace(/^-+|-+$/g, ""); 
    },
    getFirstImage(imgStr) {
      const strArray = imgStr.split("#");
      if (strArray.length > 0) {
        return strArray[0].replace("&h=50", "");
      } else {
        return "";
      }
    },
    gotoPage(page) {
      this.$inertia.reload({
        method: "POST",
        data: { ...this.$page.props?.requestQuery, page: page, _method: "GET" },
        onSuccess: () => {
          this.loading = false;
          window.scrollTo({ top: 0, behavior: "smooth" });
        }
      });
    }
  }
};
</script>

<style scoped>
.vehicle-card {
  background: white;
  border-radius: 12px;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
  cursor: pointer;
  position: relative;
}

.vehicle-card::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: transparent;
  z-index: 1;
}

.vehicle-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.card-image {
  position: relative;
  overflow: hidden;
}

.status-badge {
  position: absolute;
  top: 10px;
  left: 10px;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.9rem;
  font-weight: bold;
  color: white;
  z-index: 2;
}

.status-badge.sold {
  background-color: rgba(220, 53, 69, 0.9);
}

.status-badge.not-sold {
  background-color: rgba(40, 167, 69, 0.9);
}

.card-body {
  padding: 1.5rem;
}

.card-title {
  font-size: 1.25rem;
  color: #333;
  line-height: 1.4;
}

.vehicle-details {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.75rem;
  margin-bottom: 1rem;
}

.detail-item {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.detail-label {
  font-size: 0.8rem;
  color: #6c757d;
}

.detail-value {
  font-size: 0.9rem;
  font-weight: 600;
  color: #333;
}

.btn-danger {
  background-color: #dc3545;
  border: none;
  padding: 0.75rem;
  font-weight: 600;
  transition: background-color 0.3s ease;
}

.btn-danger:hover {
  background-color: #bb2d3b;
}


@media (max-width: 767px) {
  .mobileResponsiveForPadding {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  .vehicle-details {
    grid-template-columns: 1fr;
  }
}

.btn-seemore {
  background-color: black;
  color: white;
}

.px-md-6 {
  padding-left: 4rem !important;
  padding-right: 4rem !important;
}
@media (min-width: 768px) {
  .px-md-6 { padding-left: 4rem !important; padding-right: 4rem !important; }
}



@media (max-width: 767px) {
  .vehicle-details {
    grid-template-columns: repeat(2, 1fr);
  }
}


@media (max-width: 467px) {
  
  .card-body {
    padding: 1rem;
  }

  
  .card-title {
    font-size: 1rem;    
    margin-bottom: 0.75rem;
  }

 
  .vehicle-details {
    gap: 0.5rem;        
  }

 
  .detail-label {
    font-size: 0.7rem;  
  }
  .detail-value {
    font-size: 0.8rem;  
  }

 
  .btn-seemore {
    font-size: 0.6rem;
    padding: 0.2rem 0.55rem;
  }
}




</style>
