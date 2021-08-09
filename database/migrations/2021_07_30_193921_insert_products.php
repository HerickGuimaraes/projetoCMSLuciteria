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

        $prod = new Produto(['nome' => '', 'valor'=>20, 'foto'=> '','descricao'=>'', 'categoria_id'=>$cat->id]);
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
