<template>
    <div class="container">

        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Image title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="image.title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Tags</label>
                <select multiple class="form-control" id="exampleFormControlSelect2" v-model="image.tags">
                    <option v-for="tag in tags" :value="tag.id">{{ tag.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" @change="imageChange">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="button" @click="saveImage()">Save</button>
            </div>
            <div class="alert alert-danger col-sm-12" role="alert" v-if="display_error">Error!!</div>
        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            tags: [],
            image: {
                file: null,
                title: null,
                tags: [],
            },
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
        imageChange(event) {
            this.image.file = event.target.files[0];

        },
        saveImage() {
            const formData = new FormData();
            formData.append("image", this.image.file);
            formData.append("title", this.image.title);
            for (let el of this.image.tags) {
                formData.append("tags[]", el);
            }

            this.axios.post("/api/photos", formData).then(response => {
                if (response.status === 201) {
                    this.display_error = true;
                    this.$router.push({name: "home"});
                } else {
                    this.display_error = true;
                }
            }).catch(err => {
                this.display_error = true;
            });

        },
    }
}
</script>

<style>
 .save {
     text-align: center;
 }
</style>
