@extends('layouts.layout')

@section('body')
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
			<!-- Aca va la parte de agregar usuarios editores-->
			<div class="container-fluid">

				@if(Session::has('message'))
					<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif

			@foreach ($torneos as $torneo)
				<h2>{{$torneo->nombre}}</h2>

				@if (!empty($usuarios))
					<div>
						<form method="POST" action="{{route('addEditors')}}">
							@csrf
						<select name="user" onchange="this.form.submit();" id="select1">
							<option selected="selected">Select editor</option>
							@foreach ($usuarios as $usuario)
								<option>{{$usuario->email}}</option>
							@endforeach
						</select>
						<input type="hidden" name="torneo" value='{{$torneo->nombre}}' />
					</form>
					</div>
				@endif


				<hr>
			@endforeach
		</div><!-- end div de torneos -->
	</div>
	<!-- div de la columna 8 -->
	<div class="col-lg-2 sidenav IAWbanner"></div>
</div>
</div>

@endsection


@section('scripts')
 	<script src="{{asset('js/admin.js')}}"></script>
@endsection
