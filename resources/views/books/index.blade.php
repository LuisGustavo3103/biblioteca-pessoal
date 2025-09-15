@php
    use App\Enums\BookGenderEnum;
@endphp

@extends('layout.app')
@section('title', 'Livros')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Livros</h1>
        </div>
        <form class="shadow p-5 w-full flex justify-between" action="{{ route('books.index') }}">
            <div>
                <input
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300"
                    type="text" placeholder="Buscar Titulo: " name="title" value="{{ request()->input('title') }}">
                <select
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300"
                    name="gender" id="gender">
                    <option value="">Escolha o Gênero</option>
                    @foreach (BookGenderEnum::cases() as $gender)
                        <option value="{{ $gender->value }}"
                            {{ request()->input('gender') === $gender->value ? 'selected' : '' }}>{{ $gender->label() }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                @if (request()->input('title') || request()->input('gender'))
                    <a href="{{ route('books.index') }}">
                        <button type="button"
                            class="bg-gray-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-gray-700">
                            Limpar Busca
                        </button>
                    </a>
                @endif
                <a href="{{ route('books.create') }}">
                    <button type="button"
                        class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">Cadastrar
                        Livro</button>
                </a>
                <button class="bg-gray-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-gray-700">Buscar</button>
            </div>
        </form>
        <div class="grid grid-cols-3 gap-4 mx-auto">
            @forelse ($books as $book)
                <div class="bg-gray-100 rounded p-2 shadow space-y-2 flex flex-col justify-between">
                    <div>
                        <div class="aspect-[3/2]">
                            <img class="object-cover w-full h-full"
                                src="{{ $book->image ? asset('storage/' . $book->image) : 'https://placehold.co/400' }}"
                                alt="{{ $book->title }}">
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <h2 class="font-bold py-2">{{ $book->title }}</h2>
                                <p><b>Gênero:</b> {{ $book->gender->label() }}</p>
                            </div>
                            <p class="text-justify"> {{ Str::limit($book->sinopse, 130) }} </p>
                            <div class="flex justify-between items-baseline">
                                <p class="font-bold">Autor: {{ $book->author }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end items-center space-x-2">
                        <a class="px-1" href="{{ route('books.edit', $book) }}">
                            <button type="submit"
                                class="bg-yellow-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-yellow-700">Editar</button>
                        </a>
                        <a href="{{ route('lends.create') }}">
                            <button
                                class="bg-green-500 p-1 rounded text-white cursor-pointer hover:bg-green-700">Reservar</button>
                        </a>
                        <a href="{{ route('books.show', $book) }}">
                            <button class="bg-blue-500 p-1 rounded text-white cursor-pointer hover:bg-blue-700">Ver
                                mais</button>
                        </a>
                    </div>
                </div>
            @empty
                <p class="shadow col-span-3 text-center p-5">Nenhum livro encontrado</p>
            @endforelse
            <div class="col-span-3">{{ $books->links() }}</div>
        </div>
    </div>

@endsection
