function detalhe(id){
	$('#modalDetalhe').modal('show');

	let url = window.location.host;

	$.ajax({
		url: 'http://'+url+'/detalhe/'+id,
		type: 'GET',
		dataType: 'JSON',
	})
	.done(function(resp) {
		var dados = JSON.parse(JSON.stringify(resp));
		$('#id').html('<strong class="text-primary">ID: </strong>'+dados.id);
		$('#descricao').html('<strong class="text-primary">DESCRIÇÃO: </strong>'+dados.descricao);
		$('#responsavel').html('<strong class="text-primary">RESPONSÁVEL: </strong>'+dados.responsavel);
		$('#categoria').html('<strong class="text-primary">CATEGORIA: </strong>'+dados.categoria);
		$('#data').html('<strong class="text-primary">DATA DE FINALIZAÇÃO: </strong>'+dados.dataFinalizacao);
	})
	.fail(function() {
		$('#msgd').html('<strong class="text-danger"> OCORREU UM POSSIVEL ERRO NA CONEXÃO.</strong>');
	});

}


function deletar(id){
	let link = document.getElementById("btn-del");
	link.href = 'principal/excluir/'+id;
	$('#msge').html('Desejá realmente excluir a tarefa <strong>( ID: '+id+' )</strong>');
    
	$('#modalDelete').modal('show');
}


$('#listaTarefas').DataTable( {
	"language": {
		"lengthMenu": "_MENU_ &nbsp;&nbsp;&nbsp;resultados por pagina",
		"zeroRecords": "Nenhum registro encontrado",
		"info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		"infoEmpty": "Mostrando 0 até 0 de 0 registros",
		"infoFiltered": "(Filtrados de _MAX_ registros)",
		"search": "Localizar",
		"paginate": {
			"next": " - Proximo",
			"previous": "Anterior - ",
			"first": "Primeiro ",
			"last": " Ultimo"
		},
	},
	"order": [[ 0, "desc" ]],
	"autoWidth": true, 
	"responsive": true     

});

	
