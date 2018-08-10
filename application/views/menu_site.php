 <!-- Navigation -->

<?php
//echo '<pre>';
//echo var_dump($CategoriaProduto);
?>

<nav >
    <div class="container">
      <div class="mm-toggle-wrap">
        <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">Menu</span> </div>
      </div>
      <div class="nav-inner"> 
        <!-- BEGIN NAV --> 
        <ul id="nav" class="hidden-xs">
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
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
    </header>
