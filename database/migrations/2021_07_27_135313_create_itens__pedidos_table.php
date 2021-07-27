<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens__pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->decimal('valor, 10,2');
            $table->datetime('dt_item');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')
            ->on('produtos')->onDelete('cascade');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')
            ->on('pedidos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens__pedidos');
    }
}
