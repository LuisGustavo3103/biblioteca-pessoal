@php
    use App\Enums\BookGenderEnum;
@endphp

@extends('layout.app')
@section('title', 'Livros')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">{{ $book->title }}</h1>
        </div>
        <div class="shadow p-5 w-full grid grid-cols-12">
            <div class="col-span-8">
                <div class="px-4 sm:px-0">
                    <h3 class="text-base/7 font-semibold text-gray-900 ">Título do livro:</h3>
                    <p class="mt-1 max-w-2xl text-sm/6 text-gray-5">{{ $book->title }}</p>
                </div>
                <div>
                    <dl class="grid grid-cols-1 col-span-8 sm:grid-cols-2">
                        <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0 dark:border-white/10">
                            <dt class="text-sm/6 font-medium text-gray-900 ">Autor</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:mt">{{ $book->author }}</dd>
                        </div>
                        <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0 dark:border-white/10">
                            <dt class="text-sm/6 font-medium text-gray-900 ">Gênero</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:mt">{{ $book->gender->label() }}</dd>
                        </div>
                        <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0 dark:border-white/10">
                            <dt class="text-sm/6 font-medium text-gray-900 ">ISBN</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:mt">{{ $book->isbn }}</dd>
                        </div>
                        <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0 dark:border-white/10">
                            <dt class="text-sm/6 font-medium text-gray-900 ">Editora</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:mt">{{ $book->publisher }}</dd>
                        </div>
                        <div class="border-t border-gray-100 px-4 py-6 sm:col-span-2 sm:px-0 dark:border-white/10">
                            <dt class="text-sm/6 font-medium text-gray-900 ">Sinopse</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:mt">{{ $book->sinopse }}</dd>
                        </div>
                        <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0 dark:border-white/10">
                            <dt class="text-sm/6 font-medium text-gray-900 ">Ano de publicação</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:mt">{{ $book->publish_year }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="col-span-4 flex justify-end">
                <img class="w-auto py-1 max-h-[500px]" src="{{ asset('storage/' . $book->image) }}" alt="">
            </div>
            <div class="flex justify-end items-center space-x-2 col-span-12 pt-5">
                <a href="{{ route('books.index') }}">
                    <button class="bg-blue-500 p-1 rounded text-white cursor-pointer hover:bg-blue-700">Voltar</button>
                </a>
                <a class="px-1" href="{{ route('books.edit', $book) }}">
                    <button type="submit"
                        class="bg-yellow-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-yellow-700">Editar</button>
                </a>
            </div>
        </div>
    </div>

@endsection
