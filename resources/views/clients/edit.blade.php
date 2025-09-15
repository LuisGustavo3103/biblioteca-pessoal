@extends('layout.app')
@section('title', 'Editar Usuário')
@section('content')
    <div class="max-w-7xl mx-auto space-y-5 py-5">
        <div class="bg-gray-100 rounded p-2 shadow space-y-2">
            <h1 class="text-center text-3xl">Editar Usuário</h1>
        </div>
        <div class="bg-gray-100 rounded p-5 shadow space-y-2">
            <form class="grid grid-cols-2 space-x-2" action="{{ route('clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT')
                <x-forms.input field="name" placeholder="Nome" autofocus value="{{ $client->name }}" />
                <x-forms.input field="email" placeholder="E-mail" value="{{ $client->email }}" />
                <x-forms.input field="phone" placeholder="Telefone" value="{{ $client->phone }}" />
                <x-forms.input field="address" placeholder="Logradouro" value="{{ $client->address }}" />
                <x-forms.input field="neighborhood" placeholder="Bairro" value="{{ $client->neighborhood }}" />
                <x-forms.input field="city" placeholder="Cidade" value="{{ $client->city }}" />
                <x-forms.input field="state" placeholder="Estado" value="{{ $client->state }}" />
                <x-forms.input field="zip_code" placeholder="CEP" value="{{ $client->zip_code }}" />
                <div class="flex justify-end col-span-2 p-2 space-x-2">
                    <a href="{{ route('clients.index') }}">
                        <button class="bg-blue-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-blue-700"
                            type="button">
                            Voltar
                        </button>
                    </a>
                    <button type="submit"
                        class="bg-green-500 py-1 px-4 rounded text-white cursor-pointer hover:bg-green-700">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
