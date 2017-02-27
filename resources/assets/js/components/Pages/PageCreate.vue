<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-themed block-rounded block-bordered">
                <div class="block-header bg-smooth-darker">
                    <h3 class="block-title">Create new page</h3>
                </div>
                <div class="block-content">
                    <form>
                        <div :class="errorList.title ? 'form-group has-error' : 'form-group'">
                            <div v-if="errorList.title">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <ul class="fa-ul"><li v-for="error in errorList.title" ><i class="fa fa-exclamation-circle fa-li"></i> {{ error }}</li></ul>
                                </div>
                            </div>
                            <label>Title</label>
                            <input class="form-control" type="text" v-model="title" maxlength="255" @change="delete errorList.title && delete errorList.slug" required>
                        </div>
                        <div :class="errorList.slug ? 'form-group has-error' : 'form-group'">
                            <div v-if="errorList.slug">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <ul class="fa-ul"><li v-for="error in errorList.slug" ><i class="fa fa-exclamation-circle fa-li"></i> {{ error }}</li></ul>
                                </div>
                            </div>
                            <label>Slug</label>
                            <pre class="form-control">{{ slugify }}</pre>
                        </div>
                        <div :class="errorList.description ? 'form-group has-error' : 'form-group'">
                            <div v-if="errorList.description">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <ul class="fa-ul"><li v-for="error in errorList.description" ><i class="fa fa-exclamation-circle fa-li"></i> {{ error }}</li></ul>
                                </div>
                            </div>
                            <label>Description</label>
                            <input class="form-control" type="text" v-model="description" maxlength="255" @change="delete errorList.description" required>
                        </div>
                        <div :class="errorList.content ? 'form-group has-error' : 'form-group'">
                            <div v-if="errorList.content">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <ul class="fa-ul"><li v-for="error in errorList.content" ><i class="fa fa-exclamation-circle fa-li"></i> {{ error }}</li></ul>
                                </div>
                            </div>
                            <label>Content</label>
                            <textarea id="js-ckeditor" name="content" maxlength="5000" required></textarea>
                        </div>
                        <div :class="errorList.meta ? 'form-group has-error' : 'form-group'">
                            <div v-if="errorList.meta">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <ul class="fa-ul"><li v-for="error in errorList.meta" ><i class="fa fa-exclamation-circle fa-li"></i> {{ error }}</li></ul>
                                </div>
                            </div>
                            <label>Tags</label>
                            <input class="js-tags-input form-control" type="text" id="meta" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" @click.prevent="createPage">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                title: '',
                description: '',
                content: '',
                errorList: []
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

                    window.location = '/'+this.slugify;

                }, function (errors) {
                    //Display Sweet Alert Error Message
                    this.errorList = errors.data;
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
