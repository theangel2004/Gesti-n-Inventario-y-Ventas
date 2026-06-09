@extends('layouts.app')

@section('content')
<div class="p-margin-desktop flex flex-col gap-lg overflow-y-auto max-h-[calc(100vh-4rem)] custom-scrollbar">
    <div class="flex justify-between items-end">
        <div>
            <h2 class="font-display text-display text-primary dark:text-primary-fixed-dim">Socios de Negocio</h2>
            <div class="flex gap-lg mt-md">
                <button class="px-md py-2 font-title-md text-title-md transition-all tab-active" id="tab-clientes" onclick="switchTab('clientes')">Clientes</button>
                <button class="px-md py-2 font-title-md text-title-md transition-all text-on-surface-variant hover:text-primary dark:hover:text-primary-fixed-dim" id="tab-proveedores" onclick="switchTab('proveedores')">Proveedores</button>
            </div>
        </div>
        <button class="bg-primary text-on-primary px-lg py-sm rounded-xl flex items-center gap-sm font-title-md hover:bg-primary-container transition-all shadow-md active:scale-95" onclick="toggleSidePanel(true)">
            <span class="material-symbols-outlined" data-icon="add">add</span>
            Nuevo Registro
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-md">
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Total Registros</span>
            <span class="font-headline-lg text-headline-lg text-primary dark:text-primary-fixed-dim">1,248</span>
            <span class="text-on-tertiary-container font-label-md flex items-center gap-xs"><span class="material-symbols-outlined text-[16px]" data-icon="trending_up">trending_up</span> +12% este mes</span>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Activos</span>
            <span class="font-headline-lg text-headline-lg text-primary dark:text-primary-fixed-dim">1,120</span>
            <span class="text-outline font-label-md">90% de la base total</span>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Nuevos (30d)</span>
            <span class="font-headline-lg text-headline-lg text-primary dark:text-primary-fixed-dim">45</span>
            <span class="text-on-tertiary-container font-label-md flex items-center gap-xs"><span class="material-symbols-outlined text-[16px]" data-icon="check_circle">check_circle</span> Verificados</span>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md flex flex-col gap-xs shadow-sm">
            <span class="text-outline font-label-lg text-label-lg uppercase">Crédito Pendiente</span>
            <span class="font-headline-lg text-headline-lg text-error">$12.5k</span>
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
                        <option>Bloqueado</option>
                    </select>
                </div>
            </div>
            <p class="text-outline text-label-md">Mostrando 1-10 de 1,248 resultados</p>
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
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="p-md font-tabular-nums text-tabular-nums text-on-surface">#C-8921</td>
                        <td class="p-md">
                            <div class="flex flex-col">
                                <span class="font-title-md text-title-md text-primary dark:text-primary-fixed-dim">Supermercados El Sol S.A.</span>
                                <span class="text-label-md text-outline">Sucursal Central - Edificio Norte</span>
                            </div>
                        </td>
                        <td class="p-md font-tabular-nums text-tabular-nums">900.123.456-7</td>
                        <td class="p-md font-body-md text-body-md">Carlos Mendoza</td>
                        <td class="p-md font-tabular-nums text-tabular-nums">+57 312 456 7890</td>
                        <td class="p-md">
                            <span class="inline-flex items-center gap-xs px-2 py-0.5 rounded-full bg-tertiary-fixed text-tertiary font-label-md">
                                <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> Activo
                            </span>
                        </td>
                        <td class="p-md text-right">
                            <div class="flex justify-end gap-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-outline hover:text-primary transition-colors"><span class="material-symbols-outlined" data-icon="edit">edit</span></button>
                                <button class="p-2 text-outline hover:text-error transition-colors"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="p-md font-tabular-nums text-tabular-nums text-on-surface">#C-8922</td>
                        <td class="p-md">
                            <div class="flex flex-col">
                                <span class="font-title-md text-title-md text-primary dark:text-primary-fixed-dim">Inversiones La Roca LTDA</span>
                                <span class="text-label-md text-outline">Distribuidor Mayorista</span>
                            </div>
                        </td>
                        <td class="p-md font-tabular-nums text-tabular-nums">830.005.992-1</td>
                        <td class="p-md font-body-md text-body-md">Marta Rodríguez</td>
                        <td class="p-md font-tabular-nums text-tabular-nums">+57 300 222 1144</td>
                        <td class="p-md">
                            <span class="inline-flex items-center gap-xs px-2 py-0.5 rounded-full bg-surface-container-high text-outline font-label-md">
                                <span class="w-1.5 h-1.5 rounded-full bg-outline"></span> Inactivo
                            </span>
                        </td>
                        <td class="p-md text-right">
                            <div class="flex justify-end gap-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-outline hover:text-primary transition-colors"><span class="material-symbols-outlined" data-icon="edit">edit</span></button>
                                <button class="p-2 text-outline hover:text-error transition-colors"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="p-md font-tabular-nums text-tabular-nums text-on-surface">#C-8923</td>
                        <td class="p-md"><span class="font-title-md text-title-md text-primary dark:text-primary-fixed-dim">Almacenes Éxito Global</span></td>
                        <td class="p-md font-tabular-nums text-tabular-nums">890.100.200-9</td>
                        <td class="p-md font-body-md text-body-md">Andrés Felipe</td>
                        <td class="p-md font-tabular-nums text-tabular-nums">+57 321 987 6543</td>
                        <td class="p-md"><span class="inline-flex items-center gap-xs px-2 py-0.5 rounded-full bg-tertiary-fixed text-tertiary font-label-md"><span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> Activo</span></td>
                        <td class="p-md text-right">
                            <div class="flex justify-end gap-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-outline hover:text-primary transition-colors"><span class="material-symbols-outlined" data-icon="edit">edit</span></button>
                                <button class="p-2 text-outline hover:text-error transition-colors"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-md bg-surface-container-low border-t border-outline-variant flex justify-center gap-sm">
            <button class="p-1 rounded hover:bg-surface-container-highest transition-colors"><span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span></button>
            <button class="px-3 py-1 bg-primary text-on-primary rounded font-label-md">1</button>
            <button class="px-3 py-1 hover:bg-surface-container-highest rounded font-label-md transition-colors">2</button>
            <button class="px-3 py-1 hover:bg-surface-container-highest rounded font-label-md transition-colors">3</button>
            <button class="p-1 rounded hover:bg-surface-container-highest transition-colors"><span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span></button>
        </div>
    </div>
</div>

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
        <form class="flex-grow overflow-y-auto p-lg flex flex-col gap-lg custom-scrollbar">
            <div class="space-y-md">
                <h4 class="font-label-lg text-label-lg text-outline uppercase border-b border-outline-variant pb-xs">Identificación</h4>
                <div class="grid grid-cols-1 gap-md">
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Nombre o Razón Social</label>
                        <input class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Ej: Distribuidora Central S.A." type="text"/>
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">NIT / ID Fiscal</label>
                        <input class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="000.000.000-0" type="text"/>
                    </div>
                </div>
            </div>
            <div class="space-y-md">
                <h4 class="font-label-lg text-label-lg text-outline uppercase border-b border-outline-variant pb-xs">Contacto y Ubicación</h4>
                <div class="flex flex-col gap-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant">Dirección Principal</label>
                    <input class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Calle 123 #45-67, Ciudad" type="text"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-md">
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Teléfono</label>
                        <input class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="+57 300 000 0000" type="tel"/>
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Correo Electrónico</label>
                        <input class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="contacto@empresa.com" type="email"/>
                    </div>
                </div>
            </div>
            <div class="space-y-md">
                <h4 class="font-label-lg text-label-lg text-outline uppercase border-b border-outline-variant pb-xs">Configuración de Cuenta</h4>
                <div class="grid grid-cols-2 gap-md">
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Tipo de Partner</label>
                        <select class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary transition-all">
                            <option>Cliente</option>
                            <option>Proveedor</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Estado Inicial</label>
                        <select class="border border-outline-variant rounded-lg p-sm text-body-md focus:border-primary transition-all">
                            <option>Activo</option>
                            <option>En Revisión</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="p-lg bg-surface-container-low border-t border-outline-variant flex flex-col gap-sm">
            <button class="w-full bg-primary text-on-primary py-md rounded-xl font-title-md hover:bg-primary-container transition-all active:scale-[0.98]">Guardar Registro</button>
            <div class="grid grid-cols-2 gap-sm">
                <button class="bg-surface-container-lowest border border-outline text-on-surface-variant py-sm rounded-xl font-label-lg hover:bg-surface-container-high transition-all">Actualizar</button>
                <button class="bg-error-container text-on-error-container py-sm rounded-xl font-label-lg hover:bg-error/10 transition-all">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<div class="fixed inset-0 bg-black/40 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 z-[90]" id="panel-overlay" onclick="toggleSidePanel(false)"></div>
@endsection

@push('scripts')
<script>
    function toggleSidePanel(isOpen) {
        const panel = document.getElementById('side-panel');
        const overlay = document.getElementById('panel-overlay');
        if (isOpen) {
            panel.classList.remove('translate-x-full');
            overlay.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            panel.classList.add('translate-x-full');
            overlay.classList.add('opacity-0', 'pointer-events-none');
        }
    }

    function switchTab(tab) {
        const clientesBtn = document.getElementById('tab-clientes');
        const proveedoresBtn = document.getElementById('tab-proveedores');
        const tableBody = document.getElementById('table-body');

        if (tab === 'clientes') {
            clientesBtn.classList.add('tab-active');
            clientesBtn.classList.remove('text-on-surface-variant');
            proveedoresBtn.classList.remove('tab-active');
            proveedoresBtn.classList.add('text-on-surface-variant');
            
            // Mock update data para Clientes
            tableBody.innerHTML = `
                <tr class="hover:bg-surface-container-low transition-colors group">
                    <td class="p-md font-tabular-nums text-tabular-nums text-on-surface">#C-8921</td>
                    <td class="p-md"><div class="flex flex-col"><span class="font-title-md text-title-md text-primary dark:text-primary-fixed-dim">Supermercados El Sol S.A.</span><span class="text-label-md text-outline">Sucursal Central</span></div></td>
                    <td class="p-md font-tabular-nums text-tabular-nums">900.123.456-7</td>
                    <td class="p-md font-body-md text-body-md">Carlos Mendoza</td>
                    <td class="p-md font-tabular-nums text-tabular-nums">+57 312 456 7890</td>
                    <td class="p-md"><span class="inline-flex items-center gap-xs px-2 py-0.5 rounded-full bg-tertiary-fixed text-tertiary font-label-md"><span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> Activo</span></td>
                    <td class="p-md text-right"><div class="flex justify-end gap-sm opacity-0 group-hover:opacity-100 transition-opacity"><button class="p-2 text-outline hover:text-primary transition-colors"><span class="material-symbols-outlined" data-icon="edit">edit</span></button><button class="p-2 text-outline hover:text-error transition-colors"><span class="material-symbols-outlined" data-icon="delete">delete</span></button></div></td>
                </tr>
            `;
        } else {
            proveedoresBtn.classList.add('tab-active');
            proveedoresBtn.classList.remove('text-on-surface-variant');
            clientesBtn.classList.remove('tab-active');
            clientesBtn.classList.add('text-on-surface-variant');

            // Mock update data para Proveedores
            tableBody.innerHTML = `
                <tr class="hover:bg-surface-container-low transition-colors group">
                    <td class="p-md font-tabular-nums text-tabular-nums text-on-surface">#P-1044</td>
                    <td class="p-md"><div class="flex flex-col"><span class="font-title-md text-title-md text-primary dark:text-primary-fixed-dim">Logística Express Nacional</span><span class="text-label-md text-outline">Transporte Pesado</span></div></td>
                    <td class="p-md font-tabular-nums text-tabular-nums">800.555.221-0</td>
                    <td class="p-md font-body-md text-body-md">Julio César</td>
                    <td class="p-md font-tabular-nums text-tabular-nums">+57 315 777 8899</td>
                    <td class="p-md"><span class="inline-flex items-center gap-xs px-2 py-0.5 rounded-full bg-tertiary-fixed text-tertiary font-label-md"><span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> Activo</span></td>
                    <td class="p-md text-right"><div class="flex justify-end gap-sm opacity-0 group-hover:opacity-100 transition-opacity"><button class="p-2 text-outline hover:text-primary transition-colors"><span class="material-symbols-outlined" data-icon="edit">edit</span></button><button class="p-2 text-outline hover:text-error transition-colors"><span class="material-symbols-outlined" data-icon="delete">delete</span></button></div></td>
                </tr>
            `;
        }
    }
</script>
@endpush