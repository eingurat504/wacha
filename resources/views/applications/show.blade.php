@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">Applications</a></li>
                <li class="breadcrumb-item">{{ $application->id }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Application</h4>

                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Leave schedule</td>
                                <td> {{ $application->leave->start_date . ' to ' . $application->leave->end_date }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Leave period</td>
                                <td> {{ $application->start_date . ' to ' . $application->end_date }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Leave days</td>
                                <td> {{ date_diff(date_create($application->start_date), date_create($application->end_date))->format('%R%a') }} day(s)</td>
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
                                <td class="text-gray">Description</td>
                                <td>{{ $application->description }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Applied By</td>
                                <td>{{ $application->user->name }}</td>
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
        </div>
    </div>
@endsection