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
                            <th>Type</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="route in routes.routes">
                            <td class="text-center">
                                <!--<img class="img-avatar img-avatar48" src="assets/img/avatars/avatar7.jpg" alt="">-->
                                {{ route.route_id }}
                            </td>
                            <td class="font-w600">{{ route.route_name }}</td>
                            <td>{{ typeName(route) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a>
                                        <button class="btn btn-xs btn-info" type="button" data-toggle="tooltip" title="Edit User"><i class="fa fa-train"></i></button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                timetable: JSON.parse(timetable),
                routes: JSON.parse(routes),
                routeTypes: JSON.parse(routeTypes)
            }
        },
        created() {
            this.getTimetable();
        },
        methods: {
            getLatest() {

            },
            getTimetable() {

            },
            typeName(route) {
                var routeArray = this.routeTypes.route_types;
                for(var i = 0; i < routeArray.length; i++){
                    if(routeArray[i].route_type == route.route_type){
                        return routeArray[i].route_type_name;
                    }
                }
            }
        },
        computed: {

        }
    }
</script>
