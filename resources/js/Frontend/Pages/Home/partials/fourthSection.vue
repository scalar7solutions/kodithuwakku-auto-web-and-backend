<template>
  <section class="categorySection container-fluid my-5 mb-0 pt-1 pb-4 lease-section">
    <!-- HEADER AS FULL-WIDTH BLOCK -->
    <div class="section-header">
      <h2 class="reserve-title">RESERVE ONLINE WITH AUTOTRADER</h2>
    </div>

    <!-- SLIDER ROW -->
    <div class="row">
      <div class="col-12">
        <div class="slider-container">
          <!-- only this viewport area hides overflow -->
          <div class="slider-viewport overflow-hidden">
            <div class="slider-wrapper d-flex" :style="wrapperStyle">
              <div
                class="slider-slide"
                v-for="(slide, i) in slides"
                :key="i"
                :style="slideStyle"
              >
                <div class="reservation-card">
                  <!-- IMAGE + NUMBER BADGE -->
                  <div class="image-wrapper">
                    <img
                      :src="slide.img"
                      :alt="slide.alt"
                      @error="onImageError"
                    />
                    <div class="step-badge">
                      {{ formatStepNumber(i) }}
                    </div>
                  </div>

                  <!-- CONTENT -->
                  <div class="card-content">
                    <h3>{{ slide.title }}</h3>
                    <p>{{ slide.text }}</p>

                    <!-- DECORATIVE LINE -->
                    <div class="card-accent-line"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- NAVIGATION: DOTS LEFT, ARROWS RIGHT (UNDER CARDS) -->
          <div class="slider-controls-row">
            <!-- Progress dots (orange bar) -->
            <div class="slider-dots">
              <button
                v-for="index in maxIndex + 1"
                :key="index"
                type="button"
                class="slider-dot"
                :class="{ active: currentIndex === index - 1 }"
                @click="goToSlide(index - 1)"
                :aria-label="`Go to slide ${index}`"
              />
            </div>

            <!-- Arrow buttons -->
            <div class="slider-buttons">
              <button
                type="button"
                class="slider-btn prev-btn"
                :class="{ disabled: currentIndex === 0 }"
                @click="prevSlide"
                :disabled="currentIndex === 0"
                aria-label="Previous"
              >
                <img src="/images/Assets/right.png" class="btn-icon" alt="←" />
              </button>
              <button
                type="button"
                class="slider-btn next-btn"
                :class="{ disabled: currentIndex >= maxIndex }"
                @click="nextSlide"
                :disabled="currentIndex >= maxIndex"
                aria-label="Next"
              >
                <img src="/images/Assets/left.png" class="btn-icon" alt="→" />
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "ReservationSection",
  data() {
    return {
      currentIndex: 0,
      slidesPerView: 4,
      slides: [
        {
          img: "images/Assets/33.png",
          alt: "Steps diagram",
          title: "Build your deal, step-by-step",
          text: "Add part exchange, finance and choose delivery or collection. We'll guide you through it all. Then complete the sale."
        },
        {
          img: "images/Assets/32.png",
          alt: "Vehicle check",
          title: "Peace of mind with a free vehicle history check",
          text: "Order with confidence with our free vehicle history check to avoid costly surprises if you decide to buy."
        },
        {
          img: "images/Assets/31.png",
          alt: "Time saving",
          title: "Save time and reserve online",
          text: "Get ahead by sorting everything online. Or if you'd like to chat, talk it through with the dealer."
        },
        {
          img: "images/Assets/34.png",
          alt: "Instant confirmation",
          title: "Get instant confirmation",
          text: "Receive a reservation summary right away and secure your car with a small deposit."
        },
        {
          img: "images/Assets/35.png",
          alt: "Complete payment securely",
          title: "Complete payment securely",
          text: "Choose from debit/credit card, bank transfer or finance—everything’s handled online with full encryption."
        },
        {
          img: "images/Assets/36.png",
          alt: "Delivery or collection",
          title: "Choose delivery or collection",
          text: "Opt for home delivery or pick up at the dealer, then just turn up at your chosen time to collect the keys."
        }
      ]
    };
  },
  mounted() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  beforeUnmount() {
    window.removeEventListener("resize", this.handleResize);
  },
  methods: {
    nextSlide() {
      if (this.currentIndex < this.maxIndex) {
        this.currentIndex++;
      }
    },
    prevSlide() {
      if (this.currentIndex > 0) {
        this.currentIndex--;
      }
    },
    goToSlide(index) {
      this.currentIndex = index;
    },
    handleResize() {
      this.currentIndex = 0;
      const w = window.innerWidth;
      this.slidesPerView = w >= 1200 ? 4 : w >= 768 ? 2 : 1;
    },
    onImageError(event) {
      event.target.style.display = "none";
    },
    formatStepNumber(index) {
      return String(index + 1).padStart(2, "0");
    }
  },
  computed: {
    // controls the wrapper’s translateX (same as TSX)
    wrapperStyle() {
      const w = 100 / this.slidesPerView;
      return {
        transform: `translateX(-${this.currentIndex * w}%)`,
        transition: "transform 0.5s ease-out"
      };
    },
    // each slide’s width (matching the TSX calc including gap)
    slideStyle() {
      const base = 100 / this.slidesPerView;
      const gapShare = (20 * (this.slidesPerView - 1)) / this.slidesPerView; // 20px gap like TSX
      return {
        minWidth: `calc(${base}% - ${gapShare}px)`
      };
    },
    maxIndex() {
      return Math.max(0, this.slides.length - this.slidesPerView);
    }
  }
};
</script>

<style scoped>
/* Section padding */
.categorySection {
  padding: 0 1rem 3rem; /* extra bottom padding under nav */
}

.section-header {
  margin-top: 1rem !important;
  text-align: left;
}

.reserve-title {
  color: #1a1a1a;
  font-weight: bold;
  text-transform: uppercase;
  font-size: 2.5rem;
  letter-spacing: 0.005em;
}

/* Slider container & viewport */
.slider-container {
  position: relative;
  overflow: visible;
}

.slider-viewport {
  width: 100%;
  padding-bottom: 1rem; /* space between cards and dots/arrows */
}

.slider-wrapper {
  display: flex;
  gap: 1.25rem; /* ~20px like TSX (gap-5) */
  align-items: stretch;
}

/* CARD STYLING (match TSX design) */
.slider-slide {
  display: flex;
  flex-direction: column;
}

.reservation-card {
  background: #ffffff;
  border-radius: 1rem; /* rounded-2xl */
  border: 1px solid rgba(148, 163, 184, 0.5); /* border-border/50 */
  display: flex;
  flex-direction: column;
  height: 100%;
  overflow: hidden;
  transition: all 0.3s ease;
  box-shadow: 0 0 0 rgba(0, 0, 0, 0); /* base no shadow */
}

.reservation-card:hover {
  transform: translateY(-4px); /* hover:-translate-y-1 */
  border-color: rgba(245, 158, 11, 0.6); /* hover:border-accent/30 */
  box-shadow: 0 18px 40px rgba(15, 23, 42, 0.16); /* hover:shadow-card-hover */
}

/* Image area */
.image-wrapper {
  position: relative;
  width: 100%;
  height: 176px; /* h-44 */
  overflow: hidden;
}

.image-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.reservation-card:hover .image-wrapper img {
  transform: scale(1.05); /* group-hover:scale-105 */
}

/* Step number badge */
.step-badge {
  position: absolute;
  top: 0.75rem;
  left: 0.75rem;
  width: 2.5rem;   /* w-10 */
  height: 2.5rem;  /* h-10 */
  border-radius: 999px;
  background: #f59e0b; /* accent */
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 0.85rem;
}

/* Text area */
.card-content {
  padding: 1.25rem; /* p-5 */
  flex: 1;
}

.card-content h3 {
  font-size: 1.125rem; /* text-lg */
  font-weight: 600;
  color: #111827;
  margin-bottom: 0.5rem;
  line-height: 1.25;
}

.card-content p {
  font-size: 0.875rem; /* text-sm */
  color: #6b7280;
  line-height: 1.6;
  margin: 0;
}

/* Decorative accent line */
.card-accent-line {
  margin-top: 1rem;      /* mt-4 */
  height: 0.25rem;       /* h-1 */
  width: 3rem;           /* w-12 */
  border-radius: 999px;
  background: rgba(245, 158, 11, 0.3);
  transition: width 0.3s ease, background 0.3s ease;
}

.reservation-card:hover .card-accent-line {
  width: 5rem;           /* like group-hover:w-20 */
  background: #f59e0b;
}

/* Controls row (dots + arrows) */
.slider-controls-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 2rem; /* mt-8 */
}

/* Dots (left orange slider bar) */
.slider-dots {
  display: flex;
  gap: 0.5rem;
}

.slider-dot {
  height: 0.5rem; /* h-2 */
  width: 0.5rem;  /* w-2 */
  border-radius: 999px;
  border: none;
  cursor: pointer;
  background: rgba(148, 163, 184, 0.5); /* muted-foreground/30 */
  transition: all 0.3s ease;
  padding: 0;
}

.slider-dot.active {
  width: 2rem;           /* w-8 */
  background: #f59e0b;   /* bg-accent */
}

/* Arrow buttons (right) */
.slider-buttons {
  display: flex;
  gap: 0.75rem;
}

.slider-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 3rem;   /* w-12 */
  height: 3rem;  /* h-12 */
  border-radius: 999px;
  background: #ffffff;
  border: 2px solid #111827;
  padding: 0;
  cursor: pointer;
  transition: all 0.2s ease;
}

.slider-btn:hover:not(.disabled) {
  background: #111827; /* hover:bg-foreground */
}

.slider-btn:hover:not(.disabled) .btn-icon {
  filter: invert(1); /* mimic white icon on dark bg */
}

.slider-btn.disabled {
  border-color: #e5e7eb;      /* border-muted */
  background: #f5f5f5;
  cursor: not-allowed;
  opacity: 0.6;
}

.btn-icon {
  width: 1.25rem;
  height: 1.25rem;
}

/* Mobile tweaks */
@media (max-width: 576px) {
  .slider-controls-row {
    margin-top: 1.5rem;
  }

  .slider-btn {
    width: 2.5rem;
    height: 2.5rem;
  }

  .btn-icon {
    width: 1.1rem;
    height: 1.1rem;
  }
}
</style>
