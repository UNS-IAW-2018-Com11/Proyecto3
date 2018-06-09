<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--	<meta name="csrf-token" content="{{ csrf_token() }}"> -->

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">

<title>Tournament creator v1.0</title>
</head>
<body onload="inicializarForm()">


	<nav class="navbar  navbar-expand-lg fixed-top">
		<a class="navbar-brand" href="{{route('index')}}"> <img src="images/liga.png"
			width="30" height="30" alt=""> Tournament Generator
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
			</ul>
			<button class="btn btn-primary normal-mode" id="toggleButton"
				type="submit" onclick="toggleMode()">Dark Mode</button>

		</div>
	</nav>

	<div class="container-fluid">
		<div class="row content">
			<div class="col-lg-2  IAWbanner"></div>
			<div class="col-lg-8" id="contenido">
				<!-- CONTENIDO DE LA PAGINA -->
				<h3>Tournament info</h3>

				<div class="containerAdmin">
					<form action="{{route('new_tourney')}}" method="get">
						<label for="tname">Tournament Name</label> <input type="text"
							id="tname" name="tname" placeholder="Tournament name..">
						<label for="format">Tournament format</label> <select id="format"
							name="format">
							<option value="league">League</option>
							<!--<option value="knockout">Knockout</option> -->
							<!-- <option value="both">League and Knockout</option> -->
						</select>
						<div>
							<label for="tname">Maximum amount of players</label>
							<div>
								<input type="text" id="maxp" name="maxp" class="unselectable"
									readonly> <img src="images/minus.png" height="30px"
									width="30px" onclick=decrease()> <img
									src="images/plus.png" height="30px" width="30px"
									onclick=increase()>
							</div>
						</div>
						<div>
							<label for="teams">Number of teams</label>
							<div>
								<input type="text" id="teams" name="teams" class="unselectable"
									readonly> <img src="images/minus.png" height="30px"
									width="30px" onclick=decreaseby2()> <img
									src="images/plus.png" height="30px" width="30px"
									onclick=increaseby2()>
							</div>
						</div>
						<input style="background-color:#02025b" type="submit" value="Submit">
					</form>
				</div>
				<hr>
				<hr>
				<hr>
			</div>
			<!-- div de la columna 8 -->

			<div class="col-lg-2 sidenav IAWbanner"></div>
		</div>
	</div>

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
	<script src="{{asset('js/admin.js')}}"></script>
<!--	<script src="{{asset('js/toggleMode.js')}}"></script>-->
</body>
</html>
