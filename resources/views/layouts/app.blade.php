<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Distribuidora ElSurtidor')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
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
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-surface">

    <!-- TopNavBar -->
    <nav class="fixed top-0 right-0 left-64 z-50 flex justify-between items-center px-margin-desktop h-16 bg-surface-container-lowest dark:bg-surface-dim border-b border-outline-variant dark:border-outline">
        <div class="flex items-center gap-md">
            <span class="font-headline-md text-headline-md text-primary dark:text-primary-fixed-dim">Distribuidora ElSurtidor</span>
            <div class="relative ml-lg">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                <input class="pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-lg font-body-md text-body-md w-80 focus:outline-none focus:border-primary" placeholder="Buscar pedidos, productos..." type="text"/>
            </div>
        </div>
        <div class="flex items-center gap-lg">
            <div class="flex gap-md">
                <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:bg-surface-container-high p-2 rounded-full transition-colors" data-icon="notifications">notifications</span>
                <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:bg-surface-container-high p-2 rounded-full transition-colors" data-icon="settings">settings</span>
            </div>
            <div class="flex items-center gap-sm">
                <!-- Nombre del usuario dinámico de Laravel -->
                <span class="font-body-md font-medium text-on-surface-variant hidden md:inline">{{ Auth::user()->name }}</span>
                <img alt="User profile" class="w-8 h-8 rounded-full border border-outline-variant" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"/>
            </div>
        </div>
    </nav>

    <!-- SideNavBar -->
    <aside class="h-screen w-64 fixed left-0 top-0 flex flex-col py-lg bg-surface dark:bg-on-background border-r border-outline-variant dark:border-outline z-[60]">
        <div class="px-md mb-xl flex items-center gap-sm">
            <div class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl shadow-sm">
                <span class="material-symbols-outlined text-on-primary" style="font-variation-settings: 'FILL' 1;">inventory</span>
            </div>
            <div>
                <h1 class="font-headline-md text-headline-md text-primary dark:text-primary-fixed-dim leading-none">ElSurtidor</h1>
                <p class="font-label-lg text-label-lg text-secondary opacity-70">Inventory Mgmt</p>
            </div>
        </div>
        
        <nav class="flex-1 flex flex-col gap-1">
            <a class="flex items-center gap-md {{ Request::routeIs('dashboard') ? 'bg-secondary-container dark:bg-secondary-fixed-dim text-on-secondary-container dark:text-on-secondary-fixed' : 'text-secondary dark:text-secondary-fixed' }} rounded-xl mx-2 py-3 px-4 hover:translate-x-1 transition-all duration-200" href="{{ route('dashboard') }}">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="font-label-lg text-label-lg">Dashboard</span>
            </a>
            <a class="flex items-center gap-md {{ Request::routeIs('inventory') ? 'bg-secondary-container dark:bg-secondary-fixed-dim text-on-secondary-container dark:text-on-secondary-fixed' : 'text-secondary dark:text-secondary-fixed' }} rounded-xl mx-2 py-3 px-4 hover:translate-x-1 transition-all duration-200" 
            href="{{ route('inventory') }}">
                <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                <span class="font-label-lg text-label-lg">Inventory</span>
            </a>
            <a class="flex items-center gap-md text-secondary dark:text-secondary-fixed py-3 mx-2 px-4 hover:bg-surface-container-highest dark:hover:bg-surface-container hover:translate-x-1 transition-all duration-200" href="#">
                <span class="material-symbols-outlined" data-icon="category">category</span>
                <span class="font-label-lg text-label-lg">Categories</span>
            </a>
            <a class="flex items-center gap-md py-3 mx-2 px-4 transition-all hover:translate-x-1 duration-200 {{ request()->routeIs('partners.index') ? 'bg-secondary-container dark:bg-secondary-fixed-dim text-on-secondary-container dark:text-on-secondary-fixed rounded-xl' : 'text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest dark:hover:bg-surface-container' }}" 
            href="{{ route('partners.index') }}">
                <span class="material-symbols-outlined" data-icon="group">group</span>
                <span class="font-label-lg text-label-lg">Partners</span>
            </a>
            <a class="flex items-center gap-md py-3 mx-2 px-4 transition-all duration-200 hover:translate-x-1 {{ request()->routeIs('sales') ? 'bg-secondary-container dark:bg-secondary-fixed-dim text-on-secondary-container dark:text-on-secondary-fixed rounded-xl' : 'text-secondary dark:text-secondary-fixed hover:bg-surface-container-highest dark:hover:bg-surface-container' }}" href="{{ route('sales') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('sales') ? 'font-variation-settings: \'FILL\' 1;' : '' }}">point_of_sale</span>
                <span class="font-label-lg text-label-lg">Sales</span>
            </a>
            <a class="py-3 mx-2 font-label-lg text-label-lg transition-all hover:translate-x-1 flex items-center px-md gap-md {{ request()->routeIs('reports') ? 'bg-secondary-container dark:bg-secondary-fixed-dim text-on-secondary-container dark:text-on-secondary-fixed rounded-xl font-bold' : 'text-secondary hover:bg-surface-container-highest dark:hover:bg-surface-container' }}" 
            href="{{ route('reports') }}">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">assessment</span>
                <span>Reports</span>
            </a>
        </nav>

        <div class="mt-auto border-t border-outline-variant pt-md flex flex-col gap-1">
            <a class="flex items-center gap-md text-secondary dark:text-secondary-fixed py-3 mx-2 px-4 hover:bg-surface-container-highest dark:hover:bg-surface-container transition-all" href="#">
                <span class="material-symbols-outlined" data-icon="help">help</span>
                <span class="font-label-lg text-label-lg">Help</span>
            </a>
            
            <!-- Botón de Cierre de Sesión Seguro -->
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                @csrf
                <a class="flex items-center gap-md text-error py-3 mx-2 px-4 hover:bg-error-container transition-all cursor-pointer" 
                   onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    <span class="font-label-lg text-label-lg">Logout</span>
                </a>
            </form>
        </div>
    </aside>

    <!-- Canvas de Contenido Dinámico -->
    <main class="ml-64 mt-16 p-margin-desktop min-h-screen">
        @yield('content')
    </main>

    <script>
        // Efecto focus barra de búsqueda
        const searchInput = document.querySelector('input[type="text"]');
        if(searchInput) {
            searchInput.addEventListener('focus', () => {
                searchInput.parentElement.classList.add('ring-2', 'ring-primary/20');
            });
            searchInput.addEventListener('blur', () => {
                searchInput.parentElement.classList.remove('ring-2', 'ring-primary/20');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>