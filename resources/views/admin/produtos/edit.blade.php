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
            <form action="{{route('pages.update',['page'=>$page->id])}}" method="POST"class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="form-group row">      
                    <label class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-8">
                    <input type="text" name="title" value="{{$page->title}}" class="form-control" >
                 </div>           
                </div>
                <div class="form-group row">       
                    <label class="col-sm-2 col-form-label">Conteudo</label>
                    <div class="col-sm-8">
                        <textarea name="body" class="form-control bodyfield">{{$page->body}}</textarea>
                 
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

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar:false,
        plugins:['link','table','image','autoresize','list'],
        toolbar:'undo redo | formatselect | bold italic backcolor | alingleft alingcenter alingright alingjustify| table | link image | bullist numlist',
        content_css:[
            '{{asset('css/content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true,
        convert_urls:false
    });
</script>
@endsection