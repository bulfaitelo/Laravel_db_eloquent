<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/aula5banco1', function() {
    $clientes = DB::connection('mysql2')->select('select * from db_clientes');
    dd($clientes);
});

Route::get('/aula5banco2', function() {
    $cliente = DB::connection('mysql2')->select('select * from db_clientes as cli
      inner join db_telefones as tel on tel.codigo_cliente = cli.codigo
      inner join db_clientes_has_db_tipos as rel_tipos on rel_tipos.codigo_cliente = cli.codigo
      inner join db_tipos as tipo on tipo.codigo = rel_tipos.codigo_tipo
      where cli.codigo = 3

      ');
    dd($cliente);
});

Route::get('/aula6banco1', function() {
    $clientes = DB::connection('mysql2')->table('db_clientes')->get();
    $cliente = DB::connection('mysql2')->table('db_clientes')->where('codigo', 1)->first();
    $telefones = DB::connection('mysql2')
      ->table('db_clientes')
      ->join('db_telefones', 'db_telefones.codigo_cliente', '=', 'db_clientes.codigo')
      ->select('db_clientes.*', 'db_telefones.numero')
      ->where('db_clientes.codigo','3')
      ->get();

      
    // dd($clientes);
    // dd($cliente);
    dd($telefones);
});

Route::get('/testeuser', function() {
    // $lista = App\User::where('id', 1)->count();
    $lista = App\User::all();

    // $maria = new App\User();
    // $maria->name = 'Maria';
    // $maria->email = 'mara@gmail.com';
    // $maria->password = bcrypt('123456');
    // $maria->save();

    $testeMaria = App\User::find(2); 
    dd($lista);
});

Route::get('/aula8banco1', function() {
    // $lista = App\Cliente::all();
    // $lista = App\Telefone::all();
    // $cliente = App\Cliente::find(1);
    // dd($cliente->telefone);

    $telefone = App\Telefone::find(1);
    dd($telefone->cliente);
});

Route::get('/', function () {
    $slides = [
      (object)[
        'titulo'=>'Título Imagem',
        'descricao'=>'Descrição Imagem',
        'url'=>'#link',
        'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'

      ]
    ];

    $carros = [
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ]
  ];

    return view('site.home',compact('slides','carros'));
});

Auth::routes();

Route::get('/contato',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.contato',compact('galeria'));
});
Route::get('/detalhe',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.detalhe',compact('galeria'));
});
Route::get('/empresa',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.empresa',compact('galeria'));
});

Route::get('/home', 'HomeController@index');
