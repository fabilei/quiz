<main class="main-content p-5" role="main">
	<div class="row">
		<div class="col-md-8 text-center">
			<h1>Quiz</h1>
		</div>
		<div class="btn-group btn-group-md" role="group" aria-label="Small button group" style="margin-top:30px">
			
			<button type="button" class="btn btn-info voltar_pagina" id="voltar" name="voltar" alt="Voltar" title="Voltar">
				<i class="batch-icon batch-icon-return"></i>
			</button>

			<button type="button" onclick="edit(<?php echo $quiz['id_quiz'] ?>)" class="btn btn-primary" id="edit" name="edit" alt="Editar" title="Editar">
				<i class="batch-icon batch-icon-nib"></i>
			</button>
			
			<?php if($quiz['deleted'] == 1){ ?>
				<button type="button" onclick="ativar(<?php echo $quiz['id_quiz'] ?>)"  data-toggle="modal" data-target="#ativarModal" class="btn btn-success" id="ativar" name="ativar" alt="Ativar" title="Ativar">
					<i class="batch-icon batch-icon-user-alt-add"></i>
				</button>
			<?php }else{ ?>
				<button type="button" onclick="desativar(<?php echo $quiz['id_quiz'] ?>)"  data-toggle="modal" data-target="#desativarModal" class="btn btn-danger" id="desativar" name="desativar" alt="Desativar" title="Desativar">
					<i class="batch-icon batch-icon-user-alt-remove"></i>
				</button>
			<?php } ?>

				<button type="button" onclick="excluir(<?php echo $quiz['id_quiz'] ?>)" data-toggle="modal" data-target="#excluirModal" class="btn btn-danger" id="excluir" name="excluir" alt="Excluir" title="Excluir">
					<i class="batch-icon batch-icon-delete"></i>
				</button>

			
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
							<div class="profile-picture profile-picture-lg bg-gradient  mb-4">
								<?php if($quiz['img_quiz']){ ?>
									<img src="<?php echo base_url('uploads/quiz_thumb/'.$quiz['img_quiz']) ?>" id="img_avatar" name="img_avatar" width="144" height="144">
								<?php }else{ ?>
									<img src="<?php echo base_url('assets/img/sem_produto.jpg')  ?>" id="img_avatar" name="img_avatar" width="144" height="144">
								<?php } ?>
							</div>
						</div>

						<div class="col-sm-3">
							<h3>Título:</h3>
							<p>
								<?php echo $quiz['name'] ?>
							</p>
						</div>
						<div class="col-sm-3">
							<h3>Descrição:</h3>
							<p>
								<?php echo $quiz['description'] ?>
							</p>
						</div>
						<div class="col-sm-3">
							<h3>Status:</h3>
							<p>
								<?php if($quiz['deleted'] == 0){ ?>
									Ativo
								<?php }else{ ?>
									Inativo
								<?php } ?>
							</p>
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
							<th>#</th>
							<th>Assunto</th>
							<th>Tipo</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($questions as $item){ ?>
							<tr>
							<td><?php echo $item['question_id'] ?></td>
							<td><?php echo $item['subject'] ?></td>
							<td><?php echo $item['name'] ?></td>
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
	</div>

<div class="modal fade" id="desativarModal" tabindex="-1" role="dialog" aria-labelledby="desativarModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="desativarModalLabel">Você deseja realmente desativar o Quiz?</h5>
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
					<input type="hidden" value="" id="id_quiz_">
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="ativarModal" tabindex="-1" role="dialog" aria-labelledby="ativarModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ativarModalLabel">Você deseja realmente ativar o Quiz?</h5>
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
					<input type="hidden" value="" id="id_quiz_">
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="excluirModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="excluirModalLabel">Você deseja realmente excluir o Quiz?</h5>
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
					<input type="hidden" value="" id="id_quiz_">
				</div>
			</div>
		</div>
	</div>
	
<script>

function visualizar(cod){
	window.location.href = "<?php echo base_url()?>"+'Painel/Quiz/visualize?id_quiz='+cod;
}

function edit(cod){
	window.location.href = "<?php echo base_url()?>"+'Painel/Quiz/edit?id_quiz='+cod;
}

function desativar(cod){
	$("#id_quiz_").val(cod);
}

function ativar(cod){
	$("#id_quiz_").val(cod);
}

function excluir(cod){
	$("#id_quiz_").val(cod);
}



function confirmar(){
	cod = $("#id_quiz_").val();
	window.location.href = "<?php echo base_url()?>"+'Painel/Quiz/desativar?id_quiz='+cod;
}

function confirmarAtivar(){
	cod = $("#id_quiz_").val();
	window.location.href = "<?php echo base_url()?>"+'Painel/Quiz/ativar?id_quiz='+cod;
}

function confirmarExcluir(){
	cod = $("#id_quiz_").val();
	window.location.href = "<?php echo base_url()?>"+'Painel/Quiz/excluir?id_quiz='+cod;
}

$("#novo_produto").on('click', function(){
	window.location.href = "<?php echo base_url('Painel/Quiz/new') ?>";
});


</script>


</main>