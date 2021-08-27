<?php

namespace App\Service;

use App\Models\Endereco;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Itens_Pedido;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendaService
{
    public function finalizarVenda( User $user, $prods = []){
        
        try{
            DB::beginTransaction();
            $dtHoje = new \DateTime();

            $pedido = new Pedido();

            $pedido->datapedido = $dtHoje->format("Y-m-d H:i:s");
            $pedido->status = "PEN";
            $pedido->user_id = $user->id;
            
            $pedido->save();

            foreach($prods as $p){
                $itens = new Itens_Pedido();
                $itens->quantidade = 1;
                $itens->valor = $p->valor;
                $itens->dt_item = $dtHoje->format("Y-m-d H:i:s");
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();

            }
            DB::commit();
            return ['status' => 'ok', 'message'=> 'Compra realizada com sucesso'];
        }catch(\Exception $e){
            DB::rollBack();
            Log::error("ERROR:VENDA SERVICE",['message' => $e->getMessage()]);
            return ['status' => 'error', 'message'=> 'Comprar não realizada'];
        }
    }
}