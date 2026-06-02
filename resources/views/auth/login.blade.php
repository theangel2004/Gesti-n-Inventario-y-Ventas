<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Distribuidora ElSurtidor</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
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
            },
          },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .login-card {
            box-shadow: 0px 4px 6px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-background text-on-surface">
<main class="flex-grow flex items-center justify-center px-margin-mobile">
<div class="w-full max-w-[440px]">
    <div class="flex flex-col items-center mb-xl">
        <div class="w-20 h-20 bg-primary-container rounded-xl flex items-xl justify-center mb-md shadow-lg flex items-center">
            <span class="material-symbols-outlined text-on-primary text-[48px]" data-icon="inventory_2">inventory_2</span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-primary text-center">Distribuidora ElSurtidor</h1>
        <p class="font-body-md text-body-md text-on-surface-variant text-center mt-xs">Gestión Centralizada de Inventarios</p>
    </div>

    <div class="login-card bg-surface-container-lowest border border-outline-variant rounded-xl p-xl">
        
        @if ($errors->any())
            <div class="mb-md p-md bg-error-container text-error rounded-lg text-body-md font-medium">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-lg" id="loginForm">
            @csrf

            <div class="space-y-xs">
                <label class="font-label-lg text-label-lg text-on-surface-variant block" for="email">CORREO ELECTRÓNICO</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline" data-icon="mail">mail</span>
                    <input class="w-full pl-[48px] pr-md py-md bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary font-body-md text-body-md transition-all outline-none" 
                           id="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required autofocus type="email">
                </div>
            </div>

            <div class="space-y-xs">
                <label class="font-label-lg text-label-lg text-on-surface-variant block" for="password">CONTRASEÑA</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline" data-icon="lock">lock</span>
                    <input class="w-full pl-[48px] pr-[48px] py-md bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary font-body-md text-body-md transition-all outline-none" 
                           id="password" name="password" placeholder="••••••••" required type="password">
                    <button class="absolute right-md top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors" onclick="togglePassword()" type="button">
                        <span class="material-symbols-outlined" data-icon="visibility" id="passwordIcon">visibility</span>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center cursor-pointer group">
                    <input id="remember_me" name="remember" class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary transition-colors cursor-pointer" type="checkbox">
                    <span class="ml-sm font-body-md text-body-md text-on-surface-variant group-hover:text-on-surface transition-colors">Recordarme</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="font-body-md text-body-md text-primary font-semibold hover:underline" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
                @endif
            </div>

            <button class="w-full bg-primary text-on-primary py-md px-lg rounded-lg font-title-md text-title-md hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-sm shadow-md" type="submit">
                Ingresar
                <span class="material-symbols-outlined text-[20px]" data-icon="login">login</span>
            </button>
        </form>

        <div class="mt-lg pt-lg border-t border-outline-variant text-center">
            <p class="font-body-md text-body-md text-on-surface-variant mb-xs">
                ¿No tienes una cuenta? <a class="text-primary font-semibold hover:underline" href="{{ route('register') }}">Registrarse</a>
            </p>
            <p class="font-body-md text-body-md text-on-surface-variant">
                ¿Necesita ayuda? <a class="text-primary font-semibold hover:underline" href="#">Contactar Soporte</a>
            </p>
        </div>
    </div>
</div>
</main>

<footer class="py-lg px-margin-desktop bg-surface-container-low border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-md">
    <div class="flex items-center gap-sm">
        <span class="font-label-lg text-label-lg text-outline">v1.0.0 - Gestión de Inventario</span>
    </div>
    <div class="flex items-center gap-lg">
        <span class="font-label-lg text-label-lg text-on-surface-variant uppercase tracking-wider">Distribuidora ElSurtidor S.A.</span>
    </div>
    <div class="flex gap-md">
        <span class="font-label-lg text-label-lg text-outline">© 2026</span>
    </div>
</footer>

<div class="fixed top-0 right-0 w-1/3 h-1/3 bg-gradient-to-bl from-secondary-container/20 to-transparent -z-10 pointer-events-none"></div>
<div class="fixed bottom-0 left-0 w-1/4 h-1/4 bg-gradient-to-tr from-primary-container/10 to-transparent -z-10 pointer-events-none"></div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.innerText = 'visibility_off';
        } else {
            passwordInput.type = 'password';
            passwordIcon.innerText = 'visibility';
        }
    }

    // Efecto visual de carga al enviar los datos reales a Laravel
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const btn = e.target.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin" data-icon="progress_activity">progress_activity</span> Validando...';
    });
</script>
</body>
</html>