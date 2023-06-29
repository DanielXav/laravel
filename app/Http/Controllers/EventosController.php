<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventosFormRequest;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Cliente;

class EventosController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $eventos = Evento::whereHas('cliente', function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('nome', 'like', "%$search%")
                    ->orWhere('cpf', 'like', "%$search%");
            });
        })->orWhere('nome', 'like', "%$search%")
            ->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('eventos.index', [
            'eventos' => $eventos,
            'search' => $search,
            'mensagemSucesso' => $mensagemSucesso,
        ]);
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(EventosFormRequest $request)
    {
        $cliente = Cliente::where('cpf', $request->cpf_cliente)->first();

        if (!$cliente) {
            return redirect()->route('eventos.create')
                ->withInput($request->input())
                ->with('mensagemErro', 'O CPF do cliente informado não existe.');
        }

        $evento = Evento::create($request->all());

        return redirect()->route('eventos.index')
            ->with('mensagem.sucesso', "Evento '{$evento->nome}' adicionado com sucesso");
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();

        return to_route('eventos.index')
            ->with('mensagem.sucesso', "Evento '{$evento->nome}' removido com sucesso");
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit')->with('evento', $evento);
    }

    public function update(Evento $evento, EventosFormRequest $request)
    {
        $cliente = Cliente::where('cpf', $request->cpf_cliente)->first();

        if (!$cliente) {
            return redirect()->route('eventos.edit', $evento->id)
                ->withInput($request->input())
                ->with('mensagemErro', 'O CPF do cliente informado não existe.');
        }

        $evento->fill($request->all());
        $evento->save();

        return redirect()->route('eventos.index')
            ->with('mensagem.sucesso', "Evento '{$evento->nome}' atualizado com sucesso");
    }

}
