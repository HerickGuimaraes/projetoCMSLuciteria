<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Endereco;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        
        return view('admin.cadastro');
    }
    public function register(Request $request){
        $data = $request->only([
            'nome',
            'email',
            'cpf',
            'logadouro',
            'numero',
            'cidade',
            'estado',
            'cep',
            'complemento',
            'password',
            'password_confirmation'
        ]);
        $validator = $this->validator($data);

        if($validator->fails()) {
            return redirect()->route('cadastro')->withErrors($validator)->withInput();
        }
        $user = $this->create($data);
        if($user && $user->id) {
            $id = $user->id;
            $endereco = new Endereco();
            $endereco->create([
            'logadouro' => $data['logadouro'],
            'numero' => $data['numero'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'cep' => $data['cep'],
            'complemento' => $data['complemento'],
            'user_id' => $id
            ]);
        }
        Auth::login($user);
        return redirect()->route('painel');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'cpf' =>['required', 'string', 'max:11', 'unique:users'],
            'logadouro' =>['required','string'],
            'numero' =>['required', 'string'],
            'cidade' =>['required', 'string'],
            'estado' =>['required', 'string'],
            'cep' =>['required', 'max:8'],
            'complemento' => ['string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
}
