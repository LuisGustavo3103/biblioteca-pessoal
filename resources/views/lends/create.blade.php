@extends('layout.app')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Reservar</h1>
        </div>
        <div class="shadow p-5 w-full">
            <form class="grid grid-cols-2 gap-2" action="{{ route('lends.store') }}" method="POST">
                @csrf
                <label class="flex flex-col" for="book">Livro
                    <select
                        class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300"
                        name="book_id" id="book_id" required>
                        <option value="">Escolha o livro</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}"
                                {{ (int) request()->get('livro') === $book->id ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </label>
                <label class="flex flex-col" for="person">Cliente
                    <select
                        class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300"
                        name="person_id" id="person_id" required>
                        <option value="">Escolha o cliente</option>
                        @foreach ($persons as $person)
                            <option value="{{ $person->id }}"
                                {{ request()->input('person_id') === $person->id ? 'selected' : '' }}>
                                {{ $person->name }}
                            </option>
                        @endforeach
                    </select>
                </label>
                <x-forms.input type="date" field="expected_return_date" placeholder="Data Prevista do Retorno"
                    min="{{ date('Y-m-d') }}" lang="pt-BR" />
                <x-forms.input isRequired="{{ false }}" field="description" placeholder="Descrição" />
                <div class="flex justify-end space-x-1.5 col-span-2">
                    <a href="{{ url()->previous() }}">
                        <button class="bg-blue-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-blue-700"
                            type="button">
                            Voltar
                        </button>
                    </a>
                    <button type="submit"
                        class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">
                        Reservar
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
