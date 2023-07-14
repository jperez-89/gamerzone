<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroFactura',
        'usuario_id',
        'costoTotal',
        'estado',
    ];
}
