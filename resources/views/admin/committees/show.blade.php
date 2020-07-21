@extends('layouts.app', ['title' => __('Committees Management')])

@section('content')
    @include('admin.admins.partials.header', ['title' => __('Show Committee')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $committee->name }} Committee</h3>
                            </div>
                            <div class="col-4 text-right">
                            <a href="{{ route('committees.volunteers.create', $committee) }}" class="btn btn-sm btn-primary">{{ __('Add volunteer') }}</a>
                            </div>
                        </div>
                    </div>
                    @if(count($committee->volunteers))

                    <div class="row">
                        @foreach($committee->volunteers as $volunteer)
                        <div class="col-sm-3" style="margin-top:15px">
                            <div class="card">
                                @if($volunteer->photo)
                                <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$volunteer->photo->filename}}" class="card-img-top" alt="volunteer Photo">
                                @else
                                <img style="width:100%;height:170px;" src="{{ asset('images') }}/team.jpg" class="card-img-top" alt="volunteer Photo">
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
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection