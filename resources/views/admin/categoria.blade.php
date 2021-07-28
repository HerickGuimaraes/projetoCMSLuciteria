@extends('adminlte::page')

@section('title', 'Paginas')

@section('content_header')

    <h1>Minhas Categorias 
        <a href="{{route('categorias.create')}}"
             class="btn btn-sm btn-success">Criar Categoria</a>
    </h1>

@endsection

@section('content')
<div class="card">
    <div class="card-boddy">
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="50px">ID</th>
            <th>Titulo</th>
            <th width="200px">Ações</th>
        </tr>
        </thead>
        @foreach($categorias as $categoria)
        <tbody>
        
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->categoria}}</td>
                
                <td>
                    
                    <a href="{{route('categorias.edit',['categoria' => $categoria->id])}}" class="btn btn-sm btn-info">Editar</a>
                  
                    <form class="d-inline" method="POST" action="{{route('categorias.destroy',['categoria' => $categoria->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir ?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                    
                </td>
            </tr>
        </tbody>
       @endforeach
    </table>
    
    </div>
</div>

@endsection