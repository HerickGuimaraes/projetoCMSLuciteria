<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    protected $request;

    public function __construct(Request $request){
        
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos', [
            'produtos' => $produtos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        return view('admin.produtos.create', [
            'categorias' => $categoria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'-'.$extension;
            $path = $request->file('foto')->storeAs('public/img', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }

        $data = $request->only([
            'nome',
            'valor',
            'descricao',
            'categoria_id'
        ]);
        
        
        $validator = Validator::make($data, [
            'nome' => ['required', 'string', 'max:50' ],
            'valor' => ['required', 'string'],
            'descricao' => ['string', 'nullable'],
            'foto' => $fileNameToStore,
            'categoria_id' =>['string', 'nullable'],
        ]);
        
        if($validator->fails()){
            return redirect()->route('produtos.create')
            ->withErrors($validator)->withInput();
        }
        
        $produto = Produto::create([
            'nome' => $data['nome'],
            'valor' => $data['valor'],
            'descricao' => $data['descricao'],
            'foto' => $fileNameToStore,
            'categoria' => $data['categoria']
        ]);
        
        $produto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        echo "editando";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        echo "excluindo";
    }
}
