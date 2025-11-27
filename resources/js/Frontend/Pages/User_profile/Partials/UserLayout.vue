<template>
  <div class="container mobile-margin" style="margin-top: 190px">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow-sm mb-5 bg-white border">
          <div class="card-body">

            <!-- Avatar & Basic Info -->
            <div class="text-center">
              <label class="avatar position-relative" for="profile_image">
                <img
                  :src="$page.props.logged_customer?.media[0]?.original_url || '/images/profile.png'"
                  width="140" height="140"
                  class="rounded-circle"
                  style="object-fit: cover"
                />
                <div class="carousel-caption position-absolute">
                  <i class="fa fa-camera upload-button bg-light rounded-circle border p-2 text-black"></i>
                  <input class="file-upload d-none" type="file" id="profile_image" accept="image/*" />
                </div>
              </label>
            </div>

            <h5 class="card-title text-center pt-4">
              {{ $page.props.logged_customer.name }}
            </h5>
            <h6 class="card-subtitle mb-2 text-body-secondary text-center">
              {{ $page.props.logged_customer.email }}
            </h6>

            <div class="logout my-3 text-center px-3">
              <Link class="btn bg-white rounded" :href="route('front.end.customer.logout')">
                <i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout
              </Link>
            </div>

            <!-- NAV PILL BUTTONS (Vue-controlled) -->
            <div class="account-details pt-4">
              <div class="nav nav-pills justify-content-center mb-3" role="tablist">
                <button
                  class="nav-link fs-6"
                  :class="{ active: activeSection==='profile' }"
                  @click="activeSection = 'profile'"
                >
                  My Profile
                </button>
                <button
                  class="nav-link fs-6"
                  :class="{ active: activeSection==='password' }"
                  @click="activeSection = 'password'"
                >
                  Manage Password
                </button>
                <button
                  class="nav-link fs-6"
                  :class="{ active: activeSection==='orders' }"
                  @click="activeSection = 'orders'"
                >
                  Inquiries
                </button>
                <button
                  class="nav-link fs-6"
                  :class="{ active: activeSection==='affiliate' }"
                  @click="activeSection = 'affiliate'"
                >
                  Affiliate
                </button>
              </div>

              <!-- CONTENT PANES (Vue-controlled) -->
              <div class="card bg-white px-3 py-4">
                <div v-if="activeSection==='profile'">
                  <Profile />
                </div>
                <div v-if="activeSection==='password'">
                  <ManagePassword />
                </div>
                <div v-if="activeSection==='orders'">
                  <Orders />
                </div>
                <div v-if="activeSection==='affiliate'">
                  <Affiliate
                    v-if="$page.props.logged_customer?.enrolled_affiliate === 1 &&
                           $page.props.logged_customer?.enrolled_affiliate_id"
                  />
                  <div
                    v-else-if="$page.props.logged_customer?.enrolled_affiliate === 1"
                    class="m-auto text-center"
                    style="max-width:400px"
                  >
                    <h3 style="color:#1e1eff;">Pending Affiliate Approval</h3>
                    <p style="color:#6d6d6d;">
                      Thank you for applying to our affiliate program! Your request is under review.
                      Once approved, you’ll gain access to our affiliate program.
                    </p>
                  </div>
                  <div v-else class="m-auto text-center">
                    <button @click="enrollAffiliate" class="btn btn-primary">
                      Enroll to affiliate program.
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// import $ from 'jquery';
import Profile from "../Modals/Profile.vue";
import ManagePassword from '../Modals/ManagePassword.vue';
import Orders from '../Modals/Orders.vue';
import Wishlist from '../Modals/Wishlist.vue';
import { Link } from "@inertiajs/inertia-vue3";
import Affiliate from "../Modals/Affiliate.vue";

export default {
    components: {
        Profile,
        ManagePassword,
        Orders,
        Wishlist,
        Link,
        Affiliate
    },
    props:{
        
    },
//     computed: {
//     Profile_Image() {
//       return this.logged_customer ? this.logged_customer.media.length > 0 ? this.logged_customer.media[0].original_url: "" : "";
//     },
//   },

 data() {
    return {
      activeSection: 'profile', // default visible tab
    };
  },
    mounted() {
        $(document).ready(function () {
            $("html, body").animate({ scrollTop: 0 }, "fastest");
            return false;
        });
        // $(document).ready(function () {


        //     var readURL = function (input) {
        //         if (input.files && input.files[0]) {
        //             var reader = new FileReader();

        //             reader.onload = function (e) {
        //                 $('.profile-pic').attr('src', e.target.result);
        //             }

        //             reader.readAsDataURL(input.files[0]);
        //         }
        //     }


        //     $(".file-upload").on('change', function () {
        //         readURL(this);
        //     });

        //     $(".upload-button").on('click', function () {
        //         $(".file-upload").click();
        //     });
        // });

    },
    methods:{
        enrollAffiliate() {
            this.$inertia.post(route('frontend.enroll-affiliate'));
        }
    }
};
</script>

<style scoped>
.nav-pills .active {
    background-color: #01aef0;
    color: rgb(255, 255, 255) !important;
    box-shadow: 0px 0px 2px 0px;
}

.nav-pills .nav-link {
    color: black;
}

.file-upload {
    display: none;
}

/* .p-image {
   
    top: 71%;
    right: 45%; 
    color: #666666;
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
} */
.carousel-caption{
    top:100px;

}
.p-image:hover {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}

.upload-button {
    font-size: 1.2em;
}

.upload-button:hover {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    color: #999;
}

@media (max-width:767px) {
    .mobile-margin {
        margin-top: 110px !important;
    }

    .p-image {
        right: 30%;
    }
}

.nav-pills .nav-link {
  color: black;
}
.nav-pills .nav-link.active {
  background-color: #01aef0;
  color: #fff !important;
  box-shadow: 0 0 2px rgba(0,0,0,0.2);
}

.upload-button {
  font-size: 1.2em;
}
.upload-button:hover {
  color: #999;
}

.file-upload {
  display: none;
}

@media (max-width:767px) {
  .mobile-margin {
    margin-top: 110px !important;
  }
}
</style>
