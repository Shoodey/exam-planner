@extends('layouts.app')

@section('htmlheader_title')
    Schedule Attempts
@endsection

@section('main-content')
    <section class="content-header">
        <h1>
            Schedule Attempts
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active"> Schedule Attempts</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Schedule Attempt 1</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="Remove this solution" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-times"></i></button>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Schedule Constraints</h4>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-users"></i> 15 students have more than two exams on Monday 8th
                                    </h5>
                                    <ul>
                                        <li>Ali El Amri: CSC5172 &amp; CSC5214 &amp; CSC3251</li>
                                        <li>Mohammed Sqalli: CSC1514 &amp; CSC5124 &amp; CSC3258</li>
                                        <li>Fatiha Kafou: CSC2514 &amp; CSC4124 &amp; CSC1258</li>
                                        <li>13 Others <a class="btn btn-flat btn-xs btn-primary" href="#">Click to see
                                                more</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-clock-o text-black"></i> 2 students have back-to-back exams on
                                        Tuesday 9th</h5>
                                    <ul>
                                        <li>Simo Anzer: CSC5147 &amp; CSC1454</li>
                                        <li>Ali Elabridi: CSC2451 &amp; CSC5184</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <p id="drag_tooltip" style="font-size: 1.4em;" class="text-center text-red">You can
                                    adjust the different
                                    exam slots if you find it necessary.</p>
                                <p id="info_tooltip" style="font-size: 1.2em;" class="text-center text-red">Click on an
                                    item to display information.</p>

                            </div>
                            <div class="col-md-9">
                                <div id="calendar"></div>
                            </div>
                            <div class="col-md-3" style="display: none" id="calendar-info-panel">
                                <div class="box box-default box-solid">
                                    <div class="box-header">
                                        <h4 class="box-title">Information</h4>
                                    </div>
                                    <div class="box-body">
                                        <div id="external-events">
                                            <p>
                                                <strong>Course: </strong>
                                                <span id="course"></span>
                                            </p>
                                            <p>
                                                <strong>Instructor: </strong>
                                                <span id="instructor"></span>
                                            </p>
                                            <p>
                                                <strong>Proctors: </strong>
                                                <span id="proctor"></span>
                                            </p>
                                            <p>
                                                <strong>Date: </strong>
                                                <span id="date"></span>
                                            </p>
                                            <p>
                                                <strong>Time: </strong>
                                                <span id="time"></span>
                                            </p>
                                            <p>
                                                <strong>Nb. of Students: </strong>
                                                <span id="students"></span>
                                            </p>
                                            <p>
                                                <strong>Location: </strong>
                                                <span id="location"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('registrar.calendar') }}"
                               class="btn btn-block btn-success btn-flat btn-lg">Retain
                                this solution</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Schedule Attempt 2</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="Remove this solution" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-times"></i></button>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Schedule Constraints</h4>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-users"></i> 15 students have more than two exams on Monday 8th
                                    </h5>
                                    <ul>
                                        <li>Ali El Amri: CSC5172 &amp; CSC5214 &amp; CSC3251</li>
                                        <li>Mohammed Sqalli: CSC1514 &amp; CSC5124 &amp; CSC3258</li>
                                        <li>Fatiha Kafou: CSC2514 &amp; CSC4124 &amp; CSC1258</li>
                                        <li>13 Others <a class="btn btn-flat btn-xs btn-primary" href="#">Click to see
                                                more</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-clock-o text-black"></i> 2 students have back-to-back exams on
                                        Tuesday 9th</h5>
                                    <ul>
                                        <li>Simo Anzer: CSC5147 &amp; CSC1454</li>
                                        <li>Ali Elabridi: CSC2451 &amp; CSC5184</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div id="calendar_2"></div>
                            </div>
                            <div class="col-md-3" style="display: none" id="calendar-info-panel">
                                <div class="box box-default box-solid">
                                    <div class="box-header">
                                        <h4 class="box-title">Information</h4>
                                    </div>
                                    <div class="box-body">
                                        <div id="external-events">
                                            <p>
                                                <strong>Course: </strong>
                                                <span id="course"></span>
                                            </p>
                                            <p>
                                                <strong>Instructor: </strong>
                                                <span id="instructor"></span>
                                            </p>
                                            <p>
                                                <strong>Proctors: </strong>
                                                <span id="proctor"></span>
                                            </p>
                                            <p>
                                                <strong>Date: </strong>
                                                <span id="date"></span>
                                            </p>
                                            <p>
                                                <strong>Time: </strong>
                                                <span id="time"></span>
                                            </p>
                                            <p>
                                                <strong>Nb. of Students: </strong>
                                                <span id="students"></span>
                                            </p>
                                            <p>
                                                <strong>Location: </strong>
                                                <span id="location"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('registrar.calendar') }}"
                               class="btn btn-block btn-success btn-flat btn-lg">Retain
                                this solution</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Schedule Attempt 3</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="Remove this solution" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-times"></i></button>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Schedule Constraints</h4>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-users"></i> 15 students have more than two exams on Monday 8th
                                    </h5>
                                    <ul>
                                        <li>Ali El Amri: CSC5172 &amp; CSC5214 &amp; CSC3251</li>
                                        <li>Mohammed Sqalli: CSC1514 &amp; CSC5124 &amp; CSC3258</li>
                                        <li>Fatiha Kafou: CSC2514 &amp; CSC4124 &amp; CSC1258</li>
                                        <li>13 Others <a class="btn btn-flat btn-xs btn-primary" href="#">Click to see
                                                more</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-clock-o text-black"></i> 2 students have back-to-back exams on
                                        Tuesday 9th</h5>
                                    <ul>
                                        <li>Simo Anzer: CSC5147 &amp; CSC1454</li>
                                        <li>Ali Elabridi: CSC2451 &amp; CSC5184</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div id="calendar_3"></div>
                            </div>
                            <div class="col-md-3" style="display: none" id="calendar-info-panel">
                                <div class="box box-default box-solid">
                                    <div class="box-header">
                                        <h4 class="box-title">Information</h4>
                                    </div>
                                    <div class="box-body">
                                        <div id="external-events">
                                            <p>
                                                <strong>Course: </strong>
                                                <span id="course"></span>
                                            </p>
                                            <p>
                                                <strong>Instructor: </strong>
                                                <span id="instructor"></span>
                                            </p>
                                            <p>
                                                <strong>Proctors: </strong>
                                                <span id="proctor"></span>
                                            </p>
                                            <p>
                                                <strong>Date: </strong>
                                                <span id="date"></span>
                                            </p>
                                            <p>
                                                <strong>Time: </strong>
                                                <span id="time"></span>
                                            </p>
                                            <p>
                                                <strong>Nb. of Students: </strong>
                                                <span id="students"></span>
                                            </p>
                                            <p>
                                                <strong>Location: </strong>
                                                <span id="location"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('registrar.calendar') }}"
                               class="btn btn-block btn-success btn-flat btn-lg">Retain
                                this solution</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="box box-danger box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Schedule Attempt 4</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="Remove this solution" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-times"></i></button>

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Schedule Constraints</h4>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-users"></i> 15 students have more than two exams on Monday 8th
                                    </h5>
                                    <ul>
                                        <li>Ali El Amri: CSC5172 &amp; CSC5214 &amp; CSC3251</li>
                                        <li>Mohammed Sqalli: CSC1514 &amp; CSC5124 &amp; CSC3258</li>
                                        <li>Fatiha Kafou: CSC2514 &amp; CSC4124 &amp; CSC1258</li>
                                        <li>13 Others <a class="btn btn-flat btn-xs btn-primary" href="#">Click to see
                                                more</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fa fa-clock-o text-black"></i> 2 students have back-to-back exams on
                                        Tuesday 9th</h5>
                                    <ul>
                                        <li>Simo Anzer: CSC5147 &amp; CSC1454</li>
                                        <li>Ali Elabridi: CSC2451 &amp; CSC5184</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div id="calendar_4"></div>
                            </div>
                            <div class="col-md-3" style="display: none" id="calendar-info-panel">
                                <div class="box box-default box-solid">
                                    <div class="box-header">
                                        <h4 class="box-title">Information</h4>
                                    </div>
                                    <div class="box-body">
                                        <div id="external-events">
                                            <p>
                                                <strong>Course: </strong>
                                                <span id="course"></span>
                                            </p>
                                            <p>
                                                <strong>Instructor: </strong>
                                                <span id="instructor"></span>
                                            </p>
                                            <p>
                                                <strong>Proctors: </strong>
                                                <span id="proctor"></span>
                                            </p>
                                            <p>
                                                <strong>Date: </strong>
                                                <span id="date"></span>
                                            </p>
                                            <p>
                                                <strong>Time: </strong>
                                                <span id="time"></span>
                                            </p>
                                            <p>
                                                <strong>Nb. of Students: </strong>
                                                <span id="students"></span>
                                            </p>
                                            <p>
                                                <strong>Location: </strong>
                                                <span id="location"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ route('registrar.calendar') }}"
                               class="btn btn-block btn-success btn-flat btn-lg">Retain
                                this solution</a>
                        </div>
                    </div>
                </div>
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
                // event click on an exam to display more information about it
                eventClick: function (item, jsEvent, view) {
                    $("#calendar-info-panel").css("display", "block");
                    $("#info_tooltip").hide();

                    $("#course").text(item.title);
                    $("#instructor").text(item.instructor);
                    $("#proctor").text(item.proctor);
                    $("#date").text(item.start.format('dddd D, MMMM'));
                    $("#time").text(item.start.format('hh:mm') + " to " + item.end.format('hh:mm'));
                    $("#students").text(item.numberOfStudents);
                    $("#location").text("Building " + item.building + " Room " + item.room);
                },

                eventDragStart: function (event, jsEvent, ui, view) {
                    $("#drag_tooltip").hide();
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
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "24",
                        building: "1",
                        room: "013",
                        start: new Date(2017, 4, 3, 8, 0),
                        end: new Date(2017, 4, 3, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "38",
                        building: "2",
                        room: "012",
                        start: new Date(2017, 4, 3, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "56",
                        building: "3",
                        room: "011",
                        start: new Date(2017, 4, 3, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "76",
                        building: "4",
                        room: "010",
                        start: new Date(2017, 4, 3, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 3, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "51",
                        building: "5",
                        room: "008",
                        start: new Date(2017, 4, 4, 14, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 15, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "34",
                        building: "6",
                        room: "007",
                        start: new Date(2017, 4, 4, 17, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 19, 0),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "67",
                        building: "7",
                        room: "006",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "57",
                        building: "8",
                        room: "005",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "81",
                        building: "7",
                        room: "004",
                        start: new Date(2017, 4, 5, 8, 0),
                        end: new Date(2017, 4, 5, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "14",
                        building: "6",
                        room: "003",
                        start: new Date(2017, 4, 5, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "7",
                        building: "5",
                        room: "002",
                        start: new Date(2017, 4, 5, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "89",
                        building: "4",
                        room: "001",
                        start: new Date(2017, 4, 5, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 5, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },

                ],
                editable: true,
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
            $('#calendar_2').fullCalendar({
                // event click on an exam to display more information about it
                eventClick: function (item, jsEvent, view) {
                    $("#calendar-info-panel").css("display", "block");
                    $("#info_tooltip").hide();

                    $("#course").text(item.title);
                    $("#instructor").text(item.instructor);
                    $("#proctor").text(item.proctor);
                    $("#date").text(item.start.format('dddd D, MMMM'));
                    $("#time").text(item.start.format('hh:mm') + " to " + item.end.format('hh:mm'));
                    $("#students").text(item.numberOfStudents);
                    $("#location").text("Building " + item.building + " Room " + item.room);
                },

                eventDragStart: function (event, jsEvent, ui, view) {
                    $("#drag_tooltip").hide();
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
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "24",
                        building: "1",
                        room: "013",
                        start: new Date(2017, 4, 3, 8, 0),
                        end: new Date(2017, 4, 3, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "38",
                        building: "2",
                        room: "012",
                        start: new Date(2017, 4, 3, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "56",
                        building: "3",
                        room: "011",
                        start: new Date(2017, 4, 3, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "76",
                        building: "4",
                        room: "010",
                        start: new Date(2017, 4, 3, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 3, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "51",
                        building: "5",
                        room: "008",
                        start: new Date(2017, 4, 4, 14, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 15, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "34",
                        building: "6",
                        room: "007",
                        start: new Date(2017, 4, 4, 17, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 19, 0),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "67",
                        building: "7",
                        room: "006",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "57",
                        building: "8",
                        room: "005",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "81",
                        building: "7",
                        room: "004",
                        start: new Date(2017, 4, 5, 8, 0),
                        end: new Date(2017, 4, 5, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "14",
                        building: "6",
                        room: "003",
                        start: new Date(2017, 4, 5, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "7",
                        building: "5",
                        room: "002",
                        start: new Date(2017, 4, 5, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "89",
                        building: "4",
                        room: "001",
                        start: new Date(2017, 4, 5, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 5, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },

                ],
                editable: true,
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
            $('#calendar_3').fullCalendar({
                // event click on an exam to display more information about it
                eventClick: function (item, jsEvent, view) {
                    $("#calendar-info-panel").css("display", "block");
                    $("#info_tooltip").hide();

                    $("#course").text(item.title);
                    $("#instructor").text(item.instructor);
                    $("#proctor").text(item.proctor);
                    $("#date").text(item.start.format('dddd D, MMMM'));
                    $("#time").text(item.start.format('hh:mm') + " to " + item.end.format('hh:mm'));
                    $("#students").text(item.numberOfStudents);
                    $("#location").text("Building " + item.building + " Room " + item.room);
                },

                eventDragStart: function (event, jsEvent, ui, view) {
                    $("#drag_tooltip").hide();
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
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "24",
                        building: "1",
                        room: "013",
                        start: new Date(2017, 4, 3, 8, 0),
                        end: new Date(2017, 4, 3, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "38",
                        building: "2",
                        room: "012",
                        start: new Date(2017, 4, 3, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "56",
                        building: "3",
                        room: "011",
                        start: new Date(2017, 4, 3, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "76",
                        building: "4",
                        room: "010",
                        start: new Date(2017, 4, 3, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 3, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "51",
                        building: "5",
                        room: "008",
                        start: new Date(2017, 4, 4, 14, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 15, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "34",
                        building: "6",
                        room: "007",
                        start: new Date(2017, 4, 4, 17, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 19, 0),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "67",
                        building: "7",
                        room: "006",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "57",
                        building: "8",
                        room: "005",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "81",
                        building: "7",
                        room: "004",
                        start: new Date(2017, 4, 5, 8, 0),
                        end: new Date(2017, 4, 5, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "14",
                        building: "6",
                        room: "003",
                        start: new Date(2017, 4, 5, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "7",
                        building: "5",
                        room: "002",
                        start: new Date(2017, 4, 5, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "89",
                        building: "4",
                        room: "001",
                        start: new Date(2017, 4, 5, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 5, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },

                ],
                editable: true,
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
            $('#calendar_4').fullCalendar({
                // event click on an exam to display more information about it
                eventClick: function (item, jsEvent, view) {
                    $("#calendar-info-panel").css("display", "block");
                    $("#info_tooltip").hide();

                    $("#course").text(item.title);
                    $("#instructor").text(item.instructor);
                    $("#proctor").text(item.proctor);
                    $("#date").text(item.start.format('dddd D, MMMM'));
                    $("#time").text(item.start.format('hh:mm') + " to " + item.end.format('hh:mm'));
                    $("#students").text(item.numberOfStudents);
                    $("#location").text("Building " + item.building + " Room " + item.room);
                },

                eventDragStart: function (event, jsEvent, ui, view) {
                    $("#drag_tooltip").hide();
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
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "24",
                        building: "1",
                        room: "013",
                        start: new Date(2017, 4, 3, 8, 0),
                        end: new Date(2017, 4, 3, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "38",
                        building: "2",
                        room: "012",
                        start: new Date(2017, 4, 3, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "56",
                        building: "3",
                        room: "011",
                        start: new Date(2017, 4, 3, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 3, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "76",
                        building: "4",
                        room: "010",
                        start: new Date(2017, 4, 3, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 3, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "51",
                        building: "5",
                        room: "008",
                        start: new Date(2017, 4, 4, 14, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 15, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "34",
                        building: "6",
                        room: "007",
                        start: new Date(2017, 4, 4, 17, 0), //months are zero based!!
                        end: new Date(2017, 4, 4, 19, 0),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "67",
                        building: "7",
                        room: "006",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "57",
                        building: "8",
                        room: "005",
                        start: new Date(2017, 4, 4, 10, 00), //months are zero based!!
                        end: new Date(2017, 4, 4, 11, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Artificial Intelligence - CSC3309 - Section 1 - Section 2 - Section 3',
                        instructor: "Dr. Cavalli",
                        proctor: "Janet",
                        date: "07-June-2017",
                        numberOfStudents: "81",
                        building: "7",
                        room: "004",
                        start: new Date(2017, 4, 5, 8, 0),
                        end: new Date(2017, 4, 5, 11, 0),
                        backgroundColor: "#3c8dbc",
                        borderColor: "#3c8dbc"
                    },
                    {
                        title: 'Introduction to Advanced Data Structure - CSC2302 - Section 1',
                        instructor: "Dr. Fallah",
                        proctor: "Jane",
                        date: "07-June-2017",
                        numberOfStudents: "14",
                        building: "6",
                        room: "003",
                        start: new Date(2017, 4, 5, 8, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 9, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Introduction to Computer Programming - CSC1401 - Section 1',
                        instructor: "Dr. Cavalli",
                        proctor: "John",
                        date: "07-June-2017",
                        numberOfStudents: "7",
                        building: "5",
                        room: "002",
                        start: new Date(2017, 4, 5, 12, 0), //months are zero based!!
                        end: new Date(2017, 4, 5, 13, 50),
                        backgroundColor: "#605ca8", //light-blue
                        borderColor: "#605ca8" //light-blue
                    },
                    {
                        title: 'Object Oriented Programming in Java - CSC2303 - Section 1',
                        instructor: "Dr. Mourhir",
                        proctor: "Johnny",
                        date: "07-June-2017",
                        numberOfStudents: "89",
                        building: "4",
                        room: "001",
                        start: new Date(2017, 4, 5, 15, 00), //months are zero based!!
                        end: new Date(2017, 4, 5, 16, 50),
                        backgroundColor: "#3c8dbc", //light-blue
                        borderColor: "#3c8dbc" //light-blue
                    },

                ],
                editable: true,
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