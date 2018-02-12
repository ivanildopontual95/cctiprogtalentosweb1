<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';
    protected $fillable = ['id', 'titulo', 'descricao', 'deletado'];


    public function documentos()
    {
        return $this->belongsToMany(Documento::class);
    }

    public function adicionaDocumento($documento)
    {
        if (is_string($documento)) {
            $documento = Documento::where('titulo','=',$documento)->firstOrFail();
        }

        
        return $this->documentos()->attach($documento);

    }

    public function removeDocumento($documento)
    {
        if (is_string($documento)) {
            $documento = Documento::where('titulo','=',$documento)->firstOrFail();
        }

        return $this->documentos()->detach($documento);
    }
    
}

    