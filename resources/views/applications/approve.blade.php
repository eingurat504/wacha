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
                <li class="breadcrumb-item"><a href="{{ route('applications.show',$application->id) }}">{{ $application->id }}</a></li>
                {{--<li class="breadcrumb-item"><a href="{{ route('leaves.index') }}"> {{  date_diff(date_create($leave->date_from), date_create($leave->date_to))->format('%R%a')  }}</a></li>--}}
                <li class="breadcrumb-item active" aria-current="page">Approve</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('applications.approve', $application->id) }}" class="pt-3">
                        @csrf
                        @method('PUT')
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
                        &nbsp;
                        <div class="form-group">
                            <textarea name="description" class="form-control form-control-lg @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">

                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                            {{ __('APPROVE') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection