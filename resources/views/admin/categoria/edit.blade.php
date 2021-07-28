@extends('adminlte::page')

@section('title', 'Editar pagina')

@section('content_header')

    <h1>Editar Pagina</h1>

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
            <form action="{{route('categorias.update',['categoria'=>$categorias->id])}}" method="POST"class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">      
                    <label class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-8">
                    <input type="text" name="categoria" value="{{$categorias->categoria}}" class="form-control" >
                 </div>           
                </div>
                      
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="Salvar" class="btn btn-success" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection