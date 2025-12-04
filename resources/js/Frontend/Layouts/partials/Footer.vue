<template>
  <footer class="footer-container">
    <div class="footer-content">
      <div class="footer-left">
        <h1 class="footer-title">LET'S <span>CONNECT</span></h1>
        <p class="footer-description">
          Join the millions who value their car with Auto Trader. It's completely free and within seconds
          we will give you a live valuation.
        </p>
        <a :href="'mailto:' + currentEmail">
          <button class="email-button">
            <span>SEND AN EMAIL</span>
          </button>

        </a>
        <div class="social-icons">
          <a href="https://www.facebook.com/share/1Aas6U2gJy/?mibextid=wwXIfr" class="social-icon"
            aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
          </a>
          <a href="#" class="social-icon" aria-label="Youtube">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17">
              </path>
              <path d="m10 15 5-3-5-3z"></path>
            </svg>
          </a>
          <a href="#" class="social-icon" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
            </svg>
          </a>
          <a href="#" class="social-icon" aria-label="TikTok">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 4h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"></path>
              <path d="M8 2v4"></path>
              <path d="M16 2v4"></path>
              <path d="M2 10h20"></path>
            </svg>
          </a>
          <a href="#" class="social-icon" aria-label="Pinterest">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <circle cx="12" cy="10" r="3"></circle>
              <path d="M7 15.5c2.5 2 5 2 7.5 0"></path>
              <path d="M7 16v4"></path>
              <path d="M17 16v4"></path>
            </svg>
          </a>
        </div>
      </div>

      <!-- Country Contact Information -->
      <div class="country-contacts">
        <h3 class="contact-title" v-if="selectedCountry">KODITHUWAKKUAUTO.COM - {{ selectedCountry.name }}</h3>
        <h3 class="contact-title" v-else>Our Locations</h3>

        <!-- Display selected country details if a country is selected -->
        <div v-if="selectedCountry" class="country-contact" style="text-align: left; ">
          <div class="contact-item" style="display: flex; flex-direction: column; align-items: flex-start; gap: 25px;">
            <div class="country-header" style="display: flex; align-items: center; gap: 10px;">
              <img :src="selectedCountry?.media?.length > 0 ? selectedCountry?.media[0].original_url : ''" height="20"
                width="30" class="ps-0" :alt="`${selectedCountry.name} Flag`" />
              <span class="country-name" style="font-size: 22px;">
                <strong>{{ selectedCountry.name }}</strong>
              </span>
            </div>

            <span v-if="selectedCountry.phone1" class="contact-detail" style="display: flex; align-items: center; gap: 10px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                </path>
              </svg>
              <a :href="'tel:' + selectedCountry.phone1" class="contact-link">
                {{ selectedCountry.phone1 }}
              </a>
            </span>
            <span  v-if="selectedCountry.phone2" class="contact-detail" style="display: flex; align-items: center; gap: 10px">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                </path>
              </svg>
              <a :href="'tel:' + selectedCountry.phone2" class="contact-link">
                {{ selectedCountry.phone2 }}
              </a>
            </span>
            <span class="contact-detail" style="display: flex; align-items: center; gap: 10px">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
              <a :href="'mailto:' + currentEmail" class="contact-link">
                {{ currentEmail }}
              </a>
            </span>



            <!-- <span class="contact-detail" style="display: flex; align-items: center; gap: 10px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <span style="font-size: 16px;">{{ selectedCountry.location }}</span>
            </span> -->
          </div>
        </div>

        <!-- Display all countries if no country is selected -->
        <template v-else-if="$page.props.countries && $page.props.countries.length">

          <div v-for="country in $page.props.countries" :key="country.id" class="country-contact">
            <div class="contact-item">
              <img :src="country?.media?.length > 0 ? country?.media[0].original_url : ''" height="20" width="30"
                class="ps-0" :alt="`${country.name} Flag`" />
              <span class="country-name">
                <strong>{{ country.name }}</strong>
              </span>



              <span v-if="country.phone1" class="contact-detail">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                  </path>
                </svg>
                <a :href="'tel:' + country.phone1" class="contact-link">{{ country.phone1 }}</a>
              </span>



              <span v-if="country.phone2" class="contact-detail">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1">
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                  </path>
                </svg>
                <span>{{ country.phone2 }}</span>
              </span>


            </div>
          </div>

        </template>
      </div>
    </div>

    <div class="footer-links">
      <nav>
        <ul class="footer-nav">
          <Link :href="route('index')">Home</Link>
          <Link :href="route('about')">About us</Link>
          <Link :href="route('how.to.order')">How To Order</Link>
          <Link :href="route('available')">Find a car</Link>
          <Link :href="route('contact')">Contact</Link>
          <!-- <Link :href="route('live.auction')">Live Auction</Link> -->

        </ul>
      </nav>
    </div>

    <div class="footer-bottom">
      <div class="copyright">KODITHUWAKKU AUTO @2025 All Rights Reserved</div>
      <!-- <div class="credits">Web Design & Development By Weblook</div> -->
    </div>
  </footer>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  components: {
    Link
  },
  props: {
    countries: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      selectedCountry: null,
      defaultEmail: 'info@kodithuwakkuauto.com'
    };
  },
  computed: {
    currentEmail() {
      return this.selectedCountry && this.selectedCountry.email
        ? this.selectedCountry.email
        : this.defaultEmail;
    }
  },
  mounted() {
    const storedCountry = localStorage.getItem('selectedCountry');
    if (storedCountry) {
      this.selectedCountry = JSON.parse(storedCountry);
      console.log('Selected Country from localStorage in Footer:', this.selectedCountry);
    }
  }
};
</script>

<style scoped>
.footer-container {
  position: relative;
  color: #fff;
  padding: 3rem 1rem;
}

.footer-container::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-image: url(/public/images/Assets/footer-bg-image.png);
  background-size: cover;
  background-position: center;
  z-index: 0;
}

/* Mobile first */
.country-contacts {
  min-width: 300px;
}

/* Tablet: from ~768px up */
@media screen and (min-width: 768px) {
  .country-contacts {
    min-width: 500px;
  }
}

/* Desktop: from ~1200px up */
@media screen and (min-width: 1200px) {
  .country-contacts {
    min-width: 650px;
  }
}

.contact-title {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 1.5rem;
  color: #fff;
}

.country-contact {
  margin-bottom: 0.5rem;
  padding: 0.8rem;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  margin-bottom: 0.5rem;
  font-size: 1rem;
}

.country-name {
  flex: 0 0 150px;
}

.contact-detail {
  display: flex;
  align-items: center;
  flex: 1;
}

.contact-detail svg {
  margin-right: 0.5rem;
  flex-shrink: 0;
}

.contact-link {
  color: #fff;
  text-decoration: none;
}

.contact-link:hover {
  text-decoration: underline;
}


@media (max-width: 888px) {
  .footer-content {
    flex-direction: column;
    align-items: center;
  }

  .footer-left,
  .country-contacts {
    width: 100%;
  }

  .contact-title {
    text-align: center;
  }

  .contact-item {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.5rem;
  }

  .country-name {
    flex: none;
  }



}
</style>
