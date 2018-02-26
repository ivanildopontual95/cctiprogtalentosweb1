<?php

namespace App\Providers;

use App\Model;
use App\Permissao;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach($this->listapermissoes() as $permissao){
            Gate::define($permissao->nome,function($user) use ($permissao){
                return $user->temumPapelDesses($permissao->papeis) || $user->eAdmin();
            });
        }
    }

    public function listapermissoes(){
        return Permissao::with('papeis')->get();
    }
}