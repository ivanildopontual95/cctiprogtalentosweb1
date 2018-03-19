<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';
    protected $fillable = 
            [ 'id', 'titulo', 'descricao','dataInicio', 'horaInicio', 'dataTermino', 'horaTermino','deletado'];
    
    public $with = ['inscricoes','cargos'];
    

    //--------Adiciona Cargos-----------------------------------
    public function cargos()
    {
        return $this->belongsToMany(Cargo::class);
    }
    
    public function adicionaCargo($cargo)
    {
        if (is_string($cargo)) {
            $cargo = Cargo::where('cargo','=',$cargo)->firstOrFail();
        }

        return $this->cargos()->attach($cargo);
    }

    public function removeCargo($cargo)
    {
        if (is_string($cargo)) {
            $cargo = Cargo::where('cargo','=',$cargo)->firstOrFail();
        }

        return $this->cargos()->detach($cargo);
    }

    
    //----------------------- Adiciona Documentos--------------------------------

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
    
    //---------------------Adiciona Inscrição--------------------------

    public function inscricoes()
    {
        return $this->belongsToMany(Inscricao::class)->withPivot('cargo_id');
    }

    //----------Relatorios--------------------------------

    public function relatorios()
    {
        return $this->belongsToMany(Relatorio::class);
    }
}