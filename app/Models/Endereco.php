<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends RModel
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'enderecos';

    protected $fillable = [
        'logadouro',
        'numero',
        'cidade',
        'estado',
        'cep',
        'complemento',
        'usuario_id'
    ];
    public function setCepAttribute($cep){
        $value = preg_replace("/[^0-9]/", "", $cep);
        $this->attributes["cep"] = $value;

    }
}
