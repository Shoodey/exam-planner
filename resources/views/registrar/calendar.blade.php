@extends('layouts.app')

@section('htmlheader_title')
    Calendar
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            Final Calendar
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active"> Calendar</li>
        </ol>
    </section>

    <section class="content">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'calendarTab')">
                <i class="fa fa-calendar" aria-hidden="true"></i> Calendar View
            </button>
            <button class="tablinks" onclick="openTab(event, 'tableTab')">
                <i class="fa fa-table" aria-hidden="true"></i> Tabular View
            </button>
        </div>
        <div id="calendarTab" class="tabcontent">
            <div class="row">
                <div class="col-md-9">
                    <div class="box box-default">
                        <div class="box-body no-padding">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="calendar-info-panel">
                    <div class="box box-default box-solid">
                        <div class="box-header">
                            <h4 class="box-title">Information</h4>
                        </div>
                        <div class="box-body">
                            <div id="external-events">
                                <p class="text-red">Click on an item to display information.</p>
                                <p>
                                    <span class="label label-default">Course</span>
                                    <span id="course"></span>
                                </p>
                                <p>
                                    <span class="label label-default">Instructor</span>
                                    <span id="instructor"></span>
                                </p>
                                <p>
                                    <span class="label label-default">Proctors</span>
                                    <span id="proctor"></span>
                                </p>
                                <p>
                                    <span class="label label-default">Date</span>
                                    <span id="date"></span>
                                </p>
                                <p>
                                    <span class="label label-default">Time</span>
                                    <span id="time"></span>
                                </p>
                                <p>
                                    <span class="label label-default">Nb. of Students</span>
                                    <span id="students"></span>
                                </p>
                                <p>
                                    <span class="label label-default">Location</span>
                                    <span id="location"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-block" id="generate">
                        <i class="fa fa-file-pdf-o"></i> Generate PDF Schedule
                    </button>
                    <button class="btn btn-success btn-block" id="print" onclick="printPage()">
                        <i class="fa fa-print"></i> Print Schedule
                    </button>
                </div>
            </div>
        </div>
        <div id="tableTab" class="tabcontent">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Instructor</th>
                                        <th>Proctors</th>
                                        <th>Date</th>
                                        <th>Start time</th>
                                        <th>End time</th>
                                        <th>Number of Students</th>
                                        <th>Building</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CSC 2303</td>
                                        <td>Dr. Mourhir
                                        </td>
                                        <td>John</td>
                                        <td>07-June-2017</td>
                                        <td>10:00AM</td>
                                        <td>11:50AM</td>
                                        <td>30</td>
                                        <td>8B</td>
                                        <td>008</td>
                                    </tr>
                                    <tr>
                                        <td>CSC1401</td>
                                        <td>Dr. Cavalli
                                        </td>
                                        <td>Jane</td>
                                        <td>07-June-2017</td>
                                        <td>10:00AM</td>
                                        <td>11:50AM</td>
                                        <td>30</td>
                                        <td>8B</td>
                                        <td>008</td>
                                    </tr>
                                    <tr>
                                        <td>CSC2302</td>
                                        <td>Dr. Fallah
                                        </td>
                                        <td>Johnny</td>
                                        <td>07-June-2017</td>
                                        <td>10:00AM</td>
                                        <td>11:50AM</td>
                                        <td>30</td>
                                        <td>8B</td>
                                        <td>008</td>
                                    </tr>
                                    <tr>
                                        <td>CSC3309</td>
                                        <td>Dr. Fallah
                                        </td>
                                        <td>Janet</td>
                                        <td>07-June-2017</td>
                                        <td>10:00AM</td>
                                        <td>11:50AM</td>
                                        <td>30</td>
                                        <td>8B</td>
                                        <td>008</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.content-wrapper -->
                </div>





                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Create the tabs -->
                    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i
                                        class="fa fa-home"></i></a></li>
                        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i
                                        class="fa fa-gears"></i></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Home tab content -->
                        <div class="tab-pane" id="control-sidebar-home-tab">
                            <h3 class="control-sidebar-heading">Recent Activity</h3>
                            <ul class="control-sidebar-menu">
                                <li><a href="javascript:void(0)"> <i
                                                class="menu-icon fa fa-birthday-cake bg-red"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                            <p>Will be 23 on April 24th</p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0)"> <i
                                                class="menu-icon fa fa-user bg-yellow"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Frodo Updated His
                                                Profile</h4>

                                            <p>New phone +1(800)555-1234</p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0)"> <i
                                                class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Nora Joined Mailing
                                                List</h4>

                                            <p>nora@example.com</p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0)"> <i
                                                class="menu-icon fa fa-file-code-o bg-green"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Cron Job 254
                                                Executed</h4>

                                            <p>Execution time 5 seconds</p>
                                        </div>
                                    </a></li>
                            </ul>
                            <!-- /.control-sidebar-menu -->

                            <h3 class="control-sidebar-heading">Tasks Progress</h3>
                            <ul class="control-sidebar-menu">
                                <li><a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Custom Template Design <span
                                                    class="label label-danger pull-right">70%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-danger"
                                                 style="width: 70%"></div>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Update Resume <span class="label label-success pull-right">95%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-success"
                                                 style="width: 95%"></div>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Laravel Integration <span
                                                    class="label label-warning pull-right">50%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-warning"
                                                 style="width: 50%"></div>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Back End Framework <span class="label label-primary pull-right">68%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-primary"
                                                 style="width: 68%"></div>
                                        </div>
                                    </a></li>
                            </ul>
                            <!-- /.control-sidebar-menu -->

                        </div>
                        <!-- /.tab-pane -->
                        <!-- Stats tab content -->
                        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab
                            Content</div>
                        <!-- /.tab-pane -->
                        <!-- Settings tab content -->
                        <div class="tab-pane" id="control-sidebar-settings-tab">
                            <form method="post">
                                <h3 class="control-sidebar-heading">General Settings</h3>

                                <div class="form-group">
                                    <label class="control-sidebar-subheading"> Report panel
                                        usage <input type="checkbox" class="pull-right" checked>
                                    </label>

                                    <p>Some information about this general settings option</p>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading"> Allow mail
                                        redirect <input type="checkbox" class="pull-right" checked>
                                    </label>

                                    <p>Other sets of options are available</p>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading"> Expose author
                                        name in posts <input type="checkbox" class="pull-right" checked>
                                    </label>

                                    <p>Allow the user to show his name in blog posts</p>
                                </div>
                                <!-- /.form-group -->

                                <h3 class="control-sidebar-heading">Chat Settings</h3>

                                <div class="form-group">
                                    <label class="control-sidebar-subheading"> Show me as
                                        online <input type="checkbox" class="pull-right" checked>
                                    </label>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading"> Turn off
                                        notifications <input type="checkbox" class="pull-right">
                                    </label>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading"> Delete chat
                                        history <a href="javascript:void(0)" class="text-red pull-right"><i
                                                    class="fa fa-trash-o"></i></a>
                                    </label>
                                </div>
                                <!-- /.form-group -->
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                </aside>
                <!-- /.control-sidebar -->
                <!-- Add the sidebar's background. This div must be placed
                   immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            </div>
        </div>

    </section>

    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="infoModalLabel">Constraints for the schedule</h4>
                </div>
                <div class="modal-body">
                    <p><i class="fa fa-users"></i> 15 students have more than two exams on Monday 8th</p>
                    <ul>
                        <li>Ali El Amri: CSC5172 &amp; CSC5214 &amp; CSC3251</li>
                        <li>Mohammed Sqalli: CSC1514 &amp; CSC5124 &amp; CSC3258</li>
                        <li>Fatiha Kafou: CSC2514 &amp; CSC4124 &amp; CSC1258</li>
                        <li>13 Others... <a href="#">Click to see more</a></li>
                    </ul>
                    <p><i class="fa fa-clock-o text-black"></i> 2 students have back-to-back exams on Tuesday 9th</p>
                    <ul>
                        <li>Simo Anzer: CSC5147 &amp; CSC1454</li>
                        <li>Ali Elabridi: CSC2451 &amp; CSC5184</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script>
        $(function () {

            printPage = function () {
                window.print();
            }

            $('#generate').click(function() {
                var doc = new jsPDF();
                doc.addHTML($('#calendar')[0], -15, 30, {
                    'background' : '#fff',
                }, function() {
                    doc.save('sample-file-schedule.pdf');
                });
            });

            openTab = function (evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(
                        " active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementsByClassName('tablinks')[0].click();

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject);

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });
            }

            ini_events($('#external-events div.external-event'));

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date();
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
            $('#calendar').fullCalendar({
                eventStartEditable : false,
                // event click on an exam to display more information about it
                eventClick: function (calEvent, jsEvent, view) {
                    $("#course").text(" " + calEvent.title);
                    $("#instructor").text(" " + calEvent.instructor);
                    $("#proctor").text(" " + calEvent.proctor);
                    $("#date").text(" " + calEvent.date);
                    $("#time").text(" " + calEvent.timeStart + " to " + calEvent.timeEnd);
                    $("#students").text(" " + calEvent.numberOfStudents);
                    $("#location").text(" " + calEvent.building + " " + calEvent.room);
                },
                //delete the ability to resize the duration of an event (always 1h50)
                eventDurationEditable: false,
                //set interval time for event to be two hours
                slotDuration: '00:30:00',
                //set the first day displayed in a week to be a Monday
                firstDay: 1,
                //set the height to adapt to the content
                height: "auto",
                //set the start date of exams
                defaultDate: "2017-05-03",
                // disable the all day events
                allDaySlot: false,
                // added the default view to be weekly view
                defaultView: 'agendaDay',
                // the minimum time displayed in the calendar (8AM)
                minTime: '08:00:00',
                // the maximum time displayed in the calendar (8AM)
                maxTime: '20:00:00',
                //valide range of data to be displayed (i.e. the range date of the exams)
                validRange: {
                    start: '2017-05-03',
                    end: '2017-05-06'
                },
                // the business hours (when do exam start and finish with days)
                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    dow: [1, 2, 3, 4, 5], // Monday - Friday

                    start: '8:00', // a start time (10am in this example)
                    end: '20:00', // an end time (6pm in this example)
                },
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                //Random default events
                events: [
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        timeStart: "10:00AM",
                        timeEnd: "11:50AM",
                        numberOfStudents: "30",
                        building: "8B",
                        room: "008",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        timeStart: "10:00AM",
                        timeEnd: "11:50AM",
                        numberOfStudents: "30",
                        building: "8B",
                        room: "008",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#008C00", //light-blue
                        borderColor: "#008C00" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        timeStart: "10:00AM",
                        timeEnd: "11:50AM",
                        numberOfStudents: "30",
                        building: "8B",
                        room: "008",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#008C00", //light-blue
                        borderColor: "#008C00" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        timeStart: "10:00AM",
                        timeEnd: "11:50AM",
                        numberOfStudents: "30",
                        building: "8B",
                        room: "008",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    }
                ],
                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.backgroundColor = $(this).css("background-color");
                    copiedEventObject.borderColor = $(this).css("border-color");

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }

                }
            });

            /* ADDING EVENTS */
            var currColor = "#3c8dbc"; //Red by default
            //Color chooser button
            var colorChooser = $("#color-chooser-btn");
            $("#color-chooser > li > a").click(function (e) {
                e.preventDefault();
                //Save color
                currColor = $(this).css("color");
                //Add color effect to button
                $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
            });
            $("#add-new-event").click(function (e) {
                e.preventDefault();
                //Get value and make sure it is not null
                var val = $("#new-event").val();
                if (val.length == 0) {
                    return;
                }

                //Create events
                var event = $("<div />");
                event.css({
                    "background-color": currColor,
                    "border-color": currColor,
                    "color": "#fff"
                }).addClass("external-event");
                event.html(val);
                $('#external-events').prepend(event);

                //Add draggable funtionality
                ini_events(event);

                //Remove event from text input
                $("#new-event").val("");
            });
        });
    </script>
@endsection