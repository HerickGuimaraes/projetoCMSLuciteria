<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Page;
use App\Models\Produto;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug,  Request $request){
        $data = [];
        $page = Page::where('slug', $slug)->first();
      
        
       
        $data['page'] = $page;
        

        if($page){
            return view('site.page', $data);
        }else{
            abort(404);
        }
    }
}
