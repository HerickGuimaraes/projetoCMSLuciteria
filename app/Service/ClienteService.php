<?php

namespace App\Service;

use App\Models\Endereco;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteService
{
    public function SalvarUsuario(User $usuario, Endereco $enderecos){
        try{

            DB::beginTransaction();
            $usuario->save();
            $enderecos->user_id = $usuario->id;
            $enderecos->save();
            DB::commit();

            return ['status' => 'success', 'message'=>'Usuario Cadastrado com sucesso'];

        }catch(\Exception $e){
            Log::error("ERROR", ['file'=>'ClienteService.SalvarUsuario',
                                            'message'=>$e->getMessage()]);
            DB::rollBack();

            return ['status' => 'ERROR', 'message'=>'Usuario não Cadastrado'];
        }

    }

}