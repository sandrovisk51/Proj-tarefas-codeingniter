<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetalheModel;
use Config\Services\session;

class Detalhe extends Controller
{

    public function index($id)
    {

       $modelDetalhe = new DetalheModel();
       $dados = $modelDetalhe->listaDetalhada($id);

       $detalhe = array(
                         'id'=>$dados[0]->id,
                         'descricao'=>$dados[0]->tar_descricao,
                         'responsavel'=>$dados[0]->res_descricao,
                         'categoria'=>$dados[0]->cat_descricao,
                         'dataFinalizacao'=>$dados[0]->tar_data_finalizacao
                        );

       return json_encode($detalhe,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}

?>