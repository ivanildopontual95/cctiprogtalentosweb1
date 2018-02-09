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
            'nome' =>'Gerente do Departamento',
            'descricao' =>'Gerenciamento do Sistema'
        ]);

        $p3 = Papel::firstOrCreate([
            'nome' =>'Auxiliar do Departamento',
            'descricao' =>'Auxiliamento do sistema'
        ]);

        $p4 = Papel::firstOrCreate([
            'nome' =>'Usuario',
            'descricao' =>'Acesso ao site como usuário'
        ]);
  
        echo "Papéis Criados com Sucesso!";
    }
}
