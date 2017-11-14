<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if ( ! empty($charts))
        {!! Charts::styles(['highcharts']) !!}
    @endif
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                        <ul class="nav navbar-nav">
                            <li class="{{ Route::currentRouteName() == 'dashboard' ? "active" : "" }}"><a href="{{ route('dashboard') }}">@lang('Dashboard')</a></li>
                            <li class="{{ Route::currentRouteName() == 'reportes.index' ? "active" : "" }}"><a href="{{ route('reportes.index') }}">@lang('Reports')</a></li>
                            <li class="{{ Route::currentRouteName() == 'graficos.index' ? "active" : "" }}"><a href="{{ route('graficos.index') }}">@lang('Charts')</a></li>
                            @if (Auth::user()->hasRole('admin'))
                                <li class="{{ Route::currentRouteName() == 'usuarios.index' ? "active" : "" }}"><a href="{{ route('usuarios.index') }}">@lang('Users')</a></li>
                            @endif
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="{{ Route::currentRouteName() == 'login' ? "active" : "" }}"><a href="{{ route('login') }}">@lang('Login')</a></li>
                            <li class="{{ Route::currentRouteName() == 'register' ? "active" : "" }}"><a href="{{ route('register') }}">@lang('Register')</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="{{ Route::currentRouteName() == 'usuarios.edit' ? "active" : "" }}">
                                        <a href="{{ route('usuarios.edit', Auth::user()->id) }}">@lang('Edit Profile')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            @lang('Logout')
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js-scripts')
</body>
</html>
