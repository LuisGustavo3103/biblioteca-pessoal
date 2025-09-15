@php
    use App\Enums\BookGenderEnum;
@endphp

@extends('layout.app')
@section('title', 'Livros')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Clientes</h1>
        </div>
        <form class="shadow p-5 w-full flex justify-between" action="{{ route('clients.index') }}">
            <div>
                <input
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300"
                    type="text" placeholder="Buscar Cliente: " name="name" value="{{ request()->input('name') }}">
                <input
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300"
                    type="text" placeholder="Buscar E-mail: " name="email" value="{{ request()->input('email') }}">
            </div>
            <div>
                @if (request()->input('name') || request()->input('email'))
                    <a href="{{ route('clients.index') }}">
                        <button type="button"
                            class="bg-gray-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-gray-700">
                            Limpar Busca
                        </button>
                    </a>
                @endif
                <button type="submit"
                    class="bg-gray-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-gray-700">Buscar</button>
                <a href="{{ route('clients.create') }}">
                    <button type="button"
                        class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">Cadastrar</button>
                </a>
            </div>
        </form>
        @forelse ($clients as $client)
            <div class="bg-gray-100 rounded p-2 shadow space-y-2 flex justify-between items-baseline-last">
                <div>
                    <p>
                        Nome: {{ $client->name }}
                    </p>
                    <p>
                        E-mail: {{ $client->email }}
                    </p>
                    <p>
                        Telefone: {{ $client->phone }}
                    </p>
                    <p>
                        Endereço: {{ $client->address }}, {{ $client->neighborhood }},
                        {{ $client->city }}-{{ $client->state }} - {{ $client->zip_code }}
                    </p>
                </div>
                <div class="flex">
                    <a class="px-1" href="{{ route('clients.edit', $client) }}">
                        <button type="submit"
                            class="bg-yellow-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-yellow-700">Editar</button>
                    </a>
                    <form class="px-1" action="{{ route('clients.destroy', $client) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja realmente excluir?')"
                            class="bg-red-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-red-700">Excluir</button>
                    </form>
                </div>
            </div>
        @empty
        @endforelse
    </div>

@endsection
