<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageControlle extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.pages',[
            'pages' =>$pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paginas.create');
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
            'title',
            'subtitle',
            'body', 
        ]);
        
       
        $data['slug'] = Str::slug($data['title'], '-');
        $validator = Validator::make($data, [
            'title'=>['required','string','max:100'],
            'slug'=>['required', 'string', 'max:100', 'unique:pages'],
            'subtitle' =>['string'],
            'body'=>['string']
        ]);
        
        
        
        if($validator->fails()){
            return redirect()->route('pages.create')
            ->withErrors($validator)
            ->withInput();
        }
      
        $page = new Page;
        $page->title = $data['title'];
        $page->body = $data['body'];
        $page->slug = $data['slug'];
        $page->subtitle = $data['subtitle'];
        $page->save();

        return redirect()->route('pages.index');
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
        $page = Page::find($id);

        if($page) {
        return view('admin.paginas.edit', ['page' => $page]);
        }

        return redirect()->route('pages.index');
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
        $page = Page::find($id);

        if($page){
            $data = $request->only([
            'title',
            'body',
            'subtitle',
            
            ]);
            if($page['title'] !== $data['title']){
                $data['slug'] = Str::slug($data['title'], '-');
                $validator = Validator::make($data,[
                    'title'=>['required','string','max:100'],
                    'slug'=>['required', 'string', 'max:100', 'unique:pages'],
                    'subtitle' =>['string'],
                    
                    'body'=>['string']
                ]);
            }else{
                $validator = Validator::make($data,[
                    'title' => ['required', 'string', 'max:100'],
                    'body' =>['string'],    
                    'subtitle' =>['string'],
                    
            
                ]);
            }
            if($validator->fails()){
                return redirect()->route('pages.edit',[
                    'page' =>$id
                ])
                ->withErrors($validator)
                ->withInput();
            }
            
            $page->title = $data['title'];
            $page->body = $data['body'];
            $page->subtitle = $data['subtitle'];
            

            if(!empty($data['slug'])){
                $page->slug = $data['slug'];
            }
            $page->save();

            
        }

       
       return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    $page = Page::find($id);
    $page->delete();
        

        return redirect()->route('pages.index');
    }
}
