<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios_proyectos;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

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
        $usuarios_proyectos=DB::table('usuarios_proyectos')->paginate(2);
        return view('consultarUsuariosProyectos', compact('usuarios_proyectos'));
    }

}
