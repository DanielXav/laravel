<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        $dados = [
            ['coluna1' => '21/01/2022', 'coluna2' => 'R$ 2.500'],
            ['coluna1' => '22/01/2022', 'coluna2' => 'R$ 5.000'],
            ['coluna1' => '23/01/2022', 'coluna2' => 'R$ 10.000'],
        ];

        return view('relatorio.index', ['dados' => $dados]);
    }
}
