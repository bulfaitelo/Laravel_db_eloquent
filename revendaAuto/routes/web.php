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

Route::get('/addregistros', function () {
    $zero  = App\Categoria::create(['titulo'=>'Zero Km']);
    $semi  = App\Categoria::create(['titulo'=>'Seminovos']);
    $usado = App\Categoria::create(['titulo'=>'Usados']);

    $honda = App\Marca::create(['titulo'=> 'Honda', 'descricao'=> 'Carros Honda']);
    $chevrolet = App\Marca::create(['titulo'=> 'Chevrolet', 'descricao'=> 'Carros Chevrolet']);

    $Camaro = $chevrolet->carros()->create(['titulo'=>'Camaro', 'descricao'=>  'Automatico e Completo', 'ano'=>2017, 'valor'=>150000.00]);

    $Civic = App\Carro::create(['marca_id'=>'1', 'titulo'=>'Civic', 'descricao'=>'Automatico e Completo', 'ano'=>2017, 'valor'=>80000.00]);

    $Camaro->categorias()->attach($usado);
    $Camaro->categorias()->attach($semi);

    $categorias = [
      new App\Categoria(['titulo'=> 'Nacional']),
      new App\Categoria(['titulo'=> 'Destaque']),
      new App\Categoria(['titulo'=> 'Luxo'])
    ];
    $Civic->categorias()->saveMany($categorias);
    $Civic->categorias()->attach($semi);

    $usuario = App\User::find(1);

    $usuario->carros()->attach($Civic);
    $usuario->carros()->attach($Camaro);

    return "Registros Criados";

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
