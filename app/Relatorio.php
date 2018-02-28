<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    protected $fillable = ['id','titulo', 'url'];

    public function publicacoes()
    {
        return $this->belongsToMany(Publicacao::class);
    }
}