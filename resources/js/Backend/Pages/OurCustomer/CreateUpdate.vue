<template>
  <AppLayout>
    <div class="row">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h5>Our Customers</h5>
          <p>Manage Our Customers.</p>
        </div>
        <hr />
        <div class="card-body">
          <form id="formOurCustomer" @submit.prevent="submit">
            <div class="row">
              <!-- Customer Name -->
              <div class="mb-3 col-md-6">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input
                  class="form-control"
                  type="text"
                  id="customer_name"
                  name="customer_name"
                  v-model="form.customer_name"
                />
                <div class="text-danger">
                  {{ form.errors.customer_name }}
                </div>
              </div>

              <!-- Purchased Vehicle Manufacture -->
              <div class="mb-3 col-md-6">
                <SelectInputComponentVue
                  class="w-100"
                  id="manufacture_name"
                  label="Purchased Vehicle Manufacture"
                  v-model="form.manufacture_name"
                  :options="manufacture"
                  @change="getModels"
                />
                <div class="text-danger">
                  {{ form.errors.manufacture_name }}
                </div>
              </div>

              <!-- Purchased Vehicle Model -->
              <div class="mb-3 col-md-6">
                <SelectInputComponentVue
                  class="w-100"
                  id="model"
                  label="Purchased Vehicle Model"
                  v-model="form.model"
                  :options="model"
                />
                <div class="text-danger">
                  {{ form.errors.model }}
                </div>
              </div>

              <!-- Status -->
              <div class="mb-3 col-md-6">
                <SelectInputComponentVue
                  id="status"
                  label="Status"
                  :error="form.errors.status"
                  :options="[
                    { id: '1', name: 'Active' },
                    { id: '0', name: 'Inactive' },
                  ]"
                  v-model="form.status"
                />
              </div>

              <!-- Customer Image -->
              <div class="mb-3 col-md-6">
                <label for="customer_image" class="form-label me-3">Customer Image</label>
                <br />
                <FileInputComponent
                  :isRequired="false"
                  id="customer_image"
                  :prvImage="Customer_Image"
                  v-model="form.customer_image"
                />
                <div class="text-danger">
                  {{ form.errors.customer_image }}
                </div>
              </div>
            </div>

            <div class="mt-2">
              <button type="submit" class="btn btn-main me-2" :disabled="form.processing">
                {{ ourcustomer ? "Update" : "Save" }}
              </button>
              <Link class="btn btn-outline-danger" :href="route('ourcustomer.index')">
                Cancel
              </Link>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import { Link, useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import FileInputComponent from "@/Components/FileInputComponent.vue";
import SelectInputComponentVue from "@/Components/SelectInputComponent.vue";

export default {
  components: {
    Link,
    AppLayout,
    FileInputComponent,
    SelectInputComponentVue,
  },

  props: {
    ourcustomer: {
      type: Object,
      default: null,
    },
    manufacture: {
      type: Array,
      default: () => [],
    },
    model: {
      type: Array,
      default: () => [],
    },
  },

  data() {
    return {
      form: useForm({
        id: "",
        customer_name: "",
        manufacture_name: "",
        model: "",
        status: "1",
        customer_image: "",
      }),
    };
  },

  mounted() {
    if (this.ourcustomer) {
      this.form.id = this.ourcustomer.id;
      this.form.customer_name = this.ourcustomer.customer_name;
      this.form.manufacture_name = this.ourcustomer.manufacture_id;
      this.form.model = this.ourcustomer.vehicle_model_id;
      this.form.status = String(this.ourcustomer.status ?? "1");
    }
  },

  computed: {
    Customer_Image() {
      if (this.ourcustomer && this.ourcustomer.media && this.ourcustomer.media.length > 0) {
        const mainImage = this.ourcustomer.media.find(
          (media) => media.custom_properties?.type === "ourcustomer_main"
        );
        return mainImage ? mainImage.original_url : "";
      }
      return "";
    },
  },

  methods: {
    getModels() {
      // Same pattern as Vehicle CreateUpdate: reload with manufacture_id
      this.$inertia.reload({
        method: "POST",
        data: {
          _method: "GET",
          manufacture_id: this.form.manufacture_name,
        },
      });
    },

    submit() {
      const url = this.ourcustomer ? route("ourcustomer.update") : route("ourcustomer.store");

      this.form.post(url, {
        onSuccess: () => {
          this.$root.showMessage(
            "success",
            '<span class="text-success">Success</span><br/>',
            this.ourcustomer
              ? "Customer updated successfully!"
              : "Customer created successfully!"
          );
        },
        onError: () => {
          this.$root.showMessage(
            "error",
            '<span class="text-danger">Error</span><br>',
            "Something went wrong! "
          );
        },
        
      });
    },
  },
};
</script>
