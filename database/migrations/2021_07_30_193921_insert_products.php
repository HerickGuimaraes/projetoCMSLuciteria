<?php

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new Categoria(['categoria' => 'geral']);
        $cat->save();

        $cat1 = new Categoria(['categoria' => 'importado']);
        $cat1->save();

        $cat2 = new Categoria(['categoria' => 'nacional']);
        $cat2->save();

        $prod = new Produto(['nome' => 'Camisa Flamengo v1', 'valor'=>250, 'foto'=> 'img/produto1.jpg','descricao'=>'', 'categoria_id'=>$cat->id]);
        $prod->save();

        $prod2 = new Produto(['nome' => 'Camisa Flamengo v2', 'valor'=>89.99, 'foto'=> 'img/produto2.jpg','descricao'=>'', 'categoria_id'=>$cat->id]);
        $prod2->save();

        $prod3 = new Produto(['nome' => 'Camisa Flamengo v3', 'valor'=>150, 'foto'=> 'img/produto3.jpg','descricao'=>'', 'categoria_id'=>$cat->id]);
        $prod3->save();

        $prod4 = new Produto(['nome' => 'Camisa Flamengo treino', 'valor'=>75.99, 'foto'=> 'img/produto4.jpg','descricao'=>'', 'categoria_id'=>$cat->id]);
        $prod4->save();

        $prod5 = new Produto(['nome' => 'Tenis Mizzubo', 'valor'=>350, 'foto'=> 'img/produto5.jpg','descricao'=>'', 'categoria_id'=>$cat->id]);
        $prod5->save();

        $prod6 = new Produto(['nome' => 'Camisa Real Madrid v2', 'valor'=>100, 'foto'=> 'img/produto6.jpg','descricao'=>'', 'categoria_id'=>$cat->id]);
        $prod6->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
