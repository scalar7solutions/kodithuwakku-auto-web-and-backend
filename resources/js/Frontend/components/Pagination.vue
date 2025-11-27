<template>
  <div class="pagination-area">
    <nav class="d-flex justify-items-center justify-content-between">
      <!-- mobile prev/next omitted for brevity -->

      <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
        <!-- <div>
          <p class="small text-muted">
            Showing
            <span class="fw-semibold">{{ firstItem }}</span>
            to
            <span class="fw-semibold">{{ lastItem }}</span>
            of
            <span class="fw-semibold">{{ total }}</span>
            results
          </p>
        </div> -->

        <div>
          <ul class="pagination">
            <!-- Prev arrow -->
            <li class="page-item" :class="{ disabled: currentPage === 1 }">
              <a class="page-link" href="#" @click.prevent="previousPage">&lsaquo;</a>
            </li>

            <!-- only 3 pages will display -->
            <li
              v-for="page in displayedPages"
              :key="page"
              class="page-item"
              :class="{ active: page === currentPage }"
            >
              <a class="page-link" href="#" @click.prevent="gotoPage(page)">
                {{ page }}
              </a>
            </li>

            <!-- Next arrow -->
            <li class="page-item" :class="{ disabled: currentPage === lastPage }">
              <a class="page-link" href="#" @click.prevent="nextPage">&rsaquo;</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  props: {
    currentPage: { type: Number, required: true },
    lastPage:    { type: Number, required: true },
    firstItem:   { type: Number, required: true },
    lastItem:    { type: Number, required: true },
    total:       { type: Number, required: true },
  },
  data() {
    return {
      // show at most 3 number buttons
      maxVisiblePages: 3,
    };
  },
  computed: {
    displayedPages() {
      const totalPages   = this.lastPage;
      const cur          = this.currentPage;
      const halfVisible  = Math.floor(this.maxVisiblePages / 2);

      // compute preliminary window
      let startPage = cur - halfVisible;
      let endPage   = cur + halfVisible;

      // clamp to [1 .. lastPage]
      if (startPage < 1) {
        startPage = 1;
        endPage   = Math.min(this.maxVisiblePages, totalPages);
      }
      if (endPage > totalPages) {
        endPage   = totalPages;
        startPage = Math.max(1, totalPages - this.maxVisiblePages + 1);
      }

      // build the array [startPage … endPage]
      return Array.from(
        { length: endPage - startPage + 1 },
        (_, i) => startPage + i
      );
    }
  },
  emits: ['goto'],
  methods: {
    nextPage() {
      if (this.currentPage < this.lastPage) {
        this.$emit('goto', this.currentPage + 1);
      }
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.$emit('goto', this.currentPage - 1);
      }
    },
    gotoPage(page) {
      this.$emit('goto', page);
    },
  },
};
</script>
