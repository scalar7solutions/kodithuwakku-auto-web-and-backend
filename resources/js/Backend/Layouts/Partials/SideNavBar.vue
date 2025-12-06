<template>
  <!-- Menu -->

  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo justify-content-center">
      <a href="/admin" class="app-brand-link" style="justify-content: center">
        <span class="app-brand-logo demo" style="justify-content: center">
          <img :src="$page.props.app_logo ? $page.props.app_logo : '/public/images/Assets/kodithuwakku.jpg'" alt="" style="height: 100px; width: auto" />
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
      </a>

    <a
  href="javascript:void(0);"
  @click.prevent="toggleMenu"
>
  <i
    class="bx bx-sm align-middle"
    :class="isCollapsed ? '' : ''"
  ></i>
</a>

    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

      <!-- Dashboards -->
      <li class="menu-item" v-bind:class="{ active: addActiveClass(['dashboard']) }">
        <Link :href="route('dashboard')" class="menu-link">
        <i class="menu-icon tf-icons bx bx-tachometer"></i>
        <div data-i18n="Dashboards">Dashboard</div>
        </Link>
      </li>
      <!-- Inquiry -->
      <li class="menu-item" v-bind:class="{
        active: addActiveClass([
          'inquiry.index',
          'inquiry.edit'
        ])
      }" v-if="$root.hasPermission('inquiry.view') && !$page.props.branch">
        <!-- <Link :href="route('inquiry.index')" class="menu-link">
        <i class="menu-icon tf-icons bx bx-mail-send"></i>
        <div data-i18n="Inquiry">Inquiry</div>
        </Link> -->
      </li>
      <!-- Media Library -->
      <li class="menu-item" v-bind:class="{ active: addActiveClass(['media.index']) }"
        v-if="$root.hasPermission('media.view') && !$page.props.branch">
        <Link :href="route('media.index', { c: 'default' })" class="menu-link">
        <i class="menu-icon tf-icons bx bx-photo-album"></i>
        <div data-i18n="Medai Library">Media Library</div>
        </Link>
      </li>

      <!-- Vehicle Manufacture (Live-Auction) -->
      <!-- <li class="menu-item" v-bind:class="{ active: addActiveClass(['vehicle_manufacture.live.index',  'vehicle_manufacture.live.edit', 'vehicle_manufacture.live.create']) }"
        v-if="$root.hasPermission('vehicle_manufacture.view') && !$page.props.branch">
        <Link :href="route('vehicle_manufacture.live.index', { c: 'default' })" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-car-garage"></i>
        <div data-i18n="Vehicle Manufacture Live">Vehicle Manufacture (Live-Auction)</div>
        </Link>
      </li> -->


      <!-- Vehicle CMS -->
      <li class="menu-item" v-bind:class="{
        'active open': addActiveClass([
          'vehicle_cms.users',
          'vehicle_cms.users.create',
          'vehicle_cms.users.edit',
          'vehicle_cms.roles',
          'vehicle_cms.roles.create',
          'vehicle_cms.roles.edit',
          'vehicle_cms.roles.permissions',
          'vehicle_cms.general',
          'vehicle_cms.social-auth',
          'vehicle_cms.mail',
          'payment-options.index',
          'currencies.index',
          'log.index',

          'vehicle_type.create',
          'vehicle_type.edit',
          'vehicle.type.index',

          'vehicle_manufacture.create',
          'vehicle_manufacture.edit',
          'vehicle_manufacture.index',

       //   'vehicle_manufacture.live.create',
        //  'vehicle_manufacture.live.edit',
       //   'vehicle_manufacture.live.index',

          'vehicle_model.view',
          'vehicle_model.create',
          'vehicle_model.edit',
          'vehicle.model',

          'vehicle.color',
          'vehicle.color.view',
          'vehicle.color.create',
          'vehicle.color.edit',

          'vehicle.index',
          'vehicle.create',
          'vehicle.edit',

          'vehicle.feature',
          'vehicle.feature.view',
          'vehicle.feature.create',
          'vehicle.feature.edit',
        ]),
      }" v-if="!$page.props.branch">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-car"></i>

          <div data-i18n="Vehicle_CMS">Vehicle CMS</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'vehicle_type.users',
              'vehicle_type.create',
              'vehicle_type.edit',
              'vehicle.type.index',
            ]),
          }" v-if="$root.hasPermission('vehicle_type.view')">
            <Link :href="route('vehicle.type.index')" class="menu-link">
            <div data-i18n="Vehicle type">Vehicle type</div>
            </Link>
          </li>
          <!-- <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'vehicle_manufacture.live.create',
              'vehicle_manufacture.live.edit',
              'vehicle_manufacture.live.index',
            ]),
          }" v-if="$root.hasPermission('vehicle_manufacture.view')">
            <Link :href="route('vehicle_manufacture.live.index')" class="menu-link">
            <div data-i18n="Vehicle Manufacture">Vehicle Manufacture (Live-Auction)</div>
            </Link>
          </li> -->
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'vehicle_manufacture',
              'vehicle_manufacture.create',
              'vehicle_manufacture.edit',
              'vehicle_manufacture.index',
            ]),
          }" v-if="$root.hasPermission('vehicle_manufacture.view')">
            <Link :href="route('vehicle_manufacture.index')" class="menu-link">
            <div data-i18n="Vehicle Manufacture">Vehicle Manufacture</div>
            </Link>
          </li>
          <!-- <li
            class="menu-item"
            v-bind:class="{
              active: addActiveClass(['settings']),
            }"
            v-if="$root.hasPermission('system-setting.view')"
          >
            <Link :href="route('settings')" class="menu-link">
              <div data-i18n="General Settings">General Settings</div>
            </Link>
          </li> -->
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'vehicle.model',
              'vehicle_model.create',
              'vehicle_model.edit',
            ]),
          }" v-if="$root.hasPermission('vehicle_model.view')">
            <Link :href="route('vehicle.model')" class="menu-link">
            <div data-i18n="Vehicle Model">Vehicle Model</div>
            </Link>
          </li>
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'vehicle.color',
              'vehicle.color.create',
              'vehicle.color.edit',
            ]),
          }" v-if="$root.hasPermission('vehicle_color.view')">
            <Link :href="route('vehicle.color')" class="menu-link">
            <div data-i18n="Vehicle Color">Vehicle Color</div>
            </Link>
          </li>
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'vehicle.feature',
              'vehicle.feature.create',
              'vehicle.feature.edit',
            ]),
          }" v-if="$root.hasPermission('vehicle_feature.view')">
            <Link :href="route('vehicle.feature')" class="menu-link">
            <div data-i18n="Vehicle Feature">Vehicle Feature</div>
            </Link>
          </li>
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'vehicle.index',
              'vehicle.create',
              'vehicle.edit',
            ]),
          }" v-if="$root.hasPermission('vehicle.view')">
            <Link :href="route('vehicle.index')" class="menu-link">
            <div data-i18n="Vehicle">Vehicle</div>
            </Link>
          </li>
        </ul>
      </li>

      <!-- Other CMS -->
      <li class="menu-item" v-bind:class="{
        'active open': addActiveClass([
          'other_cms.users',
          'other_cms.users.create',
          'other_cms.users.edit',
          'other_cms.roles',
          'other_cms.roles.create',
          'other_cms.roles.edit',
          'other_cms.roles.permissions',
          'other_cms.general',
          'other_cms.social-auth',
          'other_cms.mail',
          'payment-options.index',
          'currencies.index',
          'log.index',

          'testimonials.create',
          'testimonials.edit',
          'vehicle.testimonials.index',
          'testimonials.index',

          'newsletter.create',
          'newsletter.edit',
          'newsletter.index',

          'homebanner.view',
          'homebanner.create',
          'homebanner.edit',
          'homebanner.model',

          'advertisements.index',
          'advertisements.view',
          'advertisements.create',
          'advertisements.edit',

          'homebanner.index',
          'homebanner.create',
          'homebanner.edit',

          'events.index',
          'events.create',
          'events.edit',
        ]),
      }" v-if="!$page.props.branch && hasAnyPermission([
        'testimonials.view',
        'roles-permissions.view',
        'system-setting.view',
        'currencies.view'
      ])">
        <!-- <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-traffic-cone"></i>

          <div data-i18n="Other_CMS">Other CMS</div>
        </a> -->

        <ul class="menu-sub">
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'testimonials.view',
              'testimonials.create',
              'testimonials.edit',


            ]),
          }" v-if="$root.hasPermission('testimonials.view')">
            <Link :href="route('testimonials.index')" class="menu-link">
            <div data-i18n="Vehicle type">Vehicle Testimonials</div>
            </Link>
          </li>

          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'newsletter.index',
              'newsletter.create',
              'newsletter.edit',
            ]),
          }" v-if="$root.hasPermission('newsletter.view')">
            <Link :href="route('newsletter.index')" class="menu-link">
            <div data-i18n="Newsletter">News Letter</div>
            </Link>
          </li>
          <!-- <li
            class="menu-item"
            v-bind:class="{
              active: addActiveClass(['settings']),
            }"
            v-if="$root.hasPermission('system-setting.view')"
          >
            <Link :href="route('settings')" class="menu-link">
              <div data-i18n="General Settings">General Settings</div>
            </Link>
          </li> -->
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'homebanner.index',
              'homebanner.create',
              'homebanner.edit',
            ]),
          }" v-if="$root.hasPermission('homebanner.view')">
            <Link :href="route('homebanner.index')" class="menu-link">
            <div data-i18n="Home Banner">Home Banner</div>
            </Link>
          </li>

          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'advertisements.view',
              'advertisements.create',
              'advertisements.edit',
              'advertisements.index',
            ]),
          }" v-if="$root.hasPermission('advertisements.view')">
            <Link :href="route('advertisements.index')" class="menu-link">
            <div data-i18n="Advertisements">Advertisements</div>
            </Link>
          </li>

          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'events.index',
              'events.create',
              'events.edit',
            ]),
          }" v-if="$root.hasPermission('events.view')">
            <Link :href="route('events.index')" class="menu-link">
            <div data-i18n="News And Events">News And Events</div>
            </Link>
          </li>
        </ul>
      </li>

      <!-- Customer-->
      <li class="menu-item" v-bind:class="{
        active: addActiveClass([
          'customer.index',
          'customer.create',
          'customer.edit'
        ])
      }" v-if="$root.hasPermission('customer.view') && !$page.props.branch">
        <Link :href="route('customer.index', { c: 'default' })" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>

        <div data-i18n="Customer">Customer</div>
        </Link>
      </li>
      <!-- Country-->
      <li class="menu-item" v-bind:class="{
        active: addActiveClass([
          'country.index',
          'country.create',
          'country.edit'
        ])
      }" v-if="$root.hasPermission('country.view') && !$page.props.branch">
        <Link :href="route('country.index', { c: 'default' })" class="menu-link">
        <i class="menu-icon tf-icons bx bx-world"></i>

        <div data-i18n="Country">Country</div>
        </Link>
      </li>

      <li
  class="menu-item"
  v-bind:class="{
    active: addActiveClass([
      'ourcustomer.index',
      'ourcustomer.create',
      'ourcustomer.edit'
    ])
  }"
  v-if="$root.hasPermission('ourcustomer.view') && !$page.props.branch"
>
  <!-- <Link :href="route('ourcustomer.index')" class="menu-link">
    <i class="menu-icon tf-icons bx bx-group"></i>
    <div data-i18n="Our Customers">Our Customers</div>
  </Link> -->
</li>
      <!-- Affiliate Config-->
      <!-- <li class="menu-item" v-bind:class="{
        active: addActiveClass([
          'settings.affiliate-pages',
        ])
      }" v-if="$root.hasPermission('system-setting.view') && !$page.props.branch">
        <Link :href="route('settings.affiliate-pages')" class="menu-link">
        <i class="menu-icon tf-icons bx bx-network-chart"></i>

        <div data-i18n="Affiliate Config">Affiliate Config</div>
        </Link>
      </li> -->
      <!-- Settings -->
      <li class="menu-item" v-bind:class="{
        'active open': addActiveClass([
          'settings.users',
          'settings.users.create',
          'settings.users.edit',
          'settings.roles',
          'settings.roles.create',
          'settings.roles.edit',
          'settings.roles.permissions',
          'settings.general',
          'settings.social-auth',
          'settings.mail',
          'payment-options.index',
          'currencies.index',
          'log.index',
        ]),
      }" v-if="!$page.props.branch && hasAnyPermission([
        'backend-user.view',
        'roles-permissions.view',
        'system-setting.view',
        'currencies.view'
      ])">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-cog"></i>
          <div data-i18n="Settings">Settings</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'settings.users',
              'settings.users.create',
              'settings.users.edit',
            ]),
          }" v-if="$root.hasPermission('backend-user.view')">
            <!-- <Link :href="route('settings.users')" class="menu-link">
            <div data-i18n="Backend Users">Backend Users</div>
            </Link> -->
          </li>
          <li class="menu-item" v-bind:class="{
            active: addActiveClass([
              'settings.roles',
              'settings.roles.create',
              'settings.roles.edit',
              'settings.roles.permissions',
            ]),
          }" v-if="$root.hasPermission('roles-permissions.view')">
            <!-- <Link :href="route('settings.roles')" class="menu-link">
            <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </Link> -->
          </li>
          <li class="menu-item" v-bind:class="{
            active: addActiveClass(['settings.general']),
          }" v-if="$root.hasPermission('system-setting.view')">
            <Link :href="route('settings.general')" class="menu-link">
            <div data-i18n="General Settings">General Settings</div>
            </Link>
          </li>
          <!-- <li class="menu-item" v-bind:class="{
            active: addActiveClass(['settings.social-auth']),
          }" v-if="$root.hasPermission('system-setting.view')">
            <Link :href="route('settings.social-auth')" class="menu-link">
            <div data-i18n="Social Auth Settings">Social Auth Settings</div>
            </Link>
          </li> -->
          <li class="menu-item" v-bind:class="{
            active: addActiveClass(['currencies.index']),
          }" v-if="$root.hasPermission('currencies.view')">
            <Link :href="route('currencies.index')" class="menu-link">
            <div data-i18n="Currencies">Currencies</div>
            </Link>
          </li>
          <!-- <li class="menu-item" v-bind:class="{
            active: addActiveClass(['settings.mail']),
          }" v-if="$root.hasPermission('system-setting.view')">
            <Link :href="route('settings.mail')" class="menu-link">
            <div data-i18n="Mail Settings">Mail Settings</div>
            </Link>
          </li> -->
        </ul>
      </li>



      <!-- Offers -->
    </ul>
  </aside>
  <!-- / Menu -->
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import PerfectScrollbar from "perfect-scrollbar";

export default {
  components: { Link },
  data() {
    return {
      showingNavigationDropdown: false,
      expanded: true,
      collapsed: false,
      hidden: true,
      currentRoute: "",
      isCollapsed: false,
      openSubmenus: {},
    };
  },

  mounted() {
    new PerfectScrollbar(".menu-inner", {
      wheelPropagation: false,
      wheelSpeed: 0.5,
    });

    // make sure it starts closed on mobile
    this.closeMenuOnMobile();
  },

  watch: {
    // this changes on every Inertia navigation
    '$page.url'() {
      this.closeMenuOnMobile();
    },
  },

  methods: {
    addActiveClass(routes) {
      return routes.includes(route().current());
    },

    hasAnyPermission(permissions) {
      return permissions.some((p) => this.$root.hasPermission(p));
    },

    toggleMenu() {
      const body = document.body;
      this.isCollapsed = !this.isCollapsed;

      if (window.innerWidth >= 1200) {
        // desktop – collapse / expand
        body.classList.toggle("layout-menu-collapsed", this.isCollapsed);
      } else {
        // mobile – overlay open / close
        const open = !this.isCollapsed;
        body.classList.toggle("layout-menu-open", open);
        body.classList.toggle("layout-menu-expanded", open);
      }
    },

    // called after every Inertia navigation
    closeMenuOnMobile() {
      if (window.innerWidth < 1200) {
        const body = document.body;
        this.isCollapsed = true;
        body.classList.remove("layout-menu-open", "layout-menu-expanded");
      }
    },

    toggleSubmenu(key) {
      this.openSubmenus[key] = !this.openSubmenus[key];
    },

    isSubmenuOpen(key, routes) {
      return !!this.openSubmenus[key] || this.addActiveClass(routes);
    },
  },
};


</script>

<style>
.rotate {
  transform: rotate(90deg);
}

.main-menu-content {
  max-height: 100vh;
  overflow-y: scroll;
  overflow-x: hidden;
}
</style>
