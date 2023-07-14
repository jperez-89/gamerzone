<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Compra;
use App\Models\Facturas;
use App\Models\Facturas_Detalle;
use Barryvdh\DomPDF\Facade\Pdf;

class CompraController extends Controller
{
    public function Checkout()
    {
        $compras = Compra::select('compras.id', 'juegos.nombre as juego', 'categorias.nombre', 'juegos.precio', 'juegos.rutafoto')
            ->join('juegos', 'juegos.id', '=', 'compras.codigojuego')
            ->join('categorias', 'categorias.id', '=', 'juegos.codigocategoria')
            ->where('compras.codigousuario', session('CodigoUsuario'))->where('status', false)->get();

        $cantcompras = Compra::where('codigousuario', session('CodigoUsuario'))->where('status', 0)->get();

        return view('Checkout', compact('compras', 'cantcompras'));
    }

    public function BorrarCompra(Request $Compra)
    {
        $compra = Compra::destroy($Compra->idCompra);

        if ($compra) {
            return back()->with('mensaje', 'Juego eliminado con éxito del carrito de compras')->with('tipo', 'success');
        } else {
            return back()->with('mensaje', 'Juego no se puede eliminar del carrito de compras')->with('tipo', 'warning');
        }
    }

    public function ProcesarCompra(string $correo)
    {
        $total = 0;
        $compras = Compra::select('compras.codigojuego', 'juegos.nombre as juego', 'juegos.precio', 'u.id as usuario_id', 'u.nombre as nombreUsuario')
            ->join('juegos', 'juegos.id', '=', 'compras.codigojuego')
            ->join('usuarios as u', 'u.id', '=', 'compras.codigousuario')
            ->where('compras.codigousuario', $correo)->where('status', false)->get();

        for ($i = 0; $i < count($compras); $i++) {
            $total += $compras[$i]->precio;
        }

        $idFactura = Facturas::select('id')->orderBy('id', 'desc')->first();

        if ($idFactura == null) {
            $nFact = 'F_01';
        } else {
            $nFact =  'F_0' . ($idFactura->id + 1);
        }

        $factura = new Facturas;
        $factura->numeroFactura = $nFact;
        $factura->usuario_id = $compras[0]->usuario_id;
        $factura->costoTotal = $total;
        $factura->estado = 1;

        $cont = 0;
        if ($factura->save()) {
            for ($i = 0; $i < count($compras); $i++) {

                $detalleFactura = new Facturas_Detalle;

                $detalleFactura->factura_id = $factura->id;
                $detalleFactura->numeroFactura = $nFact;
                $detalleFactura->juego_id = $compras[$i]->codigojuego;
                $detalleFactura->cantidad = 1;
                $detalleFactura->costoTotal = $compras[$i]->precio * 1;

                $cont = $i;
                $detalleFactura->save();

                $juego = Juego::findOrFail($compras[$i]->codigojuego);
                $juego->stock = $juego->stock - 1;
                $juego->save();
            }
        } else {
            return redirect()->route('Compra.Checkout')->with('mensaje', 'No se guardo en base de datos la factura')->with('tipo', 'warning');
        }

        if ($cont = 0) {
            return redirect()->route('Compra.Checkout')->with('mensaje', 'No se pudo procesar el pedido')->with('tipo', 'warning');
        } else {
            if (self::updateStatus($correo, true)) {
                $viewPDF = PDF::loadView('factura', compact('compras', 'total', 'factura', 'nFact'));

                $savePDF = PDF::loadView('factura', compact('compras', 'total', 'factura', 'nFact'))->save(public_path('facturas_pdf/') . $nFact . '.pdf');

                if ($savePDF) {
                    session()->flash('mensaje', 'Factura Generada');
                    session()->flash('tipo', 'success');

                    return $viewPDF->stream();
                } else {
                    return redirect()->route('Compra.Checkout')->with('mensaje', 'No se guardo el pdf')->with('tipo', 'warning');
                }
            } else {
                return redirect()->route('Compra.Checkout')->with('mensaje', 'No se actualizo status en tabla compras')->with('tipo', 'warning');
            }
        }
    }

    public function updateStatus(string $correo, bool $status)
    {
        return Compra::where('codigousuario', $correo)->where('status', false)->update(['status' => $status]);
    }
}
