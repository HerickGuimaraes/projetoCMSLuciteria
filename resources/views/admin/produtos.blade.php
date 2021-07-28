@extends('adminlte::page')

@section('title', 'Paginas')

@section('content_header')

    <h1>Meus Produtos
        <a href="{{route('produtos.create')}}"
             class="btn btn-sm btn-success">Adicionar Produto</a>
    </h1>

@endsection

@section('content')
<div class="card">
    <div class="card-boddy">
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="100px">Imagem</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th width="200px">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($produtos as $prod)
            <tr>
                <td>{{$prod->image}}</td>
                <td>{{$prod->title}}</td>
                <td>{{$prod->categorias}}</td>
                <td>{{$prod->value}}</td>
                
                
                <td>
                  
                    <a href="{{route('produtos.edit', ['produtos'=>$prod->id])}}" class="btn btn-sm btn-info">Editar</a>
                  
                    <form class="d-inline" method="POST" action="{{route('produtos.destroy',['produtos'=>$prod->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir ?')">
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