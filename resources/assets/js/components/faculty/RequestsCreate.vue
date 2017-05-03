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
                            <v-select
                                    placeholder="Press to select one or multiple courses. Click outside to close drawer."
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
                                        <input type="checkbox" class="icheck minimal"
                                               :checked="isCurrentUser(section.instructor)">
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
                        <div class="col-md-2 col-md-offset-1">
                            <button :class="roomButtonClass('any')"  class="btn btn-flat" @click="setRoomType('any')">Any room</button>
                        </div>
                        <div class="col-md-2">
                            <button :class="roomButtonClass('auditorium')"  class="btn btn-flat" @click="setRoomType('auditorium')">Auditorium</button>
                        </div>
                        <div class="col-md-2">
                            <button :class="roomButtonClass('desks')"  class="btn btn-flat" @click="setRoomType('desks')">Individual desks</button>
                        </div>
                        <div class="col-md-2">
                            <button :class="roomButtonClass('tables')"  class="btn btn-flat" @click="setRoomType('tables')">Table seating</button>
                        </div>
                        <div class="col-md-2">
                            <button :class="roomButtonClass('lab')"  class="btn btn-flat" @click="setRoomType('lab')">Laboratory</button>
                        </div>
                    </div>
                    <div v-if="room_type !== 'any'" class="col-md-12">
                        <hr>
                        <h4 v-if="room_type === 'lab'" class="text-red">Only select a laboratory if you really need one.</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Building</th>
                                    <th>Selected</th>
                                    <th>Room</th>
                                    <th>Seats</th>
                                    <th>Seating type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="building in buildings">
                                    <tr v-for="(room, index) in building.rooms">
                                        <template v-if="room.type_slug === room_type">
                                              <td style="vertical-align: middle; text-align: center">{{ building.name }}
                                    </td>
                                            <td width="10px" style="text-align: center">
                                                <input name="room" type="radio" class="icheck minimal">
                                            </td>
                                            <td>{{ room.number }}</td>
                                            <td>{{ room.seats }}</td>
                                            <td>{{ room.type }}</td>
                                        </template>
                                    </tr>

                                </template>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h4>Number of proctors</h4>
                        <div class="col-md-6">
                            <input id="proctors" type="text" name="proctors" value="">
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
    import Locations from '../entities/Locations'
    import swal from 'sweetalert2'

    export default {
        props: ['courses', 'current_user'], data() {
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
                room_type: 'desks'
            }
        },
        computed: {
            buildings(){
                return Locations.getAll();
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
                if (this.selected_courses.length === 0) {
                    swal({
                        title: 'Error',
                        text: 'No courses selected.',
                        type: 'error',
                        confirmButtonText: 'Ok',
                    });
                } else {
                    this.nextStep()
                }
            },
            saveSections(){
                swal({
                    title: 'Info',
                    text: 'Instructors have been notified.',
                    type: 'info',
                    confirmButtonText: 'Ok',
                });
                this.nextStep();
            },
            saveAll(){
//                toastr.success('Your request has been sent.', 'Success!');
                swal({
                    title: 'Success',
                    text: 'Your request has been sent.',
                    type: 'success',
                    confirmButtonText: 'Ok',
                })
            },
            isCurrentUser(user){
                return user.id === this.current_user.id;
            },
            setRoomType(type){
                this.room_type = type;
            },
            roomButtonClass(type){
                if(this.room_type === type){
                    return 'btn-success';
                }else{
                    return 'btn-default';
                }
            }
        },
        updated(){
            $(function () {
                $('.icheck').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    increaseArea: '20%' // optional
                });
                $("#proctors").ionRangeSlider({
                    type: "single",
                    grid: false,
                    min: 0,
                    max: 3,
                    from: 0,
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