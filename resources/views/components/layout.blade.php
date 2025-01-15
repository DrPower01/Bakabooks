<!-- filepath: /home/drpower/Documents/BakaBooks/resources/views/components/layout.blade.php -->

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BakaBooks</title>
    @vite('resources/css/app.css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .nav-item.active .nav-link {
            border-bottom: 2px solid blue;
        }

        /* Custom style for user icon */
        .user-icon {
            font-size: 2.5rem;
        }

        /* Hover effect for dropdown items */
        .dropdown-item:hover {
            background-color: lightblue;
            color: black;
        }

        /* Make the navigation bar fixed and dark */
        .navbar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; /* Ensure it stays on top of other elements */
            background-color: #1a202c; /* Solid dark background color */
            color: white; /* White text color */
        }

        /* Add padding to the body to prevent content from being hidden behind the navbar */
        body {
            padding-top: 4rem; /* Adjust based on the height of your navbar */
            background-color: #343a40; /* Laravel dark color */
            color: white; /* White text color */
        }

        /* Container for the search bar */
        .search-container {
            background-color: #495057; /* Lighter dark background color */
            padding: 1rem;
            display: flex;
            justify-content: center;
        }

        /* Style for the search bar */
        .search-bar {
            display: flex;
            width: 100%;
            max-width: 600px; /* Adjust the max-width for larger screens */
        }

        .search-bar input {
            width: 100%;
            padding: 0.75rem; /* Increase padding for larger screens */
            color: black; /* Set input text color to black */
        }

        .search-bar button {
            padding: 0.75rem; /* Increase padding for larger screens */
            background-color: lightblue; /* Set button background color to lightblue */
            color: black; /* Set button text color to black */
            height: calc(1.5em + 0.75rem + 2px); /* Match the height of the input */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h2 {
            font-size: 2.5rem; /* Increase font size */
            color: lightblue; /* Change text color to lightblue */
        }
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .search-bar {
                width: calc(100% - 20px);
            }

            .search-bar input {
                flex: 1;
            }
        }
    </style>
</head>
<body>
<header>
    <nav x-data="{ open: false, userMenuOpen: false }" class="navbar navbar-expand-lg navbar-dark navbar-fixed">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">BakaBooks</a>
            <button class="navbar-toggler" type="button" @click="open = ! open">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" :class="{ 'show': open }">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" :class="{ 'active': {{ request()->is('/') ? 'true' : 'false' }} }">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('Accueil') }}</a>
                    </li>
                    <li class="nav-item" :class="{ 'active': {{ request()->is('books/display') ? 'true' : 'false' }} }">
                        <a class="nav-link" href="{{ url('books/display') }}">{{ __('Découvrir') }}</a>
                    </li>
                    <li class="nav-item" :class="{ 'active': {{ request()->is('') ? 'true' : 'false' }} }">
                        <a class="nav-link" href="{{ url('') }}">{{ __('À propos') }}</a>
                    </li>
                    <li class="nav-item" :class="{ 'active': {{ request()->is('') ? 'true' : 'false' }} }">
                        <a class="nav-link" href="{{ url('') }}">{{ __('Annonce') }}</a>
                    </li>
                    <li class="nav-item" :class="{ 'active': {{ request()->is('') ? 'true' : 'false' }} }">
                        <a class="nav-link" href="{{ url('') }}">{{ __('Contact') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item" :class="{ 'active': {{ request()->routeIs('login') ? 'true' : 'false' }} }">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown" @click.away="userMenuOpen = false">
                            <a class="nav-link dropdown-toggle" href="#" @click="userMenuOpen = !userMenuOpen">
                                <i class="fas fa-user-circle user-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" :class="{ 'show': userMenuOpen }">
                                <a class="dropdown-item" href="#">{{ __('Profil') }}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Déconnexion') }}</button>
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Search Bar Container -->
<div class="search-container">
    <form action="{{ route('search') }}" method="GET" class="search-bar">
        <input type="text" name="query" placeholder="Rechercher par Titre, Auteur, Éditeur ou ISBN" class="form-control rounded-0">
        <button type="submit" class="btn btn-primary rounded-0">Rechercher</button>
    </form>
</div>

<main class="container mt-4">
    {{ $slot }}
</main>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>