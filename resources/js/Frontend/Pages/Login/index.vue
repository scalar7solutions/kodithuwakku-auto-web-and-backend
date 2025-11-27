<template>
  <section class="login-section">
    <div class="container-fluid p-0">
      <div class="row g-0">
        <!-- Background Image Column -->
        <div class="col-lg-7 d-none d-lg-block">
         <div class="login-bg-image">
  <a href="/home">
    <img src="https://jpnauto.com/images/Assets/1000423913%20(1)1.webp"
         class="img-fluid pb-3"
         style="max-width: 100px;"
         alt="JPN Auto vehicle image" />
  </a>
</div>

        </div>

        <!-- Login Form Column -->
        <div class="col-lg-5">
          <div class="login-form-wrapper">
            <div class="logo-container mb-5 d-md-none text-center">
              <img src="https://jpnauto.com/images/Assets/1000423913%20(1)1.webp" alt="Nikoba Logo" class="logo">
            </div>

            <h1 class="login-title mb-4 ">Login to your account</h1>

            <!-- Error Message -->
            <div v-if="form.errors.username || form.errors.password" class="alert alert-danger text-center">
              Incorrect email or password.
            </div>

            <form id="formAccountSetting" @submit.prevent="submit">

                <input type="hidden" name="redirect" v-model="form.redirect" />

              <div class="mb-4">
                <label for="text" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Username" id="username" v-model="form.username" />
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="password-input-group">
                  <input :type="showPassword ? 'text' : 'password'" class="form-control bg-light border-0 py-3 px-4"
                    placeholder="Password" v-model="form.password" />

                  <button type="button" class="password-toggle" @click="showPassword = !showPassword">
                    <i :class="['fa-regular', showPassword ? 'fa-eye' : 'fa-eye-slash', 'pe-3']"
                      style="color: #6a3090"></i>
                  </button>

                  <input type="checkbox" class="d-none" id="chk">
                </div>
                <div class="text-end mt-2">
                  <Link style="font-size: small; color: #6a3090" :href="route('forgotpassword')">Forgot?</Link>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 login-btn" :disabled="form.processing">Login
                now</button>
              <p class="text-center mt-4">
                Don't Have An Account?
                <Link style="color: #6a3090" :href="route('register')">Sign Up</Link>
              </p>
            </form>

            <div class="col-12 text-center">
              <p class="py-3 pt-4">Or Sign Up using</p>
            </div>
            <div class="col-12 justify-content-center d-flex">
              <a :href="route('social.oauth', { driver: 'google'})">

                <div class="google px-3" type="button">
                  <img src="/images/icons/search (1).png" width="35" alt="" />
                </div>
              </a>

              <a :href="route('social.oauth', { driver: 'facebook'})">

                <div class="facebook px-3" type="button">
                  <img src="/images/icons/facebook (1).png" width="35" alt="" />
                </div>
              </a>
            </div>
            <div class="col-12 mt-4 text-center">
              <Link class="text-decoration-underline" :href="route('index')"><small>Back to Home Page</small></Link>
            </div>




          </div>
        </div>
      </div>
    </div>
  </section>


</template>



<script>
import { Link, useForm } from "@inertiajs/inertia-vue3";
import FileInputComponent from "@/Components/FileInputComponent.vue";

export default {
  components: {
    Link,
    FileInputComponent,
  },
  mounted() {
    const pwd = document.getElementById("password");
    const chk = document.getElementById("chk");
    const icon = document.getElementById("icon");

    chk.onchange = function (e) {
      if (chk.checked) {
        pwd.type = "text";
        icon.classList.add("fa-eye");
        icon.classList.remove("fa-eye-slash");
      } else {
        pwd.type = "password";
        icon.classList.add("fa-eye-slash");
      }
    };
  },


  props: {
    errors: Object,
    allRoles: Object,
    redirect: { type: String, default: '' }
  },

  data() {
    return {
      form: useForm({
        id: "",
        username: "",
        password: "",
        redirect: this.redirect,
      }),
      showPassword: false,
    };
  },


  methods: {
    submit() {
      this.form.post(route("front.end.customer.login"), {
        onSuccess: () => {
          this.form.reset();
          this.$root.showMessage(
            "success",
            '<span class="text-success">Success</span><br/>',
            "Logging Successful!"
          );
        },
        onError: () => {
          // Show error message for incorrect email or password
          this.form.reset("password");
        },
      });
    },
  },

};
</script>


<style scoped>


.fa-eye-slash {
  font-size: 15px
}

.login-section {
  height: 100vh;     /* force exactly viewport height */
  background-color: #fff;
  /* padding-top: 0% !important; */
}

.login-bg-image {
  background-image: url('https://img2.wallspic.com/crops/4/5/0/8/5/158054/158054-2020_mustang_gt350r-2020_ford_mustang-shelby_mustang-ford_motor_company-cars-5120x2880.jpg');
  background-size: cover;
  background-position: center 60%;

  padding: 2rem;
  height: 100%;           /* fill the full height of .login-section */
  padding: 2rem;          /* you can keep your padding */
  box-sizing: border-box; /* include padding in that 100% */
}

.login-bg-image img {
  width: 10%;
}

.login-form-wrapper {
  height: 100%;
  padding: 3rem;
  max-width: 480px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 100vh;
}

.login-title {
  font-size: 1.75rem;
  font-weight: 600;
}

.form-label {
  font-weight: 500;
  margin-bottom: 0.5rem;
}

.form-control {
  padding: 0.75rem 1rem;
  border-radius: 8px;
  border: 1px solid #e0e0e0;
}

.form-control:focus {
  border-color: #0d3b66;
  box-shadow: 0 0 0 3px rgba(13, 59, 102, 0.1);
}

.password-input-group {
  position: relative;
}

.password-toggle {
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  padding: 0;
  cursor: pointer;
}

.login-btn {
  background-color: #0F2546;
  border: none;
  padding: 0.75rem;
  font-weight: 500;
  border-radius: 8px;
  transition: var(--transition);
}

.login-btn:hover {
  background-color: #0d3b66;
  transform: translateY(-1px);
}

@media (max-width: 998px) {
  .login-form-wrapper {
    padding: 2rem;
  }
}

@media (max-width: 768px) {
  .login-form-wrapper {
    padding: 1.5rem;
  }

  .login-title {
    text-align: center;
    margin-bottom: 3rem !important;
  }
}



/* bump down max-width on smaller screens */
@media (max-width: 768px) {
  .logo,
  .login-bg-image img {
    max-width: 80px;
  }
}
</style>
