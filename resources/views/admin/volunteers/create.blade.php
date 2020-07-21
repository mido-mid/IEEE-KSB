@extends('layouts.app', ['title' => __('Volunteer Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Add Volunteer')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Volunteer Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('volunteers.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('volunteers.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Volunteer information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('eng_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-eng_name">{{ __('EngName') }}</label>
                                    <input type="text" name="eng_name" id="input-eng_name" class="form-control form-control-alternative{{ $errors->has('eng_name') ? ' is-invalid' : '' }}" placeholder="{{ __('EngName') }}" value="{{ old('eng_name') }}" required autofocus>

                                    @if ($errors->has('eng_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('eng_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('arab_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-arab_name">{{ __('ArabName') }}</label>
                                    <input type="text" name="arab_name" id="input-arab_name" class="form-control form-control-alternative{{ $errors->has('arab_name') ? ' is-invalid' : '' }}" placeholder="{{ __('ArabName') }}" value="{{ old('arab_name') }}" >

                                    @if ($errors->has('arab_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('arab_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('linkedin') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-linkedin">{{ __('LinkedIn') }}</label>
                                    <input type="text" name="linkedin" id="input-linkedin" class="form-control form-control-alternative{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" placeholder="{{ __('LinkedIn') }}" value="" >
                                    
                                    @if ($errors->has('linkedin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('linkedin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('gmail') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-gmail">{{ __('Gmail') }}</label>
                                    <input type="text" name="gmail" id="input-gmail" class="form-control form-control-alternative{{ $errors->has('gmail') ? ' is-invalid' : '' }}" placeholder="{{ __('Gmail') }}" value="" >
                                    
                                    @if ($errors->has('gmail'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gmail') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role_id">{{ __('Role') }}</label>
                                    
                                    <select name="role_id" required class="form-control">
                                        @foreach(\App\Role::orderBy('id','desc')->get() as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('role_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('committee_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-committee_id">{{ __('Committee') }}</label>
                                    
                                    <select name="committee_id" required class="form-control">
                                        @foreach(\App\Committee::orderBy('id','desc')->get() as $committee)
                                        <option value="{{ $committee->id }}">{{ $committee->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('committee_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('committee_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('image') }}</label>
                                    <input type="file" name="image" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" required>
                                    
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection