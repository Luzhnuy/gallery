<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 block">
                <div class="row">
                    <h2 class="title col-sm-12">Add Tag</h2>
                    <div class="tag col-sm-6 offset-sm-3">
                        <input type="text" v-model="new_tag.name">
                        <button class="btn btn-sm btn-primary" @click="saveTag()">Save</button>
                    </div>
                    <div class="alert alert-success col-sm-12" role="alert" v-if="display_success">Saved!</div>
                    <div class="alert alert-danger col-sm-12" role="alert" v-if="display_error">Error!!</div>
                </div>
            </div>
            <div class="col-sm-6 block">
                <h2>Tags</h2>
                <ul class="list-group">
                    <li class="list-group-item tag-item" v-for="tag in tags">
                        <span>{{ tag.name }}</span>
                        <span class="remove" @click="removeTag(tag.id)">Remove</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                tags: [],
                new_tag: {
                    title: null,
                },
                display_success: false,
                display_error: false,

            }
        },
        mounted() {
            this.getTags();
        },
        methods: {
            getTags() {
                this.axios.get("/api/tags").then(response => {
                    this.tags = response.data.tags;
                })
            },

            saveTag() {
                this.axios.post("/api/tags", {name: this.new_tag.name}).then(response => {
                    if (response.status === 201) {
                        this.display_success = true;
                        this.tags.push(response.data.tag);
                        this.new_tag.name = null;
                        setTimeout(() => {
                            this.display_success = false;
                        }, 3000)
                    }
                }).catch(error => {
                    console.error(error);
                    this.display_error = true;
                    setTimeout(() => {
                        this.display_error = false;
                    }, 3000)
                });
            },

            removeTag(tag_id) {
                this.axios.delete("/api/tags/" + tag_id,).then(response => {
                    this.getTags();
                }).catch(error => {
                    console.error(error);
                    this.display_error = true;
                    setTimeout(() => {
                        this.display_error = false;
                    }, 3000)
                });
            }
        }
    }
</script>

<style>
    .title{
        text-align: center;
    }

    .block {
        text-align: center;
    }

    .block .tag {
        display: flex;
        justify-content: center;
    }

    .tag-item {
        display: flex;
        justify-content: space-between;
    }
    .tag-item .remove:hover {
        cursor: pointer;
    }
</style>
