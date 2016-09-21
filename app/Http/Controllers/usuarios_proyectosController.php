<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios_proyectos;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class usuarios_proyectosController extends Controller
{
    public function guardar(Request $request){
    	$id_usuario=$request->input('id_usuario');
    	$id_proyecto=$request->input('id_proyecto');

    	//Guardar en BD

    	$nuevo = new usuarios_proyectos;
    	$nuevo->id_usuario= $id_usuario;
    	$nuevo->id_proyecto=$id_proyecto;
    	$nuevo->save();

    	return Redirect('/consultarUsuariosProyectos');

    }

    public function consultar(){
        $usuarios_proyectos=usuarios_proyectos::all();
        return view('consultarUsuariosProyectos', compact('usuarios_proyectos'));
    }

    public function eliminar($id_usuario, $id_proyecto){
        usuarios_proyectos::find($id_usuario, $id_proyecto)->delete();
        return Redirect('/consultarUsuariosProyectos');
    }

    public function actualizar($id_usuario, $id_proyecto){
        $user_proyect = usuarios_proyectos::find($id_usuario, $id_proyecto);
        return view('actualizarUsuariosProyectos', compact('user_proyect'));
    }

    public function actualizarUsuarioProyecto($id_usuario, $id_proyecto, Request $datos){
        $usuario_proyecto = usuarios_proyectos::find($id_usuario, $id_proyecto);
        $usuario_proyecto->nombre = $datos->input('nombre');
        $usuario_proyecto->edad = $datos->input('edad');
        $usuario_proyecto->sexo = $datos->input('sexo');
        $usuario_proyecto->correo = $datos->input('correo');
        $usuario_proyecto->save();

        return Redirect('/consultarUsuarios');
    }
}
