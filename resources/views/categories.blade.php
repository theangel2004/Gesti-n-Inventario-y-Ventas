@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen">
    <main class="p-margin-desktop flex-1 max-w-[1440px] w-full mx-auto space-y-xl">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-md">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Gestión de Categorías</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Administra las clasificaciones de tus productos para un mejor control del catálogo.</p>
            </div>
            <button class="bg-primary text-white flex items-center gap-sm px-lg py-3 rounded-xl font-title-md hover:opacity-90 active:scale-95 transition-all shadow-sm">
                <span class="material-symbols-outlined">add</span>
                Nueva Categoría
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex items-center justify-between shadow-sm">
                <div>
                    <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Total Categorías</p>
                    <p class="font-display text-display text-primary">12</p>
                </div>
                <div class="w-12 h-12 bg-primary-fixed rounded-full flex items-center justify-center text-on-primary-fixed">
                    <span class="material-symbols-outlined text-[28px]">category</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex items-center justify-between shadow-sm">
                <div>
                    <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Categorías Activas</p>
                    <p class="font-display text-display text-on-tertiary-fixed-variant">10</p>
                </div>
                <div class="w-12 h-12 bg-tertiary-fixed rounded-full flex items-center justify-center text-on-tertiary-fixed-variant">
                    <span class="material-symbols-outlined text-[28px]">check_circle</span>
                </div>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl flex items-center justify-between shadow-sm">
                <div>
                    <p class="font-label-md text-label-md text-on-surface-variant mb-xs">Sin Productos</p>
                    <p class="font-display text-display text-error">2</p>
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
                        <input class="w-full pl-10 pr-4 py-2 text-body-md border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container outline-none transition-all" placeholder="Filtrar por nombre o ID..." type="text"/>
                    </div>
                    <button class="flex items-center gap-xs px-md py-2 border border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container-low font-label-lg transition-colors">
                        <span class="material-symbols-outlined text-[18px]">filter_list</span>
                        Filtros
                    </button>
                </div>
                <div class="flex items-center gap-sm">
                    <span class="font-label-md text-label-md text-on-surface-variant">Mostrar:</span>
                    <select class="border border-outline-variant rounded-lg text-body-md px-2 py-1 outline-none focus:ring-1 focus:ring-primary">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
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
                        <tr class="group hover:bg-surface-container-low transition-colors border-b border-outline-variant">
                            <td class="px-md py-4 font-tabular-nums text-primary font-bold">#CAT-01</td>
                            <td class="px-md py-4">
                                <div class="flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-outline cursor-pointer toggle-arrow">expand_more</span>
                                    <span class="font-title-md">Bebidas</span>
                                </div>
                            </td>
                            <td class="px-md py-4 text-on-surface-variant">Bebidas con y sin alcohol, jugos y aguas minerales</td>
                            <td class="px-md py-4">45 productos</td>
                            <td class="px-md py-4">
                                <span class="px-2 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant text-label-md rounded-full font-bold">ACTIVO</span>
                            </td>
                            <td class="px-md py-4 text-right">
                                <div class="flex justify-end gap-xs md:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-error transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="group bg-surface-container-lowest hover:bg-surface-container-low transition-colors border-b border-outline-variant/30">
                            <td class="px-md py-3 pl-8 font-tabular-nums text-outline-variant">#CAT-01-A</td>
                            <td class="px-md py-3 tree-row-indent">
                                <div class="flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-outline/30 text-[18px]">subdirectory_arrow_right</span>
                                    <span>Aguas</span>
                                </div>
                            </td>
                            <td class="px-md py-3 text-on-surface-variant/80 italic">Natural, con gas y saborizadas</td>
                            <td class="px-md py-3">12 productos</td>
                            <td class="px-md py-3">
                                <span class="px-2 py-0.5 bg-tertiary-fixed/40 text-on-tertiary-fixed-variant text-[10px] rounded-full font-bold">ACTIVO</span>
                            </td>
                            <td class="px-md py-3 text-right">
                                <button class="p-1 text-on-surface-variant hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="group hover:bg-surface-container-low transition-colors border-b border-outline-variant">
                            <td class="px-md py-4 font-tabular-nums text-primary font-bold">#CAT-02</td>
                            <td class="px-md py-4">
                                <div class="flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-outline cursor-pointer toggle-arrow">chevron_right</span>
                                    <span class="font-title-md">Lácteos</span>
                                </div>
                            </td>
                            <td class="px-md py-4 text-on-surface-variant">Leches, quesos, yogures y derivados de origen animal</td>
                            <td class="px-md py-4">32 productos</td>
                            <td class="px-md py-4">
                                <span class="px-2 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant text-label-md rounded-full font-bold">ACTIVO</span>
                            </td>
                            <td class="px-md py-4 text-right">
                                <div class="flex justify-end gap-xs md:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-error transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="group hover:bg-surface-container-low transition-colors border-b border-outline-variant">
                            <td class="px-md py-4 font-tabular-nums text-primary font-bold">#CAT-03</td>
                            <td class="px-md py-4">
                                <div class="flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-outline cursor-pointer toggle-arrow">chevron_right</span>
                                    <span class="font-title-md">Abarrotes</span>
                                </div>
                            </td>
                            <td class="px-md py-4 text-on-surface-variant">Arroz, legumbres, pastas y productos no perecederos</td>
                            <td class="px-md py-4">156 productos</td>
                            <td class="px-md py-4">
                                <span class="px-2 py-1 bg-tertiary-fixed text-on-tertiary-fixed-variant text-label-md rounded-full font-bold">ACTIVO</span>
                            </td>
                            <td class="px-md py-4 text-right">
                                <div class="flex justify-end gap-xs md:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-error transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="group hover:bg-surface-container-low transition-colors border-b border-outline-variant">
                            <td class="px-md py-4 font-tabular-nums text-primary font-bold">#CAT-04</td>
                            <td class="px-md py-4">
                                <div class="flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-outline cursor-pointer toggle-arrow">chevron_right</span>
                                    <span class="font-title-md">Limpieza</span>
                                </div>
                            </td>
                            <td class="px-md py-4 text-on-surface-variant">Detergentes, desinfectantes y artículos de aseo</td>
                            <td class="px-md py-4 text-error">0 productos</td>
                            <td class="px-md py-4">
                                <span class="px-2 py-1 bg-surface-variant text-on-surface-variant text-label-md rounded-full font-bold">INACTIVO</span>
                            </td>
                            <td class="px-md py-4 text-right">
                                <div class="flex justify-end gap-xs md:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 text-on-surface-variant hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button class="p-2 text-on-surface-variant hover:text-error transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-white border border-outline-variant rounded-b-xl p-md flex flex-col md:flex-row justify-between items-center gap-md">
                <span class="font-body-md text-on-surface-variant">Mostrando 1-10 de 12 categorías</span>
                <div class="flex items-center gap-xs">
                    <button class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg text-outline-variant cursor-not-allowed">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center bg-primary text-white rounded-lg font-label-lg">1</button>
                    <button class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors font-label-lg">2</button>
                    <button class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors text-on-surface-variant">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
            <div class="bg-primary-container/5 border border-primary-container/20 p-lg rounded-2xl flex gap-md h-40 items-start">
                <span class="material-symbols-outlined text-primary text-[32px]">info</span>
                <div>
                    <h4 class="font-title-lg text-title-lg text-primary mb-xs">Optimizacion de Inventario</h4>
                    <p class="font-body-md text-body-md text-on-surface-variant">Recuerda que las categorías sin productos activos no aparecerán en la aplicación móvil de ventas para evitar confusiones en los pedidos.</p>
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
    });
</script>
@endsection