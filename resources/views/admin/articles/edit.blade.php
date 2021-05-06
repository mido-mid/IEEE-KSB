@extends('layouts.app', ['title' => __('Admin Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Edit Article')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Article Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admins.index') }}" class="btn btn-sm btn-primary">{{ __('list of articles') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Article information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" value="{{ old('title', $article->title) }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('description') }}</label>
                                    <textarea name="description" rows="5" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}"  required>{{ old('description',$article->description) }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('link') }}</label>
                                    <input type="text" name="link" id="input-link" class="form-control form-control-alternative{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('link') }}" value="{{ old('link', $article->link) }}" required>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-date">{{ __('date') }}</label>
                                    <input type="date" name="date" id="input-date" class="form-control form-control-alternative{{ $errors->has('date') ? ' is-invalid' : '' }}" placeholder="{{ __('date') }}" value="{{ old('date', $article->date) }}" required>

                                    @if ($errors->has('date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('image') }}</label>
                                    <input type="file" name="image" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}">

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
