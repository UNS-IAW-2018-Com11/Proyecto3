@extends('layouts.layout')

@section('body')
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
								<th colspan="7">Fecha {{$fecha->fecha}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($fecha->partidos as $partido)
							<tr>
								<td align="left"><a>{{$partido['local']}}
								</a></td>
								<td align="center">
									@if ($partido['estado'] === "finalizado")
								({{$partido['puntosLocal']}})
									@endif
								</td>
								<td align="center"><input type="number" name="local" max="999"></td>
								<td align="center">
									@if ($partido['estado'] !== "finalizado")
										<button type="button" class="btn btn-info"
										onclick='edit("{{$partido['local']}}","{{$partido['visitante']}}","{{$fecha->torneo}}","{{$fecha->fecha}}")'> Edit</button>
									@else
										<p>Match has already ended.</p>
									@endif
								</td>
								<td align="center"><input type="number" name="visitante" max="999"></td>
								<td align="center">
									@if ($partido['estado'] === "finalizado")
									({{$partido['puntosVisitante']}})
									@endif
								</td>
								<td align="right"><a>
									{{$partido['visitante']}}</a></td>
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
@endsection

@section('scripts')
	<script src="{{asset('js/editor.js')}}"></script>
@endsection
