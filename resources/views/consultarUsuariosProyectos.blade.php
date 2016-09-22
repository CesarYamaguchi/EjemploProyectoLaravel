
@extends('principal')

@section('encabezado')
	<h2>Consultar relación de usuarios con proyectos</h2>
@stop

@section('contenido')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Proyecto</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios_proyectos as $up)
				<tr> 
					<td>{{$up->id_usuario}}</td>
					<td>{{$up->id_proyecto}}</td>
					<td>
						<a href="{{url('/actualizarUsuario')}}/{{$up->id_usuario, $up->id_proyecto}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true">Editar</span></a>

						<a href="{{url('/eliminarUsuario')}}/{{$up->id_usuario, $up->id_proyecto}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true">Eliminar</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $usuarios_proyectos !!}
@stop








