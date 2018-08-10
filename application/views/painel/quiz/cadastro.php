				
				<main class="main-content p-5" role="main">
				<div class="row">
					<div class="col-md-1">
					</div>
					<div class="col-md-9 text-center">
						<h1>Cadastro de Quiz</h1>
					</div>
					<div class="col-md-1">
						<button type="button" class="btn btn-info voltar_pagina" style="margin-top:30px" id="voltar" name="voltar" alt="Voltar" title="Voltar">
							<i class="batch-icon batch-icon-return"></i>
						</button>
					</div>
				</div>
					<div class="row mb-5">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
								<form id="cad_quiz" name="cad_quiz" method="POST" action="saveQuiz" enctype="multipart/form-data" >
									
									<!-- Dados -->
									<div class="row">
										<div class="col-md-12">
											<p class="lead">
												
											</p>
										</div>
									</div>

									<div class="row pb-5">
										<div class="col-md-1">
										</div>
										<div class="col-md-10">
										<div class="form-group mb-3">
											<label class="control-label">Título<b style="color:red"> *</b></label>
											<div class="input-group">
											<input type="text" class="form-control uppercase" name="name"  id="name" placeholder="Mínimo de 3 caracteres" required >
												<input type="hidden" name="name_qtd"  id="name_qtd">
											</div>
										</div>
										</div>
									</div>

									<div class="row pb-5">
										<div class="col-md-1">
										</div>
										<div class="col-md-10">
										<div class="form-group mb-3">
											<label class="control-label">Descrição<b style="color:red"> *</b></label>
											<div class="input-group">
												<textarea id="description" name="description" rows="15"></textarea>
												<input type="hidden" name="description_qtd"  id="description_qtd">
											</div>
										</div>
										</div>
									</div>

									<div class="row pb-5">
										<div class="col-md-1">
										</div>
										<div class="col-md-10" style="margin-top:13.5px">
											<div class="">
												<div class="col-lg-12 mb-4">
													<div class="profile-picture profile-picture-lg bg-gradient mb-4">
														<img src="<?php echo base_url('assets/img/sem_produto.jpg')  ?>" id="img_avatar" name="img_avatar" width="144" height="144">
													</div>
													<div class="form-group mb-3">
														<div class="input-group">
															<input name="userfile" id="avatar" type="file" multiple="false" class="form-control avatar" />
															<input type="hidden" name="oldpath" id="oldpath" value=""/>
															<input type="hidden" name="newpath" id="newpath" value=""/>
															<input type="hidden" name="path_avatar" id="path_avatar" value=""/>
														</div>
													</div>	
												</div>
											</div>
											<br>
									<input class="btn btn-success active form-control uppercase"  type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" style="margin-bottom:50px" />
										</div>

									</div>
									
									<div class="card card-body" style="margin-bottom:20px">
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
																<button type="button" class="btn btn-info btn-sm waves-effect waves-light" id="add" name="add" alt="Adicionar" title="Adicionar" onclick="adicionar(<?php echo $item['id_question'] ?>)" >
																	Adicionar
																</button>	
															</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									
									<div class="card card-body" style="margin-bottom:20px">
										<div class="col-md-2 ">
											
										</div>
										<div class="col-md-7 ">
											<div class="table-responsive">

												<table id="datatable-1" class="table table-datatable table-striped table-hover">
													<thead>
														<tr>
															<th>Código da Questão</th>
															<th>Ações</th>
														</tr>
													</thead>
													<tbody class="adicionados">
													<?php
														if($list != null)
														{
															foreach($list as $item)
															{
																echo "<tr>";
																echo "<td>".$item['id_question']."</td>";
																echo '<td><button type="button" class="btn btn-info btn-sm waves-effect waves-light" id="remove" name="remove" alt="Remover" title="Remover" onclick="remove('. $item['id_question'].')" >';
																echo 'Remover';
																echo '</button></td>';
																echo "</tr>";
															}

														}
													?>
													</tbody>
												</table>
											</div>
										</div>
									</div>									
									
								</form>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>

<script>

	function adicionar(id_question){
		if(id_question != 0 && id_question != ""){
			$.ajax({
				url: '<?php echo base_url('Painel/Quiz/addQuestion') ?>',
				async: false,
				method: "POST",
				data: {id_question: id_question},
				dataType: "json",
				success: function (datas) {
					console.log(datas);
					updateListQuestion(datas);
					swalAlerta('Sucesso', 'Adicionado!', 'success', 'Ok');
				},
				error: function () {
					swalAlerta('Erro', 'Não foi adicionar!', 'error', 'Ok');
				}
			});
		}
	}

	function remove(id_question){
		if(id_question != 0 && id_question != ""){
			$.ajax({
				url: '<?php echo base_url('Painel/Quiz/removeQuestion') ?>',
				async: false,
				method: "POST",
				data: {id_question: id_question},
				dataType: "json",
				success: function (datas) {
					console.log(datas);
					updateListQuestion(datas);
					swalAlerta('Sucesso', 'Removido!', 'success', 'Ok');
				},
				error: function () {
					swalAlerta('Erro', 'Não foi adicionar!', 'error', 'Ok');
				}
			});
		}
	}

	function updateListQuestion(dados)
	{
		if(dados != null)
		{
			var nova_lista = "";
			$.each(dados, function(key, item)
      		{
				nova_lista += "<tr>";
				nova_lista += "<td>"+item.id_question+"</td>";
				nova_lista += '<td><button type="button" class="btn btn-info btn-sm waves-effect waves-light" id="remove" name="remove" alt="Remover" title="Remover" onclick="remove('+ item.id_question+')" >';
				nova_lista += 'Remover';
				nova_lista += '</button></td>';
				nova_lista += "</tr>";
			});
			$('.adicionados').html("");
			$('.adicionados').html(nova_lista);
		}
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			console.log(reader);
			reader.onload = function (e) {
				$('#img_avatar').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#avatar").change(function(){
		readURL(this);
	});

	$(document).ready(function ($) {



		tinymce.init({
			forced_root_block: "",
			selector: '#description',
			language: 'pt_BR',
			theme: 'modern',
			plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc '
			],
			toolbar1: 'undo redo | code | paste | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview | forecolor backcolor ',
			extraPlugins: 'uploadimage,uploadwidget, widget, clipboard, dialog, lineutils, dialogui',
			relative_urls: false,
			remove_script_host: false,
			convert_urls: true,
			paste_data_images: true,
			automatic_uploads: true,
			images_upload_url: base + "Painel/Quiz/upload",
			images_upload_base_path: base + 'uploads/quiz_desc/',
			setup: function (editor) {
				editor.on('keyup', function (e) {
					var validar = tinyMCE.get('subject').getContent();
					var tamanho = validar.length;
					$('#subject_qtd').val(tamanho);
					console.log($('#subject_qtd').val());
				});
			}
		});
	});

	

	$("#descricao").on('keyup', function(){
		var validar = $("#descricao").val();
		var tamanho = $('#descricao').val().length;
		$('#descricao_qtd').val(tamanho);
		if(tamanho >= 3){
			$('#descricao').removeClass('btn btn-outline-danger');
			$('#descricao').addClass('btn btn-outline-success');
		}else{
			$('#descricao').removeClass('btn btn-outline-success');
			$('#descricao').addClass('btn btn-outline-danger');
		}
	});


	$('form').submit(function(evt){
		var valido = 1;

		var descricao_qtd = $("#descricao_qtd").val();
		console.log(descricao_qtd);
		if(descricao_qtd < 3){
			console.log('entrou if descricao_qtd');
			valido = 0;
		}
		
		if(valido == 0){
			toastr['error']("Preencha todos os campos obrigatórios.<br>Verifique seus dados e tente novamente.");
			toastr.options = {
				"closeButton": true,
				"debug": false,
				"positionClass": "toast-top-right",
				"onclick": null,
				"showDuration": "400",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
			evt.preventDefault();
		}else{
			return true;
		}
	});

</script>