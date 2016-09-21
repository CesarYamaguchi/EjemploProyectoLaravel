@extends('principal')

@section('encabezado')
	<h2>Actualizar Proyecto</h2>
@stop

@section('contenido')
	<form action="{{url('/actualizarProyect')}}/{{$proyect->id}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre" required value="{{$proyect->nombre}}">
		</div>
		<div class="form-group">
			<label for="fecha_inicio">Inicio</label>
			<input type="date" class="form-control" name="fecha_inicio" required value="{{$proyect->fecha_inicio}}">
		</div>
		<div class="form-group">
			<label for="fecha_fin">Fin</label>
			<input type="date" class="form-control" name="fecha_fin" required value="{{$proyect->fecha_fin}}">
		</div>
		<input type="submit" class="btn btn-primary" value="Actualizar">
		<a href="{{url('/consultarProyectos')}}" class="btn btn-danger">Cancelar</a>
	</form>
@stop





