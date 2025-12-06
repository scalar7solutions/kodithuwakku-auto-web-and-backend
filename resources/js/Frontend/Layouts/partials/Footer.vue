<template>
  <footer class="footer-container">
    <!-- Marquee -->
    <div class="footer-marquee">
      <div class="marquee-track">
        <span class="marquee-text">
          KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM •
          KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM •
          KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM  • KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM •
          KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM •
          KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM
           • KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM •
          KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM •
          KODITHUWAKKU AUTO.COM • KODITHUWAKKU AUTO.COM

        </span>
      </div>
    </div>

    <div class="footer-inner">
      <!-- Main content -->
      <div class="footer-content">
        <!-- Left: Connect -->
        <div class="footer-left">
          <h2 class="footer-title">
            LET'S <span>CONNECT</span>
          </h2>
          <p class="footer-description">
            Join the millions who value their car with Auto Trader. It's completely free and within
            seconds we will give you a live valuation.
          </p>

          <a :href="'mailto:' + currentEmail">
            <button class="email-button">
              SEND AN EMAIL
            </button>
          </a>

          <div class="social-icons">
            <a
              href="https://www.facebook.com/share/1Aas6U2gJy/?mibextid=wwXIfr"
              target="_blank"
              rel="noopener noreferrer"
              class="social-icon"
              aria-label="Facebook"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                ></path>
              </svg>
            </a>

            <a href="#" class="social-icon" aria-label="Youtube">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"
                ></path>
                <path d="m10 15 5-3-5-3z"></path>
              </svg>
            </a>

            <a href="#" class="social-icon" aria-label="Instagram">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
              </svg>
            </a>
          </div>
        </div>

        <!-- Right: Contact info -->
        <div class="footer-right">
          <h3 class="contact-title">KodithuwakkuAuto.com</h3>

          <div class="contact-list">
            <div class="contact-row">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon-primary"
              >
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                ></path>
              </svg>
              <a href="tel:+94771234567" class="contact-link">
                +94 77 123 4567
              </a>
            </div>

            <div class="contact-row">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon-primary"
              >
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                ></path>
              </svg>
              <a href="tel:+94771234568" class="contact-link">
                +94 77 123 4568
              </a>
            </div>

            <div class="contact-row">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon-primary"
              >
                <rect x="2" y="4" width="20" height="16" rx="2" ry="2"></rect>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
              <a :href="'mailto:' + currentEmail" class="contact-link">
                {{ currentEmail }}
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation links -->
      <div class="footer-links">
        <nav>
          <ul class="footer-nav">
            <li>
              <Link :href="route('index')" class="footer-nav-link">Home</Link>
            </li>
            <li>
              <Link :href="route('about')" class="footer-nav-link">About us</Link>
            </li>
            <li>
              <Link :href="route('how.to.order')" class="footer-nav-link">How To Order</Link>
            </li>
            <li>
              <Link :href="route('available')" class="footer-nav-link">Find a car</Link>
            </li>
            <li>
              <Link :href="route('contact')" class="footer-nav-link">Contact</Link>
            </li>
          </ul>
        </nav>
      </div>

      <!-- Bottom area -->
      <div class="footer-bottom">
        <p class="footer-bottom-text">
          Kodithuwakku Auto ©2025 All Rights Reserved
        </p>
        <p class="footer-bottom-text">
          Web Design &amp; Development By Scalar7 Solutions
        </p>
      </div>
    </div>
  </footer>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'Footer',
  components: {
    Link
  },
  props: {
    countries: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      currentEmail: 'info@kodithuwakkuauto.com'
    };
  }
};
</script>

<style scoped>
.footer-container {
  position: relative;
  color: #e5ecff;
  background-color: #111827; /* dark overlay under the image */
  overflow: hidden;
}

/* background image from existing design */
.footer-container::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url('/public/images/Assets/footer-bg-image.png');
  background-size: cover;
  background-position: center;
  opacity: 0.9;
  z-index: 0;
}

.footer-inner,
.footer-marquee {
  position: relative;
  z-index: 1;
}

/* marquee */
.footer-marquee {
  background: rgba(59, 130, 246, 0.18);
  padding: 0.5rem 0;
  overflow: hidden;
}

.marquee-track {
  display: inline-block;
  white-space: nowrap;
  animation: footer-marquee 25s linear infinite;
}

.marquee-text {
  font-size: 1rem;
  font-weight: 600;
  letter-spacing: 0.18em;
}

@keyframes footer-marquee {
  0% {
    transform: translateX(0%);
  }
  100% {
    transform: translateX(-50%);
  }
}

/* layout */
.footer-inner {
  position: relative;
  z-index: 1;
  width: 100%;          /* full width */
  max-width: 100%;      /* remove container effect */
  margin: 0;            /* no auto-centering container */
  padding: 3rem 3rem 2.5rem; /* keep some breathing room on sides */
}
.footer-content {
  display: flex;
  flex-direction: column;
  gap: 2.5rem;
}

.footer-left {
  text-align: center;
}

.footer-title {
  font-size: 2.25rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.footer-title span {
  color: #3b82f6;
}

.footer-description {
  max-width: 28rem;
  margin: 0 auto 1.5rem;
  font-size: 1.05rem;
  line-height: 1.6;
  color: #cbd5f5;
}

.email-button {
  background-color: #3b82f6;
  color: #f9fafb;
  font-weight: 600;
  padding: 0.75rem 1.75rem;
  border-radius: 0.5rem;
  border: none;
  cursor: pointer;
  margin-bottom: 2rem;
  transition: background-color 0.2s ease, transform 0.1s ease;
}

.email-button:hover {
  background-color: #2563eb;
  transform: translateY(-1px);
}

/* social icons */
.social-icons {
  display: flex;
  justify-content: center;
  gap: 1rem;
}

.social-icon {
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 999px;
  border: 1px solid rgba(148, 163, 184, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #e5ecff;
  text-decoration: none;
  transition: background-color 0.2s ease, border-color 0.2s ease;
}

.social-icon:hover {
  background-color: rgba(59, 130, 246, 0.2);
  border-color: rgba(59, 130, 246, 0.7);
}

/* right side */
.footer-right {
  text-align: center;
}

.contact-title {
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 1.5rem;
}

.contact-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.contact-row {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.75rem;
  font-size: 1rem;
}

.icon-primary {
  color: #3b82f6;
  flex-shrink: 0;
}

.contact-link {
  color: #e5ecff;
  text-decoration: none;
  transition: color 0.2s ease;
}

.contact-link:hover {
  color: #3b82f6;
}

/* nav links */
.footer-links {
  border-top: 1px solid rgba(148, 163, 184, 0.35);
  margin-top: 2.5rem;
  padding-top: 1.75rem;
}

.footer-nav {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  gap: 1rem 2rem;
  justify-content: center;
  padding: 0;
  margin: 0;
}

.footer-nav-link {
  font-size: 0.95rem;
  color: #e5ecff;
  text-decoration: none;
  transition: color 0.2s ease;
}

.footer-nav-link:hover {
  color: #3b82f6;
}

/* bottom */
.footer-bottom {
  border-top: 1px solid rgba(148, 163, 184, 0.35);
  margin-top: 2rem;
  padding-top: 1.5rem;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  align-items: center;
  justify-content: space-between;
  font-size: 0.9rem;
  color: #a5b4fc;
}

@media (min-width: 768px) {
  .footer-title {
    font-size: 2.75rem;
  }
}

@media (min-width: 1024px) {
  .footer-content {
    flex-direction: row;
    align-items: flex-start;
    gap: 3.5rem;
  }

  .footer-left,
  .footer-right {
    width: 50%;
    text-align: left;
  }

  .footer-description {
    margin-left: 0;
  }

  .social-icons {
    justify-content: flex-start;
  }

  .footer-right {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .contact-list {
    align-items: flex-start;
  }

  .contact-row {
    justify-content: flex-start;
  }

  .footer-bottom {
    flex-direction: row;
  }
}
</style>
