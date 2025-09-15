@php
    use App\Enums\BookGenderEnum;
@endphp

@extends('layout.app')
@section('title', 'Livros')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Cadastrar Livro</h1>
        </div>
        <form class="shadow p-5 w-full grid grid-cols-2 gap-5" action="{{ route('books.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <x-forms.input field="title" placeholder="Título" autofocus />
            <x-forms.input field="author" placeholder="Autor" />
            <x-forms.input field="isbn" placeholder="ISBN" />
            <x-forms.input field="publisher" placeholder="Editora" />
            <label for="gender">Gênero
                <select
                    class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 mb-2 w-full"
                    name="gender" id="gender">
                    <option value="">Escolha o Gênero</option>
                    @foreach (BookGenderEnum::cases() as $gender)
                        <option value="{{ $gender->value }}">{{ $gender->label() }}
                        </option>
                    @endforeach
                </select>
            </label>
            <x-forms.input field="publish_year" placeholder="Ano de Publicação" type="number" min="1500"
                max="2025" />
            <x-forms.input field="sinopse" placeholder="Sinopse" />
            <x-forms.input type="file" field="image" placeholder="Imagem" />

            <div class="flex justify-end col-span-2 gap-2">
                <a href="{{ route('books.index') }}">
                    <button class="bg-blue-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-blue-700"
                        type="button">
                        Voltar
                    </button>
                </a>
                <button type="submit" class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>

@endsection
