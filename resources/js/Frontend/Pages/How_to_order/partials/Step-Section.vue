<template>
  <div class="order-guide-wrapper">
    <div class="container">
      <div class="order-guide-container">
        

        <div class="timeline-container">
          <div class="timeline-progress">
            
          </div>

          <div class="timeline-steps">
            <div
              v-for="(step, index) in steps"
              :key="step.id"
              class="step visible active"

              
              ref="stepRefs"
            >
              <div class="step-number">{{ String(step.id).padStart(2, '0') }}</div>
              <div class="step-card">
                <div class="card-header">
                  <div :class="['step-icon', step.iconClass]">
                    <i :class="step.icon"></i>
                  </div>
                  <h3 class="step-title">{{ step.title }}</h3>
                </div>
                <div class="card-content">
                  <p class="step-description">{{ step.description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="cta-section">
          <h2>Ready to Start Your Journey?</h2>
          <p>
            Join thousands of satisfied customers who have imported premium vehicles
            through our streamlined process
          </p>
          <button class="cta-button" @click="$inertia.visit('/live-auction')">
            <span>Browse Auctions Now</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted, onBeforeUnmount } from 'vue';

const steps = [
  { id: 1, title: 'Browse Auctions', description: "Explore live listings from Japan's top auction houses with detailed photos, specs, and condition reports.", icon: 'fas fa-search', iconClass: 'icon-blue' },
  { id: 2, title: 'Select Your Vehicle', description: "Choose the vehicle that fits your needs and preferences. We'll guide you through the details.", icon: 'fas fa-car', iconClass: 'icon-purple' },
  { id: 3, title: 'Generate an Enquiry', description: 'Submit an enquiry for the selected vehicle. Our team will confirm availability and advise on next steps.', icon: 'fas fa-file-alt', iconClass: 'icon-green' },
  { id: 4, title: 'Place Deposit', description: 'Make a refundable deposit to authorize bidding and begin the purchase process.', icon: 'fas fa-credit-card', iconClass: 'icon-orange' },
  { id: 5, title: 'Successful Bid', description: 'We place bids on your behalf. If successful, the vehicle is secured and prepared for shipment.', icon: 'fas fa-trophy', iconClass: 'icon-yellow' },
  { id: 6, title: 'Shipping & Documentation', description: 'We handle export documents, inspections, shipping, and customs for a smooth journey.', icon: 'fas fa-ship', iconClass: 'icon-indigo' },
  { id: 7, title: 'Vehicle Delivery', description: 'Your vehicle is delivered to your selected port or location, ready for pickup or registration.', icon: 'fas fa-truck', iconClass: 'icon-teal' },
  { id: 8, title: 'Drive With Confidence', description: 'Enjoy your newly imported vehicle—professionally sourced, carefully handled, and ready to go.', icon: 'fas fa-check-circle', iconClass: 'icon-rose' }
];

const activeIndex = ref(-1);
const visible = reactive(Array(steps.length).fill(false));
const stepRefs = ref([]);

const progressWidth = computed(() => activeIndex.value < 0 ? 0 : ((activeIndex.value + 1) / steps.length) * 100);

function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight);
}

function handleScrollAnimation() {
  stepRefs.value.forEach((el, idx) => {
    if (el && isElementInViewport(el)) {
      visible[idx] = true;
      activeIndex.value = idx;
    }
  });
}

onMounted(() => {
  stepRefs.value = stepRefs.value.slice(0, steps.length);
  handleScrollAnimation();
  window.addEventListener('scroll', handleScrollAnimation);
});

onBeforeUnmount(() => window.removeEventListener('scroll', handleScrollAnimation));

</script>

<style scoped>
.order-guide-wrapper {
  display: flex;
  justify-content: center;
   margin-bottom: 60px;
   margin-top: 60px;
}

.order-guide-container {
  background: white;
  border-radius: 24px;
  
  overflow: hidden;
  position: relative;
  z-index: 1;
}

.container-header {
  background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
  color: white;
  padding: 60px 40px 40px;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.container-header::before {
  content: "";
  position: absolute;
  top: -50%;
  left:-50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
  z-index: 0;
}

.container-header h1 {
  font-size: 2.8rem;
  font-weight: 700;
  margin-bottom: 15px;
  position: relative;
  z-index: 2;
}

.container-header h1 .highlight {
  background: linear-gradient(90deg, #fcd34d, #f59e0b);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
}

.container-header p {
  font-size: 1.2rem;
  max-width: 700px;
  margin: 0 auto;
  opacity: 0.9;
  line-height: 1.6;
  position: relative;
  z-index: 2;
}

.timeline-container {
  padding: 60px 40px;
  position: relative;
}


.timeline-progress-bar {
  height: 100%;
  background: linear-gradient(90deg, #3b82f6, #8b5cf6);
  border-radius: 4px;
  transition: width 0.5s ease;
  position: relative;
}

.timeline-steps {
  display: flex;
  justify-content: space-between;
  position: relative;
  z-index: 2;
  flex-wrap: wrap;
}

.step {
  width: 22%;
  margin-bottom: 60px;
  position: relative;
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.6s ease;
  
}

.step.visible {
  opacity: 1;
  transform: translateY(0);
}

.step-number {
  position: absolute;
  top: -40px;
  left: 0;
  width: 60px;
  height: 60px;
  background: white;
  border: 4px solid #e2e8f0;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 1.5rem;
  color: #4a5568;
  z-index: 3;
  transition: all 0.3s ease;
}

.step.active .step-number {
  background: linear-gradient(135deg, #3b82f6, #8b5cf6);
  color: white;
  border-color: #3b82f6;
  /* transform: scale(1.1); */
  box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
}

.step-card {
  background: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  transition: all 0.4s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.step-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.card-header {
  padding: 25px 25px 20px;
  background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
}

.step-icon {
  width: 70px;
  height: 70px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  font-size: 28px;
  color: white;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.icon-blue { background: linear-gradient(135deg, #3b82f6, #60a5fa); }
.icon-purple { background: linear-gradient(135deg, #8b5cf6, #a78bfa); }
.icon-green { background: linear-gradient(135deg, #10b981, #34d399); }
.icon-orange { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
.icon-yellow { background: linear-gradient(135deg, #eab308, #fcd34d); }
.icon-indigo { background: linear-gradient(135deg, #6366f1, #818cf8); }
.icon-teal { background: linear-gradient(135deg, #14b8a6, #2dd4bf); }
.icon-rose { background: linear-gradient(135deg, #f43f5e, #fb7185); }

.step-title {
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 10px;
  color: #1e293b;
}

.card-content {
  padding: 25px;
  flex-grow: 1;
}

.step-description {
  color: #4a5568;
  line-height: 1.7;
  font-size: 1rem;
}

.cta-section {
  text-align: center;
  padding: 60px 40px;
 
  
}

.cta-section h2 {
  font-size: 2.2rem;
  font-weight: 700;
  margin-bottom: 20px;
  color: #1e293b;
}

.cta-section p {
  color: #4a5568;
  line-height: 1.7;
  max-width: 600px;
  margin: 0 auto 30px;
  font-size: 1.1rem;
}

.cta-button {
  padding: 16px 45px;
  border: none;
  border-radius: 50px;
  background: linear-gradient(90deg, #3b82f6, #8b5cf6);
  color: white;
  font-weight: 600;
  font-size: 1.1rem;
  cursor: pointer;
  box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.cta-button:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 30px rgba(59, 130, 246, 0.4);
}

.cta-button span {
  position: relative;
  z-index: 2;
}

@media (max-width: 992px) {
  .step { width: 48%;
   position: relative;
 }
  .timeline-progress { display: none; }

   .step-number {
    position: absolute;
    top: -30px;              /* sits above the card */
    left: 50%;               /* center horizontally */
    transform: translateX(-50%);
    margin: 0;               /* remove any auto margins */
  }
  
}

@media (max-width: 576px) {
  .step { width: 100%; }
  .container-header { padding: 40px 20px; }
  .container-header h1 { font-size: 2.2rem; }
  .timeline-container { padding: 40px 20px; }
  .cta-section { padding: 40px 20px; }
}

</style>
