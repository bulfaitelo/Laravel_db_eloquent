<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'db_tipos';
    protected $primaryKey = 'codigo';

    public function clientes() {
    	return $this->belongsToMany('App\Cliente', 'db_clientes_has_db_tipos', 'codigo_tipo', 'codigo_cliente');
    }

}
