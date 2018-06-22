<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tournament Generator v3.0</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href = "{{ asset('css/estilo.css') }}">
</head>
<body>
    <div id="app">

      <nav class="navbar  navbar-expand-lg fixed-top">
        <a class="navbar-brand" href=""> <img
          src="{{asset('images/liga.png')}}" width="30" height="30" alt="">
          Tournament Generator
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"><a class="nav-link"
            href="{{route('index')}}">Home <span class="sr-only">(current)</span>
          </a></li>

          <li class="nav-item"><a class="nav-link" href=""
            onclick="alert('Tournament Generator IAW 2018 Beta')">About</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('youtube')}}">Improve your technique!!</a></li>

          </ul>
          <button class="btn btn-primary normal-mode" id="toggleButton"
          type="submit" onclick="toggleMode();">Dark Mode</button>


              <!-- Authentication Links -->
              @guest
                  <div class="nav-item"><a style="color: white;"class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></div>
                  <div class="nav-item"><a style="color: white;"class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></div>
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest


        </div>
      </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    	@yield('scripts')
</body>
</html>
