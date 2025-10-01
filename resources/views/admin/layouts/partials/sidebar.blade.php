<aside id="sidebar"
    class="w-72 bg-white border-r border-gray-200 text-gray-800 fixed top-[60px] left-0 h-[calc(100vh-60px)] overflow-y-auto shadow-sm z-50
           md:translate-x-0 -translate-x-full transition-transform duration-300 ease-in-out">
    <nav class="p-4">
        <ul class="space-y-1 text-[15px] font-medium">
            @php
                $links = [
                    ['label' => 'Dashboard', 'route' => url('admin/dashboard'), 'icon' => 'fas fa-tachometer-alt'],
                    ['label' => 'Utilisateurs', 'route' => route('admin.users.index'), 'icon' => 'fas fa-users'],
                    ['label' => 'Services', 'route' => route('admin.services.index'), 'icon' => 'fas fa-cogs'],
                    ['label' => 'Projets', 'route' => route('admin.projects.index'), 'icon' => 'fas fa-briefcase'],
                    [
                        'label' => 'Danse traditionnelle',
                        'route' => route('admin.cultures.index'),
                        'icon' => 'fas fa-drum',
                    ],
                    [
                        'label' => 'Témoignages',
                        'route' => route('admin.testimonials.index'),
                        'icon' => 'fas fa-quote-left',
                    ],
                    ['label' => 'Équipe', 'route' => route('admin.teams.index'), 'icon' => 'fas fa-users-cog'],
                    ['label' => 'Partenaires', 'route' => route('admin.partners.index'), 'icon' => 'fas fa-handshake'],
                    [
                        'label' => 'À propos',
                        'route' => route('admin.about_sections.index'),
                        'icon' => 'fas fa-book-open',
                    ],
                    [
                        'label' => 'Woment Empowerment',
                        'route' => route('admin.women.index'),
                        'icon' => 'fas fa-scale-balanced',
                    ],
                    ['label' => 'Missions', 'route' => route('admin.missions.index'), 'icon' => 'fas fa-bullseye'],
                    ['label' => 'Actualités', 'route' => route('admin.posts.index'), 'icon' => 'fas fa-newspaper'],
                    [
                        'label' => 'Itcommunity',
                        'route' => route('admin.itcommunities.index'),
                        'icon' => 'fas fa-newspaper',
                    ],
                    ['label' => 'Paramètres', 'route' => route('admin.settings.index'), 'icon' => 'fas fa-cog'],
                    ['label' => 'Chat', 'route' => route('chat.index'), 'icon' => 'fas fa-comments'],
                ];
            @endphp
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}"
                       class="sidebar-link flex items-center px-4 py-3 rounded-xl {{ request()->url() == $link['route'] ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 hover:text-blue-600' }} transition-all duration-150">
                        <i class="{{ $link['icon'] }} mr-3 text-[17px]"></i>
                        <span>{{ $link['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>

<!-- Overlay pour fermer le sidebar sur mobile -->
<div id="sidebarOverlay"
     class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden transition-opacity duration-300"
     onclick="toggleSidebar()">
</div>

<!-- Bouton menu mobile -->
<button id="menuToggle"
        class="md:hidden fixed top-4 left-4 z-[60] p-3 rounded-lg bg-blue-600 text-white shadow-lg hover:bg-blue-700 active:scale-95 transition-all duration-200"
        onclick="toggleSidebar()"
        aria-label="Toggle Menu">
    <i class="fas fa-bars text-lg"></i>
</button>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const menuToggle = document.getElementById('menuToggle');

        // Toggle sidebar
        sidebar.classList.toggle('-translate-x-full');

        // Toggle overlay
        overlay.classList.toggle('hidden');

        // Change icon
        const icon = menuToggle.querySelector('i');
        if (sidebar.classList.contains('-translate-x-full')) {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
            document.body.style.overflow = ''; // Réactiver le scroll
        } else {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
            document.body.style.overflow = 'hidden'; // Désactiver le scroll
        }
    }

    // Fermer le sidebar automatiquement quand on clique sur un lien (mobile uniquement)
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar-link');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    toggleSidebar();
                }
            });
        });

        // Fermer le sidebar si on redimensionne vers desktop
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth >= 768) {
                    const sidebar = document.getElementById('sidebar');
                    const overlay = document.getElementById('sidebarOverlay');
                    const menuToggle = document.getElementById('menuToggle');
                    const icon = menuToggle.querySelector('i');

                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('hidden');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                    document.body.style.overflow = '';
                }
            }, 250);
        });
    });
</script>

<style>
    /* Adaptation du thème pour le sidebar */
    body.dark #sidebar {
        background-color: #1f2937;
        color: #f9fafb;
        border-color: #374151;
    }

    body.dark .sidebar-link:hover {
        background-color: #374151 !important;
        color: #60a5fa !important;
    }

    body.dark .sidebar-link.bg-blue-100 {
        background-color: #1e3a8a !important;
        color: #93c5fd !important;
    }

    body.blue #sidebar {
        background-color: #eff6ff;
        border-color: #bfdbfe;
    }

    body.green #sidebar {
        background-color: #ecfdf5;
        border-color: #a7f3d0;
    }

    body.purple #sidebar {
        background-color: #f3e8ff;
        border-color: #d8b4fe;
    }

    body.orange #sidebar {
        background-color: #ffedd5;
        border-color: #fed7aa;
    }

    /* Animation smooth pour l'overlay */
    #sidebarOverlay {
        animation: fadeIn 0.3s ease-in-out;
    }

    #sidebarOverlay.hidden {
        animation: fadeOut 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }

    /* Empêcher le débordement sur mobile */
    @media (max-width: 768px) {
        body.overflow-hidden {
            overflow: hidden;
        }
    }
</style>
