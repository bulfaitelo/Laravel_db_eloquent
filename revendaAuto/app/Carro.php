<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'ano', 'valor'
    ];
}
