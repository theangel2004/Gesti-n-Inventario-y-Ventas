<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    // Ajustado exactamente a tu migración de clientes
    protected $fillable = [
        'nit_cc',
        'nombre_tienda',
        'nombre_contacto',
        'telefono',
        'direccion'
    ];

    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class, 'cliente_id');
    }
}