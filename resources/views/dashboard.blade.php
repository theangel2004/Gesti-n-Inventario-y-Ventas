@extends('layouts.app')

@slot('title', 'Dashboard - Distribuidora ElSurtidor')

@section('content')
<header class="flex flex-col md:flex-row justify-between items-end mb-xl gap-lg">
    <div>
        <p class="font-label-lg text-label-lg text-secondary uppercase tracking-widest mb-1">Vista General</p>
        <h2 class="font-display text-display text-on-surface">Panel de Control</h2>
    </div>
    <div class="flex gap-md">
        <a href="{{ route('reportes.index') }}" class="flex items-center gap-sm px-lg py-sm bg-surface-container-lowest border border-primary text-primary rounded-xl font-label-lg text-label-lg hover:bg-primary hover:text-on-primary transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]" data-icon="assessment">assessment</span>
            Ver Reportes
        </a>
        <a href="{{ route('inventory') }}" class="flex items-center gap-sm px-lg py-sm bg-surface-container-lowest border border-primary text-primary rounded-xl font-label-lg text-label-lg hover:bg-primary hover:text-on-primary transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]" data-icon="add_box">add_box</span>
            Registrar Producto
        </a>
        <a href="{{ route('sales.index') }}" class="flex items-center gap-sm px-xl py-sm bg-primary text-on-primary rounded-xl font-label-lg text-label-lg shadow-lg hover:shadow-xl hover:bg-primary-container transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]" data-icon="shopping_cart">shopping_cart</span>
            Nuevo Pedido
        </a>
    </div>
</header>

<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-xl">
    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-primary bg-secondary-container p-2 rounded-lg" data-icon="payments">payments</span>
            <span class="text-tertiary font-label-md flex items-center gap-xs">
                <span class="material-symbols-outlined text-[16px]" data-icon="trending_up">trending_up</span>
                Hoy
            </span>
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Ventas del Día</p>
        <h3 class="font-headline-lg text-headline-lg text-on-surface">${{ number_format($ventasHoy, 2) }}</h3>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-on-secondary-container bg-secondary-container p-2 rounded-lg" data-icon="pending_actions">pending_actions</span>
            <span class="text-secondary font-label-md">Por Despachar</span>
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Pedidos Pendientes</p>
        <h3 class="font-headline-lg text-headline-lg text-on-surface">{{ str_pad($pedidosPendientes, 2, '0', STR_PAD_LEFT) }}</h3>
    </div>

    <div class="bg-error-container/20 border border-error/20 p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-error bg-error-container p-2 rounded-lg" data-icon="warning">warning</span>
            @if($productosBajoStock > 0)
                <span class="text-error font-label-md font-bold">ALERTA</span>
            @else
                <span class="text-success font-label-md font-bold">OK</span>
            @endif
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Productos Bajo Stock</p>
        <h3 class="font-headline-lg text-headline-lg text-error">{{ str_pad($productosBajoStock, 2, '0', STR_PAD_LEFT) }}</h3>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-primary bg-secondary-container p-2 rounded-lg" data-icon="person_add">person_add</span>
            <span class="text-secondary font-label-md">Este Mes</span>
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Clientes Nuevos</p>
        <h3 class="font-headline-lg text-headline-lg text-on-surface">{{ $clientesNuevos }}</h3>
    </div>
</section>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
    <section class="lg:col-span-2 bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
        <div class="px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
            <h4 class="font-title-lg text-title-lg text-on-surface">Actividad Reciente</h4>
            <a href="{{ route('sales.index') }}" class="text-primary font-label-md hover:underline">Ver todo</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant uppercase tracking-wider">Orden</th>
                        <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant uppercase tracking-wider">Cliente</th>
                        <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant uppercase tracking-wider">Total</th>
                        <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant uppercase tracking-wider">Estado</th>
                        <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    @forelse($actividadReciente as $venta)
                    <tr onclick="window.location='{{ route('sales.index') }}'" class="hover:bg-surface-container-low transition-colors group cursor-pointer">
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums text-primary font-semibold">#{{ $venta->numero_factura }}</td>
                        <td class="px-lg py-md font-body-md text-body-md">{{ $venta->cliente->nombre_tienda }}</td>
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums">${{ number_format($venta->total, 2) }}</td>
                        <td class="px-lg py-md">
                            @if($venta->estado == 'despachado')
                                <span class="px-sm py-xs bg-tertiary/10 text-tertiary-container rounded-full text-label-md font-bold">Despachado</span>
                            @elseif($venta->estado == 'pendiente')
                                <span class="px-sm py-xs bg-error-container/30 text-error rounded-full text-label-md font-bold">Pendiente</span>
                            @else
                                <span class="px-sm py-xs bg-outline-variant text-on-surface-variant rounded-full text-label-md font-bold">Cancelado</span>
                            @endif
                        </td>
                        <td class="px-lg py-md text-right">
                            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors" data-icon="chevron_right">chevron_right</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-lg py-md text-center text-on-surface-variant">No se han registrado ventas recientemente.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm flex flex-col">
        <div class="px-lg py-md border-b border-outline-variant bg-surface-container-low">
            <h4 class="font-title-lg text-title-lg text-on-surface">Productos Más Vendidos</h4>
        </div>
        <div class="p-lg flex flex-col gap-md">
            @forelse($productosMasVendidos as $prod)
                @php
                    // Calcular el porcentaje dinámico de la barra según el producto con mayor venta
                    $porcentaje = ($prod->total_vendido / $maxVendido) * 100;
                @endphp
                <div class="flex items-center gap-md">
                    <div class="w-12 h-12 bg-surface-container-high rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">box</span>
                    </div>
                    <div class="flex-1">
                        <h5 class="font-body-lg text-body-lg text-on-surface">{{ $prod->nombre }}</h5>
                        <div class="w-full bg-surface-container-highest h-2 rounded-full mt-2">
                            <div class="bg-primary h-2 rounded-full" style="width: {{ $porcentaje }}%"></div>
                        </div>
                    </div>
                    <span class="font-tabular-nums text-tabular-nums text-secondary">{{ (int)$prod->total_vendido }} uds.</span>
                </div>
            @empty
                <p class="text-center text-on-surface-variant">No hay datos suficientes todavía.</p>
            @endforelse
        </div>
        
        <div class="mt-auto p-lg bg-primary-container m-lg rounded-xl text-on-primary">
            <p class="font-label-md text-label-md mb-xs opacity-80">Alerta de Inventario</p>
            @if($productosBajoStock > 0)
                <h6 class="font-title-md text-title-md mb-sm">Atención inmediata requerida</h6>
                <p class="font-body-md text-body-md opacity-90 leading-snug">Tienes {{ $productosBajoStock }} productos al borde o por debajo del stock mínimo. Te aconsejamos revisar el módulo de inventario.</p>
            @else
                <h6 class="font-title-md text-title-md mb-sm">¡Inventario saludable!</h6>
                <p class="font-body-md text-body-md opacity-90 leading-snug">Todos tus productos cuentan actualmente con existencias óptimas en relación a sus mínimos definidos.</p>
            @endif
        </div>
    </section>
</div>

<a href="{{ route('sales.index') }}" class="fixed bottom-margin-desktop right-margin-desktop w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-[70] md:hidden">
    <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">add</span>
</a>
@endsection

@push('scripts')
<script>
    // Microinteracción para filas
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('click', () => {
            row.classList.add('bg-primary/5');
            setTimeout(() => row.classList.remove('bg-primary/5'), 300);
        });
    });
</script>
@endpush