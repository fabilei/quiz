<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fabilei Spinelli
 * @copyright (c) 2018, Quiz Trezo
 * @property Conteudo_Model $modelConteudo
 * @property CategoriaConteudo_Model $modelCategoriaConteudo
 * @property Login_Model $modelLogin
 * 
 * @property Funcoesuteis $funcoesuteis
 */
class Conteudo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('Painel/Conteudo_Model', 'modelConteudo');
        $this->load->model('Painel/CategoriaConteudo_Model', 'modelCategoriaConteudo');
        $this->load->model('Painel/CategoriaSubConteudo_Model', 'modelCategoriaSubConteudo');
        $this->load->model('Login_Model', 'modelLogin');
        $this->modelLogin->aut();
    }

    public function lista(){
        $this->modelLogin->aut('id_usuario');
        $conteudos = $this->modelConteudo->consultaLista();
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "conteudos" => $conteudos,
            'view' => 'painel/conteudo/lista',
            'dt' => 'dt_conteudo.js',
        );
        
        $this->load->view('painel/template', $data);
    }

    public function visualizar(){
        $this->modelLogin->aut('id_usuario');
        $conteudos = $this->modelConteudo->consultaConteudoVw($this->input->get('id_conteudo'));
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "conteudos" => $conteudos,
            'view' => 'painel/conteudo/visualizar',
        );
        
        $this->load->view('painel/template', $data);
    }

    public function consultaConteudo(){
        $conteudos = $this->modelConteudo->consultaConteudo($this->input->post('id_conteudo'));        
        echo json_encode(array($conteudos));
    }

    public function novo() {
        $this->modelLogin->aut('id_usuario');
        $dropDownCategoria = $this->modelCategoriaConteudo->dropDownCategoria();
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            'view' => 'painel/conteudo/cadastro',
            'dropDownCategoria' => $dropDownCategoria,
        );
        
        $this->load->view('painel/template', $data);
    }

    public function editar() {
        $this->modelLogin->aut('id_usuario');
        $conteudos = $this->modelConteudo->consultaConteudo($this->input->get('id_conteudo'));
        $dropDownCategoria = $this->modelCategoriaConteudo->dropDownCategoriaEdit($conteudos['categoria']);
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "conteudos" => $conteudos,
            'view' => 'painel/conteudo/editar',
            'dropDownCategoria' => $dropDownCategoria,
        );
        
        $this->load->view('painel/template', $data);
    }

    public function desativar() {
        $this->modelConteudo->desativar($this->input->get('id_conteudo'));
        redirect(base_url('Painel/Conteudo/lista'));
    }

    public function ativar() {
        $this->modelConteudo->ativar($this->input->get('id_conteudo'));
        redirect(base_url('Painel/Conteudo/lista'));
    }

    public function excluir() {
        $this->modelConteudo->excluir($this->input->get('id_conteudo'));
        redirect(base_url('Painel/Conteudo/lista'));
    }

    function validarForm($dados)
    {
        $resultado = 1;
        //echo '<pre>';
        //echo var_dump($dados);
       
        if(!$dados['descricao'] != "" && strlen($dados['descricao']) < 3 && $resultado == 1){
            $resultado = 0;
        }
        
        if(!$dados['titulo'] != "" && strlen($dados['titulo']) < 1 && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['id_cat_con'] != "" && $dados['id_cat_con'] > 0 && $resultado == 1){
            $resultado = 0;
        }
        
        return $resultado;
    }

    public function salvarConteudo() {
        $this->modelLogin->aut('id_usuario');
        if ($this->validarForm($_POST) == 1)
        {
            $conteudo = new stdClass();
            $conteudo->titulo = $this->input->post('titulo');
            $conteudo->descricao = $this->input->post('descricao');
            $conteudo->deleted = 0;
            $conteudo->id_usuario = $this->session->userdata('id_usuario');
            $conteudo->categoria = $this->input->post('id_cat_con');
            $conteudo->data_cadastro = date('Y-m-d H:i:s');
            
            if ($id_retorno = $this->modelConteudo->salvar($conteudo)) {
                //echo 'salvou';
                //die();
            }else{
                //echo 'falhou';
                //die();
            }

            redirect(base_url('Painel/Conteudo/lista'));
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }

    public function salvarEdit() {
        $this->modelLogin->aut('id_usuario');
        if ($this->validarForm($_POST) == 1)
        {
            $conteudo = new stdClass();
            $conteudo->id_conteudo = $this->input->post('id_conteudo');    
            $conteudo->titulo = $this->input->post('titulo');        
            $conteudo->descricao = $this->input->post('descricao');
            $conteudo->deleted = 0;
            $conteudo->id_usuario = $this->session->userdata('id_usuario');
            $conteudo->categoria = $this->input->post('id_cat_con');
            $conteudo->data_cadastro = date('Y-m-d H:i:s');
            
            if ($id_retorno = $this->modelConteudo->salvarEdicao($conteudo)) {
                //echo 'salvou';
                //die();
            }else{
                //echo 'falhou';
                //die();
            }

            redirect(base_url('Painel/Conteudo/lista'));
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }

    public function upload() {
        if (!$_FILES['file']['error']) {
            $config['upload_path'] = './uploads/conteudo/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $this->upload->data();
                echo json_encode(array('location' => $this->upload->file_name));
            }
        }
    }

}
