<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        // Detectamos la pestaña activa mediante la URL (?type=proveedores)
        // Por defecto si no viene nada, podemos dejar 'clientes' o 'proveedores'
        $currentType = $request->query('type', 'clientes');

        // Consultamos y paginamos los proveedores reales
        $proveedores = Proveedor::latest()->paginate(10);

        // Contadores dinámicos para las tarjetas superiores (basados en proveedores)
        $totalRegistros = Proveedor::count();
        $totalActivos = Proveedor::count(); // Al no tener columna 'estado', mapea el total o activos reales
        $nuevosTreintaDias = Proveedor::where('created_at', '>=', now()->subDays(30))->count();
        
        // Si tienes un modelo de Cliente, puedes sumarlo al total general aquí:
        // $totalRegistros += \App\Models\Cliente::count();

        return view('partners', compact(
            'proveedores',
            'currentType',
            'totalRegistros',
            'totalActivos',
            'nuevosTreintaDias'
        ));
    }

    public function store(Request $request)
    {
        // Si el formulario se envía marcando "Cliente", puedes redirigir o procesar con otro modelo
        if ($request->input('tipo') === 'Cliente') {
            // Lógica alternativa para clientes si la requieres en el futuro:
            // \App\Models\Cliente::create([...]);
            return redirect()->route('partners.index', ['type' => 'clientes'])
                             ->with('success', 'Cliente registrado de forma simulada.');
        }

        // Validación estricta con los campos exactos de tu migración y modelo
        $validated = $request->validate([
            'nombre'          => 'required|string|max:255',
            'contacto_nombre' => 'nullable|string|max:255',
            'telefono'        => 'required|string|max:45', // Requerido según tu migración
            'email'           => 'nullable|email|max:255',
            'direccion'       => 'nullable|string|max:255',
        ]);

        // Creación en la base de datos utilizando asignación masiva
        Proveedor::create($validated);

        return redirect()->route('partners.index', ['type' => 'proveedores'])
                         ->with('success', '¡Proveedor registrado exitosamente!');
    }
}