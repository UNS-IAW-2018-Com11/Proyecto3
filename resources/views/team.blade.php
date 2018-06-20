@extends('layouts.layout')
	@section('body')
	<div class="container-fluid">
		<div class="row content">
			<div class="col-lg-2  IAWbanner"></div>
			<div class="col-lg-8">
				<!-- aca va el contenido de la pag -->
					<div>
					<div class="container">
						<div class="row relleno"></div>
						<div class="row">
							<div class="col-5">
								<!-- ACA VA LA TABLA DE JUGADORES -->
								<div style="display: block;">
									<div class="row">
										<table class="table table-hover table-condensed border">
											<thead>
												<tr>
													<th>Equipo</th>
													<th>Jugador</th>
													<th>DNI</th>
													<th>Edad</th>
												</tr>
											</thead>
											<tbody id="table-posiciones">
												@foreach ($team->jugadores as $jugador)
												<tr>
													<td>{{$team->nombre}}</td>
													<td>
														<a>{{$jugador['nombre']}}</a>
													</td>
													<td>{{$jugador['DNI']}}</td>
													<td>{{$jugador['edad']}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>

								</div>
							</div>
							<div class="col-1"></div>
							<div class="col-6">
								<!-- ACA VAN LOS PARTIDOS -->
								<div class="row">
									<table class="table table-hover table-condensed border"
										id="table-partidos">

									</table>
								</div>
							</div>
						</div>
					</div>
				</div>




			</div>
			<div class="col-lg-2 IAWbanner"></div>
		</div>

	</div>

@endsection
