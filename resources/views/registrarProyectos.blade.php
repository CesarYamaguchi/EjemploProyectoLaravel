@extends('principal')

@section('encabezado')
	<h2>Resgitar Proyecto</h2>
@stop

@section('contenido')
	<form action="{{url('/guardarProyecto')}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre" required>
		</div>
		<div class="form-group">
			<label for="fecha_inicio">Inicio</label>
			<input type="date" class="form-control" name="fecha_inicio" required>
		</div>
		<div class="form-group">
			<label for="fecha_fin">Fin</label>
			<input type="date" class="form-control" name="fecha_fin" required>
		</div>
		<input type="submit" class="btn btn-primary">
		<a href="{{url('/home')}}" class="btn btn-danger">Cancelar</a>
	</form>
@stop





