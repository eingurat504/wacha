@extends('layouts.app')

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('leave_types.index') }}">Leaves Types</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('leave_types.store') }}" class="pt-3">
                        @csrf
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" id="name" required
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" placeholder="{{ __('Name') }}"/>
                            @error('name')
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
                                <a href="{{ route('leave_types.index') }}"
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