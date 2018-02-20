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

    public function publicacoes()
    {
        return $this->belongsToMany(Publicacao::class);
    }
}