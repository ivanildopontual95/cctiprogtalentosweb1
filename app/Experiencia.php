<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $fillable = 
            [ 'empresa', 'funcao','atividade',
             'dataInE', 'dataTermE', 'instituicao',
             'curso', 'dataInI', 'dataTermI', 
             'cargaHora', 'aptidao' ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
