<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageControlle;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\ProdutoController;
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


Route::get('/elements-for-sale', function(){
    return view('site.elements-for-sale');
});

Route::get('/element-cubes', function(){
    return view('site.element-cubes');
});

Route::get('/metal-cubes', function(){
    return view('site.metal-cubes');
});

Route::get('/rounds', function(){
    return view('site.rounds');
});

Route::get('/bullion', function(){
    return view('site.bullion');
});

Route::get('/domes', function(){
    return view('site.domes');
});

Route::get('/faq', function(){
    return view('site.faq');
});

//about us

Route::get('/contact', function () {
    return view('site.contact');
});

Route::get('/customer-reviews', function(){
    return view('site.customer-reviews');
});

Route::get('/gift-cards', function(){
    return view('site.gift-cards');
});

Route::get('/return-policy', function(){
    return view('site.return-policy');
});

Route::get('/privacy-policy', function(){
    return view('site.privacy-policy');
});

Route::get('/terms-of-service', function () {
    return view('site.terms-of-service');
});

Route::get('/forum', function(){
    return view('site.layoutprod');
});
//admin

Route::prefix('/painel')->group(function () {
    
Route::get('/', [PainelController::class, 'index'])->name('painel');

route::get('/login', [PainelController::class, 'login'])->name('login');
route::post('/login', [PainelController::class, 'loginAction']);

Route::match(['get' ,'post'],'/cadastro', [RegisterController::class, 'index'])->name('cadastro');
Route::post('cadastro',[RegisterController::class, 'register']); 

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

Route::match(['get', 'post'], '/cart', function () {
    return view('site.cart');
});
route::fallback([PageController::class, 'index']);