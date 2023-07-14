<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogueoController extends Controller
{
    public function index()
    {
        session(['CodigoUsuario' => '']);
        session(['NombreUsuario' => '']);
        session(['RolUsuario' => 0]);
        $invalid = "";

        return view('logueo.index', compact('invalid'));
    }

    public function store(Request $usuario)
    {
        $email = $usuario->email;
        $contrasena = base64_encode($usuario->contrasena);

        $login = DB::table('usuarios')->where(['id' => $email, 'contrasena' => $contrasena])->first();

        if (!empty($login)) {
            session(['CodigoUsuario' => $login->id]);
            session(['NombreUsuario' => $login->nombre]);
            session(['RolUsuario' => $login->codigorol]);

            return redirect()->route('Home.Index')->with('mensaje', 'Bienvenido ' . $login->nombre)->with('tipo', 'success');
        }

        $invalid = "Usuario o contraseña no validos";
        return redirect()->route('logueo.index', compact('invalid'));
    }
}
