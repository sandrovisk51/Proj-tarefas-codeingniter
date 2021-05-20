<?php
namespace App\Models;

use CodeIgniter\Model;

class TarefasModel extends Model
{
	protected $table = 'tb_tarefas';
	protected $primaryKey = 'id';
	protected $allowedFields = ['tar_descricao', 'res_id', 'cat_id', 'tar_data_finalizacao'];
	protected $useTimestamps = true;
    protected $createdField  = 'tar_data_criacao';
    protected $updatedField  = 'tar_data_atualizacao';
}
?>