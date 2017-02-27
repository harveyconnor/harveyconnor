<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" class="form-control" v-model="keyword" @keyup.enter="search" placeholder="Enter your search term here...">
                    <span class="input-group-btn"><button class="btn btn-default" type="button" @click="search">Search</button></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 120px;"><i class="si si-doc"></i></th>
                            <th>Title</th>
                            <th style="width: 50%;" class="hidden-sm hidden-xs">Description</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="page in pages.data">
                            <td class="text-center">
                                {{ page.id }}
                            </td>
                            <td class="font-w600">{{ page.title }}</td>
                            <td class="hidden-sm hidden-xs">{{ page.description }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a @click.prevent="editPage(page)">
                                        <button class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Edit Page"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <a @click.prevent="viewPage(page)">
                                        <button class="btn btn-xs btn-success" type="button" data-toggle="tooltip" title="View Page"><i class="fa fa-eye"></i></button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <pagination></pagination>
    </div>
</template>

<script type="text/babel">
    import Pagination from "./Pagination.vue";
    export default {
        components: {
            Pagination
        },
        data() {
            return {
                pages: JSON.parse(pages),
                keyword: ''
          }
        },
        methods: {
            search() {
                var form = new FormData();
                form.append('q',this.keyword);

                this.$http.get('/admin/pages?q='+this.keyword).then(function(res){
                    var paginate = res.data;
                    this.nextPage = paginate.nextPage;
                    this.pages = JSON.parse(paginate.pages);
                });
            },
            editPage(page) {
                window.location = '/admin/page/'+page.id;
            },
            viewPage(page) {
                window.open('/'+page.slug, '_blank');
            }
        }
    }
</script>
