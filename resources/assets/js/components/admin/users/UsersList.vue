<template>
    <div class="box-body">
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in users">
                    <td class="col-md-1">{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <span :class="labelRole(user.role_id)" class="label">
                            {{ nameRole(user.role_id) }}
                        </span>
                    </td>
                    <td class="col-md-2">
                        <button @click="setUser(user, index)" class="btn btn-primary btn-flat" data-toggle="modal"
                                data-target="#updateUserModal">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button @click="deleteUser(user, index)" class="btn btn-danger btn-flat">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>


        <div class="modal fade" id="updateUserModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update user #{{ user.id }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" v-model="user.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" v-model="user.email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Leave empty to keep unchanged." v-model="user.password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                        <select class="form-control" v-model="user.role_id">
                                            <option value="1">Administrator</option>
                                            <option value="2">Associate</option>
                                            <option value="3">User</option>
                                            <option value="4">Faculty Member</option>
                                            <option value="5">Registration Office</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                                @click="updateUser()">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['users', 'url'],

        data(){
            return {
                user: {
                    index: null,
                    id: null,
                    name: null,
                    email: null,
                    password: null,
                    role_id: null
                }
            }
        },

        methods: {
            setUser(user, index){
                this.user = user;
                this.user.index = index;
            },

            updateUser(){
                axios.post('/api/users/' + this.user.id, {user: this.user}).then(response => {
                    console.log(response.data);
                    toastr.success(this.user.name, 'User updated!');
                }).catch(error => {
                    console.log(error);
                    toastr.error('Reload the page.', 'Error!');
                });
            },

            deleteUser(user, index){
                axios.delete('/api/users/' + user.id).then(response => {
                    toastr.success(user.name, 'User deleted!');
                    this.users.splice(index, 1);
                }).catch(error => {
                    console.log(error);
                    toastr.error('Reload the page.', 'Error!');

                });
            },

            labelRole(role_id){
                switch (role_id) {
                    case "1":
                        return "label-success";
                    case "2":
                        return "label-info";
                    case "3":
                        return "label-default";
                    case "4":
                        return "label-primary";
                    case "5":
                        return "label-warning";
                    default:
                        return "label-default";
                }
            },

            nameRole(role_id){
                switch (role_id) {
                    case "1":
                        return "Administrator";
                    case "2":
                        return "Associate";
                    case "3":
                        return "User";
                    case "4":
                        return "Faculty Member";
                    case "5":
                        return "Registration Office";
                    default:
                        return "N/A";
                }
            }
        }

    }
</script>