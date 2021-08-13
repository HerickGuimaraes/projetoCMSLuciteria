<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageControlle;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoControllerSite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingControler;
use App\Http\Controllers\site\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/forum', [ProdutoControllerSite::class, 'index']);
//admin

Route::prefix('/painel')->group(function () {
    
Route::get('/', [PainelController::class, 'index'])->name('painel');

route::get('/login', [PainelController::class, 'login'])->name('login');
route::post('/login', [PainelController::class, 'loginAction']);

Route::match(['get' ,'post'],'/cadastro', [ClienteController::class, 'cadastrar'])->name('cadastrar');


route::match(['get', 'post'], '/logout',[PainelController::class, 'logout']);   

Route::resource('users', UserController::class);

route::get('perfil', [ProfileController::class, 'index'])->name('perfil');
route::put('perfilsalve', [ProfileController::class, 'save'])->name('perfil.salve');

route::get('configuracoes', [SettingControler::class,'index'])->name('configuracoes');
route::put('configuracoessalve', [SettingControler::class, 'save'])->name('configuracoes.salve');

Route::resource('produtos', ProdutoController::class);

Route::resource('categorias', CategoriaController::class);

Route::resource('pages', PageControlle::class);
});

//carrinho

Route::match(['get', 'post'], '/carrinho',[ProdutoControllerSite::class, 'carrinho'])->name('carrinho');

Route::match(['get', 'post'], '/{idproduto}/carrinho/adc',[ProdutoControllerSite::class, 'adicionarCarrinho'])->name('adicionar_carrinho');

Route::match(['get', 'post'], '/{indice}/carrinho/exc',[ProdutoControllerSite::class, 'excluirCarrinho'])->name('excluir_carrinho');

route::fallback([PageController::class, 'index']);