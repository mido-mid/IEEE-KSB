@extends('layouts.app', ['title' => __('Admins Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Show Admin')])   

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
                                <a href="{{ route('admins.index') }}" class="btn btn-sm btn-primary">{{ __('list of admins') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row the_volunteer">
                            <div class="col-sm-4">

                                <div class="volunteer-image">
                                    @if($admin->photo)
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$admin->photo->filename}}" alt="admin Photo">
                                    @else
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/team.jpg" alt="admin Photo">
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm">

                                <div class="volunteer-info">
                                    <h3>{{ $admin->name }}</h3>
                                    <h5><i class="fas fa-envelope-open" style="margin-right:5px;display:inline"></i>{{ $admin->email }} </h5>
                                </div>
                            </div>
                        </div>             
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection