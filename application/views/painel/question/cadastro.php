
<main class="main-content p-5" role="main">
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-9 text-center">
			<h1>Cadastro de Pergunta</h1>
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
				<form id="new_question" name="new_question" method="POST" action="save" enctype="multipart/form-data" >
					
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
						<div class="col-md-3">
							<label>Tipo</label>
							<?php echo $dropDownType ?>
						</div>
					</div>

					<div class="row pb-5">
						<div class="col-md-1">
						</div>
						<div class="col-md-10">
							<div class="form-group mb-3">
								<label class="control-label">Assunto<b style="color:red"> *</b></label>
								<div class="input-group">
									<textarea id="subject" name="subject" rows="15"></textarea>
									<input type="hidden" name="subject_qtd"  id="subject_qtd">
								</div>
							</div>
							<br>

							<div class="row">
                                <div class="col-sm-12 " id="multiplaEscolha">
                                    <h1>Opções</h1>
                                    <div class="form-group ">
                                        <br>
                                        <div class="width100">   
                                            <div id="alter_a">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="width:100%">(A) <code>*</code></span>
                                                    <textarea rows="1" id="me_a" name="me_a"></textarea>
                                                    <input type="hidden" name="txt_me_a" id="txt_me_a"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default errada" aria-label="Alternativa errada" id="me_a_errada" name="me_a_errada" value="a">
                                                        <span class="fa fa-times"></span>
                                                        <span>Errada</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default certa" aria-label="Alternativa certa" id="me_a_certa" name="me_a_certa" value="a">
                                                        <span class="fa fa-check"></span>
                                                        <span>Certa</span>
                                                    </button>
                                                    <input type="hidden" id="me_a_opcao_" name="me_a_opcao_" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="editarItem_" >
                                                    
                                                </span>
                                            </div>
                                            <hr/>
                                            <div id="alter_b">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="width:100%">(B) <code>*</code></span>
                                                    <textarea rows="1" id="me_b" name="me_b"></textarea>
                                                    <input type="hidden" name="txt_me_b" id="txt_me_b"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default errada" aria-label="Alternativa errada" id="me_b_errada" name="me_b_errada" value="b">
                                                        <span class="fa fa-times"></span>
                                                        <span>Errada</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default certa" aria-label="Alternativa certa" id="me_b_certa" name="me_b_certa" value="b">
                                                        <span class="fa fa-check"></span>
                                                        <span>Certa</span>
                                                    </button>
                                                    <input type="hidden" id="me_b_opcao_" name="me_b_opcao_" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="editarItem_" >
                                                    
                                                </span>
                                            </div>
                                            <hr/>
                                            <div id="alter_c">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="width:100%">(C) </span>
                                                    <textarea rows="1" id="me_c" name="me_c"></textarea>
                                                    <input type="hidden" name="txt_me_c" id="txt_me_c"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default errada" aria-label="Alternativa errada" id="me_c_errada" name="me_c_errada" value="c">
                                                        <span class="fa fa-times"></span>
                                                        <span>Errada</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default certa" aria-label="Alternativa certa" id="me_c_certa" name="me_c_certa" value="c">
                                                        <span class="fa fa-check"></span>
                                                        <span>Certa</span>
                                                    </button>
                                                    <input type="hidden" id="me_c_opcao_" name="me_c_opcao_" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="editarItem_" >
                                                     
                                                </span>
                                            </div>
                                            <hr/>
                                            <div id="alter_d">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="width:100%">(D) </span>
                                                    <textarea rows="1" id="me_d" name="me_d"></textarea>
                                                    <input type="hidden" name="txt_me_d" id="txt_me_d"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default errada" aria-label="Alternativa errada" id="me_d_errada" name="me_d_errada" value="d">
                                                        <span class="fa fa-times"></span>
                                                        <span>Errada</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default certa" aria-label="Alternativa certa" id="me_d_certa" name="me_d_certa" value="d">
                                                        <span class="fa fa-check"></span>
                                                        <span>Certa</span>
                                                    </button>
                                                    <input type="hidden" id="me_d_opcao_" name="me_d_opcao_" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="editarItem_" >
                                                    
                                                </span>
                                            </div>
                                            <hr/>
                                            <div id="alter_e">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="width:100%">(E)</span>
                                                    <textarea rows="1" id="me_e" name="me_e"></textarea>
                                                    <input type="hidden" name="txt_me_e" id="txt_me_e"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default errada" aria-label="Alternativa errada" id="me_e_errada" name="me_e_errada" value="e">
                                                        <span class="fa fa-times"></span>
                                                        <span>Errada</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default certa" aria-label="Alternativa certa" id="me_e_certa" name="me_e_certa" value="e">
                                                        <span class="fa fa-check"></span>
                                                        <span>Certa</span>
                                                    </button>
                                                    <input type="hidden" id="me_e_opcao_" name="me_e_opcao_" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="editarItem_" >
                                                    
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<br>
							<input class="btn btn-success active form-control uppercase"  type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" />
							<br><br>
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

	$("#id_type").on('change', function(){
		var types = $("#id_type").val();
		if(types == 1 || types == 2){
			$("#multiplaEscolha").hide();
		}
		else if(types == 3)
		{
			$("#multiplaEscolha").show();
		}
	});

	$('form').submit(function(evt){
		var valido = 1;

		var id_type = $("#id_type").val();
		if(id_type == 0 || id_type  == ""){
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