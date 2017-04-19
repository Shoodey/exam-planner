<template>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title" v-html="titles[step-1]"></h3>
            <div class="progress-group">
                <span class="progress-text">&nbsp;</span>
                <span class="progress-number"><b>Step {{ step }}</b> of {{ max_steps}}</span>

                <div class="progress progress-striped active sm">
                    <div class="progress-bar progress-bar-green" :style="{width: progress + '%' }"></div>
                </div>
            </div>
        </div>

        <div v-show="step == 1">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <h4>Select courses</h4>
                            <v-select placeholder="Press to select one or multiple courses. Click outside to close drawer."
                                      v-model="selected_courses" id="v-select" multiple
                                      :options="courses"></v-select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button :class="{disabled: step == 1}" class="btn btn-success btn-flat pull-left">
                    Previous

                </button>
                <button :class="{disabled: step == 5}" class="btn btn-success btn-flat pull-right"
                        @click="saveCourses">
                    Next

                </button>
            </div>
        </div>

        <div v-show="step == 2">
            <div class="box-body">
                <div class="col-md-12">
                    <h4>Select sections</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Selected</th>
                                <th>Section</th>
                                <th width="150px">Nb. of student</th>
                                <th>Instructor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="course in selected_courses">
                                <tr v-for="(section, index) in course.sections">
                                    <td style="vertical-align: middle; text-align: center"
                                        :rowspan="course.sections.length" v-if="index == 0">
                                        {{ course.label }}

                                    </td>
                                    <td width="10px" style="text-align: center">
                                        <input type="checkbox" class="minimal" :checked="isCurrentUser(section.instructor)">
                                    </td>
                                    <td>{{ section.code }}</td>
                                    <td>{{ section.students_number }}</td>
                                    <td v-if="!isCurrentUser(section.instructor)">
                                        {{ section.instructor.aid }} - {{ section.instructor.name }}
                                    </td>
                                    <td v-else></td>
                                </tr>

                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <button :class="{disabled: step == 1}" class="btn btn-success btn-flat pull-left"
                        @click="previousStep">
                    Previous

                </button>
                <button :class="{disabled: step == 5}" class="btn btn-success btn-flat pull-right"
                        @click="saveSections">Next

                </button>
            </div>
        </div>

        <div v-show="step == 3">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Room preference</h4>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="room" checked>
                                Any room
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="room">
                                Auditorium
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="room">
                                Individual desks
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="room">
                                Table seating
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Proctors</h4>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="proctor" checked>
                                None
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="proctor">
                                Assign them for me
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label>
                                <input type="radio" name="proctor">
                                I got my own
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button :class="{disabled: step == 1}" class="btn btn-success btn-flat pull-left"
                        @click="previousStep">
                    Previous
                </button>
                <button class="btn btn-success btn-flat pull-right"
                        @click="saveAll">Save
                        </button>
            </div>
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
                selected_courses: [],
                selected_sections: [],
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
                toastr.success('Instructors have been notified.', 'Success!');
                this.nextStep();
            },

            saveAll(){
                toastr.success('Your request has been sent.', 'Success!');
            },

            isCurrentUser(user){
                return user.id == this.current_user.id;
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

    #v-select .close {
        color: #dedede;
        opacity: 1;
        text-shadow: 0 0 0px white;
        font-weight: 100;
    }
</style>