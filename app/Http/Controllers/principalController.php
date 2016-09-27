<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios_proyectos;
use App\Http\Requests;

class principalController extends Controller
{
    public function index(){
    	return view('principal');
    }

    public function home(){
    	return view('inicio');
    }

    public function registrarUsuario(){
    	return view('registrarUsuarios');
    }

    public function registrarProyecto(){
    	return view('registrarProyectos');
    }

    public function registrarUsuarioProyecto(){
        $usuarios_proyectos=usuarios_proyectos::All();
        return view('registrarUsuariosProyectos', compact('usuarios_proyectos'));
    }
}
