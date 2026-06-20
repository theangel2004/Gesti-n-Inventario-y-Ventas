<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Product;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hoy = Carbon::today();
        $inicioMes = Carbon::now()->startOfMonth();

        // 1. Métricas del Bento Grid
        // Ventas del Día (Suma del total de ventas completadas o despachadas hoy)
        $ventasHoy = Venta::whereDate('fecha_venta', $hoy)
            ->where('estado', '!=', 'cancelado')
            ->sum('total');

        // Pedidos Pendientes (Ventas con estado 'pendiente')
        $pedidosPendientes = Venta::where('estado', 'pendiente')->count();

        // Stock Crítico (Productos cuyo stock actual es menor o igual al mínimo)
        $productosBajoStock = Product::whereRaw('stock_actual <= stock_minimo')->count();

        // Clientes Nuevos (Registrados este mes)
        $clientesNuevos = Cliente::whereBetween('created_at', [$inicioMes, Carbon::now()])->count();

        // 2. Actividad Reciente (Últimas 5 ventas con su cliente asociado)
        $actividadReciente = Venta::with('cliente')
            ->orderBy('fecha_venta', 'desc')
            ->take(5)
            ->get();

        // 3. Productos Más Vendidos
        // Agrupamos por producto en la tabla detalle_ventas sumando las cantidades vendidas
        $productosMasVendidos = DB::table('detalle_ventas')
            ->join('productos', 'detalle_ventas.producto_id', '=', 'productos.id')
            ->select('productos.nombre', DB::raw('SUM(detalle_ventas.cantidad) as total_vendido'))
            ->groupBy('productos.id', 'productos.nombre')
            ->orderBy('total_vendido', 'desc')
            ->take(3) // Tomamos los 3 primeros
            ->get();

        // Encontrar el valor máximo vendido para calcular los porcentajes de la barra visual
        $maxVendido = $productosMasVendidos->first()->total_vendido ?? 1;

        return view('dashboard', compact(
            'ventasHoy', 
            'pedidosPendientes', 
            'productosBajoStock', 
            'clientesNuevos',
            'actividadReciente',
            'productosMasVendidos',
            'maxVendido'
        ));
    }
}