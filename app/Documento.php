<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = ['id','titulo, url, deletado'];

    public function publicacoes()
    {
        return $this->belongsToMany('App\Publicacao');
    }
}

    