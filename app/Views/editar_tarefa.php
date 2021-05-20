<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Cadastrar nova Tarefa</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <h2 class="text-center mt-4 mb-4 py-4 bg-primary text-white rounded-pill">Sistema de Tarefas</h2>
            </div>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight"><a class="btn btn-secondary  float-right" href="/login/deslogar" role="button"><?= session()->get('usu_nome')?> | Sair</a></div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-6 border border-primary rounded px-5 py-5">
                <h5>Editar Tarefa</h5>
                <?php if(isset($validacao)):?>
                    <div class="alert alert-danger"><?= $validacao->listErrors() ?></div>
                <?php endif;?>
                <form action="/principal/salvar/<?=$tarefa['id']?>" method="post">
                    <div class="mb-2 mt-3">
                        <label for="InputForDescricao" class="form-label">Descrição da Tarefa</label>
                        <input type="text" name="descricao" class="form-control" id="InputForDescricao" value="<?=$tarefa['tar_descricao']?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="InputForResponsavel">Responsável</label>
                        <select class="form-control" name="responsavel" id="InputForResponsavel">
                            <?php
                                if($listaResponsaveis):
                                    foreach($listaResponsaveis as $responsavel):
                                        ($responsavel["id"] == $tarefa['res_id'])? $selected = 'selected' :$selected = NULL; 
                                     echo '<option value="'.$responsavel["id"].'" '.$selected.'>'.$responsavel["res_descricao"].'</option>';
                                    endforeach;
                                endif;
                           ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="InputForCategoria">Categoria</label>
                        <select class="form-control" name="categoria" id="InputForCategoria">
                            <?php
                                if($listaCategorias):
                                    foreach($listaCategorias as $categoria):
                                     ($categoria["id"] == $tarefa['cat_id'])? $selected = 'selected' :$selected = NULL;    
                                     echo '<option value="'.$categoria["id"].'" '.$selected.'>'.$categoria["cat_descricao"].'</option>';
                                    endforeach;
                                endif;
                           ?>
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="InputForDataFinalizacao" class="form-label">Data de Finalização</label>
                        <input type="date" name="dataFinalizacao" class="form-control" id="InputForDataFinalizacao" value="<?=$tarefa['tar_data_finalizacao']?>">
                    </div>
                    <a href="/principal" class="btn btn-danger mr-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>