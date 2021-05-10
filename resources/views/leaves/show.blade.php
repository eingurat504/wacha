@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('leaves.index') }}">Leaves Roaster</a></li>
                <li class="breadcrumb-item">
                    {{  date_diff(date_create($leave->start_date), date_create($leave->end_date))->format('%R%a')  }} Days
                </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Leave</h4>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <tbody>
                            <tr>
                                <td class="text-gray">Days</td>
                                <td>{{  date_diff(date_create($leave->start_date), date_create($leave->end_date))->format('%R%a')  }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Period</td>
                                <td>{{ $leave->start_date .'  to  '. $leave->end_date }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Status</td>
                                <td>
                                    @if($leave->status == 0 )
                                        <span class="badge badge-info">Available</span>
                                    @else
                                        <span class="badge badge-info">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray">Description</td>
                                <td>{{ $leave->description }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created By</td>
                                <td>{{ $leave->createdby->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Created At</td>
                                <td>{{ $leave->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="text-gray">Updated At</td>
                                <td>{{ $leave->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection