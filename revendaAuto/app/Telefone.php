<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'db_telefones';
    protected $primaryKey = 'codigo';

    public function cliente() {
    	return $this->belongsTo('App\Cliente', 'codigo_cliente');
    }

}
