<template>
  <section class="our-customers-section">
    <div class="our-customers-container">
      <header class="our-customers-header">
        <!-- <h1 class="our-customers-title">Our Happy Customers</h1> -->
        
      </header>

      <div
        v-if="customers && customers.length"
        class="customer-cards-grid"
      >
        <CustomerCard
          v-for="customer in customers"
          :key="customer.id"
          :customer="customer"
        />
      </div>

      <div v-else class="our-customers-empty">
        <p>No customer stories yet. Check back soon!</p>
      </div>
    </div>
  </section>
</template>

<script>
import CustomerCard from "./CustomerCard.vue";

export default {
  name: "CustomerGrid",
  components: {
    CustomerCard,
  },
  props: {
    customers: {
      type: Array,
      default: () => [],
    },
  },
};
</script>

<style scoped>
.our-customers-section {
  padding: 4rem 0 5rem;
  background: #f3f4f6; /* light gray background */
}

.our-customers-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.our-customers-header {
  text-align: left;
  margin-bottom: 2.5rem;
}

.our-customers-title {
  font-size: 2.2rem;
  font-weight: 700;
  color: #111827;
  margin-bottom: 0.4rem;
}

.our-customers-subtitle {
  color: #6b7280;
  font-size: 0.98rem;
}

/* GRID: 3 desktop, 2 tablet, 1 mobile */
.customer-cards-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 1.75rem;
}

.our-customers-empty {
  text-align: center;
  color: #6b7280;
  padding: 2rem 0;
}

@media (max-width: 1024px) {
  .customer-cards-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (max-width: 640px) {
  .our-customers-section {
    padding: 3rem 0 3.5rem;
  }

  .our-customers-header {
    text-align: left;
  }

  .our-customers-title {
    font-size: 1.6rem;
  }

  .customer-cards-grid {
    grid-template-columns: 1fr; /* 1 card on mobile */
  }
}
</style>
