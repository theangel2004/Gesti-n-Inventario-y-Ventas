<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        // Pestaña activa por defecto: 'clientes'
        $currentType = $request->query('type', 'clientes');

        // Paginación condicional según la pestaña seleccionada
        if ($currentType === 'proveedores') {
            $records = Proveedor::latest()->paginate(10);
        } else {
            $records = Cliente::latest()->paginate(10);
        }

        // Totales globales reales unificados para tus tarjetas
        $totalRegistros = Cliente::count() + Proveedor::count();
        $totalActivos = $totalRegistros; // Puedes cambiarlo si agregas columna estado
        
        // Nuevos registros en los últimos 30 días (Clientes + Proveedores)
        $nuevosTreintaDias = Cliente::where('created_at', '>=', now()->subDays(30))->count() +
                             Proveedor::where('created_at', '>=', now()->subDays(30))->count();

        return view('partners', compact(
            'records',
            'currentType',
            'totalRegistros',
            'totalActivos',
            'nuevosTreintaDias'
        ));
    }

    public function store(Request $request)
    {
        // Validamos de acuerdo a lo que envía la interfaz
        $validated = $request->validate([
            'nombre'          => 'required|string|max:255',
            'nit_fiscal'      => 'required|string|max:45', // Requerido para mapear a nit_cc
            'direccion'       => 'required|string|max:255', // Requerido en tu migración de clientes
            'telefono'        => 'required|string|max:45',
            'email'           => 'nullable|email|max:255',
            'tipo'            => 'required|in:Cliente,Proveedor',
            'contacto_nombre' => 'nullable|string|max:255',
        ]);

        if ($request->input('tipo') === 'Cliente') {
            // Mapeamos los datos del formulario a las columnas reales de tu tabla clientes
            Cliente::create([
                'nit_cc'          => $validated['nit_fiscal'],      // Tu formulario envía nit_fiscal -> va a nit_cc
                'nombre_tienda'   => $validated['nombre'],          // Tu formulario envía nombre -> va a nombre_tienda
                'nombre_contacto' => $validated['contacto_nombre'] ?? $validated['nombre'], // Si no hay contacto, usa el nombre
                'telefono'        => $validated['telefono'],
                'direccion'       => $validated['direccion'],
            ]);
            $typeParam = 'clientes';
        } else {
            Proveedor::create([
                'nombre'          => $validated['nombre'],
                'contacto_nombre' => $validated['contacto_nombre'],
                'telefono'        => $validated['telefono'],
                'email'           => $validated['email'],
                'direccion'       => $validated['direccion'],
            ]);
            $typeParam = 'proveedores';
        }

        return redirect()->route('partners.index', ['type' => $typeParam])
                         ->with('success', 'Socio de negocio registrado con éxito.');
    }

    public function update(Request $request, $id)
    {
        // Validamos con los mismos criterios que el store
        $validated = $request->validate([
            'nombre'          => 'required|string|max:255',
            'nit_fiscal'      => 'required|string|max:45',
            'direccion'       => 'required|string|max:255',
            'telefono'        => 'required|string|max:45',
            'email'           => 'nullable|email|max:255',
            'tipo'            => 'required|in:Cliente,Proveedor',
            'contacto_nombre' => 'nullable|string|max:255',
        ]);

        if ($request->input('tipo') === 'Cliente') {
            $cliente = Cliente::findOrFail($id);
            $cliente->update([
                'nit_cc'          => $validated['nit_fiscal'],
                'nombre_tienda'   => $validated['nombre'],
                'nombre_contacto' => $validated['contacto_nombre'] ?? $validated['nombre'],
                'telefono'        => $validated['telefono'],
                'direccion'       => $validated['direccion'],
            ]);
            $typeParam = 'clientes';
        } else {
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update([
                'nombre'          => $validated['nombre'],
                'contacto_nombre' => $validated['contacto_nombre'],
                'telefono'        => $validated['telefono'],
                'email'           => $validated['email'],
                'direccion'       => $validated['direccion'],
            ]);
            $typeParam = 'proveedores';
        }

        return redirect()->route('partners.index', ['type' => $typeParam])
                         ->with('success', 'Registro actualizado con éxito.');
    }

    public function destroy(Request $request, $id)
    {
        // Recibimos el tipo desde el formulario de eliminación para saber qué tabla limpiar
        $type = $request->input('tipo');

        if ($type === 'clientes') {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
        } else {
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();
        }

        return redirect()->route('partners.index', ['type' => $type])
                         ->with('success', 'Registro eliminado correctamente.');
    }
}