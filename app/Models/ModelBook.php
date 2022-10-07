<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    protected $table='book'; //aqui setamos o atributo table, e nomeamos que a tabela vai ser chamada de book, onde esse book sera colocado na migration dentro do método up
    protected $fillable=['title', 'id_user', 'pages', 'price']; //aqui serão colocados os campos que poderão ser cadastrados, é uma medida de segurança do laravel

    public function relUsers()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
