<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href = "{{ asset('css/estilo.css') }}">
<link rel="stylesheet" type="text/css"
	href="stylesheets/footer-basic-centered.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}">

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

			<!--	<li class="nav-item"><a class="nav-link" href="/auth/login">Login</a></li> -->
			<!--	<li class="nav-item"><a class="nav-link" href="/auth/logout">Logout</a></li> -->

			<li class="nav-item"><a class="nav-link" href=""
					onclick="alert('Tournament Generator IAW 2018 Beta')">About</a></li>
			<li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>

			</ul>
			<button class="btn btn-primary normal-mode" id="toggleButton"
				type="submit" onclick="toggleMode()">Dark Mode</button>

			<a class="btn btn-primary" href="{{route('admin')}}">Login</a>
			<!--	<button class="btn btn-primary" type="submit">Login</button>-->

		</div>
	</nav>

	<div class="container-fluid">
		<div class="row content">
			<div class="col IAWbanner"></div>
			<div class="col-8">
				<!-- 			aca va la lista -->
				<div class="container lista">
					<h2>Active Tournaments</h2>
					<div class="list-group" id="torneosactivos">

						@foreach($torneos as $t)
						<a onclick="" href="{{route('torneo', ['id'=>$t->nombre])}}" class="list-group-item">
							<h4 class="list-group-item-heading">{{$t->nombre}}</h4>
							<p class="descripcion">{{$t->formato}}</p>
							<div class="torneo_slogan" style="padding-right: 0px;">
								<img src="{{asset('images/liga.png')}}" class="img-responsive">
							</div>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col IAWbanner"></div>
		</div>
	</div>

	<footer class="footer-basic-centered">

		<p class="footer-company-motto">Organize your tournament for free!</p>

		<p class="footer-company-name">Peratta - Piersigilli &copy; 2018</p>

	</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

<!--	<script src="../javascripts/toggleMode.js"></script> -->

</body>
</html>
