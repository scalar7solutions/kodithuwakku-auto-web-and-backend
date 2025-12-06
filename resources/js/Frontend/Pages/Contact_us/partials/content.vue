<template>
  <section class="contact-section">
    <div class="container">
      <!-- Header -->
      <!-- <div class="contact-header animate-fade-in">
        <h1>Get in Touch</h1>
        <p>
          Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
        </p>
      </div> -->

      <div class="contact-grid">
        <!-- Form Section -->
        <div class="card-soft animate-slide-up" :style="{ animationDelay: '0.1s' }">
          <h2 class="card-title">Send us a Message</h2>

          <!-- Success banner -->
          <div v-if="successMessage" class="alert-success">
            {{ successMessage }}
          </div>

          <form class="contact-form" @submit.prevent="submitForm">
            <!-- Full Name -->
            <div class="form-field">
              <label for="name" class="contact-label">Full Name</label>
              <input
                id="name"
                type="text"
                v-model="form.name"
                class="contact-input"
                :class="{ 'input-error': errors.name }"
                placeholder="Enter your full name"
                @input="clearError('name')"
              />
              <p v-if="errors.name" class="field-error">{{ errors.name }}</p>
            </div>

            <!-- Email + Phone -->
            <div class="form-row">
              <div class="form-field">
                <label for="email" class="contact-label">Email Address</label>
                <input
                  id="email"
                  type="email"
                  v-model="form.email"
                  class="contact-input"
                  :class="{ 'input-error': errors.email }"
                  placeholder="email@example.com"
                  @input="clearError('email')"
                />
                <p v-if="errors.email" class="field-error">{{ errors.email }}</p>
              </div>

              <div class="form-field">
                <label for="phone" class="contact-label">Phone Number</label>
                <input
                  id="phone"
                  type="tel"
                  v-model="form.phone"
                  class="contact-input"
                  :class="{ 'input-error': errors.phone }"
                  placeholder="+94 77-000-0000"
                  @input="clearError('phone')"
                />
                <p v-if="errors.phone" class="field-error">{{ errors.phone }}</p>
              </div>
            </div>

            <!-- Message -->
            <div class="form-field">
              <label for="enquiry" class="contact-label">Your Message</label>
              <textarea
                id="enquiry"
                v-model="form.enquiry"
                class="contact-input contact-textarea"
                :class="{ 'input-error': errors.enquiry }"
                placeholder="How can we help you?"
                rows="5"
                @input="clearError('enquiry')"
              ></textarea>
              <p v-if="errors.enquiry" class="field-error">{{ errors.enquiry }}</p>
            </div>

            <!-- Submit Button -->
            <button
              type="submit"
              class="btn-primary"
              :disabled="loading"
            >
              <span v-if="loading" class="btn-content">
                <span class="loader-spinner" aria-hidden="true"></span>
                <span>Sending...</span>
              </span>
              <span v-else class="btn-content">
                <span class="btn-icon">
                  <!-- Send icon -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon-4"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <line x1="22" y1="2" x2="11" y2="13" />
                    <polygon points="22 2 15 22 11 13 2 9 22 2" />
                  </svg>
                </span>
                <span>Send Message</span>
              </span>
            </button>
          </form>
        </div>

        <!-- Contact Info Section -->
        <div class="animate-slide-up" :style="{ animationDelay: '0.2s' }">
          <div class="card-soft contact-info-card">
            <h2 class="card-title">{{ businessInfo.name }}</h2>

            <div class="info-list">
              <!-- Address -->
              <div class="info-row info-row-static">
                <div class="info-icon">
                  <!-- MapPin icon -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0Z" />
                    <circle cx="12" cy="10" r="3" />
                  </svg>
                </div>
                <div class="info-text">
                  <span class="info-label">Address</span>
                  <span class="info-value">
                    {{ businessInfo.address }}
                  </span>
                </div>
              </div>

              <!-- Phone 1 -->
              <a
                :href="'tel:' + businessInfo.phone1"
                class="info-row info-row-link"
              >
                <div class="info-icon">
                  <!-- Phone icon -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 
                      2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 
                      9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 
                      12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                    />
                  </svg>
                </div>
                <div class="info-text">
                  <span class="info-label">Phone</span>
                  <span class="info-value info-value-link">
                    {{ businessInfo.phone1 }}
                  </span>
                </div>
              </a>

              <!-- Phone 2 -->
              <a
                :href="'tel:' + businessInfo.phone2"
                class="info-row info-row-link"
              >
                <div class="info-icon">
                  <!-- Phone icon -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path
                      d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 
                      2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 
                      9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 
                      12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                    />
                  </svg>
                </div>
                <div class="info-text">
                  <span class="info-label">Alternate Phone</span>
                  <span class="info-value info-value-link">
                    {{ businessInfo.phone2 }}
                  </span>
                </div>
              </a>

              <!-- Email -->
              <a
                :href="'mailto:' + businessInfo.email"
                class="info-row info-row-link"
              >
                <div class="info-icon">
                  <!-- Mail icon -->
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <rect x="3" y="5" width="18" height="14" rx="2" ry="2" />
                    <polyline points="3 7 12 13 21 7" />
                  </svg>
                </div>
                <div class="info-text">
                  <span class="info-label">Email</span>
                  <span class="info-value info-value-link info-email">
                    {{ businessInfo.email }}
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Swal from "sweetalert2";
import emailjs from "@emailjs/browser";

export default {
  name: "ContactContent",
  props: {
    countries: {
      type: Array,
      required: false,
      default: () => [],
    },
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        phone: "",
        enquiry: "",
      },
      errors: {},
      loading: false,
      successMessage: "", // <— for inline success banner
      businessInfo: {
        name: "Ajith Auto Traders",
        address: "Morakatiya Road, Embilipitiya",
        phone1: "+94 77-123-4567",
        phone2: "+94 11-234-5678",
        email: "info@ajithautotraders.com",
      },
      // EmailJS config
      emailJs: {
        serviceId: import.meta.env.VITE_EMAILJS_SERVICE_ID || "service_abc123",
        templateId: import.meta.env.VITE_EMAILJS_TEMPLATE_ID || "template_def456",
        publicKey: import.meta.env.VITE_EMAILJS_PUBLIC_KEY || "your_public_key",
      },
    };
  },
  methods: {
    validateForm() {
      const newErrors = {};

      if (!this.form.name.trim()) {
        newErrors.name = "Name is required";
      }
      if (!this.form.email.trim()) {
        newErrors.email = "Email is required";
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email)) {
        newErrors.email = "Please enter a valid email";
      }
      if (!this.form.phone.trim()) {
        newErrors.phone = "Phone number is required";
      }
      if (!this.form.enquiry.trim()) {
        newErrors.enquiry = "Please enter your enquiry";
      }

      this.errors = newErrors;
      return Object.keys(newErrors).length === 0;
    },
    clearError(field) {
      if (this.errors[field]) {
        const updated = { ...this.errors };
        delete updated[field];
        this.errors = updated;
      }
      // clear success message when user edits again
      if (this.successMessage) {
        this.successMessage = "";
      }
    },

    async submitForm() {
  if (!this.validateForm()) {
    return;
  }

  this.loading = true;
  this.successMessage = "";

  const templateParams = {
    from_name: this.form.name,
    from_email: this.form.email,
    phone: this.form.phone,
    message: this.form.enquiry,
  };

  try {
    // ✅ FIXED: pass publicKey inside an options object
    await emailjs.send(
      this.emailJs.serviceId,
      this.emailJs.templateId,
      templateParams,
      {
        publicKey: this.emailJs.publicKey,
      }
    );

    // Reset form
    this.form = {
      name: "",
      email: "",
      phone: "",
      enquiry: "",
    };
    this.errors = {};
    this.loading = false;

    // Inline banner
    this.successMessage = "Inquiry sent successfully.";

    // SweetAlert toast
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      title: "Inquiry sent successfully.",
      text: "We will get back to you soon.",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });
  } catch (error) {
    console.error("EmailJS error:", error);
    this.loading = false;

    Swal.fire({
      icon: "error",
      title: "Message not sent",
      text: "Something went wrong while sending your message. Please try again.",
    });
  }
}

  },
};
</script>

<style scoped>
/* Basic theme tokens */
.contact-section {
  --background: #f5f7fb;              /* page background (very light) */
  --foreground: #020617;
  --muted-foreground: #6b7280;
  --primary: #2563eb;
  --primary-soft: rgba(37, 99, 235, 0.12);
  --secondary-soft: #f5f7fb;          /* light grey used for inputs/info rows */
  --card-bg: #ffffff;                 /* cards PURE WHITE */
  --border-subtle: rgba(148, 163, 184, 0.25);
  --error: #dc2626;

  min-height: 100vh;
  background-color: var(--background);
  padding: 3rem 0;
}

@media (min-width: 768px) {
  .contact-section {
    padding: 5rem 0;
  }
}

@media (min-width: 1024px) {
  .contact-section {
    padding: 6rem 0;
  }
}

/* Header */
.contact-header {
  text-align: center;
  max-width: 42rem;
  margin: 0 auto 3rem auto;
}

@media (min-width: 768px) {
  .contact-header {
    margin-bottom: 4rem;
  }
}

.contact-header h1 {
  font-size: 1.9rem;
  font-weight: 600;
  color: var(--foreground);
  margin-bottom: 0.75rem;
}

@media (min-width: 768px) {
  .contact-header h1 {
    font-size: 2.25rem;
  }
}

@media (min-width: 1024px) {
  .contact-header h1 {
    font-size: 2.6rem;
  }
}

.contact-header p {
  font-size: 0.98rem;
  line-height: 1.7;
  color: var(--muted-foreground);
}

@media (min-width: 768px) {
  .contact-header p {
    font-size: 1.05rem;
  }
}

/* Grid layout */
.contact-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 2rem;
  max-width: 72rem;
  margin: 0 auto;
}

@media (min-width: 992px) {
  .contact-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 3rem;
  }
}

/* CARDS – now pure white */
.card-soft {
  background-color: #ffffff !important; /* <— force white */
  border-radius: 1.25rem;
  padding: 1.75rem 1.5rem;
  border: 1px solid var(--border-subtle);
  box-shadow: 0 18px 45px rgba(15, 23, 42, 0.07);
}

@media (min-width: 768px) {
  .card-soft {
    padding: 2.25rem 2rem;
  }
}

.contact-info-card {
  height: 100%;
}

.card-title {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--foreground);
  margin-bottom: 1.5rem;
}

@media (min-width: 768px) {
  .card-title {
    font-size: 1.45rem;
  }
}

/* Success banner */
.alert-success {
  margin-bottom: 1rem;
  padding: 0.75rem 1rem;
  border-radius: 0.9rem;
  background-color: rgba(22, 163, 74, 0.08);
  border: 1px solid rgba(22, 163, 74, 0.4);
  color: #166534;
  font-size: 0.9rem;
}

/* Form */
.contact-form > * + * {
  margin-top: 1.25rem;
}

.form-field {
  width: 100%;
}

.form-row {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

@media (min-width: 576px) {
  .form-row {
    flex-direction: row;
  }

  .form-row .form-field {
    width: 100%;
  }
}

.contact-label {
  display: block;
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  color: #9ca3af;
  margin-bottom: 0.35rem;
}

/* INPUTS – light grey */
.contact-input {
  width: 100%;
  border-radius: 0.9rem;
  border: 1px solid #e5e7eb;
  padding: 0.75rem 1rem;
  background-color: #f5f7fb;   /* <— light grey here */
  font-size: 0.95rem;
  color: #111827;
  transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
}

.contact-input::placeholder {
  color: #9ca3af;
}

.contact-input:focus {
  outline: none;
  border-color: var(--primary);
  background-color: #ffffff;
  box-shadow: 0 0 0 1px rgba(37, 99, 235, 0.15);
}

.contact-input.input-error {
  border-color: var(--error);
}

.contact-textarea {
  resize: none;
  min-height: 9rem;
}

.field-error {
  margin-top: 0.35rem;
  font-size: 0.8rem;
  color: var(--error);
}

/* Button */
.btn-primary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  margin-top: 0.75rem;
  padding: 0.8rem 1.8rem;
  border-radius: 9999px;
  border: none;
  background-image: linear-gradient(135deg, #2563eb, #2752d8);
  color: #ffffff;
  font-size: 0.95rem;
  font-weight: 500;
  cursor: pointer;
  box-shadow: 0 12px 30px rgba(37, 99, 235, 0.4);
  transition: transform 0.15s ease, box-shadow 0.15s ease, opacity 0.15s ease;
}

.btn-primary:hover {
  transform: translateY(-1px);
  box-shadow: 0 16px 40px rgba(37, 99, 235, 0.5);
}

.btn-primary:disabled {
  opacity: 0.65;
  cursor: not-allowed;
  transform: none;
  box-shadow: none;
}

.btn-content {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
}

.btn-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

/* Loader spinner */
.loader-spinner {
  width: 1rem;
  height: 1rem;
  border-radius: 9999px;
  border: 2px solid rgba(255, 255, 255, 0.45);
  border-top-color: #ffffff;
  animation: spin 0.65s linear infinite;
}

/* Contact info panel – also light grey rows */
.info-list > * + * {
  margin-top: 1rem;
}

.info-row {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1rem;
  border-radius: 0.9rem;
}

.info-row-static {
  background-color: var(--secondary-soft);
}

.info-row-link {
  background-color: var(--secondary-soft);
  text-decoration: none;
  transition: background-color 0.15s ease, transform 0.1s ease;
}

.info-row-link:hover {
  background-color: #e6ebf7;
  transform: translateY(-1px);
}

.info-icon {
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 9999px;
  background-color: var(--primary-soft);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.info-text {
  display: flex;
  flex-direction: column;
}

.info-label {
  font-size: 0.8rem;
  color: var(--muted-foreground);
  margin-bottom: 0.15rem;
}

.info-value {
  font-size: 0.95rem;
  color: var(--foreground);
  font-weight: 500;
}

.info-value-link {
  transition: color 0.15s ease;
}

.info-row-link:hover .info-value-link {
  color: var(--primary);
}

.info-email {
  word-break: break-all;
}

/* Icons */
.icon-4 {
  width: 1rem;
  height: 1rem;
}

.icon-5 {
  width: 1.25rem;
  height: 1.25rem;
}

/* Animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(8px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  opacity: 0;
  animation: fadeInUp 0.6s ease forwards;
}

.animate-slide-up {
  opacity: 0;
  animation: fadeInUp 0.7s ease forwards;
}

/* Spinner */
@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
</style>

::contentReference[oaicite:0]{index=0}
