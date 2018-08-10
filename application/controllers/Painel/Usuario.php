<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fabilei Spinelli
 * @copyright (c) 2018, Quiz Trezo
 * @property Usuario_Model $modelUsuario
 * @property CidadeEstado_Model $modelCidadeEstado
 * @property NivelAcesso_Model $modelNivelAcesso
 * @property Plano_Model $modelPlano
 * @property Login_Model $modelLogin
 */
class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('Painel/Usuario_Model', 'modelUsuario');
        $this->load->model('Painel/CidadeEstado_Model', 'modelCidadeEstado');
        $this->load->model('Painel/NivelAcesso_Model', 'modelNivelAcesso');
        //$this->load->model('Painel/Plano_Model', 'modelPlano');
        $this->load->model('Login_Model', 'modelLogin');
        $this->modelLogin->aut();
    }

    public function lista(){
        $this->modelLogin->aut('id_usuario');
        $usuarios = $this->modelUsuario->consultaLista();

        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "usuarios" => $usuarios,
            'view' => 'painel/usuario/lista',
            'filterizr' => '1',
        );
        
        $this->load->view('painel/template', $data);
    }

    public function buscaCidade() {
        if ($this->input->is_ajax_request()) {
            $this->modelCidadeEstado->dropCidadeCodEstado($this->input->post('cod_estado'));
        }
    }

    public function visualizar(){
        $this->modelLogin->aut('id_usuario');
        $usuarios = $this->modelUsuario->consultaUsuario($this->input->get('id_usuario'));

        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "usuarios" => $usuarios,
            'view' => 'painel/usuario/visualizar',
        );
        
        $this->load->view('painel/template', $data);
    }

    public function desativar() {
        $this->modelUsuario->desativar($this->input->get('id_usuario'));
        redirect(base_url('Painel/Usuario/lista'));
    }

    public function ativar() {
        $this->modelUsuario->ativar($this->input->get('id_usuario'));
        redirect(base_url('Painel/Usuario/lista'));
    }

    function validarForm($dados)
    {
        $resultado = 1;
        //echo '<pre>';
        //echo var_dump($dados);
       
        if(!$dados['nome'] != "" && !strlen($dados['nome']) >= 1 && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['cpf'] != "" && $resultado == 1){
            $resultado = 0;
        }

        if($dados['data_nascimento'] != "" && $resultado == 1){
            $data_hoje = date ("Y-m-d");
            $data_post = explode("/",$dados['data_nascimento']);
            $data_en = $data_post[2]. '-'.$data_post[1].'-'.$data_post[0];
            $dif = strtotime($data_hoje) - strtotime($data_en);
            $meses = floor($dif / (60 * 60 * 24 * 30));
            $anos = $meses / 12;
            if((int) $anos >= 13 && $resultado == 1){
                $resultado = 1;
            }else{
                $resultado = 0;
            }
        }else{
            $resultado = 0;
        }
        
        if(!$dados['cep'] != "" && !strlen($dados['cep']) == 9 && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['bairro'] != "" && !strlen($dados['bairro']) >= 3 && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['rua'] != "" && !strlen($dados['rua']) >= 3 && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['numero'] != "" && !strlen($dados['numero']) >= 1 && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['cod_estado'] != "" && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['cod_cidade'] != "" && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['celular'] != "" && !strlen($dados['celular']) >= 16 && $resultado == 1){
            $resultado = 0;
        }

        return $resultado;
    }

    public function novo() {
        $this->modelLogin->aut('id_usuario');
        $dropestado = $this->modelCidadeEstado->dropDownEstado();
        $niveisAcessos = $this->modelNivelAcesso->dropDownNivelAcessoCadastro();
        
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            'view' => 'painel/usuario/cadastro',
            'dropestado' => $dropestado,
            'niveisAcessos' => $niveisAcessos,
        );
        
        $this->load->view('painel/template', $data);
    }

    public function salvarUsuario() {
        $this->modelLogin->aut('id_usuario');
        if ($this->validarForm($_POST) == 1)
        {
            $data_temp = explode('/', $this->input->post('data_nascimento'));
            $datas = $data_temp[2].'-'.$data_temp[1].'-'.$data_temp[0];
            $usuario = new stdClass();
            $usuario->nome = $this->input->post('nome');
            $usuario->cpf = $this->input->post('cpf');
            $usuario->rg = $this->input->post('rg');
            $usuario->data_nascimento = $datas;
            $usuario->sexo = $this->input->post('sexo');
            $usuario->cep = $this->input->post('cep');
            $usuario->rua = $this->input->post('rua');
            $usuario->numero = $this->input->post('numero');
            $usuario->bairro = $this->input->post('bairro');
            $usuario->cod_estado = $this->input->post('cod_estado');
            $usuario->cod_cidade = $this->input->post('cod_cidade');
            $usuario->complemento = $this->input->post('complemento');
            $usuario->celular = $this->input->post('celular');
            $usuario->email = $this->input->post('email');
            $usuario->nivel_acesso = $this->input->post('id_acesso');
            $usuario->id_plano = 1;
            $usuario->cobranca_recorrente = 0;
            $usuario->deleted = 0;
            $usuario->data_cadastro = date('Y-m-d H:i:s');
            $usuario->senha = $this->modelUsuario->gerar_senha(7, true, true, true, true);

            $dirpath = "usuario/";
            if (!$_FILES['userfile']['error']) {
                $config['upload_path'] = "./uploads/" . $dirpath;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '15120000';
                $config['encrypt_name'] = true;
                $config['maintain_ratio'] = true;
                $config['quality'] = '50%';
                $config['width'] = '600';
                $config['height'] = '600';
                //$config['master_dim'] = auto;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $output = array('error' => array($this->upload->display_errors()));
                    $this->session->set_flashdata(array("tipo" => "danger", "titulo" => "Erro!", "msg" => $this->upload->display_errors()));
                    echo '<pre>';
                    echo $this->upload->display_errors();
                    //die();
                    return;
                } else {
                    if ($this->upload->data()) {
                        if (!$this->novoThumb($this->upload->file_name)) {
                            $output = array('error' => 'Ocorreu um erro na criação da miniatura!');
                            $this->session->set_flashdata(array("tipo" => "danger", "titulo" => "Erro!", "msg" => $this->upload->display_errors()));
                            redirect(base_url("Painel/Usuario/novo"));
                        } else {
                            $usuario->avatar = $this->upload->file_name;
                            $usuario->thumb = $this->upload->file_name;
                            if ($this->input->post("oldpath")) {
                                $this->removeImage($this->input->post("oldpath"));
                            }
                        }
                    }
                }
            }
            
            if ($id_retorno = $this->modelUsuario->salvar($usuario)) 
            {
                $usuario->id_usuario = $id_retorno;
                $this->enviarSenha($usuario);
                //echo 'salvou';
                //die();
            }else{
                //echo 'falhou';
                //die();
            }

            redirect(base_url('Painel/Usuario/lista'));
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }

    public function editar() {
        $this->modelLogin->aut('id_usuario');
        $usuarios = $this->modelUsuario->consultaUsuario($this->input->get('id_usuario'));
        $dropestado = $this->modelCidadeEstado->dropDownEstadoEdit($usuarios['cod_estado']);
        $dropcidade = $this->modelCidadeEstado->dropCidadeCodCidade($usuarios['cod_cidade']);
        $niveisAcessos = $this->modelNivelAcesso->dropDownNivelAcessoCadastro();

        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "usuarios" => $usuarios,
            "dropestado" => $dropestado,
            "dropcidade" => $dropcidade,
            "niveisAcessos" => $niveisAcessos,
            'view' => 'painel/usuario/editar',
        );
        
        $this->load->view('painel/template', $data);
    }

    public function enviarSenhaAjax() {
        if ($this->input->is_ajax_request()) {
            $mail = new stdClass();
            if ($this->input->post('id_usuario')) {
                $mail->assunto = " Quiz Trezo";
                $mail->id_usuario = $this->input->post('id_usuario');
                $mail->mensagem = $this->layoutEmailSenha();
                if ($this->modelUsuario->enviaEmailUsuario($mail))
                    echo true;
            }
        }
    }

    public function enviarSenha($usuario) {
        $mail = new stdClass();
        $mail->assunto = " Quiz Trezo";
        $mail->id_usuario = $usuario->id_usuario;
        $mail->mensagem = $this->layoutEmailSenha($usuario->senha);
        if ($this->modelUsuario->enviaEmailUsuario($mail))
            echo true;
    }

    public function layoutEmailSenha($senha) {
        $dados = array(
            "titulo_email" => "Você recebeu uma nova senha de acesso.",
            "texto_email" => "<p>Sua nova senha para acessar nossa plataforma já encontra-se disponível.</p>"
            . "<p><strong>ATENÇÃO:</strong> QUANDO FIZER LOGIN EM SUA CONTA NOVAMENTE, ACESSE SEU PAINEL DE CONTROLE E ALTERE SUA SENHA.</p>"
            . "<p><strong>Dica*:</strong>  GUARDE SUA SENHA EM UM LOCAL SEGURO, NÃO REPASSE A NINGUÉM!</p>"
            . "<p></p>"
            . "<p><strong>Nova senha:</strong> " . $senha . "</p>"
            . "<p></p>"
        );
        return $this->load->view('email/layout', $dados, true);
    }

    public function removeImage($img) {
        if (unlink("./uploads/usuario/" . $img)) {
            if (unlink("./uploads/usuario_thumb/" . $img)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function removeImageAjax() {
        if ($this->input->is_ajax_request()) {
            if (unlink("./uploads/usuario/" . $this->input->post('path_avatar'))) {
                if (unlink("./uploads/usuario_thumb/" . $this->input->post('path_avatar'))) {
                    $output = array('msg' => 'Foto excluída com sucesso!', 'ok' => 1);
                }
            } else {
                $output = array('msg' => 'A foto não foi excluída!', 'ok' => 0);
            }
            echo json_encode($output);
        }
    }

    private function novoThumb($img) {
        $config = array();
        $novo_path = './uploads/usuario/';
        $config['image_library'] = 'gd2';
        $config['source_image'] = $novo_path . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = 100;
        $config['new_image'] = './uploads/usuario_thumb/';
        $config['width'] = 200;
        $config['height'] = 1;
        $config['master_dim'] = 'width';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        if (!$this->image_lib->resize()) {
            $error = $this->image_lib->display_errors();
            echo $error;
            return false;
        } else {
            $this->image_lib->clear();
            unset($config);
            return true;
        }
    }

    public function salvarEdit() {
        $this->modelLogin->aut('id_usuario');
        if ($this->validarForm($_POST) == 1)
        {
            $data_temp = explode('/', $this->input->post('data_nascimento'));
            $datas = $data_temp[2].'-'.$data_temp[1].'-'.$data_temp[0];
            $usuario = new stdClass();
            $usuario->id_usuario = $this->input->post('id_usuario');
            $usuario->nome = $this->input->post('nome');
            $usuario->rg = $this->input->post('rg');
            $usuario->data_nascimento = $datas;
            $usuario->sexo = $this->input->post('sexo');
            $usuario->cep = $this->input->post('cep');
            $usuario->rua = $this->input->post('rua');
            $usuario->numero = $this->input->post('numero');
            $usuario->bairro = $this->input->post('bairro');
            $usuario->cod_estado = $this->input->post('cod_estado');
            $usuario->cod_cidade = $this->input->post('cod_cidade');
            $usuario->complemento = $this->input->post('complemento');
            $usuario->celular = $this->input->post('celular');
            $usuario->email = $this->input->post('email');
            $usuario->deleted = 0;
            $usuario->data_cadastro = date('Y-m-d H:i:s');

            $dirpath = "usuario/";
            if (!$_FILES['userfile']['error']) {
                $config['upload_path'] = "./uploads/" . $dirpath;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '15120000';
                $config['encrypt_name'] = true;
                $config['maintain_ratio'] = true;
                $config['quality'] = '50%';
                $config['width'] = '600';
                $config['height'] = '600';
                //$config['master_dim'] = auto;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $output = array('error' => array($this->upload->display_errors()));
                    $this->session->set_flashdata(array("tipo" => "danger", "titulo" => "Erro!", "msg" => $this->upload->display_errors()));
                    echo '<pre>';
                    echo $this->upload->display_errors();
                    //die();
                    return;
                } else {
                    if ($this->upload->data()) {
                        if (!$this->novoThumb($this->upload->file_name)) {
                            $output = array('error' => 'Ocorreu um erro na criação da miniatura!');
                            $this->session->set_flashdata(array("tipo" => "danger", "titulo" => "Erro!", "msg" => $this->upload->display_errors()));
                            redirect(base_url("Painel/usuario/lista"));
                        } else {
                            $usuario->avatar = $this->upload->file_name;
                            $usuario->thumb = $this->upload->file_name;
                            if ($this->input->post("oldpath")) {
                                $this->removeImage($this->input->post("oldpath"));
                            }
                        }
                    }
                }
            }
            
            if ($id_retorno = $this->modelUsuario->salvarEdicao($usuario)) {
                //echo 'salvou';
                //die();
            }else{
                //echo 'falhou';
                //die();
            }

            redirect(base_url('Painel/Usuario/lista'));
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }

    public function editarSenhaUsuario() {
        if ($this->input->is_ajax_request()) {
            
            if ($this->modelUsuario->alterarSenha($this->input->post('id_usuario'), $this->input->post('senha')))
            {
                //$this->enviarSenha($this->input->post('id_usuario'), $this->input->post('senha'), 'alterarSenha');
                echo json_encode(array("ok" => true, "msg" => "bagua"));
            }
            else{
                echo json_encode(array("ok" => false, "msg" => "wrong"));
            }
        }
    }

}
