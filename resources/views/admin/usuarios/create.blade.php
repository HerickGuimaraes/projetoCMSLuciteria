@extends('adminlte::page')

@section('title', 'Cadastro')

@section('content_header')

    <h1>Novo Usuario</h1>

@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5><i class="far fa-times-circle"></i> Erro no Cadastro</h5>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST"class="form-horizontal">
            @csrf
                <div class="form-group row">      
                    <label class="col-sm-0 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="text" name="nome" value="{{old('nome')}}" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Completo" >
                 </div>           
                </div>
                <div class="form-group row">       
                    <label class="col-sm-0 col-form-label"></label>
                    <div class="col-sm-10">
                 <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail">
                    </div>         
                </div>
                 <div class="form-group row">
                    <label class="col-sm-0 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Senha">
                    </div>
                 </div>
                <div class="form-group row">
                    <label class="col-sm-0 col-form-label"></label>
                     <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Confirmação Senha">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-9 col-form-label"></label>
                    <div class="col-sm-3">
                    <input type="submit" name="Cadatro" class="btn btn-success" value="Cadastrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection