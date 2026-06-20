<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Venta;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        // 1. Buscar en Productos (por nombre o código de barras)
        $productos = Product::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('codigo_barras', 'LIKE', "%{$query}%")
            ->take(5)
            ->get(['id', 'nombre', 'codigo_barras', 'precio_venta']);

        // 2. Buscar en Pedidos/Ventas (por número de factura)
        $ventas = Venta::where('numero_factura', 'LIKE', "%{$query}%")
            ->with('cliente') // Trae la relación si la tienes mapeada
            ->take(5)
            ->get();

        return response()->json([
            'productos' => $productos,
            'ventas' => $ventas
        ]);
    }
}