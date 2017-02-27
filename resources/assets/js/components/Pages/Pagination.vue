<template>
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
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
                        <li v-for="pageNumber in paginatePages" :class="(pageNumber == $parent.pages.current_page) ? 'active disabled' : ''" tabindex="0">
                            <a @click.prevent="gotoPage(pageNumber)" href="">{{pageNumber}}</a>
                        </li>
                        <li :class="isLastPage ? 'next disabled' : 'next'" tabindex="0">
                            <a @click.prevent="loadNextPage" href=""><i class="fa fa-angle-right"></i></a>
                        </li>
                        <li :class="isLastPage ? 'disabled' : ''" tabindex="0">
                            <a @click.prevent="gotoPage($parent.pages.last_page)" href="">Last</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                prevPage: prevPage,
                nextPage: nextPage,
                range: 3,
            }
        },
        methods: {
            search() {
                var form = new FormData();
                form.append('q',this.$parent.keyword);

                this.$http.get('/admin/pages?q='+this.$parent.keyword).then(function(res){
                    var paginate = res.data;
                    this.nextPage = paginate.nextPage;
                    this.$parent.pages = JSON.parse(paginate.pages);
                });
            },
            editPage(page) {
                window.location = '/admin/page/'+page.id;
            },
            viewPage(page) {
                window.location = '/'+page.slug;
            },
            loadNextPage() {
                var query = '';
                if(this.$parent.keyword){
                    query = '&q='+this.$parent.keyword;
                }
                this.$http.get(this.$parent.pages.next_page_url+query).then(function(res){
                    var paginate = res.data;
                    this.nextPage = paginate.nextPage;
                    this.$parent.pages = JSON.parse(paginate.pages);
                }).bind(this);
            },
            loadPrevPage() {
                var query = '';
                if(this.$parent.keyword){
                    query = '&q='+this.$parent.keyword;
                }
                this.$http.get(this.$parent.pages.prev_page_url+query).then(function(res){
                    var paginate = res.data;
                    this.prevPage = paginate.prevPage;
                    this.$parent.pages = JSON.parse(paginate.pages);
                }).bind(this);
            },
            gotoPage(number) {
                var query = '';
                if(this.$parent.keyword){
                    query = '&q='+this.$parent.keyword;
                }
                this.$http.get('/admin/pages?page='+number+query).then(function(res){
                    var paginate = res.data;
                    this.nextPage = paginate.nextPage;
                    this.$parent.pages = JSON.parse(paginate.pages);
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
                if(this.$parent.pages.last_page == this.$parent.pages.current_page){
                    return true;
                }else{
                    return false;
                }
            },
            isFirstPage() {
                if(this.$parent.pages.current_page == 1){
                    return true;
                }else{
                    return false;
                }
            },
            rangeStart() {
                //* 2 = the page range(+-) the current page eg. current page =5, it will show 3 & 4
                // It's the numbers surrounding the current page
                // *//
                var start = this.$parent.pages.current_page - this.range

                return (start > 0) ? start : 1
            },
            rangeEnd() {
                var end = this.$parent.pages.current_page + this.range

                return (end < this.$parent.pages.last_page) ? end : this.$parent.pages.last_page
            },
        }
    }
</script>
