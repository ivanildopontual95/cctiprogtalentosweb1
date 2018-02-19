<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Publicacao extends Model
{
    protected $dateFormat = 'd/m/Y H:i';
    protected $table = 'publicacoes';
    protected $fillable = 
            [ 'id', 'titulo', 'descricao','dataInicio', 'horaInicio', 'dataTermino', 'horaTermino','deletado'];
    
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
    
    //--------Cargos-----------------------------------
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

    
    //----------Documentos--------------------------------    
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
    
    //-------Inscricao--------------------------
    public function inscricoes()
    {
        return $this->belongsToMany(Inscricao::class);
    }
}

    