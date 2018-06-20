@extends('layouts.layout')
@section('body')
	<div class="container-fluid">
		<div class="row content">
			<div class="col  IAWbanner"></div>
			<div class="col-8" id="wrapper">
				<!-- aca va el contenido de la pag -->
				<div class="row" style="border-collapse: separate; border-spacing: 15px;">
				<div class="card col 8" style="width: 18rem;" id="first">
					<img class="card-img-top" src="images/silueta.png	"
						alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" align="center">Franco Peratta</h5>
						<p class="card-text" align="center">franco.peratta@outlook.com</p>
						<p class="card-text" align="center">Tel: +54 2914628934</p>
					</div>
				</div>
				<div class="col 1"></div>
				<div class="card col 8" style="width: 18rem;" style="display: inline-block" id="second">
					<img class="card-img-top" src="images/silueta.png"
						alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" align="center">Joaquín Piersigilli</h5>
						<p class="card-text" align="center">joaquin.piersigilli@gmail.com</p>
						<p class="card-text" align="center">Tel: -</p>
					</div>
				</div>
			</div>

			</div>
			<div class="col sidenav IAWbanner"></div>
		</div>

	</div>

@endsection
