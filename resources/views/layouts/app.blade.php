<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Syafiq Wafi</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Syafiq Wafi
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

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

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                List of Top Completed
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('first') }}">
                                    Type 1
                                </a>
                                <a class="dropdown-item" href="{{ route('second') }}">
                                    Type 2
                                </a>
                                <a class="dropdown-item" href="{{ route('third') }}">
                                    Type 3
                                </a>
                            </div>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('api') }}">API</a>
                            </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outlet.index',['id'=>request()->route('id') ?? request()->route('id')]) }}">Dashboard</a>
                        </li>

                        {{--                            <li class="nav-item dropdown">--}}
                        {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                        {{--                                    Sales--}}
                        {{--                                </a>--}}

                        {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                        {{--                                    <a class="dropdown-item" href="{{ route('sales.index',['id'=>request()->route('id')]) }}">--}}
                        {{--                                        List--}}
                        {{--                                    </a>--}}
                        {{--                                    <a class="dropdown-item" href="{{ route('sales.create',['id'=>request()->route('id')]) }}">--}}
                        {{--                                        Add Sales--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </li>--}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('staff.list',['id'=>request()->route('id')]) }}">Staff</a>
                        </li>

                        {{--                            <li class="nav-item dropdown">--}}
                        {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                        {{--                                    Manage Staff--}}
                        {{--                                </a>--}}

                        {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                        {{--                                    <a class="dropdown-item" href="{{ route('staff.list',['id'=>request()->route('id')]) }}">--}}
                        {{--                                        List--}}
                        {{--                                    </a>--}}
                        {{--                                    <a class="dropdown-item" href="{{ route('staff.create',['id'=>request()->route('id')]) }}">--}}
                        {{--                                        Add New--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </li>--}}

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Report
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('sales.index',['id'=>request()->route('id')]) }}">Sales</a>
                                <a class="dropdown-item" href="{{ route('outlet.report.daily',['id'=>request()->route('id'),'date'=>date('Y-m-d')]) }}">
                                    Daily
                                </a>
                                <a class="dropdown-item" href="{{ route('outlet.report.weekly',['id'=>request()->route('id')]) }}">
                                    Weekly
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{--                                    {{ Auth::user()->name }}--}}
                                {{ auth()->user()->outlet->team->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "order": [[ 1, "desc" ]]
        });
    } );
</script>
@yield('js')
</body>
</html>
