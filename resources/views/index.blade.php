<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="flex min-h-full">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <h2 class="mt-8 text-2xl/9 font-bold tracking-tight text-gray-900 ">Entre na sua
                        conta</h2>
                </div>

                <div class="mt-10">
                    <div>
                        <form action="{{ route('users.login') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input id="email" type="email" name="email" required autocomplete="email"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6" />
                                </div>
                            </div>

                            <div>
                                <label for="password" class="block text-sm/6 font-medium text-gray-900">Senha</label>
                                <div class="mt-2">
                                    <input id="password" type="password" name="password" required
                                        autocomplete="current-password"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6" />
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex gap-3">
                                    <div class="flex h-6 shrink-0 items-center">
                                        <div class="group grid size-4 grid-cols-1">
                                            <input id="remember-me" type="checkbox" name="remember" value="1"
                                                class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-gray-600 checked:bg-gray-600 indeterminate:border-gray-600 indeterminate:bg-gray-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100" />
                                            <svg viewBox="0 0 14 14" fill="none"
                                                class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="opacity-0 group-has-checked:opacity-100" />
                                                <path d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="opacity-0 group-has-indeterminate:opacity-100" />
                                            </svg>
                                        </div>
                                    </div>
                                    <label for="remember-me" class="block text-sm/6 text-gray-900">Manter
                                        conectado</label>
                                </div>

                                <div class="text-sm/6">
                                    <a href="#" class="font-semibold text-gray-600 hover:text-gray-500">Esqueceu
                                        a senha?</a>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 cursor-pointer">Entrar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <img src="{{ asset('images/arif-riyanto-UD9nADGj2mc-unsplash.jpg') }}" alt=""
                class="absolute inset-0 size-full object-cover" />
        </div>
    </div>
</body>

</html>
