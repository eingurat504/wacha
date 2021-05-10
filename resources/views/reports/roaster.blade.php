@extends('layouts.app')

@push('extra-js')

    <script src="{{ asset('plugins/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script type="text/javascript">

        $('input[type=date]').datetimepicker({
            ignoreReadonly: true
        });

        var form = $('form#application_form');

        var start_date = form.find('input[name=start_date]').data('value');

        if (start_date) {
            $("input[name='start_date']").val(start_date);
        } else {
            $("input[name='start_date']").val(moment().format('YYYY-MM-DD'));
        }

        var end_date = form.find('input[name=end_date]').data('value')

        if (end_date) {
            $("input[name='end_date']").val(end_date);
        } else {
            $("input[name='end_date']").val(moment().add(1, 'day').format('YYYY-MM-DD'));
        }


    </script>

@endpush

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Roaster</li>
            </ol>
        </nav>
        {{--<div>--}}
        {{--<a class="btn btn-sm btn-success btn-fw" href="{{ route('users.create') }}">--}}
        {{--<i class="mdi mdi-plus"></i> Create--}}
        {{--</a>--}}
        {{--</div>--}}
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{--@include('flash::message')--}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('reports.roaster') }}" class="pt-3">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label>Start Date:</label>
                                <input type="text" name="start_date" id="start_date" required
                                       class="form-control form-control-lg @error('start_date') is-invalid @enderror"
                                       value="{{ old('start_date') }}" placeholder="{{ __('Start Date') }}"/>
                                @error('start_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3">
                                <label>End Date:</label>
                                <input type="text" name="end_date" id="end_date" required
                                       class="form-control form-control-lg @error('end_date') is-invalid @enderror"
                                       value="{{ old('end_date') }}" placeholder="{{ __('End Date') }}"/>
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-2">
                                <label>Status:</label>
                                <select name="status" id="status"
                                        class="form-control form-control-lg @error('status') is-invalid @enderror">
                                    <option value=""  {{ old('status') == null ? 'selected' : '' }}>Choose status</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Accepted</option>
                                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Confirmed</option>
                                    <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Approved</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Applied</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3">
                                <label>&nbsp;</label>
                                <button type="submit"
                                        class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                    <i class="mdi mdi-download"></i>
                                    {{ __('DOWNLOAD') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="border-bottom">
                        <h4 class="card-title">Employee Roaster</h4>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Leave period</th>
                            <th class="text-center">Days</th>
                            <th class="text-center">Status</th>
                            <th class="wd-10p">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr>
                                {{--<td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>--}}
                                {{--<td>{{ $user->email }}</td>--}}
                                {{--<td class="text-center">--}}
                                <td>{{ $log->user->name }}</td>
                                <td> {{ $log->start_date . ' to ' . $log->end_date }}</td>
                                <td class="text-center">
                                    {{ date_diff(date_create($log->start_date), date_create($log->end_date))->format('%R%a') }}
                                </td>
                                <td class="text-center">
                                    @if($log->status == 0 )
                                        <span class="badge badge-info">Applied</span>
                                    @elseif($log->status == 1 )
                                        <span class="badge badge-primary">Accepted</span>
                                    @elseif($log->status == 2 )
                                        <span class="badge badge-success">Confirmed</span>
                                    @elseif($log->status == 3 )
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-danger">Revoked</span>
                                    @endif
                                </td>
                                {{--</td>--}}
                                <td>{{ $log->created_at }}</td>
                                {{--<td class="text-center">--}}
                                {{--<div class="dropdown show">--}}
                                {{--<i class="mdi mdi-dots-horizontal" style="font-size: 1.25rem;"--}}
                                {{--data-toggle="dropdown"></i>--}}
                                {{--<div class="dropdown-menu">--}}
                                {{--<a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">--}}
                                {{--<i class="mdi mdi-pencil"></i>&nbsp;Edit--}}
                                {{--</a>--}}
                                {{--<a class="dropdown-item" href="#" data-toggle="modal"--}}
                                {{--data-id="{{ $user->id }}"--}}
                                {{--data-name="{{ $user->name }}" data-target="#destroy-user-modal">--}}
                                {{--<i class="mdi mdi-delete"></i>&nbsp;Delete--}}
                                {{--</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</td>--}}
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