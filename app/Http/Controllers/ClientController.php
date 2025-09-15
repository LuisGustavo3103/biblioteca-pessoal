<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Person;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $searchName = $request->input('name');
        $searchEmail = $request->input('email');

        $clients = Person::query()
            ->when($searchName, function ($query) use ($searchName) {
                $query->where('name', 'like', '%' . $searchName . '%');
            })
            ->when($searchEmail, function ($query) use ($searchEmail) {
                $query->where('email', 'like', '%' . $searchEmail . '%');
            })
            ->orderByDesc('created_at')
            ->get();


        return view('clients.index', [
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(CreateRequest $request)
    {
        $incomingFields = $request->validated();


        try {
            Person::create([
                'name' => data_get($incomingFields, 'name'),
                'email' => data_get($incomingFields, 'email'),
                'phone' => data_get($incomingFields, 'phone'),
                'address' => data_get($incomingFields, 'address'),
                'neighborhood' => data_get($incomingFields, 'neighborhood'),
                'city' => data_get($incomingFields, 'city'),
                'zip_code' => data_get($incomingFields, 'zip_code'),
                'state' => data_get($incomingFields, 'state'),
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Erro ao cadastrar o cliente. ' . $e->getMessage());
        }

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function destroy(Person $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }

    public function edit(Person $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    public function update(CreateRequest $request, Person $client)
    {
        $incomingFields = $request->validated();

        try {
            $client->update([
                'name' => data_get($incomingFields, 'name'),
                'email' => data_get($incomingFields, 'email'),
                'phone' => data_get($incomingFields, 'phone'),
                'address' => data_get($incomingFields, 'address'),
                'neighborhood' => data_get($incomingFields, 'neighborhood'),
                'city' => data_get($incomingFields, 'city'),
                'zip_code' => data_get($incomingFields, 'zip_code'),
                'state' => data_get($incomingFields, 'state'),
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Erro ao editar o cliente. ' . $e->getMessage());
        };

        return redirect()->route('clients.index')->with('success', 'Cliente editado com sucesso!');
    }
}
