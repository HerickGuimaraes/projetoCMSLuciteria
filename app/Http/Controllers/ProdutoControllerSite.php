<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoControllerSite extends Controller
{
    public function index(Request $request){
        $data = [];

        $listaProdutos = Produto::all();
        $data['lista'] = $listaProdutos;

        return view('site.layoutprod', $data);
    }
    public function adicionarCarrinho( Request $request, $idproduto = 0){
        $prod = Produto::find($idproduto);

        if($prod){

            $carrinho = session('cart', []);

            array_push($carrinho, $prod);

            session(['cart' => $carrinho]);

        }
        return Redirect()->route('home');

    }
    public function carrinho( Request $request){

        $carrinho = session('cart', []);
        $data = ['cart'=> $carrinho];


        return view('site.cart', $data);
    }
    public function excluirCarrinho(request $request, $indice){

        $carrinho = session('cart', []);

        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        session(['cart' => $carrinho]);
        return redirect()->route('carrinho');

    }
}
