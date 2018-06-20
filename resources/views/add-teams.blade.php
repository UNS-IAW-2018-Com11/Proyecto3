@extends('layouts.layout')

@section('body')
	<div class="container-fluid">
		<div class="row content">
			<div class="col-lg-2  IAWbanner"></div>
			<div class="col-lg-8" id="contenido">
				<!-- CONTENIDO DE LA PAGINA -->
				<h3 id="torneo_nombre">{{$tname}}</h3>

				<ul class="list-group lista_equipos" id="lista_equipos">
					@for ($i = 0; $i < $teams; $i++)
					<li class="list-group-item d-flex justify-content-between align-items-center">Add New Team<span class="badge badge-primary badge-pill" data-toggle="modal" data-target="#mymodal">+</span></li>
					@endfor
				</ul>
				<div id="botonSave" style="padding-top: 10px" align="right">
				</div>

				<div>
					<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Team info</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>

								<div class="modal-body" id="cuerpo-modal">
									<!-- cuerpo del modal -->

									<div class="container">
										<form id="formequipo">
											<div class="form-row">
												<div class="col">
													<input class="form-control" placeholder="Team name" type="text">
												</div>
											</div>
											<hr>
										</form>
									</div>
									<div id="form-div" class="container">
										@if(count($errors)>0)
										  @foreach($errors->all() as $error)
										    <div class="alert alert-danger">
										      {{$error}}
										    </div>
										  @endforeach
										@endif

										@if(session('success'))
										  <div class="alert alert-success">
										    {{session('success')}}
										  </div>
										@endif

										@if(session('error'))
										  <div class="alert alert-danger">
										    {{session('error')}}
										  </div>
										@endif
										<form action="" id="modalForm" name="modalF">
        						{{ csrf_field() }}
											@for ($i = 0; $i < $maxp; $i++)
											<div class="jugador">
												<div class="form-row">
													<div class="col">
														<input name="fname" class="form-control" placeholder="Full name" type="text">
													</div>
													<div class="col">
														<input class="form-control" name="dni" placeholder="DNI" type="text">
													</div></div>
													<div class="form-row">
														<div class="col">
														</div>
														<div class="col">
															<input min="1" max="90" class="form-control" name="edad" placeholder="Edad" type="number">
														</div></div>
													</div>
													<hr>
													@endfor
												</form>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary" onclick=confirm_team('{{$format}}','{{$teams}}','{{$maxp}}')>Confirm</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- div de la columna 8 -->

					<div class="col-lg-2 sidenav IAWbanner"></div>
				</div>
			</div>
			<script src="{{asset('js/add-team.js')}}"></script>

@endsection
