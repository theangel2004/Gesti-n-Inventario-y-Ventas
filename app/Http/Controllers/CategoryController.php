<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra el listado de categorías con tu diseño.
     */
    public function index()
    {
        // Trae las categorías ordenadas por las más recientes, de 10 en 10
        $categorias = Categoria::latest()->paginate(10);
        
        // El compact envía la variable '$categorias' directo a tu tabla y tarjetas
        return view('categories', compact('categorias'));
    }

    /**
     * Guarda una nueva categoría desde tu formulario modal.
     */
    public function store(Request $request)
    {
        // Validamos los campos que definiste en los inputs de tu modal
        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Crea el registro en la tabla 'categorias'
        Categoria::create($data);

        // Te regresa a la misma vista con el mensaje de éxito que lee tu alerta
        return redirect()->route('categories.index')->with('success', '¡Categoría creada exitosamente!');
    }
}