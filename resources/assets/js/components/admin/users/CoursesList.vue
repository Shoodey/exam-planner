<template>
    <div class="box-body">

        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>School</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th v-if="isAdmin()">Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(course, index) in courses">
                    <td>
                         <span :class="labelSchool(course.school_id)" class="label text-medium">
                            {{ course.school.name }}
                        </span>
                    </td>

                    <td>{{ course.code }}</td>
                    <td>{{ course.name }}</td>

                    <td v-if="isAdmin()">{{ course.author.name }} </td>

                    <template v-if="!isAdmin()">
                        <td v-if="belongs(course)" class="col-md-2">
                            <button @click="setCourse(course, index)" class="btn btn-primary btn-flat"
                                    data-toggle="modal"
                                    data-target="#updateCourseModal">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button @click="deleteCourse(course, index)" class="btn btn-danger btn-flat">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                        <td class="col-md-2" v-else>Not yours to manage.</td>
                    </template>
                    <template v-else>
                        <td class="col-md-2">
                            <button @click="setCourse(course, index)" class="btn btn-primary btn-flat"
                                    data-toggle="modal"
                                    data-target="#updateCourseModal">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button @click="deleteCourse(course, index)" class="btn btn-danger btn-flat">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>

        <div class="modal fade" id="createCourseModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create course</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Course</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                        <input type="text" class="form-control" placeholder="Code"
                                               v-model="course.code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                        <input type="email" class="form-control" placeholder="Name"
                                               v-model="course.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>School</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <select class="form-control" v-model="course.school_id">
                                            <option value="1">School of Business Administration</option>
                                            <option value="2">School of Humanities & Social Sciences</option>
                                            <option value="3">School of Science and Engineering</option>
                                            <option value="4">Language Center</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" @click="createCourse()">
                            Save

                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateCourseModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update user #{{ course.id }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                        <input type="text" class="form-control" v-model="course.code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                        <input type="text" class="form-control" v-model="course.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>School</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <select class="form-control" v-model="course.school_id">
                                            <option value="1">School of Business Administration</option>
                                            <option value="2">School of Humanities & Social Sciences</option>
                                            <option value="3">School of Science and Engineering</option>
                                            <option value="4">Language Center</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                                @click="updateCourse()">Save



                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['courses', 'current_user'],

        data(){
            return {
                course: {
                    index: null,
                    id: null,
                    code: null,
                    name: null,
                    school_id: null
                },
            }
        },

        methods: {

            clearCourse(){
                this.course = {
                    index: null,
                    id: null,
                    code: null,
                    name: null,
                    school_id: null
                }
            },

            setCourse(course, index){
                this.course = course;
            },

            createCourse(){
                axios.post('/api/courses/', {course: this.course, created_by: this.current_user.id}).then(response => {
                    toastr.success(this.course.code + ' - ' + this.course.name, 'Course created!');
                    this.courses.push(response.data);
                    this.clearCourse();
                }).catch(error => {
                    console.log(error);
                    toastr.error('Code must be unique.', 'Error!');
                });
            },

            updateCourse(){
                axios.put('/api/courses/' + this.course.id, {course: this.course}).then(response => {
                    toastr.success(this.course.code + ' - ' + this.course.name, 'Course updated!');
                }).catch(error => {
                    console.log(error);
                    toastr.error('Reload the page.', 'Error!');
                });
            },

            deleteCourse(course, index){
                if (confirm("Are you sure ?")) {
                    let code = course.code;
                    let name = course.name;
                    axios.delete('/api/courses/' + course.id).then(response => {
                        toastr.success(code + ' - ' + name, 'Course deleted!');
                        this.courses.splice(index, 1);
                    }).catch(error => {
                        console.log(error);
                        toastr.error('Reload the page.', 'Error!');
                    });
                }

            },

            labelSchool(school_id){
                switch (school_id) {
                    case "1":
                        return "label-primary";
                    case "2":
                        return "label-info";
                    case "3":
                        return "label-warning";
                    case "4":
                        return "label-success";
                }
            },

            belongs(course){
                return course.created_by == this.current_user.id;
            },

            isAdmin(){
                return this.current_user.role.slug == 'admin';
            }
        }

    }
</script>