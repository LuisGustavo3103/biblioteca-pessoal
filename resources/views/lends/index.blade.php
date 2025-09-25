@php
    use App\Enums\LendStatusEnum;
@endphp
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
                    <p>Livro: {{ $lend->book->title }} </p>
                    <p>Cliente: {{ $lend->person->name }} </p>
                    <p>Data prevista: {{ $lend->expected_return_date->format('d/m/Y') }} </p>
                    <p>Status: {{ $lend->status->label() }} </p>
                    @if ($lend->returne_date)
                        <p>Data da devolução: {{ $lend->returne_date->format('d/m/Y') }}</p>
                    @endif

                    @if ($lend->status == LendStatusEnum::IN_PROGRESS)
                        <div class="flex justify-end items-center">
                            <form action="{{ route('lends.update', $lend) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" onclick="return confirm('Deseja realmente excluir?')"
                                    class="bg-amber-400 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">Devolução</button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <p class="shadow col-span-3 text-center p-5">Nenhuma reserva encontrada</p>
            @endforelse
            <div class="col-span-3">{{ $lends->links() }}</div>
        </div>
    </div>
@endsection
