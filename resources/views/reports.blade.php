@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen">
    <main class="flex-1 p-margin-desktop space-y-lg max-w-[1440px]">
        <section class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-md items-end">
                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Rango de Fechas (Desde)</label>
                    <div class="relative">
                        <input class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none" type="date"/>
                    </div>
                </div>
                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Rango de Fechas (Hasta)</label>
                    <div class="relative">
                        <input class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none" type="date"/>
                    </div>
                </div>
                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Cliente</label>
                    <select class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none appearance-none">
                        <option>Todos los clientes</option>
                        <option>Supermercado Central</option>
                        <option>Logística Norte S.A.</option>
                        <option>Tienda Express</option>
                    </select>
                </div>
                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block">Producto</label>
                    <select class="w-full bg-white border border-outline px-md py-sm rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all text-body-md outline-none appearance-none">
                        <option>Todos los productos</option>
                        <option>Aceite de Girasol 1L</option>
                        <option>Arroz Premium 1kg</option>
                        <option>Harina 0000 1kg</option>
                    </select>
                </div>
                <div class="flex gap-sm">
                    <button class="flex-1 bg-primary text-on-primary py-sm rounded-lg font-label-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-xs">
                        <span class="material-symbols-outlined text-[18px]">filter_alt</span>
                        Filtrar
                    </button>
                    <button class="w-12 border border-outline text-on-surface-variant py-sm rounded-lg hover:bg-surface-container-high transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">refresh</span>
                    </button>
                </div>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
            <section class="lg:col-span-4 bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm flex flex-col h-full">
                <div class="flex justify-between items-start mb-lg">
                    <div>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Ventas por Período</h3>
                        <p class="font-label-md text-label-md text-on-surface-variant">Resumen diario acumulado</p>
                    </div>
                    <span class="material-symbols-outlined text-primary">analytics</span>
                </div>
                <div class="flex-1 flex flex-col justify-between">
                    <div class="space-y-md">
                        <div class="flex items-center justify-between">
                            <span class="font-body-md text-body-md text-on-surface-variant">Lunes</span>
                            <div class="flex items-center gap-md flex-1 px-lg">
                                <div class="h-2 bg-primary rounded-full" style="width: 75%;"></div>
                            </div>
                            <span class="font-tabular-nums text-tabular-nums font-bold">$450k</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-body-md text-body-md text-on-surface-variant">Martes</span>
                            <div class="flex items-center gap-md flex-1 px-lg">
                                <div class="h-2 bg-primary rounded-full" style="width: 90%;"></div>
                            </div>
                            <span class="font-tabular-nums text-tabular-nums font-bold">$540k</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-body-md text-body-md text-on-surface-variant">Miércoles</span>
                            <div class="flex items-center gap-md flex-1 px-lg">
                                <div class="h-2 bg-primary rounded-full" style="width: 60%;"></div>
                            </div>
                            <span class="font-tabular-nums text-tabular-nums font-bold">$320k</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-body-md text-body-md text-on-surface-variant">Jueves</span>
                            <div class="flex items-center gap-md flex-1 px-lg">
                                <div class="h-2 bg-primary rounded-full" style="width: 82%;"></div>
                            </div>
                            <span class="font-tabular-nums text-tabular-nums font-bold">$490k</span>
                        </div>
                    </div>
                    <div class="mt-xl pt-md border-t border-outline-variant flex justify-between items-center">
                        <span class="font-title-md text-title-md text-primary">Total Periodo</span>
                        <span class="font-headline-md text-headline-md font-bold text-on-surface">$1,800,000</span>
                    </div>
                </div>
            </section>

            <section class="lg:col-span-8 bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden flex flex-col">
                <div class="p-lg border-b border-outline-variant flex justify-between items-center">
                    <div>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Productos con Stock Crítico</h3>
                        <p class="font-label-md text-label-md text-on-surface-variant">Artículos por debajo del punto de pedido</p>
                    </div>
                    <div class="flex items-center gap-xs px-sm py-1 bg-error-container text-on-error-container rounded-full">
                        <span class="material-symbols-outlined text-[16px]">warning</span>
                        <span class="font-label-md text-label-md">12 Alertas</span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse zebra-stripes">
                        <thead class="bg-surface-container-low border-b border-outline-variant sticky top-0">
                            <tr>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">SKU</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Producto</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Stock Actual</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Mínimo</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-body-md">
                            <tr class="hover:bg-surface-container transition-colors border-b border-outline-variant">
                                <td class="px-lg py-sm font-tabular-nums">#ACE-1022</td>
                                <td class="px-lg py-sm">Aceite Girasol 1L Natural</td>
                                <td class="px-lg py-sm"><span class="text-error font-bold">15 units</span></td>
                                <td class="px-lg py-sm font-tabular-nums">50 units</td>
                                <td class="px-lg py-sm"><button class="text-primary hover:underline font-label-lg">Pedir Stock</button></td>
                            </tr>
                            <tr class="hover:bg-surface-container transition-colors border-b border-outline-variant">
                                <td class="px-lg py-sm font-tabular-nums">#ARR-5541</td>
                                <td class="px-lg py-sm">Arroz Grano Largo 5kg</td>
                                <td class="px-lg py-sm"><span class="text-error font-bold">8 units</span></td>
                                <td class="px-lg py-sm font-tabular-nums">25 units</td>
                                <td class="px-lg py-sm"><button class="text-primary hover:underline font-label-lg">Pedir Stock</button></td>
                            </tr>
                            <tr class="hover:bg-surface-container transition-colors">
                                <td class="px-lg py-sm font-tabular-nums">#HAR-9920</td>
                                <td class="px-lg py-sm">Harina Integral 1kg pack</td>
                                <td class="px-lg py-sm"><span class="text-error font-bold">4 units</span></td>
                                <td class="px-lg py-sm font-tabular-nums">30 units</td>
                                <td class="px-lg py-sm"><button class="text-primary hover:underline font-label-lg">Pedir Stock</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="lg:col-span-12 bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden">
                <div class="p-lg border-b border-outline-variant flex justify-between items-center">
                    <div>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Ventas Detalladas</h3>
                        <p class="font-label-md text-label-md text-on-surface-variant">Vista detallada de transacciones procesadas</p>
                    </div>
                    <div class="flex gap-sm">
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-outline text-[20px]">search</span>
                            <input class="pl-10 pr-md py-sm bg-surface-container rounded-lg text-body-md border-none focus:ring-2 focus:ring-primary outline-none" placeholder="Buscar pedido..." type="text"/>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-surface-container-low border-b border-outline-variant">
                            <tr>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">ID Pedido</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Cliente</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Fecha</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Total</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Estado</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-secondary uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-body-md divide-y divide-outline-variant">
                            <tr class="hover:bg-surface-container transition-colors">
                                <td class="px-lg py-md font-tabular-nums font-bold text-primary">#ORD-94281</td>
                                <td class="px-lg py-md">
                                    <div class="flex flex-col">
                                        <span class="font-bold">Supermercado Central</span>
                                        <span class="text-label-md opacity-70">Sect: Alimentos</span>
                                    </div>
                                </td>
                                <td class="px-lg py-md font-tabular-nums">24 Oct 2023</td>
                                <td class="px-lg py-md font-tabular-nums font-bold text-on-surface">$124,500.00</td>
                                <td class="px-lg py-md">
                                    <span class="px-sm py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-label-md font-bold uppercase">Entregado</span>
                                </td>
                                <td class="px-lg py-md">
                                    <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors">visibility</span>
                                    <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors ml-sm">more_vert</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container transition-colors">
                                <td class="px-lg py-md font-tabular-nums font-bold text-primary">#ORD-94282</td>
                                <td class="px-lg py-md">
                                    <div class="flex flex-col">
                                        <span class="font-bold">Logística Norte S.A.</span>
                                        <span class="text-label-md opacity-70">Sect: Distribución</span>
                                    </div>
                                </td>
                                <td class="px-lg py-md font-tabular-nums">24 Oct 2023</td>
                                <td class="px-lg py-md font-tabular-nums font-bold text-on-surface">$82,000.50</td>
                                <td class="px-lg py-md">
                                    <span class="px-sm py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed text-label-md font-bold uppercase">Pendiente</span>
                                </td>
                                <td class="px-lg py-md">
                                    <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors">visibility</span>
                                    <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors ml-sm">more_vert</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container transition-colors">
                                <td class="px-lg py-md font-tabular-nums font-bold text-primary">#ORD-94283</td>
                                <td class="px-lg py-md">
                                    <div class="flex flex-col">
                                        <span class="font-bold">Tienda Express</span>
                                        <span class="text-label-md opacity-70">Sect: Minorista</span>
                                    </div>
                                </td>
                                <td class="px-lg py-md font-tabular-nums">23 Oct 2023</td>
                                <td class="px-lg py-md font-tabular-nums font-bold text-on-surface">$12,400.00</td>
                                <td class="px-lg py-md">
                                    <span class="px-sm py-1 rounded-full bg-error-container text-on-error-container text-label-md font-bold uppercase">Cancelado</span>
                                </td>
                                <td class="px-lg py-md">
                                    <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors">visibility</span>
                                    <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors ml-sm">more_vert</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-lg border-t border-outline-variant flex justify-between items-center bg-surface-container-lowest">
                    <span class="font-label-md text-label-md text-on-surface-variant">Mostrando 3 de 45 registros</span>
                    <div class="flex gap-xs">
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded bg-primary text-on-primary font-label-md">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant hover:bg-surface-container transition-colors font-label-md">2</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant hover:bg-surface-container transition-colors font-label-md">3</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-outline-variant hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
@endsection