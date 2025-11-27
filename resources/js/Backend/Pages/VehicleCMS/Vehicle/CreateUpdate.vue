<template>
  <AppLayout>
    <div class="row">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h5>Vehicle Manufacture</h5>
          <p>Manage Vehicle Manufacture.</p>
        </div>
        <hr />
        <div class="card-body">
          <form id="formAccountSettings" @submit.prevent="submit">
            <div class="row">
              <!-- <div class="mb-3 col-md-6">
                <label for="type" class="form-label">Vehicle type</label>
                <input
                  class="form-control"
                  type="text"
                  id="vehicle_type"
                  name="vehicle_type"
                  v-model="form.vehicle_type"
                />
                <div class="text-danger">
                  {{ form.errors.vehicle_type }}
                </div>
              </div> -->

              <div class="mb-3 col-md-6">
                <SelectInputComponentVue class="w-100" id="vehicle_type" label="Vehicle type"
                  v-model="form.vehicle_type" :options="type" />
              </div>

              <!-- <div class="mb-3 col-md-6">
                <label for="manufacture" class="form-label"
                  >Manufacture Name</label
                >
                <input
                  class="form-control"
                  type="text"
                  id="manufacture_name"
                  name="manufacture_name"
                  v-model="form.manufacture_name"
                />
                <div class="text-danger">
                  {{ form.errors.manufacture_name }}
                </div>
              </div> -->

              <div class="mb-3 col-md-6">
                <SelectInputComponentVue class="w-100" id="manufacture_name" label="Manufacture Name"
                  v-model="form.manufacture_name" :options="manufacture" @change="getModels" />
              </div>

              <!-- <div class="mb-3 col-md-6">
                <label for="ex_color" class="form-label">Ex color</label>
                <input
                  class="form-control"
                  type="text"
                  id="ex_color"
                  name="ex_color"
                  v-model="form.ex_color"
                />
                <div class="text-danger">
                  {{ form.errors.ex_color }}
                </div>
              </div> -->

              <div class="mb-3 col-md-6">
                <SelectInputComponentVue class="w-100" id="model" label="Model" v-model="form.model" :options="model" />
              </div>

              <div class="mb-3 col-md-6">
                <SelectInputComponentVue class="w-100" id="ex_color" label="Ex color" v-model="form.ex_color"
                  :options="color" />
              </div>

              <!-- <div class="mb-3 col-md-6">
                <label for="in_color" class="form-label">In color</label>
                <input
                  class="form-control"
                  type="text"
                  id="in_color"
                  name="in_color"
                  v-model="form.in_color"
                />
                <div class="text-danger">
                  {{ form.errors.in_color }}
                </div>
              </div> -->

              <div class="mb-3 col-md-6">
                <SelectInputComponentVue class="w-100" id="in_color" label="In color" v-model="form.in_color"
                  :options="color" />
              </div>
              <div class="mb-3 col-md-6">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                  <span class="input-group-text">$ USD</span>
                  <input class="form-control" type="text" id="price" name="price" v-model="form.price" />
                </div>
                <div class="text-danger">
                  {{ form.errors.price }}
                </div>
              </div>

              <!-- <div class="mb-3 col-md-12">
                <label for="url" class="form-label">SEO URL</label>
                <input class="form-control" type="text" id="seo_url" name="seo_url" v-model="form.seo_url" />
                <div class="text-danger">
                  {{ form.errors.seo_url }}
                </div>
              </div> -->

              <!-- checkboxes  -->
              <div class="mb-3 col-md-12">
                <label class="form-label">Features</label>
                <div class="features-container">
                  <div v-for="(feature, index) in features" :key="index" class="checkbox-container">
                    <input type="checkbox" :id="'feature-' + feature.id" :value="feature.id" v-model="form.features" />
                    <label :for="'feature-' + feature.id">{{
                      feature.name
                    }}</label>
                  </div>
                </div>
              </div>

              <SelectInputComponentVue id="transmission" label="Transmission" :error="form.errors.transmission"
                :options="[
                  {
                    id: 'Auto',
                    name: 'Auto',
                  },
                  {
                    id: 'Manual',
                    name: 'Manual',
                  },
                  {
                    id: 'Triptonic',
                    name: 'Triptonic',
                  },
                ]" v-model="form.transmission" />

              <div class="mb-3 col-md-6">
                <label for="year" class="form-label">Year</label>
                <input class="form-control" type="number" id="year" name="year" v-model="form.year" />
                <div class="text-danger">
                  {{ form.errors.year }}
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="chassis_no" class="form-label">Chassis No</label>
                <input class="form-control" type="text" id="chassis_no" name="chassis_no" v-model="form.chassis_no" />
                <div class="text-danger">
                  {{ form.errors.chassis_no }}
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="condition" class="form-label">Condition</label>
                <input class="form-control" type="text" id="condition" name="condition" v-model="form.condition" />
                <div class="text-danger">
                  {{ form.errors.condition }}
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="seats" class="form-label">Seats</label>
                <input class="form-control" type="number" id="seats" name="seats" v-model="form.seats" />
                <div class="text-danger">
                  {{ form.errors.seats }}
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="doors" class="form-label">Doors</label>
                <input class="form-control" type="number" id="doors" name="doors" v-model="form.doors" />
                <div class="text-danger">
                  {{ form.errors.doors }}
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="passengers" class="form-label">Passengers</label>
                <input class="form-control" type="number" id="passengers" name="passengers" v-model="form.passengers" />
                <div class="text-danger">
                  {{ form.errors.passengers }}
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="engine_capacity" class="form-label">Engine Capacity</label>
                <input class="form-control" type="text" id="engine_capacity" name="engine_capacity"
                  v-model="form.engine_capacity" />
                <div class="text-danger">
                  {{ form.errors.engine_capacity }}
                </div>
              </div>
              <SelectInputComponentVue id="used_status" label="Vehicle Status" :error="form.errors.used_status"
                :options="[
                  {
                    id: 'Brand New',
                    name: 'Brand New',
                  },
                  {
                    id: 'Used',
                    name: 'Used',
                  },
                ]" v-model="form.used_status" />

              <div class="mb-3 col-md-6" v-if="form.used_status === 'Used'">
                <label for="mileage" class="form-label">Mileage</label>
                <input class="form-control" type="number" id="mileage" name="mileage" v-model="form.mileage" />
                <div class="text-danger">{{ form.errors.mileage }}</div>
              </div>


              <SelectInputComponentVue id="fuel_type" label="Fuel Type" :error="form.errors.fuel_type" :options="[
                {
                  id: 'Diesel',
                  name: 'Diesel',
                },
                {
                  id: 'Petrol',
                  name: 'Petrol',
                },
                {
                  id: 'Hybrid',
                  name: 'Hybrid',
                },
                {
                  id: 'Electric',
                  name: 'Electric',
                },
              ]" v-model="form.fuel_type" />
              <SelectInputComponentVue id="drive_type" label="Drive Type" :error="form.errors.drive_type" :options="[
                {
                  id: 'Right Side Driving',
                  name: 'Right Side Driving',
                },
                {
                  id: 'Left Side Driving',
                  name: 'Left Side Driving',
                },
              ]" v-model="form.drive_type" />

              <!-- <div class="mb-3 col-md-6">
                <label for="drive_type" class="form-label">Drive Type</label>
                <input class="form-control" type="text" id="drive_type" name="drive_type" v-model="form.drive_type" />
                <div class="text-danger">
                  {{ form.errors.drive_type }}
                </div>
              </div> -->

              <div class="mb-3 col-md-6">
                <label for="auction_grade" class="form-label">Auction Grade</label>
                <input class="form-control" type="text" id="auction_grade" name="auction_grade"
                  v-model="form.auction_grade" />
                <div class="text-danger">
                  {{ form.errors.auction_grade }}
                </div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="interior_condition" class="form-label">Interior Condition</label>
                <input class="form-control" type="text" id="interior_condition" name="interior_condition"
                  v-model="form.interior_condition" />
                <div class="text-danger">
                  {{ form.errors.interior_condition }}
                </div>
              </div>

              <SelectInputComponentVue id="availability" label="Availability" :error="form.errors.availability"
                :options="[
                  {
                    id: 'Available',
                    name: 'Available',
                  },
                  {
                    id: 'Arriving',
                    name: 'Arriving',
                  },
                  {
                    id: 'Sold',
                    name: 'Sold',
                  },
                ]" v-model="form.availability" />

<div class="mb-3 col-md-6">
                <label for="monthly_price" class="form-label">Monthly Price</label>
                <!-- Input group with 'USD' prefix -->
                <div class="input-group">
                  <span class="input-group-text">USD</span>
                  <input
                    class="form-control"
                    type="text"
                    id="monthly_price"
                    name="monthly_price"
                    v-model="form.monthly_price"
                  />
                </div>
                <div class="text-danger">{{ form.errors.monthly_price }}</div>
              </div>

              <div class="mb-3 col-md-6">
                <label for="initial_payment" class="form-label">Initial Payment</label>
                <div class="input-group">
                  <span class="input-group-text">USD</span>
                  <input
                    class="form-control"
                    type="text"
                    id="initial_payment"
                    name="initial_payment"
                    v-model="form.initial_payment"
                  />
                </div>
                <div class="text-danger">{{ form.errors.initial_payment }}</div>
              </div>

              <div class="mb-3 col-md-11">
                <SelectInputComponentVue id="countries" label="Countries" v-model="form.countries"
                  :options="countriesOptions" :isMultiple="true" :isRequired="true" />
              </div>

              <!-- TinyMCE Editor -->
              <div>
                <Editor v-model="form.editorContent" :api-key="apiKey" :init="{
                  plugins:
                    'lists link image table code help wordcount',
                }" />
              </div>

              <div class="mb-3 col-md-6">
                <div class="mb-3 col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="image" class="form-label me-3">Main Image</label>
                      <br />
                      <FileInputComponent :isRequired="false" id="vehicle_image" :prvImage="Vehicle_Image"
                        v-model="form.vehicle_image" />
                      <div class="text-danger">{{ form.errors.vehicle_image }}</div>
                    </div>
                    <div class="col-md-6">
                    <!-- Image Upload Section -->
                    <div class="mb-4" style="padding: 0.5rem 4%;">
                      <h6>Gallery Images</h6>

                      <!-- Upload New Button -->
                      <div class="upload-button">
                        <label class="btn btn-outline-primary">
                          Upload Images
                          <input
                            type="file"
                            multiple
                            @change="handleImageUpload"
                            hidden
                          />
                        </label>
                      </div>

                      <div
                        class="image-upload-container mt-2"
                        v-if="form.uploaded_Images.length > 0"
                      >
                        <div class v-for="(image, index) in form.uploaded_Images" :key="index">
                          <div class="image-box">
                            <img :src="image.preview" alt="Uploaded Image" class="img-fluid" />
                            <button
                              type="button"
                              class="remove-btn"
                              @click="removeUploadedImage(index)"
                            >
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                      </div>

                      <!-- <p class="mt-2">Accepts images, videos, or 3D models</p> -->
                    </div>
                  </div>
                  </div>
                </div>
                <SelectInputComponentVue id="featured" label="Is Featured" :error="form.errors.featured" :options="[
                  {
                    id: '1',
                    name: 'Enable',
                  },
                  {
                    id: '0',
                    name: 'Disable',
                  },
                ]" v-model="form.featured" />

                <SelectInputComponentVue id="latest" label="Is Latest" :error="form.errors.latest" :options="[
                  {
                    id: '1',
                    name: 'Enable',
                  },
                  {
                    id: '0',
                    name: 'Disable',
                  },
                ]" v-model="form.latest" />

                <SelectInputComponentVue id="status" label="status" :error="form.errors.status" :options="[
                  {
                    id: '1',
                    name: 'Active',
                  },
                  {
                    id: '0',
                    name: 'Inactive',
                  },
                ]" v-model="form.status" />
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-main me-2" :disabled="form.processing">
                {{ vehicle ? "Update" : "Save" }}
              </button>
              <Link class="btn btn-outline-danger" :href="route('vehicle_manufacture.index')">Cancel</Link>
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
import SelectInputComponentVue from "../../../Components/SelectInputComponent.vue";
import Editor from "@tinymce/tinymce-vue";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

// import SuspendedUserAlert from "./Partials/SuspendedUserAlert.vue";

export default {
  components: {
    Link,
    AppLayout,
    FileInputComponent,
    // SuspendedUserAlert,
    SelectInputComponentVue,
    Editor,
  },
  // setup() {
  //   const apiKey = ref(import.meta.env.VITE_TINYMCE_API_KEY);
  //   return {
  //     apiKey
  //   }
  // },
  props: {
    errors: Object,
    allRoles: Object,
    backendUser: Object,
    branches: Array,
    features: Array,
    service_types: Object,
    vehicle_manufacture: Object,
    vehicle: Object,
    type: Object,
    manufacture: Object,
    color: Object,
    model: Object,
    countries: Array,
  },

  data() {
    return {
      apiKey: import.meta.env.VITE_TINYMCE_API_KEY,
      form: useForm({
        id: "",
        vehicle_type: "",
        manufacture_name: "",
        model: "",
        seo_url: "",
        ex_color: "",
        in_color: "",
        features: [],
        transmission: "",
        year: "",
        chassis_no: "",
        condition: "",
        seats: "",
        doors: "",
        passengers: "",
        engine_capacity: "",
        mileage: "",
        fuel_type: "",
        drive_type: "",
        auction_grade: "",
        interior_condition: "",
        availability: "",
        editorContent: "",
        featured: "",
        latest: "",
        status: "",
        vehicle_image: "",
        countries: [],
        price: "",
        used_status: "",
        monthly_price: "",
        initial_payment: "",
        uploaded_Images: []

      }),
      // password: useForm({
      //   id: "",
      //   confirm_password: "",
      //   password: "",
      //   password_confirmation: "",
      // }),
    };
  },
  mounted() {
    let self = this;

    if (this.vehicle) {
      this.form.id = this.vehicle.id;
      this.form.vehicle_type = this.vehicle.vehicle_type_id;
      this.form.manufacture_name = this.vehicle.manufacture_id;
      this.form.model = this.vehicle.vehicle_model_id;
      this.form.seo_url = this.vehicle.seo_url;
      this.form.ex_color = this.vehicle.ex_color;
      this.form.in_color = this.vehicle.in_color;
      this.form.features = this.vehicle.FeaturesList ?? [];
      this.form.transmission = this.vehicle.transmission;
      this.form.year = this.vehicle.year;
      this.form.chassis_no = this.vehicle.chassis_no;
      this.form.condition = this.vehicle.condition;
      this.form.seats = this.vehicle.seats;
      this.form.doors = this.vehicle.doors;
      this.form.passengers = this.vehicle.passengers;
      this.form.engine_capacity = this.vehicle.engine_capacity;
      this.form.mileage = this.vehicle.mileage;
      this.form.fuel_type = this.vehicle.fuel_type;
      this.form.drive_type = this.vehicle.drive_type;
      this.form.auction_grade = this.vehicle.auction_grade;
      this.form.interior_condition = this.vehicle.interior_condition;
      this.form.availability = this.vehicle.availability;
      this.form.editorContent = this.vehicle.editorContent;
      this.form.featured = this.vehicle.featured;
      this.form.latest = this.vehicle.latest;
      this.form.status = this.vehicle.status;
      this.form.countries = this.vehicle.countries || [];
      this.form.price = this.vehicle.price;
      this.form.used_status = this.vehicle.used_status;
      this.form.monthly_price = this.vehicle.monthly_price;
      this.form.initial_payment = this.vehicle.initial_payment;

      if (this.vehicle.media && this.vehicle.media.length > 0) {
        this.vehicle.media
          .filter(media => media.custom_properties?.type === "vehicle_gallery") // Filter by type
          .forEach(media => {
            this.form.uploaded_Images.push({
              file: media, // No file for existing images, just the URL
              preview: media.original_url // Assuming `original_url` contains the image URL
            });
          });
      }

    }
    // $(".card-body").on("change", "#role", function (evt) {
    //   self.form.role = $(evt.target).val();
    // });
    // $(".card-body").on("change", "#branch", function (evt) {
    //   self.form.branch = $(evt.target).val();
    // });
  },
  computed: {
    countriesOptions() {
      return this.countries.map((country) => ({
        id: country.id,
        name: country.name,
      }));
    },

    Vehicle_Image() {
      if (this.vehicle && this.vehicle.media.length > 0) {
        const mainImage = this.vehicle.media.find(
          media => media.custom_properties?.type === "vehicle_main"
        );
        return mainImage ? mainImage.original_url : "";
      }
      return "";
    }
  },
  methods: {
    handleImageUpload(event) {
      const files = Array.from(event.target.files);
      console.log(files);

      files.forEach(file => {
        // Check if the file is an image
        if (file && file.type.startsWith("image/")) {
          const reader = new FileReader();
          reader.onload = e => {
            // Push an object with both the file and the preview URL
            this.form.uploaded_Images.push({
              file: file,
              preview: e.target.result
            });
          };
          reader.readAsDataURL(file);
        } else {
          console.error("Selected file is not an image:", file);
        }
      });
    },
    // removeUploadedImage(index) {
    //   this.form.uploaded_Images.splice(index, 1);
    // },
    removeUploadedImage(index) {
      const image = this.form.uploaded_Images[index];
      console.log(image.file.original_url);
      if (image.file.original_url && image.preview) {
        Inertia.post(
          route("vehicle.image.remove"),
          {
            imageUrl: image.preview,
            product_id: this.vehicle.id
          },
          {
            onSuccess: () => {
              this.form.uploaded_Images.splice(index, 1);
            },
            onError: errors => {
              console.error("Error deleting image:", errors);
            }
          }
        );
      } else {
        this.form.uploaded_Images.splice(index, 1);
      }
    },


    getModels() {
      this.$inertia.reload({
        method: "POST",
        data: {
          _method: "GET",
          manufacture_id: this.form.manufacture_name,
        },
      });
    },
    submit() {
      this.form.post(
        this.vehicle ? route("vehicle.update") : route("vehicle.store"),
        {
          onSuccess: () => {
            this.form.reset();
            this.$root.showMessage(
              "success",
              '<span class="text-success">Success</span><br/>',
              "A Record Was Created Successfully! "
            );
          },
          onError: () => {
            this.form.reset("password", "password_confirmation");
            this.$root.showMessage(
              "error",
              '<span class="text-danger">Error</span><br>',
              "Something went wrong! "
            );
          },
        }
      );
    },
  },
};
</script>
<style scoped>
.image-upload-container {
  display: flex;
  flex-wrap: wrap;
}

.remove-btn {
  position: absolute;
  top: 0;
  right: 0;
  /* background: red; */
  color: red;
  border: none;
  border-radius: 50%;
}
/* Flex container for checkboxes */
.features-container {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

/* Checkbox Container */
.checkbox-container {
  display: flex;
  align-items: center;
  width: calc(25% - 1rem);
  /* Adjust the width to divide the space into 4 columns */
  margin-bottom: 0.5rem;
}

/* Hide the default checkbox */
.checkbox-container input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Custom Checkbox Design */
.checkbox-container label {
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  font-weight: 500;
  user-select: none;
}

/* Create the custom checkbox */
.checkbox-container label::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 20px;
  height: 20px;
  background-color: #f1f1f1;
  border: 2px solid #ccc;
  border-radius: 4px;
  transition: background-color 0.2s, border-color 0.2s;
}

/* Show the checkmark when checked */
.checkbox-container input[type="checkbox"]:checked + label::before {
  background-color: #3d3232;
  border-color: #000000;
}

.checkbox-container input[type="checkbox"]:checked + label::after {
  content: "";
  position: absolute;
  left: 6px;
  top: 2px;
  width: 6px;
  height: 12px;
  border: solid white;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}

/* Hover Effect */
.checkbox-container label:hover::before {
  border-color: #007bff;
}

.upload-button {
  display: flex;
  align-items: center;
  gap: 10px;
  /* Space between buttons */
  margin-bottom: 10px;
  /* Space below the buttons */
}

.upload-button label {
  cursor: pointer;
}

.image-box {
  position: relative;
  width: 100px;
  height: 100px;
  overflow: hidden;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin: 3px;
}

.image-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.remove-btn {
  position: absolute;
  top: 5px;
  right: 5px;
  background-color: red;
  border: none;
  color: white;
  cursor: pointer;
  font-size: 1rem;
}

.image-upload-container {
  border: 1px dotted #848484;
  padding: 10px;
  border-radius: 5px;
}

</style>