<template>
    <div class="box-body">


        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>School</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Instructor <br><small>(refresh)</small></th>
                    <th>Number of students</th>
                    <th v-if="isAdmin()">Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(section, index) in sections">
                    <td>
                         <span :class="labelSchool(section.course.school_id)" class="label">
                            {{ section.course.school.name }}
                        </span>
                    </td>

                    <td>{{ section.course.code }} - {{ section.course.name }}</td>

                    <td>{{ section.code }}</td>

                    <td>{{ section.instructor.aid }} - {{ section.instructor.name }}</td>

                    <td>{{ section.students_number }}</td>

                    <td v-if="isAdmin()">{{ section.author.name }} </td>

                    <template v-if="!isAdmin()">
                        <td v-if="belongs(section)" class="col-md-2">
                            <button @click="setSection(section, index)" class="btn btn-primary btn-flat"
                                    data-toggle="modal"
                                    data-target="#updateSectionModal">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button @click="deleteSection(section, index)" class="btn btn-danger btn-flat">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                        <td class="col-md-2" v-else>Not yours to manage.</td>
                    </template>
                    <template v-else>
                        <td class="col-md-2">
                            <button @click="setSection(section, index)" class="btn btn-primary btn-flat"
                                    data-toggle="modal"
                                    data-target="#updateSectionModal">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button @click="deleteSection(section, index)" class="btn btn-danger btn-flat">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>

        <div class="modal fade" id="createSectionModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Create section</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course</label>
                                    <courses-select :options="courses"></courses-select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instructor</label>
                                    <instructors-select :options="instructors"></instructors-select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Number of students</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <input type="text" class="form-control" v-model="section.students_number"
                                               placeholder="A random number, guess :)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" @click="createSection()">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateSectionModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update section {{ section.course.code}} {{ section.code }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                        <input type="text" class="form-control" v-model="section.code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Number of students</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        <input type="text" class="form-control" v-model="section.students_number">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course</label>
                                    <courses-select :options="courses" :value="section.course_id"></courses-select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instructor</label>
                                    <instructors-select :options="instructors" :value="section.user_id"></instructors-select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                                @click="updateSection()">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        props: ['sections', 'current_user', 'instructors', 'courses'],

        created(){
            this.$events.$on('adminSelectedCourse', value => {
                this.setCourseID(value);
            });

            this.$events.$on('adminSelectedInstructor', value => {
                this.setInstructorID(value);
            });
        },

        data(){
            return {
                course_id: null,
                user_id: null,
                section: {
                    index: null,
                    id: null,
                    course_id: null,
                    user_id: null,
                    students_number: null,
                    course: {
                        code: null,
                    }
                },
            }
        },

        methods: {

            clearSection(){
                this.section = {
                    index: null,
                    id: null,
                    course_id: null,
                    user_id: null,
                    students_number: null,
                    course: {
                        code: null,
                    }
                }
            },

            setSection(section, index){
                this.section = section;
            },

            createSection(){
                this.section.course_id = this.course_id;
                this.section.user_id = this.user_id;
                if(this.section.course_id !== null && this.section.user_id !== null){
                    axios.post('/api/sections', {
                        section: this.section,
                        created_by: this.current_user.id
                    }).then(response => {
                        toastr.success(this.section.code + ' - ' + this.section.name, 'Course created!');
                        this.sections.push(response.data);
                        this.clearSection();
                    }).catch(error => {
                        console.log(error);
                        toastr.error('Something happenned.', 'Error!');
                    });
                }else{
                    toastr.error('Course and instructor required.', 'Error!');
                }
            },

            updateSection(){
                this.section.course_id = this.course_id;
                this.section.user_id = this.user_id;
                let name = this.section.course.code + ' ' + this.section.code;
                axios.put('/api/sections' + this.section.id, {section: this.section}).then(response => {
                    toastr.success(name, 'Course updated!');
                }).catch(error => {
                    console.log(error);
                    toastr.error('Reload the page.', 'Error!');
                });
            },

            deleteSection(section, index){
                if (confirm("Are you sure ?")) {
                    let name = section.course.code + ' ' + section.code;
                    axios.delete('/api/sections' + section.id).then(response => {
                        toastr.success(name, 'Course deleted!');
                        this.sections.splice(index, 1);
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

            belongs(section){
                return section.created_by == this.current_user.id;
            },

            isAdmin(){
                return this.current_user.role.slug == 'admin';
            },

            setCourseID(value){
                this.course_id = value;
            },

            setInstructorID(value){
                this.user_id = value;
            }

        }

    }
</script>