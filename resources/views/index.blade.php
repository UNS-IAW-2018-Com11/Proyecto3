@extends('layouts.layout')

@section('body')
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

	@endsection
