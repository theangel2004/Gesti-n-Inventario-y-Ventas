<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Product;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentaController extends Controller
{
    public function index()
    {
        // Traemos clientes y productos con existencias para el formulario
        $clientes = Cliente::orderBy('nombre_tienda', 'asc')->get();
        $productos = Product::where('stock_actual', '>', 0)->orderBy('nombre', 'asc')->get();

        return view('sales', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id'  => 'required|exists:clientes,id',
            'metodo_pago' => 'required|in:contado,credito',
            'productos'   => 'required|array|min:1',
            'productos.*.id'       => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            // 1. Generar número de factura único (Ej: FAC-20260618-0001)
            $fechaHoy = Carbon::now()->format('Ymd');
            $conteoHoy = Venta::whereDate('created_at', Carbon::today())->count() + 1;
            $numeroFactura = 'FAC-' . $fechaHoy . '-' . str_pad($conteoHoy, 4, '0', STR_PAD_LEFT);

            // 2. Crear la venta maestra provisional con total en 0
            $venta = Venta::create([
                'numero_factura' => $numeroFactura,
                'fecha_venta'    => Carbon::now(),
                'total'          => 0,
                'metodo_pago'    => $request->metodo_pago,
                'estado'         => 'pendiente', // Por defecto según tu migración
                'cliente_id'     => $request->cliente_id,
            ]);

            $totalVenta = 0;

            // 3. Registrar el detalle y descontar stock
            foreach ($request->productos as $item) {
                // Bloqueamos la fila del producto para evitar condiciones de carrera (Race Conditions)
                $producto = Product::lockForUpdate()->findOrFail($item['id']);

                if ($producto->stock_actual < $item['cantidad']) {
                    throw new \Exception("Stock insuficiente para el producto: {$producto->nombre}. Disponibles: {$producto->stock_actual}");
                }

                $subtotal = $producto->precio_venta * $item['cantidad'];
                $totalVenta += $subtotal;

                DetalleVenta::create([
                    'venta_id'        => $venta->id,
                    'producto_id'     => $producto->id,
                    'cantidad'        => $item['cantidad'],
                    'precio_unitario' => $producto->precio_venta,
                ]);

                // Decrementar stock de forma real
                $producto->decrement('stock_actual', $item['cantidad']);
            }

            // 4. Actualizar el total final de la factura
            $venta->update(['total' => $totalVenta]);

            DB::commit();
            return redirect()->route('sales.index')->with('success', "Venta registrada con éxito bajo la factura {$numeroFactura}.");

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
