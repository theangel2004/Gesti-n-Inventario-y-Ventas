<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra el listado de categorías con tu diseño y paginación dinámica.
     */
    public function index(Request $request)
    {
        // Captura cuántos elementos mostrar por página (por defecto 10)
        $perPage = $request->input('perPage', 10);

        // Trae las categorías ordenadas por las más recientes con paginación variable
        $categorias = Categoria::latest()->paginate($perPage)->withQueryString();
        
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

    /**
     * Actualiza la categoría existente.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria->update($data);

        return redirect()->route('categories.index')->with('success', '¡Categoría actualizada con éxito!');
    }

    /**
     * Elimina la categoría seleccionada.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categories.index')->with('success', '¡Categoría eliminada correctamente!');
    }
}