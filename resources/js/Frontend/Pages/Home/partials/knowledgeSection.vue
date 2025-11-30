<template>
    <div class="container my-5 custom-style border pb-5 shadow-sm px-0" st>
        <h1
            class="headText secondFontStyle text-center fw-semibold text-uppercase mb-4 bg-custom2 text-white py-3 knowledgeText">
            Are You Looking For A Car?</h1>
        <div class="row align-items-center px-5 me-0">
            <div class="col-12">
                <p>
                    Shop at our store to find a wide collection of cars, delivering excellent value for your cash. We
                    are aware that buying a used car is a tough business, and we make sure we get the best deal for our
                    customers. With the assistance of our team, buy high-quality and well-maintained cars at a
                    reasonable price.
                </p>
                <Link class="text-danger d-flex align-items-center" :href="route('available')">
                <i class="fa-solid fa-arrow-right pe-2"></i>
                <small>Learn More</small>
                </Link>
            </div>
            
            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-6 col-md-3 mb-4">
                        <Link :href="route('knowledge.center')"
                            class="card hoverStyle border-custom shadow-sm bg-color align-items-center p-2 w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="70" height="70" viewBox="0 0 24 24"
                            style="fill: rgba(30, 30, 30, 1);transform: ;msFilter:;">
                            <path
                                d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4a2 2 0 0 0-2-2zm0 9-2-1-2 1V4h4v7z">
                            </path>
                        </svg>
                        <p class="text-uppercase mt-3">Knowledge Center</p>
                        </Link>
                    </div>
                    <div class="col-6 col-md-3 mb-4">
                        <Link :href="route('how.to.order')"
                            class="card hoverStyle border-custom shadow-sm bg-color align-items-center p-2 w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="70" height="70" viewBox="0 0 24 24"
                            style="fill: rgba(30, 30, 30, 1);transform: ;msFilter:;">
                            <path
                                d="M6 22h12c.178 0 .348-.03.512-.074l-3.759-3.759A4.966 4.966 0 0 1 12 19c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5a4.964 4.964 0 0 1-.833 2.753l3.759 3.759c.044-.164.074-.334.074-.512V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2z">
                            </path>
                            <circle cx="12" cy="14" r="3"></circle>
                        </svg>
                        <p class="text-uppercase mt-3">how to order</p>
                        </Link>
                    </div>
                    <div class="col-6 col-md-3">
                        <Link class="card hoverStyle border-custom shadow-sm bg-color align-items-center p-2 w-100"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="70" height="70" viewBox="0 0 24 24"
                            style="fill: rgba(30, 30, 30, 1);transform: ;msFilter:;">
                            <path
                                d="M2 8v4.001h1V18H2v3h16l3 .001V21h1v-3h-1v-5.999h1V8L12 2 2 8zm4 10v-5.999h2V18H6zm5 0v-5.999h2V18h-2zm7 0h-2v-5.999h2V18zM14 8a2 2 0 1 1-4.001-.001A2 2 0 0 1 14 8z">
                            </path>
                        </svg>
                        <p class="text-uppercase mt-3">bank details</p>
                        </Link>
                    </div>
                    <div class="col-6 col-md-3">
                        <Link class="card hoverStyle border-custom shadow-sm bg-color align-items-center p-2 w-100"
                            :href="route('testimonials')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="70" height="70" viewBox="0 0 24 24"
                            style="fill: rgba(30, 30, 30, 1);transform: ;msFilter:;">
                            <path
                                d="M4 18h2v4.081L11.101 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2z">
                            </path>
                            <path
                                d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z">
                            </path>
                        </svg>
                        <p class="text-uppercase mt-3">Testimonials
                        </p>
                        </Link>
                    </div>

                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-6 text-white" id="exampleModalLabel">BANK DETAILS</h1>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <p class="text-uppercase fw-bold">Nikoba Auto Trading (Pvt) Ltd</p>
                                <img src="images/Commercial-Bank-of-Ceylon.png" alt="">
                                <p class="mt-3">DUPLICATION ROAD BRANCH</p>
                                <p class="mt-2 text-dark fw-semibold">ACC. NO. 1680013862</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary rounded-0" data-bs-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';


export default {
    components: {
        Link,
    }
}
</script>

<style scoped>
.custom-style {
    background-color: #f8f9fa;
}

.bg-color {
    background-color: #dfdfdf;
}

.hoverStyle {
    transition: ease-in-out 0.3s;
}

.hoverStyle:hover {
    transform: scale(1.05);
}

.knowledgeText {
    /* border-top-left-radius: 1rem;
    border-top-right-radius: 1rem; */
}

.bg-custom2 {
    background-color: #222b5e;
}

.border-custom {
    border: 1px solid rgb(175, 175, 175)
}
</style>
