@extends('layouts.app')

<link href="{{ asset('css/main.css') }}" rel='stylesheet'/>

<style>

    /*body {*/
    /*margin: 40px 10px;*/
    /*padding: 0;*/
    /*font-family: Arial, Helvetica Neue, Helvetica, sans-serif;*/
    /*font-size: 14px;*/
    /*}*/

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }

</style>

@push('extra-js')

    <script src="{{ asset('js/main.js') }}"></script>

    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            console.log(app);

            $.get(app + "/applications/verified", function (data) {

                // console.log(data.applications);
            //
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        title: 'testing',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    // initialDate: '',
                    navLinks: true, // can click day/week names to navigate views
                    businessHours: true, // display business hours
                    editable: true,
                    selectable: true,
                    // events: data.applications
                    events: data.applications
                });


            //
                calendar.render();
            //     console.log(data.applications); // Collection (js object) of `People` models.
            });

            // calendar.render();

            //
            // var calendar = new FullCalendar.Calendar(calendarEl, {
            //     headerToolbar: {
            //         left: 'prev,next today',
            //         center: 'title',
            //         right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            //     },
            //     // initialDate: '',
            //     navLinks: true, // can click day/week names to navigate views
            //     businessHours: true, // display business hours
            //     editable: true,
            //     selectable: true,
            //     events: [
            //         {
            //             title: 'Business Lunch',
            //             start: '2020-12-03T13:00:00',
            //             constraint: 'businessHours',
            //             color: '#1bcfb4',
            //             display: 'background'
            //         },
            //         {
            //             title: 'Meeting',
            //             start: '2021-01-03T11:00:00',
            //             end: '2021-01-13T11:00:00',
            //             constraint: 'availableForMeeting', // defined below
            //             color: '#257e4a'
            //         },
            //         {
            //             title: 'Conference',
            //             start: '2020-09-18',
            //             end: '2020-09-20'
            //         },
            //         {
            //             title: 'Party',
            //             start: '2020-09-29T20:00:00'
            //         },
            //
            //         // areas where "Meeting" must be dropped
            //         {
            //             groupId: 'availableForMeeting',
            //             start: '2020-09-11T10:00:00',
            //             end: '2020-09-11T16:00:00',
            //             display: 'background'
            //         },
            //         {
            //             groupId: 'availableForMeeting',
            //             start: '2020-09-13T10:00:00',
            //             end: '2020-09-13T16:00:00',
            //             display: 'background'
            //         },
            //
            //         // red areas where no events can be dropped
            //         {
            //             title: 'Conference',
            //             start: '2020-09-24',
            //             end: '2021-01-09',
            //             overlap: false,
            //             display: 'background',
            //             color: '#257e4a'
            //         },
            //         {
            //             title: 'Conference',
            //             start: '2020-09-06',
            //             end: '2020-09-08',
            //             overlap: false,
            //             display: 'background',
            //             color: '#1bcfb4'
            //         }
            //     ]
            // });

            // calendar.render();
        });


        // import { Calendar } from '@fullcalendar/core';
        // import dayGridPlugin from '@fullcalendar/daygrid';
        //
        // document.addEventListener('DOMContentLoaded', function() {
        //     var calendarEl = document.getElementById('calendar');
        //
        //     var calendar = new Calendar(calendarEl, {
        //         plugins: [ dayGridPlugin ]
        //     });
        //
        //     calendar.render();
        // });

    </script>

@endpush

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
        </nav>
        <div>
            @can('viewAny', \App\Models\Application::class)
                <a class="btn btn-sm btn-success btn-fw" href="{{ route('applications.index') }}">
                    <i class="mdi mdi-upload"></i> Applications
                </a>
            @endcan
            @can('create', \App\Models\Leave::class)
                <a class="btn btn-sm btn-success btn-fw" href="{{ route('leaves.create') }}">
                    <i class="mdi mdi-plus"></i> Create Roaster
                </a>
            @endcan
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                          <h5 class="text-center">Total Leave Days</h5>
                    <div class="border-bottom"></div>
                       30 days
                </div>
            </div>
        </div>

        <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Approved</h5>
                    <div class="border-bottom">
                    </div>
                    kfkfkfkf
                </div>
            </div>
        </div>

        <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Confirmed</h5>
                    <div class="border-bottom">
                    </div>
                    kfkfkfkf
                </div>
            </div>
        </div>

        <div class="col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Remaining Days</h5>
                    <div class="border-bottom">
                    </div>
                    kfkfkfkf
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom">
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom">
                    </div>
                    test
                </div>
            </div>
        </div>

{{--        <div class="col-lg-3 grid-margin stretch-card">--}}
{{--            <div class="row">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title">Leave Days</h4>--}}
{{--                        --}}{{--<div class="border-bottom"></div>--}}
{{--                        &nbsp;mlkllnllllllllllllllll--}}
{{--                        Calender--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="card-title">Leave Days</h4>--}}
{{--                        --}}{{--<div class="border-bottom"></div>--}}
{{--                        &nbsp;mlkllnllllllllllllllll--}}
{{--                        Calender--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection
