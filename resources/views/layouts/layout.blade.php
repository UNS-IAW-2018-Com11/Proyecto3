<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href = "{{ asset('css/estilo.css') }}">

	<title>Tournament creator v3.0</title>
</head>
<body>

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

			@if(!empty($user))
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{$user->name}}'s profile
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					@if($user->class === 'admin')
						<a class="dropdown-item" href="{{route('admin')}}">Admin</a>
					@endif
					@if($user->class !== 'visitante')
						<a class="dropdown-item" href="{{route('editor')}}">Editor</a>
					@endif
					<a class="dropdown-item" href="{{route('logout')}}"onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
					 {{ __('Logout') }}
			 </a>

			 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					 @csrf
			 </form>
				</div>
			</div>

			@else
			<a class="btn btn-primary" href="{{route('perfil')}}">Login</a>
			@endif

		</div>
	</nav>

  @yield('body')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script
  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
  crossorigin="anonymous"></script>
  <script
  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>
	<script src="{{asset('js/toggleMode.js')}}"></script>

	@yield('scripts')
</body>
</html>
