<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Compra;

class CategoriasController extends Controller
{
    public function Index()
    {
        $categorias = Categoria::get();
        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        return view('CategoriasIndex', compact('categorias', 'cantcompras'));
    }

    public function Detalle(int $id)
    {
        $categoria = Categoria::find($id);
        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        if ($categoria == null) {
            $categoria = new Categoria;
            $categoria->id = 0;
            $categoria->nombre = "";
        }

        return view("CategoriasDetalle", compact('categoria', 'cantcompras'));
    }

    public function guardar(Request $pvoRequest)
    {
        try {
            $idOld = $pvoRequest->idold;

            if ($idOld == 0) {
                $categoria = new Categoria;
                $categoria->id = $pvoRequest->id;
                $categoria->nombre = $pvoRequest->nombre;
                $categoria->save();
                $mensaje = 'Categoria actualizada';
            } else {
                $categoria = Categoria::find($pvoRequest->id);
                $categoria->nombre = $pvoRequest->nombre;
                $categoria->save();
                $mensaje = 'Categoria agregada';
            }

            return redirect()->route('Categorias.Index')->with('mensaje', $mensaje)->with('tipo', 'success');
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th)->with('tipo', 'error');
        }
    }

    public function Borrar(int $idborrar)
    {
        $categoria = Categoria::find($idborrar);

        if ($categoria != null) {
            Categoria::destroy($idborrar);
        }

        return redirect()->route('Categorias.Index');
    }
}
