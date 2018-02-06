<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';
    protected $fillable = ['id', 'titulo', 'descricao', 'inicioInscricao', 'fimInscricao'];


    public function documentos()
    {
        return $this->hashMany('App\Documento');
    }
}

    