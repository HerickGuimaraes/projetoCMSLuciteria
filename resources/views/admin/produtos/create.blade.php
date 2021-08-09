@extends('adminlte::page')

@section('title', 'Novo Produto')

@section('content_header')

    <h1>Novo Produto</h1>

@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5><i class="far fa-times-circle"></i> Ouve um ERROR!!</h5>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('produtos.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                
                @csrf
                <div class="form-group row">      
                    
                    <div class="col-sm-10">
                        <input type="text" name="nome" value="" class="form-control @error('title') is-invalid @enderror" placeholder="Titulo do produto" >
                    </div>           
                </div>
                <div class="form-group row">
                <div class="input-group row col-sm-10" >
                    <span class="input-group-text">R$</span>
                    <input type="text" class="form-control" name="valor" aria-label="Amount (to the nearest dollar)" placeholder="Valor">
                </div>  
                </div> 
                
                <div class="form-group row">       
                    
                    <div class="col-sm-10">
                        <textarea name="descricao" placeholder="Descrição do Produto" class="form-control bodyfield"></textarea>
                    </div> 
                </div> 
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="file" name="foto" class="input-control" id="image">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <select  placeholder="categorias" class="form-select">
                            <option selected>Escolha uma categoria</option>
                            @foreach($categorias as $cat)
                            <option name="categoria">{{$cat->categoria}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-sm-8">
                    <input type="submit" name="Cadastro" class="btn btn-success" value="Criar">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
  
@endsection