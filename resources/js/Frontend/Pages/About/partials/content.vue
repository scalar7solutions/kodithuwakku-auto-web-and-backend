<template>
    <div class="min-h-screen bg-background">
        <main>
            <!-- Hero / About -->
            <section
                id="about"
                class="section-spacing relative overflow-hidden"
                style="
                    background: radial-gradient(
                            circle at top left,
                            rgba(6, 23, 117, 0.08),
                            transparent 60%
                        ),
                        radial-gradient(
                            circle at bottom right,
                            rgba(6, 23, 117, 0.08),
                            transparent 55%
                        );
                "
            >
                <div
                    class="container container-custom grid lg:grid-cols-2 gap-12 items-center"
                >
                    <div class="space-y-6">
                        <div
                            class="flex items-center space-x-2 text-muted-foreground"
                        >
                            <span
                                class="h-8 w-8 flex items-center justify-center rounded-lg bg-card shadow-sm text-primary font-bold"
                            >
                                KA
                            </span>
                            <span>About Kodithuwakku Auto</span>
                        </div>

                        <h1 class="text-3xl lg:text-4xl font-bold text-primary">
                            Driving trusted Japanese vehicles to your doorstep.
                        </h1>

                        <div
                            class="space-y-4 text-muted-foreground leading-relaxed"
                        >
                            <p>
                                Kodithuwakku Auto connects drivers with
                                carefully selected Japanese vehicles, handled
                                with the same care we would use for our own
                                families. Every recommendation is based on
                                real-world experience, honest feedback, and an
                                eye for long-term reliability.
                            </p>
                            <p>
                                From the moment you share the kind of car you
                                are dreaming about, we help you compare options,
                                understand condition and history, and coordinate
                                all the steps until your vehicle is ready for
                                you to drive with confidence.
                            </p>
                        </div>

                        <div class="flex flex-wrap space-x-2">
                            <a
                                href="#services"
                                class="bg-primary text-primary-foreground rounded-lg px-8 py-4 font-semibold shadow-md transition-colors"
                            >
                                How we help you
                            </a>
                            <a
                                href="#why-choose"
                                class="border border-border bg-card text-foreground rounded-lg px-8 py-4 font-semibold shadow-sm transition-colors hover:text-primary"
                            >
                                Why people choose us
                            </a>
                        </div>

                        <div class="flex space-x-8 mt-16 text-muted-foreground">
                            <div>
                                <div
                                    class="text-2xl font-bold text-foreground mb-2"
                                >
                                    Handpicked vehicles
                                </div>
                                <p class="leading-relaxed">
                                    Each car is chosen based on condition,
                                    comfort, and value — never at random.
                                </p>
                            </div>
                            <div>
                                <div
                                    class="text-2xl font-bold text-foreground mb-2"
                                >
                                    End-to-end support
                                </div>
                                <p class="leading-relaxed">
                                    We stay with you from the first conversation
                                    to the moment the keys are in your hand.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div
                            class="rounded-lg overflow-hidden shadow-md border border-border"
                        >
                            <img
                                src="https://t3.ftcdn.net/jpg/05/39/65/40/360_F_539654005_M7XZRGAG3TAarymgapSSgSUdgkNKQL2G.jpg"
                                alt="Modern Japanese car on the road at night"
                                class="w-full h-auto object-cover max-h-96"
                            />
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Story -->
            <section class="section-spacing">
                <div
                    class="container container-custom grid lg:grid-cols-2 gap-12 items-center"
                >
                    <div class="relative order-first lg:order-none">
                        <img
                            src="https://hips.hearstapps.com/hmg-prod/images/two-people-reaching-an-agreement-about-a-car-sale-royalty-free-image-1665671206.jpg"
                            alt="Customer receiving keys to a new car"
                            class="w-full h-auto rounded-lg shadow-md object-cover"
                        />
                    </div>

                    <div class="space-y-6">
                        <h2
                            class="text-3xl lg:text-4xl font-bold text-primary mb-6"
                        >
                            Our story
                        </h2>
                        <div
                            class="space-y-4 text-muted-foreground leading-relaxed"
                        >
                            <p>
                                Kodithuwakku Auto grew from a simple idea:
                                buying a vehicle from overseas should feel as
                                comfortable and clear as buying one from just
                                down the road. No confusion, no pressure, and no
                                surprises — only honest guidance and vehicles
                                you can rely on.
                            </p>
                            <p>
                                Over the years, we’ve built relationships with
                                trusted partners, learned what truly matters to
                                drivers, and refined a process that balances
                                Japanese engineering quality with local
                                expectations, roads, and lifestyles.
                            </p>
                        </div>

                        <div
                            class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-16"
                        >
                            <div>
                                <h3
                                    class="text-xl font-semibold text-foreground mb-2"
                                >
                                    Built on trust
                                </h3>
                                <p
                                    class="text-muted-foreground leading-relaxed"
                                >
                                    We treat every vehicle as if we were
                                    choosing it for ourselves. That means clear
                                    communication, honest opinions, and always
                                    putting your long-term satisfaction ahead of
                                    a quick sale.
                                </p>
                            </div>
                            <div>
                                <h3
                                    class="text-xl font-semibold text-foreground mb-2"
                                >
                                    Guided by detail
                                </h3>
                                <p
                                    class="text-muted-foreground leading-relaxed"
                                >
                                    We pay attention to the details that matter:
                                    condition, history, comfort, and how the
                                    vehicle will really feel to live with every
                                    day — not just how it looks in photos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- What We Do -->
            <section id="services" class="section-spacing bg-secondary/30">
                <div class="container container-custom">
                    <div class="text-center mb-6">
                        <h2
                            class="text-3xl lg:text-4xl font-bold text-primary mb-6"
                        >
                            What we do
                        </h2>
                        <p class="text-muted-foreground leading-relaxed">
                            From the first idea of your next vehicle to the
                            moment you drive away, we provide a complete,
                            carefully managed experience that keeps you informed
                            and in control.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mt-16">
                        <div
                            class="bg-card border border-border rounded-lg shadow-sm px-8 py-8 space-y-4"
                        >
                            <h3
                                class="text-xl font-semibold text-foreground mb-2"
                            >
                                Vehicle sourcing & advice
                            </h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Tell us what you’re looking for — size, budget,
                                purpose — and we help you understand which
                                Japanese models fit your needs, with clear pros
                                and cons for each option.
                            </p>
                        </div>

                        <div
                            class="bg-card border border-border rounded-lg shadow-sm px-8 py-8 space-y-4"
                        >
                            <h3
                                class="text-xl font-semibold text-foreground mb-2"
                            >
                                Condition checks & preparation
                            </h3>
                            <p class="text-muted-foreground leading-relaxed">
                                We focus on condition, mileage, and maintenance
                                history, so the vehicle that arrives is ready
                                for your daily life — not just for photos. We
                                guide you through every important detail.
                            </p>
                        </div>

                        <div
                            class="bg-card border border-border rounded-lg shadow-sm px-8 py-8 space-y-4"
                        >
                            <h3
                                class="text-xl font-semibold text-foreground mb-2"
                            >
                                Paperwork, shipping & handover
                            </h3>
                            <p class="text-muted-foreground leading-relaxed">
                                Documentation, shipping coordination, and final
                                handover are all handled for you. You focus on
                                choosing the right car; we handle the complex
                                steps in the background.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Why Choose Us -->
            <section id="why-choose" class="section-spacing">
                <div class="container container-custom">
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start"
                    >
                        <div class="space-y-6">
                            <h2
                                class="text-3xl lg:text-4xl font-bold text-primary mb-6"
                            >
                                Why drivers choose Kodithuwakku Auto
                            </h2>
                            <p class="text-muted-foreground leading-relaxed">
                                Choosing a vehicle from another country can feel
                                overwhelming. Our role is to make it calm,
                                clear, and comfortable — with a team that treats
                                your purchase with real respect.
                            </p>

                            <div class="space-y-4">
                                <div class="flex space-x-2">
                                    <div
                                        class="h-8 w-8 flex items-center justify-center rounded-lg bg-primary text-primary-foreground font-bold"
                                    >
                                        1
                                    </div>
                                    <div>
                                        <p
                                            class="font-semibold text-foreground mb-2"
                                        >
                                            Straightforward guidance
                                        </p>
                                        <p
                                            class="text-muted-foreground leading-relaxed"
                                        >
                                            We avoid confusing jargon and
                                            explain every choice in simple,
                                            practical language so you always
                                            know what you are deciding.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex space-x-2">
                                    <div
                                        class="h-8 w-8 flex items-center justify-center rounded-lg bg-primary text-primary-foreground font-bold"
                                    >
                                        2
                                    </div>
                                    <div>
                                        <p
                                            class="font-semibold text-foreground mb-2"
                                        >
                                            Clear, honest pricing
                                        </p>
                                        <p
                                            class="text-muted-foreground leading-relaxed"
                                        >
                                            All expected costs are discussed
                                            upfront, so you understand the full
                                            picture before you commit.
                                            Transparency is more important than
                                            shortcuts.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex space-x-2">
                                    <div
                                        class="h-8 w-8 flex items-center justify-center rounded-lg bg-primary text-primary-foreground font-bold"
                                    >
                                        3
                                    </div>
                                    <div>
                                        <p
                                            class="font-semibold text-foreground mb-2"
                                        >
                                            Ongoing support
                                        </p>
                                        <p
                                            class="text-muted-foreground leading-relaxed"
                                        >
                                            Our relationship does not end at
                                            handover. We remain available to
                                            answer questions, offer guidance,
                                            and support you as you get to know
                                            your new vehicle.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-16 lg:mt-0"
                        >
                            <div
                                class="bg-card border border-border rounded-lg shadow-sm px-8 py-8 space-y-2"
                            >
                                <p
                                    class="text-xl font-semibold text-foreground mb-2"
                                >
                                    People-first approach
                                </p>
                                <p
                                    class="text-muted-foreground leading-relaxed"
                                >
                                    We listen carefully before we recommend
                                    anything. Your lifestyle, roads, and budget
                                    shape our advice.
                                </p>
                            </div>
                            <div
                                class="bg-card border border-border rounded-lg shadow-sm px-8 py-8 space-y-2"
                            >
                                <p
                                    class="text-xl font-semibold text-foreground mb-2"
                                >
                                    Respect for your time
                                </p>
                                <p
                                    class="text-muted-foreground leading-relaxed"
                                >
                                    We handle the heavy work — coordination,
                                    checks, and follow-ups — so you can focus on
                                    daily life while your vehicle is being
                                    arranged.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final CTA -->
            <section class="section-spacing">
                <div class="container container-custom text-center">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                        Ready to start your next drive?
                    </h2>
                    <p
                        class="leading-relaxed mx-auto max-w-full text--foreground"
                    >
                        Tell us the kind of vehicle you have in mind, and we’ll
                        help you turn it into a confident, well-guided purchase
                        — with every step handled with care.
                    </p>

                    <div class="flex justify-center space-x-2 mt-16">
                        <a
                            href="#about"
                            class="bg-card text-foreground rounded-lg px-8 py-4 font-semibold shadow-md transition-colors hover:text-primary"
                        >
                            Learn more about us
                        </a>
                        <a
                            href="#services"
                            class="border border-border bg-primary text-primary-foreground rounded-lg px-8 py-4 font-semibold shadow-sm transition-colors hover:text-primary-foreground"
                        >
                            Explore how we help
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script>
export default {
    name: "VueIndex",

    mounted() {
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
                const target = document.querySelector(
                    this.getAttribute("href")
                );
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            });
        });
    },
};
</script>

<style scoped>
/* Professional Japanese Car Design System */
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

/* new: basic border utility */
.border {
    border-width: 1px;
    border-style: solid;
}

.text-primary {
    color: #061775 !important;
}

.bg-primary {
    background-color: hsla(207, 61%, 25%, 0.122);
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
    transition: color 0.3s ease, background-color 0.3s ease,
        border-color 0.3s ease;
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

/* new: 3-column grid on large screens */
@media (min-width: 1024px) {
    .lg\:grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

.gap-12 {
    gap: 3rem;
}

.items-center {
    align-items: center;
}

/* new: align items to flex-start */
.items-start {
    align-items: flex-start;
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

/* new: allow flex wrapping */
.flex-wrap {
    flex-wrap: wrap;
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
    filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04))
        drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
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
