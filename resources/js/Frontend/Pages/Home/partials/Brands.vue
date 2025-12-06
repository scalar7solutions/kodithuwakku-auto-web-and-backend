<template>
  <!-- match FirstSection’s outer section class -->
  <section class="buying-essentials-section brandSection">
    <!-- SAME container as before -->
    <div class="lease-section container px-3" v-if="manufactures.length > 0">
      <!-- Centered header like other sections -->
      <div class="section-header">
        <h2 class="headText secondFontStyle fw-semibold">
          Browse by Brand
        </h2>
      </div>

      <!-- Brands carousel (single row) -->
      <div class="brand-carousel-container">
        <div
          class="brand-carousel"
          ref="carousel"
          @scroll="onCarouselScroll"
        >
          <div class="brand-track">
            <Link
              v-for="(brand, index) in visibleBrands"
              :key="brand.id"
              method="post"
              as="button"
              :href="route('available')"
              :data="{ _method: 'GET', brand: brand.id }"
              class="brand-slide text-decoration-none text-reset"
            >
              <!-- CARD -->
              <div
                class="brand-card"
                :style="{ animationDelay: `${index * 50}ms` }"
              >
                <!-- Logo container -->
                <div class="brand-card-img position-relative">
                  <!-- Skeleton loader -->
                  <div
                    v-if="!imageLoaded[brand.id] && !imageError[brand.id] && brandLogo(brand)"
                    class="skeleton-placeholder"
                  ></div>

                  <!-- Logo image -->
                  <img
                    v-if="brandLogo(brand) && !imageError[brand.id]"
                    :src="brandLogo(brand)"
                    :alt="brand.title + ' logo'"
                    class="imgStyleClass"
                    :class="{ 'is-loaded': imageLoaded[brand.id] }"
                    @load="markBrandLoaded(brand.id)"
                    @error="markBrandError(brand.id)"
                  />

                  <!-- Initials fallback -->
                  <div
                    v-else
                    class="initials-fallback"
                  >
                    <span>{{ brandInitials(brand.title) }}</span>
                  </div>
                </div>

                <!-- Brand name -->
                <div class="brand-card-text">
                  <h5 class="topicText">
                    {{ brand.title }}
                  </h5>
                </div>
              </div>
            </Link>
          </div>
        </div>
      </div>

      <!-- Prev / Next buttons under the carousel (bottom center) -->
      <div class="brand-nav d-flex align-items-center justify-content-center gap-2 mt-3">
        <button
          type="button"
          class="nav-btn"
          :class="{ 'nav-btn-disabled': !canScrollPrev }"
          :disabled="!canScrollPrev"
          @click="scrollPrev"
          aria-label="Previous brands"
        >
          <span aria-hidden="true" class="nav-icon">&lsaquo;</span>
        </button>
        <button
          type="button"
          class="nav-btn"
          :class="{ 'nav-btn-disabled': !canScrollNext }"
          :disabled="!canScrollNext"
          @click="scrollNext"
          aria-label="Next brands"
        >
          <span aria-hidden="true" class="nav-icon">&rsaquo;</span>
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  name: 'Brands',
  components: { Link },
  props: {
    manufactures: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      imageLoaded: {},
      imageError: {},
      canScrollPrev: false,
      canScrollNext: true
    }
  },
  computed: {
    // still cap at 14 like before
    visibleBrands() {
      return this.manufactures.slice(0, 14)
    }
  },
  mounted() {
    this.initImageState()
    this.$nextTick(() => {
      this.updateNavButtons()
    })
    window.addEventListener('resize', this.updateNavButtons)
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.updateNavButtons)
  },
  watch: {
    manufactures: {
      handler() {
        this.initImageState()
        this.$nextTick(() => {
          this.updateNavButtons()
        })
      },
      deep: true
    }
  },
  methods: {
    initImageState() {
      this.visibleBrands.forEach((b) => {
        if (!(b.id in this.imageLoaded)) {
          this.imageLoaded[b.id] = false
        }
        if (!(b.id in this.imageError)) {
          this.imageError[b.id] = false
        }
      })
    },
    // Real logo if present, otherwise your static placeholder asset
    brandLogo(brand) {
      return (brand.media && brand.media[0] && brand.media[0].original_url) ||
        '/images/brand-placeholder.svg'
    },
    markBrandLoaded(id) {
      this.imageLoaded[id] = true
    },
    markBrandError(id) {
      this.imageError[id] = true
    },
    brandInitials(name) {
      if (!name) return ''
      return name
        .split(' ')
        .filter(Boolean)
        .map((w) => w[0])
        .join('')
        .toUpperCase()
        .slice(0, 2)
    },
    scrollPrev() {
      const el = /** @type {HTMLElement | undefined} */ (this.$refs.carousel)
      if (!el) return
      el.scrollBy({
        left: -el.clientWidth,
        behavior: 'smooth'
      })
    },
    scrollNext() {
      const el = /** @type {HTMLElement | undefined} */ (this.$refs.carousel)
      if (!el) return
      el.scrollBy({
        left: el.clientWidth,
        behavior: 'smooth'
      })
    },
    onCarouselScroll() {
      this.updateNavButtons()
    },
    updateNavButtons() {
      const el = /** @type {HTMLElement | undefined} */ (this.$refs.carousel)
      if (!el) return
      const { scrollLeft, scrollWidth, clientWidth } = el
      const maxScrollLeft = scrollWidth - clientWidth - 1 // small epsilon
      this.canScrollPrev = scrollLeft > 0
      this.canScrollNext = scrollLeft < maxScrollLeft
    }
  }
}
</script>

<style scoped>
.brandSection {
  background-color: #ffffff;
}

/* Centered section header */
.section-header {
  text-align: center;
  margin-bottom: 2.5rem;
}

/* Header style matches "Vehicle Stock" and is responsive */
.headText {
  font-size: clamp(1.6rem, 3vw, 2.3rem);
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #0f172a;
  margin: 0;
}

/* NAV BUTTONS */

.nav-btn {
  width: 40px;
  height: 40px;
  border-radius: 999px;
  border: 1px solid rgba(15, 23, 42, 0.12);
  background-color: #ffffff;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  transition: all 0.25s ease;
}

.nav-btn .nav-icon {
  font-size: 1.25rem;
  line-height: 1;
  color: #050b20;
}

.nav-btn:hover:not(.nav-btn-disabled) {
  background-color: #2563eb;
  border-color: #2563eb;
}

.nav-btn:hover:not(.nav-btn-disabled) .nav-icon {
  color: #ffffff;
}

.nav-btn:focus-visible {
  outline: 2px solid rgba(37, 99, 235, 0.4);
  outline-offset: 2px;
}

.nav-btn-disabled {
  opacity: 0.4;
  cursor: not-allowed;
}

/* CAROUSEL LAYOUT */

.brand-carousel-container {
  position: relative;
}

.brand-carousel {
  overflow-x: auto;          /* was hidden */
  overflow-y: visible;
  width: 100%;
  padding-top: 1rem;
  padding-bottom: 1.5rem;
  scroll-behavior: smooth;   /* smooth scroll for button scrollBy */
  -webkit-overflow-scrolling: touch; /* momentum on iOS */
}

/* Hide horizontal scrollbar but keep scrolling usable */
.brand-carousel::-webkit-scrollbar {
  display: none;              /* Chrome / Safari / iOS */
}

.brand-carousel {
  -ms-overflow-style: none;   /* IE / Edge legacy */
  scrollbar-width: none;      /* Firefox */
}

.brand-track {
  display: flex;
  gap: 1rem;
}

/* slide widths – keep same responsive behaviour */
.brand-slide {
  flex: 0 0 calc(50% - 0.5rem); /* 2 per row on xs */
}

@media (min-width: 576px) {
  .brand-slide {
    flex-basis: calc(33.333% - 0.67rem); /* 3 per row */
  }
}

@media (min-width: 768px) {
  .brand-slide {
    flex-basis: calc(25% - 0.75rem); /* 4 per row */
  }
}

@media (min-width: 992px) {
  .brand-slide {
    flex-basis: calc(20% - 0.8rem); /* 5 per row */
  }
}

@media (min-width: 1200px) {
  .brand-slide {
    flex-basis: calc(16.666% - 0.85rem); /* 6 per row */
  }
}

@media (min-width: 1400px) {
  .brand-slide {
    flex-basis: calc(14.285% - 0.9rem); /* 7 per row */
  }
}

/* BRAND CARD */

.brand-card {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  aspect-ratio: 1 / 1;
  padding: 0.9rem 0.85rem;
  border-radius: 16px;
  border: 2px solid rgba(3, 7, 14, 0.08);
  background-color: #ffffff;
  transition:
    transform 0.3s ease,
    box-shadow 0.3s ease,
    border-color 0.3s ease,
    background-color 0.3s ease;
  overflow: hidden;
  opacity: 0;
  animation: scale-in 0.35s ease-out forwards;
  transform: translateY(0);
}

.brand-slide:hover .brand-card {
  transform: translateY(-12px) scale(1.02);
  border-color: rgba(15, 23, 42, 0.18);
}

.brand-card-img {
  flex: 3;
  display: flex;
  align-items: center;
  justify-content: center;
  padding-top: 0.35rem;
  width: 100%;
}

.brand-card-text {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding-bottom: 0.25rem;
  width: 100%;
  overflow: hidden;
}

/* LOGO IMAGE */

.imgStyleClass {
  max-width: 55%;
  max-height: 55%;
  object-fit: contain;
  opacity: 0;
  transition:
    opacity 0.45s ease,
    transform 0.5s ease;
}

.imgStyleClass.is-loaded {
  opacity: 1;
}

.brand-card:hover .imgStyleClass.is-loaded {
  transform: scale(1.15) rotate(3deg);
}

/* INITIALS FALLBACK */

.initials-fallback {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 3.5rem;
  height: 3.5rem;
  border-radius: 999px;
  background-color: #f3f4f6;
  border: 1px solid rgba(15, 23, 42, 0.06);
  transition: transform 0.3s ease;
}

.initials-fallback span {
  font-size: 1rem;
  font-weight: 700;
  color: #6b7280;
}

.brand-card:hover .initials-fallback {
  transform: scale(1.08) rotate(6deg);
}

/* BRAND NAME */

.topicText {
  font-family: 'Poppins', sans-serif !important;
  font-weight: 600;
  font-size: 0.9rem;
  color: #050b20;
  text-align: center;
  margin: 0;
  line-height: 1.3;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* SKELETON SHIMMER */

.skeleton-placeholder {
  position: absolute;
  inset: 0.3rem 0.9rem;
  border-radius: 12px;
  background: linear-gradient(
    90deg,
    #e5e7eb 0%,
    #f9fafb 50%,
    #e5e7eb 100%
  );
  background-size: 200% 100%;
  animation: shimmer 1.4s infinite;
}

@keyframes shimmer {
  0% {
    background-position: -200% 0;
  }
  100% {
    background-position: 200% 0;
  }
}

/* CARD ENTRANCE ANIMATION */

@keyframes scale-in {
  0% {
    transform: scale(0.96);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

/* ======== RESPONSIVE SPACING (MEDIA QUERIES) ======== */

/* Tablets: slightly tighter vertical spacing */
@media (max-width: 992px) {
  .buying-essentials-section.brandSection {
    padding: 2.5rem 0;
  }

  .section-header {
    margin-bottom: 2rem;
  }

  .brand-carousel {
    padding-top: 0.75rem;
    padding-bottom: 1.25rem;
  }
}

/* Mobiles: decrease section gaps and grid gap */
@media (max-width: 576px) {
  .buying-essentials-section.brandSection {
    padding: 0rem 0;
  }

  .section-header {
    margin-bottom: 1.5rem;
  }

  .brand-track {
    gap: 0.75rem;
  }

  .brand-carousel {
    padding-top: 0.5rem;
    padding-bottom: 1rem;
  }

  .brand-slide {
    flex-basis: calc(50% - 0.4rem);
  }
}
</style>
