@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

    <h1>Meus Usuarios  
        <a href="{{route('users.create')}}"
             class="btn btn-sm btn-success">Cadastrar Usuario</a>
    </h1>

@endsection

@section('content')
<div class="card">
    <div class="card-boddy">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->nome}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ route('users.edit',['user' => $user->id])}}" class="btn btn-sm btn-info">Editar</a>
                    @if($loggedId !== intval($user->id))
                    <form class="d-inline" method="POST" action="{{ route('users.destroy',['user' => $user->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir ?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                    @endif
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    
    </div>
</div>
{{ $users->links('pagination::bootstrap-4') }}
@endsection