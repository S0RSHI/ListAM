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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg width="229" height="47" viewBox="0 0 229 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 47V0.125H11.7188V35.2812H35.1562V47H0ZM41.0156 47V0.125H52.7344V20.6328V29.4219V47H41.0156ZM58.5938 29.4219V11.8438C58.5938 4.03125 62.5 0.125 70.3125 0.125H93.75V11.8438H70.3125V17.7031H82.0312L93.75 17.7324V29.4219V35.2812C93.75 43.0938 89.8438 47 82.0312 47H58.5938V35.2812H82.0312V29.4219H58.5938ZM111.328 35.2812V11.8438H99.6094V0.125H123.047H134.766V11.8438H123.047V47H111.328V35.2812Z" fill="white"/>
                        <path d="M140.625 47V11.8438C140.625 4.03125 144.531 0.125 152.344 0.125H175.781V47H164.062V29.4219H152.344V47H140.625ZM164.062 17.7031V11.8438H152.344V17.7031H164.062ZM181.641 47V11.8438C181.641 4.03125 185.547 0.125 193.359 0.125H228.516V47H216.797V11.8438H210.938V35.2812H199.219V11.8438H193.359V47H181.641Z" fill="#67AAF9"/>
                        </svg>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto v-nav__menu--left">
                        <a href="/" onclick="event.preventDefault();">
                            Anime list
                        </a>
                        <a href="/" onclick="event.preventDefault();">
                            Manga list
                        </a>
                        <a href="/" onclick="event.preventDefault();">
                            Your list
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto v-nav__menu--right">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/" onclick="event.preventDefault();">
                                        Home
                                    </a>
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
</body>
</html>
