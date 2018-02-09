<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';
    protected $fillable = ['id', 'titulo', 'descricao', 'deletado'];


    public function documentos()
    {
        return $this->belongsToMany('App\Documento');
    }

    public function adicionaDocumento($documento)
    {
        if (is_string($documento)) {
            $documento = Documento::where('titulo','=',$documento)->firstOrFail();
        }

        
        return $this->documentos()->attach($documento);

    }
    
}

    