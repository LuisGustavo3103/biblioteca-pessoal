@php
    use App\Enums\BookGenderEnum;
@endphp

@extends('layout.app')
@section('title', 'Livros')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Editar Livro</h1>
        </div>
        <div class="grid grid-cols-12 shadow p-5 w-full">
            <form class="{{ $book->image ? 'col-span-8' : 'col-span-12' }}" action="{{ route('books.update', $book) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-forms.input value="{{ $book->title }}" field="title" placeholder="Título" autofocus />
                <x-forms.input value="{{ $book->author }}" field="author" placeholder="Autor" />
                <x-forms.input value="{{ $book->publisher }}" field="publisher" placeholder="Editora" />
                <label for="sinopse">Sinopse
                    <textarea
                        class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 mb-2 w-full"
                        name="sinopse" id="sinopse" cols="30" rows="5">{{ $book->sinopse }}</textarea>
                </label>
                <label for="gender">Gênero
                    <select
                        class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 mb-2 w-full"
                        name="gender" id="gender">
                        <option>Escolha o Gênero</option>
                        @foreach (BookGenderEnum::cases() as $gender)
                            <option value="{{ $gender->value }}"
                                {{ $book->gender->value === $gender->value ? 'selected' : '' }}>
                                {{ $gender->label() }}
                            </option>
                        @endforeach
                    </select>
                </label>
                <x-forms.input value="{{ $book->publish_year }}" field="publish_year" placeholder="Ano de Publicação"
                    type="number" min="1500" max="2025" />

                <x-forms.input value="{{ $book->image }}" type="file" field="image" placeholder="Imagem"
                    isRequired="{{ false }}" />

                <div class="flex justify-end col-span-2 gap-2">
                    <a href="{{ url()->previous() }}">
                        <button class="bg-blue-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-blue-700"
                            type="button">
                            Voltar
                        </button>
                    </a>
                    <button type="submit"
                        class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">
                        Salvar
                    </button>
                </div>
            </form>
            @if ($book->image)
                <div class="col-span-4 flex justify-end">
                    <img class=" w-auto py-1 max-h-[500px]" src="{{ asset('storage/' . $book->image) }}" alt="">
                </div>
            @endif
        </div>

    </div>

@endsection
