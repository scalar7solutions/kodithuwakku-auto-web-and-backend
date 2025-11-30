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
              <div class="slide" v-for="(slide,i) in slides" :key="i" :style="slideStyle">
                <div class="image-wrapper">
                  <img :src="slide.img" :alt="slide.alt" />
                </div>
                <div class="step-details">
                  <h3>{{ slide.title }}</h3>
                  <p>{{ slide.text }}</p>
                </div>
                
              </div>
            </div>
          </div>

          <!-- Prev/Next buttons under the viewport -->
          <div class="slider-controls">
            <button class="slider-btn prev-btn" @click="prevSlide" aria-label="Previous">
              <img src="/images/Assets/right.png" class="btn-icon" alt="←" />
            </button>
            <button class="slider-btn next-btn" @click="nextSlide" aria-label="Next">
              <img src="/images/Assets/left.png" class="btn-icon" alt="→" />
            </button>
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

    // updateSlider() {
    //   const slideWidth = 100 / this.slidesPerView;
    //   const wrapper = this.$el.querySelector(".slider-wrapper");
    //   wrapper.style.transform = `translateX(-${this.currentIndex * slideWidth}%)`;
    //   this.$el.querySelectorAll(".slide")
    //     .forEach(slide => slide.style.minWidth = `${slideWidth}%`);
    // },
    nextSlide() {
    if (this.currentIndex < this.slides.length - this.slidesPerView) {
      this.currentIndex++;
    }
    },
    prevSlide() {
      if (this.currentIndex > 0) {
        this.currentIndex--;
      }
    },
    handleResize() {
     this.currentIndex = 0;
     const w = window.innerWidth;
     this.slidesPerView = w >= 1200 ? 4 : w >= 768 ? 2 : 1;
   },


    onImageError(event) {
      event.target.style.display = 'none'; // Hide button if image fails to load
    }
  },
  computed: {
  // controls the wrapper’s translateX
  wrapperStyle() {
    const w = 100 / this.slidesPerView;
    return {
      transform:   `translateX(-${this.currentIndex * w}%)`,
      transition:  'transform 0.3s ease',
    };
  },
  // sets each slide’s width
  slideStyle() {
    return {
      minWidth: `${100 / this.slidesPerView}%`
    };
  }
},

};
</script>

<style scoped>
/* Section padding */
.categorySection {
  padding: 0 1rem 2rem;
}
.reservation-section {
  padding: 2rem 1rem;
}

/* Header styling */
.header-container {
  padding-top: 0; /* Added to move header down slightly */
}
.reserve-title {
  color: #242D3D;
  font-weight: 700;
  text-align: left;
}

/* Slider container & viewport */
.slider-container {
  position: relative;
  overflow: visible; /* allow buttons outside */
  padding-bottom: 3rem; /* Space under buttons */
  min-height: 20rem; /* Ensure container has enough height */
  max-height: 100%; /* Prevent excessive expansion */
}
.slider-viewport {
  width: 100%;
  padding-bottom: 1.5rem; /* Space between cards and buttons */
}
.transition-transform {
  transition: transform 0.3s ease;
}

/* Slide wrapper & gap */
.slider-wrapper {
  display: flex;
  gap: 1rem;
}

/* Each slide “card” */
.slide {
  background: #fff;
  border-radius: 0.5rem;
  box-shadow: 0 1px 4px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

/* Force all images to same box & aspect */
.image-wrapper {
  width: 100%;
  height: 180px; /* Fixed height for design consistency */
  overflow: hidden;
}
.image-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Text area */
.step-details {
  padding: 1rem;
  flex: 1;
}

/* Prev/Next buttons under gallery cards */
.slider-controls {
  position: absolute;
  bottom: 1rem;
  right: 4rem; /* moved further left from right edge */
  display: flex;
  gap: 0.5rem;
  justify-content: flex-start;
}
.slider-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2.5em;
  height: 2.5em;
  border-radius: 50%;
  background: #F2F2F2;
  border: none;
  box-shadow: 0 1px 3px rgba(0,0,0,0.1);
  padding: 0;
  cursor: pointer;
}
.btn-icon {
  width: 1.25em;
  height: auto;
}

/* Mobile tweaks */
@media (max-width: 576px) {
  .slider-container {
    padding-bottom: 2rem; /* Adjusted for mobile */
  }
  .header-container {
    padding-top: 1.5rem; /* Adjusted for mobile */
  }
  .slider-controls {
    bottom: 0.5rem;
    right: 1rem;
    gap: 0.5rem;
  }
  .slider-btn {
    width: 2em;
    height: 2em;
  }
  .btn-icon {
    width: 1em;
  }
}

@media (max-width: 576px) {
  .slider-controls {
    right: 3.5rem !important;    /* was 1rem—now further left */
    bottom: 0.5rem !important;   /* keep that slight gap at bottom */
  }
}

.section-header {
    margin-top: 1rem !important;
    text-align: left;
}



.reserve-title {
  color: #1a1a1a;
  font-weight: bold ;
  text-transform: uppercase;
  font-size: 2.5rem;
  letter-spacing: 0.005em;
}

</style>
