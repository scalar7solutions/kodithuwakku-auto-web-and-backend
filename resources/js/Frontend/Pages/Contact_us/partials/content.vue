<template>
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
    </div>
  </div>

  <section class="contact-form2">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
          <form @submit.prevent="submitForm" class="">
            <div class="mb-3">
              <label class="form-label">NAME</label>
              <input v-model="form.name" type="text" class="form-control" placeholder="Your name" />
              <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
            </div>
            <div class="row">
              <div class="col-md-6 col-12 mb-3">
                <label class="form-label">EMAIL</label>
                <input v-model="form.email" type="email" class="form-control" placeholder="email@domain.com" />
                <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
              </div>
              <div class="col-md-6 col-12 mb-3">
                <label class="form-label">PHONE</label>
                <input v-model="form.phone" type="tel" class="form-control" placeholder="Phone number" />
                <div v-if="errors.phone" class="text-danger">{{ errors.phone }}</div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">ENQUIRY</label>
              <textarea v-model="form.enquiry" class="form-control" rows="4" placeholder="Your enquiry"></textarea>
              <div v-if="errors.enquiry" class="text-danger">{{ errors.enquiry }}</div>
            </div>
            <div class="d-flex justify-content-start">
              <button type="submit" class="btn btn-send" :disabled="loading">
                <span v-if="loading">
                  <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                  Sending....
                </span>
                <span v-else>Send</span>
              </button>
            </div>
          </form>
        </div>
        
        <div class="col-lg-6 col-md-12">
          <div class="join-section">
            <h2 class="join-heading text-lg-start text-center mb-4">
              <span v-if="selectedCountry">JPNAUTO.COM - {{ selectedCountry.name }}</span>
              <span v-else>Our Locations</span>
            </h2>
            
            <div v-if="selectedCountry" class="country-contact">
              <div class="contact-item" style="display: flex; flex-direction: column; gap: 25px;">
                <div class="country-header">
                  <img :src="selectedCountry?.media?.length > 0 ? selectedCountry?.media[0].original_url : ''" 
                    height="20" width="30" :alt="`${selectedCountry.name} Flag`" />
                  <span class="country-name"><strong>{{ selectedCountry.name }}</strong></span>
                </div>
               <span v-if="selectedCountry.phone1" class="contact-detail">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                  </svg>
                  <a :href="'tel:' + selectedCountry.phone1" class="contact-link">{{ selectedCountry.phone1 }}</a>
                </span>
                <span v-if="selectedCountry.phone2" class="contact-detail">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                  </svg>
                  <a :href="'tel:' + selectedCountry.phone2" class="contact-link">{{ selectedCountry.phone2 }}</a>
                </span>
                <span class="contact-detail">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                  </svg>
                  <a :href="'mailto:' + currentEmail" class="contact-link">{{ currentEmail }}</a>
                </span>
                <span class="contact-detail">
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                  </svg> -->
                  <!-- <span>{{ selectedCountry.location }}</span> -->
                </span>
              </div>
            </div>
            
            <template v-else-if="$page.props.countries && $page.props.countries.length">
              <div class="countries-grid">
                <div v-for="country in $page.props.countries" :key="country.id" class="country-contact">
                  <div class="contact-item" style="display: flex; flex-direction: column; gap: 25px;">

                    <div class="country-header">
                      <img :src="country?.media?.length > 0 ? country?.media[0].original_url : ''" 
                        height="20" width="30" :alt="`${country.name} Flag`" />
                      <span class="country-name"><strong>{{ country.name }}</strong></span>
                    </div>
                    <span class="contact-detail">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                      </svg>
                      <a :href="'tel:' + country.phone1" class="contact-link">{{ country.phone1 }}</a>
                    </span>
                    <span class="contact-detail">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                      </svg>
                      <span>{{ country.phone2 }}</span>
                    </span>
                  </div>
                </div>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import AppLayout from "@@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";

export default {
  components: {
    AppLayout
  },
  props: {
    countries: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        phone: "",
        enquiry: ""
      },
      errors: {},
      successMessage: null,
      loading: false,
      selectedCountry: null,
      defaultPhone: '+81 50-5050-8555',
      defaultEmail: 'info@jpnauto.com',
      defaultLocation: 'YOKOHAMA, Office Shin-Yokohama Ekimae, Yokohama, Kanagawa, Japan'
    };
  },
  computed: {
    currentCountry() {
      return this.selectedCountry && this.selectedCountry.name
        ? this.selectedCountry.name
        : 'Our Locations';
    },
    currentPhone() {
      return this.selectedCountry && this.selectedCountry.phone1
        ? this.selectedCountry.phone1
        : this.defaultPhone;
    },
    currentEmail() {
      return this.selectedCountry && this.selectedCountry.email
        ? this.selectedCountry.email
        : this.defaultEmail;
    },
    currentLocation() {
      return this.selectedCountry && this.selectedCountry.location
        ? this.selectedCountry.location
        : this.defaultLocation;
    }
  },
  mounted() {
    if (this.$page.props.flash.success) {
      this.successMessage = this.$page.props.flash.success;
    }

    const storedCountry = localStorage.getItem('selectedCountry');
    if (storedCountry) {
      this.selectedCountry = JSON.parse(storedCountry);
      console.log('Selected Country from localStorage:', this.selectedCountry);
    }
  },
  methods: {
    submitForm() {
      this.loading = true;

      Inertia.post(this.route("contacts.store"), this.form, {
        onError: errors => {
          this.errors = errors;
          this.loading = false;
        },
        onSuccess: () => {
          this.form.name = "";
          this.form.email = "";
          this.form.phone = "";
          this.form.enquiry = "";

          this.errors = {};
          this.loading = false;

          Swal.fire({
            toast: true,
            position: "top-end",
            icon: "success",
            title: "Success!",
            text: "Thank you for contacting us. We will get back to you soon.",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          });
        }
      });
    }
  }
};
</script>

<style>
.contact-form2 {
  padding: 60px 0;
  background-color: #f8f9fa;
}

.form-control {
  background-color: #F7F7F7;
  border: 1px solid #9EA3B9;
  border-radius: 0;
  padding: 0.75rem;
  width: 100%;
}

.form-label {
  color: var(--dark-blue);
  margin-bottom: 0.5rem;
  display: block;
}

.btn-send {
  background: linear-gradient(45deg, #ece8e8, #b3acac);
  color: rgb(0, 0, 0);
  border: none;
  padding: 0.75rem 2rem;
  border-radius: 0.25rem;
  transition: background 0.3s ease;
  min-width: 150px;
}

.btn-send:hover {
  background: linear-gradient(45deg, #afa9a9, #f3efef);
}


.join-heading {
  font-size: 32px;
  font-weight: 700;
  color: black;
}

.countries-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
}

.country-contact {
  margin-bottom: 20px;
}

.country-header {
  display: flex;
  align-items: center;
  gap: 10px;
}

.country-name {
  font-size: 22px;
}

.contact-detail {
  display: flex;
  align-items: center;
  gap: 10px;
}

.contact-detail svg {
  flex-shrink: 0;
}

.contact-link {
  color: #333;
  text-decoration: none;
}

.contact-link:hover {
  text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 991px) {
  .contact-form2 {
    padding: 40px 0;
  }
  
  .form-wrapper {
    padding: 15px;
  }
  
  .join-heading {
    font-size: 28px;
  }
}

@media (max-width: 767px) {
  .join-heading {
    font-size: 24px;
  }
  
  .countries-grid {
    grid-template-columns: 1fr;
  }
  
  .form-control {
    margin-bottom: 1rem;
  }
}

@media (max-width: 575px) {
  .contact-form2 {
    padding: 30px 0;
  }
  
  .join-section {
    padding: 15px 0;
  }
  
  .country-name {
    font-size: 20px;
  }
}
@media (max-width: 768px) {
  .country-name {
    display: inline-block !important; 
    /* font-size: 14px !important;  */
    visibility: visible !important; 
  }
}

</style>