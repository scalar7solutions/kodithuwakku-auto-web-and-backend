<template>
    <div :class="className">
        <select
            class="select2 form-control form-select"
            :id="id"
            :multiple="isMultiple"
            v-model="model"
            placeholder="--Select--"
            :required="isRequired"
        >
            <!-- <option selected value="" disabled>-- Select --</option> -->
            <option
                :value="option.id"
                v-for="option in options"
                :key="option.id"
            >
                {{ option.name ? option.name : option.title }}
            </option>
        </select>
        <div class="text-danger">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: {
            type: String,
            required: true,
        },
                className:{
            type: String,
            default:""
        },
        error: {
            type: String,
            default: "",
        },
        placeholder: {
            type: String,
            default: "",
        },
        isRequired: {
            type: Boolean,
            default: true,
        },
        isMultiple: {
            type: Boolean,
            default: false,
        },
        options: {
            type: Array,
            default: [],
        },
        modelValue: {
            default: "",
        },
    },
    data() {
        return {
            model: this.modelValue,
            input: null,
        };
    },
    mounted() {
        this.input = $(this.$el)
        .find("select")
        .select2({
        placeholder: this.placeholder,
        minimumResultsForSearch: 1,
        width: '100%',                        
        dropdownParent: $(this.$el)
            .closest('.filter-wrapper'),         
        })
            .on("select2:select select2:unselect", (evt) => {
                this.$emit("update:model-value", $(evt.target).val());
                this.$emit("change");
            });
        // var thisFn = this;
        // $(".select2").select2({'placeholder':this.placeholder});
        // $(".filter-search").on(
        //     "change",
        //     "#" + thisFn.id,
        //     function (evt) {
        //         thisFn.$emit("update:model-value", $(evt.target).val());
        //         thisFn.$emit("change");
        //     }
        // );
    },
    beforeUnmount() {
        this.input.select2("destroy");



        
    },
    emits: ['update:model-value', 'change'],
    // watch: {
    //     modelValue(currentValue) {
    //         this.model = currentValue;
    //     },
    // },
    watch: {
        modelValue(currentValue) {
            this.model = currentValue;
            this.input.val([currentValue]);
            this.input.trigger("change");
        },
    },
};
</script>

<style>

.select2-container {
  width: 100% !important;
  height: 40px;
  font-size: 14px;
  color: rgb(0, 0, 0);
  border: 1px solid #cccccc00;
}


.select2-dropdown {
  background-color: white;
  border: 1px solid #ccc;
}

.select2-results__option {
  padding: 8px 12px;
  font-size: 14px;
}

</style>
