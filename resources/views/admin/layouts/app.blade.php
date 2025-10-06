<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes, viewport-fit=cover" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#3b82f6">
    <title>Admin - La Maison du Village</title>

    <link rel="icon" href="{{ asset('logo.jpg') }}?v={{ time() }}" type="image/jpeg">
<link rel="apple-touch-icon" href="{{ asset('logo.jpg') }}?v={{ time() }}">
<link rel="manifest" href="{{ asset('manifest.json') }}?v={{ time() }}">


    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <style>
        /* ========== VARIABLES CSS ========== */
        :root {
            --header-height: 64px;
            --sidebar-width: 288px;
            --sidebar-width-tablet: 256px;
            --sidebar-width-mobile: 280px;
            --transition-speed: 300ms;
            --theme-btn-size: 56px;
        }

        /* ========== RESET & BASE ========== */
        * {
            -webkit-tap-highlight-color: transparent;
            box-sizing: border-box;
        }

        html {
            height: 100%;
            overflow-x: hidden;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            min-height: 100dvh;
            overflow-x: hidden;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            position: relative;
        }

        /* ========== THÈMES ========== */
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

        body.purple {
            background-color: #e9d5ff;
            color: #581c87;
        }

        body.orange {
            background-color: #fed7aa;
            color: #9a3412;
        }

        /* Adaptation des éléments selon le thème */
        body.light .themed-element {
            background-color: #ffffff;
            border-color: #e5e7eb;
            color: #1f2937;
        }

        body.dark .themed-element {
            background-color: #1f2937;
            border-color: #374151;
            color: #f9fafb;
        }

        body.blue .themed-element {
            background-color: #eff6ff;
            border-color: #bfdbfe;
            color: #1e40af;
        }

        body.green .themed-element {
            background-color: #ecfdf5;
            border-color: #a7f3d0;
            color: #065f46;
        }

        body.purple .themed-element {
            background-color: #f3e8ff;
            border-color: #d8b4fe;
            color: #581c87;
        }

        body.orange .themed-element {
            background-color: #ffedd5;
            border-color: #fed7aa;
            color: #9a3412;
        }

        /* ========== HEADER ========== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            z-index: 50;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 0 1rem;
            display: flex;
            align-items: center;
        }

        header .header-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            gap: 1rem;
        }

        header .logo-section {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 0;
            flex-shrink: 1;
        }

        header .logo-section img {
            height: 40px;
            width: auto;
            flex-shrink: 0;
        }

        header .logo-text {
            font-size: 1.125rem;
            font-weight: 600;
            white-space: nowrap;
        }

        header .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-shrink: 0;
        }

        header .search-box {
            position: relative;
            width: 240px;
        }

        header .search-box input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            border: 1px solid #e5e7eb;
            transition: all 200ms;
        }

        header .search-box input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        header .search-box i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }

        header .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        header .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #3b82f6;
        }

        header .action-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 200ms;
            text-decoration: none;
            cursor: pointer;
            border: none;
            background: none;
        }

        header .action-btn:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        body.dark header .action-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* ========== MENU BUTTON ========== */
        .menu-btn {
            position: fixed;
            top: calc((var(--header-height) - 44px) / 2);
            left: 1rem;
            z-index: 51;
            width: 44px;
            height: 44px;
            border-radius: 0.5rem;
            background-color: #3b82f6;
            color: white;
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
            transition: all 200ms;
        }

        .menu-btn:active {
            transform: scale(0.95);
        }

        /* ========== SIDEBAR ========== */
        aside {
            position: fixed;
            top: var(--header-height);
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            z-index: 40;
            overflow-y: auto;
            overflow-x: hidden;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed) cubic-bezier(0.4, 0, 0.2, 1);
            scrollbar-width: thin;
        }

        aside::-webkit-scrollbar {
            width: 6px;
        }

        aside::-webkit-scrollbar-track {
            background: transparent;
        }

        aside::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 3px;
        }

        aside nav {
            padding: 1rem;
        }

        aside nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        aside nav li {
            margin-bottom: 0.25rem;
        }

        aside nav a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            transition: all 150ms ease;
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 500;
            min-height: 44px;
        }

        aside nav a i {
            width: 24px;
            margin-right: 0.75rem;
            font-size: 1.0625rem;
            flex-shrink: 0;
        }

        aside nav a.active {
            background-color: #dbeafe;
            color: #1e40af;
        }

        aside nav a:not(.active):hover {
            background-color: rgba(0, 0, 0, 0.05);
            color: #3b82f6;
        }

        body.dark aside nav a:not(.active):hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* ========== OVERLAY ========== */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: var(--header-height);
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 35;
            opacity: 0;
            transition: opacity var(--transition-speed) ease;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* ========== MAIN CONTENT ========== */
        main {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 1.5rem;
            min-height: calc(100vh - var(--header-height));
            min-height: calc(100dvh - var(--header-height));
            transition: margin-left var(--transition-speed) ease;
            padding-bottom: calc(var(--theme-btn-size) + 2rem);
        }

        main .content-container {
            max-width: 1280px;
            margin: 0 auto;
            width: 100%;
        }

        /* ========== PAGE TITLE ========== */
        .page-header {
            margin-bottom: 1.5rem;
        }

        .page-title-card {
            padding: 1.25rem 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            border-top: 4px solid #3b82f6;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            word-wrap: break-word;
        }

        .breadcrumb {
            font-size: 0.875rem;
            color: #3b82f6;
            margin: 0;
        }

        .breadcrumb a {
            text-decoration: none;
            color: inherit;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* ========== THEME TOGGLE ========== */
        .theme-toggle-btn {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            width: var(--theme-btn-size);
            height: var(--theme-btn-size);
            border-radius: 50%;
            background-color: #10b981;
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 60;
            transition: all 300ms ease;
        }

        .theme-toggle-btn:hover {
            background-color: #059669;
            transform: scale(1.1);
        }

        .theme-toggle-btn:active {
            transform: scale(0.95);
        }

        /* ========== UTILITIES ========== */
        .iti {
            width: 100%;
        }

        .iti input {
            width: 100%;
        }

        /* Amélioration des ombres en mode sombre */
        body.dark .shadow-md,
        body.dark .shadow-lg {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.4), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
        }

        /* Accessibilité */
        *:focus-visible {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }

        /* Safe areas pour les encoches */
        @supports (padding: max(0px)) {
            body {
                padding-left: env(safe-area-inset-left);
                padding-right: env(safe-area-inset-right);
            }
        }

        /* ========== RESPONSIVE BREAKPOINTS ========== */

        /* Mobile (<768px) */
        @media (max-width: 767px) {
            :root {
                --header-height: 56px;
                --theme-btn-size: 48px;
            }

            .menu-btn {
                display: flex;
            }

            aside {
                width: var(--sidebar-width-mobile);
                transform: translateX(-100%);
            }

            aside.open {
                transform: translateX(0);
            }

            main {
                margin-left: 0;
                padding: 1rem;
            }

            header {
                padding: 0 0.75rem;
            }

            header .logo-section img {
                height: 36px;
            }

            header .logo-text {
                display: none;
            }

            header .search-box,
            header .user-info,
            header .action-btn span {
                display: none;
            }

            header .action-btn {
                padding: 0.5rem;
            }

            .page-title {
                font-size: 1.25rem;
            }

            .page-title-card {
                padding: 1rem;
            }

            .theme-toggle-btn {
                bottom: 1rem;
                right: 1rem;
            }
        }

        /* Très petits mobiles (<375px) */
        @media (max-width: 374px) {
            :root {
                --header-height: 52px;
                --theme-btn-size: 44px;
            }

            header .logo-section img {
                height: 32px;
            }

            main {
                padding: 0.75rem;
            }

            aside nav a {
                padding: 0.625rem 0.75rem;
                font-size: 0.875rem;
            }

            .page-title {
                font-size: 1.125rem;
            }

            .theme-toggle-btn {
                bottom: 0.75rem;
                right: 0.75rem;
            }
        }

        /* Mobile landscape */
        @media (max-width: 767px) and (orientation: landscape) {
            :root {
                --header-height: 48px;
            }

            aside nav a {
                padding: 0.5rem 0.75rem;
            }
        }

        /* Tablette (768px - 1023px) */
        @media (min-width: 768px) and (max-width: 1023px) {
            :root {
                --sidebar-width: var(--sidebar-width-tablet);
            }

            header .logo-text {
                display: inline;
            }

            header .search-box {
                width: 180px;
            }

            header .action-btn span {
                display: none;
            }

            main {
                margin-left: var(--sidebar-width-tablet);
                padding: 1.25rem;
            }

            .sidebar-overlay {
                display: none !important;
            }
        }

        /* Desktop (≥1024px) */
        @media (min-width: 1024px) {
            header .logo-text {
                display: inline;
            }

            header .search-box {
                width: 280px;
            }

            header .action-btn span {
                display: inline;
            }

            .sidebar-overlay {
                display: none !important;
            }

            main .content-container {
                max-width: 1400px;
            }

            .page-title {
                font-size: 1.875rem;
            }
        }

        /* Large desktop (≥1440px) */
        @media (min-width: 1440px) {
            main .content-container {
                max-width: 1600px;
            }

            .theme-toggle-btn {
                bottom: 2rem;
                right: 2rem;
            }
        }

        /* Préférence mouvement réduit */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Print styles */
        @media print {
            .menu-btn,
            .theme-toggle-btn,
            aside,
            .sidebar-overlay,
            header .search-box,
            header .action-btn {
                display: none !important;
            }

            main {
                margin: 0 !important;
                padding: 1rem !important;
            }
        }
    </style>

    @include('laravelpwa::meta')

</head>

<body id="body" class="light">

    <!-- Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Menu Button Mobile -->
    <button class="menu-btn" onclick="toggleSidebar()" aria-label="Toggle Menu" aria-expanded="false">
        <i class="fas fa-bars text-lg"></i>
    </button>

    <!-- Header -->
    <header class="themed-element">
        <div class="header-wrapper">
            <!-- Logo -->
            <div class="logo-section">
                <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" loading="lazy">
                <span class="logo-text">La Maison du Village</span>
            </div>

            <!-- Actions -->
            <div class="header-actions">
                <!-- Search (desktop only) -->
                <div class="search-box hidden sm:block">
                    <input type="text" placeholder="Rechercher...">
                    <i class="fas fa-search"></i>
                </div>

                <!-- User info (desktop only) -->
                <div class="user-info hidden sm:flex">
                    @if (Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Avatar" class="user-avatar" loading="lazy">
                    @else
                        <i class="fas fa-user-circle text-2xl text-gray-600"></i>
                    @endif
                    <span class="text-sm font-medium hidden md:inline">{{ Auth::user()->name }}</span>
                </div>

                <!-- Profile link (desktop only) -->
                <a href="{{ route('admin.profile.index') }}" class="action-btn hidden sm:flex">
                    <i class="fas fa-user"></i>
                    <span>Profil</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('deconnexion') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="action-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden sm:inline">Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar" class="themed-element">
        <nav>
            <ul>
                @php
                    $links = [
                        ['label' => 'Dashboard', 'route' => url('admin/dashboard'), 'icon' => 'fas fa-tachometer-alt'],
                        ['label' => 'Utilisateurs', 'route' => route('admin.users.index'), 'icon' => 'fas fa-users'],
                        ['label' => 'Services', 'route' => route('admin.services.index'), 'icon' => 'fas fa-cogs'],
                        ['label' => 'Projets', 'route' => route('admin.projects.index'), 'icon' => 'fas fa-briefcase'],
                        ['label' => 'Danse traditionnelle', 'route' => route('admin.cultures.index'), 'icon' => 'fas fa-drum'],
                        ['label' => 'Témoignages', 'route' => route('admin.testimonials.index'), 'icon' => 'fas fa-quote-left'],
                        ['label' => 'Équipe', 'route' => route('admin.teams.index'), 'icon' => 'fas fa-users-cog'],
                        ['label' => 'Partenaires', 'route' => route('admin.partners.index'), 'icon' => 'fas fa-handshake'],
                        ['label' => 'À propos', 'route' => route('admin.about_sections.index'), 'icon' => 'fas fa-book-open'],
                        ['label' => 'Woment Empowerment', 'route' => route('admin.women.index'), 'icon' => 'fas fa-scale-balanced'],
                        ['label' => 'Missions', 'route' => route('admin.missions.index'), 'icon' => 'fas fa-bullseye'],
                        ['label' => 'Actualités', 'route' => route('admin.posts.index'), 'icon' => 'fas fa-newspaper'],
                        ['label' => 'Itcommunity', 'route' => route('admin.itcommunities.index'), 'icon' => 'fas fa-laptop-code'],
                        ['label' => 'Paramètres', 'route' => route('admin.settings.index'), 'icon' => 'fas fa-cog'],
                        ['label' => 'Chat', 'route' => route('chat.index'), 'icon' => 'fas fa-comments'],
                    ];
                @endphp

                @foreach ($links as $link)
                    <li>
                        <a href="{{ $link['route'] }}" class="{{ request()->url() == $link['route'] ? 'active' : '' }}">
                            <i class="{{ $link['icon'] }}"></i>
                            <span>{{ $link['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main>
        <div class="content-container">
            @if (View::hasSection('pageTitle'))
                <div class="page-header">
                    <div class="page-title-card themed-element">
                        <h1 class="page-title">@yield('pageTitle')</h1>
                        @hasSection('pageSubTitle')
                            <div class="breadcrumb">
                                <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                                <span> / </span>
                                <span>@yield('pageSubTitle')</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Theme Toggle Button -->
    <button class="theme-toggle-btn" id="themeToggle" aria-label="Changer le thème" title="Changer le thème">
        <i class="fas fa-palette text-xl"></i>
    </button>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        (function() {
            'use strict';

            // Configuration
            const CONFIG = {
                themes: ['light', 'dark', 'blue', 'green', 'purple', 'orange'],
                storageKey: 'admin_theme',
                breakpoint: 768
            };

            // Elements
            const $ = {
                body: document.getElementById('body'),
                sidebar: document.getElementById('sidebar'),
                overlay: document.getElementById('sidebarOverlay'),
                themeBtn: document.getElementById('themeToggle'),
                menuBtn: document.querySelector('.menu-btn')
            };

            // ========== THEME MANAGEMENT ==========
            function initTheme() {
                const saved = localStorage.getItem(CONFIG.storageKey) || 'light';
                if (CONFIG.themes.includes(saved)) {
                    $.body.className = saved;
                }
            }

            function toggleTheme() {
                const current = $.body.className;
                const index = CONFIG.themes.indexOf(current);
                const next = CONFIG.themes[(index + 1) % CONFIG.themes.length];

                $.body.className = next;
                localStorage.setItem(CONFIG.storageKey, next);

                // Animation
                $.themeBtn.style.transform = 'scale(1.2) rotate(15deg)';
                setTimeout(() => {
                    $.themeBtn.style.transform = 'scale(1) rotate(0deg)';
                }, 200);
            }

            // ========== SIDEBAR MANAGEMENT ==========
            window.toggleSidebar = function() {
                const isOpen = $.sidebar.classList.toggle('open');
                $.overlay.classList.toggle('active', isOpen);
                document.body.style.overflow = isOpen ? 'hidden' : '';

                if ($.menuBtn) {
                    $.menuBtn.setAttribute('aria-expanded', isOpen);
                }
            };

            function closeSidebar() {
                $.sidebar.classList.remove('open');
                $.overlay.classList.remove('active');
                document.body.style.overflow = '';

                if ($.menuBtn) {
                    $.menuBtn.setAttribute('aria-expanded', 'false');
                }
            }



            // ========== EVENT LISTENERS ==========
            function initEvents() {
                // Theme toggle
                $.themeBtn.addEventListener('click', toggleTheme);

                // Close sidebar on link click (mobile)
                if (window.innerWidth < CONFIG.breakpoint) {
                    $.sidebar.querySelectorAll('a').forEach(link => {
                        link.addEventListener('click', closeSidebar);
                    });
                }

                // Window resize
                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        if (window.innerWidth >= CONFIG.breakpoint) {
                            closeSidebar();
                        }
                    }, 250);
                });

                // Keyboard shortcuts
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && $.sidebar.classList.contains('open')) {
                        closeSidebar();
                    }
                    if (e.ctrlKey && e.key === 'k') {
                        e.preventDefault();
                        const search = document.querySelector('.search-box input');
                        if (search) search.focus();
                    }
                });
            }

            // ========== SERVICE WORKER ==========
            function registerSW() {
                if ('serviceWorker' in navigator) {
                    navigator.serviceWorker.register('/sw.js')
                        .then(reg => console.log('✅ SW registered:', reg.scope))
                        .catch(err => console.log('❌ SW error:', err));
                }
            }

            // ========== INITIALIZATION ==========
            document.addEventListener('DOMContentLoaded', () => {
                initTheme();
                initEvents();
                initDataTables();
                registerSW();

                // iOS fixes
                if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
                    // Viewport height fix
                    const setVH = () => {
                        document.documentElement.style.setProperty('--vh', `${window.innerHeight * 0.01}px`);
                    };
                    setVH();
                    window.addEventListener('resize', setVH);

                    // Prevent zoom on focus
                    document.querySelectorAll('input, select, textarea').forEach(el => {
                        el.addEventListener('focus', () => {
                            el.style.fontSize = '16px';
                        });
                    });
                }
            });
        })();
    </script>
</body>

</html>
