<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra la lista de productos filtrada y paginada.
     */
    public function index(Request $request)
    {
        $query = Product::with(['categoria', 'proveedor'])->latest();

        // 1. Filtro por Categoría
        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // 2. Filtro por Estado (In Stock, Low Stock, Out of Stock)
        if ($request->filled('estado')) {
            if ($request->estado === 'out_of_stock') {
                $query->where('stock_actual', '<=', 0);
            } elseif ($request->estado === 'low_stock') {
                $query->whereColumn('stock_actual', '<=', 'stock_minimo')
                      ->where('stock_actual', '>', 0);
            } elseif ($request->estado === 'in_stock') {
                $query->whereColumn('stock_actual', '>', 'stock_minimo');
            }
        }

        // 3. Filtro por término de búsqueda (opcional, si añades input de texto)
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->search . '%')
                  ->orWhere('codigo_barras', 'like', '%' . $request->search . '%');
            });
        }

        // --- ACCIÓN EXPORTAR (Botón de Descarga) ---
        if ($request->has('export') && $request->export === 'csv') {
            return $this->exportToCsv($query->get());
        }

        // Paginación manteniendo los parámetros de los filtros en la URL
        $productos = $query->paginate(10)->withQueryString();
        
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('inventory', compact('productos', 'categorias', 'proveedores'));
    }

    /**
     * Lógica complementaria para exportar el inventario actual filtrado a CSV
     */
    private function exportToCsv($productos)
    {
        $fileName = 'inventario_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['ID', 'Nombre', 'SKU', 'Categoria', 'Precio Venta', 'Stock Actual', 'Stock Minimo', 'Unidad'];

        $callback = function() use($productos, $columns) {
            $file = fopen('php://output', 'w');
            // Añadir bom para caracteres especiales en Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $columns);

            foreach ($productos as $producto) {
                fputcsv($file, [
                    $producto->id,
                    $producto->nombre,
                    $producto->codigo_barras,
                    $producto->categoria->nombre ?? 'Sin Categoria',
                    $producto->precio_venta,
                    $producto->stock_actual,
                    $producto->stock_minimo,
                    $producto->unidad_medida,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo_barras'  => 'required|string|unique:productos,codigo_barras|max:255',
            'nombre'         => 'required|string|max:255',
            'descripcion'    => 'nullable|string',
            'precio_venta'   => 'required|numeric|min:0',
            'stock_actual'   => 'required|integer|min:0',
            'stock_minimo'   => 'required|integer|min:0',
            'unidad_medida'  => 'required|string|max:255',
            'categoria_id'   => 'required|exists:categorias,id',
            'proveedor_id'   => 'required|exists:proveedores,id',
        ]);

        Product::create($validated);
        return redirect()->route('inventory')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $producto = Product::with(['categoria', 'proveedor'])->findOrFail($id);
        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);

        $validated = $request->validate([
            'codigo_barras'  => 'required|string|max:255|unique:productos,codigo_barras,' . $id,
            'nombre'         => 'required|string|max:255',
            'descripcion'    => 'nullable|string',
            'precio_venta'   => 'required|numeric|min:0',
            'stock_actual'   => 'required|integer|min:0',
            'stock_minimo'   => 'required|integer|min:0',
            'unidad_medida'  => 'required|string|max:255',
            'categoria_id'   => 'required|exists:categorias,id',
            'proveedor_id'   => 'required|exists:proveedores,id',
        ]);

        $producto->update($validated);
        return redirect()->route('inventory')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect()->route('inventory')->with('success', 'Producto eliminado exitosamente.');
    }
}