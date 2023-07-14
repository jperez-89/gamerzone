<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function Index()
    {
        $roles = Rol::get();
        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        return view('RolIndex', compact('roles', 'cantcompras'));
    }

    public function Detalle(int $id)
    {
        $rol = Rol::find($id);
        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        if ($rol == null) {
            $rol = new Rol;
            $rol->id = 0;
            $rol->nombre = "";
        }
        return view("RolDetalle", compact('rol', 'cantcompras'));
    }

    public function Guardar(Request $request)
    {
        try {
            $idOld = $request->idold;

            if ($idOld == 0) {
                $rol = new Rol;
                $rol->id = $request->id;
                $rol->nombre = $request->nombre;
                $rol->save();
                $mensaje = 'Rol agregado';
            } else {
                $rol = Rol::find($request->id);
                $rol->nombre = $rol->nombre;
                $rol->save();
                $mensaje = 'Rol actualizado';
            }

            return redirect()->route('Rol.Index')->with('mensaje', $mensaje)->with('tipo', 'success');
        } catch (\Throwable $th) {
            return redirect()->route('Rol.Index')->with('mensaje', $th)->with('tipo', 'error');
        }
    }

    public function Borrar(int $idborrar)
    {
        $rol = Rol::destroy($idborrar);

        if ($rol) {
            return back()->with('mensaje', 'Rol eliminado con éxito')->with('tipo', 'success');
        } else {
            return back()->with('mensaje', 'Rol no se puede eliminar')->with('tipo', 'warning');
        }
    }
}
