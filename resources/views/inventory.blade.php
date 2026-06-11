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
        <div class="p-md border-b border-outline-variant flex flex-col sm:flex-row gap-md items-center justify-between">
            <div class="flex flex-wrap items-center gap-sm w-full sm:w-auto">
                <select class="bg-surface-container-low border-outline-variant rounded-lg text-body-md py-2 px-3 focus:ring-primary outline-none">
                    <option>Todas las Categorías</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <select class="bg-surface-container-low border-outline-variant rounded-lg text-body-md py-2 px-3 focus:ring-primary outline-none">
                    <option>Todos los Estados</option>
                    <option>In Stock</option>
                    <option>Low Stock</option>
                    <option>Out of Stock</option>
                </select>
            </div>
            <div class="flex items-center gap-sm ms-auto sm:ms-0">
                <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined">filter_list</span>
                </button>
                <button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined">download</span>
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
                                <div class="flex items-center justify-end gap-1 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 hover:bg-surface-container rounded-lg text-primary" title="Editar"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                                    <button class="p-2 hover:bg-surface-container rounded-lg text-outline" title="Ver"><span class="material-symbols-outlined text-[20px]">visibility</span></button>
                                    <button class="p-2 hover:bg-error-container/20 rounded-lg text-error" title="Eliminar"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-md py-8 text-center text-on-surface-variant font-body-md">
                                No hay productos registrados en el inventario.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-md border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-md">
            <div class="text-label-lg text-on-surface-variant">
                Mostrando <span class="font-bold text-on-surface">{{ $productos->firstItem() ?? 0 }} - {{ $productos->lastItem() ?? 0 }}</span> de <span class="font-bold text-on-surface">{{ $productos->total() }}</span> productos
            </div>
            <div class="flex items-center gap-1">
                @if ($productos->onFirstPage())
                    <button class="p-2 border border-outline-variant rounded disabled:opacity-30" disabled>
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                @else
                    <a href="{{ $productos->previousPageUrl() }}" class="p-2 border border-outline-variant rounded hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </a>
                @endif

                @foreach ($productos->getUrlRange(max(1, $productos->currentPage() - 1), min($productos->lastPage(), $productos->currentPage() + 1)) as $page => $url)
                    @if ($page == $productos->currentPage())
                        <button class="px-4 py-2 bg-primary text-on-primary rounded font-bold">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 hover:bg-surface-container rounded transition-colors">{{ $page }}</a>
                    @endif
                @endforeach

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

{{-- MODAL DE REGISTRO CON SOPORTE CORREGIDO PARA CIERRE AUTOMÁTICO TRAS RECARGA --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-on-background/40 backdrop-blur-sm transition-all duration-300 p-4 @if($errors->any()) opacity-100 pointer-events-auto @else opacity-0 pointer-events-none @endif" id="product-modal">
    <div class="bg-surface-container-lowest w-full max-w-2xl rounded-xl shadow-2xl transition-transform duration-300 overflow-hidden flex flex-col max-h-[calc(100vh-2rem)] @if($errors->any()) scale-100 @else scale-95 @endif">
        
        <div class="p-md sm:p-lg border-b border-outline-variant flex items-center justify-between shrink-0">
            <h3 class="font-headline-md text-headline-md">Nuevo Producto</h3>
            <button class="p-2 hover:bg-surface-container rounded-full transition-colors" onclick="toggleModal('product-modal')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        
        <form action="{{ route('products.store') }}" method="POST" class="flex flex-col flex-1 overflow-hidden">
            @csrf

            <div class="p-md sm:p-lg overflow-y-auto custom-scrollbar flex-1 grid grid-cols-1 sm:grid-cols-2 gap-md sm:gap-lg max-h-[60vh] sm:max-h-[70vh]">
                <div class="sm:col-span-2">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Nombre del Producto</label>
                    <input name="nombre" value="{{ old('nombre') }}" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-primary outline-none transition-all" placeholder="Ej: Jabón Líquido Antibacterial" type="text" required/>
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

{{-- SCRIPT REMOVIDO DE PUSH PARA ASEGURAR CARGA DIRECTA --}}
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
</script>
@endsection