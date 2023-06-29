<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $clientes = Cliente::query()
            ->where(function ($query) use ($search) {
                $query->where('nome', 'like', "%$search%")
                    ->orWhere('cpf', 'like', "%$search%");
            })
            ->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('clientes.index', [
            'clientes' => $clientes,
            'search' => $search,
            'mensagemSucesso' => $mensagemSucesso,
        ]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClientesFormRequest $request)
    {
        $cpf = $request->input('cpf');

        if (Cliente::where('cpf', $cpf)->exists()) {
            throw ValidationException::withMessages([
                'cpf' => 'O CPF já está cadastrado.',
            ])->redirectTo(route('clientes.create'));
        }

        $fillableAttributes = (new Cliente)->getFillable();
        $rules = [];
        foreach ($fillableAttributes as $attribute) {
            $rules[$attribute] = 'required';
        }

        $request->validate($rules);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('mensagem.sucesso', "Cliente '{$cliente->nome}' cadastrado com sucesso.");
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        //$request->session()->flash();

        return redirect()->route('clientes.index')
            ->with('mensagem.sucesso', "Cliente '{$cliente->nome}' removido com sucesso");
    }

    public function edit(Cliente $cliente)
    {
        //dd($cliente->eventos); // É possível pegar apenas eventos específicos
        return view('clientes.edit')->with('cliente', $cliente);
    }

    public function update(Cliente $cliente, ClientesFormRequest $request)
    {
        $cliente->fill($request->all()); // Todos os atributos
        $cliente->save();

        return redirect()->route('clientes.index')
            ->with('mensagem.sucesso', "Cliente '{$cliente->nome}' atualizado com sucesso");
    }

}
