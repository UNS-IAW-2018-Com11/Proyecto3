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

	<title>Tournament creator v2.0</title>
</head>
<body>
	<nav class="navbar  navbar-expand-lg fixed-top">
		<a class="navbar-brand" href="/"> <img src="../images/liga.png"
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
				href="/">Home <span class="sr-only">(current)</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href=""
				onclick="alert('Tournament Generator IAW 2018 Beta')">About</a></li>
				<li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
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
				@if(!empty($torneos))
				<div class="container lista">
					<h2>Select the tournament to edit</h2>
					<div class="list-group" id="torneosactivos">
						@foreach($torneos as $t)
						<a onclick="" href="{{route('editor_partidos', ['id'=>$t->nombre])}}" class="list-group-item">
							<h4 class="list-group-item-heading">{{$t->nombre}}</h4>
							<p class="descripcion">{{$t->formato}}</p>
							<div class="torneo_slogan" style="padding-right: 0px;">
								<img src="{{asset('images/liga.png')}}" class="img-responsive">
							</div>
						</a>
						@endforeach
					</div>
				</div>
				@endif

				@if(!empty($fechas))
				<div class="row" style=" margin-top: 25px;">
					<table class="table table-hover table-condensed border" id="table-partidos">
						@foreach ($fechas as $fecha)
						<thead>
							<tr>
								<th colspan="5">Fecha {{$fecha->fecha}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($fecha->partidos as $partido)
							<tr>
								<td align="left"><a>{{$partido->local}}
									@if ($partido->estado === "finalizado")
									{{$partido->puntosLocal}}
									@endif
								</a></td>
								<td align="center"><input type="number" name="local" max="999"></td>
								<td align="center">
									<button type="button" class="btn btn-info"
									onclick='edit("{{$partido->local}}","{{$partido->visitante}}")'> Edit</button>
								</td>
								<td align="center"><input type="number" name="visitante" max="999"></td>
								<td align="right"><a>
									@if ($partido->estado === "finalizado")
									{{$partido->puntosVisitante}}
									@endif
									{{$partido->visitante}}</a></td>
								</tr>
								@endforeach
							</tbody>
							@endforeach
						</table>
					</div>
					@endif

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
		<script src="{{asset('js/editor.js')}}"></script>
		<!-- <script src="../javascripts/toggleMode.js"></script> -->
	</body>
	</html>