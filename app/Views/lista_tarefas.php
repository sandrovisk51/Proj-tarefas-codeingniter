<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <title>Sistema de Tarefas</title>
</head>
<body>
    <div class="container">
            <h2 class="text-center mt-4 mb-4 py-4 bg-primary text-white rounded-pill">Sistema de Tarefas</h2>
            <?php 
	            if(!empty($mensagem)):
		            echo '<div class="alert alert-danger">'.$mensagem.'</div>';
		        endif;
	        ?>
            <div class="d-flex flex-row-reverse bd-highlight">
              <div class="p-2 bd-highlight"><a class="btn btn-secondary  float-right" href="/login/deslogar" role="button"><?= session()->get('usu_nome')?> | Sair</a></div>
            </div>
            
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col"><a class="btn btn-primary" href="/principal/nova" role="button">Adicionar nova tarefa</a></div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="listaTarefas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="mx-auto" style="width:50%;">DESCRIÇÃO</th>
                                <th>OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($listaTarefas):
                            foreach($listaTarefas as $tarefa):
                                echo '
                                <tr>
                                    <td>'.$tarefa["id"].'</td>
                                    <td>'.$tarefa["tar_descricao"].'</td>
                                    <td>
                                        <a class="btn btn-secondary ml-5 mr-5" href="principal/editar/'.$tarefa["id"].'" role="button">Editar</a>
                                        <a class="btn btn-danger" href="JavaScript:void(0);"  onclick="deletar('.$tarefa["id"].')" role="button">Excluir</a>
                                        <a class="btn btn-info ml-5" href="JavaScript:void(0);"  onclick="detalhe('.$tarefa["id"].')" role="button">Detalhe</a>
                                    </td>
                                </tr>';
                            endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="deleteModalLabel">Excluir Tarefa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <div class="alert alert-warning" role="alert" id="msge"></div>
             <button type="button" class="btn btn-danger mr-5" data-dismiss="modal">Não</button>
             <a id="btn-del" class="btn btn-primary">Sim</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Detalhe -->
    <div class="modal fade" id="modalDetalhe" tabindex="-1" aria-labelledby="detalheModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="detalheModalLabel">Detalhe da Tarefa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id='id' class="text-info text-capitalize"></p>
            <p id='descricao' class="text-info text-capitalize"></p>
            <p id='responsavel' class="text-info text-capitalize"></p>
            <p id='categoria' class="text-info text-capitalize"></p>
            <p id='data' class="text-info text-capitalize"></p>
            <p id='msgd'></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <script src="<?= base_url('assets/js/main.js') ?>" type="text/javascript" charset="utf-8"></script>
</body>
</html>

