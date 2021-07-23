<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobrenosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ExemplosBladeController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;

// use Illuminate\Validation\Rules\In;

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
/*
    # Middleware
    // Middleware sendo chamado aqui em route
    // Route::middleware(LogAcessoMiddleware::class)->get('/', [PrincipalController::class, 'principal'])->name('site.index');
    // Middleware sendo chamado atravez de uma apelido definido em kernel protected $routeMiddleware
    // Route::middleware('log.acesso')->get('/sobre-nos', [SobrenosController::class, 'sobrenos'])->name('site.sobre-nos');
    // Middleware sendo chamado na classe controladora com metodo contrutor
    // Middleware podem ser chamado em todas as rotas se definido em kernel protected $middlewareGroups
*/

/*
    # Controllers resource
    # Route::resource(/rota, controller)
    # index()   -> exibir lista de registros                    GET|HEAD    | app/produto
    # store()   -> receber o formulario de criação              GET|HEAD    | app/produto
    # create()  -> exibir formularuio de criação do registro    POST        | app/produto/create
    # destroy() -> receber dados para remoção do registro       GET|HEAD    | app/produto/{produto}/edit
    # update()  -> receber o formulario de edição do registro   GET|HEAD    | app/produto/{produto}
    # show()    -> exibir registro especifico                   DELETE      | app/produto/{produto}
    # edit()    -> exibir formulario de edição do registro      PUT|PATCH   | app/produto/{produto}
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobrenosController::class, 'sobrenos'])->name('site.sobre-nos');

Route::get('/contato', [ContatoController::class, 'contato'])
    ->name('site.contato');
Route::post('/contato', [ContatoController::class, 'validar_salvar'])
    ->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

# agrupando rotes
Route::middleware('autenticacao','log.acesso')->prefix('/app')->group( function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');

    # fornecedor
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/pesquisar', [FornecedorController::class, 'pesquisar'])->name('app.fornecedor.pesquisar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{mensagem?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    Route::resource('cliente', ClienteController::class);
    Route::resource('pedido', PedidoController::class);
    Route::resource('produto', ProdutoController::class);
    Route::resource('/produto-detalhe', ProdutoDetalheController::class);
    // Route::resource('/pedido-produto', PedidoProdutoController::class);

    Route::post('/pedido-produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
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

# exemplos do blade
Route::get('/exemplos', [ExemplosBladeController::class, 'index']);

# passando parametros ao controlador
Route::get('/parametros/{p1}/{p2}', [ParametrosController::class, 'parametros'])->whereNumber('p1')->whereNumber('p2');

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
