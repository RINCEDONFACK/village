<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <style>
        /* Empêcher le zoom involontaire sur iOS */
        * {
            -webkit-tap-highlight-color: transparent;
        }

        .iti {
            width: 100%;
        }

        .iti input {
            width: 100%;
        }

        /* Thèmes existants */
        body.light {
            background-color: #f9fafb;
            color: #1f2937;
        }

        body.dark {
            background-color: #111827;
            color: #f9fafb;
        }

        body.blue {
            background-color: #dbeafe;
            color: #1e40af;
        }

        body.green {
            background-color: #d1fae5;
            color: #065f46;
        }

        /* Nouveaux thèmes */
        body.purple {
            background-color: #e9d5ff;
            color: #581c87;
        }

        body.orange {
            background-color: #fed7aa;
            color: #9a3412;
        }

        /* Adaptation des couleurs du sidebar selon le thème */
        body.light aside,
        body.light .bg-white {
            background-color: #ffffff;
        }

        body.dark aside,
        body.dark .bg-white {
            background-color: #1f2937;
            color: #f9fafb;
        }

        body.blue aside,
        body.blue .bg-white {
            background-color: #eff6ff;
        }

        body.green aside,
        body.green .bg-white {
            background-color: #ecfdf5;
        }

        body.purple aside,
        body.purple .bg-white {
            background-color: #f3e8ff;
        }

        body.orange aside,
        body.orange .bg-white {
            background-color: #ffedd5;
        }

        .theme-toggle-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #10b981;
            color: white;
            padding: 12px;
            border-radius: 50%;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            width: 56px;
            height: 56px;
        }

        .theme-toggle-btn:hover {
            background-color: #059669;
            transform: scale(1.1);
        }

        .theme-toggle-btn:active {
            transform: scale(0.95);
        }

        body {
            transition: background-color 0.3s ease, color 0.3s ease;
            position: relative;
            overflow-x: hidden;
            min-height: 100vh;
        }

        main {
            min-width: 0;
            overflow-x: hidden;
            width: 100%;
        }

        /* Amélioration pour PWA - Full viewport */
        html {
            height: 100%;
            overflow-x: hidden;
        }

        /* Adaptation mobile améliorée */
        @media (max-width: 768px) {
            body {
                overflow-x: hidden;
            }

            .theme-toggle-btn {
                bottom: 15px;
                right: 15px;
                width: 48px;
                height: 48px;
                padding: 10px;
            }

            main {
                padding: 1rem 0.75rem;
            }

            /* Sidebar mobile full height */
            aside {
                height: calc(100vh - 4rem);
                height: calc(100dvh - 4rem); /* Dynamic viewport height pour mobile */
            }

            /* Éviter les débordements sur petits écrans */
            .max-w-5xl {
                max-width: 100%;
                padding: 0;
            }
        }

        /* Adaptation pour très petits écrans */
        @media (max-width: 375px) {
            .theme-toggle-btn {
                bottom: 10px;
                right: 10px;
                width: 44px;
                height: 44px;
            }

            main {
                padding: 0.75rem 0.5rem;
            }
        }

        /* Adaptation tablette */
        @media (min-width: 769px) and (max-width: 1024px) {
            aside {
                width: 16rem;
            }

            main {
                margin-left: 16rem;
            }
        }

        /* Support pour l'orientation paysage mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .theme-toggle-btn {
                bottom: 10px;
                right: 10px;
                width: 40px;
                height: 40px;
                padding: 8px;
            }
        }

        /* Amélioration du contraste pour les cartes selon le thème */
        body.dark .shadow-md,
        body.dark .shadow-lg {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
        }

        /* Overlay pour le sidebar mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 4rem;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 35;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
        }

        @media (min-width: 768px) {
            .sidebar-overlay {
                display: none !important;
            }
        }

        /* Animation du bouton menu */
        .menu-btn {
            transition: transform 0.3s ease;
        }

        .menu-btn:active {
            transform: scale(0.95);
        }

        /* Amélioration de l'accessibilité tactile */
        button, a, .cursor-pointer {
            min-height: 44px;
            min-width: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Safe area pour les écrans avec encoche */
        @supports (padding: max(0px)) {
            body {
                padding-left: max(0px, env(safe-area-inset-left));
                padding-right: max(0px, env(safe-area-inset-right));
            }

            aside {
                padding-left: max(0px, env(safe-area-inset-left));
            }
        }
    </style>

    @include('laravelpwa::meta')

</head>

<body id="body" class="light bg-gray-50 text-gray-900">

    <!-- Overlay pour fermer le sidebar mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Bouton menu mobile -->
    <button class="menu-btn md:hidden fixed top-4 left-4 z-50 p-3 rounded-lg bg-blue-600 text-white shadow-lg"
            onclick="toggleSidebar()"
            aria-label="Toggle Sidebar">
        <i class="fas fa-bars text-lg"></i>
    </button>

    {{-- Header --}}
    @include('admin.layouts.partials.header')

    <div class="flex flex-col md:flex-row min-h-screen w-full">

        <!-- Sidebar responsive -->
        <aside id="sidebar"
            class="fixed top-16 left-0 h-[calc(100vh-4rem)] w-72 md:w-64 lg:w-72 bg-white shadow-lg z-40 overflow-y-auto overflow-x-hidden
             transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
            @include('admin.layouts.partials.sidebar')
        </aside>

        <!-- Main content -->
        <main class="flex-1 mt-16 p-4 md:ml-64 lg:ml-72 transition-all duration-300 ease-in-out w-full">
            <div class="max-w-5xl mx-auto w-full">
                @if (View::hasSection('pageTitle'))
                    <div class="mb-6">
                        <div class="bg-white shadow-md rounded-lg p-4 md:p-6 border-t-4 border-blue-500">
                            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-800 mb-2 break-words">
                                @yield('pageTitle')
                            </h1>

                            @hasSection('pageSubTitle')
                                <div class="mb-4 text-xs md:text-sm text-blue-600">
                                    <a href="{{ route('admin.dashboard') }}" class="hover:underline">Tableau de bord</a>
                                    /
                                    <span>@yield('pageSubTitle')</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="w-full overflow-hidden">
                    @yield('content')
                </div>

                @include('admin.layouts.partials.footer')
            </div>
        </main>
    </div>

    <!-- Bouton de changement de thème avec 6 couleurs -->
    <div class="theme-toggle-btn" id="themeToggle" role="button" aria-pressed="false"
         tabindex="0" title="Changer le thème">
        <i class="fas fa-palette text-xl"></i>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        // DataTable initialization
        $(document).ready(function() {
            $('#usersTable').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                lengthChange: true,
                pageLength: 10,
                language: {
                    paginate: {
                        previous: 'Précédent',
                        next: 'Suivant',
                    },
                    search: 'Rechercher:',
                    lengthMenu: 'Afficher _MENU_ utilisateurs par page',
                    info: 'Affichage de _START_ à _END_ sur _TOTAL_ utilisateurs',
                },
            });
        });

        // Gestion des thèmes avec 6 couleurs
        const themeToggleButton = document.getElementById('themeToggle');
        const body = document.getElementById('body');
        const themes = ['light', 'dark', 'blue', 'green', 'purple', 'orange'];

        // Charger le thème sauvegardé
        const savedTheme = localStorage.getItem('theme') || 'light';
        if (savedTheme) {
            body.className = savedTheme;
        }

        // Rotation des thèmes
        themeToggleButton.addEventListener('click', () => {
            const currentTheme = body.className;
            const currentIndex = themes.indexOf(currentTheme);
            const nextIndex = (currentIndex + 1) % themes.length;
            const nextTheme = themes[nextIndex];

            body.className = nextTheme;
            localStorage.setItem('theme', nextTheme);

            // Feedback visuel
            themeToggleButton.style.transform = 'scale(1.2)';
            setTimeout(() => {
                themeToggleButton.style.transform = 'scale(1)';
            }, 200);
        });

        // Toggle Sidebar mobile avec overlay
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('active');

            // Empêcher le scroll du body quand le sidebar est ouvert
            if (!sidebar.classList.contains('-translate-x-full')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        // Fermer le sidebar en cliquant sur un lien (mobile)
        if (window.innerWidth < 768) {
            document.querySelectorAll('#sidebar a').forEach(link => {
                link.addEventListener('click', () => {
                    toggleSidebar();
                });
            });
        }

        // Gérer le redimensionnement de la fenêtre
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (window.innerWidth >= 768) {
                    document.getElementById('sidebar').classList.remove('-translate-x-full');
                    document.getElementById('sidebarOverlay').classList.remove('active');
                    document.body.style.overflow = '';
                }
            }, 250);
        });

        // Service Worker Registration pour PWA
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('✅ Service Worker enregistré:', registration.scope);
                    })
                    .catch(error => {
                        console.log('❌ Erreur Service Worker:', error);
                    });
            });
        }

        // Prévenir le zoom sur les inputs pour iOS
        if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
            const viewportMeta = document.querySelector('meta[name="viewport"]');
            viewportMeta.content = 'width=device-width, initial-scale=1, maximum-scale=1';
        }
    </script>
</body>

</html>
