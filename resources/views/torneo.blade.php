@extends('layouts.layout')

@section('body')
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=445760452539949&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
				</div>

@endsection
