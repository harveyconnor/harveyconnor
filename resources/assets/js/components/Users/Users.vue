<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 120px;"><i class="si si-user"></i></th>
                            <th>Name</th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 15%;">Role</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in users.data">
                            <td class="text-center">
                                <!--<img class="img-avatar img-avatar48" src="assets/img/avatars/avatar7.jpg" alt="">-->
                                {{ user.id }}
                            </td>
                            <td class="font-w600">{{ user.first_name }} {{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <span v-if="user.role.role_id == 0" class="label label-default">{{ user.role.name }}</span>
                                <span v-else-if="user.role.role_id == 1" class="label label-info">{{ user.role.name }}</span>
                                <span v-else-if="user.role.role_id == 2" class="label label-primary">{{ user.role.name }}</span>
                                <span v-else-if="user.role.role_id == 3" class="label label-warning">{{ user.role.name }}</span>
                                <span v-else-if="user.role.role_id == 4" class="label label-danger">{{ user.role.name }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a @click.prevent="editUser(user)">
                                        <button class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Edit User"><i class="fa fa-pencil"></i></button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <nav class="col-sm-6 col-sm-offset-3">
                <nav>
                    <ul class="pagination">
                        <li :class="isFirstPage ? 'disabled' : ''" tabindex="0">
                            <a @click.prevent="gotoPage(1)" href="">First</a>
                        </li>
                        <li :class="isFirstPage ? 'previous disabled' : 'previous'" tabindex="0">
                            <a @click.prevent="loadPrevPage" href="">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <li v-for="pageNumber in paginatePages" :class="(pageNumber == users.current_page) ? 'active disabled' : ''" tabindex="0">
                            <a @click.prevent="gotoPage(pageNumber)" href="">{{pageNumber}}</a>
                        </li>
                        <li :class="isLastPage ? 'next disabled' : 'next'" tabindex="0">
                            <a @click.prevent="loadNextPage" href=""><i class="fa fa-angle-right"></i></a>
                        </li>
                        <li :class="isLastPage ? 'disabled' : ''" tabindex="0">
                            <a @click.prevent="gotoPage(users.last_page)" href="">Last</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                users: JSON.parse(users),
                prevPage: prevPage,
                nextPage: nextPage,
                range: 3
          }
        },
        methods: {
            editUser(user) {
                window.location = '/admin/user/'+user.id;
            },
            loadNextPage() {
                this.$http.get(this.users.next_page_url).then(function(res){
                    var paginate = res.data;
                    this.nextPage = paginate.nextPage;
                    this.users = JSON.parse(paginate.users);
                }).bind(this);
            },
            loadPrevPage() {
                this.$http.get(this.users.prev_page_url).then(function(res){
                    var paginate = res.data;
                    this.prevPage = paginate.prevPage;
                    this.users = JSON.parse(paginate.users);
                }).bind(this);
            },
            gotoPage(number) {
                this.$http.get('/admin/users?page='+number).then(function(res){
                    var paginate = res.data;
                    this.nextPage = paginate.nextPage;
                    this.users = JSON.parse(paginate.users);
                }).bind(this);
            }
        },
        computed: {
            paginatePages() {
                var pages = []

                for(var i = this.rangeStart; i <= this.rangeEnd; i++) {
                    pages.push(i)
                }

                return pages
            },
            isLastPage() {
                if(this.users.last_page == this.users.current_page){
                    return true;
                }else{
                    return false;
                }
            },
            isFirstPage() {
                if(this.users.current_page == 1){
                    return true;
                }else{
                    return false;
                }
            },
            rangeStart() {
                //* 2 = the page range(+-) the current page eg. current page =5, it will show 3 & 4
                // It's the numbers surrounding the current page
                // *//
                var start = this.users.current_page - this.range

                return (start > 0) ? start : 1
            },
            rangeEnd() {
                var end = this.users.current_page + this.range

                return (end < this.users.last_page) ? end : this.users.last_page
            },
        }
    }
</script>
