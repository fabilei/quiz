<br><br>
<main class="main-content p-5" role="main">
	<div class="row search-row mb-5">
		<div class="col-lg-1 ">
		</div>
		<div class="col-md-10">
			<div class="form-group">
				<label for="filtr-search-1"><h4>Quizes</h4></label>
				<button class="btn btn-primary active" style="float:right" type="button" id="new_quiz" name="new_quiz" ><nobr><i class="batch-icon batch-icon-user-alt-add"></i> Novo</nobr></button>
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
							<th>Nome</th>
							<th>Descrição</th>
							<th>Imagem</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($quiz as $item){ ?>
							<tr>
							<td><?php echo $item['id_quiz'] ?></td>
							<td>
								<?php if($item['deleted'] != 1){ ?>
									<span class="badge badge-primary">Ativo</span>
								<?php }else{ ?>
									<span class="badge badge-danger danger">Inativo</span>
								<?php } ?>
							</td>
							<td><?php echo $item['name'] ?></td>
							<td><?php echo $item['description'] ?></td>
							<td>
								<img class="card-img round_img img-fluid" src="<?php echo base_url('uploads/quiz_thumb/'. $item['img_quiz']) ?>" alt="<?php echo $item['name'] ?>" style="border-radius: 50%;width:70px;height:70px">
							</td>
							<td>
								<button type="button" class="btn btn-info btn-sm waves-effect waves-light" id="visualize" name="visualize" alt="Visualizar" title="Visualizar" onclick="visualize(<?php echo $item['id_quiz'] ?>)" >
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
	$("#id_quiz_").val(cod);
}

$("#new_quiz").on('click', function(){
	window.location.href = "<?php echo base_url('Painel/Quiz/new') ?>";
});

function visualize(cod){
	window.location.href = "<?php echo base_url()?>"+'Painel/Quiz/visualize?id_quiz='+cod;
}

</script>