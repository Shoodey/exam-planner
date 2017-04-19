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
                            <h4>Select buildings</h4>
                            <v-select placeholder="Press to select one or multiple buildings."
                                      v-model="selected_buildings" id="v-select" multiple
                                      :options="buildings"></v-select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button :class="{disabled: step == 1}" class="btn btn-success btn-flat pull-left">
                    Previous

                </button>
                <button :class="{disabled: step == 5}" class="btn btn-success btn-flat pull-right"
                        @click="saveBuildings">
                    Next

                </button>
            </div>
        </div>

        <div v-show="step == 2">
            <div class="box-body">
                <div class="col-md-12">
                    <h4>Select rooms</h4>
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
                            <template v-for="building in buildings_info">
                                <tr v-for="(room, index) in building.rooms">
                                    <td style="vertical-align: middle; text-align: center"
                                        :rowspan="building.rooms.length" v-if="index == 0">{{ building.name }}





                                    </td>
                                    <td width="10px" style="text-align: center">
                                        <input type="checkbox" class="minimal" checked>
                                    </td>
                                    <td>{{ room.number }}</td>
                                    <td>{{ room.seats }}</td>
                                    <td>{{ room.type }}</td>
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
                        @click="nextStep">Next


                </button>
            </div>
        </div>

        <div v-show="step == 3">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h4>Select date range

                            <small>Maximum of 3 days</small>
                        </h4>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="dates">
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h4>Exam days time range
                            <small>Exam can be scheduled during this interval</small>
                        </h4>
                        <input id="duration_range" type="text" name="duration_range" value="">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h4>Exam duration
                            <small class="text-red">Default to 2h</small>
                        </h4>
                        <input id="exam_duration" type="text" name="exam_duration" value="">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h4>Break duration</h4>
                        <input id="break_duration" type="text" name="break_duration" value="">
                    </div>
                    <hr>
                </div>
            </div>
            <div class="box-footer">
                <button :class="{disabled: step == 1}" class="btn btn-success btn-flat pull-left"
                        @click="previousStep">
                    Previous

                </button>
                <button :class="{disabled: step == 5}" class="btn btn-success btn-flat pull-right"
                        @click="nextStep">Next

                </button>
            </div>
        </div>

        <div v-show="step == 4">
            <div class="box-body">
                <div class="col-md-12">
                    <h4>Scheduling constraints</h4>
                    <div class="col-md-12">
                        <input type="checkbox" class="minimal">
                        <span>Allow back to back exams</span>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <input type="checkbox" class="minimal">
                        <span>Allow more than two exams a day</span>
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

    export default{
        name: 'registrar-edit-rules',

        updated(){
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                    increaseArea: '20%' // optional
                });

                $('#dates').daterangepicker({
                    "dateLimit": {
                        "days": 2
                    }
                });

                $("#duration_range").ionRangeSlider({
                    min: +moment().hour(0).minute(0).format('X'),
                    max: +moment().hour(24).minute(0).format('X'),
                    from: +moment().hour(8).minute(0).format('X'),
                    to: +moment().hour(20).minute(0).format('X'),
                    grid: true,
                    grid_num: 6,
                    type: 'double',
                    step: 1800,
                    prettify: function (num) {
                        var m = moment(num, 'X').locale("en");
                        return m.format("HH:mm A");
                    }
                });
                $("#exam_duration").ionRangeSlider({
                    values: [
                        "50 minutes", "1 hour 20 minutes",
                        "1 hour 40 minutes", "2 hours", "2 hours 15 minutes",
                        "2 hours 45 minutes", "3 hours"
                    ],
                    grid: true,
                    from: 3
                });

                $("#break_duration").ionRangeSlider({
                    from: 20,
                    min: 10,
                    max: 60,
                    grid: true,
                    step: 10,
                    postfix: ' minutes'
                });
            });
        },

        computed: {
            buildings_info(){
                return Locations.getSelectedBuildingsInfo(this.selected_buildings)
            }
        },

        data(){
            return {
                titles: [
                    "<i class='fa fa-calendar-o'></i> Location",
                    "<i class='fa fa-codepen'></i> Rooms",
                    "<i class='fa fa-clock-o'></i> Date & Time",
                    "<i class='fa fa-sliders'></i> Others"],
                progress: 0,
                step: 1,
                max_steps: 4,
                selected_buildings: null,
                buildings: Locations.getBuildings(),
                date_method: 0,
                date_fields_number: [0],
                timeHasErrors: 0
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

            saveBuildings(){
                if (this.buildings_info.length == 0) {
                    toastr.error('No building selected.', 'Error!');
                } else {
                    this.nextStep()
                }
            },


            saveAll(){
                toastr.success('Settings saved successfully!', 'Success!');
            }
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
