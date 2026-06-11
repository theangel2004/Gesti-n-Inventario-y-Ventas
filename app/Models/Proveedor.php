<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'contacto_nombre',
        'telefono',
        'email',
        'direccion',
    ];

    /**
     * Relación: Un proveedor tiene muchos productos.
     */
    public function productos()
    {
        return $this->hasMany(Product::class, 'proveedor_id');
    }
}
