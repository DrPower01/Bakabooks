<!-- filepath: /home/drpower/Documents/BakaBooks/resources/views/components/layout.blade.php -->

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BakaBooks</title>
    @vite('resources/css/app.css')
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
            background-color: #1a202c; /* Dark background color */
            color: white; /* White text color */
        }

        /* Add padding to the body to prevent content from being hidden behind the navbar */
        body {
            padding-top: 4rem; /* Adjust based on the height of your navbar */
        }

        /* Container for the search bar */
        .search-container {
            background-color: #2d3748; /* Dark background color */
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
<body class="bg-gray-900 text-white">
<header>
    <nav x-data="{ open: false, userMenuOpen: false }" class="navbar-fixed bg-gray-800 border-b border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        {{ __('Accueil') }}
                    </x-nav-link>
                    <x-nav-link :href="url('books/display')" :active="request()->is('books.display')">
                        {{ __('Découvrir') }}
                    </x-nav-link>
                    <x-nav-link :href="url('')" :active="request()->is('')">
                        {{ __('À propos') }}
                    </x-nav-link>
                    <x-nav-link :href="url('')" :active="request()->is('')">
                        {{ __('Annonce') }}
                    </x-nav-link>
                    <x-nav-link :href="url('')" :active="request()->is('')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>

                <!-- User Icon -->
                <div class="hidden sm:flex items-center ml-auto">
                    @guest
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Connexion') }}
                        </x-nav-link>
                    @else
                        <div class="relative ml-4" @click.away="userMenuOpen = false">
                            <button @click="userMenuOpen = !userMenuOpen" class="flex items-center text-sm font-medium text-gray-400 hover:text-gray-300 focus:outline-none focus:text-gray-300 transition duration-150 ease-in-out">
                                <i class="fas fa-user-circle user-icon"></i>
                            </button>
                            <div x-show="userMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-gray-800 ring-1 ring-black ring-opacity-5">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 dropdown-item">{{ __('Profil') }}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 dropdown-item">
                                        {{ __('Déconnexion') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Hamburger for mobile -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-gray-300 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                    {{ __('Accueil') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('books/display')" :active="request()->is('books.display')">
                    {{ __('Découvrir') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('')" :active="request()->is('')">
                    {{ __('À propos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('')" :active="request()->is('')">
                    {{ __('Annonce') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('')" :active="request()->is('')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
                @guest
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Connexion') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="url('')" :active="request()->is('')">
                        {{ __('Profil') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-900">
                            {{ __('Déconnexion') }}
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</header>

<!-- Search Bar Container -->
<div class="search-container">
    <form action="{{ route('search') }}" method="GET" class="search-bar">
        <input type="text" name="query" placeholder="Rechercher par Titre, Auteur, Éditeur ou ISBN" class="px-4 py-2 rounded-l bg-gray-200 text-black">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r">Rechercher</button>
    </form>
</div>

<body class="bg-gray-900 text-white">
    <main>
        {{ $slot }}
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</html>