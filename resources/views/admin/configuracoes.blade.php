@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
<h1> Configurações do site</h1>
@endsection

@section('content')
@if(session('warning'))
<div class="alert alert-success">
        {{session('warning')}}
</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        <h5><i class="far fa-times-circle"></i> Erro na Atualizaçãoo</h5>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
</div>
@endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('configuracoes.salve')}}" method="POST" class="form-horizontal">
            @csrf
            @method('put')
                <div class="form-group row">
                    <label class="col=sm-2 col-form-label">Titulo do site</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$settings['title']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col=sm-3 col-form-label">Sub-Titulo  </label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" value="{{$settings['subtitle']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col=sm-2 col-form-label">e-mail para contato</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$settings['email']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col=sm-2 col-form-label">Cor do fundo</label>
                    <div class="col-sm-10">
                        <input type="color" name="bgcolor" value="{{$settings['bgcolor']}}" class="form-control" style="width:60px">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col=sm-2 col-form-label">Cor do texto</label>
                    <div class="col-sm-10">
                        <input type="color" name="textcolor" value="{{$settings['textcolor']}}" class="form-control" style="width:60px">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col=sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" name="title" value="Salvar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection