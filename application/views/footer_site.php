
  <!-- Footer -->


<!--div class="footer-bottom" style="margin-top:0%">
  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-xs-12 coppyright">&copy; 2018 Quiz Trezo. Todos os direitos reservados.</div>
      <div class="col-sm-7 col-xs-12 company-links">
        
      </div>
    </div>
  </div>
</div-->

</div>
</div>
<!-- End Footer / fecha div Page --> 

<!-- mobile menu -->
<div id="mobile-menu">
  <ul>
    <li>
      <div class="mm-search">
        <form id="search1" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              
            </div>
            
          </div>
        </form>
      </div>
    </li>
    <li class="mega-menu"> <a class="level-top" href="<?php echo base_url('') ?>"><span>Home</span></a></li>
          <?php if($this->session->userdata('id_user') == null || $this->session->userdata('id_user') == '0'){ ?>
            <li class="mega-menu">
              <a href="<?php echo base_url('Login/loginCliente') ?>" class="level-top">
                <i class="fa fa-unlock-alt"></i>
                <span style="margin-left:-15px">Entrar</span>
              </a>
            </li>
          <?php }else{ ?>
          
          <li class="mega-menu"> <a class="level-top" href="<?php echo base_url('Painel/Quiz/list') ?>"><span>Quizes</span></a></li>
          <li class="mega-menu"> <a class="level-top" href="<?php echo base_url('Painel/Question/list') ?>"><span>Perguntas</span></a></li>
          <li class="mega-menu"> <a class="level-top" href="<?php echo base_url('Painel/Report') ?>"><span>Relatório</span></a></li>
          <li>
            <div class="dropdown block-company-wrapper hidden-xs" style="margin-right:27px"> 
              <a role="button" data-toggle="dropdown" data-target="#" class="block-company dropdown-toggle" href="#"> 
                <?php echo "Olá ".$this->session->userdata('primeiro_nome') ?> 
              </a>
            </div>
          </li>
          <li role="presentation"><a href="<?php echo base_url('Login/logoutCliente') ?>">Sair </a> </li>
    </ul>
    <?php } ?>
  </div>
</div>


<!-- JavaScript --> 
<script type="text/javascript" src="<?php echo base_url('assets/tema/js/bootstrap.min.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/tema/js/common.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/tema/js/owl.carousel.min.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/tema/js/jquery.mobile-menu.min.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/tema/js/countdown.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/tema/js/revslider.js') ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/valida_cpf_cnpj.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/uteis.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/tema/js/cloud-zoom.js') ?>"></script>

<script>
    $('.voltar_pagina').click(function() {

        history.back();

    });
</script>

<?php
if (($this->session->flashdata('tipo')) || (@$validacao['tipo'])) {
    if ($this->session->flashdata('tipo') == "autenticar") {
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                swal({
                    type:"error",
                    title: "<?php echo @$this->session->flashdata('titulo'); ?>",
                    html: "<?php echo @$this->session->flashdata('msg') ?>",
                    allowOutsideClick: false
                }).then(function () {
                    login();
                });
            });
        </script> 
        <?php
    } else {
        if (($this->session->flashdata('tipo') == "success") || (@$validacao['tipo'] == "success")) {
            ?>
            <input type="hidden" name="flashdata" id="flashdata" value="<?= @$this->session->flashdata('msg') ?><?= @$validacao['mensagem'] ?>" tipo="success" title="<?= @$this->session->flashdata('titulo') ?><?= @$validacao['titulo'] ?>"/>
        <?php } else if ((@$this->session->flashdata('tipo') == "danger") || (@$validacao['tipo'] == "danger")) { ?>
            <input type="hidden" name="flashdata" id="flashdata" value="<?= @$this->session->flashdata('msg'); ?><?php echo @$validacao['mensagem']; ?>" tipo="error" title="<?= @$this->session->flashdata('titulo'); ?><?php echo @$validacao['titulo']; ?>"/>
        <?php } else if ((@$this->session->flashdata('tipo') == "warning") || (@$validacao['tipo'] == "warning")) { ?>
            <input type="hidden" name="flashdata" id="flashdata" value="<?= @$this->session->flashdata('msg'); ?><?php echo @$validacao['mensagem']; ?>" tipo="warning" title="<?= @$this->session->flashdata('titulo'); ?><?php echo @$validacao['titulo']; ?>"/>
        <?php } else if ((@$this->session->flashdata('tipo') == "info") || (@$validacao['tipo'] == "info")) { ?>
            <input type="hidden" name="flashdata" id="flashdata" value="<?= @$this->session->flashdata('msg'); ?><?php echo @$validacao['mensagem']; ?>" tipo="info" title="<?= @$this->session->flashdata('titulo'); ?><?php echo @$validacao['titulo']; ?>"/>
        <?php } ?>
        <script type="text/javascript">
            $(document).ready(function () {
                var bcolor;
                //var ve = '';
                switch ($("input#flashdata").attr("tipo")) {
                    case "success":
                        bcolor = "#5cb85c";
                        break;
                    case "error":
                        bcolor = "#DD6B55";
                        break;
                    case "warning":
                        bcolor = "#f0ad4e";
                        break;
                    case "info":
                        bcolor = "#31b0d5";
                        break;
                }
                swal({
                    title: $("input#flashdata").attr("title"),
                    html: $("input#flashdata").val(),
                    type: $("input#flashdata").attr("tipo"),
                    allowOutsideClick: false,
                    //showCancelButton: true,
                    confirmButtonColor: bcolor,
                    confirmButtonText: "<i class='fa fa-times'></i> Fechar"
                },
                function () {
                    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                });
                //swal($("input#flashdata").attr("title"), $("input#flashdata").val(), $("input#flashdata").attr("tipo"));
            });
        </script>
    <?php } ?>
<?php } ?>

</body>
</html>