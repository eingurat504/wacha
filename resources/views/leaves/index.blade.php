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

            $('#tbl_days').DataTable({
                language: {
                    emptyTable: "No leave days available",
                    info: "Showing _START_ to _END_ of _TOTAL_ leave days",
                    infoEmpty: "Showing 0 to 0 of 0 leave days",
                    infoFiltered: "(filtered from _MAX_ total leave days)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ leave days",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search leave days:",
                    zeroRecords: "No leave days match search criteria"
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
                <li class="breadcrumb-item active" aria-current="page">Leave Roaster</li>
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
        <div class="col-lg-12">
            @include('flash::message')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom">
                        <h4 class="card-title">Leave Roaster</h4>
                    </div>
                    <table id="tbl_days" class="table table-striped" width="100%">
                        <thead>
                        <tr>
                            <th>Days</th>
                            <th>Leave schedule</th>
                            <th class="text-center">Status</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leaves as $leave)
                            <tr>
                                <td>
                                    <a href="{{ route('leaves.show', $leave->id) }}">
                                        {{ date_diff(date_create($leave->start_date), date_create($leave->end_date))->format('%R%a') }}
                                    </a>
                                </td>
                                <td>{{ $leave->start_date .'  to  '. $leave->end_date }}</td>
                                <td class="text-center">
                                    @if($leave->status == 0 )
                                        <span class="badge badge-info">Available</span>
                                    @else
                                        <span class="badge badge-info">Cancelled</span>
                                    @endif
                                </td>
                                <td>{{ $leave->createdby->name }}</td>
                                <td>{{ $leave->created_at }}</td>
                                <td>{{ $leave->updated_at }}</td>
                                <td class="text-center">
                                    <div class="dropdown show">
                                        <i class="mdi mdi-dots-horizontal" style="font-size: 1.25rem;"
                                           data-toggle="dropdown"></i>
                                        <div class="dropdown-menu">
                                            @can('apply', [\App\Models\Leave::class, $leave->id])
                                                <a class="dropdown-item"
                                                   href="{{ route('leaves.apply.show', $leave->id) }}">
                                                    <i class="mdi mdi-upload"></i>&nbsp;Apply
                                                </a>
                                            @endcan
                                            @can('update', [\App\Models\Leave::class, $leave->id])
                                                <a class="dropdown-item"
                                                   href="{{ route('leaves.edit', $leave->id) }}">
                                                    <i class="mdi mdi-pencil"></i>&nbsp;Edit
                                                </a>
                                            @endcan
                                            @can('delete', [\App\Models\Leave::class, $leave->id])
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-id="{{ $leave->id }}"
                                                   data-name="{{ $leave->date_from .'  to  '. $leave->date_to }}"
                                                   data-target="#destroy-leave-modal">
                                                    <i class="mdi mdi-delete"></i>&nbsp;Cancel
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('leaves.modals.destroy')

@endsection
