<?php
namespace App\Models;

use CodeIgniter\Model;

class ResponsaveisModel extends Model
{
	protected $table = 'tb_responsaveis';
	protected $primaryKey = 'id';
	protected $allowedFields = ['res_descricao'];
}
?>