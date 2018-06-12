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
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
	<!--<script src="{{ asset('js/toggleMode.js') }}"></script>-->
	<title>Tournament creator v3.0</title>
</head>
<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=445760452539949&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<nav class="navbar  navbar-expand-lg fixed-top">
		<a class="navbar-brand" href="{{route('index')}}"> <img src="{{asset('images/liga.png')}}" alt="" width="30" height="30"> Tournament Generator
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span>
				</a></li>
				<li class="nav-item"><a class="nav-link" href="" onclick="alert('Tournament Generator IAW 2018 Beta')">About</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
			</ul>
			<button class="btn btn-primary normal-mode" id="toggleButton" type="submit" onclick="toggleMode()">Dark Mode</button>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row content">
			<div class="col-lg-1  IAWbanner"></div>
			<div class="col-lg-10">
				<!-- aca va el contenido de la pag -->
				<div>
					<div class="container">
						<div class="row relleno"></div>
						<div class="row">
							<div class="col-5">
								<!-- ACA VA LA TABLA DE POSICIONES -->
										<div style="display: block;">
									<div class="row">
										<table class="table table-hover table-condensed border">
											<thead>
												<tr>
													<th>Team</th>
													<th>GP</th>
													<th>W</th>
													<th>L</th>
													<th>PF</th>
													<th>PC</th>
													<th>Pts</th>
												</tr>
											</thead>
											<tbody id="table-posiciones">
												@foreach($teams as $team)
												<tr><td><a href="{{route('team',['id'=>$team->nombre])}}">{{$team->nombre}}</a></td><td>{{$team->GP}}</td><td>{{$team->W}}</td><td>{{$team->L}}</td><td>{{$team->PF}}</td><td>{{$team->PC}}</td><td>{{$team->Pts}}</td></tr>
												@endforeach
											</table>

		<div style="overflow: auto;" class="fb-comments" data-href="http://tg-laravel.herokuapp.com/torneos/{{$torneo}}" data-numposts="5"></div>
									<!--		<div style="overflow:auto;" class="fb-comments" data-href="http://tg-laravel.herokuapp.com/torneos/" data-numposts="5"></div>-->

										</div>

									</div>

								</div>


							<div class="col-1"></div>


								<div class="col-6">
									<!-- ACA VAN LOS PARTIDOS -->
									<div class="row">
										<table class="table table-hover table-condensed border" id="table-partidos">
											@foreach($fechas as $fecha)
											<thead>
												<tr>
													<th colspan="3">Fecha {{$fecha->fecha}}</th>
												</tr>
											</thead>
											<tbody>
												@foreach($fecha->partidos as $partido)
												<tr>
													<td align="left"><a>{{$partido['local']}}
														@if($partido['estado'] === "finalizado")
														({{$partido['puntosLocal']}})
														@endif
													</a></td>
													<td align="center">vs</td>
													<td align="right"><a>

														@if($partido['estado'] === "finalizado")
														({{$partido['puntosVisitante']}})
														@endif
														{{$partido['visitante']}}</a></td>
													</tr>
													@endforeach
												</tbody>
												@endforeach
											</table>
										</div>
									</div>


								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-1 sidenav IAWbanner"></div>
				</div>


				<!-- Optional JavaScript -->
				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
				<!-- <script src="scripts/fixture.js"></script>
				<script src="{{asset('js/toggleMode.js')}}"></script>-->
			</div>
		</body>
		</html>
