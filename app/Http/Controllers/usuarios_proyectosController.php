<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios_proyectos;
use App\proyectos;
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

    public function asignarUsuarios($id){
        $proyecto = proyectos::find($id);
        $usuarios = DB::select('
            select * 
            from usuarios 
            where id not in (select id_usuario 
                         from usuarios_proyectos   
                         where id_proyecto = ?)', [$id]);
        $usuariosP = DB::select('
            select * 
            from usuarios 
            where id in (select id_usuario 
                             from usuarios_proyectos   
                             where id_proyecto = ?)', [$id]);

        return view('asignarUsuarios', compact('proyecto', 'usuarios', 'usuariosP'));
    }

    public function agregarUsuario(Request $request, $id_proyecto){
        $id_usuario=$request->input('id_usuario');

        //Guardar en BD
        $nuevo = new usuarios_proyectos;
        $nuevo->id_usuario= $id_usuario;
        $nuevo->id_proyecto=$id_proyecto;
        $nuevo->save();

        //////
        $proyecto = proyectos::find($id_proyecto);
        $usuarios = DB::select('
            select * 
            from usuarios 
            where id not in (select id_usuario 
                         from usuarios_proyectos   
                         where id_proyecto = ?)', [$id_proyecto]);
        $usuariosP = DB::select('
            select * 
            from usuarios 
            where id in (select id_usuario 
                             from usuarios_proyectos   
                             where id_proyecto = ?)', [$id_proyecto]);

        return view('asignarUsuarios', compact('proyecto', 'usuarios', 'usuariosP'));
    }

    public function quitarUsuario($id_proyecto, $id_usuario){
        $deleted = DB::delete('
            delete from usuarios_proyectos 
            where id_proyecto = ? and id_usuario = ?', [$id_proyecto, $id_usuario]);

        //////
        $proyecto = proyectos::find($id_proyecto);
        $usuarios = DB::select('
            select * 
            from usuarios 
            where id not in (select id_usuario 
                         from usuarios_proyectos   
                         where id_proyecto = ?)', [$id_proyecto]);
        $usuariosP = DB::select('
            select * 
            from usuarios 
            where id in (select id_usuario 
                             from usuarios_proyectos   
                             where id_proyecto = ?)', [$id_proyecto]);

        return view('asignarUsuarios', compact('proyecto', 'usuarios', 'usuariosP'));
    }

}
