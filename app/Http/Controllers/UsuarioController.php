<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Juego;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function Index()
    {
        $usuarios = DB::table('usuarios')
            ->join('rols', 'usuarios.codigorol', '=', 'rols.id')
            ->select('usuarios.*', 'rols.nombre AS rol')
            ->get();

        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        return view('UsuariosIndex', compact('usuarios', 'cantcompras'));
    }

    public function Nuevo()
    {
        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        return view('UsuariosCreate', compact('cantcompras'));
    }

    public function Detalle(string $correo)
    {
        $usuario = Usuario::find($correo);
        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        $roles = Rol::get();

        if ($usuario == null) {
            $usuario = new Usuario;
            $usuario->id = "";
            $usuario->nombre = "";
            $usuario->contrasena = "";
            $usuario->codigorol = 0;
        }

        return view("UsuariosDetalle", compact('usuario', 'roles', 'cantcompras'));
    }

    public function Borrar(string $idborrar)
    {
        $usuario = Usuario::destroy($idborrar);

        if ($usuario) {
            return back()->with('mensaje', 'Usuario eliminado con éxito')->with('tipo', 'success');
        } else {
            return back()->with('mensaje', 'Usuario no se puede eliminar')->with('tipo', 'warning');
        }
    }

    public function Registro(Request $pvoRequest)
    {
        try {
            $pass1 = $pvoRequest->contrasena;
            $pass2 = $pvoRequest->confirmpass;

            if ($pass1 !== $pass2) {
                session(['CodigoUsuario' => '']);
                session(['NombreUsuario' => '']);
                session(['RolUsuario' => 0]);
                $invalid = "La contraseña y la confirmacion deben ser iguales";

                return view('Registro', compact('invalid'));
            }

            $usuario = new Usuario;
            $usuario->id = $pvoRequest->correo;
            $usuario->nombre = $pvoRequest->nombre;
            $usuario->contrasena = base64_encode($pvoRequest->contrasena);
            $usuario->codigorol = (int)2; //VISITANTE
            $usuario->save();

            $login = Usuario::find($pvoRequest->correo);

            session(['CodigoUsuario' => $login->id]);
            session(['NombreUsuario' => $login->nombre]);
            session(['RolUsuario' => $login->codigorol]);

            return redirect()->route('Home.Index');
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
