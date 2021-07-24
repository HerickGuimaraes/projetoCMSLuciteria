<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $settings = [];

        $dbsettings = Setting::get();

        foreach($dbsettings as $dbsetting) {
            $settings[ $dbsetting['nome'] ] = $dbsetting['content'];
        }

        return view('admin.configuracoes',[
            'settings' => $settings
        ]);
    }
    public function save(Request $request){
        $data = $request->only([
            'title', 'subtitle', 'email', 
        ]);

        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('configuracoes')
            ->withErrors($validator);
        }
        foreach($data as $item => $value){
            Setting::where('nome', $item)->update([
                'content' =>$value
            ]);
        }
        return redirect()->route('configuracoes')
        ->with('warning','Informações atualizadas com sucesso');
    }
    protected function validator($data){
        return Validator::make($data, [
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string', 'email'],
            
        ]);
    }
}
