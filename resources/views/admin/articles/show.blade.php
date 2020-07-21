@extends('layouts.app', ['title' => __('Articles Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Preview Articles')])   

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
                                <a href="{{ route('articles.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row the_course">
                            <div class="col-sm-4">

                                <div class="course-image">
                                    @if($article->photo)
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$article->photo->filename}}" alt="Course Photo">
                                    @else
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/team.jpg" alt="Course Photo">
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm">

                                <div class="course-info">
                                    <h3>{{ \Str::limit($article->title, 20) }}</h3>
                                    <h5>{{ $article->description }}</h5>
                                    <a class="text-success" target="_blank" href="{{ $article->link }}">{{ $article->link }}</a>
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