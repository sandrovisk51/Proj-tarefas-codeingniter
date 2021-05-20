<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;


class Login extends Controller
{
	
	public function index()
	{
		helper(['form']);
		echo view('login');
	}

	public function validacao()
	{   
		//inicia um variavel sessão
        $sessao = session();
        $model = new UsuarioModel();//estancia a model usuario
        $email = $this->request->getVar('email'); //pega o dado email enviado
        $senha = $this->request->getVar('senha'); //pega o dado senha enviado
        $dados = $model->where('usu_email', $email)->first();//verifica se tem o email solicitado no base
        if($dados){//encontrou
            $senhaUsuario     = $dados['usu_senha'];
            $verificandoSenha = password_verify($senha, $senhaUsuario);
            if($verificandoSenha){
                $dadosSessao = [
                    'usu_id'       => $dados['id'],
                    'usu_nome'     => $dados['usu_nome'],
                    'usu_email'    => $dados['usu_email'],
                    'logado'       => TRUE
                ];
                $sessao->set($dadosSessao);
                return redirect()->to('/principal');
            }else{
                $sessao->setFlashdata('msg', 'Senha não é valida!');
                return redirect()->to('/login');
            }
        }else{
            $sessao->setFlashdata('msg', 'Email não encontrado');
            return redirect()->to('/login');
        }
    }

    public function deslogar()
    {
        $sessao = session();
        $sessao->destroy();
        return redirect()->to('/login');
    }

}
?>