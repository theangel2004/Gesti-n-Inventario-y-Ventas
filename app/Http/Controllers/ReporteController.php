<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Product;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        // 1. Cargar datos para los selectores de los filtros
        $clientes = Cliente::orderBy('nombre_tienda')->get();
        $productos = Product::orderBy('nombre')->get();

        // 2. Productos con Stock Crítico
        $productosCriticos = Product::whereRaw('stock_actual <= stock_minimo')
            ->orderBy('stock_actual', 'asc')
            ->take(10) // Limitamos a los 10 más urgentes para no saturar
            ->get();

        // 3. Consulta base para Ventas Detalladas con filtros
        $query = Venta::with(['cliente'])->orderBy('fecha_venta', 'desc');

        if ($request->filled('desde')) {
            $query->whereDate('fecha_venta', '>=', $request->desde);
        }
        if ($request->filled('hasta')) {
            $query->whereDate('fecha_venta', '<=', $request->hasta);
        }
        if ($request->filled('cliente_id') && $request->cliente_id != 'all') {
            $query->where('cliente_id', $request->cliente_id);
        }
        if ($request->filled('producto_id') && $request->producto_id != 'all') {
            $query->whereHas('detalles', function ($q) use ($request) {
                $q->where('producto_id', $request->producto_id);
            });
        }
        if ($request->filled('buscar')) {
            $query->where('numero_factura', 'LIKE', '%' . $request->buscar . '%')
                  ->orWhereHas('cliente', function($q) use ($request) {
                      $q->where('nombre_tienda', 'LIKE', '%' . $request->buscar . '%');
                  });
        }

        // Paginamos las ventas filtradas
        $ventas = $query->paginate(10)->withQueryString();

        // Calculamos el Total Acumulado del período filtrado
        $totalPeriodo = $query->sum('total');

        // 4. Ventas por Día de la Semana (Resumen de los últimos 7 días con ventas reales)
        // Agrupamos por fecha para armar el gráfico de barras nativo
        $ventasPorDia = Venta::select(
                DB::raw('DATE(fecha_venta) as fecha'),
                DB::raw('SUM(total) as total_dia')
            )
            ->where('fecha_venta', '>=', Carbon::now()->subDays(7))
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();

        // Encontrar el valor máximo vendido en un día para calcular el porcentaje de la barra de forma proporcional
        $maxVentaDia = $ventasPorDia->max('total_dia') ?: 1;

        return view('reports', compact(
            'clientes', 
            'productos', 
            'productosCriticos', 
            'ventas', 
            'totalPeriodo', 
            'ventasPorDia',
            'maxVentaDia'
        ));
    }
}