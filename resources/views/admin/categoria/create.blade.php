@extends('adminlte::page')

@section('title', 'Nova Categoria')

@section('content_header')

    <h1>Nova Categoria</h1>

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
            <form action="{{route('categoria.store')}}" method="POST"class="form-horizontal">
                
                @csrf
                <div class="form-group row">      
                    <label class="col-sm-0 col-form-label"></label>
                    <div class="col-sm-9">
                    <input type="text" name="categoria" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Nome da Categoria" >
                 </div>           
                
                  
                    <div class="form-group row">
                    <label class="col-sm-9 col-form-label"></label>
                    <div class="col-sm-3">
                    <input type="submit" class="btn btn-success" value="Criar">
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection