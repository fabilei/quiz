
<main class="main-content p-5" role="main">
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-9 text-center">
			<h1>Responder ao Quiz</h1>
		</div>
		<div class="col-md-1">
			
		</div>
	</div>
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
				<form id="new_question" name="new_question" method="POST" action="saveReply" enctype_name="multipart/form-data" >
					<input type="hidden" name="id_answer"  id="id_answer" value="<?php echo $id_answer ?>">
					<input type="hidden" name="totalQuestions"  id="totalQuestions" value="<?php echo $totalQuestions ?>">
					
					<!-- Dados -->
					<div class="row">
						<div class="col-md-12">
							<div class="row pb-5">
								<div class="col-md-1">
								
								</div>
								<div class="col-md-3">
									<h1>Título</h1>
									<p><?php echo $quiz['name'] ?></p>
									<img class="card-img round_img img-fluid" src="<?php echo base_url('uploads/quiz/'. $quiz['img_quiz']) ?>" alt="<?php echo $quiz['name'] ?>" >
								</div>
							</div>

							<div class="row pb-5">
								<div class="col-md-1">
								</div>
								<div class="col-md-3">
									<h1>Descrição</h1>
									<div><?php echo $quiz['description'] ?></div>
								</div>
							</div>
						</div>
					</div>
					
					<div id="questions">
						<?php 
						if($quiz_list != null)
						{
							$itemAnterior = 0;
                    		$contador = 1;
							foreach($quiz_list as $item)
							{ 
								if ($itemAnterior != $item['id_question']) 
								{
							?>
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading-<?= $item['id_question'] ?>">
                                        <h4 class="panel-title">
                                            <a class="btn-accordion" style="text-decoration: none;"  data-toggle="collapse"  href="#collapse-<?= $item['id_question']; ?>">
                                                <?= $contador ?> - Questão ID: <?= $item['id_question'] ?>

                                                <?php
                                                if (($item['type'] == 1) || ($item['type'] == 2)) {
                                                    echo "<span class='pull-right'><i class='fa fa-check'></i> Certa ou <i class='fa fa-times'></i> Errada</span>";
                                                } else if (($item['type'] == 3)) {
                                                    echo "<span class='pull-right'><i class='fa fa-check-square-o'></i> " . $item['type_name'] . "</span>";
                                                } 
                                                ?>
                                            </a>
                                        </h4>
                                    </div>

									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<h4 class="h4_enunciado_simulado text-justify"><?= $item['subject'] ?></h4>
                                                <div class="separator"></div>

												<?php
                                                    //Opções
                                                    if ($item['type'] == 3) {
														$qtdAlternativa = 1;
                                                        foreach ($quiz_questions as $item_q) {
                                                            if ($item_q['question_id'] == $item['id_question']) {
                                                                ?>
                                                                <div class="col-md-12 margin-alternativas">
                                                                    <input type="checkbox" class="multipla_<?= $item['id_question'] ?>"
                                                                           onclick="salvaAlternativas('options-<?php echo $contador . '_' . $qtdAlternativa . '_' . $item['id_question'] ?>')" 
                                                                           id="options-<?php echo $contador . '_' . $qtdAlternativa . '_' . $item['id_question'] ?>" 
                                                                           name="options-<?php echo $contador . '_' . $qtdAlternativa . '_' . $item['id_question'] ?>[]" 
                                                                           value="<?php echo $contador . '_' . $qtdAlternativa ?>">
                                                                    <label for="options-<?php echo $contador . '_' . $qtdAlternativa . '_' . $item['id_question'] ?>" class="">
                                                                        
                                                                        <?php echo $item_q['answer'] ?>
                                                                    </label>
                                                                    <input type="hidden" id="question_<?= $contador . '_' . $qtdAlternativa. '_' . $item['id_question']  ?>" name="question_<?= $contador . '_' . $qtdAlternativa. '_' . $item['id_question']  ?>[]" value="0" />
                                                                </div>
                                                                <?php $qtdAlternativa = $qtdAlternativa + 1; ?>

                                                            <?php } ?>
                                                        <?php } ?>

												<?php } 
												// certo/errado
												else if ($item['type'] == 1 || $item['type'] == 2) 
												{
													?>
													<input type="radio" onclick="salvaCertoErrado('certoerrado_<?php echo $contador . '_' . $item['id_question'] . '_1' ?>')" id="certoerrado_<?php echo $contador . '_' . $item['id_question'] . '_1' ?>" name="certoerrado_<?php echo $contador . '_' . $item['id_question'] ?>[]" value="1"> Certo<br>
													<input type="radio" onclick="salvaCertoErrado('certoerrado_<?php echo $contador . '_' . $item['id_question'] . '_0' ?>')" id="certoerrado_<?php echo $contador . '_' . $item['id_question'] . '_0' ?>" name="certoerrado_<?php echo $contador . '_' . $item['id_question'] ?>[]" value="0"> Errado<br>
													<input type="hidden" id="ce_certoerrado_<?php echo $contador . '_' . $item['id_question'] ?>" name="certoerrado_<?php echo $contador . '_' . $item['id_question'] ?>" value="">
													<?php
												}
                                                    
												?>

											</div>
										</div>
									</div>


								</div>
							</div>
						<?php 
									$itemAnterior = $item['id_question'];
								}
								$contador++;
							}
						} ?>
					</div>

<input class="btn btn-success active form-control uppercase"  type="submit" id="responder" name="responder" value="Responder" style="margin-bottom:50px" />

				</form>
				</div>
			</div>
		</div>
	</div>
</main>

</div>

<script>

	function salvaAlternativas(campo){
		var values = $("#"+campo).is(":checked");
		var campos = campo.split('-');
		var hide = 'question_'+campos[1] ;
		if(values == true){
			$("#"+hide).val(1);
		}else{
			$("#"+hide).val(0);
		}
		alert(hide);
	}

	$(document).ready(function ($) {

		$(".errada").on('click', function(){
			var campo = $(this).val();
			var novo = "me_"+campo+"_opcao_";
			$("#"+novo).val(0);
			console.log(campo);
			console.log(novo);
		});

		$(".certa").on('click', function(){
			var campo = $(this).val();
			var novo = "me_"+campo+"_opcao_";
			$("#"+novo).val(1);
			console.log(campo);
			console.log(novo);
		});

	tinymce.init({
		forced_root_block: "",
		selector: '#subject',
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
		images_upload_url: base + "Painel/Question/upload",
		images_upload_base_path: base + 'uploads/question/',
		setup: function (editor) {
			editor.on('keyup', function (e) {
				var validar = tinyMCE.get('subject').getContent();
				var tamanho = validar.length;
				$('#subject_qtd').val(tamanho);
				console.log($('#subject_qtd').val());
			});
		}
	});

	tinymce.init({
		forced_root_block: "",
		selector: '#me_a',
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
		images_upload_url: base + "Painel/Question/upload",
		images_upload_base_path: base + 'uploads/question/',
		setup: function (editor) {
			editor.on('keyup', function (e) {
				var validar = tinyMCE.get('txt_me_a').getContent();
				var tamanho = validar.length;
				//$('#subject_qtd').val(tamanho);
				//console.log($('#subject_qtd').val());
			});
		}
	});

	tinymce.init({
		forced_root_block: "",
		selector: '#me_b',
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
		images_upload_url: base + "Painel/Question/upload",
		images_upload_base_path: base + 'uploads/question/',
		setup: function (editor) {
			editor.on('keyup', function (e) {
				var validar = tinyMCE.get('txt_me_b').getContent();
				var tamanho = validar.length;
				//$('#subject_qtd').val(tamanho);
				//console.log($('#subject_qtd').val());
			});
		}
	});

	tinymce.init({
		forced_root_block: "",
		selector: '#me_c',
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
		images_upload_url: base + "Painel/Question/upload",
		images_upload_base_path: base + 'uploads/question/',
		setup: function (editor) {
			editor.on('keyup', function (e) {
				var validar = tinyMCE.get('txt_me_c').getContent();
				var tamanho = validar.length;
				//$('#subject_qtd').val(tamanho);
				//console.log($('#subject_qtd').val());
			});
		}
	});

	tinymce.init({
		forced_root_block: "",
		selector: '#me_d',
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
		images_upload_url: base + "Painel/Question/upload",
		images_upload_base_path: base + 'uploads/question/',
		setup: function (editor) {
			editor.on('keyup', function (e) {
				var validar = tinyMCE.get('txt_me_d').getContent();
				var tamanho = validar.length;
				//$('#subject_qtd').val(tamanho);
				//console.log($('#subject_qtd').val());
			});
		}
	});

	tinymce.init({
		forced_root_block: "",
		selector: '#me_e',
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
		images_upload_url: base + "Painel/Question/upload",
		images_upload_base_path: base + 'uploads/question/',
		setup: function (editor) {
			editor.on('keyup', function (e) {
				var validar = tinyMCE.get('txt_me_e').getContent();
				var tamanho = validar.length;
				//$('#subject_qtd').val(tamanho);
				//console.log($('#subject_qtd').val());
			});
		}
	});


	$("#multiplaEscolha").hide();
	$("#titulo").focus();

	});

	$("#subject").on('keyup', function(){
		var validar = $("#subject").val();
		var tamanho = $('#subject').val().length;
		$('#subject_qtd').val(tamanho);
		if(tamanho >= 3){
			$('#subject').removeClass('btn btn-outline-danger');
			$('#subject').addClass('btn btn-outline-success');
		}else{
			$('#subject').removeClass('btn btn-outline-success');
			$('#subject').addClass('btn btn-outline-danger');
		}
	});

	$("#id_type_name").on('change', function(){
		var type_names = $("#id_type_name").val();
		if(type_names == 1 || type_names == 2){
			$("#multiplaEscolha").hide();
		}
		else if(type_names == 3)
		{
			$("#multiplaEscolha").show();
		}
	});

	$('form').submit(function(evt){
		var valido = 1;

		var id_type_name = $("#id_type_name").val();
		if(id_type_name == 0 || id_type_name  == ""){
			console.log('entrou if subject_qtd');
			valido = 0;
		}
		
		if(valido == 0){
			evt.preventDefault();
			swalAlerta('Atenção', 'Preencha todos os campos!', 'warning', 'Ok');
			
		}else{
			return true;
		}
	});

</script>