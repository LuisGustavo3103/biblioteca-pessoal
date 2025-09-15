@extends('layout.app')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Livros Reservados</h1>
        </div>
        <form class="shadow p-5 w-full flex justify-between" action="{{ route('lends.index') }}">
            <div>
                <input
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300"
                    type="text" placeholder="Buscar por e-mail: " name="title" value="{{ request()->input('email') }}">
            </div>
            <div>
                @if (request()->input('email'))
                    <a href="{{ route('lends.index') }}">
                        <button type="button"
                            class="bg-gray-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-gray-700">
                            Limpar Busca
                        </button>
                    </a>
                @endif
                <a href="{{ route('lends.create') }}">
                    <button type="button"
                        class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">Reservar
                        Livro</button>
                </a>
                <button class="bg-gray-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-gray-700">Buscar
                    Reserva</button>
            </div>
        </form>
        <div class="grid grid-cols-3 gap-4 mx-auto">
            @forelse ($lends as $lend)
                <div class="bg-gray-100 rounded p-2 shadow space-y-2 flex flex-col justify-between">
                    <p> {{ $lend->book->title }} </p>
                    <p> {{ $lend->person->name }} </p>
                    <p> {{ $lend->status->label() }} </p>
                    <div class="flex justify-end items-center">
                        <a class="px-1" href="{{ route('lends.edit', $lend) }}">
                            <button type="submit"
                                class="bg-yellow-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-yellow-700">Editar</button>
                        </a>
                    </div>
                </div>
            @empty
                <p class="shadow col-span-3 text-center p-5">Nenhuma reserva encontrada</p>
            @endforelse
            <div class="col-span-3">{{ $lends->links() }}</div>
        </div>
    </div>
@endsection
