@if(isset($lista))
    @foreach ($lista as $prod)

        <div class="product hentry author-rasiel-suarez post-type-store-item article-index-1 clear" id="thumb-one-of-each-set" data-item-id="5b7b159f4fa51a76f36fa852">
            <div>
                <div class="product-image sqs-pinterest-image">
                    <div class="intrinsic">
                        <div>      
                            <img data-src="{{$prod->foto}}"   alt="7194_11.JPG"  data-load="false" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-overlay">
                <div class="product-meta">
                    <div class="product-title">
                        {{$prod->nome}} 
                    </div>
                        <div class="product-price">
                        R$ {{$prod->valor}}
                    </div>
                    <a class="btn btn btn-secondary mx-5 px-5 " href="{{route('adicionar_carrinho',['idproduto' => $prod->id ])}}" role="button">Comprar</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
