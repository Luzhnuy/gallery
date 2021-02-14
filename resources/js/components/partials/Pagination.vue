<template>
    <paginate
        :page-count="pageCount"
        :click-handler="setPage"
        :container-class="'pagination pagination-sm mt-2 mb-0'"
        :prev-class="'page-item'"
        :page-class="'page-item'"
        :next-class="'page-item'"
        :prev-link-class="'page-link'"
        :page-link-class="'page-link'"
        :next-link-class="'page-link'"
    />
</template>

<script>
import Paginate from "vuejs-paginate";

export default {
    name: "Pagination",
    components: {Paginate},
    props: ['pageCount'],
    methods: {
        setPage(pageNumber) {
            this.$emit('setPage', pageNumber)
        },
    },
}
</script>

<style scoped>

</style>
