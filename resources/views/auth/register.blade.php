<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Registro - Distribuidora ElSurtidor</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-on-surface": "#eff1f3",
                        "surface": "#f7f9fb",
                        "outline-variant": "#c5c5d3",
                        "on-surface-variant": "#444651",
                        "secondary-container": "#d5e3fc",
                        "tertiary-fixed-dim": "#6bd8cb",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed-dim": "#b9c7df",
                        "primary": "#00236f",
                        "surface-container-low": "#f2f4f6",
                        "surface-container-high": "#e6e8ea",
                        "on-tertiary-fixed-variant": "#005049",
                        "surface-container": "#eceef0",
                        "secondary-fixed": "#d5e3fc",
                        "on-tertiary": "#ffffff",
                        "surface-bright": "#f7f9fb",
                        "primary-fixed-dim": "#b6c4ff",
                        "tertiary-container": "#004942",
                        "primary-container": "#1e3a8a",
                        "outline": "#757682",
                        "on-primary-fixed-variant": "#264191",
                        "on-secondary-fixed-variant": "#3a485b",
                        "on-secondary": "#ffffff",
                        "surface-container-highest": "#e0e3e5",
                        "on-secondary-container": "#57657a",
                        "surface-dim": "#d8dadc",
                        "surface-variant": "#e0e3e5",
                        "on-surface": "#191c1e",
                        "error-container": "#ffdad6",
                        "inverse-surface": "#2d3133",
                        "error": "#ba1a1a",
                        "surface-tint": "#4059aa",
                        "on-secondary-fixed": "#0d1c2e",
                        "on-error": "#ffffff",
                        "tertiary-fixed": "#89f5e7",
                        "inverse-primary": "#b6c4ff",
                        "on-primary": "#ffffff",
                        "tertiary": "#00312c",
                        "secondary": "#515f74",
                        "primary-fixed": "#dce1ff",
                        "on-background": "#191c1e",
                        "on-primary-fixed": "#00164e",
                        "on-tertiary-container": "#4ebdb0",
                        "on-error-container": "#93000a",
                        "on-primary-container": "#90a8ff",
                        "background": "#f7f9fb",
                        "on-tertiary-fixed": "#00201d"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "xl": "32px",
                        "lg": "24px",
                        "gutter": "16px",
                        "margin-desktop": "32px",
                        "base": "4px",
                        "margin-mobile": "16px",
                        "xs": "4px",
                        "md": "16px",
                        "sm": "8px"
                    },
                    "fontFamily": {
                        "tabular-nums": ["Inter"],
                        "display": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "title-lg": ["Inter"],
                        "title-md": ["Inter"],
                        "headline-md": ["Inter"]
                    },
                    "fontSize": {
                        "tabular-nums": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "display": ["36px", {"lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-md": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                        "headline-lg": ["28px", {"lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "label-lg": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "title-lg": ["18px", {"lineHeight": "24px", "fontWeight": "600"}],
                        "title-md": ["16px", {"lineHeight": "24px", "fontWeight": "500"}],
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
        .transition-soft { transition: all 0.2s ease-in-out; }
    </style>
</head>
<body class="bg-surface text-on-surface min-h-screen flex flex-col justify-center items-center px-gutter">

<div class="fixed inset-0 pointer-events-none z-[-1] opacity-40">
    <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_50%_-20%,_var(--tw-gradient-stops))] from-secondary-container via-surface to-surface"></div>
</div>

<main class="w-full max-w-[440px] bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden z-10 transition-soft hover:shadow-md">
<div class="p-lg md:p-xl space-y-lg">
    <div class="flex flex-col items-center text-center space-y-md">
        <div class="w-16 h-16 bg-primary-container flex items-center justify-center rounded-xl shadow-sm">
            <span class="material-symbols-outlined text-[40px] text-on-primary-container" data-icon="inventory_2">inventory_2</span>
        </div>
        <div>
            <h1 class="font-headline-md text-headline-md text-primary">Distribuidora ElSurtidor</h1>
            <p class="font-label-lg text-label-lg text-secondary mt-1">SISTEMA INTEGRAL DE GESTIÓN</p>
        </div>
    </div>

    <div class="space-y-xs text-center">
        <h2 class="font-title-lg text-title-lg text-on-surface">Crear Cuenta</h2>
        <p class="font-body-md text-body-md text-on-surface-variant">Únete para gestionar tus inventarios y ventas</p>
    </div>

    @if ($errors->any())
        <div class="p-md bg-error-container text-error rounded-lg text-body-md font-medium">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-md" id="registerForm">
        @csrf

        <div class="space-y-xs">
            <label class="font-label-lg text-label-lg text-on-surface-variant px-xs" for="name">Nombre Completo</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-outline group-focus-within:text-primary transition-colors" data-icon="person">person</span>
                </div>
                <input class="w-full pl-[44px] pr-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md outline-none focus:ring-2 focus:ring-primary-container/20 focus:border-primary transition-all" 
                       id="name" name="name" value="{{ old('name') }}" placeholder="Ej. Juan Pérez" required autofocus type="text"/>
            </div>
        </div>

        <div class="space-y-xs">
            <label class="font-label-lg text-label-lg text-on-surface-variant px-xs" for="email">Correo Electrónico</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-outline group-focus-within:text-primary transition-colors" data-icon="mail">mail</span>
                </div>
                <input class="w-full pl-[44px] pr-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md outline-none focus:ring-2 focus:ring-primary-container/20 focus:border-primary transition-all" 
                       id="email" name="email" value="{{ old('email') }}" placeholder="usuario@elsurtidor.com" required type="email"/>
            </div>
        </div>

        <div class="space-y-xs">
            <label class="font-label-lg text-label-lg text-on-surface-variant px-xs" for="password">Contraseña</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-outline group-focus-within:text-primary transition-colors" data-icon="lock">lock</span>
                </div>
                <input class="w-full pl-[44px] pr-12 py-sm bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md outline-none focus:ring-2 focus:ring-primary-container/20 focus:border-primary transition-all" 
                       id="password" name="password" placeholder="••••••••" required type="password"/>
                <button class="absolute inset-y-0 right-0 pr-md flex items-center text-outline hover:text-on-surface transition-colors" onclick="toggleVisibility('password')" type="button">
                    <span class="material-symbols-outlined" data-icon="visibility" id="eye-password">visibility</span>
                </button>
            </div>
        </div>

        <div class="space-y-xs">
            <label class="font-label-lg text-label-lg text-on-surface-variant px-xs" for="password_confirmation">Confirmar Contraseña</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-outline group-focus-within:text-primary transition-colors" data-icon="lock_reset">lock_reset</span>
                </div>
                <input class="w-full pl-[44px] pr-12 py-sm bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md outline-none focus:ring-2 focus:ring-primary-container/20 focus:border-primary transition-all" 
                       id="password_confirmation" name="password_confirmation" placeholder="••••••••" required type="password"/>
                <button class="absolute inset-y-0 right-0 pr-md flex items-center text-outline hover:text-on-surface transition-colors" onclick="toggleVisibility('password_confirmation')" type="button">
                    <span class="material-symbols-outlined" data-icon="visibility" id="eye-password_confirmation">visibility</span>
                </button>
            </div>
        </div>

        <button class="w-full bg-primary-container text-on-primary-container font-title-md text-title-md py-3 rounded-lg shadow-sm hover:bg-primary hover:text-white transition-all active:scale-[0.98] mt-md flex justify-center items-center" type="submit">
            Registrarse
        </button>
    </form>

    <div class="pt-md border-t border-outline-variant text-center">
        <p class="font-body-md text-body-md text-on-surface-variant">
            ¿Ya tienes cuenta? 
            <a class="text-primary font-bold hover:underline transition-all" href="{{ route('login') }}">Iniciar Sesión</a>
        </p>
    </div>
</div>
</main>

<footer class="mt-xl text-center">
    <p class="font-label-md text-label-md text-outline-variant tracking-wider uppercase">
        v3.4.2 — Distribuidora ElSurtidor © 2026
    </p>
</footer>

<script>
    function toggleVisibility(id) {
        const input = document.getElementById(id);
        const icon = document.getElementById('eye-' + id);
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    }

    // Efecto de carga real en el submit
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const btn = e.target.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin mr-2">progress_activity</span> Registrando...';
    });

    // Interacción 3D fluida
    document.addEventListener('mousemove', (e) => {
        const card = document.querySelector('main');
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        if (x > 0 && x < rect.width && y > 0 && y < rect.height) {
            const xPercent = (x / rect.width - 0.5) * 2;
            const yPercent = (y / rect.height - 0.5) * 2;
            card.style.transform = `perspective(1000px) rotateX(${yPercent * -1}deg) rotateY(${xPercent * 1}deg)`;
        } else {
            card.style.transform = 'none';
        }
    });
</script>
</body>
</html>
