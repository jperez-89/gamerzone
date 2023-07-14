<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Compra;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Index()
    {
        if (session('CodigoUsuario') == null) {
            session(['CodigoUsuario' => '']);
            session(['NombreUsuario' => '']);
            session(['RolUsuario' => 0]);
        }

        $juegos = Juego::where('stock', '>=', '1')->get();

        if (session('CodigoUsuario') !== '') {
            $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();
        } else {
            $cantcompras = ['cantcompras' => 0];
        }

        return view('home', compact('juegos', 'cantcompras'));
    }

    public function Index2(string $nombre)
    {
        if (session('CodigoUsuario') == null) {
            session(['CodigoUsuario' => '']);
            session(['NombreUsuario' => '']);
            session(['RolUsuario' => 0]);
        }
        $juegos = DB::table('juegos')->where('juegos.nombre', '=', $nombre)
            ->join('categorias', 'juegos.codigocategoria', '=', 'categorias.id')
            ->select('juegos.*', 'categorias.nombre AS categoria')
            ->get();

        if (session('CodigoUsuario') !== '') {
            $cantcompras = DB::table('compras')->where(['codigousuario' => session('CodigoUsuario')])->count();
        } else {
            $cantcompras = 0;
        }
        return view('home', compact('juegos', 'cantcompras'));
    }

    public function AgregarCarrito(Request $juego)
    {
        $result = [
            'Estado' => 1,
            'Mensaje' => '',
            'Valor' => 0
        ];
        try {
            $codigojuego = $juego->idJuego;
            $usuariolog = session('CodigoUsuario');

            $cantjuegocarrito = DB::table('compras')->where(['codigousuario' => $usuariolog, 'codigojuego' => $codigojuego, 'status' => 0])->count();

            if ($cantjuegocarrito > 0) {
                $result['Estado'] = 0;
                $result['Mensaje'] = "El juego ya fue ingresado al carrito";
                $result['Valor'] = "alerta";
                return response()->json($result);
            }

            $vloCompra = new Compra;
            $vloCompra->codigojuego = $codigojuego;
            $vloCompra->codigousuario = session('CodigoUsuario');
            $vloCompra->save();

            $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

            $result['Estado'] = 1;
            $result['Mensaje'] = "Juego agregado al carrito con exito";
            $result['Valor'] = count($cantcompras);
        } catch (\Throwable $th) {
            $result['Estado'] = 0;
            $result['Mensaje'] = "Error";
            $result['Valor'] = json_encode($th);
        }
        return response()->json($result);
    }
}
