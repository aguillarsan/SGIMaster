<template>
   

    <nav class="d-inline-block">
      <ul class="pagination mb-0">
        <li class="page-item " v-if="pagination.current_page == 1">
          <a class="page-link" href="javascript:void(0)" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
      </li>
      <li class="page-item " v-if="pagination.current_page > 1">
            <a class="page-link"  href="javascript:void(0)"  v-on:click.prevent="changePage(pagination.current_page - 1)" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
      </li>
      <li  v-for="page in pagesNumber"  >
        <a class="page-link" href="javascript:void(0)"  :class="page == pagination.current_page ? 'pag' : ' ' " v-on:click.prevent="changePage(page)" >{{ page }} <span class="sr-only"></span>
        </a>
    </li>

      <li class="page-item" v-if="pagination.current_page < pagination.last_page">
          <a class="page-link" href="javascript:void(0)"  v-on:click.prevent="changePage(pagination.current_page + 1)" ><i class="fas fa-chevron-right"></i></a>
      </li>

      <li class="page-item" v-if="pagination.current_page == pagination.last_page">
          <a class="page-link"href="javascript:void(0)"  disabled   ><i class="fas fa-chevron-right"></i></a>
      </li>
  </ul>
</nav>
</template>
<script>
export default{
    props: {
        pagination: {
            type: Object,
            required: true
        },
        offset: {
            type: Number,
            default: 4
        },
        primaryText: String
    },
    computed: {
        pagesNumber() {
            if (!this.pagination.to) {
                return [];
            }
            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            let to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            let pagesArray = [];
            for (let page = from; page <= to; page++) {
                pagesArray.push(page);
            }
            return pagesArray;
        }
    },
    methods : {
        changePage(page) {
            this.pagination.current_page = page;
            this.$emit('paginate');
            this.loadFunction()
        },
        loadFunction(){
          let loader = this.$loading.show({
            // Optional parameters
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: true,
            onCancel: this.onCancel,
        });
        // simulate AJAX
        setTimeout(() => {
            loader.hide()
        }, 300)
        }
    }
}
</script>