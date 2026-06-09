@extends('layouts.app')

@section('content')
<div class="p-margin-desktop flex-grow">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-lg gap-md">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-background">Gestión de Productos</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Administra tu inventario, precios y existencias en tiempo real.</p>
        </div>
        <button class="flex items-center gap-2 bg-primary text-on-primary px-lg py-sm rounded-xl hover:shadow-lg transition-all active:scale-95 font-title-md text-title-md" onclick="toggleModal('product-modal')">
            <span class="material-symbols-outlined" data-icon="add">add</span>
            Nuevo Producto
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-lg">
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md">
            <div class="p-3 bg-primary-container/10 text-primary rounded-full">
                <span class="material-symbols-outlined" data-icon="inventory_2" data-weight="fill">inventory_2</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Total Productos</p>
                <p class="font-headline-md text-headline-md">1,248</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md">
            <div class="p-3 bg-error-container/10 text-error rounded-full">
                <span class="material-symbols-outlined" data-icon="warning" data-weight="fill">warning</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Sin Existencias</p>
                <p class="font-headline-md text-headline-md">12</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md">
            <div class="p-3 bg-secondary-container/10 text-secondary rounded-full">
                <span class="material-symbols-outlined" data-icon="low_priority" data-weight="fill">low_priority</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Stock Bajo</p>
                <p class="font-headline-md text-headline-md">45</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md">
            <div class="p-3 bg-tertiary-container/10 text-on-tertiary-container rounded-full">
                <span class="material-symbols-outlined" data-icon="trending_up" data-weight="fill">trending_up</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Nuevos (Mes)</p>
                <p class="font-headline-md text-headline-md">+38</p>
            </div>
        </div>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden flex flex-col shadow-sm">
        <div class="p-md border-b border-outline-variant flex flex-col sm:flex-row gap-md items-center justify-between">
            <div class="flex items-center gap-sm w-full sm:w-auto">
                <select class="bg-surface-container-low border-outline-variant rounded-lg text-body-md py-2 px-3 focus:ring-primary">
                    <option>Todas las Categorías</option>
                    <option>Limpieza</option>
                    <option>Alimentos</option>
                    <option>Bebidas</option>
                </select>
                <select class="bg-surface-container-low border-outline-variant rounded-lg text-body-md py-2 px-3 focus:ring-primary">
                    <option>Todos los Estados</option>
                    <option>In Stock</option>
                    <option>Low Stock</option>
                    <option>Out of Stock</option>
                </select>
            </div>
            <div class="flex items-center gap-sm">
                <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined" data-icon="filter_list">filter_list</span>
                </button>
                <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined" data-icon="download">download</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant">
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant">ID</th>
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant">Nombre</th>
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant">Categoría</th>
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant">Precio</th>
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant">Stock</th>
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant">Stock Mínimo</th>
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant">Estado</th>
                        <th class="px-md py-4 font-label-lg text-label-lg text-on-surface-variant text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    <tr class="bg-surface-container/30 font-bold group cursor-pointer" onclick="this.classList.toggle('tree-row-expanded')">
                        <td class="px-md py-3" colspan="8">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined expand-icon transition-transform text-outline" data-icon="chevron_right">chevron_right</span>
                                <span class="material-symbols-outlined text-primary" data-icon="liquor">liquor</span>
                                Bebidas y Licores <span class="ml-2 font-normal text-on-surface-variant text-label-md">(24 productos)</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-md py-3 text-on-surface-variant">#P-1024</td>
                        <td class="px-md py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-surface-container rounded flex items-center justify-center text-outline">
                                    <span class="material-symbols-outlined">image</span>
                                </div>
                                <div>
                                    <p class="font-title-md text-title-md">Agua Mineral Premium 500ml</p>
                                    <p class="text-label-md text-outline">SKU: WAT-PRE-01</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-md py-3">Bebidas</td>
                        <td class="px-md py-3 font-tabular-nums text-tabular-nums">$1.25</td>
                        <td class="px-md py-3 font-tabular-nums text-tabular-nums">450</td>
                        <td class="px-md py-3 font-tabular-nums text-tabular-nums">50</td>
                        <td class="px-md py-3">
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-tertiary-fixed-dim/20 text-on-tertiary-fixed-variant text-label-md">
                                <div class="w-1.5 h-1.5 rounded-full bg-tertiary-fixed-dim"></div>
                                In Stock
                            </div>
                        </td>
                        <td class="px-md py-3 text-right">
                            <div class="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 hover:bg-surface-container rounded-lg text-primary" title="Editar"><span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span></button>
                                <button class="p-2 hover:bg-surface-container rounded-lg text-outline" title="Ver"><span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span></button>
                                <button class="p-2 hover:bg-error-container/20 rounded-lg text-error" title="Eliminar"><span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-md py-3 text-on-surface-variant">#P-1025</td>
                        <td class="px-md py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-surface-container rounded flex items-center justify-center text-outline">
                                    <span class="material-symbols-outlined">image</span>
                                </div>
                                <div>
                                    <p class="font-title-md text-title-md">Vino Tinto Reserva 750ml</p>
                                    <p class="text-label-md text-outline">SKU: WIN-RES-02</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-md py-3">Bebidas</td>
                        <td class="px-md py-3 font-tabular-nums text-tabular-nums">$24.99</td>
                        <td class="px-md py-3 font-tabular-nums text-tabular-nums text-on-secondary-fixed-variant">15</td>
                        <td class="px-md py-3 font-tabular-nums text-tabular-nums">20</td>
                        <td class="px-md py-3">
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed-variant text-label-md">
                                <div class="w-1.5 h-1.5 rounded-full bg-secondary"></div>
                                Low Stock
                            </div>
                        </td>
                        <td class="px-md py-3 text-right">
                            <div class="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 hover:bg-surface-container rounded-lg text-primary"><span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span></button>
                                <button class="p-2 hover:bg-surface-container rounded-lg text-outline"><span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span></button>
                                <button class="p-2 hover:bg-error-container/20 rounded-lg text-error"><span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-md border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-md">
            <div class="text-label-lg text-on-surface-variant">
                Mostrando <span class="font-bold text-on-surface">1 - 10</span> de <span class="font-bold text-on-surface">1,248</span> productos
            </div>
            <div class="flex items-center gap-1">
                <button class="p-2 border border-outline-variant rounded hover:bg-surface-container disabled:opacity-30" disabled>
                    <span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
                </button>
                <button class="px-4 py-2 bg-primary text-on-primary rounded font-bold">1</button>
                <button class="px-4 py-2 hover:bg-surface-container rounded transition-colors">2</button>
                <button class="p-2 border border-outline-variant rounded hover:bg-surface-container">
                    <span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="fixed inset-0 z-50 flex items-center justify-center bg-on-background/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300" id="product-modal">
    <div class="bg-surface-container-lowest w-full max-w-2xl rounded-xl shadow-2xl scale-95 transition-transform duration-300 overflow-hidden">
        <div class="p-lg border-b border-outline-variant flex items-center justify-between">
            <h3 class="font-headline-md text-headline-md">Nuevo Producto</h3>
            <button class="p-2 hover:bg-surface-container rounded-full" onclick="toggleModal('product-modal')">
                <span class="material-symbols-outlined" data-icon="close">close</span>
            </button>
        </div>
        <div class="p-lg max-h-[716px] overflow-y-auto custom-scrollbar">
            <form class="grid grid-cols-2 gap-lg">
                <div class="col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Nombre del Producto</label>
                    <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" placeholder="Ej: Jabón Líquido Antibacterial" type="text"/>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Categoría</label>
                    <select class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary">
                        <option>Limpieza</option>
                        <option>Bebidas</option>
                        <option>Alimentos</option>
                    </select>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Código SKU</label>
                    <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" placeholder="LIM-JAB-001" type="text"/>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Precio de Venta</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-outline">$</span>
                        <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 pl-8 focus:ring-primary" step="0.01" type="number"/>
                    </div>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Stock Inicial</label>
                    <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" type="number"/>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Punto de Re-orden (Mínimo)</label>
                    <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" type="number"/>
                </div>
                <div class="col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Descripción</label>
                    <textarea class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" rows="3"></textarea>
                </div>
            </form>
        </div>
        <div class="p-lg bg-surface-container-low border-t border-outline-variant flex justify-end gap-md">
            <button class="px-6 py-2 border border-outline-variant rounded-lg font-title-md hover:bg-surface-container transition-colors" onclick="toggleModal('product-modal')">Cancelar</button>
            <button class="px-6 py-2 bg-primary text-on-primary rounded-lg font-title-md hover:shadow-lg transition-all active:scale-95">Guardar Producto</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        const content = modal.querySelector('div');
        if (modal.classList.contains('opacity-0')) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        } else {
            modal.classList.add('opacity-0', 'pointer-events-none');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
        }
    }

    // Interacción simple para desplegar categorías
    document.querySelectorAll('.cursor-pointer.bg-surface-container\\/30').forEach(row => {
        row.addEventListener('click', () => {
            const icon = row.querySelector('.expand-icon');
            if (icon.innerText === 'chevron_right') {
                icon.innerText = 'expand_more';
            } else {
                icon.innerText = 'chevron_right';
            }
            
            let next = row.nextElementSibling;
            while (next && !next.classList.contains('cursor-pointer')) {
                next.classList.toggle('hidden');
                next = next.nextElementSibling;
            }
        });
    });
</script>
@endpush