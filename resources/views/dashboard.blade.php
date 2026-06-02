@extends('layouts.app')

@slot('title', 'Dashboard - Distribuidora ElSurtidor')

@section('content')
<!-- Header & Quick Actions -->
<header class="flex flex-col md:flex-row justify-between items-end mb-xl gap-lg">
    <div>
        <p class="font-label-lg text-label-lg text-secondary uppercase tracking-widest mb-1">Vista General</p>
        <h2 class="font-display text-display text-on-surface">Panel de Control</h2>
    </div>
    <div class="flex gap-md">
        <button class="flex items-center gap-sm px-lg py-sm bg-surface-container-lowest border border-primary text-primary rounded-xl font-label-lg text-label-lg hover:bg-primary hover:text-on-primary transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]" data-icon="assessment">assessment</span>
            Ver Reportes
        </button>
        <button class="flex items-center gap-sm px-lg py-sm bg-surface-container-lowest border border-primary text-primary rounded-xl font-label-lg text-label-lg hover:bg-primary hover:text-on-primary transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]" data-icon="add_box">add_box</span>
            Registrar Producto
        </button>
        <button class="flex items-center gap-sm px-xl py-sm bg-primary text-on-primary rounded-xl font-label-lg text-label-lg shadow-lg hover:shadow-xl hover:bg-primary-container transition-all active:scale-95">
            <span class="material-symbols-outlined text-[20px]" data-icon="shopping_cart">shopping_cart</span>
            Nuevo Pedido
        </button>
    </div>
</header>

<!-- Metrics Bento Grid -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-xl">
    <!-- Metric: Ventas del Día -->
    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-primary bg-secondary-container p-2 rounded-lg" data-icon="payments">payments</span>
            <span class="text-tertiary font-label-md flex items-center gap-xs">
                <span class="material-symbols-outlined text-[16px]" data-icon="trending_up">trending_up</span>
                +12%
            </span>
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Ventas del Día</p>
        <h3 class="font-headline-lg text-headline-lg text-on-surface">$14,250.00</h3>
    </div>

    <!-- Metric: Pedidos Pendientes -->
    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-on-secondary-container bg-secondary-container p-2 rounded-lg" data-icon="pending_actions">pending_actions</span>
            <span class="text-secondary font-label-md">Hoy</span>
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Pedidos Pendientes</p>
        <h3 class="font-headline-lg text-headline-lg text-on-surface">24</h3>
    </div>

    <!-- Metric: Stock Crítico -->
    <div class="bg-error-container/20 border border-error/20 p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-error bg-error-container p-2 rounded-lg" data-icon="warning">warning</span>
            <span class="text-error font-label-md font-bold">ALERTA</span>
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Productos Bajo Stock</p>
        <h3 class="font-headline-lg text-headline-lg text-error">08</h3>
    </div>

    <!-- Metric: Clientes Nuevos -->
    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex flex-col gap-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-center">
            <span class="material-symbols-outlined text-primary bg-secondary-container p-2 rounded-lg" data-icon="person_add">person_add</span>
            <span class="text-secondary font-label-md">Este Mes</span>
        </div>
        <p class="font-label-md text-label-md text-on-surface-variant">Clientes Nuevos</p>
        <h3 class="font-headline-lg text-headline-lg text-on-surface">156</h3>
    </div>
</section>

<!-- Main Workspace -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
    <!-- Actividad Reciente -->
    <section class="lg:col-span-2 bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
        <div class="px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
            <h4 class="font-title-lg text-title-lg text-on-surface">Actividad Reciente</h4>
            <button class="text-primary font-label-md hover:underline">Ver todo</button>
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
                    <tr class="hover:bg-surface-container-low transition-colors group cursor-pointer">
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums text-primary font-semibold">#78921</td>
                        <td class="px-lg py-md font-body-md text-body-md">Supermercado Central</td>
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums">$2,450.00</td>
                        <td class="px-lg py-md">
                            <span class="px-sm py-xs bg-tertiary/10 text-tertiary-container rounded-full text-label-md font-bold">Completado</span>
                        </td>
                        <td class="px-lg py-md text-right">
                            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors" data-icon="chevron_right">chevron_right</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors group cursor-pointer">
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums text-primary font-semibold">#78920</td>
                        <td class="px-lg py-md font-body-md text-body-md">Mini Market Sol</td>
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums">$840.50</td>
                        <td class="px-lg py-md">
                            <span class="px-sm py-xs bg-secondary-container text-secondary rounded-full text-label-md font-bold">En Camino</span>
                        </td>
                        <td class="px-lg py-md text-right">
                            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors" data-icon="chevron_right">chevron_right</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors group cursor-pointer">
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums text-primary font-semibold">#78919</td>
                        <td class="px-lg py-md font-body-md text-body-md">Abarrotes Don Pedro</td>
                        <td class="px-lg py-md font-tabular-nums text-tabular-nums">$1,120.00</td>
                        <td class="px-lg py-md">
                            <span class="px-sm py-xs bg-error-container/30 text-error rounded-full text-label-md font-bold">Pendiente</span>
                        </td>
                        <td class="px-lg py-md text-right">
                            <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors" data-icon="chevron_right">chevron_right</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Productos Más Vendidos -->
    <section class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm flex flex-col">
        <div class="px-lg py-md border-b border-outline-variant bg-surface-container-low">
            <h4 class="font-title-lg text-title-lg text-on-surface">Productos Más Vendidos</h4>
        </div>
        <div class="p-lg flex flex-col gap-md">
            <div class="flex items-center gap-md">
                <div class="w-12 h-12 bg-surface-container-high rounded-lg flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined">liquor</span>
                </div>
                <div class="flex-1">
                    <h5 class="font-body-lg text-body-lg text-on-surface">Aceite Vegetal 1L</h5>
                    <div class="w-full bg-surface-container-highest h-2 rounded-full mt-2">
                        <div class="bg-primary h-2 rounded-full w-[85%]"></div>
                    </div>
                </div>
                <span class="font-tabular-nums text-tabular-nums text-secondary">850 uds.</span>
            </div>
            <div class="flex items-center gap-md">
                <div class="w-12 h-12 bg-surface-container-high rounded-lg flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined">breakfast_dining</span>
                </div>
                <div class="flex-1">
                    <h5 class="font-body-lg text-body-lg text-on-surface">Arroz Premium 5kg</h5>
                    <div class="w-full bg-surface-container-highest h-2 rounded-full mt-2">
                        <div class="bg-primary h-2 rounded-full w-[72%]"></div>
                    </div>
                </div>
                <span class="font-tabular-nums text-tabular-nums text-secondary">720 uds.</span>
            </div>
        </div>
        
        <div class="mt-auto p-lg bg-primary-container m-lg rounded-xl text-on-primary">
            <p class="font-label-md text-label-md mb-xs opacity-80">Insight Mensual</p>
            <h6 class="font-title-md text-title-md mb-sm">Aumento de demanda en Lácteos</h6>
            <p class="font-body-md text-body-md opacity-90 leading-snug">Se recomienda aumentar stock en la categoría de lácteos para el próximo fin de semana.</p>
        </div>
    </section>
</div>

<button class="fixed bottom-margin-desktop right-margin-desktop w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-[70] md:hidden">
    <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">add</span>
</button>
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
