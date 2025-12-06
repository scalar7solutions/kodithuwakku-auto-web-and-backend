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
                            <!-- Vehicle type * -->
                            <div
                                class="mb-3 col-md-6"
                                title="Select the general category of the vehicle (e.g. Car, Van, SUV)."
                            >
                                <SelectInputComponentVue
                                    class="w-100"
                                    id="vehicle_type"
                                    label="Vehicle type *"
                                    v-model="form.vehicle_type"
                                    :options="type"
                                    :error="form.errors.vehicle_type"
                                />
                            </div>

                            <!-- Manufacture * -->
                            <div
                                class="mb-3 col-md-6"
                                title="Select the manufacturer / brand (e.g. Toyota, BMW)."
                            >
                                <SelectInputComponentVue
                                    class="w-100"
                                    id="manufacture_name"
                                    label="Manufacture Name *"
                                    v-model="form.manufacture_name"
                                    :options="manufacture"
                                    :error="form.errors.manufacture_name"
                                    @change="getModels"
                                />
                            </div>

                            <!-- Model * -->
                            <div
                                class="mb-3 col-md-6"
                                title="Select the specific model for this vehicle."
                            >
                                <SelectInputComponentVue
                                    class="w-100"
                                    id="model"
                                    label="Model *"
                                    v-model="form.model"
                                    :options="model"
                                    :error="form.errors.model"
                                />
                            </div>

                            <!-- Exterior color -->
                            <div
                                class="mb-3 col-md-6"
                                title="Select the exterior color as seen from outside."
                            >
                                <SelectInputComponentVue
                                    class="w-100"
                                    id="ex_color"
                                    label="Ex color"
                                    v-model="form.ex_color"
                                    :options="color"
                                    :error="form.errors.ex_color"
                                />
                            </div>

                            <!-- Interior color -->
                            <div
                                class="mb-3 col-md-6"
                                title="Select the primary interior color."
                            >
                                <SelectInputComponentVue
                                    class="w-100"
                                    id="in_color"
                                    label="In color"
                                    v-model="form.in_color"
                                    :options="color"
                                    :error="form.errors.in_color"
                                />
                            </div>

                            <!-- Price -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="price"
                                    class="form-label"
                                    title="Base sale price in LKR, without commas."
                                >
                                    Price
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">LKR</span>
                                   <input
  class="form-control"
  type="text"
  id="price"
  name="price"
  v-model="formattedPrice"
  inputmode="decimal"
/>

                                </div>
                                <div class="text-danger">
                                    {{ form.errors.price }}
                                </div>
                            </div>

                            <!-- Features (checkboxes) -->
                            <div class="mb-3 col-md-12">
                                <label
                                    class="form-label"
                                    title="Select all features that apply to this vehicle."
                                >
                                    Features
                                </label>
                                <div class="features-container">
                                    <div
                                        v-for="(feature, index) in features"
                                        :key="index"
                                        class="checkbox-container"
                                    >
                                        <input
                                            type="checkbox"
                                            :id="'feature-' + feature.id"
                                            :value="feature.id"
                                            v-model="form.features"
                                        />
                                        <label :for="'feature-' + feature.id">
                                            {{ feature.name }}
                                        </label>
                                    </div>
                                </div>
                                <div class="text-danger">
                                    {{ form.errors.features }}
                                </div>
                            </div>

                            <!-- Transmission -->
                            <SelectInputComponentVue
                                id="transmission"
                                label="Transmission"
                                :error="form.errors.transmission"
                                title="Select the gearbox type."
                                :options="[
                                    { id: 'Auto', name: 'Auto' },
                                    { id: 'Manual', name: 'Manual' },
                                    { id: 'Triptonic', name: 'Triptonic' },
                                ]"
                                v-model="form.transmission"
                            />

                            <!-- Year -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="year"
                                    class="form-label"
                                    title="Production year of the vehicle."
                                >
                                    Year
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="year"
                                    name="year"
                                    v-model="form.year"
                                    :max="new Date().getFullYear() + 1"
                                    min="1900"
                                />
                                <div class="text-danger">
                                    {{ form.errors.year }}
                                </div>
                            </div>

                            <!-- Chassis No -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="chassis_no"
                                    class="form-label"
                                    title="Unique chassis / VIN number."
                                >
                                    Chassis No
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="chassis_no"
                                    name="chassis_no"
                                    v-model="form.chassis_no"
                                />
                                <div class="text-danger">
                                    {{ form.errors.chassis_no }}
                                </div>
                            </div>

                            <!-- Condition -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="condition"
                                    class="form-label"
                                    title="Short description of overall condition."
                                >
                                    Condition
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="condition"
                                    name="condition"
                                    v-model="form.condition"
                                />
                                <div class="text-danger">
                                    {{ form.errors.condition }}
                                </div>
                            </div>

                            <!-- Seats -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="seats"
                                    class="form-label"
                                    title="Number of seats available."
                                >
                                    Seats
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="seats"
                                    name="seats"
                                    v-model="form.seats"
                                    min="1"
                                />
                                <div class="text-danger">
                                    {{ form.errors.seats }}
                                </div>
                            </div>

                            <!-- Doors -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="doors"
                                    class="form-label"
                                    title="Number of doors."
                                >
                                    Doors
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="doors"
                                    name="doors"
                                    v-model="form.doors"
                                    min="1"
                                />
                                <div class="text-danger">
                                    {{ form.errors.doors }}
                                </div>
                            </div>

                            <!-- Passengers -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="passengers"
                                    class="form-label"
                                    title="Maximum passengers allowed."
                                >
                                    Passengers
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="passengers"
                                    name="passengers"
                                    v-model="form.passengers"
                                    min="1"
                                />
                                <div class="text-danger">
                                    {{ form.errors.passengers }}
                                </div>
                            </div>

                            <!-- Engine Capacity -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="engine_capacity"
                                    class="form-label"
                                    title="Engine size in cc (e.g. 1500)."
                                >
                                    Engine Capacity
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="engine_capacity"
                                    name="engine_capacity"
                                    v-model="form.engine_capacity"
                                    min="0"
                                    step="1"
                                />
                                <div class="text-danger">
                                    {{ form.errors.engine_capacity }}
                                </div>
                            </div>

                            <!-- Vehicle Status -->
                            <SelectInputComponentVue
                                id="used_status"
                                label="Vehicle Status"
                                :error="form.errors.used_status"
                                title="Brand new or used."
                                :options="[
                                    { id: 'Brand New', name: 'Brand New' },
                                    { id: 'Used', name: 'Used' },
                                ]"
                                v-model="form.used_status"
                            />

                            <!-- Mileage (only when used) -->
                            <div
                                class="mb-3 col-md-6"
                                v-if="form.used_status === 'Used'"
                            >
                                <label
                                    for="mileage"
                                    class="form-label"
                                    title="Total mileage already driven."
                                >
                                    Mileage
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="mileage"
                                    name="mileage"
                                    v-model="form.mileage"
                                    min="0"
                                    step="1"
                                />
                                <div class="text-danger">
                                    {{ form.errors.mileage }}
                                </div>
                            </div>

                            <!-- Fuel Type -->
                            <SelectInputComponentVue
                                id="fuel_type"
                                label="Fuel Type"
                                :error="form.errors.fuel_type"
                                title="Main fuel type used by the vehicle."
                                :options="[
                                    { id: 'Diesel', name: 'Diesel' },
                                    { id: 'Petrol', name: 'Petrol' },
                                    { id: 'Hybrid', name: 'Hybrid' },
                                    { id: 'Electric', name: 'Electric' },
                                ]"
                                v-model="form.fuel_type"
                            />

                            <!-- Drive Type -->
                            <SelectInputComponentVue
                                id="drive_type"
                                label="Drive Type"
                                :error="form.errors.drive_type"
                                title="Right or left side driving."
                                :options="[
                                    {
                                        id: 'Right Side Driving',
                                        name: 'Right Side Driving',
                                    },
                                    {
                                        id: 'Left Side Driving',
                                        name: 'Left Side Driving',
                                    },
                                ]"
                                v-model="form.drive_type"
                            />

                            <!-- Auction Grade -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="auction_grade"
                                    class="form-label"
                                    title="Auction grade (if applicable)."
                                >
                                    Auction Grade
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="auction_grade"
                                    name="auction_grade"
                                    v-model="form.auction_grade"
                                />
                                <div class="text-danger">
                                    {{ form.errors.auction_grade }}
                                </div>
                            </div>

                            <!-- Interior Condition -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="interior_condition"
                                    class="form-label"
                                    title="Condition of seats, dashboard, and interior."
                                >
                                    Interior Condition
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="interior_condition"
                                    name="interior_condition"
                                    v-model="form.interior_condition"
                                />
                                <div class="text-danger">
                                    {{ form.errors.interior_condition }}
                                </div>
                            </div>

                            <!-- Availability -->
                            <SelectInputComponentVue
                                id="availability"
                                label="Availability"
                                :error="form.errors.availability"
                                title="Current stock status."
                                :options="[
                                    { id: 'Available', name: 'Available' },
                                    { id: 'Arriving', name: 'Arriving' },
                                    { id: 'Sold', name: 'Sold' },
                                ]"
                                v-model="form.availability"
                            />

                            <!-- Monthly Price -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="monthly_price"
                                    class="form-label"
                                    title="Monthly installment price in LKR (optional)."
                                >
                                    Monthly Price
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">LKR</span>
                                    <input
  class="form-control"
  type="text"
  id="monthly_price"
  name="monthly_price"
  v-model="formattedMonthlyPrice"
  inputmode="decimal"
/>

                                </div>
                                <div class="text-danger">
                                    {{ form.errors.monthly_price }}
                                </div>
                            </div>

                            <!-- Initial Payment -->
                            <div class="mb-3 col-md-6">
                                <label
                                    for="initial_payment"
                                    class="form-label"
                                    title="Initial upfront payment in LKR (optional)."
                                >
                                    Initial Payment
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">LKR</span>
                                   <input
  class="form-control"
  type="text"
  id="initial_payment"
  name="initial_payment"
  v-model="formattedInitialPayment"
  inputmode="decimal"
/>

                                </div>
                                <div class="text-danger">
                                    {{ form.errors.initial_payment }}
                                </div>
                            </div>

                            <!-- Countries -->
                            <div class="mb-3 col-md-11">
                                <SelectInputComponentVue
                                    id="countries"
                                    label="Countries"
                                    v-model="form.countries"
                                    :options="countriesOptions"
                                    :isMultiple="true"
                                    :error="form.errors.countries"
                                    title="Select the countries where this vehicle is available."
                                />
                            </div>

                            <!-- TinyMCE Editor -->
                            <div class="mb-3 col-md-12">
                                <label
                                    class="form-label"
                                    title="Full description shown on the detail page."
                                >
                                    Description
                                </label>
                                <Editor
                                    v-model="form.editorContent"
                                    :api-key="apiKey"
                                    :init="{
                                        plugins:
                                            'lists link image table code help wordcount',
                                    }"
                                />
                                <div class="text-danger">
                                    {{ form.errors.editorContent }}
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="mb-3 col-md-6">
                                <div class="mb-3 col-md-12">
                                    <div class="row">
                                        <!-- Main image -->
                                        <div class="col-md-6">
                                            <label
                                                for="image"
                                                class="form-label me-3"
                                                title="Primary image shown on listings."
                                            >
                                                Main Image
                                            </label>
                                            <br />
                                            <FileInputComponent
                                                :isRequired="false"
                                                id="vehicle_image"
                                                :prvImage="Vehicle_Image"
                                                v-model="form.vehicle_image"
                                            />
                                            <div class="text-danger">
                                                {{ form.errors.vehicle_image }}
                                            </div>
                                        </div>

                                        <!-- Gallery images -->
                                        <div class="col-md-6">
                                            <div
                                                class="mb-4"
                                                style="padding: 0.5rem 4%"
                                            >
                                                <h6>Gallery Images</h6>

                                                <div class="upload-button">
                                                    <label
                                                        class="btn btn-outline-primary"
                                                    >
                                                        Upload Images
                                                        <input
                                                            type="file"
                                                            multiple
                                                            @change="
                                                                handleImageUpload
                                                            "
                                                            hidden
                                                        />
                                                    </label>
                                                </div>

                                                <div
                                                    class="image-upload-container mt-2"
                                                    v-if="
                                                        form.uploaded_Images
                                                            .length > 0
                                                    "
                                                >
                                                    <div
                                                        v-for="(
                                                            image, index
                                                        ) in form.uploaded_Images"
                                                        :key="index"
                                                    >
                                                        <div class="image-box">
                                                            <img
                                                                :src="
                                                                    image.preview
                                                                "
                                                                alt="Uploaded Image"
                                                                class="img-fluid"
                                                            />
                                                            <button
                                                                type="button"
                                                                class="remove-btn"
                                                                @click="
                                                                    removeUploadedImage(
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <i
                                                                    class="fas fa-times"
                                                                ></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Featured / Latest / Status -->
                                <SelectInputComponentVue
                                    id="featured"
                                    label="Is Featured"
                                    :error="form.errors.featured"
                                    :options="[
                                        { id: '1', name: 'Enable' },
                                        { id: '0', name: 'Disable' },
                                    ]"
                                    v-model="form.featured"
                                />

                                <SelectInputComponentVue
                                    id="latest"
                                    label="Is Latest"
                                    :error="form.errors.latest"
                                    :options="[
                                        { id: '1', name: 'Enable' },
                                        { id: '0', name: 'Disable' },
                                    ]"
                                    v-model="form.latest"
                                />

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
                        </div>

                        <!-- Submit / Cancel -->
                        <div class="mt-2">
                            <button
                                type="submit"
                                class="btn btn-main me-2"
                                :disabled="form.processing"
                            >
                                {{ vehicle ? "Update" : "Save" }}
                            </button>
                            <Link
                                class="btn btn-outline-danger"
                                :href="route('vehicle_manufacture.index')"
                            >
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
import SelectInputComponentVue from "../../../Components/SelectInputComponent.vue";
import Editor from "@tinymce/tinymce-vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        Link,
        AppLayout,
        FileInputComponent,
        SelectInputComponentVue,
        Editor,
    },
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
                uploaded_Images: [],
            }),
        };
    },

    mounted() {
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
                    .filter(
                        (media) =>
                            media.custom_properties?.type === "vehicle_gallery"
                    )
                    .forEach((media) => {
                        this.form.uploaded_Images.push({
                            file: media,
                            preview: media.original_url,
                        });
                    });
            }
        }
    },

    computed: {
        countriesOptions() {
            return this.countries.map((country) => ({
                id: country.id,
                name: country.name,
            }));
        },

        Vehicle_Image() {
            if (
                this.vehicle &&
                this.vehicle.media &&
                this.vehicle.media.length > 0
            ) {
                const mainImage = this.vehicle.media.find(
                    (media) => media.custom_properties?.type === "vehicle_main"
                );
                return mainImage ? mainImage.original_url : "";
            }
            return "";
        },
         formattedPrice: {
        get() {
            const v = this.form.price;
            if (v === null || v === undefined || v === "") return "";

            const [intPart, decimalPart] = v.toString().split(".");
            const withCommas = intPart.replace(
                /\B(?=(\d{3})+(?!\d))/g,
                ","
            );
            return decimalPart ? `${withCommas}.${decimalPart}` : withCommas;
        },
        set(value) {
            const cleaned = (value || "").replace(/,/g, "");
            this.form.price = cleaned === "" ? "" : cleaned;
        },
    },

    formattedMonthlyPrice: {
        get() {
            const v = this.form.monthly_price;
            if (v === null || v === undefined || v === "") return "";

            const [intPart, decimalPart] = v.toString().split(".");
            const withCommas = intPart.replace(
                /\B(?=(\d{3})+(?!\d))/g,
                ","
            );
            return decimalPart ? `${withCommas}.${decimalPart}` : withCommas;
        },
        set(value) {
            const cleaned = (value || "").replace(/,/g, "");
            this.form.monthly_price = cleaned === "" ? "" : cleaned;
        },
    },

    formattedInitialPayment: {
        get() {
            const v = this.form.initial_payment;
            if (v === null || v === undefined || v === "") return "";

            const [intPart, decimalPart] = v.toString().split(".");
            const withCommas = intPart.replace(
                /\B(?=(\d{3})+(?!\d))/g,
                ","
            );
            return decimalPart ? `${withCommas}.${decimalPart}` : withCommas;
        },
        set(value) {
            const cleaned = (value || "").replace(/,/g, "");
            this.form.initial_payment = cleaned === "" ? "" : cleaned;
        },
    },
    },

    methods: {
        handleImageUpload(event) {
            const files = Array.from(event.target.files);

            files.forEach((file) => {
                if (file && file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.form.uploaded_Images.push({
                            file,
                            preview: e.target.result,
                        });
                    };
                    reader.readAsDataURL(file);
                } else {
                    console.error("Selected file is not an image:", file);
                }
            });
        },

        removeUploadedImage(index) {
            const image = this.form.uploaded_Images[index];

            if (
                image.file &&
                image.file.original_url &&
                image.preview &&
                this.vehicle
            ) {
                Inertia.post(
                    route("vehicle.image.remove"),
                    {
                        imageUrl: image.preview,
                        product_id: this.vehicle.id,
                    },
                    {
                        onSuccess: () => {
                            this.form.uploaded_Images.splice(index, 1);
                        },
                        onError: (errors) => {
                            console.error("Error deleting image:", errors);
                        },
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
                        if (
                            this.$root &&
                            typeof this.$root.showMessage === "function"
                        ) {
                            this.$root.showMessage(
                                "success",
                                '<span class="text-success">Success</span><br/>',
                                "A record was saved successfully!"
                            );
                        }
                    },
                    onError: () => {
                        if (
                            this.$root &&
                            typeof this.$root.showMessage === "function"
                        ) {
                            this.$root.showMessage(
                                "error",
                                '<span class="text-danger">Error</span><br>',
                                "Something went wrong!"
                            );
                        }
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
    margin-bottom: 10px;
}

.upload-button label is {
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
