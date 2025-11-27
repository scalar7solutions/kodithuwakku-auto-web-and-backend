<template>
  <div class="min-h-screen bg-background">
    <!-- Header -->
    

    <main>
     
      <!-- <section class="py-16 bg-secondary/50">
        <div class="container-custom">
          <div class="relative bg-card rounded-lg overflow-hidden shadow-sm border">
            
            <div class="absolute inset-0 flex items-center justify-center">
              <h2 class="text-8xl md:text-9xl font-bold text-muted opacity-20 select-none">
                UPGRADE
              </h2>
            </div>
            
           
            <div class="relative z-10 py-16 px-8 text-center">
              <img 
                src="/images/Assets/range-rover.jpg"
                alt="Premium Range Rover" 
                class="max-w-full h-auto mx-auto max-h-96 object-contain filter drop-shadow-lg"
              />
            </div>
          </div>
        </div>
      </section> -->

      <!-- About Section -->
       <section id="about" class="section-spacing">
        <div class="container">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
              <h2 class="text-3xl lg:text-4xl font-bold text-primary mb-6">
                About Us
              </h2>
              <div class="space-y-4 text-muted-foreground leading-relaxed">
                <p>
                  JPN Auto is your trusted gateway to Japan's automotive auctions, offering a reliable and 
                  efficient way to access a wide range of Japanese vehicles. With a solid reputation built on 
                  experience, transparency, and customer support, we make it simple for buyers around the world 
                  to source and import vehicles directly from Japan.
                </p>
                <p>
                  Whether you're a car enthusiast, dealer, or first-time importer, we guide you through every 
                  step of the process from selecting the right vehicle to handling logistics and shipping. Our 
                  goal is to make Japanese vehicle imports accessible, hassle-free, and fully transparent.
                </p>
                
              </div>
            </div>
            
           <div class="relative order-first lg:order-none">
              <img 
                  src="/images/Assets/car-handover.jpg"
                alt="Professional car handover process" 
                class="w-full h-auto rounded-lg shadow-md object-cover"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- Services Section -->
      <section id="services" class="section-spacing bg-secondary/30">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      
      <!-- 1) Image goes first -->
     <div class="relative order-last lg:order-last">
        <img 
          src="/images/Assets/auctionhouse.jpg"
          alt="Japanese car auction house" 
          class="w-full h-auto rounded-lg shadow-md object-cover"
        />
      </div>

      <!-- 2) Content goes second -->
      <div class="space-y-6 order-first lg:order-first">
        <h2 class="text-3xl lg:text-4xl font-bold text-primary mb-6">
          What We Provide
        </h2>
        <div class="space-y-6">
          <div>
            <h3 class="text-xl font-semibold text-foreground mb-2">
              Expertly Selected JDM Vehicles
            </h3>
            <p class="text-muted-foreground">
              From compact cars (Daihatsu, Suzuki, Mitsubishi, Subaru, Mazda, and Honda) to specialty 
              diesel-powered Jeeps and Land Cruisers, we carefully source vehicles that meet quality 
              and demand standards.
            </p>
          </div>
          
          <div>
            <h3 class="text-xl font-semibold text-foreground mb-2">
              Transparent Online Auction Access
            </h3>
            <p class="text-muted-foreground">
              Gain access to major auction houses across Japan. Bid through our experienced brokers 
              to act on your behalf.
            </p>
          </div>
          
          <div>
            <h3 class="text-xl font-semibold text-foreground mb-2">
              Detailed Listings & Inspection Reports
            </h3>
            <p class="text-muted-foreground">
              Every listing includes auction grade sheets, high-resolution images, and vehicle 
              specifications to help you make well-informed decisions.
            </p>
          </div>
          
          <div>
            <h3 class="text-xl font-semibold text-foreground mb-2">
              Comprehensive Import & Logistics Handling
            </h3>
            <p class="text-muted-foreground">
              From inspection and documentation to export, shipping, and customs clearance, we manage 
              the entire process to ensure your vehicle arrives safely and on time.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


      <!-- Why Choose Section -->
      <section id="why-choose" class="section-spacing">
        <div class="container">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
              <h2 class="text-3xl lg:text-4xl font-bold text-primary mb-6">
                Why Choose JPN Car Auction?
              </h2>
              <div class="space-y-6">
                <div>
                  <h3 class="text-xl font-semibold text-foreground mb-2">
                    Deep Market Knowledge
                  </h3>
                  <p class="text-muted-foreground">
                    Our team has in-depth experience with Japanese auctions and understands the standards 
                    and systems that define Japan's automotive industry.
                  </p>
                </div>
                
                <div>
                  <h3 class="text-xl font-semibold text-foreground mb-2">
                    Global Reach, Local Service
                  </h3>
                  <p class="text-muted-foreground">
                    We serve customers worldwide and offer localised support to make importing smooth and 
                    stress-free, no matter where you're located.
                  </p>
                </div>
                
                <div>
                  <h3 class="text-xl font-semibold text-foreground mb-2">
                    Full-Service Convenience
                  </h3>
                  <p class="text-muted-foreground">
                    We take care of everything from bidding to delivery so you can focus on selecting the 
                    right vehicle while we handle the rest.
                  </p>
                </div>
                
                <div>
                  <h3 class="text-xl font-semibold text-foreground mb-2">
                    Clear, Honest Pricing
                  </h3>
                  <p class="text-muted-foreground">
                    We believe in full transparency. All costs are outlined up front, with no hidden fees.
                  </p>
                </div>
              </div>
            </div>
            
           <div class="relative order-first lg:order-none">
              <img 
                 src="/images/Assets/car-handover.jpg"
                alt="Professional automotive service" 
                class="w-full h-auto rounded-lg shadow-md object-cover"
              />
            </div>
          </div>
        </div>
      </section>
    </main>
    
    
  </div>
</template>

<script>


export default {
  name: 'VueIndex',
 
  mounted() {
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  }
}
</script>

<style scoped>
/* Professional Japanese Car Auction Design System */
.bg-background {
  background-color: hsl(0 0% 98%);
}

.text-foreground {
  color: hsl(215 25% 15%);
}

.bg-card {
  background-color: hsl(0 0% 100%);
}

.border-border {
  border-color: hsl(215 20% 88%);
}

.text-primary {
  color: #061775 !important;
}

.bg-primary {
  background-color: hsl(215 60% 25%);
}

.text-primary-foreground {
  color: hsl(0 0% 98%);
}

.bg-secondary\/50 {
  background-color: hsl(210 15% 95% / 0.5);
}

.bg-secondary\/30 {
  background-color: hsl(210 15% 95% / 0.3);
}

.text-muted {
  color: hsl(215 15% 45%);
}

.text-muted-foreground {
  color: hsl(215 15% 45%);
}

.section-spacing {
  padding-top: 5rem;
  padding-bottom: 5rem;
}

.container-custom {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

/* Smooth transitions */
.transition-colors {
  transition: color 0.3s ease;
}

/* Hover effects */
.hover\:text-primary:hover {
  color: hsl(215 60% 25%);
}

/* Grid layouts */
.grid {
  display: grid;
}

.lg\:grid-cols-2 {
  grid-template-columns: repeat(2, minmax(0, 1fr));
}

.gap-12 {
  gap: 3rem;
}

.items-center {
  align-items: center;
}

/* Spacing utilities */
.space-y-6 > * + * {
  margin-top: 1.5rem;
}

.space-y-4 > * + * {
  margin-top: 1rem;
}

.space-x-2 > * + * {
  margin-left: 0.5rem;
}

.space-x-8 > * + * {
  margin-left: 2rem;
}

/* Typography */
.text-2xl {
  font-size: 1.5rem;
  line-height: 2rem;
}

.text-3xl {
  font-size: 1.875rem;
  line-height: 2.25rem;
}

.text-4xl {
  font-size: 2.25rem;
  line-height: 2.5rem;
}

.text-8xl {
  font-size: 6rem;
  line-height: 1;
}

.text-9xl {
  font-size: 8rem;
  line-height: 1;
}

.text-xl {
  font-size: 1.25rem;
  line-height: 1.75rem;
}

.font-bold {
  font-weight: 700;
}

.font-semibold {
  font-weight: 600;
}

.leading-relaxed {
  line-height: 1.625;
}

/* Layout utilities */
.flex {
  display: flex;
}

.hidden {
  display: none;
}

.relative {
  position: relative;
}

.absolute {
  position: absolute;
}

.sticky {
  position: sticky;
}

.inset-0 {
  inset: 0;
}

.top-0 {
  top: 0;
}

.z-10 {
  z-index: 10;
}

.z-50 {
  z-index: 50;
}

.justify-between {
  justify-content: space-between;
}

.justify-center {
  justify-content: center;
}

.text-center {
  text-align: center;
}

/* Sizing */
.h-8 {
  height: 2rem;
}

.w-8 {
  width: 2rem;
}

.w-full {
  width: 100%;
}

.h-auto {
  height: auto;
}

.max-w-full {
  max-width: 100%;
}

.max-h-96 {
  max-height: 24rem;
}

.min-h-screen {
  min-height: 100vh;
}

/* Spacing */
.py-4 {
  padding-top: 1rem;
  padding-bottom: 1rem;
}

.py-8 {
  padding-top: 2rem;
  padding-bottom: 2rem;
}

.py-16 {
  padding-top: 4rem;
  padding-bottom: 4rem;
}

.px-8 {
  padding-left: 2rem;
  padding-right: 2rem;
}

.mb-2 {
  margin-bottom: 0.5rem;
}

.mb-6 {
  margin-bottom: 1.5rem;
}

.mt-16 {
  margin-top: 4rem;
}

.mx-auto {
  margin-left: auto;
  margin-right: auto;
}

/* Border radius */
.rounded-lg {
  border-radius: 0.5rem;
}

/* Shadows */
.shadow-sm {
  box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
}

.shadow-md {
  box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
}

.drop-shadow-lg {
  filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
}

/* Object fit */
.object-contain {
  object-fit: contain;
}

.object-cover {
  object-fit: cover;
}

/* Overflow */
.overflow-hidden {
  overflow: hidden;
}

.select-none {
  user-select: none;
}

/* Opacity */
.opacity-20 {
  opacity: 0.2;
}

/* Order for responsive */
.order-1 {
  order: 1;
}

.order-2 {
  order: 2;
}

/* Responsive breakpoints */
@media (min-width: 768px) {
  .md\:flex {
    display: flex;
  }
  
  .md\:text-9xl {
    font-size: 8rem;
    line-height: 1;
  }
}

@media (min-width: 1024px) {
  .lg\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
  
  .lg\:text-4xl {
    font-size: 2.25rem;
    line-height: 2.5rem;
  }
  
  .lg\:order-1 {
    order: 1;
  }
  
  .lg\:order-2 {
    order: 2;
  }
}


/* 1fr on mobile + image first */
@media (max-width: 1140px) {
  /* force every grid to be single-column */
  section .container > .grid {
    grid-template-columns: 1fr !important;
  }

  /* move the image wrapper above the text */
  section .container > .grid > .relative {
    order: -1 !important;
  }
  /* === mobile-first grid utilities === */
    .grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
    }
    .order-first {
    order: -1;
    }
}

@media (min-width: 1024px) {
  .lg\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
  .lg\:order-none {
    order: 0;
  }
}

</style>