@extends('layouts.app', ['title' => __('Admins Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Admins') }}</h3>
                            </div>
{{--                            <div class="form-outline col-4" style="margin-right: -20px">--}}
{{--                                    <input type="search" id="search-admins" class="form-control" placeholder="search"--}}
{{--                                           aria-label="Search" />--}}
{{--                            </div>--}}
                            <div class="col-4 text-right">
                                <a href="{{ route('admins.create') }}" class="btn btn-sm btn-primary">{{ __('Add admin') }}</a>
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

                    @if(count($admins) > 0)

                    <div class="table-responsive" id="table">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="dynamic-row">
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td><a href="{{ route('admins.show',$admin) }}">{{ $admin->name }}</a></td>
                                        <td>{{ $admin->email }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('admins.destroy', $admin) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('admins.edit', $admin) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this admin?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p class="lead text-center"> No admins found</p>
                    @endif

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $admins->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
