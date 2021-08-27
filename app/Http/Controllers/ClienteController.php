<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use App\Service\ClienteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function cadastrar(Request $request){
        $data = [];

        return view('admin.cadastro', $data);
    }

    public function cadastrarCliente(Request $request){

        $values = $request->all();
        $usuario = new User();
        $usuario->fill($values);

        $senha = $request->input("password", "");
        $usuario->password = Hash::make($senha);
        

        $enderecos = new Endereco($values);
        
        $clienteService = new ClienteService;
        $resultado = $clienteService->SalvarUsuario($usuario, $enderecos);

        $message = $resultado['message'];
        $status = $resultado['status'];

        $request->session()->flash($status, $message);

        return redirect()->route('cadastrar');

    }
}
