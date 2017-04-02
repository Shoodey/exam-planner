<template>
    <div class="box-body">

        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th v-if="isAdmin()">Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in users">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <span :class="labelRole(user.role_id)" class="label">
                            {{ user.role.name }}
                        </span>
                    </td>
                    <td v-if="isAdmin()">
                        {{ user.author.name }}

                    </td>
                    <template v-if="!isAdmin()">
                        <td v-if="belongs(user)" class="col-md-2">
                            <button @click="setUser(user, index)" class="btn btn-primary btn-flat" data-toggle="modal"
                                    data-target="#updateUserModal">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button @click="deleteUser(user, index)" class="btn btn-danger btn-flat">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                        <td class="col-md-2" v-else>
                            Not yours to manage.

                        </td>
                    </template>
                    <template v-else>
                        <td class="col-md-2">
                            <button @click="setUser(user, index)" class="btn btn-primary btn-flat" data-toggle="modal"
                                    data-target="#updateUserModal">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button @click="deleteUser(user, index)" class="btn btn-danger btn-flat">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>

        <div class="modal fade" id="createUserModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create user</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Full Name"
                                               v-model="user.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Email: id@aui.ma"
                                               v-model="user.email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Password"
                                               v-model="user.password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                        <select class="form-control" v-model="user.role_id">
                                            <option v-if="isAdmin()" value="1">Administrator</option>
                                            <option v-if="isAdmin()" value="2">Associate</option>
                                            <option v-if="isAdmin()" value="3">User</option>
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
                                @click="createUser()">Save

                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateUserModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update user: {{ user.name }}</h4>
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
                                        <input type="password" class="form-control"
                                               placeholder="Leave empty to keep unchanged." v-model="user.password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                        <select class="form-control" v-model="user.role_id">
                                            <option v-if="isAdmin()" value="1">Administrator</option>
                                            <option v-if="isAdmin()" value="2">Associate</option>
                                            <option v-if="isAdmin()" value="3">User</option>
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
        props: ['users', 'current_user'],

        data(){
            return {
                user: {
                    index: null,
                    id: null,
                    name: null,
                    email: null,
                    password: null,
                    role_id: null
                },
            }
        },

        methods: {

            clearUser(){
                this.user = {
                    name: null,
                    email: null,
                    password: null,
                    role_id: null
                }
            },

            setUser(user, index){
                this.user = user;
            },

            createUser(){
                axios.post('/api/users', {user: this.user, created_by: this.current_user.id}).then(response => {
                    toastr.success(this.user.name, 'User created!');
                    this.users.push(response.data);
                    this.clearUser();
                }).catch(error => {
                    console.log(error);
                    toastr.error('Email must be unique.', 'Error!');
                });
            },

            updateUser(){
                axios.put('/api/users' + this.user.id, {user: this.user}).then(response => {
                    toastr.success(this.user.name, 'User updated!');
                }).catch(error => {
                    console.log(error);
                    toastr.error('Reload the page.', 'Error!');
                });
            },

            deleteUser(user, index){
                if (confirm("Are you sure ?")) {
                    axios.delete('/api/users' + user.id).then(response => {
                        toastr.success(user.name, 'User deleted!');
                        this.users.splice(index, 1);
                    }).catch(error => {
                        console.log(error);
                        toastr.error('Reload the page.', 'Error!');

                    });
                }
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

            belongs(user){
                return user.created_by == this.current_user.id;
            },

            isAdmin(){
                return this.current_user.role.slug == 'admin';
            }
        }

    }
</script>