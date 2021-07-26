@extends('adminlte::page')

@section('title', 'Paginas')

@section('content_header')

    <h1>Meus Produtos
        <a href=""
             class="btn btn-sm btn-success">Adicionar Produto</a>
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
        <tbody>
        
            <tr>
                <td></td>
                <td></td>
                
                <td>
                    
                    <a href="}}" class="btn btn-sm btn-info">Editar</a>
                  
                    <form class="d-inline" method="POST" action="" onsubmit="return confirm('Tem certeza que deseja excluir ?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                    
                </td>
            </tr>
        </tbody>
        
    </table>
    
    </div>
</div>

@endsection