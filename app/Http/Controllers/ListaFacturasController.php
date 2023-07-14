<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Facturas;
use Illuminate\Http\Request;

class ListaFacturasController extends Controller
{
    public function index()
    {
        $Facturas = Facturas::select('facturas.id', 'numeroFactura', 'facturas.created_at as Fecha', 'c.nombre', 'costoTotal',)
            ->join('usuarios as c', 'c.id', '=', 'facturas.usuario_id')->get();

        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        return view('verFacturas', compact('Facturas', 'cantcompras'));
    }
}
