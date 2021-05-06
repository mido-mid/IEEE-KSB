<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IEEE KSB</title>
        <!-- Favicon -->
        <link href="{{ asset('images') }}/ieee.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}" id="user_data">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('js') }}/script.js"></script>
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

        <script type="text/javascript">

            $(function(){

                $("#search-admins").on('keyup',function(){

                    var search = $(this).val();

                    var html =  "<div>Cool</div>";

                    $.ajax({
                        url: 'search/admins',
                        type: 'GET',
                        data: {
                            'search_query':search,
                        },
                        dataType: 'JSON',
                        success:function(data){
                            console.log(data);
                            var tablerow = '';

                            $("#dynamic-row").html('');

                            if(data.length > 0) {
                                var table = `<table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="dynamic-row">
                            </tbody>
                        </table>
                            `;
                                $("#table").html(table);

                                $.each(data, function (index, value) {

                                    tablerow = `                                    <tr>
                                                    <td><a href="http://localhost/IEEE/public/admin/admins/` + value.id + `">` + value.name + `</a></td>
                                                    <td>` + value.email + `</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <form action="http://localhost/IEEE/public/admin/admins/` + value.id + `" method="post">

                                                                    @csrf
                                    @method('delete')
                                    <a class="dropdown-item" href="http://localhost/IEEE/public/admin/admins/` + value.id + `/edit">Edit</a>
                                                                                                <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete this admin?') ? this.parentElement.submit() : ''">
                                                                                                    Delete
                                                                                                </button>
                                                                                            </form>

                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>`;

                                    $("#dynamic-row").append(tablerow);
                                })
                            }
                            else {
                                $("#table").html('<p class="text-center" >no admins found</p>');
                            }
                        },
                    });
                });


                $("#search-volunteers").on('click',function(){

                    var search = $(this).val();

                    $.ajax({
                        url: 'search/volunteers',
                        type: 'GET',
                        data: {
                            'search_query':search,
                        }, 
                    });
                });
            });
        </script>
        <script>
            function viewPassword()
            {
                var passwordInput = document.getElementById('password');
                var passStatus = document.getElementById('pass-status');

                if (passwordInput.type == 'password'){
                    passwordInput.type='text';
                    passStatus.className='fa fa-fw fa-eye-slash field-icon';

                }
                else{
                    passwordInput.type='password';
                    passStatus.className='fa fa-fw fa-eye field-icon';
                }
            }
        </script>
    </body>
</html>
