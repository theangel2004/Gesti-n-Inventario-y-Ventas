@extends('layouts.app')

@section('content')
<div class="p-margin-desktop flex flex-col gap-lg overflow-y-auto max-h-[calc(100vh-4rem)] custom-scrollbar">
    <div class="flex justify-between items-end">
        <div>
            <h2 class="font-display text-display text-primary dark:text-primary-fixed-dim">Socios de Negocio</h2>
            <div class="flex gap-lg mt-md">
                {{-- Enlaces limpios que conservan los estilos exactos de tus pestañas --}}
                <a href="{{ route('partners.index', ['type' => 'clientes']) }}" class="px-md py-2 font-title-md text-title-md transition-all {{ $currentType === 'clientes' ? 'tab-active' : 'text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed-dim' }}" id="tab-clientes">Clientes</a>
                <a href="{{ route('partners.index', ['type' => 'proveedores']) }}" class="px-md py-2 font-title-md text-title-md transition-all {{ $currentType === 'proveedores' ? 'tab-active' : 'text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed-dim' }}" id="tab-proveedores">Proveedores</a>
            </div>
        </div>
        <button class="bg-primary text-on-primary px-lg py-sm rounded-xl flex items-center gap-sm font-title-md hover:bg-primary-container transition-all shadow-md active:scale-95" onclick="toggleSidePanel(true)">
            <span class="material-symbols-outlined" data-icon="add">add</span>
            Nuevo Registro
        </button>
    </div>

    {{-- Tarjetas Conectadas con Datos de Ambos Modelos --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-md">
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Total Registros</span>
            <span class="font-headline-lg text-headline-lg text-primary dark:text-primary-fixed-dim">{{ $totalRegistros }}</span>
            <span class="text-on-tertiary-container font-label-md flex items-center gap-xs"><span class="material-symbols-outlined text-[16px]" data-icon="trending_up">trending_up</span> Clientes + Prov</span>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Activos</span>
            <span class="font-headline-lg text-headline-lg text-primary dark:text-primary-fixed-dim">{{ $totalActivos }}</span>
            <span class="text-outline font-label-md">Base total unificada</span>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Nuevos (30d)</span>
            <span class="font-headline-lg text-headline-lg text-primary dark:text-primary-fixed-dim">{{ $nuevosTreintaDias }}</span>
            <span class="text-on-tertiary-container font-label-md flex items-center gap-xs"><span class="material-symbols-outlined text-[16px]" data-icon="check_circle">check_circle</span> Verificados</span>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Crédito Pendiente</span>
            <span class="font-headline-lg text-headline-lg text-error">$0.0k</span>
            <span class="text-error font-label-md">Requiere seguimiento</span>
        </div>
    </div>

    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden flex flex-col">
        <div class="p-md border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
            <div class="flex items-center gap-md">
                <div class="flex items-center gap-xs bg-surface-container-lowest border border-outline-variant rounded-lg px-sm py-1">
                    <span class="material-symbols-outlined text-[18px] text-outline" data-icon="filter_list">filter_list</span>
                    <select class="bg-transparent border-none text-label-lg font-label-lg focus:ring-0 cursor-pointer p-0 pr-8">
                        <option>Todos los Estados</option>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>
                </div>
            </div>
            <p class="text-outline text-label-md">Mostrando {{ $records->firstItem() ?? 0 }}-{{ $records->lastItem() ?? 0 }} de {{ $records->total() }} resultados</p>
        </div>
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant">
                        <th class="p-md font-label-lg text-label-lg text-outline uppercase tracking-wider">ID</th>
                        <th class="p-md font-label-lg text-label-lg text-outline uppercase tracking-wider">Nombre / Razón Social</th>
                        <th class="p-md font-label-lg text-label-lg text-outline uppercase tracking-wider">NIT/ID Fiscal</th>
                        <th class="p-md font-label-lg text-label-lg text-outline uppercase tracking-wider">Contacto Principal</th>
                        <th class="p-md font-label-lg text-label-lg text-outline uppercase tracking-wider">Teléfono</th>
                        <th class="p-md font-label-lg text-label-lg text-outline uppercase tracking-wider">Estado</th>
                        <th class="p-md font-label-lg text-label-lg text-outline uppercase tracking-wider text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant" id="table-body">
                    @forelse($records as $row)
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            {{-- 1. Identificador con prefijo dinámico --}}
                            <td class="p-md font-tabular-nums text-tabular-nums text-on-surface">
                                #{{ $currentType === 'clientes' ? 'C' : 'P' }}-{{ $row->id }}
                            </td>
                            
                            {{-- 2. Nombre y Dirección --}}
                            <td class="p-md">
                                <div class="flex flex-col">
                                    <span class="font-title-md text-title-md text-primary dark:text-primary-fixed-dim">
                                        {{ $currentType === 'clientes' ? $row->nombre_tienda : $row->nombre }}
                                    </span>
                                    <span class="text-label-md text-outline">
                                        {{ $row->direccion ?? 'Sin dirección' }}
                                    </span>
                                </div>
                            </td>
                            
                            {{-- 3. Documento Fiscal / NIT --}}
                            <td class="p-md font-tabular-nums text-tabular-nums">
                                {{ $currentType === 'clientes' ? $row->nit_cc : ($row->nit_fiscal ?? 'N/A') }}
                            </td>
                            
                            {{-- 4. Contacto Principal --}}
                            <td class="p-md font-body-md text-body-md">
                                {{ $currentType === 'clientes' ? ($row->nombre_contacto ?? 'N/A') : ($row->contacto_nombre ?? 'N/A') }}
                            </td>
                            
                            {{-- 5. Teléfono --}}
                            <td class="p-md font-tabular-nums text-tabular-nums">
                                {{ $row->telefono }}
                            </td>
                            
                            {{-- 6. Estado --}}
                            <td class="p-md">
                                <span class="inline-flex items-center gap-xs px-2 py-0.5 rounded-full bg-tertiary-fixed text-tertiary font-label-md">
                                    <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> Activo
                                </span>
                            </td>
                            
                            {{-- 7. Acciones --}}
                            <td class="p-md text-right">
                                <div class="flex justify-end gap-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                    {{-- Botón Editar --}}
                                    <button type="button" class="p-2 text-outline hover:text-primary transition-colors"
                                            onclick="openEditPanel({
                                                id: '{{ $row->id }}',
                                                nombre: '{{ $currentType === 'clientes' ? $row->nombre_tienda : $row->nombre }}',
                                                nit: '{{ $currentType === 'clientes' ? $row->nit_cc : ($row->nit_fiscal ?? '') }}',
                                                direccion: '{{ $row->direccion ?? '' }}',
                                                telefono: '{{ $row->telefono }}',
                                                email: '{{ $row->email ?? '' }}',
                                                contacto: '{{ $currentType === 'clientes' ? $row->nombre_contacto : ($row->contacto_nombre ?? '') }}',
                                                tipo: '{{ $currentType === 'clientes' ? 'Cliente' : 'Proveedor' }}'
                                            })">
                                        <span class="material-symbols-outlined" data-icon="edit">edit</span>
                                    </button>

                                    {{-- Formulario para Botón Eliminar --}}
                                    <form action="{{ route('partners.destroy', $row->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="tipo" value="{{ $currentType }}">
                                        <button type="submit" class="p-2 text-outline hover:text-error transition-colors">
                                            <span class="material-symbols-outlined" data-icon="delete">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-md text-center text-outline font-body-md">
                                No hay {{ $currentType }} registrados en la base de datos.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Paginación real unificada --}}
        <div class="p-md bg-surface-container-low border-t border-outline-variant flex justify-center gap-sm">
            @if ($records->onFirstPage())
                <button class="p-1 rounded text-outline-variant cursor-not-allowed" disabled><span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span></button>
            @else
                <a href="{{ $records->appends(['type' => $currentType])->previousPageUrl() }}" class="p-1 rounded hover:bg-surface-container-highest transition-colors flex items-center"><span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span></a>
            @endif

            <button class="px-3 py-1 bg-primary text-on-primary rounded font-label-md">{{ $records->currentPage() }}</button>

            @if ($records->hasMorePages())
                <a href="{{ $records->appends(['type' => $currentType])->nextPageUrl() }}" class="p-1 rounded hover:bg-surface-container-highest transition-colors flex items-center"><span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span></a>
            @else
                <button class="p-1 rounded text-outline-variant cursor-not-allowed" disabled><span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span></button>
            @endif
        </div>
    </div>
</div>

{{-- PANEL LATERAL --}}
<div class="fixed inset-y-0 right-0 w-full sm:w-[450px] bg-surface-container-lowest shadow-2xl z-[100] transform translate-x-full transition-transform duration-300 ease-in-out border-l border-outline-variant" id="side-panel">
    <div class="h-full flex flex-col">
        <div class="p-lg border-b border-outline-variant flex justify-between items-center bg-primary text-on-primary">
            <div>
                <h3 class="font-headline-md text-headline-md">Nuevo Registro</h3>
                <p class="font-label-md text-on-primary-container opacity-90">Complete los datos para añadir un nuevo contacto.</p>
            </div>
            <button class="p-2 hover:bg-white/10 rounded-full transition-colors" onclick="toggleSidePanel(false)">
                <span class="material-symbols-outlined" data-icon="close">close</span>
            </button>
        </div>
        
        <form action="{{ route('partners.store') }}" method="POST" id="partner-form" class="flex-grow overflow-y-auto p-lg flex flex-col gap-lg custom-scrollbar">
            @csrf
            {{-- Inputs de control dinámico --}}
            <input type="hidden" name="_method" id="form-method" value="POST">
            <input type="hidden" id="record-id">
            
            <div class="space-y-md">
                <h4 class="font-label-lg text-label-lg text-outline uppercase border-b border-outline-variant pb-xs">Identificación</h4>
                <div class="grid grid-cols-1 gap-md">
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Nombre o Razón Social</label>
                        <input name="nombre" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Ej: Distribuidora Central S.A." type="text" required/>
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">NIT / ID Fiscal</label>
                        <input name="nit_fiscal" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="000.000.000-0" type="text" required/>
                    </div>
                </div>
            </div>
            <div class="space-y-md">
                <h4 class="font-label-lg text-label-lg text-outline uppercase border-b border-outline-variant pb-xs">Contacto y Ubicación</h4>
                <div class="flex flex-col gap-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant">Dirección Principal</label>
                    <input name="direccion" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Calle 123 #45-67, Ciudad" type="text" required/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-md">
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Teléfono</label>
                        <input name="telefono" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="+57 300 000 0000" type="tel" required/>
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Correo Electrónico</label>
                        <input name="email" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="contacto@empresa.com" type="email"/>
                    </div>
                </div>
            </div>
            
            <div class="space-y-md">
                <h4 class="font-label-lg text-label-lg text-outline uppercase border-b border-outline-variant pb-xs">Contacto Principal (Opcional en Clientes)</h4>
                <div class="flex flex-col gap-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant">Nombre del Encargado</label>
                    <input name="contacto_nombre" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Ej: Carlos Mendoza" type="text"/>
                </div>
            </div>

            <div class="space-y-md">
                <h4 class="font-label-lg text-label-lg text-outline uppercase border-b border-outline-variant pb-xs">Configuración de Cuenta</h4>
                <div class="grid grid-cols-2 gap-md">
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Tipo de Partner</label>
                        <select name="tipo" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary transition-all">
                            <option value="Cliente" {{ $currentType === 'clientes' ? 'selected' : '' }}>Cliente</option>
                            <option value="Proveedor" {{ $currentType === 'proveedores' ? 'selected' : '' }}>Proveedor</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Estado Inicial</label>
                        <select name="estado" class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary transition-all">
                            <option value="Activo">Activo</option>
                            <option value="En Revisión">En Revisión</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="p-lg bg-surface-container-low border-t border-outline-variant flex flex-col gap-sm">
            <button type="submit" form="partner-form" class="w-full bg-primary text-on-primary py-md rounded-xl font-title-md hover:bg-primary-container transition-all active:scale-[0.98]">Guardar Registro</button>
            <div class="grid grid-cols-2 gap-sm">
                <button type="button" onclick="form.submit();" class="bg-surface-container-lowest border border-outline text-on-surface-variant py-sm rounded-xl font-label-lg hover:bg-surface-container-high transition-all">Actualizar</button>
                <button type="button" onclick="toggleSidePanel(false);" class="bg-error-container text-on-error-container py-sm rounded-xl font-label-lg hover:bg-error/10 transition-all">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="fixed inset-0 bg-black/40 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 z-[90]" id="panel-overlay" onclick="toggleSidePanel(false)"></div>
@endsection

@push('scripts')
<script>
    const form = document.getElementById('partner-form');
    const methodInput = document.getElementById('form-method');
    const panelTitle = document.querySelector('#side-panel h3');

    function toggleSidePanel(isOpen) {
        const panel = document.getElementById('side-panel');
        const overlay = document.getElementById('panel-overlay');
        if (isOpen) {
            panel.classList.remove('translate-x-full');
            overlay.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            panel.classList.add('translate-x-full');
            overlay.classList.add('opacity-0', 'pointer-events-none');
            // Espera a que termine la animación para resetear el panel al estado inicial (Crear)
            setTimeout(resetFormToCreate, 300);
        }
    }

    function openEditPanel(data) {
        // 1. Cambiamos título y simulamos método PUT para Laravel
        panelTitle.innerText = "Editar Registro";
        methodInput.value = "PUT";
        
        // 2. Apuntamos el action hacia la ruta update dinámica
        form.action = `/partners/${data.id}`;

        // 3. Rellenamos cada input con el mapeo correcto
        form.querySelector('input[name="nombre"]').value = data.nombre;
        form.querySelector('input[name="nit_fiscal"]').value = data.nit;
        form.querySelector('input[name="direccion"]').value = data.direccion;
        form.querySelector('input[name="telefono"]').value = data.telefono;
        form.querySelector('input[name="email"]').value = data.email;
        form.querySelector('input[name="contacto_nombre"]').value = data.contacto;
        form.querySelector('select[name="tipo"]').value = data.tipo;

        // 4. Mostramos el panel
        toggleSidePanel(true);
    }

    function resetFormToCreate() {
        panelTitle.innerText = "Nuevo Registro";
        methodInput.value = "POST";
        form.action = "{{ route('partners.store') }}";
        form.reset();
    }
</script>
@endpush