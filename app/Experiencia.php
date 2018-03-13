<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $fillable = 
            ['inscricao_id', 'empresa', 'funcao','atividade',
             'dataInE', 'dataTermE' ];

    
    public function inscricao()
    {
        return $this->belongsTo(Inscricao::class);
    }
}
