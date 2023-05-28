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
                    emptyTable: "No leave types available",
                    info: "Showing _START_ to _END_ of _TOTAL_ leave types",
                    infoEmpty: "Showing 0 to 0 of 0 leave types",
                    infoFiltered: "(filtered from _MAX_ total leave types)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ leave types",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search leave types:",
                    zeroRecords: "No leave types match search criteria"
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
                <li class="breadcrumb-item active" aria-current="page">Leave Types</li>
            </ol>
        </nav>

                <a class="btn btn-sm btn-success btn-fw" href="{{ route('leave_types.create') }}">
                    <i class="mdi mdi-plus"></i> Create
                </a>
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
                        <h4 class="card-title">Leave Types</h4>
                    </div>
                    <table id="tbl_days" class="table table-striped" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Status</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leave_types as $leave_type)
                            <tr>
                                <td>{{ $leave_type->name }}</td>
                                <td class="text-center">
                                    @if($leave_type->status == 0 )
                                        <span class="badge badge-info">Available</span>
                                    @else
                                        <span class="badge badge-info">Cancelled</span>
                                    @endif
                                </td>
                                <td>{{ $leave_type->createdby->name }}</td>
                                <td>{{ $leave_type->created_at }}</td>
                                <td>{{ $leave_type->updated_at }}</td>
                                <td class="text-center">
                                    <div class="dropdown show">
                                        <i class="mdi mdi-dots-horizontal" style="font-size: 1.25rem;"
                                           data-toggle="dropdown"></i>
                                        <div class="dropdown-menu">
                                            @can('update', [\App\Models\LeaveType::class, $leave_type->id])
                                                <a class="dropdown-item"
                                                   href="{{ route('leave_types.edit', $leave_type->id) }}">
                                                    <i class="mdi mdi-pencil"></i>&nbsp;Edit
                                                </a>
                                            @endcan
                                            @can('delete', [\App\Models\LeaveType::class, $leave_type->id])
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-id="{{ $leave_type->id }}"
                                                   data-name="{{ $leave_type->name }}"
                                                   data-target="#destroy-leave-type-modal">
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
