<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $with = ['papeis', 'inscricoes', 'experiencias', 'cargos'];


    public function eAdmin(){
        //return $this->id == 1;

        return $this->existePapel('Admin');
    }

    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }
    
    public function adicionaPapel($papel)
    {
        if (is_string($papel)) {
            $papel = Papel::where('nome','=',$papel)->firstOrFail();
        }

        if($this->existePapel($papel)){
            return;
        }

        return $this->papeis()->attach($papel);

    }
    public function existePapel($papel)
    {
        if (is_string($papel)) {
            $papel = Papel::where('nome','=',$papel)->firstOrFail();
        }

        return (boolean) $this->papeis()->find($papel->id);

    }
    public function removePapel($papel)
    {
        if (is_string($papel)) {
            $papel = Papel::where('nome','=',$papel)->firstOrFail();
        }

        return $this->papeis()->detach($papel);
    }

    public function temumPapelDesses($papeis){
          $userPapeis = $this->papeis;
          return $papeis->intersect($userPapeis)->count();
    }


    //--------------Adiciona Formulário de inscrição------------//
    public function inscricoes()
    {
        return $this->belongsToMany(Inscricao::class);
    }

    public function adicionaFormulario($inscricao)
    {
        if (is_string($inscricao)) {
            $inscricao = Inscricao::where('cpf','=',$inscricao)->firstOrFail();
        }

        return $this->inscricoes()->attach($inscricao);
    }

    //--------------Adiciona Formulário de experiencia------------//
    public function experiencias()
    {
        return $this->belongsToMany(Experiencia::class);
    }

    public function adicionaExperiencia($experiencia)
    {
        if (is_string($experiencia)) {
            $experiencia = Experiencia::where('empresa','=',$experiencia)->firstOrFail();
        }

        return $this->experiencias()->attach($experiencia);
    }

    //--------------Seleciona Cargo------------------------//
    public function cargos()
    {
        return $this->belongsToMany(Cargo::class);
    }

    public function selecionaCargo($cargo)
    {
        if (is_string($cargo)) {
            $cargo = Cargo::where('cargo','=',$cargo)->firstOrFail();
        }

        return $this->cargos()->attach($cargo);
    }
}