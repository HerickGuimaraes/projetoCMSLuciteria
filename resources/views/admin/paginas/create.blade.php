@extends('adminlte::page')

@section('title', 'Nova pagina')

@section('content_header')

    <h1>Nova Pagina</h1>

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
            <form action="{{route('pages.store')}}" method="POST"class="form-horizontal">
                
                @csrf
                <div class="form-group row">                
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Titulo" >
                    </div>           
                </div>
                <div class="form-group row">                
                    <div class="col-sm-10">
                        <textarea type="text" name="subtitle"  class="form-control " placeholder="SubTitulo" ></textarea>
                    </div>           
                </div>
                <div class="form-group row">       
                    
                    <div class="col-sm-10">
                        <textarea name="body" placeholder="Conteudo da Pagina" class="form-control bodyfield">{{old('body')}}</textarea>
                 
                    </div>         
                </div>
                <div class="form-group row">
                    
                    <div class="col-sm-3">
                    <input type="submit" class="btn btn-success" value="Criar">
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar:false,
        plugins:['link','table','image','autoresize','list'],
        toolbar:'undo redo | formatselect | bold italic backcolor | alingleft alingcenter alingright alingjustify| table | link image | bullist numlist',
        content_css:[
            "{{asset('css/content.css')}}"
        ],
        images_upload_url:"{{route('imageupload')}}",
        images_upload_credentials:true,
        convert_urls:false
    });
</script>
@endsection