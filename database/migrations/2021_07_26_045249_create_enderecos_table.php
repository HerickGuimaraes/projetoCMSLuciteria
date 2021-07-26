<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logadouro');
            $table->string("numero");
            $table->string("cidade");
            $table->string("estado");
            $table->string("cep");
            $table->string("complemento");
            $table->integer('usuario_id')->unsigned();
            $table->foreign('user_id')->references('id')
            ->on('user')->onDelete('cascate');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
