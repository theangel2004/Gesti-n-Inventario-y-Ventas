@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen">
    <main class="p-margin-desktop flex-1 max-w-[1440px] w-full mx-auto space-y-xl">
        
        {{-- SECCIÓN DE NOTIFICACIONES REALES DE LARAVEL --}}
        @if(session('success'))
            <div class="p-4 bg-tertiary-fixed text-on-tertiary-fixed-variant border border-outline-variant rounded-xl flex items-center gap-2 font-title-md">
                <span class="material-symbols-outlined">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 bg-error-container text-on-error-container border border-outline-variant rounded-xl flex flex-col gap-1 font-body-md">
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
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-md">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Gestión de Categorías</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Administra las clasificaciones de tus productos para un mejor control del catálogo.</p>
            </div>
            <button onclick="openCreateModal()" class="bg-primary text-white flex items-center gap-sm px-lg py-3 rounded-xl font-title-md hover:opacity-90 active:scale-95 transition-all shadow-sm">
                <span class="material-symbols-outlined">add</span>
                Nueva Categoría
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex items-center justify-between shadow-sm">
                <div>
                    <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Total Categorías</p>
                    <p class="font-display text-display text-primary">{{ $categorias->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-primary-fixed rounded-full flex items-center justify-center text-on-primary-fixed">
                    <span class="material-symbols-outlined text-[28px]">category</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex items-center justify-between shadow-sm">
                <div>
                    <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Categorías Activas</p>
                    <p class="font-display text-display text-on-tertiary-fixed-variant">{{ $categorias->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-tertiary-fixed rounded-full flex items-center justify-center text-on-tertiary-fixed-variant">
                    <span class="material-symbols-outlined text-[28px]">check_circle</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex items-center justify-between shadow-sm">
                <div>
                    <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Sin Productos</p>
                    <p class="font-display text-display text-error">0</p>
                </div>
                <div class="w-12 h-12 bg-error-container rounded-full flex items-center justify-center text-on-error-container">
                    <span class="material-symbols-outlined text-[28px]">inventory_2</span>
                </div>
            </div>
        </div>

        <div class="space-y-0">
            <div class="bg-white border border-outline-variant rounded-t-xl p-md flex flex-col md:flex-row gap-md justify-between items-center">
                <div class="flex flex-wrap gap-sm w-full md:w-auto">
                    <div class="relative flex-1 md:flex-none md:w-80">
                        <span class="absolute inset-y-0 left-3 flex items-center text-outline">
                            <span class="material-symbols-outlined text-[18px]">search</span>
                        </span>
                        {{-- ASIGNADO EL ID PARA EL FILTRADO POR JAVASCRIPT --}}
                        <input id="table-search" class="w-full pl-10 pr-4 py-2 text-body-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container outline-none transition-all" placeholder="Filtrar por nombre o ID..." type="text"/>
                    </div>
                    <button class="flex items-center gap-xs px-md py-2 border border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container-low font-label-lg transition-colors">
                        <span class="material-symbols-outlined text-[18px]">filter_list</span>
                        Filtros
                    </button>
                </div>
                <div class="flex items-center gap-sm">
                    <span class="font-label-md text-label-md text-on-surface-variant">Mostrar:</span>
                    {{-- SELECTOR CON RECARGA DINÁMICA DE REGISTROS --}}
                    <select onchange="window.location.href = '{{ route('categories.index') }}?perPage=' + this.value" class="border border-outline-variant rounded-lg text-body-md px-2 py-1 outline-none focus:ring-1 focus:ring-primary">
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                </div>
            </div>

            <div class="bg-white border-x border-outline-variant overflow-x-auto">
                <table class="w-full text-left border-collapse zebra-striping">
                    <thead class="bg-surface-container-low border-b border-outline-variant sticky top-0">
                        <tr>
                            <th class="px-md py-3 font-label-lg text-label-lg text-on-surface-variant uppercase">ID</th>
                            <th class="px-md py-3 font-label-lg text-label-lg text-on-surface-variant uppercase">Nombre</th>
                            <th class="px-md py-3 font-label-lg text-label-lg text-on-surface-variant uppercase">Descripción</th>
                            <th class="px-md py-3 font-label-lg text-label-lg text-on-surface-variant uppercase">Productos</th>
                            <th class="px-md py-3 font-label-lg text-label-lg text-on-surface-variant uppercase">Estado</th>
                            <th class="px-md py-3 font-label-lg text-label-lg text-on-surface-variant uppercase text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-on-background font-body-md">
                        @forelse($categorias as $categoria)
                            <tr class="group hover:bg-surface-container-low transition-colors border-b border-outline-variant">
                                <td class="px-md py-4 font-tabular-nums text-primary font-bold">#CAT-{{ sprintf('%02d', $categoria->id) }}</td>
                                <td class="px-md py-4">
                                    <div class="flex items-center gap-xs">
                                        <span class="material-symbols-outlined text-outline cursor-pointer toggle-arrow">expand_more</span>
                                        <span class="font-title-md">{{ $categoria->nombre }}</span>
                                    </div>
                                </td>
                                <td class="px-md py-4 text-on-surface-variant">
                                    {{ $categoria->descripcion ?? 'Sin descripción disponible' }}
                                </td>
                                <td class="px-md py-4 text-on-surface-variant">0 productos</td>
                                <td class="px-md py-4">
                                    <span class="px-2 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant text-label-md rounded-full font-bold">ACTIVO</span>
                                </td>
                                <td class="px-md py-4 text-right">
                                    <div class="flex justify-end gap-xs md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button onclick="openEditModal({{ $categoria->id }}, '{{ addslashes($categoria->nombre) }}', '{{ addslashes($categoria->descripcion) }}')" class="p-2 text-on-surface-variant hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button onclick="openDeleteModal({{ $categoria->id }}, '{{ addslashes($categoria->nombre) }}')" class="p-2 text-on-surface-variant hover:text-error transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-md py-8 text-center text-on-surface-variant font-body-md">
                                    No hay categorías registradas en el sistema.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white border border-outline-variant rounded-b-xl p-md flex flex-col md:flex-row justify-between items-center gap-md">
                <span class="font-body-md text-on-surface-variant">
                    Mostrando {{ $categorias->firstItem() ?? 0 }}-{{ $categorias->lastItem() ?? 0 }} de {{ $categorias->total() }} categorías
                </span>
                <div class="flex items-center gap-xs">
                    @if ($categorias->onFirstPage())
                        <button class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg text-outline-variant cursor-not-allowed" disabled>
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                    @else
                        <a href="{{ $categorias->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors text-on-surface-variant">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </a>
                    @endif

                    @foreach ($categorias->getUrlRange(max(1, $categorias->currentPage() - 1), min($categorias->lastPage(), $categorias->currentPage() + 1)) as $page => $url)
                        @if ($page == $categorias->currentPage())
                            <button class="w-10 h-10 flex items-center justify-center bg-primary text-white rounded-lg font-label-lg">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors font-label-lg">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($categorias->hasMorePages())
                        <a href="{{ $categorias->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors text-on-surface-variant">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </a>
                    @else
                        <button class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg text-outline-variant cursor-not-allowed" disabled>
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
            <div class="bg-primary-container/5 border border-primary-container/20 p-lg rounded-2xl flex gap-md h-40 items-start">
                <span class="material-symbols-outlined text-primary text-[32px]">info</span>
                <div>
                    <h4 class="font-title-lg text-title-lg text-primary mb-xs">Optimizacion de Inventario</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant">Recuerda que las categorías sin productos activos no aparecerán en la application móvil de ventas para evitar confusiones en los pedidos.</p>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-2xl h-40 group border border-outline-variant shadow-sm">
                <img alt="Distribution Warehouse" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLw_KBk0BpuqNBXpM1LGrQqnZO4dPkiJLRXqZ5NQ7jQJdhgwdbwKT-JduyFGLcvHvgAfFXCwGGv5ncxS9aj28bH3389K1iC0V2bo0uXXrdNGEE-yBVJtlkoo91KZAvRufXtu9ilBZk0M90TFSItvAEhyJ89EH5bYme-4C8MXDVAroGua6bxIJXS3G-MwbMBIK9hOgy6RGwPFHfMeQx6C6a3K_fs1P6klbRvX32_Qzob2YuLH_bYkC1RuwqEpCSY7f-c-4xycPNBK7B"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex items-end p-lg">
                    <p class="text-white font-title-md">Centro de Logística ElSurtidor</p>
                </div>
            </div>
        </div>
    </main>
</div>

{{-- MODAL DE REGISTRO / EDICIÓN DINÁMICO --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300 p-4" id="category-modal">
    <div class="bg-white border border-outline-variant w-full max-w-md rounded-xl shadow-2xl scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        
        <div class="p-md border-b border-outline-variant flex items-center justify-between">
            <h3 class="font-headline-md text-headline-md text-on-surface" id="modal-title">Nueva Categoría</h3>
            <button class="p-2 hover:bg-surface-container-low rounded-full transition-colors" onclick="toggleModal('category-modal')">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        
        <form id="category-form" action="{{ route('categories.store') }}" method="POST" class="flex flex-col">
            @csrf
            <div id="method-container"></div>

            <div class="p-md flex flex-col gap-md">
                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Nombre de la Categoría</label>
                    <input id="category-nombre" name="nombre" value="{{ old('nombre') }}" class="w-full px-4 py-2 text-body-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container outline-none transition-all" placeholder="Ej: Bebidas, Lácteos, Abarrotes" type="text" required/>
                </div>

                <div>
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Descripción (Opcional)</label>
                    <textarea id="category-descripcion" name="descripcion" class="w-full px-4 py-2 text-body-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container outline-none transition-all" rows="4" placeholder="Ingresa una breve descripción de la categoría...">{{ old('descripcion') }}</textarea>
                </div>
            </div>
            
            <div class="p-md bg-surface-container-low border-t border-outline-variant flex justify-end gap-md">
                <button type="button" class="px-md py-2 border border-outline-variant rounded-lg font-label-lg text-on-surface-variant hover:bg-surface-container-low transition-colors" onclick="toggleModal('category-modal')">Cancelar</button>
                <button type="submit" id="modal-submit-btn" class="bg-primary text-white px-lg py-2 rounded-lg font-title-md hover:opacity-90 active:scale-95 transition-all shadow-sm">Guardar Categoría</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL DE CONFIRMACIÓN DE ELIMINACIÓN --}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300 p-4" id="delete-modal">
    <div class="bg-white border border-outline-variant w-full max-w-sm rounded-xl shadow-2xl scale-95 transition-transform duration-300 overflow-hidden flex flex-col">
        <div class="p-md flex flex-col items-center text-center gap-sm pt-lg">
            <div class="w-12 h-12 bg-error-container text-on-error-container rounded-full flex items-center justify-center mb-xs">
                <span class="material-symbols-outlined text-[28px]">delete_forever</span>
            </div>
            <h3 class="font-headline-md text-headline-md text-on-surface">¿Eliminar Categoría?</h3>
            <p class="font-body-md text-body-md text-on-surface-variant px-sm">
                Estás seguro de eliminar la categoría <span id="delete-category-name" class="font-bold text-on-surface text-primary"></span>. Esta acción no se puede deshacer.
            </p>
        </div>
        <form id="delete-form" method="POST" class="m-0 p-0">
            @csrf
            @method('DELETE')
            <div class="p-md bg-surface-container-low border-t border-outline-variant flex justify-center gap-md">
                <button type="button" class="px-md py-2 border border-outline-variant rounded-lg font-label-lg text-on-surface-variant hover:bg-surface-container-low transition-colors w-1/2" onclick="toggleModal('delete-modal')">Cancelar</button>
                <button type="submit" class="bg-error text-white px-lg py-2 rounded-lg font-title-md hover:opacity-90 active:scale-95 transition-all shadow-sm w-1/2">Eliminar</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const expansionIcons = document.querySelectorAll('.toggle-arrow');
        expansionIcons.forEach(icon => {
            icon.addEventListener('click', (e) => {
                if (e.target.textContent === 'expand_more') {
                    e.target.textContent = 'chevron_right';
                } else {
                    e.target.textContent = 'expand_more';
                }
            });
        });

        // NUEVO: FILTRADO EN TIEMPO REAL SOBRE LA TABLA (Mantiene estilos intactos)
        const tableSearch = document.getElementById('table-search');
        if (tableSearch) {
            tableSearch.addEventListener('input', function(e) {
                const text = e.target.value.toLowerCase().trim();
                const rows = document.querySelectorAll('table tbody tr');

                rows.forEach(row => {
                    if (row.cells.length === 1) return; // Evita romper la fila vacía

                    const idText = row.cells[0].textContent.toLowerCase();
                    const nameText = row.cells[1].textContent.toLowerCase();
                    
                    if (idText.includes(text) || nameText.includes(text)) {
                        row.classList.remove('hidden');
                    } else {
                        row.classList.add('hidden');
                    }
                });
            });
        }
    });

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

    function openCreateModal() {
        const form = document.getElementById('category-form');
        document.getElementById('modal-title').textContent = 'Nueva Categoría';
        document.getElementById('modal-submit-btn').textContent = 'Guardar Categoría';
        document.getElementById('method-container').innerHTML = '';
        form.action = "{{ route('categories.store') }}";
        
        document.getElementById('category-nombre').value = '';
        document.getElementById('category-descripcion').value = '';
        
        toggleModal('category-modal');
    }

    function openEditModal(id, nombre, descripcion) {
        const form = document.getElementById('category-form');
        document.getElementById('modal-title').textContent = 'Editar Categoría';
        document.getElementById('modal-submit-btn').textContent = 'Actualizar Categoría';
        
        document.getElementById('method-container').innerHTML = `@method('PUT')`;
        form.action = `/categorias/${id}`;
        
        document.getElementById('category-nombre').value = nombre;
        document.getElementById('category-descripcion').value = descripcion;
        
        toggleModal('category-modal');
    }

    function openDeleteModal(id, nombre) {
        const form = document.getElementById('delete-form');
        document.getElementById('delete-category-name').textContent = `"${nombre}"`;
        form.action = `/categorias/${id}`;
        toggleModal('delete-modal');
    }
</script>
@endsection