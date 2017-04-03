<template>


    <div class="box-body">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Section</th>
                        <th width="150px">Nb. of student</th>
                        <th>Instructor</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="(course, ic) in courses">
                        <tr v-for="(section, is) in course.sections">
                            <td style="vertical-align: middle; text-align: center"
                                :rowspan="course.sections.length" v-if="is == 0">
                                {{ course.label }}

                            </td>
                            <td>{{ section.code }}</td>
                            <td>{{ section.students_number }}</td>
                            <td>
                                {{ section.instructor.aid }} - {{ section.instructor.name }}



                            </td>
                            <td>
                                <template v-if="isCurrentUser(section.instructor)">
                                    <button @click="editRequest()" class="btn btn-primary btn-flat">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button @click="deleteRequest(section, ic, is)" class="btn btn-danger btn-flat">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </template>
                                <template v-else>
                                    Not yours to manage.


                                </template>
                            </td>
                        </tr>

                    </template>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['courses', 'current_user'],

        data() {
            return {
                titles: [
                    "<i class='fa fa-book'></i> Courses",
                    "<i class='fa fa-tags'></i> Sections",
                    "<i class='fa fa-sliders'></i> Preferences"
                ],
                step: 1,
                max_steps: 3,
                progress: 0,
                notified: false,
                selected_courses: [],
            }
        },

        methods: {

            nextStep(){
                if (this.step < this.max_steps) {
                    this.step++;
                    this.progress += 1 / (this.max_steps - 1) * 100;
                }
            },

            previousStep(){
                if (this.step > 1) {
                    this.step--;
                    this.progress -= 1 / (this.max_steps - 1) * 100;
                }
            },

            saveCourses(){
                if (this.selected_courses.length == 0) {
                    toastr.error('No course selected.', 'Error!');
                } else {
                    this.nextStep()
                }
            },

            saveSections(){
                if (!this.notified) {
                    toastr.error('No one notified.', 'Error!');
                } else {
                    this.nextStep()
                }
            },

            saveAll(){
                toastr.success('Your request has been sent.', 'Success!');
            },

            editRequest(){
                window.location.href = '/faculty/requests/create';
            },

            deleteRequest(section, ic, is){
                toastr.error('Not implemented yet!', 'Error!');
            },

            isCurrentUser(user){
                return user.id == this.current_user.id;
            },

            notify(section){
                axios.post('/api/notify', {
                    from: this.current_user.id,
                    to: section.instructor.id,
                    section: section.id
                }).then(response => {
                    toastr.success(section.instructor.name, 'Notified');
                    this.notified = true;
                }).catch(error => {
                    console.log(error);
                    toastr.error('Something went wrong.', 'Error!');
                });
            }

        },

        updated(){
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    increaseArea: '20%' // optional
                });

                $("#time_range").ionRangeSlider({
                    min: +moment().hour(8).minute(0).format('X'),
                    max: +moment().hour(22).minute(0).format('X'),
                    from: +moment().hour(12).minute(0).format('X'),
                    to: +moment().hour(16).minute(0).format('X'),
                    grid: true,
                    type: 'double',
                    step: 600,
                    prettify: function (num) {
                        var m = moment(num, "X").locale("en");
                        return m.format("HH:mm A");
                    }
                });

                $("#duration_range").ionRangeSlider({
                    values: [
                        "50 minutes", "1 hour 20 minutes",
                        "1 hour 40 minutes", "2 hours", "2 hours 15 minutes",
                        "2 hours 45 minutes", "3 hours"
                    ],
                    grid: true,
                });
            });
        }
    }
</script>

<style>
    /* Cyan theme */
    #v-select .selected-tag {
        color: #dedede;
        background-color: #008D4C;
        border-color: #00763b;
    }

    #v-select.dropdown.open .dropdown-toggle,
    #v-select.dropdown.open .dropdown-menu {
        border-color: #008D4C;
    }

    #v-select .active a {
        background: rgba(50, 50, 50, .1);
        color: #333;
    }

    #v-select.dropdown .highlight a,
    #v-select.dropdown li:hover a {
        background: #00A65A;
        color: #fff;
    }
</style>