<template>
  <section class="car-valuation">
    <div class="car-valuation-inner">
      <!-- Left side: blue panel with text -->
      <div class="car-valuation-left">
        <div class="car-valuation-content">
          <h2>
            WE KNOW WHAT YOUR CAR IS REALLY WORTH
          </h2>
          <p>
            Join the millions who value their car with Auto Trader. It's completely free and within seconds we
            will give you a live valuation of what your car is worth.
          </p>
          <!--
          <button class="car-valuation-button">
            See More
          </button>
          -->
        </div>
      </div>

      <!-- Right side: image (same file you already use) -->
      <div class="car-valuation-right">
        <img
          src="/images/Assets/newdone.png"
          alt="Car valuation - Know your car's worth"
          class="car-valuation-image"
        />
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "ThirdBanner",
};
</script>

<style scoped>
.car-valuation {
  background-color: #020617; /* similar to bg-background */
}

.car-valuation-inner {
  display: flex;
  flex-direction: column; /* mobile: stack */
}

/* Large screens: side-by-side like the TSX layout */
@media (min-width: 1024px) {
  .car-valuation-inner {
    flex-direction: row;
  }
}

.car-valuation-left,
.car-valuation-right {
  width: 100%;
}

@media (min-width: 1024px) {
  .car-valuation-left,
  .car-valuation-right {
    width: 50%;
  }
}

/* Left blue panel (matches bg-hero-overlay feel) */
.car-valuation-left {
  background: radial-gradient(circle at top left, #13255b, #050b2c);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 1.5rem;
}

@media (min-width: 640px) {
  .car-valuation-left {
    padding: 3rem;
  }
}

@media (min-width: 1024px) {
  .car-valuation-left {
    padding: 4rem;
  }
}

.car-valuation-content {
  max-width: 40rem;
  text-align: center;
}

@media (min-width: 1024px) {
  .car-valuation-content {
    text-align: left;
  }
}

/* Heading – same structure as in TSX */
.car-valuation-content h2 {
  font-size: clamp(1.8rem, 2.5vw, 2.5rem);
  font-weight: 700;
  color: #e5f0ff; /* text-hero */
  line-height: 1.2;
  margin: 0 0 1.5rem;
  text-transform: uppercase;
   letter-spacing: 0.08em; 
}

/* Paragraph – muted hero text */
.car-valuation-content p {
  font-size: 1rem;
  line-height: 1.6;
  color: rgba(226, 232, 240, 0.85); /* text-hero-muted */
  margin: 0;
}

/* Optional button styling if you ever re-enable it */
.car-valuation-button {
  margin-top: 1.75rem;
  padding: 0.75rem 1.5rem;
  border-radius: 999px;
  border: 1px solid rgba(226, 232, 240, 0.6);
  background: transparent;
  color: #e5f0ff;
  font-size: 0.95rem;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  cursor: pointer;
  transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
}

.car-valuation-button:hover {
  background-color: #e5f0ff;
  color: #050b2c;
  border-color: transparent;
}

/* Right side image – same behaviour as Tailwind: h-64 sm:h-80 lg:h-[400px] */
.car-valuation-right {
  display: block;
}

.car-valuation-image {
  display: block;
  width: 100%;
  height: 16rem; /* ~ h-64 */
  object-fit: cover;
}

@media (min-width: 640px) {
  .car-valuation-image {
    height: 20rem; /* ~ sm:h-80 */
  }
}

@media (min-width: 1024px) {
  .car-valuation-image {
    height: 400px; /* ~ lg:h-[400px] */
  }
}
</style>
