<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $dateFormat = 'd/m/Y H:i';
    protected $table = 'publicacoes';
    protected $fillable = 
            [ 'id', 'titulo', 'descricao','dataInicio', 'horaInicio', 'dataTermino', 'horaTermino','deletado'];
    
    public $with = ['inscricoes','cargos'];
    
    protected $dates = ['dataInicio','dataTermino', 'horaInicio', 'horaTermino'];

    //--------Periodo de inscricao------------------------
    function setDataInicioAttribute($date)
    {
        return $this->attributes['dataInicio'] = Carbon::createFromFormat('d/m/Y', $date)->format('d/m/Y');
    }

    function setHoraInicioAttribute($date)
    {
        return $this->attributes['horaInicio'] = Carbon::createFromFormat('H:i', $date)->format('H:i');
    }

    function setDataTerminoAttribute($date)
    {
        return $this->attributes['dataTermino'] = Carbon::createFromFormat('d/m/Y', $date)->format('d/m/Y');
    }

    function setHoraTerminoAttribute($date)
    {
        return $this->attributes['horaTermino'] = Carbon::createFromFormat('H:i', $date)->format('H:i');
    }

    function getDataInicioAttribute()
    {
        return $this->attributes['dataInicio'];
    }

    function getHoraInicioAttribute()
    {
        return $this->attributes['horaInicio'];
    }

    function getDataTerminoAttribute()
    {
        return $this->attributes['dataTermino'];
    }
    
    function getHoraTerminoAttribute()
    {
        return $this->attributes['horaTermino'];
    }

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
        return $this->belongsToMany(Inscricao::class)->withPivot('cargo_id','deferimento','classificacao','convocacao','pontuacao_inscrito');
    }

    //----------Relatorios--------------------------------

    public function relatorios()
    {
        return $this->belongsToMany(Relatorio::class);
    }
}