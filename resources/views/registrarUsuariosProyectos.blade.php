@extends('principal')

@section('encabezado')
	<h2>Asignación de Proyecto</h2>
@stop
 
@section('contenido')
	<form action="{{url('/guardarUsuarioProyecto')}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="form-group">
			<label for="id_usuario">Usuario</label>
			<input type="number" class="form-control" name="id_usuario" required>
		</div>
		<div class="form-group">
			<label for="id_proyecto">Proyecto</label>
			<input type="number" class="form-control" name="id_proyecto" required>
		</div>
		<input type="submit" class="btn btn-primary">
		<a href="{{url('/home')}}" class="btn btn-danger">Cancelar</a>
	</form>
@stop





