<template>
  <Head title="Login" />

  <div class="login-page">
    <!-- Decorative animated shapes -->
    <div class="background-shape shape-1"></div>
    <div class="background-shape shape-2"></div>

    <!-- Left hero / marketing side -->
    <div class="login-hero">
      <div class="hero-content">
        <div class="hero-icon-wrapper">
          <i class="bx bx-car hero-icon"></i>
        </div>
        <h1 class="hero-title">
          Drive Your <span>Sales</span> Further
        </h1>
        <p class="hero-subtitle">
          A dedicated digital workspace to keep your vehicles, customers, and
          sales pipeline perfectly in sync.
        </p>

        <ul class="hero-list">
          <li>
            <i class="bx bx-check-circle"></i>
            Manage inventory, leads, and deals in one smart dashboard.
          </li>
        </ul>
      </div>
    </div>

    <!-- Right login card -->
    <div class="login-card-wrapper">
      <transition name="fade-slide">
        <div class="login-card" key="login-card">
          <AuthFormHeader
            image="/images/logo-dark.png"
            :title="'Welcome to Dashboard'"
          />

          <!-- Status message (e.g. password reset success) -->
          <div v-if="status" class="alert alert-success status-alert">
            {{ status }}
          </div>

          <form
            id="formAuthentication"
            class="mb-3"
            @submit.prevent="submit"
            novalidate
          >
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <div class="input-with-icon">
                <i class="bx bx-envelope input-icon"></i>
                <input
                  type="email"
                  class="form-control form-control-lg"
                  id="email"
                  name="email-username"
                  placeholder="you@dealership.com"
                  v-model="form.email"
                  required
                  autofocus
                  autocomplete="email"
                  :class="{ 'is-invalid': errors.email }"
                />
              </div>
              <div v-if="errors.email" class="invalid-feedback d-block">
                {{ errors.email }}
              </div>
            </div>

            <!-- Password -->
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between align-items-center">
                <label class="form-label" for="password">Password</label>
                <Link
                  v-if="canResetPassword"
                  :href="route('password.request')"
                  class="text-muted forgot-link"
                >
                  <small>Forgot Password?</small>
                </Link>
              </div>

              <div class="input-group input-group-merge input-with-icon">
                <i class="bx bx-lock-alt input-icon"></i>
                <input
                  :type="showPassword ? 'text' : 'password'"
                  id="password"
                  class="form-control form-control-lg border-end-0"
                  name="password"
                  placeholder="••••••••••••"
                  aria-describedby="password"
                  v-model="form.password"
                  required
                  autocomplete="current-password"
                  :class="{ 'is-invalid': errors.password }"
                />
                <span
                  class="input-group-text cursor-pointer password-toggle"
                  @click="togglePassword"
                >
                  <i
                    class="bx"
                    :class="showPassword ? 'bx-show' : 'bx-hide'"
                  ></i>
                </span>
                <div v-if="errors.password" class="invalid-feedback d-block">
                  {{ errors.password }}
                </div>
              </div>
            </div>

            <!-- Remember Me -->
            <div class="mb-3">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="remember-me"
                  v-model="form.remember"
                />
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>

            <!-- Submit -->
            <div class="mb-3">
              <button
                class="btn btn-main d-grid w-100 btn-lg"
                type="submit"
                :disabled="form.processing"
                :class="{ 'btn-loading': form.processing }"
              >
                <span class="btn-text">Sign in</span>
                <span class="btn-spinner" v-if="form.processing"></span>
              </button>
            </div>
          </form>

          <p class="login-footer-text text-muted mb-0">
            Secure access to your car sales dashboard.
          </p>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AuthFormHeader from "@/Pages/Auth/Partials/AuthFormHeader.vue";

export default {
  name: "Login",
  components: {
    Head,
    Link,
    AuthFormHeader,
  },
  props: {
    canResetPassword: {
      type: Boolean,
      default: true,
    },
    status: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
      showPassword: false,
    };
  },
  computed: {
    errors() {
      return this.$page.props.errors || {};
    },
  },
  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
  },
};
</script>

<style scoped>
/* Layout */
.login-page {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: stretch;
  justify-content: center;
  background: #ffffff;
  overflow: hidden;
  padding: 2rem;
}

/* Hero side */
.login-hero {
  flex: 1.1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2.5rem 2.5rem 2.5rem 1.5rem;
}

.hero-content {
  max-width: 460px;
  animation: fade-in 0.9s ease-out forwards;
}

.hero-icon-wrapper {
  width: 72px;
  height: 72px;
  border-radius: 24px;
  background: radial-gradient(
    circle at 10% 20%,
    #2563eb 0%,
    #38bdf8 60%,
    #bfdbfe 100%
  );
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1.5rem;
  box-shadow: 0 20px 40px rgba(37, 99, 235, 0.35);
  animation: float 4.2s ease-in-out infinite;
}

.hero-icon {
  font-size: 2rem;
  color: #ffffff;
}

.hero-title {
  font-size: 2.2rem;
  font-weight: 700;
  color: #1f2430;
  margin-bottom: 0.75rem;
}

.hero-title span {
  color: #2563eb;
}

.hero-subtitle {
  color: #6b7280;
  font-size: 0.98rem;
  line-height: 1.6;
  margin-bottom: 1.5rem;
}

.hero-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.hero-list li {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #4b5563;
  font-size: 0.95rem;
  margin-bottom: 0.6rem;
}

.hero-list i {
  color: #16a34a;
  font-size: 1.1rem;
}

/* Login card side */
.login-card-wrapper {
  flex: 0.9;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2.5rem 1.5rem 2.5rem 2.5rem;
  position: relative;
  z-index: 2;
}

.login-card {
  width: 100%;
  max-width: 420px;
  background: #ffffff;
  border-radius: 20px;
  box-shadow: 0 24px 60px rgba(15, 23, 42, 0.11);
  padding: 2.2rem 2.2rem 1.8rem;
  position: relative;
  overflow: hidden;
}

.login-card::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(
    circle at top,
    rgba(37, 99, 235, 0.08),
    transparent 55%
  );
  pointer-events: none;
}

/* Inputs with icons */
.input-with-icon {
  position: relative;
}

.input-with-icon .input-icon {
  position: absolute;
  left: 0.9rem;
  top: 50%;
  transform: translateY(-50%);
  font-size: 1.1rem;
  color: #9ca3af;
  z-index: 2;
}

.input-with-icon .form-control {
  padding-left: 2.4rem;
}

.form-control {
  border-radius: 12px;
  border: 1px solid #e5e7eb;
  font-size: 0.97rem;
  padding-top: 0.65rem;
  padding-bottom: 0.65rem;
  background-color: #f9fafb;
  transition: border-color 0.2s ease, box-shadow 0.2s ease,
    background-color 0.2s ease, transform 0.08s ease;
}

.form-control:focus {
  border-color: #2563eb;
  background-color: #ffffff;
  box-shadow: 0 0 0 1px rgba(37, 99, 235, 0.2),
    0 10px 25px rgba(15, 23, 42, 0.06);
  transform: translateY(-1px);
}

/* Password input group */
.input-group-merge {
  border-radius: 12px;
  overflow: hidden;
  background-color: #f9fafb;
}

.input-group-merge .form-control {
  background-color: transparent;
}

.input-group-text.password-toggle {
  background: transparent;
  border-left: none;
  border-radius: 0 12px 12px 0;
}

.password-toggle i {
  font-size: 1.2rem;
  color: #9ca3af;
}

/* Errors */
.invalid-feedback {
  font-size: 0.8rem;
}

/* Forgot link */
.forgot-link {
  font-size: 0.8rem;
}

/* Button */
.btn-main {
  border-radius: 999px;
  border: none;
  background: linear-gradient(135deg, #2563eb, #1d4ed8);
  color: #ffffff;
  font-weight: 600;
  font-size: 0.98rem;
  padding: 0.75rem 1rem;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  box-shadow: 0 14px 30px rgba(37, 99, 235, 0.35);
  transition: transform 0.12s ease, box-shadow 0.12s ease, filter 0.12s ease;
}

.btn-main:hover:enabled {
  filter: brightness(1.02);
  transform: translateY(-1px);
  box-shadow: 0 18px 40px rgba(37, 99, 235, 0.45);
}

.btn-main:disabled {
  opacity: 0.85;
  cursor: wait;
}

/* Loading state */
.btn-loading .btn-text {
  opacity: 0.75;
}

.btn-spinner {
  width: 16px;
  height: 16px;
  border-radius: 999px;
  border: 2px solid rgba(255, 255, 255, 0.6);
  border-top-color: #ffffff;
  animation: spin 0.7s linear infinite;
}

/* Status alert */
.status-alert {
  border-radius: 999px;
  padding: 0.4rem 0.9rem;
  font-size: 0.8rem;
  margin-bottom: 1rem;
}

/* Footer text */
.login-footer-text {
  font-size: 0.8rem;
  text-align: center;
}

/* Background shapes */
.background-shape {
  position: absolute;
  border-radius: 50%;
  opacity: 0.14;
  pointer-events: none;
  filter: blur(0.2px);
  animation: pulse 12s ease-in-out infinite alternate;
}

.shape-1 {
  width: 480px;
  height: 480px;
  background: radial-gradient(circle at 30% 0%, #2563eb, #38bdf8);
  top: -140px;
  right: -160px;
}

.shape-2 {
  width: 360px;
  height: 360px;
  background: radial-gradient(circle at 60% 100%, #4f46e5, #38bdf8);
  bottom: -160px;
  left: -120px;
  animation-delay: 1.5s;
}

/* Transitions */
.fade-slide-enter-active,
.fade-slide-leave-active {
  transition: opacity 0.35s ease, transform 0.35s ease;
}

.fade-slide-enter-from,
.fade-slide-leave-to {
  opacity: 0;
  transform: translateY(16px);
}

/* Animations */
@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

@keyframes float {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-8px);
  }
  100% {
    transform: translateY(0);
  }
}

@keyframes pulse {
  0% {
    transform: scale(1);
    opacity: 0.16;
  }
  100% {
    transform: scale(1.12);
    opacity: 0.08;
  }
}

@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 991.98px) {
  .login-page {
    padding: 1.5rem;
    flex-direction: column;
  }

  .login-hero {
    display: none;
  }

  .login-card-wrapper {
    padding: 0;
  }

  .login-card {
    padding: 2rem 1.6rem 1.6rem;
  }

  .shape-1,
  .shape-2 {
    opacity: 0.08;
  }
}

@media (max-width: 575.98px) {
  .login-page {
    padding: 1rem;
  }

  .login-card {
    padding: 1.7rem 1.4rem 1.4rem;
    border-radius: 18px;
  }
}
</style>
