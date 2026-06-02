<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .tree-row-expanded .expand-icon {
            transform: rotate(90deg);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed-dim": "#6bd8cb",
                        "primary-container": "#1e3a8a",
                        "secondary-fixed": "#d5e3fc",
                        "on-primary": "#ffffff",
                        "background": "#f7f9fb",
                        "surface-tint": "#4059aa",
                        "primary": "#00236f",
                        "surface-bright": "#f7f9fb",
                        "on-secondary-fixed-variant": "#3a485b",
                        "inverse-primary": "#b6c4ff",
                        "on-secondary-container": "#57657a",
                        "inverse-surface": "#2d3133",
                        "secondary-container": "#d5e3fc",
                        "on-background": "#191c1e",
                        "surface-container-highest": "#e0e3e5",
                        "on-surface-variant": "#444651",
                        "surface-container-high": "#e6e8ea",
                        "primary-fixed-dim": "#b6c4ff",
                        "on-primary-fixed": "#00164e",
                        "on-error-container": "#93000a",
                        "surface": "#f7f9fb",
                        "on-primary-fixed-variant": "#264191",
                        "on-secondary": "#ffffff",
                        "on-tertiary-fixed-variant": "#005049",
                        "inverse-on-surface": "#eff1f3",
                        "secondary-fixed-dim": "#b9c7df",
                        "on-tertiary-fixed": "#00201d",
                        "surface-dim": "#d8dadc",
                        "tertiary-container": "#004942",
                        "secondary": "#515f74",
                        "on-secondary-fixed": "#0d1c2e",
                        "tertiary-fixed": "#89f5e7",
                        "surface-container": "#eceef0",
                        "surface-container-low": "#f2f4f6",
                        "tertiary": "#00312c",
                        "outline-variant": "#c5c5d3",
                        "on-surface": "#191c1e",
                        "surface-variant": "#e0e3e5",
                        "outline": "#757682",
                        "on-error": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-primary-container": "#90a8ff",
                        "on-tertiary-container": "#4ebdb0",
                        "error": "#ba1a1a",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed": "#dce1ff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "md": "16px",
                        "margin-mobile": "16px",
                        "xl": "32px",
                        "base": "4px",
                        "gutter": "16px",
                        "xs": "4px",
                        "sm": "8px",
                        "lg": "24px",
                        "margin-desktop": "32px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "display": ["Inter"],
                        "title-lg": ["Inter"],
                        "tabular-nums": ["Inter"],
                        "title-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-md": ["Inter"]
                    },
                    "fontSize": {
                        "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "headline-lg": ["28px", {"lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "display": ["36px", {"lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "title-lg": ["18px", {"lineHeight": "24px", "fontWeight": "600"}],
                        "tabular-nums": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "title-md": ["16px", {"lineHeight": "24px", "fontWeight": "500"}],
                        "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "label-lg": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "label-md": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                        "headline-md": ["20px", {"lineHeight": "28px", "fontWeight": "600"}]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-on-background font-body-md text-body-md min-h-screen">

    <!-- SideNavBar -->
    <aside class="h-screen w-64 fixed left-0 top-0 bg-surface dark:bg-on-background border-r border-outline-variant dark:border-outline flex flex-col py-lg z-50">
        <div class="px-md mb-lg">
            <h1 class="font-headline-md text-headline-md text-primary dark:text-primary-fixed-dim">ElSurtidor</h1>
            <p class="font-label-lg text-label-lg text-secondary">Inventory Management</p>
        </div>
        <nav class="flex-grow">
            <div class="space-y-1">
                <a class="flex items-center px-4 py-3 mx-2 text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest dark:hover:bg-surface-container transition-all group" href="#">
                    <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="dashboard">dashboard</span>
                    <span class="font-label-lg text-label-lg">Dashboard</span>
                </a>
                <a class="flex items-center bg-secondary-container dark:bg-secondary-fixed-dim text-on-secondary-container dark:text-on-secondary-fixed rounded-xl mx-2 py-3 px-4 group" href="#">
                    <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="inventory_2">inventory_2</span>
                    <span class="font-label-lg text-label-lg">Inventory</span>
                </a>
                <a class="flex items-center px-4 py-3 mx-2 text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest dark:hover:bg-surface-container transition-all group" href="#">
                    <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="category">category</span>
                    <span class="font-label-lg text-label-lg">Categories</span>
                </a>
                <a class="flex items-center px-4 py-3 mx-2 text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest dark:hover:bg-surface-container transition-all group" href="#">
                    <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="group">group</span>
                    <span class="font-label-lg text-label-lg">Partners</span>
                </a>
                <a class="flex items-center px-4 py-3 mx-2 text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest dark:hover:bg-surface-container transition-all group" href="#">
                    <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="point_of_sale">point_of_sale</span>
                    <span class="font-label-lg text-label-lg">Sales</span>
                </a>
                <a class="flex items-center px-4 py-3 mx-2 text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest dark:hover:bg-surface-container transition-all group" href="#">
                    <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="assessment">assessment</span>
                    <span class="font-label-lg text-label-lg">Reports</span>
                </a>
            </div>
        </nav>
        <div class="mt-auto space-y-1">
            <a class="flex items-center px-4 py-3 mx-2 text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest transition-all group" href="#">
                <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="help">help</span>
                <span class="font-label-lg text-label-lg">Help</span>
            </a>
            <a class="flex items-center px-4 py-3 mx-2 text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest transition-all group" href="#">
                <span class="material-symbols-outlined mr-3 group-hover:translate-x-1 transition-transform" data-icon="logout">logout</span>
                <span class="font-label-lg text-label-lg">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="ml-64 flex flex-col min-h-screen">
        <!-- TopNavBar -->
        <header class="w-full h-16 bg-surface-container-lowest dark:bg-surface-dim border-b border-outline-variant dark:border-outline flex justify-between items-center px-margin-desktop sticky top-0 z-40">
            <div class="flex items-center flex-grow max-w-md">
                <div class="relative w-full">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline" data-icon="search">search</span>
                    <input class="w-full pl-10 pr-4 py-2 bg-surface-container border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none" placeholder="Buscar productos, órdenes o SKUs..." type="text"/>
                </div>
            </div>
            <div class="flex items-center gap-md">
                <div class="flex items-center gap-sm">
                    <button class="p-2 hover:bg-surface-container-high dark:hover:bg-surface-container rounded-full text-on-surface-variant transition-colors cursor-pointer active:opacity-80">
                        <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    </button>
                    <button class="p-2 hover:bg-surface-container-high dark:hover:bg-surface-container rounded-full text-on-surface-variant transition-colors cursor-pointer active:opacity-80">
                        <span class="material-symbols-outlined" data-icon="settings">settings</span>
                    </button>
                </div>
                <div class="h-8 w-[1px] bg-outline-variant mx-2"></div>
                <div class="flex items-center gap-sm">
                    <div class="text-right hidden sm:block">
                        <p class="font-title-md text-title-md text-primary leading-tight">Admin Surtidor</p>
                        <p class="font-label-md text-label-md text-on-surface-variant">Operador Senior</p>
                    </div>
                    <img alt="User profile" class="w-10 h-10 rounded-full object-cover border border-outline-variant" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBl2vh_tDsRXH1INhX8zKIw1ywgcavXwZkZYYxGUgTqlruDZ__wkzmyz-eQLJ8w8MRuG5XID3geJMAe4iPWxbyphF3saTIXfpv0nvmwj3ChoABcKZAso2jupEMPK8xfp8heg8khfnrFxn1kZBBB8gqAYoCZ8uXJbDULcUBDblfh_ErMKcdbS0h5ejjSMp5Noof-Xyt9ExyxUoon-KMlf-OdQVqYVz8fDZ7F9pBsIWeKC-bWJ98z_P9KgsNAAVjHlQuudwqetBcG4-X5"/>
                </div>
            </div>
        </header>

        <!-- Content Canvas -->
        <div class="p-margin-desktop flex-grow">
            <!-- Header Section -->
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

            <!-- Stats Grid -->
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

            <!-- Filters & Table Section -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden flex flex-col shadow-sm">
                <!-- Table Filters -->
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

                <!-- Professional Data Table (Treeview) -->
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
                            <!-- Category Row (Treeview parent) -->
                            <tr class="bg-surface-container/30 font-bold group cursor-pointer" onclick="this.classList.toggle('tree-row-expanded')">
                                <td class="px-md py-3" colspan="8">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined expand-icon transition-transform text-outline" data-icon="chevron_right">chevron_right</span>
                                        <span class="material-symbols-outlined text-primary" data-icon="liquor">liquor</span>
                                        Bebidas y Licores <span class="ml-2 font-normal text-on-surface-variant text-label-md">(24 productos)</span>
                                    </div>
                                </td>
                            </tr>
                            <!-- Item Row -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-3 text-on-surface-variant">#P-1024</td>
                                <td class="px-md py-3">
                                    <div class="flex items-center gap-3">
                                        <img class="w-10 h-10 rounded object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFXG1Xy5NCygyK-wTNy16pK3h4zY2U0r7Ke803yR1oDUQfR8-6DAZG3Or-c3zSgdvkbcCQIjhT65xxQwwjOaOF0uO9Omdmv0LZ3vzLVY8B4o2IiZTs_FSr1L1Yhxl0Rbmmrv2_k9vkk5QhIufr44KJxyAIi6z_bq5AXdvIoDlE4W86JrEF3d-EFlunnyodggj25-jtp13DQOWRAB08lRQCE9wL6dmkHTfU5V27x26TIrNv7ltHM_RltRIXTU-ogOX_KQEmuqSPyfQd"/>
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
                                        <button class="p-2 hover:bg-surface-container rounded-lg text-primary" title="Editar" onclick="toggleModal('edit-product-modal')"><span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span></button>
                                        <button class="p-2 hover:bg-surface-container rounded-lg text-outline" title="Ver"><span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span></button>
                                        <button class="p-2 hover:bg-error-container/20 rounded-lg text-error" title="Eliminar" onclick="toggleModal('delete-confirmation-modal')"><span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Item Row (Low Stock) -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-3 text-on-surface-variant">#P-1025</td>
                                <td class="px-md py-3">
                                    <div class="flex items-center gap-3">
                                        <img class="w-10 h-10 rounded object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPLuy9pfP4N9vy6VImHSBSJHpilohQX-g9kHSDNFGeWkVSdSoEXMEUbNRO915qC6Hb0w_M-QX0YV9hQ2UzkCS01iOY048XfDsaA4msawEV3IqStzffU2geQsVfk-U0iVF0IBJg7xb23ftpqpZxvhuwPS-t0ArI8hFjtMy3z3LxdcDh_Q0vF-zWdZYYJKhPCRIwsYeFoUVSZYOYEXrTk1UsBe9MyjTjarWvZEwogyw9XiZNBNYIEyTyL9Y0rPFyPUHMLATp2Q7J37OK"/>
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
                                        <button class="p-2 hover:bg-surface-container rounded-lg text-primary" onclick="toggleModal('edit-product-modal')"><span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span></button>
                                        <button class="p-2 hover:bg-surface-container rounded-lg text-outline"><span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span></button>
                                        <button class="p-2 hover:bg-error-container/20 rounded-lg text-error" onclick="toggleModal('delete-confirmation-modal')"><span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Item Row (Out of Stock) -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-3 text-on-surface-variant">#P-1026</td>
                                <td class="px-md py-3">
                                    <div class="flex items-center gap-3">
                                        <img class="w-10 h-10 rounded object-cover grayscale" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaU1doAM6vLLRpd_XnKGwfU73qlIpqw0COxdXEeJCucoIrRT8YIFgk6EzDgzsYAlQ2koHR_qmoJhOCZEcfCsd3IhKK15fD9fd8ZJHcXN8oB0Fx3_A8-7dxV4RTsrR2WxXVPSojVUK9_4b9r80ThT1Zd1qYz_iVBcco89FYt5cj8UvIb-zxjno1cnUF449eXdo9sxXTWP4TI1HcUJMekeFDsr3ZccrQVjh6vdc8xOYKiJDGH-vhTP7JY3E9wpy_gonSDbXyJHkNk8Qg"/>
                                        <div>
                                            <p class="font-title-md text-title-md">Jugo de Naranja Natural 1L</p>
                                            <p class="text-label-md text-outline">SKU: JUI-NAT-05</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-md py-3">Bebidas</td>
                                <td class="px-md py-3 font-tabular-nums text-tabular-nums">$3.50</td>
                                <td class="px-md py-3 font-tabular-nums text-tabular-nums text-error font-bold">0</td>
                                <td class="px-md py-3 font-tabular-nums text-tabular-nums">10</td>
                                <td class="px-md py-3">
                                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-error-container/40 text-on-error-container text-label-md">
                                        <div class="w-1.5 h-1.5 rounded-full bg-error"></div>
                                        Out of Stock
                                    </div>
                                </td>
                                <td class="px-md py-3 text-right">
                                    <div class="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 hover:bg-surface-container rounded-lg text-primary" onclick="toggleModal('edit-product-modal')"><span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span></button>
                                        <button class="p-2 hover:bg-surface-container rounded-lg text-outline"><span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span></button>
                                        <button class="p-2 hover:bg-error-container/20 rounded-lg text-error" onclick="toggleModal('delete-confirmation-modal')"><span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Another Category -->
                            <tr class="bg-surface-container/30 font-bold group cursor-pointer">
                                <td class="px-md py-3" colspan="8">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined expand-icon transition-transform text-outline" data-icon="chevron_right">chevron_right</span>
                                        <span class="material-symbols-outlined text-primary" data-icon="sanitizer">sanitizer</span>
                                        Limpieza y Hogar <span class="ml-2 font-normal text-on-surface-variant text-label-md">(112 productos)</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                <div class="p-md border-t border-outline-variant flex flex-col sm:flex-row items-center justify-between gap-md">
                    <div class="text-label-lg text-on-surface-variant">
                        Mostrando <span class="font-bold text-on-surface">1 - 10</span> de <span class="font-bold text-on-surface">1,248</span> productos
                    </div>
                    <div class="flex items-center gap-1">
                        <button class="p-2 border border-outline-variant rounded hover:bg-surface-container disabled:opacity-30" disabled="">
                            <span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
                        </button>
                        <button class="px-4 py-2 bg-primary text-on-primary rounded font-bold">1</button>
                        <button class="px-4 py-2 hover:bg-surface-container rounded transition-colors">2</button>
                        <button class="px-4 py-2 hover:bg-surface-container rounded transition-colors">3</button>
                        <span class="px-2 text-outline">...</span>
                        <button class="px-4 py-2 hover:bg-surface-container rounded transition-colors">125</button>
                        <button class="p-2 border border-outline-variant rounded hover:bg-surface-container">
                            <span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ================= MODALES DEL SISTEMA ================= -->

    <!-- CRUD Form Modal (New Product) -->
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

    <!-- NUEVO: CRUD Form Modal (Edit/Modify Product) -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-on-background/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300" id="edit-product-modal">
        <div class="bg-surface-container-lowest w-full max-w-2xl rounded-xl shadow-2xl scale-95 transition-transform duration-300 overflow-hidden">
            <div class="p-lg border-b border-outline-variant flex items-center justify-between">
                <h3 class="font-headline-md text-headline-md text-primary">Modificar Producto</h3>
                <button class="p-2 hover:bg-surface-container rounded-full" onclick="toggleModal('edit-product-modal')">
                    <span class="material-symbols-outlined" data-icon="close">close</span>
                </button>
            </div>
            <div class="p-lg max-h-[716px] overflow-y-auto custom-scrollbar">
                <form class="grid grid-cols-2 gap-lg">
                    <div class="col-span-2">
                        <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Nombre del Producto</label>
                        <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" value="Agua Mineral Premium 500ml" type="text"/>
                    </div>
                    <div>
                        <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Categoría</label>
                        <select class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary">
                            <option>Limpieza</option>
                            <option selected>Bebidas</option>
                            <option>Alimentos</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Código SKU</label>
                        <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" value="WAT-PRE-01" type="text"/>
                    </div>
                    <div>
                        <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Precio de Venta</label>
                        <div class="relative">
                            <span class="absolute left-3 top-3 text-outline">$</span>
                            <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 pl-8 focus:ring-primary" step="0.01" value="1.25" type="number"/>
                        </div>
                    </div>
                    <div>
                        <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Stock Actual</label>
                        <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" value="450" type="number"/>
                    </div>
                    <div>
                        <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Punto de Re-orden (Mínimo)</label>
                        <input class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" value="50" type="number"/>
                    </div>
                    <div class="col-span-2">
                        <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Descripción</label>
                        <textarea class="w-full bg-surface-container-low border-outline-variant rounded-lg p-3 focus:ring-primary" rows="3">Agua mineral premium de manantial envasada en botella de vidrio de alta calidad.</textarea>
                    </div>
                </form>
            </div>
            <div class="p-lg bg-surface-container-low border-t border-outline-variant flex justify-end gap-md">
                <button class="px-6 py-2 border border-outline-variant rounded-lg font-title-md hover:bg-surface-container transition-colors" onclick="toggleModal('edit-product-modal')">Cancelar</button>
                <button class="px-6 py-2 bg-primary text-on-primary rounded-lg font-title-md hover:shadow-lg transition-all active:scale-95">Actualizar Cambios</button>
            </div>
        </div>
    </div>

    <!-- NUEVO: Modal de Confirmación de Eliminación -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-on-background/40 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300" id="delete-confirmation-modal">
        <div class="bg-surface-container-lowest w-full max-w-md rounded-xl shadow-2xl scale-95 transition-transform duration-300 overflow-hidden">
            <div class="p-lg text-center">
                <div class="w-16 h-16 bg-error-container/10 text-error rounded-full flex items-center justify-center mx-auto mb-md">
                    <span class="material-symbols-outlined text-3xl" data-icon="warning">warning</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-on-background mb-sm">¿Eliminar Producto?</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">Esta acción no se puede deshacer. El producto será removido permanentemente de los registros de inventario.</p>
            </div>
            <div class="p-md bg-surface-container-low border-t border-outline-variant flex justify-center gap-md">
                <button class="px-5 py-2 border border-outline-variant rounded-lg font-title-md hover:bg-surface-container transition-colors" onclick="toggleModal('delete-confirmation-modal')">No, Cancelar</button>
                <button class="px-5 py-2 bg-error text-on-error rounded-lg font-title-md hover:bg-opacity-90 transition-all active:scale-95">Sí, Eliminar</button>
            </div>
        </div>
    </div>

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

        // Simple Treeview interaction
        document.querySelectorAll('.cursor-pointer.bg-surface-container\\/30').forEach(row => {
            row.addEventListener('click', () => {
                const icon = row.querySelector('.expand-icon');
                if (icon.innerText === 'chevron_right') {
                    icon.innerText = 'expand_more';
                } else {
                    icon.innerText = 'chevron_right';
                }
                
                // Visual feedback only for demo
                let next = row.nextElementSibling;
                while (next && !next.classList.contains('cursor-pointer')) {
                    next.classList.toggle('hidden');
                    next = next.nextElementSibling;
                }
            });
        });
    </script>
</body>
</html>