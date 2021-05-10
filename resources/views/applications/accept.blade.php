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
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">Applications</a></li>
                <li class="breadcrumb-item"><a
                            href="{{ route('applications.show',$application->id) }}">{{ $application->id }}</a></li>
                {{--<li class="breadcrumb-item"><a href="{{ route('leaves.index') }}"> {{  date_diff(date_create($leave->date_from), date_create($leave->date_to))->format('%R%a')  }}</a></li>--}}
                <li class="breadcrumb-item active" aria-current="page">Accept</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table no-wrap">
                        <tbody>
                        {{--<tr>--}}
                        {{--<td class="text-gray">Days</td>--}}
                        {{--<td>{{  date_diff(date_create($leave->date_from), date_create($leave->date_to))->format('%R%a')  }}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td class="text-gray">Period</td>--}}
                        {{--<td>{{ $leave->date_from . ' to '. $leave->date_to  }}</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td class="text-gray">Leave schedule</td>
                            <td> {{ $application->leave->start_date . ' to ' . $application->leave->end_date }}</td>
                        </tr>
                        <tr>
                            <td class="text-gray">Leave period</td>
                            <td> {{ $application->start_date . ' to ' . $application->end_date }}</td>
                        </tr>
                        <tr>
                            <td class="text-gray">Status</td>
                            <td>
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
                        </tr>
                        <tr>
                            <td class="text-gray">Created By</td>
                            <td>{{ $application->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-gray">Created At</td>
                            <td>{{ $application->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-gray">Updated At</td>
                            <td>{{ $application->updated_at }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form id="application_form" method="POST" action="{{ route('applications.accept', $application->id) }}"
                          class="pt-3">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" name="start_date" id="start_date"
                                   class="form-control form-control-lg @error('start_date') is-invalid @enderror"
                                   data-value="{{ old('start_date', $application->start_date) }}"
                                   placeholder="{{ __('Start Date') }}"
                                   data-date-format="YYYY-MM-DD" required/>
                            @error('start_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" name="end_date" id="end_date" required
                                   class="form-control form-control-lg @error('end_date') is-invalid @enderror"
                                   value="{{ old('end_date', $application->end_date) }}"
                                   placeholder="{{ __('End Date') }}"/>
                            @error('end_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="description"
                                      class="form-control form-control-lg @error('description') is-invalid @enderror"
                                      placeholder="{{ __('Description') }}">

                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="{{ route('leaves.index') }}">
                                    <button class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                        {{ __('CANCEL') }}
                                    </button>
                                </a></div>
                            <div class="col-lg-6">
                                <button type="submit"
                                        class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                    {{ __('ACCEPT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection