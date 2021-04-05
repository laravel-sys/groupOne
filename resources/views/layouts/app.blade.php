<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="{{ URL::to('/assets/css/ani.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/css/ani.css') }}" rel="stylesheet">
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body onload="getnotiCount()">


    </head>

    <body>

        <div id="app">
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">


                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ URL::to('/assets/logo.jpg') }}" style="width: 50px; height: 50px;" alt="">

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        @if (Auth::check() && Auth::user()->name == 'admin')
                            <ul class="navbar-nav ml-5">
                                <a class="navbar-brand hoverdNav" href="{{ route('reservations.index') }}">
                                    Reservations
                                </a>
                            </ul>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('returnBook') }}">
                                    Retrun Book
                                </a>
                            </ul>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('indexAdmin') }}">
                                    Bookings
                                </a>
                            </ul>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('indexAdminMessages') }}">
                                    Messages
                                </a>
                            </ul>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('rooms.index') }}">
                                    Rooms
                                </a>
                            </ul>
                            <li class="btn dropdown" id="notificitionNumber">
                                <a class="btn dropdown-toggle" style="font-size: large" href="#"
                                    id="navbarScrollingDropdown1" role="button" data-toggle="dropdown"
                                    aria-expanded="false" onclick="getData()">
                                    <img width="30px"
                                        src="https://thumbs.dreamstime.com/b/notification-bell-icon-notification-bell-icon-black-editable-vector-illustration-isolated-white-background-123045644.jpg" />
                                </a>
                                <ul class="navbar-nav">

                                    <ul class="dropdown-menu" id="notify" aria-labelledby="navbarScrollingDropdown1">


                                    </ul>
                                </ul>



                            </li>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('adminLateReturns') }}">
                                    Late Books
                                </a>
                            </ul>
                        @endif
                        @if (Auth::check() && Auth::user()->name != 'admin')
                            <ul class="navbar-nav ml-5">
                                <a class="navbar-brand hoverdNav" href="{{ route('history') }}">
                                    History
                                </a>
                            </ul>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('checkout') }}">
                                    Checkedout Books
                                </a>
                            </ul>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('getUserReservations') }}">
                                    Reservations List
                                </a>
                            </ul>
                            <li class="btn dropdown">
                                <a class="btn dropdown-toggle" style="font-size: larger" href="#"
                                    id="navbarScrollingDropdown" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Book Room
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('roomsBooking.index') }}">My
                                            Bookings</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('roomsBooking.create') }}">Make New
                                            Book</a>
                                    </li>
                                </ul>
                            </li>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('userLateReturns') }}">
                                    Late Books
                                </a>
                            </ul>
                            <ul class="navbar-nav">
                                <a class="navbar-brand hoverdNav" href="{{ route('wishlists') }}">
                                    Wishlist
                                </a>
                            </ul>

                            <li class="btn dropdown" id="notificitionNumber">
                                <a class="btn dropdown-toggle" style="font-size: large" href="#"
                                    id="navbarScrollingDropdown1" role="button" data-toggle="dropdown"
                                    aria-expanded="false" onclick="getData()">
                                    <img width="30px"
                                        src="https://thumbs.dreamstime.com/b/notification-bell-icon-notification-bell-icon-black-editable-vector-illustration-isolated-white-background-123045644.jpg" />
                                </a>
                                <ul class="navbar-nav">
                                    <ul class="dropdown-menu" id="notify" aria-labelledby="navbarScrollingDropdown1">
                                    </ul>
                                </ul>



                            </li>
                        @endif
                        <ul class="navbar-nav mr-auto hoverdNav">
                            <a class="navbar-brand" href="{{ url('/contacts') }}">
                                Contact Us
                            </a>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>


                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>

                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <script>
            function getnotiCount() {
                let notnumber = ``
                $.ajax({
                    url: '/Notification',
                    method: "GET"
                }).done(function(msg) {
                    if (msg[0].status == "unread") {

                        notnumber = `
                     <img width="30px" src="https://spng.subpng.com/20180404/bee/kisspng-kerala-computer-icons-bell-alarm-device-alarm-cloc-alarm-5ac4800fc346b2.3331892915228272797999.jpg"/>
                     `
                    } else {
                        notnumber = `
                     <img width="30px" src="https://thumbs.dreamstime.com/b/notification-bell-icon-notification-bell-icon-black-editable-vector-illustration-isolated-white-background-123045644.jpg"/>
                     `
                    }

                    $("#navbarScrollingDropdown1").html(notnumber)
                })
            }

            function getData() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let notlist = ``
                $.ajax({
                    url: '/Notification',
                    method: "GET"
                }).done(function(msg) {
                    msg.map(
                        m => {
                            if (m.status == "unread") {
                                notlist += ` <li>
                             <a class="dropdown-item" style="color:red; " href="${m.url}">${m.message}</a>
                                </li>`
                            } else {
                                notlist += ` <li>
                             <a class="dropdown-item" href="${m.url}">${m.message}</a>
                                </li>`
                            }
                        })
                    $("#notify").html(notlist)
                    msg.map(
                        m => {
                            $.ajax({
                                url: '/Notification/update',
                                method: "POST",
                                data: {
                                    'id': m.id
                                }

                            })
                            let notnumber = `
                           <img width="30px" src="https://thumbs.dreamstime.com/b/notification-bell-icon-notification-bell-icon-black-editable-vector-illustration-isolated-white-background-123045644.jpg"/>
                              `

                            $("#navbarScrollingDropdown1").html(notnumber)

                        })

                })

            }

        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>

    </body>

</html>
