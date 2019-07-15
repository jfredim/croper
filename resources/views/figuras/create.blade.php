@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			@if(Session::has('success'))
			<div class="alert alert-success">
				{{Session::get('success')}}
			</div>
			@endif

			@if(Session::has('no_success'))
			<div class="alert alert-info">
				{{Session::get('no_success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nueva Figura</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('figuras.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre de la Figura">
									</div>
								</div>
								
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									   <select name="tipo_subtipo"  id="tipo_subtipo" class="form-control input-sm">                                        <option value=""> --Seleccione el Tipo y Subtipo -- </option> 
									       @foreach ($subtipos as $subtipo)
									            <option value="{{$subtipo['Tipo'].' '.$subtipo['Nombre'] }}"> {{ $subtipo['Tipo'].' '.$subtipo['Nombre'] }} </option>
									       @endforeach       
									   </select>
									</div>
								</div>
								
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									   <select name="color"  id="color" class="form-control input-sm">                                        		<option value=""> --Seleccione el Color -- </option> 
                                    		<option value="Amarillo">Amarillo</option> 
                                    		<option value="Azul">Azul</option> 
                                    		<option value="Rojo">Rojo</option> 
                                    		<option value="Verde">Verde</option> 
									   </select>
									
									
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="perimetro" id="perimetro" class="form-control input-sm" placeholder="Perimetro de la Figura">
									</div>
								</div>

							</div>

								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="lado" id="lado"  class="form-control input-sm" placeholder="Medica de un Lado">				
									</div>
								</div>

							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('figuras.index') }}" class="btn btn-info btn-block" >Atras</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>	
	@endsection