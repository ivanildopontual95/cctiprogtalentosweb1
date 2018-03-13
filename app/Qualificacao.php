<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualificacao extends Model
{
    protected $table = 'qualificacoes';
    protected $fillable = 
            ['inscricao_id', 'instituicao',
             'curso', 'dataInI', 'dataTermI', 
             'cargaHora' ];
    
             
    public function inscricao()
    {
        return $this->belongsTo(Inscricao::class);
    }
}
