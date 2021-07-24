<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Models\visitor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>[
            'login',
            'loginAction', 
            'cadastro',
            'cadastroAction'
        ]]);
        
    }
    
    public function index(){
        $visitsCount = 0;
        $onLineCount = 0;
        $pageCount = 0;
        $userCount = 0;

        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);

        //visitantes
        $visitsCount = visitor::count();

        //Usuarios online
        $datelimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onLinelist = visitor::select('ip')->where('date_acess', '>=', $datelimit)->groupBy('ip')->get();
        $onLineCount = count($onLinelist); 

        //contagem de paginas
        $pageCount = Page::count();

        //contagem de usuarios
        $userCount = User::count();

        
        return view('admin.admin',[
            'user'=>$user,
            'visitsCount' => $visitsCount,
            'onLineCount' => $onLineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
       ]);
    }

    public function login(Request $request){
        return view('admin.login', [
            'error' =>$request
            ->session()
            ->get('error')
        ]);
    }
    public function loginAction(Request $request){
        $creds = $request->only('email', 'password');
        if(Auth::attempt($creds)){
            return redirect('painel');
        }else{
            $request->session()->flash('ERROR', 'E-mail ou senha não confere');
            return redirect('painel/login');
        }
    }

    public function cadastro(Request $request){
        
        return view('admin.cadastro');
    }

    public function cadastroAction(Request $request){
        
    }

    public function logout(){
        Auth::logout();
        return redirect('/painel');
    }
}
