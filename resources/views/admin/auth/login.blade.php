<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Material Design 3 Principles */
        :root {
            --md-sys-color-primary: #6750A4;
            --md-sys-color-on-primary: #FFFFFF;
            --md-sys-color-primary-container: #EADDFF;
            --md-sys-color-on-primary-container: #21005D;
            --md-sys-color-surface: #FFFBFE;
            --md-sys-color-on-surface: #1C1B1F;
            --md-sys-color-surface-variant: #E7E0EC;
            --md-sys-color-outline: #79747E;
        }

        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Left section gradient */
        .gradient-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            position: relative;
            overflow: hidden;
        }

        .gradient-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        /* Material Design 3 elevation and surfaces */
        .md3-surface {
            background: var(--md-sys-color-surface);
            border-radius: 28px;
        }

        .md3-input {
            background: var(--md-sys-color-surface-variant);
            border: 1px solid transparent;
            border-radius: 12px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .md3-input:hover {
            background: #E0DBE8;
        }

        .md3-input:focus {
            background: var(--md-sys-color-surface);
            border-color: var(--md-sys-color-primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(103, 80, 164, 0.12);
        }

        .md3-button {
            background: var(--md-sys-color-primary);
            color: var(--md-sys-color-on-primary);
            border-radius: 20px;
            font-weight: 600;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .md3-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .md3-button:hover::before {
            width: 300px;
            height: 300px;
        }

        .md3-button:hover {
            background: #7965AF;
            box-shadow: 0 4px 12px rgba(103, 80, 164, 0.3);
            transform: translateY(-2px);
        }

        .md3-button:active {
            transform: translateY(0);
        }

        /* Smooth transitions */
        .slide-in {
            animation: slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Icon styles */
        .icon-wrapper {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .icon-wrapper:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .gradient-section {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex min-h-screen">
        
        <!-- LEFT SECTION - Gradient avec illustrations -->
        <div class="hidden lg:flex lg:w-1/2 gradient-section items-center justify-center p-12 relative">
            
            <!-- Floating shapes -->
            <div class="floating-shape w-64 h-64 top-20 left-20" style="animation-delay: -2s;"></div>
            <div class="floating-shape w-48 h-48 bottom-32 right-32" style="animation-delay: -4s;"></div>
            <div class="floating-shape w-32 h-32 top-1/2 right-20" style="animation-delay: -6s;"></div>

            <div class="relative z-10 text-white max-w-lg fade-in">
                <div class="mb-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 icon-wrapper mb-6">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 18c-4.52-1.13-7-5.36-7-9.5V8.3l7-3.11 7 3.11v2.2c0 4.14-2.48 8.37-7 9.5zm-1-6h2v2h-2v-2zm0-8h2v6h-2V6z"/>
                        </svg>
                    </div>
                    <h1 class="text-5xl font-bold mb-4 leading-tight">
                        Bienvenue sur 
                        <span class="block">L'Espace Admin de la Maison du Village</span>
                    </h1>
                  
                </div>

                <div class="space-y-6 mt-12">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Sécurité renforcée</h3>
                            <p class="text-white text-opacity-80">Chiffrement de bout en bout pour protéger vos données</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Interface intuitive</h3>
                            <p class="text-white text-opacity-80">Design moderne basé sur Material Design 3</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Support 24/7</h3>
                            <p class="text-white text-opacity-80">Notre équipe est toujours là pour vous aider</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT SECTION - Formulaire de connexion -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-12 bg-white">
            <div class="w-full max-w-md slide-in">
                
                <!-- Header -->
                <div class="mb-10">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" class="h-7 w-7 object-contain">
                        </div>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-2">
                        Connexion
                    </h2>
                    <p class="text-gray-600">Connectez-vous à votre compte administrateur</p>
                </div>

                <!-- Success message -->
                @if (session('status'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-xl mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd"/>
                            </svg>
                            <span>{{ session('status') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Error messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-xl mb-6">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clipRule="evenodd"/>
                            </svg>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Login form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Adresse Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="md3-input w-full px-4 py-3.5 text-gray-900 placeholder-gray-500">
                    </div>

                    <!-- Password field -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Mot de passe
                        </label>
                        <input id="password" type="password" name="password" required
                            class="md3-input w-full px-4 py-3.5 text-gray-900 placeholder-gray-500">
                    </div>

                    <!-- Remember me and forgot password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-5 h-5 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 focus:ring-2">
                            <span class="ml-3 text-sm font-medium text-gray-700 group-hover:text-gray-900">Se souvenir de moi</span>
                        </label>
                        <a href="{{ route('password.request') }}"
                           class="text-sm font-semibold text-purple-600 hover:text-purple-700 transition-colors">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="md3-button w-full py-4 text-base font-semibold relative">
                        <span class="relative z-10">Se connecter</span>
                    </button>
                </form>

              
            </div>
        </div>

    </div>

</body>
</html>