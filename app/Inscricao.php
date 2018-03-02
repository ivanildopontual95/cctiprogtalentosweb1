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

    //-------------------------------Publicação---------------------------//

    public function publicacoes()
    {
        return $this->belongsToMany(Publicacao::class);
    }

    public function adicionaPublicacao($publicacao)
    {
        if (is_string($publicacao)) {
            $publicacao = Publicacao::where('nome','=',$publicacao)->firstOrFail();
        }

        if($this->existePublicacao($publicacao)){
            return;
        }

        return $this->publicacoes()->attach($publicacao);

    }

    public function existePublicacao($publicacao)
    {
        if (is_string($publicacao)) {
            $publicacao = Publicacao::where('nome','=',$publicacao)->firstOrFail();
        }

        return (boolean) $this->publicacaoes()->find($publicacao->id);

    }
    public function removePublicacao($publicacao)
    {
        if (is_string($publicacao)) {
            $publicacao = Publicacao::where('nome','=',$publicacao)->firstOrFail();
        }

        return $this->publicacoes()->detach($publicacao);
    }
    
    //---------------------------------Cargos---------------------------------//

    public function cargos()
    {
        return $this->belongsTo(Cargo::class);
    }

    //------------------------------Experiências------------------------//

    public function experiencias()
    {
        return $this->belongsToMany(Experiencia::class);
    }
}