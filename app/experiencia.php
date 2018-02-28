<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experiencia extends Model
{
    protected $fillable = 
            [ 'empresa', 'funcao','atividade',
             'dataInE', 'dataTermE', 'instituicao',
             'curso', 'dataInI', 'dataTermI', 
             'cargaHora', 'aptidao' ];

    public function inscricoes()
    {
        return $this->belongsToMany(Inscricao::class);
    }
    
}
