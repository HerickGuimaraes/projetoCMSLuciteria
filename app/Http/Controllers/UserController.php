<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:edit-users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $enderecos = Endereco::all();
        $loggedId = intval(Auth::id());

        return view('admin.usuarios',[
            'users' => $users,
            'loggedId' => $loggedId,
            'enderecos' => $enderecos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'nome',
            'email',
            'password',
            'password_confirmation'
        ]);

        $validator = Validator::make($data, [
            'nome' => ['required', ' string', 'max:100'],
            'email' => ['required', ' string', 'max:255', 'email', 'unique:users'],
            'password' => ['required', ' string', 'min:3', 'confirmed']
        ]);
        
        if($validator->fails()){
            return redirect()->route('users.create')
            ->withErrors($validator)
            ->withInput();
        }

        $user = new User;
        $user->nome = $data['nome'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect('painel/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if($user) {
        return view('admin.usuarios.edit', ['user' => $user]);
        }

        return redirect('painel/users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
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
            return redirect()->route('users.edit', ['user' =>$id])
                ->withErrors($validator);
        }

       $user->save();
       return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loggedId = intval(Auth::id());

        if($loggedId !== intval($id)) {
            $user = User::find($id);
            $user->delete();
        }

        return redirect()->route('users.index');
    }
    
}
