<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobrenosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ParametrosController;
use Illuminate\Validation\Rules\In;

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

// Route::get('/', function () {
//     return view('welcome');
// });


# metodo http (GET, POST, PATCH, DELETE, PUT)
# rota '/abc'
# classe/controller [classe::class, 'metodo']
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [SobrenosController::class, 'sobrenos'])->name('site.sobre-nos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login', function(){ return 'login';})->name('site.login');

# agrupando rotes
Route::prefix('/app')->group( function () {
    Route::get('/clientes', function(){ return 'clientes';})->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.forenecedores');

    Route::get('/produtos', function(){ return 'produtos';})->name('app.produtos');
});

# Redirecionando de rotas
Route::get('/promocao', function () {
    echo 'promoção';
})->name('site.promocao');

## utilizando redirect()
Route::redirect('/publicidade1', '/promocao');
## utilizando uma return | pode ser implementado dentro de um controller
Route::get('/publicidade2', function () {
    return redirect()->route('site.promocao');
})->name('site.publicidade2');

# fallback é apresentado quando nenhum rota é encontrada
Route::fallback(function () {
    echo '<h1>Esta pagina não esta disponivel</h1>';
    echo '<ul><li><a href="' . route('site.index') . '">Home</a></li></ul>';
});

# passando parametros ao controlador
Route::get('parametros/{p1}/{p2}', [ParametrosController::class, 'parametros'])->whereNumber('p1')->whereNumber('p2');

// # pasando pararemetros na url
// ## parametros opcionais recebem ?
// Route::get(
//     '/contato/{nome}/{idade?}/{sexo?}',
//     function ($nome, $idade, $sexo = 'não informado') {
//         echo "Olá $nome você tem $idade anos e seu sexo é $sexo";
//     }
// );

// ## validação de paremetros
// ### definando o tipo de variavel
// Route::get(
//     '/contato/{nome}/{contato_id}',
//     function (
//         string $nome,
//         int $contato_id = 1)
//     {
//         echo "Nome $nome | contato_id $contato_id";
//     }
// );

// ### expressões regulares ou nativas do laravel
// Route::get(
//     '/contato/{nome}/{contato_id}/{email?}',
//     function (
//         string $nome,
//         int $contato_id = 1,
//         string $email = 'não informado')
//     {
//         echo "Nome: $nome | contato_id: $contato_id | email: $email";
//     }
// )->where(['contato_id' => '[0-9]+', 'email' => '[/^\S+@\S+\.\S+$/]+'])->whereAlpha('nome');
