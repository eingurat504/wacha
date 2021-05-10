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

            $('#tbl_roles').DataTable({
                language: {
                    emptyTable: "No roles available",
                    info: "Showing _START_ to _END_ of _TOTAL_ roles",
                    infoEmpty: "Showing 0 to 0 of 0 roles",
                    infoFiltered: "(filtered from _MAX_ total roles)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ roles",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search roles:",
                    zeroRecords: "No roles match search criteria"
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
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </nav>
        <div>
            @can('create', \App\Models\Role::class)
                <a class="btn btn-sm btn-success btn-fw" href="{{ route('roles.create') }}">
                    <i class="mdi mdi-plus"></i> Create
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
                        <h4 class="card-title">Roles</h4>
                    </div>
                    <table id="tbl_roles" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td><a href="{{ route('roles.show', $role->id) }}">{{ $role->name }}</a>
                                </td>
                                <td>{{ $role->created_at }}</td>
                                <td>{{ $role->updated_at }}</td>
                                <td class="text-center">
                                    <div class="dropdown show">
                                        <i class="mdi mdi-dots-horizontal" style="font-size: 1.25rem;"
                                           data-toggle="dropdown"></i>
                                        <div class="dropdown-menu">
                                            @can('syncPermissions', [\App\Models\Role::class, $role->id])
                                                <a class="dropdown-item"
                                                   href="{{ route('roles.permissions', $role->id) }}">
                                                    <i class="mdi mdi-key"></i>&nbsp;Permissions
                                                </a>
                                            @endcan
                                            @can('update', [\App\Models\Role::class, $role->id])
                                                <a class="dropdown-item"
                                                   href="{{ route('roles.edit', $role->id) }}">
                                                    <i class="mdi mdi-pencil"></i>&nbsp;Edit
                                                </a>
                                            @endcan
                                            @can('delete', [\App\Models\Role::class, $role->id])
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-id="{{ $role->id }}"
                                                   data-name="{{ $role->name }}"
                                                   data-target="#destroy-role-modal">
                                                    <i class="mdi mdi-delete"></i>&nbsp;Delete
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

@endsection
