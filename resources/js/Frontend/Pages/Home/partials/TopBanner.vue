<template>
    <section class="hero">
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1 class="hero-title">
  <span class="hero-title-part hero-title-primary">DISCOVER.</span>
  <span class="hero-title-part hero-title-secondary">COMPARE.</span>
  <span class="hero-title-part hero-title-tertiary">BUY</span>
</h1>

            <h2 class="hero-subtitle">
                KICK OFF YOUR CAR JOURNEY.
            </h2>
        </div>
    </section>
</template>

<script>
export default {
    name: "HeroComponent",
};
</script>

<style scoped>

.hero-title {
    margin: 0;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    font-size: clamp(2.6rem, 5vw, 4.2rem);
    line-height: 1.15;
}

/* common spacing between the words */
.hero-title-part {
    display: inline-block;
    margin-right: 0.35em;
}

/* DISCOVER – strongest */
.hero-title-primary {
    color: #ffffff;
    opacity: 1;
    font-weight: 800;
}

/* COMPARE – a bit lighter */
.hero-title-secondary {
    color: rgba(255, 255, 255, 0.85);
    font-weight: 700;
}

/* BUY – lightest */
.hero-title-tertiary {
    color: rgba(255, 255, 255, 0.7);
    font-weight: 600;
}

.hero {
    position: relative;
    width: 100%;
    min-height: 420px;
    height: min(600px, 70vh);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 1.5rem;
    overflow: hidden;

    color: #ffffff;
    text-align: center;

    background-image: url("/images/Assets/topbannernew.png"); /* your existing image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* dark blue overlay to match the mock */
.hero-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(
            circle at center,
            rgba(0, 0, 0, 0.25),
            rgba(3, 16, 48, 0.95)
        );
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 1;
    max-width: 960px;
}

/* main headline */
.hero-title {
    margin: 0;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    font-size: clamp(2.6rem, 5vw, 4.2rem);
    line-height: 1.15;
}

.hero-title span {
    opacity: 0.95; /* slight fade if you want a tiny difference */
}

/* sub-headline */
.hero-subtitle {
    margin-top: 1.5rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.28em;
    font-size: clamp(0.9rem, 1.3vw, 1.3rem);
}

/* ---------- responsiveness ---------- */

@media (max-width: 992px) {
    .hero {
        height: min(520px, 65vh);
        padding: 0 1.25rem;
    }

    .hero-title {
        font-size: clamp(2.1rem, 5vw, 3.2rem);
        letter-spacing: 0.1em;
    }

    .hero-subtitle {
        margin-top: 1.25rem;
        font-size: 0.95rem;
        letter-spacing: 0.22em;
    }
}

@media (max-width: 768px) {
    .hero {
        min-height: 380px;
        height: auto;
        padding: 3.5rem 1.25rem;
    }

    .hero-title {
        font-size: 2rem;
        letter-spacing: 0.08em;
    }

    .hero-subtitle {
        font-size: 0.85rem;
        letter-spacing: 0.18em;
    }
}

@media (max-width: 480px) {
    .hero {
        padding: 3rem 1rem;
    }

    .hero-title {
        font-size: 1.6rem;
        letter-spacing: 0.06em;
    }

    .hero-subtitle {
        font-size: 0.8rem;
        letter-spacing: 0.14em;
    }
}
</style>
