<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'titulo', 'descricao',
    ];

    public function carros()
    {
    	retusn $this->hasMany('App\Carro');
    }
}
