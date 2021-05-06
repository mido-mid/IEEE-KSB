@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-7 mb-5 mb-xl-0">
                <div class="card shadow">

                    @if(auth()->user()->admin == 1)
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Latest admins</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('admins.index') }}" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        @if(count($admins))

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('name') }}</th>
                                        <th scope="col">{{ __('email') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td><a href="{{ route('admins.show', $admin) }}">{{ $admin->name }}</a></td>

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
                    @else
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Latest roles</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        @if(count($events))
                        <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('name') }}</th>
                                            <th scope="col">{{ __('start date') }}</th>
                                            <th scope="col">{{ __('end date') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td><a href="{{ route('events.show', $event) }}">{{ $event->title }}</a></td>

                                                <td>{{ $event->start_date }}</td>
                                                <td>{{ $event->end_date }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <form action="{{ route('events.destroy', $event) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('events.edit', $event) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this event?") }}') ? this.parentElement.submit() : ''">
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
                            <p class="lead text-center"> No events found</p>
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Latest volunteers</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('volunteers.index') }}" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        @if(count($volunteers))
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('role') }}</th>
                                        <th scope="col">{{ __('committee') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($volunteers as $volunteer)
                                        <tr>
                                            <td><a href="{{ route('volunteers.show',$volunteer) }}">{{ $volunteer->eng_name }}</a></td>

                                            <td>{{ $volunteer->role->name }}</td>

                                            <td>{{ $volunteer->committee->name }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('volunteers.destroy', $volunteer) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('volunteers.edit', $volunteer) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this volunteer?") }}') ? this.parentElement.submit() : ''">
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
                            <p class="lead text-center"> No volunteer found</p>
                        @endif
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-7 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Latest committees</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('committees.index') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    @if(count($committees))
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('no. of volunteers') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($committees as $committee)
                                    <tr>
                                        <td><a href="{{ route('committees.show', $committee) }}">{{ $committee->name }}</a></td>
                                        <td>{{ count($committee->volunteers) }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('committees.destroy', $committee) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('committees.edit', $committee) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this committee?") }}') ? this.parentElement.submit() : ''">
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
                        <p class="lead text-center"> No committees found</p>
                    @endif
                </div>
            </div>
        <div class="col-xl-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">latest articles</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('articles.index') }}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    @if(count($articles))
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('title') }}</th>
                                        <th scope="col">{{ __('Creation Date') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td><a href="{{ route('articles.show',$article) }}">{{ \Str::limit($article->title, 15) }}</a></td>
                                            <td>{{ $article->date }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('articles.destroy', $article) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('articles.edit', $article) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this article?") }}') ? this.parentElement.submit() : ''">
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
                        <p class="lead text-center"> No articles found</p>
                    @endif
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
