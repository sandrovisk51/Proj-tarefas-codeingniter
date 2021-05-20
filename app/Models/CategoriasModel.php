<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model
{
	protected $table = 'tb_categorias';
	protected $primaryKey = 'id';
	protected $allowedFields = ['cat_descricao'];
}
?>