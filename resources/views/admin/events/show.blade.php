@extends('layouts.app', ['title' => __('Events Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Preview Event')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Event Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('events.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row the_course">
                            <div class="col-sm-4">

                                <div class="course-image">
                                    @if($event->photo)
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$event->photo->filename}}" alt="Course Photo">
                                    @else
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/team.jpg" alt="Course Photo">
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm">

                                <div class="course-info">
                                    <h3>{{ $event->title }}</h3>
                                    <h5>{{ $event->description }}</h5>
                                    <a class="text-success" target="_blank" href="{{ $event->link }}">{{ $event->link }}</a>
                                    <p>from {{$event->start_date}} to {{$event->end_date}}</p>
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
