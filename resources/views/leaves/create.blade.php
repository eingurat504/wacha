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
                <li class="breadcrumb-item"><a href="{{ route('leaves.index') }}">Leaves Roaster</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('leaves.store') }}" class="pt-3">
                        @csrf
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" name="start_date" id="start_date" required
                                   class="form-control form-control-lg @error('start_date') is-invalid @enderror"
                                   value="{{ old('start_date') }}" placeholder="{{ __('Start Date') }}"/>
                            @error('start_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" name="end_date" id="end_date" required
                                   class="form-control form-control-lg @error('end_date') is-invalid @enderror"
                                   value="{{ old('end_date') }}" placeholder="{{ __('End Date') }}"/>
                            @error('end_date')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="description"
                                      class="form-control form-control-lg @error('description') is-invalid @enderror"
                                      placeholder="{{ __('Description') }}">{{ trim(old('description')) }}

                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="{{ route('leaves.index') }}"
                                   class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn">
                                    {{ __('CANCEL') }}
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit"
                                        class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                    {{ __('+ CREATE') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection