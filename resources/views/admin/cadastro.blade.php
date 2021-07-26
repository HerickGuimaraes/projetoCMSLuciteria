<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light px-5 pr-5 mb-5">
        <a href="#" class="navbar-brand"></a>
        
    </nav>
<div class="container">
    <div class="row">
    <h2>Cadastro</h2><br><br>

    <form action="" method="post" class="form-row">
        @csrf
        <div class="row">
        <div class="from-group col-md-8 mb-4">
            <input type="text" name="nome" class="form-control" placeholder="Nome">
        </div>
        <div class="from-group col-md-4 mb-4">
            <input type="text" name="cpf" class="form-control" placeholder="CPF">
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
            <input type="CEP" name="cep" class="form-control" placeholder="CEP">
        </div>
        </div>
        
        <input type="submit" class="btn btn-success btm-sm px-4" value="Cadastrar">
        
    </form>
</div>
</div>
</body>
</html>