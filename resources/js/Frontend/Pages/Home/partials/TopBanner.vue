<template>
    <div class="hero">
        <div class="hero-content">
            <div class="hero-heading">
                <h1>DISCOVER. <span class="faded">COMPARE. BUY</span></h1>
                <h2>KICK OFF YOUR CAR JOURNEY.</h2>
                <Filter :reload="false" />
            </div>

            <section class="hero-section">
                <div class="hero-content">
                    <form
                        id="searchForm"
                        class="search-form"
                        @submit.prevent="onSearch"
                    >
                        <div class="search-row mt-n2">
                            <div class="search-field custom-dropdown">
                                <button
                                    type="button"
                                    @click="toggleMakeDropdown"
                                    class="dropdown-btn"
                                >
                                    {{ selectedMake.label || "Make" }}
                                </button>

                                <ul
                                    v-show="showMakeDropdown"
                                    class="dropdown-list wide-dropdown"
                                >
                                    <li
                                        v-for="(make, index) in makes"
                                        :key="index"
                                        @click="selectMake(make)"
                                    >
                                        <div class="dropdown-item">
                                            <span class="dropdown-text">{{
                                                make.label
                                            }}</span>
                                            <img
                                                v-if="
                                                    make.media &&
                                                    make.media.length > 0
                                                "
                                                :src="
                                                    make.media[0].original_url
                                                "
                                                height="20"
                                                class="ps-2"
                                                alt=""
                                            />
                                        </div>
                                    </li>
                                </ul>

                                <input
                                    type="hidden"
                                    id="make"
                                    name="make"
                                    :value="selectedMake.value"
                                />
                            </div>

                            <div class="search-field custom-dropdown">
                                <button
                                    type="button"
                                    @click="toggleModelDropdown"
                                    class="dropdown-btn"
                                >
                                    {{ selectedModel.label || "Model" }}
                                </button>
                                <ul
                                    v-show="showModelDropdown"
                                    class="dropdown-list wide-dropdown"
                                >
                                    <li
                                        v-if="models.length === 0"
                                        class="dropdown-item disabled"
                                    >
                                        <span class="dropdown-text"
                                            >No models available</span
                                        >
                                    </li>
                                    <li
                                        v-for="(model, idx) in models"
                                        :key="idx"
                                        @click="selectModel(model)"
                                    >
                                        <div class="dropdown-item">
                                            <span class="dropdown-text">{{
                                                model.label
                                            }}</span>
                                        </div>
                                    </li>
                                </ul>
                                <input
                                    type="hidden"
                                    id="model"
                                    name="model"
                                    :value="selectedModel.value"
                                />
                            </div>

                            <div class="search-field custom-dropdown">
                                <button
                                    type="button"
                                    @click="toggleTypeDropdown"
                                    class="dropdown-btn"
                                >
                                    {{ selectedType.label || "Type" }}
                                </button>
                                <ul
                                    v-show="showTypeDropdown"
                                    class="dropdown-list wide-dropdown"
                                >
                                    <li
                                        v-for="(type, idx) in vehicleTypes"
                                        :key="idx"
                                        @click="selectType(type)"
                                    >
                                        <div class="dropdown-item">
                                            <span class="dropdown-text">{{
                                                type.label
                                            }}</span>
                                            <img
                                                :src="
                                                    type?.media?.length > 0
                                                        ? type?.media[0]
                                                              .original_url
                                                        : ''
                                                "
                                                height="20"
                                                class="ps-2"
                                                alt=""
                                            />
                                        </div>
                                    </li>
                                </ul>
                                <input
                                    type="hidden"
                                    id="model"
                                    name="model"
                                    :value="selectedType.value"
                                />
                            </div>

                            <div class="search-field">
                                <input
                                    type="text"
                                    id="engineCC"
                                    placeholder="Engine CC (More Than)"
                                    v-model="form.engineCC"
                                />
                            </div>

                            <button
                                type="submit"
                                class="d-none d-lg-flex align-items-center justify-content-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </button>

                            <div class="search-field d-lg-none">
                                <button type="submit" class="search-submit">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import Filter from "../../Home/partials/Filter.vue";

export default {
    components: {
        // Filter
    },
    name: "HeroComponent",
    props: {
        manufactures: {
            type: Array,
            default: () => [],
        },
        models: {
            type: Array,
            default: () => [],
        },
        vehicleTypes: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            form: {
                from: "",
                to: "",
                engineCC: "",
            },
            showMakeDropdown: false,
            selectedMake: {},
            showModelDropdown: false,
            selectedModel: {},
            showTypeDropdown: false,
            selectedType: {},
        };
    },
    computed: {
        makes() {
            if (!this.manufactures) return [];
            return this.manufactures.map((item) => {
                return {
                    value: item.id,
                    label: item.title,
                    media: item.media || [],
                };
            });
        },
        models() {
            if (!this.models) return [];
            return this.models.map((item) => {
                return {
                    value: item.id,
                    label: item.title,
                };
            });
        },
        vehicleTypes() {
            if (!this.vehicleTypes) return [];
            return this.vehicleTypes.map((item) => {
                return {
                    value: item.id,
                    label: item.title,
                    media: item.media || [],
                };
            });
        },
    },
    methods: {
        toggleMakeDropdown() {
            this.showMakeDropdown = !this.showMakeDropdown;
            this.showModelDropdown = false;
        },
        toggleModelDropdown() {
            this.showModelDropdown = !this.showModelDropdown;
            this.showMakeDropdown = false;
        },
        toggleTypeDropdown() {
            this.showTypeDropdown = !this.showTypeDropdown;
            this.showMakeDropdown = false;
            this.showModelDropdown = false;
        },
        selectMake(make) {
            this.selectedMake = make;
            this.showMakeDropdown = false;

            if (!this.selectedMake.value) {
                return;
            }
            this.$inertia.reload({
                method: "POST",
                data: {
                    _method: "GET",
                    brand: this.selectedMake.value,
                },
            });
        },

        selectModel(model) {
            this.selectedModel = model;
            this.showModelDropdown = false;

            if (!this.selectedModel.value) {
                return;
            }

            this.$inertia.reload({
                method: "POST",
                data: {
                    _method: "GET",
                    brand: this.selectedMake.value,
                    model: this.selectedModel.value,
                },
            });
        },

        selectType(type) {
            this.selectedType = type;
            this.showTypeDropdown = false;
        },
        onSearch() {
            const payload = {
                brand: this.selectedMake.value || "",
                model: this.selectedModel.value || "",
                type: this.selectedType.value || "",
                engineCC: this.form.engineCC || "",
            };

            this.$inertia.visit(route("available"), {
                data: { _method: "GET", ...payload },
                method: "POST",
            });
        },
    },
};
</script>

<style scoped>
.search-submit {
    width: 100%;
    padding: 0.5rem;
    font-size: 1.2rem;
    line-height: 1.2;
    box-sizing: border-box;

    color: #fff;
    background: transparent;
    border: 1px solid #fff;
    border-radius: 6px;

    text-align: center;
}

/* make absolutely sure no pseudo-arrow shows */
.search-submit::after {
    display: none !important;
    content: none !important;
}

.search-form {
    background-color: transparent;
    border: 1px solid #ffffff;
}

.dropdown-list {
    position: absolute;
    top: calc(100% + 2px);
    left: 0;
    list-style: none;
    margin: 0;
    padding: 8px 0;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    width: 220px;
    max-height: 300px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #b0b0b0 #ffffff;
}

.dropdown-list::-webkit-scrollbar {
    width: 6px;
}

.dropdown-list::-webkit-scrollbar-track {
    background: #ffffff;
}

.dropdown-list::-webkit-scrollbar-thumb {
    background: #b0b0b0;
    border-radius: 3px;
}

.dropdown-list::-webkit-scrollbar-thumb:hover {
    background: #909090;
}

.dropdown-list li {
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.dropdown-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 12px;
    color: #333;
    font-size: 0.95rem;
    font-weight: 400;
    /* border-bottom: 1px solid #f0f0f0; */
}

.dropdown-item:last-child {
    border-bottom: none;
}

.dropdown-item:hover {
    /* background-color: #f5f5f5; */
    border-radius: 4px;
}

.dropdown-text {
    text-align: left;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.ps-2 {
    margin-left: 8px;
}

.dropdown-item img {
    height: 20px;
    width: auto;
    object-fit: contain;
    border-radius: 2px;
}

/*
.hero {
  position: relative;
  height: clamp(300px, 50vh, 600px);
  display: flex;
  align-items: flex-start;    /* keep your H1/H2 at the top */
/* justify-content: center;


  padding-top: 60px;          /* room for the headings */
/* remove the old padding-bottom */

/* background-image: url('/images/Assets/mm.png');
  background-size: cover;
  background-position: center;
   background-attachment: fixed;
    height: min(650px, 100vh);
}
*/
.hero {
    background-image: url("/images/Assets/car1.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; /* we will override this on mobile */
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding-top: 60px;
    position: relative;
    color: white;
    height: auto;
    min-height: 650px;
    max-height: 700px;
}

.hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #0b0a6480;
    z-index: 0;
}

.hero > * {
    position: relative;
    z-index: 1;
    color: white;
}

.hero-section {
    position: relative;
    top: -170px;
}

@media (max-width: 1145px) {
    .hero {
        height: auto;
        padding-bottom: 100px;
        background-attachment: fixed;
    }

    .hero-section {
        top: -100px; /* instead of -170px */
    }
}

@media (max-width: 768px) {
    /* 1) Wrap and stack the search row */
    .search-row {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
    }

    /* 2) Make each field and the submit button full-width */
    .search-field,
    .search-row > button {
        flex: 1 1 100%;
        min-width: auto;
    }

    /* 3) Keep the form from touching the very edges */
    .hero-section .hero-content {
        padding: 0 1rem;
    }
    .search-form {
        width: 100%;
    }

    /* 4) Match dropdown menus to their control’s width */
    .dropdown-list {
        position: absolute;
        width: 100% !important;
        left: 0 !important;
    }

    .hero {
        background-attachment: scroll;
        min-height: 1100px;
        padding-top: 80px;
        padding-bottom: 80px;
    }
}

.hero > .hero-content {
    position: relative; /* you already have this from .hero>* */
    z-index: 1100; /* must be > navbar’s z-index (≈1000) */
}

/* --------------------------------------------------
   Tablet (up to 992px)
   – slightly narrower form, smaller gutters
-------------------------------------------------- */
@media (max-width: 992px) {
    .hero {
        /* keep the same clamp height but add a bit more top padding */
        padding-top: 80px;
        height: clamp(300px, 55vh, 550px);
    }
    .hero-heading h1 {
        font-size: 2.5rem; /* shrink headline */
    }
    .hero-heading h2 {
        font-size: 1.2rem; /* shrink subhead */
    }
    .hero-section {
        max-width: 90%; /* give it more breathing room */
    }
    .search-row {
        gap: 0.25rem;
    }
    .search-field {
        padding: 0 0.5rem;
    }
}

/* --------------------------------------------------
   Phablet / small tablets (up to 768px)
   – stack fields, full-width controls
-------------------------------------------------- */
@media (max-width: 995px) {
    .hero {
        padding-top: 60px;
        height: clamp(250px, 60vh, 450px);
    }
    .hero-heading {
        text-align: center;
        margin-bottom: 1rem;
    }
    .hero-heading h1 {
        font-size: 2rem;
    }
    .hero-heading h2 {
        font-size: 1rem;
    }

    .hero-section {
        position: static;
        transform: none;
        margin: 0 auto;
        top: auto;
        left: auto;
        width: 95%;
        padding: 0 1rem;
    }

    .search-row {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
        align-items: stretch; /* ← force children to equal height */
    }

    .search-field,
    .search-row > button {
        flex: 1 1 100%;
    }

    .search-field input,
    .dropdown-btn {
        width: 100%;
    }
    /* .search-row > button {

    background-color: transparent !important;
    border: 1px solid #ffffff !important;

    color: #ffffff;
    border: none;
    border-radius: 6px;
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height:1.4;

  } */

    /* .search-row > button svg {
    display: none;
  }


  .search-row > button::after {
    content: "Search";
  } */
}

/* --------------------------------------------------
   Mobile (up to 576px)
   – tiny tweaks for very small screens
-------------------------------------------------- */
@media (max-width: 996px) {
    .hero-heading h1 {
        font-size: 1.6rem;
    }
    .hero-heading h2 {
        font-size: 0.9rem;
    }
    .search-row {
        gap: 0.25rem;
    }
    .dropdown-btn,
    .search-field input {
        font-size: 0.9rem;
        padding: 0.5rem;
    }
}

/* === Super-small phones (iPhone SE / 320–375px) === */
@media (max-width: 375px) {
    .hero {
        /* keep it from taking up too much screen */
        height: clamp(500px, 40vh, 300px);
        padding-top: 40px;
    }
    .hero-heading {
        text-align: center;
        margin-bottom: 0.5rem;
    }
    .hero-heading h1 {
        font-size: 1.4rem;
        line-height: 1.2;
    }
    .hero-heading h2 {
        font-size: 0.8rem;
        line-height: 1.2;
    }

    .hero-section {
        /* flow under the headings instead of using negative top */
        position: static;
        transform: none;
        margin: 0 auto 1rem;
        width: 95%;
        padding: 0 0.5rem;
    }

    .search-row {
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
    }
    .search-field,
    .search-row > button {
        flex: 1 1 100%;
    }

    .dropdown-btn,
    .search-field input {
        width: 100%;
        font-size: 0.85rem;
        padding: 0.5rem 0.75rem;
    }

    /* make the submit button full-width so it lines up */
    .search-row > button {
        display: flex;
        justify-content: center;
        padding: 0.5rem;
    }
}

@media (min-width: 769px) and (max-width: 1286px) {
    .hero {
        min-height: 850px;
        padding-top: 80px;
        background-attachment: scroll;
        background-position: center center;
    }

    .hero-heading h1 {
        font-size: 4rem;
    }

    .hero-heading h2 {
        font-size: 1.5rem;
    }
}

/* desktop and up: push heading down */
@media (min-width: 992px) {
    .hero-heading {
        margin-top: 3.9rem;
    }
}

@media (max-width: 768px) {
    .hero-heading {
        margin-top: 1rem;
    }

    .hero-heading h1 {
        font-size: 2.6rem;
    }

    .hero-heading h2 {
        font-size: 1rem;
    }
}

@media (max-width: 668px) {
    .hero-heading {
        margin-top: 2rem;
    }

    .hero-heading h1 {
        font-size: 1.6rem;
    }

    .hero-heading h2 {
        font-size: 1rem;
    }
}
</style>
