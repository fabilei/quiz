<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fabilei Spinelli
 * @copyright (c) 2018, Quiz Trezo
 * @property CidadeEstado_Model $modelCidadeEstado
 * @property Cliente_Model $modelCliente
 * @property Login_Model $modelLogin
 * 
 * @property Funcoesuteis $funcoesuteis
 */
class Cliente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('Painel/Usuario_Model', 'modelUsuario');
        $this->load->model('Painel/Cliente_Model', 'modelCliente');
        $this->load->model('Login_Model', 'modelLogin');
        $this->load->model('Utilidades');
        $this->modelLogin->aut();
    }


}
