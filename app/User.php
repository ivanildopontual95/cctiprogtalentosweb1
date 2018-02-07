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


    public function adicionaPublicacao($publicacao)
    {
        if (is_string($publicacao)) {
            $publicacao = publicacao::where('nome','=',$publicacao)->firstOrFail();
        }

        if($this->existePublicacao($publicacao)){
            return;
        }

        return $this->publicacao()->attach($publicacao);

    }

    public function existePublicacao($publicacao)
    {
        if (is_string($publicacao)) {
            $publicacao = publicacao::where('nome','=',$publicacao)->firstOrFail();
        }

        return (boolean) $this->publicacao()->find($publicacao->id);

    }
}
