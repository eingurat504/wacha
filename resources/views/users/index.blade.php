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

            $('#tbl_users').DataTable({
                language: {
                    emptyTable: "No users available",
                    info: "Showing _START_ to _END_ of _TOTAL_ users",
                    infoEmpty: "Showing 0 to 0 of 0 users",
                    infoFiltered: "(filtered from _MAX_ total users)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ users",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search users:",
                    zeroRecords: "No users match search criteria"
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
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
        <div>
            @can('create', \App\Models\User::class)
                <a class="btn btn-sm btn-success btn-fw" href="{{ route('users.create') }}">
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
{{--                    <div class="border-bottom">--}}
{{--                        <h4 class="card-title">Users</h4>--}}
{{--                        &nbsp;--}}
{{--                    </div>--}}
                    <table id="tbl_users" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th class="text-center">Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    @if(! $user->trashed())
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-info">Revoked</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td class="text-center">
                                    <div class="dropdown show">
                                        <i class="mdi mdi-dots-horizontal" style="font-size: 1.25rem;"
                                           data-toggle="dropdown"></i>
                                        <div class="dropdown-menu">
                                            @can('update', [\App\Models\User::class, $user->id])
                                                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                    <i class="mdi mdi-pencil"></i>&nbsp;Edit
                                                </a>
                                            @endcan
                                            @can('delete', [\App\Models\User::class, $user->id])
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-id="{{ $user->id }}"
                                                   data-name="{{ $user->name }}" data-target="#destroy-user-modal">
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

    {{--@include('users.modals.destroy')--}}

@endsection
