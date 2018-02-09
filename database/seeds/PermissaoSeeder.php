<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios1 = Permissao::firstOrCreate([
            'nome' =>'usuario-view',
            'descricao' =>'Acesso a Lista de Usuários.'
        ]);
        $usuarios2 = Permissao::firstOrCreate([
            'nome' =>'usuario-create',
            'descricao' =>'Adicionar Usuários.'
        ]);
        $usuarios2 = Permissao::firstOrCreate([
            'nome' =>'usuario-edit',
            'descricao' =>'Editar Usuários.'
        ]);
        $usuarios3 = Permissao::firstOrCreate([
            'nome' =>'usuario-delete',
            'descricao' =>'Deletar Usuários.'
        ]);
  
        $papeis1 = Permissao::firstOrCreate([
            'nome' =>'papel-view',
            'descricao' =>'Listar Papéis.'
        ]);
        $papeis2 = Permissao::firstOrCreate([
            'nome' =>'papel-create',
            'descricao' =>'Adicionar Papéis.'
        ]);
        $papeis3 = Permissao::firstOrCreate([
            'nome' =>'papel-edit',
            'descricao' =>'Editar Papéis.'
        ]);
  
        $papeis4 = Permissao::firstOrCreate([
            'nome' =>'papel-delete',
            'descricao' =>'Deletar Papéis.'
        ]);
  
        $perfil1 = Permissao::firstOrCreate([
          'nome' =>'perfil-view',
          'descricao' =>'Acesso ao Perfil.'
        ]);
        
        $perfil2 = Permissao::firstOrCreate([
          'nome' =>'perfil-edit',
          'descricao' =>'Editar Perfil.'
        ]);
  
        $publicacoes1 = Permissao::firstOrCreate([
            'nome' =>'publicacoes-view',
            'descricao' =>'Acesso as Publicações.'
        ]);
  
        $publicacoes2 = Permissao::firstOrCreate([
            'nome' =>'publicacoes-create',
            'descricao' =>'Adicionar Publicações.'
        ]);
        $publicacoes3 = Permissao::firstOrCreate([
            'nome' =>'publicacoes-edit',
            'descricao' =>'Editar Publicações.'
        ]);
        $publicacoes4 = Permissao::firstOrCreate([
            'nome' =>'publicacoes-delete',
            'descricao' =>'Deletar Publicações.'
        ]);
  
        echo "Registros de Permissões Criados no Sistema!";
    }

}
