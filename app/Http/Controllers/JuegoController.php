<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Categoria;
use App\Models\Compra;

class JuegoController extends Controller
{
    public function Index()
    {
        $juegos = Juego::select('juegos.*', 'categorias.nombre AS categoria')->join('categorias', 'juegos.codigocategoria', '=', 'categorias.id')->get();

        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        return view('JuegosIndex', compact('juegos', 'cantcompras'));
    }

    public function Index3()
    {
        $nomJuego = 'crash';
        $juegos = Juego::get();

        return view('JuegosIndex', compact('juegos'));
    }

    public function Detalle(int $id)
    {
        $juego = Juego::find($id);
        $categorias = Categoria::get();
        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        if ($juego == null) {
            $juego = new Juego;
            $juego->id = 0;
            $juego->nombre = "";
            $juego->descripcion = "";
            $juego->precio = 0;
            $juego->stock = 0;
            $juego->rutafoto = "";
        }

        return view("JuegosDetalle", compact('juego', 'categorias', 'cantcompras'));
    }

    public function Guardar(Request $pvoRequest)
    {
        try {
            $idOld = $pvoRequest->idold;
            $urlfoto = "";
            $file = $pvoRequest->file('foto');

            if ($file != null) {
                $destino = "juegos/";
                $filename = "Juego_id_" . $pvoRequest->id . "." . $pvoRequest->foto->extension();
                $urlfoto = $pvoRequest->foto->storeAs($destino, $filename);
            }

            if ($idOld == 0) {
                $juego = new Juego;

                $juego->id = $pvoRequest->id;
                $juego->nombre = $pvoRequest->nombre;
                $juego->codigocategoria = $pvoRequest->codigocategoria;
                $juego->descripcion = $pvoRequest->descripcion;
                $juego->precio = $pvoRequest->precio;
                $juego->stock = $pvoRequest->stock;
                $juego->rutafoto = $destino . $filename;

                $message = 'Juego agregado';

                $juego->save();
            } else {
                $juego = juego::find($pvoRequest->id);

                $juego->nombre = $pvoRequest->nombre;
                $juego->codigocategoria = $pvoRequest->codigocategoria;
                $juego->descripcion = $pvoRequest->descripcion;
                $juego->precio = $pvoRequest->precio;
                $juego->stock = $pvoRequest->stock;
                $juego->rutafoto = ($urlfoto == "" ? $juego->rutafoto : $destino . $filename);

                $message = 'Juego actualizado';

                $juego->save();
            }

            return redirect()->route('Juegos.Index')->with('mensaje', $message)->with('tipo', 'success');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function Borrar(int $idborrar)
    {
        $juego = Juego::find($idborrar);

        if ($juego != null) {
            $image_path = 'images/' . $juego->rutafoto;

            if (file_exists($image_path)) {
                @unlink($image_path);

                Juego::destroy($idborrar);

                return redirect()->route('Juegos.Index')->with('mensaje', 'Juego eliminado')->with('tipo', 'success');
            } else {
                return redirect()->route('Juegos.Index')->with('mensaje', 'Juego no eliminado')->with('tipo', 'warning');
            }
        }
    }
}
