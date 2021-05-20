<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
	protected $table = 'tb_usuarios';
	protected $allowedFields = ['usu_nome', 'usu_email', 'usu_senha'];
}
?>