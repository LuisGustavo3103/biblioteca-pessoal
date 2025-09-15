<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Biblioteca</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <nav
        class="relative bg-gray-800 dark:bg-gray-800 dark:after:pointer-events-none dark:after:absolute dark:after:inset-x-0 dark:after:bottom-0 dark:after:h-px dark:after:bg-white/10">
        <div class="mx-auto max-w-7xl">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:block">
                        <div class="flex space-x-4">
                            <a href="{{ route('books.index') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('books.*') ? 'bg-gray-900 text-white dark:bg-gray-950/50' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">Livros</a>
                            <a href="{{ route('clients.index') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('clients.*') ? 'bg-gray-900 text-white dark:bg-gray-950/50' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">Clientes</a>
                            <a href="{{ route('lends.index') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('lends.*') ? 'bg-gray-900 text-white dark:bg-gray-950/50' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">Reservas</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <form action="{{ route('users.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-gray-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-gray-700">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="block sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="{{ route('books.index') }}" aria-current="page"
                    class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('books.*') ? 'bg-gray-900 text-white dark:bg-gray-950/50' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">Livros</a>
                <a href="{{ route('clients.index') }}"
                    class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('clients.*') ? 'bg-gray-900 text-white dark:bg-gray-950/50' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">Clientes</a>
            </div>
        </el-disclosure>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
