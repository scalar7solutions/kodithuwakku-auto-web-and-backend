<template>
  <section class="buying-essentials-section">
    <div class="container">
      <!-- Section header (unchanged) -->
      <div class="section-header">
        <h1 class="section-title">BUYING ESSENTIALS</h1>
      </div>

      <!-- Cards -->
      <div class="essentials-grid">
        <!-- 1 -->
        <div class="essential-card essential-card--primary">
          <div class="card-blob"></div>
          <div class="icon">
            <img
              class="icon-img"
              src="images/Assets/ico-history.svg.png"
              alt="Check a car's history"
            />
          </div>
          <h2 class="card-title">Check A Car's History</h2>
          <p class="card-text">
            Have complete peace of mind before you buy your next car with comprehensive vehicle reports.
          </p>
          <div class="card-accent-line"></div>
        </div>

        <!-- 2 -->
        <div class="essential-card essential-card--secondary">
          <div class="card-blob"></div>
          <div class="icon">
            <img
              class="icon-img"
              src="images/Assets/ico-insurance.svg.png"
              alt="Security advice"
            />
          </div>
          <h2 class="card-title">Security Advice</h2>
          <p class="card-text">
            Expert guidance on how to buy and sell vehicles safely and avoid common scams.
          </p>
          <div class="card-accent-line"></div>
        </div>

        <!-- 3 -->
        <div class="essential-card essential-card--accent">
          <div class="card-blob"></div>
          <div class="icon">
            <img
              class="icon-img"
              src="images/Assets/Picture.png"
              alt="Car finance & loans"
            />
          </div>
          <h2 class="card-title">Car Finance &amp; Loans</h2>
          <p class="card-text">
            Discover how much you can borrow and find the perfect financing package for you.
          </p>
          <div class="card-accent-line"></div>
        </div>

        <!-- 4 -->
        <div class="essential-card essential-card--primary">
          <div class="card-blob"></div>
          <div class="icon">
            <img
              class="icon-img"
              src="images/Assets/ico-buying.svg.png"
              alt="What's it worth"
            />
          </div>
          <h2 class="card-title">What's It Worth</h2>
          <p class="card-text">
            Get a free instant valuation. Sell or part-exchange your car at the right price.
          </p>
          <div class="card-accent-line"></div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "BuyingEssentials",
};
</script>

<style scoped>

.buying-essentials-section {
  padding: 3.5rem 0;
  /* background: radial-gradient(circle at top left, #f4f8ff 0, #f9fbff 40%, #f7f9fc 100%); */
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.section-header {
  text-align: center;
  margin-bottom: 2.5rem;
}

.section-title {
  font-size: 1.9rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #0f172a;
}

/* ===== GRID (same structure) ===== */
.essentials-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 1.75rem;
}

@media (max-width: 992px) {
  .essentials-grid {
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  }
}

/* ===== CARD DESIGN (matching the React version) ===== */

/* base theme for cards */
.essential-card {
  --card-accent: #2563eb; /* default primary */
  --card-accent-soft: rgba(37, 99, 235, 0.12);

  position: relative;
  overflow: hidden;
  background: #ffffff;              /* bg-card */
  border-radius: 1.5rem;            /* rounded-2xl */
  padding: 2rem;                    /* p-8 */
  border: 1px solid rgba(148, 163, 184, 0.5); /* border-border/50 */
  box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08); /* shadow-card */
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  transition:
    transform 0.5s ease,
    box-shadow 0.5s ease,
    border-color 0.5s ease;
  opacity: 0;
  transform: translateY(16px);
  animation: fadeUp 0.6s ease forwards;
}

/* staggered animation like delay prop */
.essential-card:nth-child(1) {
  animation-delay: 300ms;
}
.essential-card:nth-child(2) {
  animation-delay: 400ms;
}
.essential-card:nth-child(3) {
  animation-delay: 500ms;
}
.essential-card:nth-child(4) {
  animation-delay: 600ms;
}



/* accent variants (same idea as accentStyles in React) */
.essential-card--primary {
  --card-accent: #2563eb;
  --card-accent-soft: rgba(37, 99, 235, 0.12);
}

.essential-card--secondary {
  --card-accent: #22c55e;
  --card-accent-soft: rgba(34, 197, 94, 0.12);
}

.essential-card--accent {
  --card-accent: #f97316;
  --card-accent-soft: rgba(249, 115, 22, 0.16);
}

/* hover glow / lift like group-hover:shadow & translate */
.essential-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 0 40px -10px var(--card-accent);
  border-color: rgba(148, 163, 184, 0.3); /* hoverBorder */
}

/* decorative gradient blob in the corner */
.card-blob {
  position: absolute;
  top: -1rem;
  right: -1rem;
  width: 6rem;
  height: 6rem;
  border-radius: 999px;
  background: var(--card-accent-soft);
  filter: blur(30px);
  opacity: 0;
  transition: opacity 0.5s ease;
}

.essential-card:hover .card-blob {
  opacity: 0.6;
}

/* icon container like bg-primary/10, rounded-2xl, hover scale+rotate */
.icon {
  position: relative;
  width: 4rem;
  height: 4rem;
  border-radius: 1.25rem;
  background: var(--card-accent-soft);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1.5rem;
  transition: transform 0.3s ease;
  z-index: 1;
}

.essential-card:hover .icon {
  transform: scale(1.1) rotate(3deg);
}

/* icon image */
.icon-img {
  width: 2rem;
  height: 2rem;
  object-fit: contain;
}

/* title & text like in React card */
.card-title {
  font-size: 1.1rem;
  font-weight: 700;
  color: #020817; /* text-foreground */
  margin-bottom: 0.6rem;
}

.card-text {
  font-size: 0.9rem;
  line-height: 1.6;
  color: #6b7280; /* text-muted-foreground */
}

/* bottom accent line (scales on hover) */
.card-accent-line {
  position: absolute;
  bottom: 0;
  left: 2rem;
  right: 2rem;
  height: 2px;
  background: var(--card-accent-soft);
  transform: scaleX(0);
  transform-origin: left;
  border-radius: 999px;
  transition: transform 0.5s ease;
}

.essential-card:hover .card-accent-line {
  transform: scaleX(1);
}

/* fade-up animation */
@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Small screens tweaks (kept similar to your original) */
@media (max-width: 600px) {
  .buying-essentials-section {
    padding: 2.5rem 0;
  }

  .section-title {
    font-size: 1.5rem;
  }

  .essential-card {
    padding: 1.75rem 1.5rem;
    border-radius: 1.25rem;
  }

  .icon {
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 1rem;
  }

  .card-title {
    font-size: 1.05rem;
  }

  .card-text {
    font-size: 0.9rem;
  }
}
</style>
