<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'cpf', 'telefone', 'email']; // Adiciona todos os parâmetros necessários
    //protected  $with = ['eventos']; // Sempre que buscar um cliente vai trazer as temporadas

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }
}
