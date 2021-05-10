@extends('layouts.app')

<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>

@push('extra-js')
    <script src="{{asset('js/jquery-3.5.1.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#destroy-user-modal").on("show.bs.modal", function (event) {
                var relatedTarget = $(event.relatedTarget);

                var id = relatedTarget.data("id");

                var name = relatedTarget.data("name");

                var form = $(this).find("form#destroy_user");

                form.attr('action', route('users.destroy', id));

                form.find('span#name').text(name);
            });

            $('#tbl_applications').DataTable({
                language: {
                    emptyTable: "No applications available",
                    info: "Showing _START_ to _END_ of _TOTAL_ applications",
                    infoEmpty: "Showing 0 to 0 of 0 applications",
                    infoFiltered: "(filtered from _MAX_ total applications)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ applications",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search applications:",
                    zeroRecords: "No applications match search criteria"
                },
            });

        });

    </script>
@endpush

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Applications</li>
            </ol>
        </nav>
        {{--<div>--}}
        {{--<a class="btn btn-sm btn-primary btn-fw" href="#">--}}
        {{--<i class="mdi mdi-upload"></i> Applications--}}
        {{--</a>--}}
        {{--<a class="btn btn-sm btn-primary btn-fw" href="{{ route('leaves.create') }}">--}}
        {{--<i class="mdi mdi-plus"></i> Create--}}
        {{--</a>--}}
        {{--</div>--}}
    </div>
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom">
                        <h4 class="card-title">Applications</h4>
                    </div>
                    <table id="tbl_applications" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Leave schedule</th>
                            <th>Leave period</th>
                            <th class="text-center">Leave Days</th>
                            <th class="text-center">Status</th>
                            <th>Applied By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td>
                                    <a href="{{ route('applications.show', $application->id) }}">
                                        {{ $application->leave->start_date . ' to ' . $application->leave->end_date }}
                                    </a>
                                </td>
                                <td> {{ $application->start_date . ' to ' . $application->end_date }}</td>
                                <td class="text-center">
                                    {{ date_diff(date_create($application->start_date), date_create($application->end_date))->format('%R%a') }}
                                </td>
                                <td class="text-center">
                                    @if($application->status == 0 )
                                        <span class="badge badge-info">Applied</span>
                                    @elseif($application->status == 1 )
                                        <span class="badge badge-primary">Accepted</span>
                                    @elseif($application->status == 2 )
                                        <span class="badge badge-success">Confirmed</span>
                                    @elseif($application->status == 3 )
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-danger">Revoked</span>
                                    @endif
                                </td>
                                {{--<td>{{ $application->applied_by }}</td>--}}
                                <td>{{ $application->user->name }}</td>
                                <td>{{ $application->created_at }}</td>
                                <td>{{ $application->updated_at }}</td>
                                <td class="text-center">
                                    {{--@if($application->status == 0 )--}}
                                    <div class="dropdown show">
                                        <i class="mdi mdi-dots-horizontal" style="font-size: 1.25rem;"
                                           data-toggle="dropdown"></i>
                                        <div class="dropdown-menu">
                                            @if($application->status == 0 )
                                                @can('update', [\App\Models\Application::class, $application->id])
                                                    <a class="dropdown-item"
                                                       href="{{ route('applications.edit', $application->id) }}">
                                                        <i class="mdi mdi-settings"></i>&nbsp;Edit
                                                    </a>
                                                @endcan
                                                @can('accept', [\App\Models\Application::class, $application->id])
                                                    <a class="dropdown-item"
                                                       href="{{ route('applications.accept.show', $application->id) }}">
                                                        <i class="mdi mdi-settings"></i>&nbsp;Accept
                                                    </a>
                                                @endcan
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-id="{{ $application->id }}"
                                                   data-name="{{ $application->name }}"
                                                   data-target="#destroy-leave-modal">
                                                    <i class="mdi mdi-delete"></i>&nbsp;Cancel
                                                </a>
                                            @endif
                                            @if($application->status == 2 )
                                                @can('approve', [\App\Models\Application::class, $application->id])
                                                    <a class="dropdown-item"
                                                       href="{{ route('applications.approve.show', $application->id) }}">
                                                        <i class="mdi mdi-settings"></i>&nbsp;Approve
                                                    </a>
                                                @endcan
                                                {{--<a class="dropdown-item" href="#" data-toggle="modal"--}}
                                                {{--data-id="{{ $application->id }}"--}}
                                                {{--data-name="{{ $application->name }}"--}}
                                                {{--data-target="#destroy-leave-modal">--}}
                                                {{--<i class="mdi mdi-delete"></i>&nbsp;Cancel--}}
                                                {{--</a>--}}
                                            @endif
                                            @if($application->status == 1 )
                                                @can('confirm', [\App\Models\Application::class, $application->id])
                                                    <a class="dropdown-item"
                                                       href="{{ route('applications.confirm.show', $application->id) }}">
                                                        <i class="mdi mdi-pencil"></i>&nbsp;Confirm
                                                    </a>
                                                @endcan
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-id="{{ $application->id }}"
                                                   data-name="{{ $application->name }}"
                                                   data-target="#destroy-leave-modal">
                                                    <i class="mdi mdi-delete"></i>&nbsp;Cancel
                                                </a>
                                            @endif
                                            {{--@if($application->status == 1 )--}}
                                            {{----}}
                                            {{--<a class="dropdown-item" href="#" data-toggle="modal"--}}
                                            {{--data-id="{{ $application->id }}"--}}
                                            {{--data-name="{{ $application->name }}"--}}
                                            {{--data-target="#destroy-leave-modal">--}}
                                            {{--<i class="mdi mdi-delete"></i>&nbsp;Cancel--}}
                                            {{--</a>--}}
                                            {{--@endif--}}
                                        </div>
                                    </div>
                                    {{--@endif--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<div id="calendar"></div>--}}
                </div>
            </div>
        </div>
    </div>

    @include('leaves.modals.destroy')

@endsection
