@extends('site.layouts')
@section('title', 'Carrinho')
<style>
  div{
    border-radius: 45px;
  }
  

.table td {
  text-align: center;
}
</style>
@section('conteiner')
  <h2>Carrinho</h2>
  @if (isset($cart) && count($cart) > 0)
    <div class="card">
      <table class="table table-hover table-striped table-bordered border-black align-middle ">
        <thead>
          <tr class="table-secondary">
            <th class="text-center">Imagem</th>
            <th class="text-center">Nome</th>
            <th class="text-center">Valor</th>
            <th class="text-center"></th>
          </tr>
        </thead>
      
        <tbody>
          @foreach ($cart as $indice => $item)
            <tr>
              <th class="text-center"><img src="{{asset($item->foto)}}" height="65px"></th>
              <th class="text-center">{{$item->nome}}</th>
              <th class="text-center">R$ {{$item->valor}}</th>
              <th width="80" class="text-center">
                <a href="{{route('excluir_carrinho',['indice'=>$indice])}}" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></a>
              </th>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr class="table-secondary">
            <th>Total</th>
          </tr>  
        </tfoot>
      </table>
    </div>
  

  @else
    <p>nenhum item no carrinho</p>
  @endif
@endsection