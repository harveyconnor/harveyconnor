<template>
    <div class="col-sm-12">
        <form>
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" v-model="title">
            </div>
            <div class="form-group">
                <label>Slug</label>
                <pre class="form-control">{{ slugify }}</pre>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" v-model="description">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea id="js-ckeditor" name="content"></textarea>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input class="js-tags-input form-control" type="text" id="meta">
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" @click.prevent="createPage">Create</button>
            </div>

        </form>
    </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                title: '',
                description: '',
                content: '',
          }
        },
        methods: {
            createPage() {

                var form = new FormData();

                var meta = $('#meta').val();
                var content = CKEDITOR.instances['js-ckeditor'].getData();

                form.append('title', this.title);
                form.append('description', this.description);
                form.append('content', content);
                form.append('meta', meta);
                form.append('slug', this.slugify);

                this.$http.post('/admin/pages/create', form).then(function (res) {
                    swal({
                        title: "Success!",
                        text: "Added a new Page",
                        type: "success",
                        timer: 800,
                        showConfirmButton: false
                    });

                }, function () {
                    //Display Sweet Alert Error Message
                    swal({
                        title: "An Error Occurred!",
                        text: "Please try again later.",
                        type: "error",
                        timer: 800,
                        showConfirmButton: false
                    });
                }.bind(this));
            }
        },
        computed: {
            slugify(){
                var slug = require('slug');
                return slug(this.title, {lower: true});
            }
        }
    }
</script>
