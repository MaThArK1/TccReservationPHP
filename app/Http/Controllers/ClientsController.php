<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        
        return view('clients.index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request) 
    {
        Client::create($request->all());

        return redirect()->route('clients-index');
    }

    public function edit($id)
    {
        $selectedClient = Client::where('id', $id)->first();
        if(!empty($selectedClient)) {
            return view('clients.edit', ['client' => $selectedClient]);
        } else {
            return redirect()->route('clients-index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'cpfCnpj' => $request->cpfCnpj,
            'phoneNumber' => $request->phoneNumber
        ];

        Client::where('id', $id)->update($data);
        return redirect()->route('clients-index');
    }

    public function destroy($id)
    {
        Client::where('id', $id)->delete();
        return redirect()->route('clients-index');
    }
}
