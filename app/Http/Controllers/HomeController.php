<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $page = Page::all();
        $produtos = Produto::all();
        return view('site.home', [
            'pages' => $page,
            'lista' => $produtos,
        ]);
    }
}
