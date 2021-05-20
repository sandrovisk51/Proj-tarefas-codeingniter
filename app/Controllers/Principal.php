<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TarefasModel;
use App\Models\ResponsaveisModel;
use App\Models\CategoriasModel;
use Config\Services\session;

class Principal extends Controller
{

  	public function checarLogin()
    {
          $sessao  = session();
          $id      =   $sessao->get('usu_id');
          $logado  =   $sessao->get('logado');
          
          if(!is_numeric($id) && $logado != TRUE){
            return TRUE;
          }else{
            return FALSE;
          }

  	}
    

    public function index()
    {   
      if($this->checarLogin()) return redirect()->to('/login');

       $modelTarefas = new TarefasModel();
       $dados['listaTarefas'] = $modelTarefas->orderBy('tar_data_criacao', 'DESC')->findAll();
       $dados['paginacao']    = $modelTarefas->pager;
       $dados['usario']       = $nome;

       if(empty($dados['listaTarefas'])) $dados['mensagem'] = 'Nenhuma tarefa cadastrada no momento.';

       return view('lista_tarefas',  $dados);
    }

    public function nova($msg = null)
    {
      if($this->checarLogin()) return redirect()->to('/login');
       
       helper(['form']);

       if($msg) $dados['validacao'] = $msg;	 

       $modelResponsaveis = new ResponsaveisModel();
       $modelCategorias   = new CategoriasModel();
       $dados['listaResponsaveis'] = $modelResponsaveis->orderBy('res_descricao', 'ASC')->findAll();
       $dados['listaCategorias']   = $modelCategorias->orderBy('cat_descricao', 'ASC')->findAll();
       
       return view('nova_tarefa', $dados);
    }

    public function salvar($id = null)
    {
      if($this->checarLogin()) return redirect()->to('/login');
       helper(['form']);

       $validacao = [
			       	'descricao' 	    => 'required|min_length[5]|max_length[200]',
			       	'responsavel' 		=> 'required',
			       	'categoria' 		  => 'required',
			       	'dataFinalizacao' => 'required|valid_date'
                    ];

      if($this->validate($validacao)){
			$modelTarefas = new TarefasModel();
			$dados = [
				'tar_descricao'         => $this->request->getVar('descricao'),
				'res_id' 	              => $this->request->getVar('responsavel'),
				'cat_id' 	              => $this->request->getVar('categoria'),
				'tar_data_finalizacao'  => $this->request->getVar('dataFinalizacao')
			];

			if(is_numeric($id)){
				
				if($modelTarefas->update($id, $dados)){
					$msg['mensagem'] = 'Cadastro atualizado com sucesso!';
					$msg['tipo']     = 'alert-success';
					$msg['pagina']   = '/principal';
					return view('mensagem', $msg);
				}else{
					$msg['mensagem'] = 'Erro ao atualizar cadastro!';
					$msg['tipo']     = 'alert-danger';
					$msg['pagina']   = '/principal/editar/'.$id;
					return view('mensagem', $msg);
				};

			}else{
			    
			    if($modelTarefas->save($dados)){
					$msg['mensagem'] = 'Cadastro realizado com sucesso!';
					$msg['tipo']     = 'alert-success';
					$msg['pagina']   = '/principal';
					return view('mensagem', $msg);
				}else{
					$msg['mensagem'] = 'Erro ao realizar cadastro!';
					$msg['tipo']     = 'alert-danger';
					$msg['pagina']   = '/principal/nova';
					return view('mensagem', $msg);
				};
			}
		}else{
			if(is_numeric($id)){
			   return $this->editar($id, $this->validator);
			}else{
			   return $this->nova($this->validator);
			}   
		}

    }

    public function editar($id, $msg = null)
    {
      if($this->checarLogin()) return redirect()->to('/login');

    	helper(['form']); 
    	if($msg) $dados['validacao'] = $msg;	 

      $modelTarefas      = new TarefasModel();
    	$modelResponsaveis = new ResponsaveisModel();
    	$modelCategorias   = new CategoriasModel();
      $dados['tarefa']            = $modelTarefas->find($id);
    	$dados['listaResponsaveis'] = $modelResponsaveis->orderBy('res_descricao', 'ASC')->findAll();
    	$dados['listaCategorias']   = $modelCategorias->orderBy('cat_descricao', 'ASC')->findAll();
        return view('editar_tarefa', $dados);
    }

    public function excluir($id)
    { 
      if($this->checarLogin()) return redirect()->to('/login');

    	$modelTarefas = new TarefasModel();
    	if($modelTarefas->delete($id)){
    		$msg['mensagem'] = 'ID:'.$id.' - Cadastro deletado permanentemente!';
    		$msg['tipo']     = 'alert-success';
    		$msg['pagina']   = '/principal';
    		return view('mensagem', $msg);
    	}else{
    		$msg['mensagem'] = 'Erro ao deleta o cadastro!';
    		$msg['tipo']     = 'alert-danger';
    		$msg['pagina']   = '/principal/nova';
    		return view('mensagem', $msg);
    	};
    }

}

?>