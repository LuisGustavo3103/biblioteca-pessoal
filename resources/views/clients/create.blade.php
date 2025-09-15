@extends('layout.app')
@section('title', 'Livros')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Cadastrar</h1>
        </div>
        <div class="bg-gray-100 rounded p-5 shadow space-y-2">
            <form class="grid grid-cols-2 space-x-2" action="{{ route('clients.store') }}" method="POST">
                @csrf
                <x-forms.input field="name" placeholder="Nome" autofocus />
                <x-forms.input field="email" placeholder="E-mail" />
                <x-forms.input field="phone" placeholder="Telefone" />
                <x-forms.input field="address" placeholder="Logradouro" />
                <x-forms.input field="neighborhood" placeholder="Bairro" />
                <x-forms.input field="city" placeholder="Cidade" />
                <x-forms.input field="state" placeholder="Estado" />
                <x-forms.input field="zip_code" placeholder="CEP" />
                <div class="flex justify-end col-span-2 space-x-2">
                    <a href="{{ route('clients.index') }}">
                        <button class="bg-blue-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-blue-700"
                            type="button">
                            Voltar
                        </button>
                    </a>
                    <button type="submit"
                        class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
