<?php

use Illuminate\Database\Seeder;
use App\Papel;

class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Papel::firstOrCreate([
            'nome' =>'Admin',
            'descricao' =>'Acesso Total ao Sistema'
        ]);
  
        $p2 = Papel::firstOrCreate([
            'nome' =>'Gerente de Departamento',
            'descricao' =>'Gerenciamento do Sistema'
        ]);

        $p3 = Papel::firstOrCreate([
            'nome' =>'Auxiliar de Departamento',
            'descricao' =>'Visualização de Publicações'
        ]);

        $p4 = Papel::firstOrCreate([
            'nome' =>'Usuário',
            'descricao' =>'Acesso ao site como Usuário'
        ]);
  
        echo "Papéis Criados com Sucesso!";
    }
}
