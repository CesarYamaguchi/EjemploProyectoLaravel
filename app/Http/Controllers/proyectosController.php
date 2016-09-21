<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyectos;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class proyectosController extends Controller
{
    public function guardar(Request $request){
    	$nombre=$request->input('nombre');
    	$fecha_inicio=$request->input('fecha_inicio');
    	$fecha_fin=$request->input('fecha_fin');

    	//Guardar en BD

    	$nuevo = new proyectos;
    	$nuevo->nombre= $nombre;
    	$nuevo->fecha_inicio=$fecha_inicio;
    	$nuevo->fecha_fin=$fecha_fin;
    	$nuevo->save();

    	return Redirect('/consultarProyectos');

    }

    public function consultar(){
        $proyectos=proyectos::all();
        return view('consultarProyectos', compact('proyectos'));
    }

    public function eliminar($id){
        proyectos::find($id)->delete();
        return Redirect('/consultarProyectos');
    }

    public function actualizar($id){
        $proyect = proyectos::find($id);
        return view('actualizarProyectos', compact('proyect'));
    }

    public function actualizarProyecto($id, Request $datos){
        $proyecto = proyectos::find($id);
        $proyecto->nombre = $datos->input('nombre');
        $proyecto->fecha_inicio = $datos->input('fecha_inicio');
        $proyecto->fecha_fin = $datos->input('fecha_fin');
        $proyecto->save();

        return Redirect('/consultarProyectos');
    }
}
