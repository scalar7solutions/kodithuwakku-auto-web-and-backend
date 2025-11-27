<template>
  <section class="login-section">
    <div class="container-fluid p-0">
      <div class="row g-0 ">
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
            <img src="https://jpnauto.com/images/Assets/1000423913%20(1)1.webp"
              class="img-fluid pb-3" style="max-width: 100px;" alt="JPN Auto vehicle image" />
            </div>

            <h1 class="login-title mb-4 ">Create Your Account!</h1>

            <form id="formAccountSetting" @submit.prevent="submit">


              <div class="mb-4">
                <label for="text" class="form-label">Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" id="name" v-model="form.name" />
              </div>


              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control " id="email" v-model="form.email" placeholder="Email" />


                <!-- Display the error message if email already exists -->
                <div v-if="form.errors.email" class="text-danger mt-2">
                  {{ form.errors.email }}
                </div>

              </div>



              <div class="mb-4">
                <label for="phone" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" placeholder="Mobile Number" id="phone" v-model="form.phone" />
              </div>

              <div class="mb-4">
                <label for="password" class="form-label">password</label>
                <!-- <input type="password" class="form-control" placeholder="Password" id="password"
                  v-model="form.password" />
                <label class="input-group-text border-0 border-radius-custom" for="chk"><i
                    class="fa-regular fa-eye-slash pe-3" id="icon" style="color: #6a3090"></i></label>
                <input type="checkbox" class="d-none" id="chk"> -->

                <div class="password-input-group">
                  <input :type="showPassword ? 'text' : 'password'" class="form-control" placeholder="Password"
                    v-model="form.password" />

                  <button type="button" class="password-toggle" @click="showPassword = !showPassword">
                    <i :class="['fa-regular', showPassword ? 'fa-eye' : 'fa-eye-slash', 'pe-3']"
                      style="color: #6a3090"></i>
                  </button>

                  <input type="checkbox" class="d-none" id="chk">
                </div>

              </div>

              <div class="mb-4">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password"
                  v-model="form.confirm_password" />
                <!-- Display password mismatch error -->
                <div v-if="passwordMismatch" class="text-danger mt-2">
                  Passwords do not match.
                </div>

              </div>

              <div class="mb-4">
                <label for="text" class="form-label">Referral Code (Optional)</label>
                <input type="text" class="form-control " placeholder="Referral Code (Optional)" id="ref_code"
                  v-model="form.ref_code" />
                <!-- Display the error message if email already exists -->
                <div v-if="form.errors.ref_code" class="text-danger mt-2">
                  {{ form.errors.ref_code }}
                </div>
              </div>

              <button type="submit" class="btn btn-primary w-100 login-btn my-3" :disabled="form.processing">Create
                account</button>

            </form>
            <div class="col-12 text-center">
              <p class="pt-3 pt-4">
                Have an Account?
                <Link style="color: #6a3090" :href="route('user.login')">Log in</Link>
              </p>
            </div>

            <div class="col-12 text-center">
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


export default {
  components: {
    Link,
   

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
  },

  data() {
    return {
      form: useForm({
        name: "",
        email: "",
        phone: "",
        ref_code: "",
        password: "",
        confirm_password: "",
      }),
      passwordMismatch: false, // To track if passwords match
      showPassword: false,
    };
  },

  methods: {
    submit() {
      // Check if passwords match
      if (this.form.password !== this.form.confirm_password) {
        this.passwordMismatch = true;
        return;
      } else {
        this.passwordMismatch = false;
      }

      // Proceed with form submission if passwords match
      this.form.post(route("front.end.customer.store"), {
        onSuccess: () => {
          this.form.reset();
          this.$root.showMessage(
            "success",
            '<span class="text-success">Success</span><br/>',
            "A Record Was Created Successfully!"
          );
        },
        onError: () => {
          if (this.form.errors.email) {
            this.$root.showMessage(
              "error",
              '<span class="text-danger">Error</span><br>',
              "The email has already been taken!"
            );
          }
          this.form.reset("password", "confirm_password");
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
  min-height: 100vh;
  background-color: #fff;
}

.login-bg-image {
  background-image: url('https://cdn.eftm.com/wp-content/uploads/2018/03/FORD_MUSTANG_BULLITT_01_HR.jpg');
  background-size: cover;
  background-position: center 70%;
  height: 110%;
  padding: 2rem;
}

.login-bg-image img {
  width: 10%;
}

.login-form-wrapper {
  padding: 3rem;
  max-width: 480px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 100%; 
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
</style>