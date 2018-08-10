<br><br>
<main class="main-content p-5" role="main">
	<div class="row search-row mb-5">
		<div class="col-lg-1 ">
		</div>
		<div class="col-md-10">
			<div class="form-group">
				<label for="filtr-search-1"><h4>Perguntas</h4></label>
				<button class="btn btn-primary active" style="float:right" type="button" id="new_question" name="new_question" ><nobr><i class="batch-icon batch-icon-user-alt-add"></i> Novo</nobr></button>
			</div>
		</div>
	</div>
	<br>
	<div class="card card-body">
		<div class="col-lg-1 pb-5">
		</div>
		<div class="col-lg-10 pb-5">
			<div class="table-responsive">
				<table id="datatable-1" class="table table-datatable table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Status</th>
							<th>Assunto</th>
							<th>Tipo</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($questions as $item){ ?>
							<tr>
							<td><?php echo $item['id_question'] ?></td>
							<td>
								<?php if($item['deleted'] != 1){ ?>
									<span class="badge badge-primary">Ativo</span>
								<?php }else{ ?>
									<span class="badge badge-danger danger">Inativo</span>
								<?php } ?>
							</td>
							<td><?php echo $item['subject'] ?></td>
							<td><?php echo $item['name'] ?></td>
							<td>
								<button type="button" class="btn btn-info btn-sm waves-effect waves-light" id="visualize" name="visualize" alt="Visualizar" title="Visualizar" onclick="visualize(<?php echo $item['id_question'] ?>)" >
									Visualizar
								</button>	
							</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	

</main>

<script>

function desativar(cod){
	$("#id_question_").val(cod);
}

$("#new_question").on('click', function(){
	window.location.href = "<?php echo base_url('Painel/Question/new') ?>";
});

function visualize(cod){
	window.location.href = "<?php echo base_url()?>"+'Painel/Question/visualize?id_question='+cod;
}

</script>