<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fabilei Spinelli
 * @copyright (c) 2018, Clube do Taurus
 * @property Login_Model $modelLogin
 * @property Usuario_Model $modelUsuario
 * @property Facebook $facebook
 */
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('Login_Model', 'modelLogin');
        $this->load->model('Painel/Usuario_Model', 'modelUsuario');
        $this->load->library('facebook');
    }

    public function index() {
        $data = array(
            "title" => "Clube Taurus",
            "description" => "Clube Taurus",
        );
        
        $this->load->view('login', $data);
    }

    public function loginCliente() {
        $data = array(
            "title" => "Clube Taurus",
            "description" => "Clube Taurus",
            'view' => 'loginCliente',
        );
        
        $this->load->view('template_site', $data);
    }

    public function logoutCliente() {
        $sessao_ = array($this->session->all_userdata());
        $sessao = $sessao_[0];
        $this->session->unset_userdata($sessao['logado']);
        $this->session->unset_userdata($sessao['falha_login']);
        $this->session->unset_userdata($sessao['id_user']);
        $this->session->unset_userdata($sessao['nome']);
        $this->session->unset_userdata($sessao['primeiro_nome']);
        $this->session->unset_userdata($sessao['email']);
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function autenticarCliente() {
        if ($this->input->post('email')) {
            $login = $this->security->xss_clean($this->input->post('email'));
        }
        if ($this->input->post('senha_cliente', TRUE)) {
            $senha = $this->input->post('senha_cliente', TRUE);
        }

        if ($senha != '') 
        {
            $usuario = $this->modelLogin->Logar($login, $senha);
            if ($usuario != null) 
            {
                $pn = explode(" ", $usuario->nome);
                $primeiro_nome = $pn[0];
                $sessao = array(
                    'logado' => '1',
                    'falha_login' => '0',
                    'id_user' => $usuario->id_user,
                    'nome' => $usuario->nome,
                    'primeiro_nome' => $primeiro_nome,
                    'email' => $usuario->email
                );
                $this->session->set_userdata($sessao);

                $this->modelLogin->atualizarUltimoLogin($usuario->id_user);

                redirect(base_url(''));
            } else {
                $sessao = array(
                    'logado' => '0',
                    'falha_login' => '1'
                );
                $this->session->set_userdata($sessao);
                redirect(base_url('Login'));
            }
        }
    }

}





