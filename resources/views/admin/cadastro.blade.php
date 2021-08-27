<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script type="text/javascript">
        function formatar_mascara(src, mascara) {
         var campo = src.value.length;
         var saida = mascara.substring(0,1);
         var texto = mascara.substring(campo);
         if(texto.substring(0,1) != saida) {
         src.value += texto.substring(0,1);
         }
        }
        </script>
</head>
<body>
    <div class="container-fluid justify-content-center">
    <h1></h1>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-center " style="background-color: #fffff, background-text: #000000">
        <ul class="nav justify-content-center">
            @foreach($front_menu as $menuslug=>$menutitle)
            
            <li class="nav-item">
                <a class="nav-link link-secondary" href="{{$menuslug}}" >{{$menutitle}}</a>
            </li>
            @endforeach
        </tr>  
    </nav>
    
<div class="container">
    <div class="row">
        @if($message = Session::get("ERROR"))
            <div class="col-12">
                <div class="alert alert-danger">{{ $message }}</div>
            </div>
        @endif
        @if($message = Session::get("success"))
        <div class="col-12">
            <div class="alert alert-success">{{ $message }}</div>
        </div>
        @endif
    <h2>Cadastro</h2><br><br>

    <form action="{{route('cadastro')}}" method="post" class="form-row">
        @csrf
        <div class="row">
        <div class="from-group col-md-8 mb-4">
            <input type="text" name="nome" class="form-control" placeholder="Nome">
        </div>
        <div class="from-group col-md-4 mb-4">
            <input name="cpf" method="post" type="text" class="form-control" maxlength="14" size="40" onkeypress="formatar_mascara(this,'###.###.###-##')" placeholder="CPF">
        </div>
        <div class="from-group col-md-6 mb-4">
            <input type="email" name="email" class="form-control" placeholder="E-mail">
        </div>
        
        <div class="from-group col-md-6 mb-4">
            <input type="password" name="password" class="form-control" placeholder="Senha">
        </div>
        <div class="from-group col-md-6  mb-4">
            <input type="text" name="logadouro" class="form-control" placeholder="Endereço">
        </div>
        <div class="from-group col-md-2  mb-4">
            <input type="text" name="numero" class="form-control" placeholder="Numero">
        </div>
        <div class="from-group col-md-4 mb-4">
            <input type="text" name="complemento" class="form-control" placeholder="Complemento">
        </div>
        
        <div class="form-group col-md-6  mb-4">
            <input type="text" name="cidade" class="form-control" placeholder="Cidade">
        </div>
        <div class="form-group col-md-3  mb-4">
            <input type="text" name="estado" class="form-control" placeholder="Estado">
        </div>
        <div class="form-group col-md-3  mb-4">
            <input name="cep" method="post" type="text" class="form-control" maxlength="11" size="40" onkeypress="formatar_mascara(this,'##.###-###')" placeholder="CEP">
        </div>
        </div>
        
        <input type="submit" class="btn btn-success btm-sm px-4" value="Cadastrar">
        
    </form>
</div>
</div>
</body>
</html>