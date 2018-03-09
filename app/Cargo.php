<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['id', 'cargo', 'escolaridade', 'pontuacao'];

    public function publicacoes()
    {
        return $this->belongsToMany(Publicacao::class);
    }

}
