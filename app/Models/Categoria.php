<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends RModel
{
    protected $table = 'categorias';
    
    protected $fillable = [ 
        'categoria'
    ];
    public function produto(){
        return $this->hasOne(Produto::class,'categoria_id', 'id');
    }
    public function pages(){
        return $this->hasOne(Page::class,'categoria_id', 'id');
    }
}
