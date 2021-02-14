<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">

                <ul class="list-group list-group-flush">
                    <h2>Tag filter</h2>
                    <li class="list-group-item" v-for="tag in tags">
                        <!-- Default checked -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" :id="tag.id" :value="tag.id"  @change="changeTagFilter(tag.id)">
                            <label class="custom-control-label" :for="tag.id">{{ tag.name }}</label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-sm-7 offset-sm-2">
                <h2>Images</h2>
                <div class="gallery">
                    <div class="card" style="width: 18rem;" v-for="photo in photos">
                        <img class="card-img-top" :src="'/' + photo.image" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ photo.title }}</h5>
                        </div>
                    </div>
                </div>
                <pagination v-if="pageCount > 1" :page-count="pageCount" @setPage="setPage"></pagination>
            </div>
        </div>

    </div>
</template>

<script>
import Pagination from "./partials/Pagination";


export default {
    components: {
        Pagination,
    },
    data() {
        return {
            tags: [],
            params: {
                page: 1,
                filterTags: [],
                itemsPerPage: 6,
            },
            pageCount: 0,
            photos: [],
            imageList: [],
        }
    },
    mounted() {
        this.getTags();
        this.getImages();
    },
    methods: {
        getTags() {
            this.axios.get("/api/tags").then(response => {
                this.tags = response.data.tags;
            })
        },
        getImages() {
            this.axios.get("/api/photos?" + $.param(this.params)).then(response => {
                this.photos = response.data.photos.data;
                this.pageCount = response.data.photos.last_page;

            })
        },
        setPage(pageNumber) {
            this.params.page = pageNumber;
            this.getImages();

        },
        changeTagFilter (tag_id) {
            let index = this.params.filterTags.indexOf(tag_id);
            if (index === -1) {
                this.params.filterTags.push(tag_id);
            } else {
                this.params.filterTags.splice(index, 1);
            }
            this.getImages();
        },
    }
}</script>

<style>
 .gallery {
     display: flex;
     justify-content: flex-start;
     width: 100%;
     flex-wrap: wrap;
     align-items: center;
 }
</style>
