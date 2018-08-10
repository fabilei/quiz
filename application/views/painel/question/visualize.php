<main class="main-content p-5" role="main">
	<div class="row">
		<div class="col-md-8 text-center">
			<h1>Pergunta</h1>
		</div>
		<div class="btn-group btn-group-md" role="group" aria-label="Small button group" style="margin-top:30px">
			
			<button type="button" class="btn btn-info voltar_pagina" id="voltar" name="voltar" alt="Voltar" title="Voltar">
				<i class="batch-icon batch-icon-return"></i>
			</button>

			<button type="button" onclick="edit(<?php echo $questions['id_question'] ?>)" class="btn btn-primary" id="edit" name="edit" alt="Editar" title="Editar">
				<i class="batch-icon batch-icon-nib"></i>
			</button>
			
			<?php if($questions['deleted'] == 1){ ?>
				<button type="button" onclick="ativar(<?php echo $questions['id_question'] ?>)"  data-toggle="modal" data-target="#ativarModal" class="btn btn-success" id="ativar" name="ativar" alt="Ativar" title="Ativar">
					<i class="batch-icon batch-icon-user-alt-add"></i>
				</button>
			<?php }else{ ?>
				<button type="button" onclick="desativar(<?php echo $questions['id_question'] ?>)"  data-toggle="modal" data-target="#desativarModal" class="btn btn-danger" id="desativar" name="desativar" alt="Desativar" title="Desativar">
					<i class="batch-icon batch-icon-user-alt-remove"></i>
				</button>
			<?php } ?>

			<?php if($totalQuestions == 0){ ?>
				<button type="button" onclick="excluir(<?php echo $questions['id_question'] ?>)" data-toggle="modal" data-target="#excluirModal" class="btn btn-danger" id="excluir" name="excluir" alt="Excluir" title="Excluir">
					<i class="batch-icon batch-icon-delete"></i>
				</button>
			<?php }else{ ?>
				<button type="button" onclick="naoExcluir()" data-toggle="modal" class="btn btn-danger" id="excluir" name="excluir" alt="Excluir" title="Excluir">
					<i class="batch-icon batch-icon-delete"></i>
				</button>
			<?php } ?>

			
		</div>
	</div>
	
	<div class="row mb-5">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<div class="card">
				<div class="card-body">
					<hr />
					<div class="row">
						<div class="col-sm-3">
							<h3>Assunto:</h3>
							<p>
								<?php echo $questions['subject'] ?>
							</p>
						</div>
						<div class="col-sm-3">
							<h3>Tipo:</h3>
							<p>
								<?php echo $questions['name'] ?>
							</p>
						</div>
						<div class="col-sm-3">
							<h3>Status:</h3>
							<p>
								<?php if($questions['deleted'] == 0){ ?>
									Ativo
								<?php }else{ ?>
									Inativo
								<?php } ?>
							</p>
						</div>
					</div>
				</div>
				
				<div class="card card-body">
		<div class="col-lg-1 pb-5">
		</div>
		<div class="col-lg-10 pb-5">
			<div class="table-responsive">
				<table id="datatable-1" class="table table-datatable table-striped table-hover">
					<thead>
						<tr>
							<th>Alternativas</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($alternatives as $item){ ?>
							<tr>
							<td><?php echo $item['answer'] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

			</div>
		</div>
	</div>

<div class="modal fade" id="desativarModal" tabindex="-1" role="dialog" aria-labelledby="desativarModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="desativarModalLabel">Você deseja realmente desativar a Pergunta?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="deletar" onclick="confirmar()">Desativar</button>
					<input type="hidden" value="" id="id_question_">
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="ativarModal" tabindex="-1" role="dialog" aria-labelledby="ativarModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ativarModalLabel">Você deseja realmente ativar a Pergunta?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="ativar" onclick="confirmarAtivar()">Ativar</button>
					<input type="hidden" value="" id="id_question_">
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="excluirModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="excluirModalLabel">Você deseja realmente excluir a Pergunta?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="excluir" onclick="confirmarExcluir()">Excluir</button>
					<input type="hidden" value="" id="id_question_">
				</div>
			</div>
		</div>
	</div>
	
<script>

function visualizar(cod){
	window.location.href = "<?php echo base_url()?>"+'Painel/Question/visualizar?id_question='+cod;
}

function edit(cod){
	window.location.href = "<?php echo base_url()?>"+'Painel/Question/edit?id_question='+cod;
}

function desativar(cod){
	$("#id_question_").val(cod);
}

function ativar(cod){
	$("#id_question_").val(cod);
}

function excluir(cod){
	$("#id_question_").val(cod);
}

function naoExcluir(){
	swalAlerta('Erro', 'Esta categoria está sendo utilizada por um ou mais Conteúdos!!!<br>Não é permitido excluir!!!', 'error', 'Ok');
}

function confirmar(){
	cod = $("#id_question_").val();
	window.location.href = "<?php echo base_url()?>"+'Painel/Question/desativar?id_question='+cod;
}

function confirmarAtivar(){
	cod = $("#id_question_").val();
	window.location.href = "<?php echo base_url()?>"+'Painel/Question/ativar?id_question='+cod;
}

function confirmarExcluir(){
	cod = $("#id_question_").val();
	window.location.href = "<?php echo base_url()?>"+'Painel/Question/excluir?id_question='+cod;
}

$("#novo_produto").on('click', function(){
	window.location.href = "<?php echo base_url('Painel/Question/novo') ?>";
});


</script>


</main>