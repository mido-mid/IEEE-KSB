@extends('layouts.app', ['title' => __('Volunteers Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Show Volunteer')])   

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
                        <div class="row the_volunteer">
                            <div class="col-sm-4">

                                <div class="volunteer-image">
                                    @if($volunteer->photo)
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$volunteer->photo->filename}}" alt="volunteer Photo">
                                    @else
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/team.jpg" alt="volunteer Photo">
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm">

                                <div class="volunteer-info">
                                    <h3>{{ $volunteer->eng_name }}</h3>
                                    <h5>{{ $volunteer->role->name }} in {{ $volunteer->committee->name }} Team</h5>
                                    <p class="lead"style="font-weight:bold">contacts</p>
                                    <h5><a  target="_blank" href="{{ $volunteer->linkedin }}"><i class="fab fa-linkedin" style="margin-right:5px"></i>{{ $volunteer->linkedin }}</h5>
                                    <h5><a  target="_blank" href="{{ $volunteer->gmail }}"><i class="fas fa-envelope-open" style="margin-right:5px"></i>{{ $volunteer->gmail }}</h5>
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