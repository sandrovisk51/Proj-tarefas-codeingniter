<?php
namespace App\Models;

use CodeIgniter\Model;

class DetalheModel extends Model
{
  public function listaDetalhada($id)
  {
  	$db = \Config\Database::connect();
  	$builder = $db->table('tb_tarefas');
  	$builder->select('tb_tarefas.id, tb_tarefas.tar_descricao, tb_responsaveis.res_descricao, 
  	                  tb_categorias.cat_descricao, tb_tarefas.tar_data_finalizacao');
  	$builder->join('tb_responsaveis', 'tb_responsaveis.id = tb_tarefas.res_id');
  	$builder->join('tb_categorias', 'tb_categorias.id = tb_tarefas.cat_id');
  	$builder->where('tb_tarefas.id', $id);
  	$query = $builder->get();
  	
    return $query->getResult();
  }
}
?>