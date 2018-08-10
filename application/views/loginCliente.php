<section class="main-container top-space col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2 class=" text-center ">ENTRAR</h2>
        </div>
        <fieldset class="">
         
          <div class=" registered-users">
            <div class="content">
				<form id="form_login" name="form_login" method="POST" action="autenticarCliente">
					<ul class="form-list">
						<li>
						<label for="email">E-mail <span class="required">*</span></label>
						<br>
						<input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="">
						</li>
						<li>
						<label for="pass">Senha <span class="required">*</span></label>
						<br>
						<input type="password" class="form-control" id="senha_cliente" name="senha_cliente" placeholder="">
						</li>
					</ul>
					<div class="buttons-set">
						<button id="send2" name="send" type="submit" class="button login"><span>Entrar</span></button>
            <script>
              function validarEmail(){
              //$("#email").on('keyup', function(){
                var sEmail	= $("#email").val();
                // filtros
                var emailFilter=/^.+@.+\..{2,}$/;
                var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
                // condição
                if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
                  swalAlerta('Erro', 'E-mail inválido!!!', 'error', 'Ok');
                }else{
                  $.ajax({
                    url: '<?php echo base_url("Clube/Cliente/lembrarSenha") ?>',
                    async: false,
                    method: "POST",
                    data: {email: sEmail},
                    dataType: "html",
                    success: function (data) {
                      swalAlerta('Sucesso', 'Sua senha foi enviada para o seu e-mail!', 'success', 'Ok');
                    },
                    error: function () {
                      swalAlerta('Erro', 'Não foi possível reenviar sua senha, tente novamente mais tarde!', 'error', 'Ok');
                    }
                  });
                }
              //});
              }

            </script>
					</div>
				</form>
            </div>
          </div>
        </fieldset>
      </div>


      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>