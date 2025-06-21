<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La maison du village</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.jpg') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
        }

        header {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
        }

        .logo img {
            height: 50px;
            border-radius: 8px;
        }

        .menu {
            display: flex;
            gap: 25px;
        }

        .menu a {
            text-decoration: none;
            color: #222;
            font-weight: 600;
            transition: 0.3s;
        }

        .menu a:hover {
            color: #007bff;
        }

        .hamburger {
            display: none;
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Menu mobile */
        @media (max-width: 991px) {
            .menu {
                display: none;
                flex-direction: column;
                background: #fff;
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                padding: 20px;
                border-top: 1px solid #ddd;
            }

            .menu.show {
                display: flex;
            }

            .hamburger {
                display: block;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="nav-container">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="Logo du site" />
                </a>
            </div>

            <!-- Bouton mobile -->
            <button class="hamburger" onclick="document.getElementById('nav-menu').classList.toggle('show')">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Menu -->
            <nav id="nav-menu" class="menu">
                <a href="{{ route('accueil.index') }}">Accueil</a>
                <a href="{{ route('propos.index') }}">À propos</a>
                <a href="{{ route('cultures.index') }}">Culture</a>
                <a href="{{ route('women.index') }}">Femmes</a>
                <a href="{{ route('site.informatique.index') }}">Informatique</a>
                <a href="#">Fête de la jeunesse</a>
                <a href="{{ route('blog.index') }}">Actualités</a>
                <a href="{{ route('projects.index') }}">Projets</a>
                <a href="{{ route('equipe.index') }}">Équipe</a>
                <a href="{{ route('contacter.index') }}">Contact</a>
            </nav>
        </div>
    </header>
