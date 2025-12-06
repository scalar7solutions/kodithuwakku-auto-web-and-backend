<template>
    <div class="container-fluid backgroundColor w-100">
        <div class="container-fluid py-5">
            <h1
                class="text-center secondFontStyle pt-3 pb-5"
                style="font-weight: 600"
            >
                Buying Essentials
            </h1>
            <div class="row text-center pb-5">
                <div class="col-md-6 col-xl-3 pb-4">
                    <div class="card h-100 bg-white border text-center px-3">
                        <div class="imageEssentials mt-5 pb-4">
                            <img
                                src="/images/data-collection.png"
                                width="100"
                                class=""
                                alt="..."
                            />
                        </div>
                        <div class="card-body">
                            <h4 class="card=title fw-bold secondFontStyle">
                                Get Informed
                            </h4>
                            <p class="card-text my-4 pb-3">
                                Visit the "
                                <Link :href="route('knowledge.center')"
                                    >Knowledge Centre</Link
                                >" to understand how to evaluate vehicle quality
                                using the "Auction Sheet."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 pb-4">
                    <div class="card h-100 bg-white border text-center px-3">
                        <div class="imageEssentials mt-5 pb-4">
                            <img
                                src="/images/car-insurance.png"
                                width="100"
                                class=""
                                alt="..."
                            />
                        </div>
                        <div class="card-body">
                            <h4 class="card=title fw-bold secondFontStyle">
                                Find Your Vehicle
                            </h4>
                            <p class="card-text my-4 pb-3">
                                Explore the "<Link :href="route('live.auction')"
                                    >LIVE AUCTION</Link
                                >" section, refine your search with "SEARCH" or
                                "ADVANCED SEARCH," and check the "Auction Sheet"
                                for details.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 pb-4">
                    <div class="card h-100 bg-white border text-center px-3">
                        <div class="imageEssentials mt-5 pb-4">
                            <img
                                src="/images/new-car.png"
                                width="100"
                                class=""
                                alt="..."
                            />
                        </div>
                        <div class="card-body">
                            <h4 class="card=title fw-bold secondFontStyle">
                                Review Prices
                            </h4>
                            <p class="card-text my-4 pb-3">
                                Use "Statistics by Model" to compare previous
                                sold prices for vehicles in similar condition.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 pb-4">
                    <div class="card h-100 bg-white border text-center px-3">
                        <div class="imageEssentials mt-5 pb-4">
                            <img
                                src="/images/search.png"
                                width="100"
                                class=""
                                alt="..."
                            />
                        </div>
                        <div class="card-body">
                            <h4 class="card=title fw-bold secondFontStyle">
                                Place Your Bid
                            </h4>
                            <p class="card-text my-4 pb-3">
                                Secure your bid with a refundable deposit via
                                our Online Payment system. Reach out to our
                                Sales Staff for guidance anytime.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },
};
</script>

<style scoped>
.buying-essentials-section {
    padding: 3.5rem 0 !important;
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
    font-size: clamp(1.6rem, 3vw, 2.3rem) !important;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #0f172a;
}

/* GRID */
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

/* CARD DESIGN */

.essential-card {
    --card-accent: #2563eb;
    --card-accent-soft: rgba(37, 99, 235, 0.12);

    position: relative;
    overflow: hidden;
    background: #ffffff;
    border-radius: 1.5rem;
    padding: 2rem;
    border: 1px solid rgba(148, 163, 184, 0.5);
    box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    transition: transform 0.5s ease, box-shadow 0.5s ease,
        border-color 0.5s ease;
    opacity: 0;
    transform: translateY(16px);
    animation: fadeUp 0.6s ease forwards;
}

/* staggered animation */
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

/* accent variants */
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

.essential-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 0 40px -10px var(--card-accent);
    border-color: rgba(148, 163, 184, 0.3);
}

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

.icon-img {
    width: 2rem;
    height: 2rem;
    object-fit: contain;
}

.card-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #020817;
    margin-bottom: 0.6rem;
}

.card-text {
    font-size: 0.9rem;
    line-height: 1.6;
    color: #6b7280;
}

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

@media (max-width: 600px) {
    .buying-essentials-section[data-v-bd23dd89] {
        padding: 0rem 0 !important;
    }
}
/* Tablets: reduce section padding a bit */
@media (max-width: 992px) {
    .buying-essentials-section {
        /* padding: 2.5rem 0; */
    }

    .section-header {
        margin-bottom: 2rem;
    }

    .essentials-grid {
        gap: 1.5rem;
    }
}

/* Mobiles: decrease section gaps and card spacing */
@media (max-width: 600px) {
    .section-title {
        font-size: 1.5rem;
    }

    .section-header {
        margin-bottom: 1.5rem;
    }

    .essentials-grid {
        gap: 1.25rem;
    }

    .essential-card {
        padding: 1.5rem 1.3rem;
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
