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

            $('#tbl_permissions').DataTable({
                language: {
                    emptyTable: "No permissions available",
                    info: "Showing _START_ to _END_ of _TOTAL_ permissions",
                    infoEmpty: "Showing 0 to 0 of 0 permissions",
                    infoFiltered: "(filtered from _MAX_ total permissions)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ permissions",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search permissions:",
                    zeroRecords: "No permissions match search criteria"
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
                <li class="breadcrumb-item active" aria-current="page">Permissions</li>
            </ol>
        </nav>
        <div>
            @can('create', \App\Models\Permission::class)
                <a class="btn btn-sm btn-success btn-fw" href="{{ route('permissions.create') }}">
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
                        <h4 class="card-title">Permissions</h4>
                    </div>
                    <table id="tbl_permissions" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <a href="{{ route('permissions.show', $permission->id) }}">{{ $permission->name }}</a>
                                </td>
                                {{--<td>{{ $permission->name }}</td>--}}
                                <td>{{ $permission->created_at }}</td>
                                <td>{{ $permission->updated_at }}</td>
                                <td class="text-center">
                                    @can('update', [\App\Models\Permission::class, $permission->id])
                                        <a href="{{ route('permissions.edit', $permission->id) }}" title="Edit">
                                            <i class="mdi mdi-pencil-box-outline"></i>
                                        </a>
                                    @endcan
                                    @can('delete', [\App\Models\Permission::class, $permission->id])
                                        <a href="#" data-toggle="modal" data-id="{{ $permission->id }}" title="Delete"
                                           data-name="{{ $permission->name }}" data-target="#destroy-permission-modal">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </a>
                                    @endcan
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
