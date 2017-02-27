<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" type="text" :value="user.id" readonly>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" v-model="user.first_name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" v-model="user.last_name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control">
                            <option v-for="role in roles" :selected="role.role_id == user.role_id" :value="role.role_id">{{ role.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Time Created</label>
                        <input class="form-control" type="text" :value="user.created_at" readonly>
                    </div>
                    <div class="form-group">
                        <label>Last Modified</label>
                        <input class="form-control" type="text" :value="user.updated_at" readonly>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                user: JSON.parse(user),
                roles: JSON.parse(roles)
          }
        },
        methods: {

        },
        computed: {

        }
    }
</script>
