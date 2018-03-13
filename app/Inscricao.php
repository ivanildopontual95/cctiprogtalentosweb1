<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';
    protected $fillable = [
        'nomeCompleto', 'dataNascimento', 'pai' , 'mae', 'sexo',
        'escolaridade', 'identidade', 'cpf', 'estado', 'cidade',
        'endereco', 'cep', 'bairro', 'numero', 'email', 'telefone' ];
    

    //----------------User-----------------------//
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //------------------Publicação--------------------//
    public function publicacoes()
    {
        return $this->belongsToMany(Publicacao::class);
    }

     //--------------Experiencia---------------------//
     public function experiencias()
     {
         return $this->hasMany(Experiencia::class);
     }

     // ----------------Qualificacoes--------------//
     public function qualificacoes()
     {
         return $this->hasMany(Experiencia::class);
     }
}