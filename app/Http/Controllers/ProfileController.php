<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $loggedId = intval(Auth::id() );

        $user = User::find($loggedId);

        if($user){
            return view('admin.usuarios.perfil',[
                'user' => $user
            ]);
        }

        return redirect()->route('painel');
        
    }
    public function save(Request $request){
        $loggedId = intval(Auth::id() );
        $user = User::find($loggedId);

        if($user){
            $data = $request->only([
            'nome',
            'email',
            'password',
            'password_confirmation'
            ]);
            $validator = Validator::make([
                'nome' =>$data['nome'],
                'email' =>$data['email']
            ], [
                'nome' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'max:100', 'email']
            ]);

            
        }
        //Alteração do nome
        $user->nome = $data['nome'];
        //Verificação de alteração no email
        if($user->email != $data['email']){
            //Verificação se o email existe
            $hasEmail = User::where('email', $data['email'])->get();
            //Alteração do email
           if(count($hasEmail) === 0){
                $user->email = $data['email'];
           }else {
            $validator->errors()->add('email',__('validation.unique',[
                'attribute' => 'email'
            ]));
           }
        }
        //Alteração e senha
        if(!empty($data['password'])){
            if(strlen($data['password']) >= 4){
                if($data['password'] === $data['password_confirmation']){
                $user->password = Hash::make($data['password']);
                }else{
                    $validator->errors()->add('password',__('validation.confirmed',[
                        'attribute' => 'password',
                    ]));
                }
            }else{
                $validator->errors()->add('password',__('validation.min.string',[
                    'attribute' => 'password',
                    'min' => 4
                ]));
                
            }     
        }
        if(count($validator->errors() )>0){
            return redirect()->route('perfil', [
                'user' =>$loggedId
                ])->withErrors($validator);
        }

       $user->save();
       
       return redirect()->route('perfil')
       ->with('warning', 'Informaçoes alteradas com sucesso!');
    }

    
}
