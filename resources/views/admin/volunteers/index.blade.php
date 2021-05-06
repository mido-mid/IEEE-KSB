@extends('layouts.app', ['title' => __('Volunteers Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Volunteers') }}</h3>
                            </div>
{{--                            <div class="form-outline col-4" style="margin-right: -20px">--}}
{{--                                <input type="search" id="search-volunteers" class="form-control" placeholder="search"--}}
{{--                                       aria-label="Search" />--}}
{{--                            </div>--}}
                            <div class="col-4 text-right">
                                <a href="{{ route('volunteers.create') }}" class="btn btn-sm btn-primary">{{ __('Add volunteer') }}</a>
                            </div>
                        </div>
                    </div>

                    @include('includes.errors')

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    @if(count($volunteers) > 0)

                    <div class="row" id="dynamic-row">
                        @foreach($volunteers as $volunteer)
                        <div class="col-sm-3" style="margin-top:15px">
                            <div class="card">
                                @if($volunteer->photo)
                                <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$volunteer->photo->filename}}" class="card-img-top" alt="volunteer Photo">
                                @else
                                <img  style="width:100%;height:170px;" src="{{ asset('images') }}/team.jpg" class="card-img-top" alt="volunteer Photo">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit($volunteer->eng_name, 20) }}</h5>

                                    <form  method="POST" action="{{ route('volunteers.destroy', $volunteer) }}">

                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('volunteers.edit', $volunteer) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('volunteers.show', $volunteer) }}" class="btn btn-info btn-sm">show</a>

                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to delete this volunteer?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @else
                        <p class="lead text-center"> No volunteers found</p>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $volunteers->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

