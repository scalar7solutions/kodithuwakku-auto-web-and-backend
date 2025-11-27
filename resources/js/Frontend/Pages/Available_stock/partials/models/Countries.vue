<template>
    <div>
        <div v-for="country in countries" :key="country.id" class="form-check">
            <input class="form-check-input" type="checkbox" :value="country.id" v-model="selectedCountries"
                @change="updateFilter" />
            <label class="form-check-label">
                {{ country.name }}
                <img :src="country?.media?.length > 0 ? country?.media[0].original_url : ''" height="15" class="ps-4" alt="">
            </label>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        countries: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            selectedCountries: this.$page.props.requestQuery.country
                ? Array.isArray(this.$page.props.requestQuery.country)
                    ? this.$page.props.requestQuery.country
                    : [this.$page.props.requestQuery.country]
                : [],
        };
    },
    methods: {
        updateFilter() {
            const selectedCountry = this.countries.find(country => country.id === parseInt(this.selectedCountries[0]));
            const countrySlug = selectedCountry ? selectedCountry.name.toLowerCase().replace(/\s+/g, '-') : '';
            const url = countrySlug ? `/available-cars/${countrySlug}` : '/available-cars';

            this.$inertia.visit(url, {
                method: 'get',
                preserveState: true,
                preserveScroll: true,
            });
        },
    },
};
</script>