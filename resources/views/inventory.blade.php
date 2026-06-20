@extends('layouts.app')

@section('content')
<div class="p-margin-desktop flex-grow">
    {{-- ALERTAS DE ÉXITO O ERRORES DE VALIDACIÓN --}}
    @if(session('success'))
        <div class="mb-lg p-4 bg-tertiary-fixed-dim/20 text-on-tertiary-fixed-variant border border-outline-variant rounded-xl flex items-center gap-2 font-title-md">
            <span class="material-symbols-outlined text-tertiary">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-lg p-4 bg-error-container/20 text-error border border-outline-variant rounded-xl flex flex-col gap-1 font-body-md">
            <div class="flex items-center gap-2 font-title-md mb-1">
                <span class="material-symbols-outlined">error</span>
                <span>Por favor corrige los siguientes errores:</span>
            </div>
            <ul class="list-disc list-inside pl-2 text-label-lg">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-lg gap-md">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-background">Gestión de Productos</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Administra tu inventario, precios y existencias en tiempo real.</p>
        </div>
        <button class="flex items-center gap-2 bg-primary text-on-primary px-lg py-sm rounded-xl hover:shadow-lg transition-all active:scale-95 font-title-md text-title-md" onclick="toggleModal('product-modal')">
            <span class="material-symbols-outlined">add</span>
            Nuevo Producto
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-lg">
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md shadow-sm">
            <div class="p-3 bg-primary-container/10 text-primary rounded-full">
                <span class="material-symbols-outlined">inventory_2</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Total Productos</p>
                <p class="font-headline-md text-headline-md">{{ $productos->total() }}</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md shadow-sm">
            <div class="p-3 bg-error-container/10 text-error rounded-full">
                <span class="material-symbols-outlined">warning</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Sin Existencias</p>
                <p class="font-headline-md text-headline-md">12</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md shadow-sm">
            <div class="p-3 bg-secondary-container/10 text-secondary rounded-full">
                <span class="material-symbols-outlined">low_priority</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Stock Bajo</p>
                <p class="font-headline-md text-headline-md">45</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl flex items-center gap-md shadow-sm">
            <div class="p-3 bg-tertiary-container/10 text-on-tertiary-container rounded-full">
                <span class="material-symbols-outlined">trending_up</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant">Nuevos (Mes)</p>
                <p class="font-headline-md text-headline-md">+38</p>
            </div>
        </div>
    </div>

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden flex flex-col shadow-sm">
        
        {{-- FILTROS DE LOS BORDES (ARRIBA DE LA TABLA) CONFIGURADOS --}}
        <form action="{{ route('inventory') }}" method="GET" id="filter-form" class="p-md border-b border-outline-variant flex flex-col sm:flex-row gap-md items-center justify-between">
            <div class="flex flex-wrap items-center gap-sm w-full sm:w-auto">
                {{-- Búsqueda de texto (Opcional por si tienes input de búsqueda) --}}
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar producto..." class="bg-surface-container-low border border-outline-variant rounded-lg text-body-md py-2 px-3 focus:ring-primary outline-none max-w-xs">

                {{-- Selector de Categorías Funcional --}}
                <select name="categoria_id" onchange="document.getElementById('filter-form').submit();" class="bg-surface-container-low border border-outline-variant rounded-lg text-body-md py-2 px-3 focus:ring-primary outline-none">
                    <option value="">Todas las Categorías</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>

                {{-- Selector de Estados Funcional --}}
                <select name="estado" onchange="document.getElementById('filter-form').submit();" class="bg-surface-container-low border border-outline-variant rounded-lg text-body-md py-2 px-3 focus:ring-primary outline-none">
                    <option value="">Todos los Estados</option>
                    <option value="in_stock" {{ request('estado') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                    <option value="low_stock" {{ request('estado') == 'low_stock' ? 'selected' : '' }}>Low Stock</option>
                    <option value="out_of_stock" {{ request('estado') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                </select>
            </div>
            
            <div class="flex items-center gap-sm ms-auto sm:ms-0">
                {{-- Botón de Filtrar / Limpiar Filtros --}}
                @if(request()->filled('categoria_id') || request()->filled('estado') || request()->filled('search'))
                    <a href="{{ route('inventory') }}" class="p-2 border border-error text-error rounded-lg hover:bg-error/10 transition-colors flex items-center gap-1 text-sm font-bold" title="Limpiar Filtros">
                        <span class="material-symbols-outlined text-[18px]">filter_alt_off</span> Limpiar
                    </a>
                @endif
                <button type="submit" class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors" title="Aplicar Filtros Directos">
                    <span class="material-symbols-outlined">filter_list</span>
                </button>
                
                {{-- Botón de Descargar Excel/CSV Funcional --}}
                <button type="button" onclick="exportData()" class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors" title="Exportar a CSV / Excel">
                    <span class="material-symbols-outlined">download</span>
                </button>
            </div>
        </form>

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
                    @forelse($productos as $producto)
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            <td class="px-md py-3 text-on-surface-variant">#P-{{ $producto->id }}</td>
                            <td class="px-md py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-surface-container rounded flex items-center justify-center text-outline">
                                        <span class="material-symbols-outlined">image</span>
                                    </div>
                                    <div>
                                        <p class="font-title-md text-title-md">{{ $producto->nombre }}</p>
                                        <p class="text-label-md text-outline">SKU: {{ $producto->codigo_barras }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-md py-3">{{ $producto->categoria->nombre ?? 'Sin Categoría' }}</td>
                            <td class="px-md py-3 font-tabular-nums text-tabular-nums">${{ number_format($producto->precio_venta, 2) }}</td>
                            <td class="px-md py-3 font-tabular-nums text-tabular-nums">{{ $producto->stock_actual }} <span class="text-label-md text-outline">({{ $producto->unidad_medida }})</span></td>
                            <td class="px-md py-3 font-tabular-nums text-tabular-nums">{{ $producto->stock_minimo }}</td>
                            <td class="px-md py-3">
                                @if($producto->stock_actual <= 0)
                                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-error-container/20 text-error text-label-md">
                                        <div class="w-1.5 h-1.5 rounded-full bg-error"></div>
                                        Out of Stock
                                    </div>
                                @elseif($producto->stock_actual <= $producto->stock_minimo)
                                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed-variant text-label-md">
                                        <div class="w-1.5 h-1.5 rounded-full bg-secondary"></div>
                                        Low Stock
                                    </div>
                                @else
                                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-tertiary-fixed-dim/20 text-on-tertiary-fixed-variant text-label-md">
                                        <div class="w-1.5 h-1.5 rounded-full bg-tertiary-fixed-dim"></div>
                                        In Stock
                                    </div>
                                @endif
                            </td>
                            <td class="px-md py-3 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="openEditModal({{ $producto->id }})" class="p-2 hover:bg-surface-container rounded-lg text-primary" title="Editar">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button onclick="openShowModal({{ $producto->id }})" class="p-2 hover:bg-surface-container rounded-lg text-outline" title="Ver">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <button onclick="confirmDelete({{ $producto->id }}, '{{ $producto->nombre }}')" class="p-2 hover:bg-error-container/20 rounded-lg text-error" title="Eliminar">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-md py-8 text-center text-on-surface-variant font-body-md">
                                No hay productos que coincidan con los filtros seleccionados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- BARRA INFERIOR DE BORDES (PAGINACIÓN CON ENLACES DINÁMICOS) --}}
        <div class="p-md border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-md">
            <div class="text-label-lg text-on-surface-variant">
                Mostrando <span class="font-bold text-on-surface">{{ $productos->firstItem() ?? 0 }} - {{ $productos->lastItem() ?? 0 }}</span> de <span class="font-bold text-on-surface">{{ $productos->total() }}</span> productos
            </div>
            <div class="flex items-center gap-1">
                {{-- Botón Anterior --}}
                @if ($productos->onFirstPage())
                    <button class="p-2 border border-outline-variant rounded disabled:opacity-30" disabled>
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                @else
                    <a href="{{ $productos->previousPageUrl() }}" class="p-2 border border-outline-variant rounded hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </a>
                @endif

                {{-- Listado de Páginas Centrales Dinámicas --}}
                @foreach ($productos->getUrlRange(max(1, $productos->currentPage() - 1), min($productos->lastPage(), $productos->currentPage() + 1)) as $page => $url)
                    @if ($page == $productos->currentPage())
                        <button class="px-4 py-2 bg-primary text-on-primary rounded font-bold">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 hover:bg-surface-container rounded transition-colors">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Botón Siguiente --}}
                @if ($productos->hasMorePages())
                    <a href="{{ $productos->nextPageUrl() }}" class="p-2 border border-outline-variant rounded hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </a>
                @else
                    <button class="p-2 border border-outline-variant rounded disabled:opacity-30" disabled>
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- MODAL DE REGISTRO --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-on-background/40 backdrop-blur-sm transition-all duration-300 p-4 @if($errors->any()) opacity-100 pointer-events-auto @else opacity-0 pointer-events-none @endif" id="product-modal">
    <div class="bg-surface-container-lowest w-full max-w-2xl rounded-xl shadow-2xl transition-transform duration-300 overflow-hidden flex flex-col max-h-[calc(100vh-2rem)] @if($errors->any()) scale-100 @else scale-95 @endif">
        <div class="p-md sm:p-lg border-b border-outline-variant flex items-center justify-between shrink-0">
            <h3 class="font-headline-md text-headline-md">Nuevo Producto</h3>
            <button type="button" class="p-2 hover:bg-surface-container rounded-full transition-colors" onclick="toggleModal('product-modal')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="{{ route('products.store') }}" method="POST" class="flex flex-col flex-1 overflow-hidden">
            @csrf
            <div class="p-md sm:p-lg overflow-y-auto custom-scrollbar flex-1 grid grid-cols-1 sm:grid-cols-2 gap-md sm:gap-lg max-h-[60vh] sm:max-h-[70vh]">
                <div class="sm:col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Nombre del Producto</label>
                    <input name="nombre" value="{{ old('nombre') }}" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" placeholder="Ej: Jabón Líquido" type="text" required/>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Categoría</label>
                    <select name="categoria_id" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Proveedor</label>
                    <select name="proveedor_id" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" required>
                        <option value="" disabled selected>Selecciona un proveedor</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Código de Barras (SKU)</label>
                    <input name="codigo_barras" value="{{ old('codigo_barras') }}" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" placeholder="Ej: 7701234567890" type="text" required/>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Unidad de Medida</label>
                    <select name="unidad_medida" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" required>
                        <option value="" disabled selected>Selecciona medida</option>
                        <option value="Unidad" {{ old('unidad_medida') == 'Unidad' ? 'selected' : '' }}>Unidad</option>
                        <option value="Caja" {{ old('unidad_medida') == 'Caja' ? 'selected' : '' }}>Caja</option>
                        <option value="Bulto" {{ old('unidad_medida') == 'Bulto' ? 'selected' : '' }}>Bulto</option>
                    </select>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Precio de Venta</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-outline">$</span>
                        <input name="precio_venta" value="{{ old('precio_venta') }}" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 pl-8 focus:ring-2 focus:ring-primary outline-none transition-all" step="0.01" type="number" required/>
                    </div>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Stock Inicial</label>
                    <input name="stock_actual" value="{{ old('stock_actual') }}" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" type="number" required/>
                </div>
                <div class="sm:col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Punto de Re-orden (Mínimo)</label>
                    <input name="stock_minimo" value="{{ old('stock_minimo') }}" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" type="number" required/>
                </div>
                <div class="sm:col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Descripción</label>
                    <textarea name="descripcion" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" rows="3">{{ old('descripcion') }}</textarea>
                </div>
            </div>
            <div class="p-md sm:p-lg bg-surface-container-low border-t border-outline-variant flex justify-end gap-md shrink-0">
                <button type="button" class="px-5 py-2 border border-outline-variant rounded-lg font-title-md hover:bg-surface-container transition-colors" onclick="toggleModal('product-modal')">Cancelar</button>
                <button type="submit" class="px-5 py-2 bg-primary text-on-primary rounded-lg font-title-md hover:shadow-lg transition-all active:scale-95">Guardar Producto</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL DE EDICIÓN --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-on-background/40 backdrop-blur-sm transition-all duration-300 p-4 opacity-0 pointer-events-none" id="edit-product-modal">
    <div class="bg-surface-container-lowest w-full max-w-2xl rounded-xl shadow-2xl transition-transform duration-300 overflow-hidden flex flex-col max-h-[calc(100vh-2rem)] scale-95">
        <div class="p-md sm:p-lg border-b border-outline-variant flex items-center justify-between shrink-0">
            <h3 class="font-headline-md text-headline-md">Editar Producto</h3>
            <button type="button" class="p-2 hover:bg-surface-container rounded-full transition-colors" onclick="toggleModal('edit-product-modal')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="edit-product-form" method="POST" class="flex flex-col flex-1 overflow-hidden">
            @csrf
            @method('PUT')
            <div class="p-md sm:p-lg overflow-y-auto custom-scrollbar flex-1 grid grid-cols-1 sm:grid-cols-2 gap-md sm:gap-lg max-h-[60vh] sm:max-h-[70vh]">
                <div class="sm:col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Nombre del Producto</label>
                    <input id="edit_nombre" name="nombre" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" type="text" required/>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Categoría</label>
                    <select id="edit_categoria_id" name="categoria_id" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Proveedor</label>
                    <select id="edit_proveedor_id" name="proveedor_id" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" required>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Código de Barras (SKU)</label>
                    <input id="edit_codigo_barras" name="codigo_barras" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" type="text" required/>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Unidad de Medida</label>
                    <select id="edit_unidad_medida" name="unidad_medida" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" required>
                        <option value="Unidad">Unidad</option>
                        <option value="Caja">Caja</option>
                        <option value="Bulto">Bulto</option>
                    </select>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Precio de Venta</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-outline">$</span>
                        <input id="edit_precio_venta" name="precio_venta" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 pl-8 focus:ring-2 focus:ring-primary outline-none transition-all" step="0.01" type="number" required/>
                    </div>
                </div>
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Stock Actual</label>
                    <input id="edit_stock_actual" name="stock_actual" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" type="number" required/>
                </div>
                <div class="sm:col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Punto de Re-orden (Mínimo)</label>
                    <input id="edit_stock_minimo" name="stock_minimo" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" type="number" required/>
                </div>
                <div class="sm:col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Descripción</label>
                    <textarea id="edit_descripcion" name="descripcion" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" rows="3"></textarea>
                </div>
            </div>
            <div class="p-md sm:p-lg bg-surface-container-low border-t border-outline-variant flex justify-end gap-md shrink-0">
                <button type="button" class="px-5 py-2 border border-outline-variant rounded-lg font-title-md hover:bg-surface-container transition-colors" onclick="toggleModal('edit-product-modal')">Cancelar</button>
                <button type="submit" class="px-5 py-2 bg-primary text-on-primary rounded-lg font-title-md hover:shadow-lg transition-all active:scale-95">Actualizar Producto</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL DE VISTA DE DETALLES --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-on-background/40 backdrop-blur-sm transition-all duration-300 p-4 opacity-0 pointer-events-none" id="show-product-modal">
    <div class="bg-surface-container-lowest w-full max-w-md rounded-xl shadow-2xl transition-transform duration-300 overflow-hidden flex flex-col scale-95">
        <div class="p-md sm:p-lg border-b border-outline-variant flex items-center justify-between shrink-0">
            <h3 class="font-headline-md text-headline-md text-primary">Detalles del Producto</h3>
            <button type="button" class="p-2 hover:bg-surface-container rounded-full transition-colors" onclick="toggleModal('show-product-modal')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="p-md sm:p-lg overflow-y-auto flex flex-col gap-4">
            <div class="flex flex-col items-center border-b border-outline-variant/60 pb-4">
                <div class="w-16 h-16 bg-surface-container rounded-xl flex items-center justify-center text-outline mb-2">
                    <span class="material-symbols-outlined text-[36px]">layers</span>
                </div>
                <h4 id="show_nombre" class="font-headline-md text-on-background text-center"></h4>
                <p id="show_sku" class="text-label-md text-outline font-mono mt-0.5"></p>
            </div>
            <div class="grid grid-cols-2 gap-x-4 gap-y-3 font-body-md">
                <div>
                    <span class="text-[12px] text-outline block">Categoría</span>
                    <strong id="show_categoria" class="text-on-surface"></strong>
                </div>
                <div>
                    <span class="text-[12px] text-outline block">Proveedor</span>
                    <strong id="show_proveedor" class="text-on-surface"></strong>
                </div>
                <div>
                    <span class="text-[12px] text-outline block">Precio de Venta</span>
                    <strong id="show_precio" class="text-primary text-title-md"></strong>
                </div>
                <div>
                    <span class="text-[12px] text-outline block">Medida</span>
                    <strong id="show_medida" class="text-on-surface"></strong>
                </div>
                <div>
                    <span class="text-[12px] text-outline block">Stock Actual</span>
                    <strong id="show_stock" class="text-on-surface"></strong>
                </div>
                <div>
                    <span class="text-[12px] text-outline block">Stock Mínimo</span>
                    <strong id="show_minimo" class="text-on-surface"></strong>
                </div>
                <div class="col-span-2 border-t border-outline-variant/60 pt-2">
                    <span class="text-[12px] text-outline block">Descripción del Producto</span>
                    <p id="show_descripcion" class="text-on-surface-variant text-sm whitespace-pre-line mt-1 italic"></p>
                </div>
            </div>
        </div>
        <div class="p-md bg-surface-container-low border-t border-outline-variant flex justify-end shrink-0">
            <button type="button" class="px-5 py-2 bg-primary text-on-primary rounded-lg font-title-md hover:shadow-lg transition-all" onclick="toggleModal('show-product-modal')">Cerrar</button>
        </div>
    </div>
</div>

{{-- FORMULARIO INVISIBLE PARA ELIMINACIÓN SEGURA --}}
<form id="delete-product-form" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        const content = modal.querySelector('div');
        if (modal.classList.contains('opacity-0')) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
            document.body.classList.add('overflow-hidden');
        } else {
            modal.classList.add('opacity-0', 'pointer-events-none');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            document.body.classList.remove('overflow-hidden');
        }
    }

    // ACCIÓN NUEVA: EXPORTAR DATOS AGREGANDO UN INPUT TEMPORAL
    function exportData() {
        const form = document.getElementById('filter-form');
        
        // Crear input temporal para enviarle la instrucción al backend
        const exportInput = document.createElement('input');
        exportInput.type = 'hidden';
        exportInput.name = 'export';
        exportInput.value = 'csv';
        
        form.appendChild(exportInput);
        form.submit();
        
        // Removerlo inmediatamente para que no afecte siguientes envíos comunes
        exportInput.remove();
    }

    function openShowModal(id) {
        fetch(`/inventario/${id}`)
            .then(res => res.json())
            .then(product => {
                document.getElementById('show_nombre').innerText = product.nombre;
                document.getElementById('show_sku').innerText = `SKU: ${product.codigo_barras}`;
                document.getElementById('show_categoria').innerText = product.categoria ? product.categoria.nombre : 'Sin categoría';
                document.getElementById('show_proveedor').innerText = product.proveedor ? product.proveedor.nombre : 'Sin proveedor';
                document.getElementById('show_precio').innerText = `$${parseFloat(product.precio_venta).toFixed(2)}`;
                document.getElementById('show_medida').innerText = product.unidad_medida;
                document.getElementById('show_stock').innerText = product.stock_actual;
                document.getElementById('show_minimo').innerText = product.stock_minimo;
                document.getElementById('show_descripcion').innerText = product.descripcion ? product.descripcion : 'Sin descripción asignada.';
                toggleModal('show-product-modal');
            })
            .catch(err => console.error("Error cargando los detalles:", err));
    }

    function openEditModal(id) {
        fetch(`/inventario/${id}`)
            .then(res => res.json())
            .then(product => {
                document.getElementById('edit-product-form').action = `/inventario/${id}`;
                document.getElementById('edit_nombre').value = product.nombre;
                document.getElementById('edit_categoria_id').value = product.categoria_id;
                document.getElementById('edit_proveedor_id').value = product.proveedor_id;
                document.getElementById('edit_codigo_barras').value = product.codigo_barras;
                document.getElementById('edit_unidad_medida').value = product.unidad_medida;
                document.getElementById('edit_precio_venta').value = product.precio_venta;
                document.getElementById('edit_stock_actual').value = product.stock_actual;
                document.getElementById('edit_stock_minimo').value = product.stock_minimo;
                document.getElementById('edit_descripcion').value = product.descripcion ?? '';
                toggleModal('edit-product-modal');
            })
            .catch(err => console.error("Error cargando producto para edición:", err));
    }

    function confirmDelete(id, nombre) {
        if (confirm(`¿Estás completamente seguro de eliminar el producto "${nombre}"? Esta acción no se puede deshacer.`)) {
            const form = document.getElementById('delete-product-form');
            form.action = `/inventario/${id}`;
            form.submit();
        }
    }
</script>
@endsection