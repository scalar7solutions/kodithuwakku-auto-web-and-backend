<template>
  <article class="customer-card">
    <div class="customer-image-wrapper">
      <img
        :src="imageUrl"
        :alt="altText"
        class="customer-image"
      />

      <!-- dark gradient overlay -->
      <div class="customer-overlay"></div>

      <!-- bottom content -->
      <div class="customer-content">
        <h3 class="customer-name">
          {{ customer.customer_name }}
        </h3>

        <p class="customer-tagline">
          Happy Customer
        </p>

        <p class="customer-line">
          <span class="label">Purchased:</span>
          <span class="value">{{ purchasedText }}</span>
        </p>

        <p class="customer-line">
          <span class="label">From:</span>
          <span class="value">{{ fromText }}</span>
        </p>
      </div>
    </div>
  </article>
</template>

<script>
export default {
  name: "CustomerCard",
  props: {
    customer: {
      type: Object,
      required: true,
    },
  },
  computed: {
    // Main image: use ourcustomer_main if exists, otherwise first media, otherwise fallback
    imageUrl() {
      const media = this.customer.media || [];

      const main =
        media.find(
          (m) => m.custom_properties && m.custom_properties.type === "ourcustomer_main"
        ) || media[0];

      return main?.original_url || "/images/default-customer.jpg"; // put any placeholder you like
    },
    altText() {
      return this.customer.customer_name || "Happy customer";
    },
    purchasedText() {
      const make = this.customer.manufacture?.title || "";
      const model = this.customer.vehicle_model?.title || "";

      // If you later add a year field, you can append it here.
      // const year = this.customer.vehicle_model?.year || "";
      // return [make, model, year].filter(Boolean).join(" ");

      return [make, model].filter(Boolean).join(" ");
    },
    fromText() {
      // Option 1: if you later add a "from" column to our_customers table, use that.
      // return this.customer.from_dealer || "JPNAuto";

      // For now, show your company name (change text to match your brand).
      return "Kodithuwakku Auto Trades";
    },
  },
};
</script>

<style scoped>
.customer-card {
  border-radius: 24px;
  overflow: hidden;
  background: #020617;
  position: relative;
  box-shadow: 0 18px 40px rgba(15, 23, 42, 0.45);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.customer-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 24px 60px rgba(15, 23, 42, 0.6);
}

/* Keep aspect ratio roughly like your screenshot */
.customer-image-wrapper {
  position: relative;
  padding-top: 130%; /* ~3:4 card proportion */
}

.customer-image {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transform: scale(1.03);
  transition: transform 0.4s ease;
}

.customer-card:hover .customer-image {
  transform: scale(1.07);
}

/* dark gradient overlay from bottom */
.customer-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(15, 23, 42, 0.95) 0%,
    rgba(15, 23, 42, 0.65) 40%,
    rgba(15, 23, 42, 0.15) 70%,
    transparent 100%
  );
}

/* text block at the bottom */
.customer-content {
  position: absolute;
  left: 1.75rem;
  right: 1.75rem;
  bottom: 1.75rem;
  color: #f9fafb;
}

.customer-name {
  font-size: 1.35rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  margin: 0 0 0.35rem;
}

.customer-tagline {
  margin: 0 0 0.75rem;
  font-size: 0.9rem;
  color: #e5e7eb;
  opacity: 0.95;
}

.customer-line {
  margin: 0.08rem 0;
  font-size: 0.9rem;
}

.customer-line .label {
  font-weight: 600;
  color: #f97316; /* orange, like your screenshot "Purchased:" / "From:" */
}

.customer-line .value {
  margin-left: 0.15rem;
  color: #f9fafb;
}

/* small screens: slightly smaller text */
@media (max-width: 640px) {
  .customer-content {
    left: 1.25rem;
    right: 1.25rem;
    bottom: 1.25rem;
  }

  .customer-name {
    font-size: 1.15rem;
  }

  .customer-tagline,
  .customer-line {
    font-size: 0.85rem;
  }
}
</style>
