<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra la lista de productos y carga los datos necesarios para los selects.
     */
    public function index()
    {
        // Cargamos los productos con su categoría para evitar consultas lentas (N+1)
        // Además paginamos de 10 en 10 como tienes en tu interfaz
        $productos = Product::with('categoria')->latest()->paginate(10);

        // Traemos todas las categorías y proveedores para los selectores del modal
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('inventory', compact('productos', 'categorias', 'proveedores'));
    }

    /**
     * Almacena un producto recién creado en la base de datos.
     */
    public function store(Request $request)
    {
        // Validamos estrictamente según las restricciones de tus migraciones
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

        // Creamos el producto utilizando la asignación masiva del Modelo
        Product::create($validated);

        // Redireccionamos con un mensaje de éxito para mostrar en la interfaz
        return redirect()->route('inventory')->with('success', 'Producto creado exitosamente.');
    }
}