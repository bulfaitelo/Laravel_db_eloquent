<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'db_clientes';
    protected $primaryKey = 'codigo';

    public function telefones() {
    	return $this->hasMany('App\Telefone', 'codigo_cliente');
    }

}
