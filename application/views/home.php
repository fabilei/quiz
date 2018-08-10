<div class="container-fluid conteudo">
    <article>
        <div class="row text-center ">
            <h2 class="h2-titulo">Lista dos Quiz</h2>
            <hr class="hr-titulo">
            <br> 
        </div>
        <div class="row ">
        <div class="col-md-1 ">
        </div>
        <div class="col-md-10 ">
            <?php
            if($quiz != null){
            foreach ($quiz as $item) {
                ?>
                <section>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 prof-div">
                        <div class="alert alert-default-transparent div-profe">
                            <div class="">
                                <div class="itemavatar">
                                    <?php if ($item['img_quiz'] != '') { ?>
                                        <a href="<?= base_url('Home/responder?id_quiz='.$item['id_quiz']) ?>" class="detalhe_item" id="<?php echo $item['id_quiz'] ?>">
                                            <img src="<?= base_url("uploads/quiz_thumb/" . $item['img_quiz']) ?>" class="img-responsive img-circle">
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('Home/responder?id_quiz='.$item['id_quiz']) ?>" class="detalhe_item" id="<?php echo $item['id_quiz'] ?>">
                                            <img src="<?= base_url("assets/images/mascote.png") ?>" class="img-responsive img-circle" width="150px;">
                                        </a>
                                    <?php } ?>
                                </div>
                                <hr/>
                                <div class="text-center">
                                    <h4 class="">
                                        <a href="" class="detalhe_item" id="<?php echo $item['id_quiz'] ?>">
                                            <?php echo $item['name'] ?>
                                        </a>
                                    </h4>
                                    <button type="button" onclick="responder(<?php echo $item['id_quiz'] ?>)"  data-toggle="modal" data-target="#responderModal" class="btn btn-success" id="resp" name="resp" alt="Responder" title="Responder">
                                        Responder
                                    </button>
                                </div>
                                <div style="display: none;">
                                    <div style="display: none;" id="name-<?= $item['id_quiz'] ?>"><?= $item['name'] ?></div>
                                    <div style="display: none;" id="descricao-<?= $item['id_quiz'] ?>"><?= $item['description'] ?></div>
                                    <div style="display: none;" id="img_quiz-<?= $item['id_quiz'] ?>">
                                        <div class="itemavatar">
                                            <?php if ($item['img_quiz'] != '') { ?>
                                                <img src="<?= base_url("uploads/quiz_thumb/" . $item['img_quiz']) ?>" class="img-responsive img-circle" width="150px;">
                                            <?php } else { ?>
                                                <img src="<?= base_url("assets/img/sem_produto.jpg") ?>" class="img-responsive img-circle" width="150px;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } 
            } ?>

          </div>
        </div>
        <div class="col-md-1 ">
        </div>

<div class="modal fade" id="responderModal" tabindex="-1" role="dialog" aria-labelledby="responderModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="responderModalLabel">Informe todos os campos!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <div class="row pb-5">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                        <div class="form-group mb-3">
                            <label class="control-label">Nome<b style="color:red"> *</b></label>
                            <div class="input-group">
                            <input type="text" class="form-control uppercase" name="nome"  id="nome"  required >
                                <input type="hidden" name="nome_qtd"  id="nome_qtd">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row pb-5">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                        <div class="form-group mb-3">
                            <label class="control-label">E-mail<b style="color:red"> *</b></label>
                            <div class="input-group">
                            <input type="text" class="form-control uppercase" name="email"  id="email" required >
                                <input type="hidden" name="email_qtd"  id="email_qtd">
                            </div>
                        </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="continue" onclick="confirmar()">Continuar</button>
					<input type="hidden" value="" id="id_quiz_" name="id_quiz_">
				</div>
			</div>
		</div>
	</div>

    </article>        
</div>

<script>

function responder(cod){
	$("#id_quiz_").val(cod);
}

function confirmar(){
	cod = $("#id_quiz_").val();
    nome = $("#nome").val();
    email = $("#email").val();
    if(nome != '' && email != '')
    {
	    window.location.href = "<?php echo base_url()?>"+'Home/responder?id_quiz='+cod+'&nome='+nome+'&email='+email;
    }else{
        swalAlerta('Atenção', 'Favor informar todos os campos!', 'warning', 'Ok');
    }
}

</script>