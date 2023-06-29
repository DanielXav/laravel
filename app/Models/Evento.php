<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf_cliente', 'tipo', 'orcamento', 'data_evento', 'rua', 'numero', 'bairro', 'cidade', 'CEP'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cpf_cliente', 'cpf');
    }
}
