@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen">
    <main class="flex-1 p-margin-desktop space-y-lg max-w-[1440px]">
        
        <form action="{{ route('reportes.index') }}" method="GET" class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-md items-end">
                
                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Rango de Fechas (Desde)</label>
                    <div class="relative">
                        <input name="desde" value="{{ request('desde') }}" class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none" type="date"/>
                    </div>
                </div>

                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Rango de Fechas (Hasta)</label>
                    <div class="relative">
                        <input name="hasta" value="{{ request('hasta') }}" class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none" type="date"/>
                    </div>
                </div>

                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Cliente</label>
                    <select name="cliente_id" class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none">
                        <option value="all">Todos los clientes</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nombre_tienda }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Producto</label>
                    <select name="producto_id" class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none">
                        <option value="all">Todos los productos</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" {{ request('producto_id') == $producto->id ? 'selected' : '' }}>
                                {{ $producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-sm">
                    <button type="submit" class="flex-1 bg-primary text-on-primary py-sm rounded-lg font-label-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-xs">
                        <span class="material-symbols-outlined text-[18px]">filter_alt</span>
                        Filtrar
                    </button>
                    <a href="{{ route('reportes.index') }}" class="w-12 border border-outline text-on-surface-variant py-sm rounded-lg hover:bg-surface-container-high transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">refresh</span>
                    </a>
                </div>
            </div>
        </form>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
            
            <section class="lg:col-span-4 bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm flex flex-col h-full">
                <div class="flex justify-between items-start mb-lg">
                    <div>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Ventas por Período</h3>
                        <p class="font-label-md text-label-md text-on-surface-variant">Últimos 7 días activos</p>
                    </div>
                    <span class="material-symbols-outlined text-primary">analytics</span>
                </div>
                
                <div class="flex-1 flex flex-col justify-between">
                    <div class="space-y-md">
                        @forelse($ventasPorDia as $dia)
                            @php
                                // Calculamos dinámicamente el porcentaje del ancho de la barra
                                $porcentaje = ($dia->total_dia / $maxVentaDia) * 100;
                                // Parsear la fecha al nombre del día traducido/corto
                                $nombreDia = \Carbon\Carbon::parse($dia->fecha)->locale('es')->isoFormat('dddd');
                            @endphp
                            <div class="flex items-center justify-between">
                                <span class="font-body-md text-body-md text-on-surface-variant capitalize w-20">{{ $nombreDia }}</span>
                                <div class="flex items-center gap-md flex-1 px-sm">
                                    <div class="h-2 bg-primary rounded-full" style="width: {{ $porcentaje }}%;"></div>
                                </div>
                                <span class="font-tabular-nums text-tabular-nums font-bold">${{ number_format($dia->total_dia, 0, ',', '.') }}</span>
                            </div>
                        @empty
                            <p class="text-label-md text-on-surface-variant text-center py-4">No hay ventas registradas en la última semana.</p>
                        @endforelse
                    </div>
                    
                    <div class="mt-xl pt-md border-t border-outline-variant flex justify-between items-center">
                        <span class="font-title-md text-title-md text-primary">Total Filtrado</span>
                        <span class="font-headline-md text-headline-md font-bold text-on-surface">${{ number_format($totalPeriodo, 2, ',', '.') }}</span>
                    </div>
                </div>
            </section>

            <section class="lg:col-span-8 bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden flex flex-col">
                <div class="p-lg border-b border-outline-variant flex justify-between items-center">
                    <div>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Productos con Stock Crítico</h3>
                        <p class="font-label-md text-label-md text-on-surface-variant">Artículos por debajo o igual al punto de pedido mínimo</p>
                    </div>
                    <div class="flex items-center gap-xs px-sm py-1 bg-error-container text-on-error-container rounded-full">
                        <span class="material-symbols-outlined text-[16px]">warning</span>
                        <span class="font-label-md text-label-md">{{ $productosCriticos->count() }} Alertas</span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse zebra-stripes">
                        <thead class="bg-surface-container-low border-b border-outline-variant sticky top-0">
                            <tr>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Código</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Producto</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Stock Actual</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Mínimo</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Unidad</th>
                            </tr>
                        </thead>
                        <tbody class="text-body-md">
                            @forelse($productosCriticos as $prod)
                                <tr class="hover:bg-surface-container transition-colors border-b border-outline-variant">
                                    <td class="px-lg py-sm font-tabular-nums">#{{ $prod->codigo_barras }}</td>
                                    <td class="px-lg py-sm font-bold">{{ $prod->nombre }}</td>
                                    <td class="px-lg py-sm">
                                        <span class="text-error font-bold bg-error-container/20 px-2 py-0.5 rounded">
                                            {{ $prod->stock_actual }}
                                        </span>
                                    </td>
                                    <td class="px-lg py-sm font-tabular-nums text-on-surface-variant">{{ $prod->stock_minimo }}</td>
                                    <td class="px-lg py-sm text-label-md text-secondary">{{ $prod->unidad_medida }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-lg py-md text-center text-on-surface-variant">¡Excelente! Ningún producto está por debajo del stock mínimo.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="lg:col-span-12 bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden">
                <form action="{{ route('reportes.index') }}" method="GET" class="p-lg border-b border-outline-variant flex justify-between items-center">
                    <input type="hidden" name="desde" value="{{ request('desde') }}">
                    <input type="hidden" name="hasta" value="{{ request('hasta') }}">
                    <input type="hidden" name="cliente_id" value="{{ request('cliente_id') }}">
                    <input type="hidden" name="producto_id" value="{{ request('producto_id') }}">

                    <div>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Ventas Detalladas</h3>
                        <p class="font-label-md text-label-md text-on-surface-variant">Vista detallada de transacciones procesadas</p>
                    </div>
                    <div class="flex gap-sm">
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline text-[20px]">search</span>
                            <input name="buscar" value="{{ request('buscar') }}" class="pl-10 pr-md py-sm bg-surface-container rounded-lg text-body-md border-none focus:ring-2 focus:ring-primary outline-none" placeholder="Buscar factura o cliente..." type="text"/>
                        </div>
                    </div>
                </form>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-surface-container-low border-b border-outline-variant">
                            <tr>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Nº Factura</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Cliente</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Fecha</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Total</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Método</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="text-body-md divide-y divide-outline-variant">
                            @forelse($ventas as $venta)
                                <tr class="hover:bg-surface-container transition-colors">
                                    <td class="px-lg py-md font-tabular-nums font-bold text-primary">#{{ $venta->numero_factura }}</td>
                                    <td class="px-lg py-md">
                                        <div class="flex flex-col">
                                            <span class="font-bold">{{ $venta->cliente->nombre_tienda }}</span>
                                            <span class="text-label-md opacity-70">Contacto: {{ $venta->cliente->nombre_contacto }}</span>
                                        </div>
                                    </td>
                                    <td class="px-lg py-md font-tabular-nums">
                                        {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d M Y h:i A') }}
                                    </td>
                                    <td class="px-lg py-md font-tabular-nums font-bold text-on-surface">
                                        ${{ number_format($venta->total, 2, ',', '.') }}
                                    </td>
                                    <td class="px-lg py-md capitalize text-secondary">
                                        {{ $venta->metodo_pago }}
                                    </td>
                                    <td class="px-lg py-md">
                                        @if($venta->estado == 'despachado')
                                            <span class="px-sm py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-label-md font-bold uppercase">Despachado</span>
                                        @elseif($venta->estado == 'pendiente')
                                            <span class="px-sm py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed text-label-md font-bold uppercase">Pendiente</span>
                                        @else
                                            <span class="px-sm py-1 rounded-full bg-error-container text-on-error-container text-label-md font-bold uppercase">Cancelado</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-lg py-md text-center text-on-surface-variant">No se encontraron ventas con los filtros aplicados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-lg border-t border-outline-variant bg-surface-container-lowest">
                    {{ $ventas->links() }}
                </div>
            </section>
        </div>
    </main>
</div>
@endsection