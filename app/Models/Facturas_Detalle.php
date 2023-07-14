<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas_Detalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'factura_id',
        'numeroFactura',
        'juego_id',
        'cantidad',
        'costoTotal',
    ];
}
