<template>
  <header class="site-header">

    <div class="top-bar">
      <div class="top-bar-container">
        <nav class="countries-list">
          <template v-if="$page.props.countries && $page.props.countries.length">
            <Link v-for="country in $page.props.countries" :key="country.id"
              :href="route('available', { countrySlug: country.name.toLowerCase().replace(/\s+/g, '-') })"
              preserve-state preserve-scroll style="font-size: 15px;" @click="selectCountry(country)"
              :class="{ 'active': selectedCountry && selectedCountry.id === country.id }">
            <img :src="country?.media?.length > 0 ? country?.media[0].original_url : ''" height="50" width="50"
              class="ps-0" :alt="`${country.name} Flag`" />
            <span>{{ country.name }}</span>
            </Link>

          </template>
          <span v-else>No countries available</span>
        </nav>


        <div class="contact-info d-none d-md-flex">
          <!-- <div class="d-flex align-items ms-6 gap-4">
            <div v-if="$page.props.logged_customer">
              <Link class="nav-link fw-bold" :href="route('profile')">
              <i class="fa-solid fa-user me-1"></i> MY ACCOUNT
              </Link>
            </div>
            <div v-else class="d-flex align-items-center gap-2">
              <li class="nav-item list-unstyled m-0">
                <Link class="nav-link" :href="route('user.login')">LOGIN</Link>
              </li>
              <li class="nav-item list-unstyled m-0">
                <Link class="nav-link" :href="route('register')">REGISTER</Link>
              </li>
            </div>
          </div> -->
          <a style="font-size: 15px;" :href="'tel:' + currentPhone">
            <svg class="phone-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.92V19a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.47 19.47 0 0 1-6-6A19.86 19.86 0 0 1 2 4.18 2 2 0 0 1 4 2h2.08a2 2 0 0 1 2 1.72 13.47 13.47 0 0 0 .7 2.82 2 2 0 0 1-.45 2.11L7.1 10.1a16 16 0 0 0 6 6l1.46-1.46a2 2 0 0 1 2.11-.45 13.47 13.47 0 0 0 2.82.7 2 2 0 0 1 1.71 2.03z">
              </path>
            </svg>
            {{ currentPhone }}
          </a>
          <a style="font-size: 15px;" :href="'mailto:' + currentEmail">
            <svg class="email-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="4" width="20" height="16" rx="2" ry="2"></rect>
              <path d="M22 6l-10 7L2 6"></path>
            </svg>
            {{ currentEmail }}
          </a>
        </div>
      </div>
    </div>

    <div class="main-header">


      <div class="user-dropdown mobile-only">
        <button class="user-btn" @click="toggleUserMenu" aria-label="User menu">
          <i class="fa-solid fa-user"></i>
        </button>
        <div v-if="isUserMenuOpen" class="user-menu">
          <ul>
            <li v-if="!$page.props.logged_customer">
              <Link :href="route('user.login')">Login</Link>
            </li>
            <li v-if="!$page.props.logged_customer">
              <Link :href="route('register')">Register</Link>
            </li>
            <li v-if="$page.props.logged_customer">
              <Link :href="route('profile')">My Account</Link>
            </li>
            <li v-if="$page.props.logged_customer">
              <Link :href="route('logout')" method="post" as="button">Logout</Link>
            </li>
          </ul>
        </div>
      </div>


      <div class="header-container">
        <!-- Hamburger stays where it is -->
        <button class="hamburger" @click="toggleMenu">

          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>

        <nav class="main-nav" :class="{ 'active': isMenuOpen }">
          <button class="close-btn" @click="toggleMenu" aria-label="Close menu">
            <i class="fa-solid fa-times"></i>
          </button>
          <!-- Logo in the exact center of the nav -->
          <Link :href="route('index')" class="logo">
            <img src="https://jpnauto.com/images/Assets/1000423913%20(1)1.webp" alt="Kobe Auto" />
          </Link>
          <div class="nav-links">
            <Link @click="refreshLayout" :href="route('index')"       :class="{ active: route().current('index') }">Home</Link>
            <Link @click="refreshLayout" :href="route('available')"   :class="{ active: route().current('available') }">Find Car</Link>
            <!-- <Link @click="refreshLayout" :href="route('live.auction')" :class="{ active: route().current('live.auction') }">Live Auction</Link> -->
            <Link @click="refreshLayout" :href="route('how.to.order')" :class="{ active: route().current('how.to.order') }">How To Order</Link>
            <Link @click="refreshLayout" :href="route('about')"        :class="{ active: route().current('about') }">About Us</Link>
            <Link @click="refreshLayout" :href="route('contact')"      :class="{ active: route().current('contact') }">Contact</Link>

          </div>

            <div class="header-actions d-md-none">
              <div class="d-flex d-md-none flex-column gap-3">
                <!-- account links -->
                <!-- <div class="d-flex align-items ms-6 gap-4">
                <div v-if="$page.props.logged_customer">
                  <Link class="nav-link fw-bold" :href="route('profile')">
                    <i class="fa-solid fa-user me-1"></i> MY ACCOUNT
                  </Link>
                </div>
                <div v-else class="d-flex align-items-center gap-2">
                  <li class="nav-item list-unstyled m-0">
                    <Link class="nav-link" :href="route('user.login')">LOGIN</Link>
                  </li>
                  <li class="nav-item list-unstyled m-0">
                    <Link class="nav-link" :href="route('register')">REGISTER</Link>
                  </li>
                </div>
              </div> -->

                <!-- phone -->
                <a style="font-size: 15px;" :href="'tel:' + currentPhone">
                  <svg class="phone-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                      d="M22 16.92V19a2 2 0 0 1-2.18 2 19.86 19.86 0 0 1-8.63-3.07 19.47 19.47 0 0 1-6-6A19.86 19.86 0 0 1 2 4.18 2 2 0 0 1 4 2h2.08a2 2 0 0 1 2 1.72 13.47 13.47 0 0 0 .7 2.82 2 2 0 0 1-.45 2.11L7.1 10.1a16 16 0 0 0 6 6l1.46-1.46a2 2 0 0 1 2.11-.45 13.47 13.47 0 0 0 2.82.7 2 2 0 0 1 1.71 2.03z">
                    </path>
                  </svg>
                  {{ currentPhone }}
                </a>

                <!-- email -->
                <a style="font-size: 15px;" :href="'mailto:' + currentEmail">
                  <svg class="email-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="2" ry="2"></rect>
                    <path d="M22 6l-10 7L2 6"></path>
                  </svg>
                  {{ currentEmail }}
                </a>
              </div>
            </div>

        </nav>



      </div>
    </div>



  </header>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { eventBus } from "./eventBus";

export default {
  components: {
    Link
  },
  data() {
    return {
      isMenuOpen: false,
      selectedCountry: null,
      isUserMenuOpen: false,
      defaultPhone: '+81 (3) 451 05 386',
      defaultEmail: 'info@jpnauto.com'
    };
  },
  computed: {
    currentPhone() {
      return this.selectedCountry && this.selectedCountry.phone1
        ? this.selectedCountry.phone1
        : this.defaultPhone;
    },
    currentEmail() {
      return this.selectedCountry && this.selectedCountry.email
        ? this.selectedCountry.email
        : this.defaultEmail;
    }
  },
  methods: {
    refreshLayout() {
      // console.log("Emitting refreshAppLayout event from Header.vue");
      this.refreshKey++;
      eventBus.emit("refreshAppLayout");
    },
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    selectCountry(country) {
      this.selectedCountry = country;
      eventBus.emit("refreshAppLayout");
      localStorage.setItem('selectedCountry', JSON.stringify(country));
    },
    toggleUserMenu() {            // ← new
      this.isUserMenuOpen = !this.isUserMenuOpen;
    },
  },
  mounted() {
    // console.log('Countries in Header:', this.$page.props.countries);
    const storedCountry = localStorage.getItem('selectedCountry');
    if (storedCountry) {
      this.selectedCountry = JSON.parse(storedCountry);
    }
  },

};
</script>

<style>
/* Existing Styles */
.main-nav {
  flex-wrap: nowrap;
  align-items: center;
  width: 100%;

  /* space between group-left, logo, group-right */
}

.nav-group {
  flex: 1;
  /* each group now takes an equal share */
  display: flex;
  gap: 2rem;
  /* same spacing as your existing links */
}

.nav-group.left {
  justify-content: flex-end;
}

/* hugs the logo on the left */
.nav-group.right {
  justify-content: flex-start;
}

/* hugs the logo on the right */

.logo {
  flex: 0 0 auto;
  /* don't grow or shrink */
  /* margin: 0 2rem; */
  /* you can tweak this to taste */
}


.logo img {
  height: auto;
  /* preserves original sizing */
  max-height: 60px;
  /* or whatever height you prefer */
}

.countries-list {
  display: flex;
  gap: 1rem;
}

.countries-list a {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  text-decoration: none;
  color: #333;
}

.countries-list a.active {
  font-weight: bold;
  color: #333;
}

.countries-list img {
  width: 24px;
  height: 24px;
}

.contact-info {
  display: flex;
  gap: 1.5rem;
}

.contact-info a {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  text-decoration: none;
  color: #333;
}

.main-nav {
  display: flex;
  gap: 2rem;
}

.main-nav a {
  font-size: 20px;
  /* padding: 0 1rem; */
  text-decoration: none;
  color: #333;
}

/* Mobile View */
@media (max-width: 768px) {
  .countries-list a {
    display: flex;
    align-items: center;
  }

  .countries-list a span {
    display: none;
  }

  .countries-list img {
    width: 32px;
    height: 32px;
  }

  /* .main-nav {
    position: fixed;
    top: 0;
    right: -100%;
    width: 250px;
    height: 100%;
    background-color: #fff;
    flex-direction: column;
    padding: 2rem;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
    transition: right 0.3s ease-in-out;
    z-index: 1000;
    gap: 1.5rem;
  } */

  .main-nav.active {
    right: 0;
  }

  /* .main-nav a {
    font-size: 18px;
    padding: 1rem 0;
    width: 100%;
    text-align: left;
  } */

  /* .contact-info {
    flex-direction: column;
    gap: 0.5rem;
  } */
}

.main-header {
  position: relative;
}

.hamburger {
  display: none;
  flex-direction: column;
  justify-content: space-between;
  width: 30px;
  height: 20px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 0;
  position: absolute;
  top: 50%;
  right: 1rem;
  transform: translateY(-50%);
}

.bar {
  width: 100%;
  height: 3px;
  background-color: #333;
  transition: all 0.3s ease;
}

/* Mobile View */
@media (max-width: 768px) {
  .hamburger {
    display: flex;
  }
}

/* Tablet View */
@media (max-width: 1024px) {
  .main-nav {
    gap: 1rem;
  }

  .main-nav a {
    font-size: 18px;
  }

  .contact-info {
    gap: 1rem;
  }
}

/* Mobile View */
@media (max-width: 768px) {
  .top-bar-container {
    flex-direction: column;
    gap: 1rem;
    padding: 0.5rem 1rem;
  }



  .hamburger {
    display: flex;
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
  }

  .main-nav {
    position: fixed;
    top: 0;
    right: -100%;
    width: 250px;
    height: 100vh;
    background: #fff;
    flex-direction: column;
    padding: 4rem 2rem 2rem;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
    z-index: 1000;
  }

  .main-nav.active {
    right: 0;
  }

  .main-nav a {
    font-size: 17px !important;
    padding: 1rem 0;
    width: 100%;
    display: block;
  }

  .logo-img {
    max-width: 120px;
  }
}

/* Small Mobile View */
@media (max-width: 480px) {
  .countries-list {
    justify-content: center;
  }

  .country-name {
    display: none;
  }

  .country-flag {
    width: 32px;
    height: 32px;
  }

  .contact-text {
    font-size: 14px;
  }

  .logo-img {
    max-width: 100px;
  }
}




@media (max-width: 768px) {
  /* —— strictly mobile-only overrides —— */

  .main-nav a {
    font-size: 17px !important;
    padding: 1rem 0;
    width: 100%;
    display: block;
    margin-bottom: 1.5rem;
  }

  .main-nav {
    position: fixed;
    top: 0;
    right: 0;
    /* keep it anchored to the right edge */
    width: 250px;
    height: 100vh;
    background: #fff;
    flex-direction: column;
    padding: 4rem 2rem 2rem;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
    z-index: 1000;

    /* NEW: start fully off-screen to the right */
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
  }

  .main-nav .logo {
    order: 0;
    /* logo goes first */
    align-self: center;
    /* center it in the panel */
    margin-bottom: 1.5rem;
    /* space below */
  }

  .main-nav .nav-group {
    order: 1;
    /* groups come after logo */
    width: 100%;
    /* full width */
    display: flex;
    flex-direction: column;
    /* stack each <Link> */
    gap: 1rem;
    /* spacing between links */
  }

  /* if you ever put anything in header-actions, this will come last */
  .main-nav .header-actions {
    order: 2;
    width: 100%;
  }

  .main-nav.active {
    transform: translateX(0);
  }



}


/* Tablet / small-desktop */
@media (max-width: 1200px) {
  .main-nav {
    gap: 1.5rem;
    /* tighten the space between groups */
  }

  .main-nav a {
    font-size: 18px;
    /* shrink the text */
    padding: 0 0.75rem;
    /* tighten the padding */
  }
}

/* Small-tablet / large-phone */
@media (max-width: 992px) {
  .main-nav {
    gap: 1rem;
  }

  .main-nav a {
    font-size: 16px;
    padding: 0 0.5rem;
  }
}

/* never break link labels */
.main-nav a {
  white-space: nowrap;
}

@media (max-width: 900px) {
  .main-nav {
    gap: 0.5rem;
  }

  .main-nav a {
    font-size: 14px;
    padding: 0 0.25rem;
  }
}


/* inside @media (max-width: 768px) { … } */

.main-nav .close-btn {
  position: absolute;
  top: 1rem;
  left: 1rem;
  /* move it to the left edge */
  background: none;
  border: none;
  font-size: 1.5rem;
  line-height: 1;
  cursor: pointer;
  color: #333;
  z-index: 1100;
}

/* Optionally hide it on desktop */
@media (min-width: 769px) {
  .main-nav .close-btn {
    display: none;
  }
}


/* default (desktop) */
.contact-info.desktop-only {
  display: flex !important;
}

.mobile-only {
  display: none !important;
}

@media (max-width: 768px) {

  /* hide the top-bar copy */
  .contact-info.desktop-only {
    display: none !important;
  }

  /* show the hamburger menu copy */
  .mobile-only {
    display: flex !important;
    flex-direction: column;
    gap: 1rem;
    margin-top: 2rem;
  }
}





/* user icon button */
.user-btn {
  background: none;
  border: none;
  position: absolute;
  left: 1rem;
  /* adjust as needed */
  top: 50%;
  transform: translateY(-50%);
  font-size: 1.25rem;
  color: #333;
  cursor: pointer;
  z-index: 1200;
}

/* the dropdown list */
.user-menu {
  position: absolute;
  left: 1rem;
  /* line up with the button */
  top: calc(50% + 1.5rem);
  background: #fff;
  padding: 0.5rem 0 !important;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  border-radius: 4px;
}

.user-menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.user-menu li+li {
  margin-top: 0.25rem !important;
  /* tighter gap between items */
}

.user-menu a {
  display: block;
  padding: 0.4rem 1rem;
  text-decoration: none;
  color: #333;
  font-size: 0.9rem;
}



.user-menu a:hover {
  background: #f5f5f5;
}

/* make sure it only shows up on mobile */
@media (min-width: 769px) {
  .user-menu {
    display: none !important;
  }
}


@media (max-width: 768px) {

  /* 1) Shrink & space out only the slide-out nav links */
  .main-nav .nav-group a {
    font-size: 1rem !important;
    padding: 0.4rem 0 !important;
    margin-bottom: 0.75rem;
  }

  /* 2) Stop phone/email from ever looking “active” */
  .main-nav .header-actions a.active {

    color: inherit !important;
    background: none !important;
    font-weight: normal !important;
    box-shadow: none !important;
    text-decoration: none !important;
  }

  /* 3) Make the slide-out a column flex (mobile only) */
  .main-nav {
    display: flex;
    flex-direction: column;
  }

  .main-nav .nav-group {
    flex: 0 0 auto;
  }

  /* 4) Push contact/email to the bottom, with a gap + divider */
  .main-nav .header-actions {
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid #ddd;
  }

  .main-nav .header-actions a {
    font-size: 0.85rem !important;
    padding: 0.5rem 0 !important;
    display: block;

  }

  /* Never underline or highlight phone/email links in the hamburger menu */
  /* kill any active styling on phone/email in the slide-out */
  nav.main-nav .header-actions a[href^="tel"],
  nav.main-nav .header-actions a[href^="mailto"],
  nav.main-nav .header-actions a[href^="tel"].active,
  nav.main-nav .header-actions a[href^="mailto"].active,
  nav.main-nav .header-actions a[href^="tel"]:hover,
  nav.main-nav .header-actions a[href^="mailto"]:hover {
    border-bottom: none !important;
    text-decoration: none !important;
    box-shadow: none !important;
  }

  /* also if there’s an underline via a pseudo-element */
  nav.main-nav .header-actions a[href^="tel"]::after,
  nav.main-nav .header-actions a[href^="mailto"]::after {
    display: none !important;
  }


  .main-nav {
    position: fixed !important;
    top: 46px;
    right: 0 !important;
    width: 250px !important;
    height: calc(100vh - 46px) !important;
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out !important;
    z-index: 1100 !important;
  }

  .main-nav.active {
    transform: translateX(0) !important;
  }

}


.nav-links {
  display: flex;
  gap: 2.3rem;
  margin-left: auto;
  align-items: center;
}

.header-container.container {
  padding-left: 3rem;
  padding-right: 3rem;
}

@media (max-width: 768px) {

  .main-nav .nav-links {
    order: 1;
    display: flex;
    flex-direction: column;
    width: 100%;
    margin: 0;
    gap: 1rem;
  }


  .main-nav .nav-links a {
    display: block;
    width: 100%;

    text-align: left;
  }


  .main-nav .header-actions {
    order: 2;
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid #ddd;
  }
}


.top-bar-container {
  display: flex;
  gap: 1rem;
  align-items: center;
  justify-content: space-between;

}


@media (max-width: 968px) {

  .top-bar-container {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.75rem;
  }


  .top-bar-container a,
  .top-bar-container span {
    font-size: 0.75rem;
  }


  .countries-list a span {
    display: none;
  }
  .countries-list img {
    width: 24px;
    height: 24px;
  }


  .contact-info {
    flex-wrap: wrap;
    gap: 0.5rem;
  }
  .contact-info a {
    padding: 0.25rem 0;
  }
  .contact-info svg {
    width: 14px;
    height: 14px;
  }


}
.main-nav a:not(.logo):hover {
    color: #2631c7 !important;
}
.main-nav a.active {
    color: #2631c7!important;
}
.main-nav a::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #2631c7!important;
    transform: scaleX(0);
    transition: transform 0.3s
ease;
}


</style>
