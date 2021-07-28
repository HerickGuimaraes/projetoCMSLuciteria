@extends('adminlte::page')

@section('title', 'Paginas')

@section('content_header')

    <h1>Minas Paginas 
        <a href="{{route('pages.create')}}"
             class="btn btn-sm btn-success">Adicionar Pagina</a>
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
        @foreach($pages as $page)
            <tr>
                <td>{{$page->id}}</td>
                <td>{{$page->title}}</td>
                
                <td>
                    
                    <a href="{{ route('pages.edit',['page' => $page->id])}}" class="btn btn-sm btn-info">Editar</a>
                  
                    <form class="d-inline" method="POST" action="{{ route('pages.destroy',['page' => $page->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir ?')">
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
{{ $pages->links('pagination::bootstrap-4') }}
@endsection