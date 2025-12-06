<template>
    <section class="buy-steps-section" :class="{ 'is-visible': isVisible }">
        <!-- HERO / INTRO (NO PHOTO) -->
        <div class="hero-strip">
            <div class="container hero-container">
                <div class="hero-left">
                    <p class="hero-eyebrow">Easy car buying guide</p>
                    <h1 class="hero-title">
                        Drive home your dream car with
                        <span class="highlight">Ajith_auto@yahoo.com</span>
                    </h1>
                    <p class="hero-subtitle">
                        Follow these simple steps to select, inspect, and
                        purchase your next vehicle safely through our website
                        and friendly sales team.
                    </p>
                    <div class="hero-actions">
                        <a
                            :href="route('available')"
                            target="_blank"
                            rel="noopener"
                            class="btn hero-btn-primary"
                        >
                            Browse Vehicles
                        </a>
                        <button
                            type="button"
                            class="btn hero-btn-ghost"
                            @click="scrollToSteps"
                        >
                            View steps
                        </button>
                    </div>
                </div>
                <div class="hero-right">
                    <div class="hero-pill">
                        <span class="dot"></span>
                        Updated stock listed online
                    </div>
                    <div class="hero-stat-card">
                        <div class="stat">
                            <span class="stat-label">Handpicked vehicles</span>
                            <span class="stat-value"
                                >Quality-focused selections</span
                            >
                        </div>
                        <div class="divider"></div>
                        <div class="stat">
                            <span class="stat-label">Clear details</span>
                            <span class="stat-value"
                                >Specs, photos & mileage</span
                            >
                        </div>
                        <div class="divider"></div>
                        <div class="stat">
                            <span class="stat-label">Personal support</span>
                            <span class="stat-value"
                                >Guidance until handover</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEPS SECTION -->
        <div ref="stepsSection" class="steps-outer-wrapper">
            <div class="container">
                <div class="steps-header text-center">
                    <p class="steps-eyebrow">Step by step</p>
                    <h2 class="steps-title">How to buy your car</h2>
                    <p class="steps-subtitle">
                        From browsing online to driving away, here is the
                        process in clear steps.
                    </p>
                </div>

                <transition-group
                    name="fade-up"
                    tag="div"
                    class="steps-list"
                    appear
                >
                    <div
                        v-for="(step, index) in steps"
                        :key="step.key"
                        class="step-row"
                        :style="{ transitionDelay: index * 80 + 'ms' }"
                    >
                        <div class="step-number-badge">
                            <span class="step-number-pill">
                                {{ index + 1 }}
                            </span>
                        </div>

                        <div class="step-card">
                            <div class="step-timeline-dot"></div>
                            <div class="step-timeline-line"></div>

                            <div class="step-inner">
                                <div class="step-media">
                                    <div class="step-icon">
                                        <i :class="step.icon"></i>
                                    </div>
                                </div>
                                <div class="step-body">
                                    <p class="step-label">
                                        Step {{ index + 1 }}
                                    </p>
                                    <h3 class="step-title">
                                        {{ step.title }}
                                    </h3>
                                    <p class="step-text" v-html="step.text"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition-group>

                <!-- CTA CARD -->
                <div class="final-cta">
                    <div class="final-cta-inner">
                        <div>
                            <p class="final-cta-eyebrow">Need assistance?</p>
                            <h3 class="final-cta-title">
                                Our sales team is ready to help you choose the
                                right vehicle.
                            </h3>
                            <p class="final-cta-text">
                                Use the phone and WhatsApp numbers on the
                                website to contact us. Share your budget and
                                purpose, and we will recommend the best options
                                for you.
                            </p>
                        </div>
                        <a
                            href="https://kodithuwakkuauto.com"
                            target="_blank"
                            rel="noopener"
                            class="btn final-cta-btn"
                        >
                            Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "HowToBuySteps",
    props: {
        site_url: {
            type: [String, Object],
            required: true,
        },
    },
    data() {
        return {
            isVisible: false,
            rawSteps: [
                {
                    key: "visit",
                    title: "Visit our website",
                    icon: "fa-solid fa-globe",
                    text: "",
                },
                {
                    key: "browse",
                    title: "Browse the full stock list",
                    icon: "fa-solid fa-car-side",
                    text: `Open the vehicle listing pages to see all cars in stock.
                 Check model, year, mileage, options and available colours.`,
                },
                {
                    key: "filter",
                    title: "Use filters to find the perfect car",
                    icon: "fa-solid fa-sliders",
                    text: `Filter by make, model, year, price range and fuel type to quickly
                 find vehicles that match your budget and driving needs.`,
                },
                {
                    key: "details",
                    title: "Open the vehicle details page",
                    icon: "fa-regular fa-file-lines",
                    text: `Click on any vehicle to view more photos, specifications, features
                 and important notes. Compare a few options before deciding.`,
                },
                {
                    key: "contact",
                    title: "Contact our sales team",
                    icon: "fa-brands fa-whatsapp",
                    text: `When you find a car you like, use the phone or WhatsApp numbers shown
                 on the website to talk directly with our sales staff. They can confirm
                 availability, total price and give you professional advice.`,
                },
                {
                    key: "inspect",
                    title: "Schedule inspection and test drive",
                    icon: "fa-solid fa-key",
                    text: `Arrange a time to visit the yard or showroom. Inspect the vehicle in person,
                 check the condition, and take a test drive if available.`,
                },
                {
                    key: "confirm",
                    title: "Confirm your purchase and payment",
                    icon: "fa-solid fa-handshake",
                    text: `Once you are satisfied, confirm the deal with our staff.
                 Discuss payment plans, bank loan options and reservation amounts.`,
                },
                {
                    key: "handover",
                    title: "Documentation and handover",
                    icon: "fa-solid fa-id-card",
                    text: `Our team will prepare all necessary registration documents and guide you
                 through the transfer process. After completion, you can drive away with
                 your new vehicle.`,
                },
            ],
        };
    },
    computed: {
        siteUrl() {
            if (typeof this.site_url === "string") {
                return this.site_url;
            }
            if (this.site_url && typeof this.site_url === "object") {
                return this.site_url.url || this.site_url.href || "#";
            }
            return "#";
        },
        siteDomain() {
            try {
                const url = new URL(this.siteUrl);
                return url.hostname.replace(/^www\./, "");
            } catch (e) {
                return this.siteUrl
                    .replace(/^https?:\/\//, "")
                    .replace(/\/$/, "");
            }
        },
        steps() {
            const url = this.siteUrl || "#";
            return this.rawSteps.map((step) => {
                if (step.key === "visit") {
                    return {
                        ...step,
                        text: `Go to <a href="https://kodithuwakkuauto.com" target="_blank" rel="noopener">kodithuwakkuauto.com</a>
                   to explore our latest vehicle collection.
                   All available vehicles are listed with clear photos and details.`,
                    };
                }
                return step;
            });
        },
    },
    mounted() {
        // Simple reveal animation on mount
        requestAnimationFrame(() => {
            this.isVisible = true;
        });
    },
    methods: {
        scrollToSteps() {
            if (this.$refs.stepsSection) {
                const el = this.$refs.stepsSection;
                const top =
                    el.getBoundingClientRect().top + window.pageYOffset - 80;
                window.scrollTo({
                    top,
                    behavior: "smooth",
                });
            }
        },
    },
};
</script>

<style scoped>
.buy-steps-section {
    position: relative;
    background: #ffffff;
    color: #0f172a;
    overflow: hidden;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 600ms ease, transform 600ms ease;
}

.buy-steps-section.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* HERO / INTRO (LIGHT, NO PHOTO) */

.hero-strip {
    width: 100%;
    border-bottom: 1px solid #e5e7eb;
    background: radial-gradient(circle at top left, #eff6ff 0, #ffffff 60%);
}

.hero-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
    padding-top: 2.8rem;
    padding-bottom: 2.4rem;
}

.hero-left {
    max-width: 540px;
}

.hero-eyebrow {
    letter-spacing: 0.18em;
    font-size: 0.78rem;
    font-weight: 600;
    text-transform: uppercase;
    color: #45527a;
    margin-bottom: 0.35rem;
}

.hero-title {
    font-size: clamp(1.9rem, 3vw, 2.4rem);
    font-weight: 700;
    line-height: 1.15;
    margin-bottom: 0.75rem;
    color: #111827;
}

.highlight {
    color: #153492;
}

.hero-subtitle {
    max-width: 32rem;
    font-size: 0.97rem;
    color: #4b5563;
    margin-bottom: 1.3rem;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
}

.hero-btn-primary {
    border-radius: 999px;
    padding: 0.5rem 1.4rem;
    font-weight: 600;
    background: radial-gradient(circle at top left, #13255b, #050b2c);
    border: none;
    color: #ffffff;
    
    transition: transform 160ms ease, box-shadow 160ms ease, filter 160ms ease;
}

.hero-btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 16px 40px rgba(12, 153, 234, 0.45);
    filter: brightness(1.05);
}

.hero-btn-ghost {
    border-radius: 999px;
    padding: 0.5rem 1.3rem;
    font-weight: 500;
    border: 1px solid #cbd5e1;
    color: #0f172a;
    background: #ffffff;
    transition: background-color 160ms ease, color 160ms ease,
        border-color 160ms ease, transform 160ms ease;
}

.hero-btn-ghost:hover {
    background: #eff6ff;
    border-color: #93c5fd;
    transform: translateY(-1px);
}

/* HERO RIGHT SIDE */

.hero-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 0.9rem;
}

.hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.35rem 0.8rem;
    border-radius: 999px;
    background: #ecfdf5;
    color: #166534;
    font-size: 0.78rem;
    font-weight: 500;
    border: 1px solid #bbf7d0;
}

.hero-pill .dot {
    width: 9px;
    height: 9px;
    border-radius: 999px;
    background: #22c55e;
    box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.9);
    animation: pulse-dot 1.5s ease-out infinite;
}

.hero-stat-card {
    width: 100%;
    max-width: 420px;
    border-radius: 1.25rem;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    box-shadow: 0 16px 40px rgba(15, 23, 42, 0.06);
    padding: 0.9rem 1.1rem;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.75rem;
}

.hero-stat-card .stat {
    display: flex;
    flex-direction: column;
}

.hero-stat-card .stat-label {
    font-size: 0.78rem;
    font-weight: 600;
    color: #0f172a;
}

.hero-stat-card .stat-value {
    font-size: 0.78rem;
    color: #6b7280;
}

.hero-stat-card .divider {
    width: 1px;
    background: linear-gradient(to bottom, transparent, #e5e7eb, transparent);
}

/* STEPS SECTION */

.steps-outer-wrapper {
    background: #ffffff;
    padding: 3.2rem 0 3.6rem;
}

.steps-header {
    margin-bottom: 2.4rem;
}

.steps-eyebrow {
    letter-spacing: 0.16em;
    font-size: 0.78rem;
    font-weight: 600;
    text-transform: uppercase;
    color: #45527a;;
    margin-bottom: 0.35rem;
}

.steps-title {
    font-size: 1.9rem;
    font-weight: 700;
    margin-bottom: 0.4rem;
    color: #111827;
}

.steps-subtitle {
    max-width: 30rem;
    margin: 0 auto;
    font-size: 0.95rem;
    color: #6b7280;
}

.steps-list {
    position: relative;
    margin-top: 1.8rem;
}

/* STEP ROW */

.step-row {
    position: relative;
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.2rem;
}

.step-number-badge {
    flex: 0 0 70px;
    display: flex;
    justify-content: center;
    padding-top: 0.35rem;
}

.step-number-pill {
    width: 34px;
    height: 34px;
    border-radius: 999px;
    background: radial-gradient(circle at top left, #13255b, #050b2c);
    font-size: 0.9rem;
    font-weight: 600;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    
}

/* STEP CARD */

.step-card {
    position: relative;
    flex: 1;
    padding-bottom: 0.9rem;
}

.step-timeline-dot {
    position: absolute;
    top: 0.95rem;
    left: 0;
    width: 8px;
    height: 8px;
    border-radius: 999px;
    background: #0c3fae;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.18);
}

.step-timeline-line {
    position: absolute;
    top: 1.25rem;
    left: 3px;
    width: 2px;
    height: calc(100% - 0.5rem);
    background: linear-gradient(
        to bottom,
        rgba(148, 163, 184, 0.8),
        transparent
    );
}

.step-inner {
    margin-left: 1.8rem;
    background: #ffffff;
    border-radius: 1.1rem;
    padding: 0.95rem 1.1rem;
    border: 1px solid #e5e7eb;
    box-shadow: 0 10px 30px rgba(148, 163, 184, 0.18);
    display: flex;
    gap: 0.85rem;
    transition: transform 200ms ease, box-shadow 200ms ease,
        border-color 200ms ease;
}

.step-inner:hover {
    transform: translateY(-2px);
    box-shadow: 0 16px 40px rgba(148, 163, 184, 0.32);
    border-color: #93c5fd;
}

.step-media {
    flex: 0 0 auto;
}

.step-icon {
    width: 40px;
    height: 40px;
    border-radius: 1rem;
    background: radial-gradient(circle at top left, #eff6ff, #e0f2fe);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #112f6f;
    font-size: 1.1rem;
    box-shadow: 0 10px 24px rgba(148, 163, 184, 0.4);
}

.step-body {
    flex: 1;
}

.step-label {
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #9ca3af;
    margin-bottom: 0.15rem;
}

.step-title {
    font-size: 1.02rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 0.25rem;
}

.step-text {
    font-size: 0.9rem;
    color: #6b7280;
    margin-bottom: 0;
}

.step-text a {
    color: #2563eb;
    text-decoration: none;
    border-bottom: 1px dashed rgba(37, 99, 235, 0.6);
    transition: color 160ms ease, border-color 160ms ease;
}

.step-text a:hover {
    color: #1d4ed8;
    border-bottom-style: solid;
    border-color: rgba(37, 99, 235, 0.9);
}

/* FINAL CTA */

.final-cta {
    margin-top: 2.4rem;
}

.final-cta-inner {
    border-radius: 1.4rem;
   background: radial-gradient(circle at top left, #13255b, #050b2c);
    color: #e5e7eb;
    padding: 1.5rem 1.6rem;
    display: flex;
    align-items: center;
    gap: 1.4rem;
    box-shadow: 0 24px 60px rgba(15, 23, 42, 0.16);
    flex-wrap: wrap;
}

.final-cta-eyebrow {
    font-size: 0.78rem;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: #bfdbfe;
    margin-bottom: 0.2rem;
}

.final-cta-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.final-cta-text {
    font-size: 0.9rem;
    margin-bottom: 0;
    color: #e5e7eb;
}

.final-cta-btn {
    border-radius: 999px;
    padding: 0.45rem 1.35rem;
    font-weight: 600;
    background: #fbbf24;
    color: #111827;
    border: none;
    white-space: nowrap;
    box-shadow: 0 16px 40px rgba(15, 23, 42, 0.3);
    transition: transform 160ms ease, box-shadow 160ms ease, filter 160ms ease;
}

.final-cta-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 20px 50px rgba(15, 23, 42, 0.45);
    filter: brightness(1.03);
}

/* TRANSITIONS */

.fade-up-enter-active,
.fade-up-leave-active {
    transition: all 420ms cubic-bezier(0.22, 0.61, 0.36, 1);
}

.fade-up-enter-from,
.fade-up-leave-to {
    opacity: 0;
    transform: translateY(10px) scale(0.98);
}

/* KEYFRAMES */

@keyframes pulse-dot {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.9);
    }
    70% {
        transform: scale(1.4);
        box-shadow: 0 0 0 12px rgba(34, 197, 94, 0);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
    }
}

/* RESPONSIVE */

@media (max-width: 991.98px) {
    .hero-container {
        flex-direction: column;
        align-items: flex-start;
    }

    .hero-right {
        align-items: flex-start;
        max-width: 480px;
    }

    .steps-outer-wrapper {
        padding-top: 2.5rem;
        padding-bottom: 3.2rem;
    }

    .step-inner {
        padding: 0.85rem 1rem;
    }

    .final-cta-inner {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 575.98px) {
    .hero-container {
        padding-top: 2.3rem;
        padding-bottom: 2.1rem;
    }

    .step-number-badge {
        flex-basis: 56px;
    }

    .step-inner {
        margin-left: 1.4rem;
    }
}
</style>
