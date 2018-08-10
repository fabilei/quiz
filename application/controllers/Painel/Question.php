<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fabilei Spinelli
 * @copyright (c) 2018, Quiz Trezo
 * @property CategoriaConteudo_Model $modelQuestion
 * @property Login_Model $modelLogin
 * 
 * @property Funcoesuteis $funcoesuteis
 */
class Question extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('Painel/Question_Model', 'modelQuestion');
        $this->load->model('Login_Model', 'modelLogin');
        $this->load->model('Utilidades');
        $this->modelLogin->aut();
    }

    public function list(){
        $this->modelLogin->aut('id_user');
        $questions = $this->modelQuestion->consultaLista();
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "questions" => $questions,
            'view' => 'painel/question/list',
            'filterizr' => '1',
        );
        
        $this->load->view('template_site', $data);
    }

    public function consultaCategoriaConteudo(){
        $questions = $this->modelQuestion->consultaCategoriaConteudo($this->input->post('id_question'));
        echo json_encode($questions);
    }

    public function visualize(){
        $this->modelLogin->aut('id_user');
        $questions = $this->modelQuestion->consultaQuestion($this->input->get('id_question'));
        $alternatives = $this->modelQuestion->consultaAlternatives($this->input->get('id_question'));
        $totalQuestions = 0;
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "questions" => $questions,
            "alternatives" => $alternatives,
            "totalQuestions" => $totalQuestions,
            'view' => 'painel/question/visualize',
        );
        
        $this->load->view('template_site', $data);
    }

    public function new() {
        $this->modelLogin->aut('id_user');
        $dropDownType = $this->modelQuestion->dropDownType();
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "dropDownType" => $dropDownType,
            'view' => 'painel/question/cadastro',
        );
        
        $this->load->view('template_site', $data);
    }

    public function edit() {
        $this->modelLogin->aut('id_user');
        $questions = $this->modelQuestion->consultaQuestion($this->input->get('id_question'));
        $alternatives = $this->modelQuestion->consultaAlternatives($this->input->get('id_question'));
        $dropDownType = $this->modelQuestion->dropDownTypeEdit($questions['type']);
        
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "questions" => $questions,
            "alternatives" => $alternatives,
            "dropDownType" => $dropDownType,
            'view' => 'painel/question/editar',
        );
        
        $this->load->view('template_site', $data);
    }

    public function desativar() {
        $this->modelQuestion->desativar($this->input->get('id_question'));
        redirect(base_url('Painel/Question/list'));
    }

    public function ativar() {
        $this->modelQuestion->ativar($this->input->get('id_question'));
        redirect(base_url('Painel/Question/list'));
    }

    public function excluir() {
        $this->modelQuestion->excluir($this->input->get('id_question'));
        redirect(base_url('Painel/Question/list'));
    }

    function validarForm($dados)
    {
        $resultado = 1;
        //echo '<pre>';
        //echo var_dump($dados);
       
        if(!$dados['subject'] != "" && strlen($dados['subject']) < 3 && $resultado == 1){
            $resultado = 0;
        }

        if($dados['id_type'] == "0" || $dados['id_type'] == 0){
            $resultado = 0;
        }
        
        return $resultado;
    }

    public function save() {
        $this->modelLogin->aut('id_user');
        
        if ($this->validarForm($_POST) == 1)
        {
            $question = new stdClass();
            $question->subject = $this->input->post('subject');
            $question->type = $this->input->post('id_type');
            $question->deleted = 0;
            $question->created_at = date('Y-m-d H:i:s');
            
            if ($id_retorno = $this->modelQuestion->save($question)) 
            {
                if($question->type == 3)
                {
                    $alternative = new stdClass();
                    $alternative->question_id = $id_retorno;
                    $alternative->answer = $this->input->post('me_a');
                    if($this->input->post('me_a_opcao_') == 1 || $this->input->post('me_a_opcao_') == '1'){
                        $alternative->is_correct = 1;
                    }else{
                        $alternative->is_correct = 0;
                    }
                    $this->modelQuestion->saveAlternative($alternative);

                    $alternative = new stdClass();
                    $alternative->question_id = $id_retorno;
                    $alternative->answer = $this->input->post('me_b');
                    if($this->input->post('me_b_opcao_') == 1 || $this->input->post('me_b_opcao_') == '1'){
                        $alternative->is_correct = 1;
                    }else{
                        $alternative->is_correct = 0;
                    }
                    $this->modelQuestion->saveAlternative($alternative);

                    if($this->input->post('me_c') != ""){
                        $alternative = new stdClass();
                        $alternative->question_id = $id_retorno;
                        $alternative->answer = $this->input->post('me_c');
                        if($this->input->post('me_c_opcao_') == 1 || $this->input->post('me_c_opcao_') == '1'){
                            $alternative->is_correct = 1;
                        }else{
                            $alternative->is_correct = 0;
                        }
                        $this->modelQuestion->saveAlternative($alternative);
                    }

                    if($this->input->post('me_d') != ""){
                        $alternative = new stdClass();
                        $alternative->question_id = $id_retorno;
                        $alternative->answer = $this->input->post('me_d');
                        if($this->input->post('me_d_opcao_') == 1 || $this->input->post('me_d_opcao_') == '1'){
                            $alternative->is_correct = 1;
                        }else{
                            $alternative->is_correct = 0;
                        }
                        $this->modelQuestion->saveAlternative($alternative);
                    }

                    if($this->input->post('me_e') != ""){
                        $alternative = new stdClass();
                        $alternative->question_id = $id_retorno;
                        $alternative->answer = $this->input->post('me_e');
                        if($this->input->post('me_e_opcao_') == 1 || $this->input->post('me_e_opcao_') == '1'){
                            $alternative->is_correct = 1;
                        }else{
                            $alternative->is_correct = 0;
                        }
                        $this->modelQuestion->saveAlternative($alternative);
                    }
                    
                }
            }else{
                //echo 'falhou';
                //die();
            }

            redirect(base_url('Painel/Question/list'));
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }

    public function salvarEdit() {
        $this->modelLogin->aut('id_user');
        if ($this->validarForm($_POST) == 1)
        {
            $question = new stdClass();
            $question->id_question = $this->input->post('id_question');            
            $question->subject = $this->input->post('subject');
            $question->type = $this->input->post('id_type');
            $question->deleted = 0;
            $question->updated_at = date('Y-m-d H:i:s');
            
            if ($this->modelQuestion->saveEdit($question)) 
            {
                if($question->type == 3)
                {
                    $this->modelQuestion->removeAlternative($question->id_question);
                    $alternative = new stdClass();
                    $alternative->question_id = $id_retorno;
                    $alternative->answer = $this->input->post('me_a');
                    if($this->input->post('me_a_opcao_') == 1 || $this->input->post('me_a_opcao_') == '1'){
                        $alternative->is_correct = 1;
                    }else{
                        $alternative->is_correct = 0;
                    }
                    $this->modelQuestion->saveAlternative($alternative);

                    $alternative = new stdClass();
                    $alternative->question_id = $id_retorno;
                    $alternative->answer = $this->input->post('me_b');
                    if($this->input->post('me_b_opcao_') == 1 || $this->input->post('me_b_opcao_') == '1'){
                        $alternative->is_correct = 1;
                    }else{
                        $alternative->is_correct = 0;
                    }
                    $this->modelQuestion->saveAlternative($alternative);

                    if($this->input->post('me_c') != ""){
                        $alternative = new stdClass();
                        $alternative->question_id = $id_retorno;
                        $alternative->answer = $this->input->post('me_c');
                        if($this->input->post('me_c_opcao_') == 1 || $this->input->post('me_c_opcao_') == '1'){
                            $alternative->is_correct = 1;
                        }else{
                            $alternative->is_correct = 0;
                        }
                        $this->modelQuestion->saveAlternative($alternative);
                    }

                    if($this->input->post('me_d') != ""){
                        $alternative = new stdClass();
                        $alternative->question_id = $id_retorno;
                        $alternative->answer = $this->input->post('me_d');
                        if($this->input->post('me_d_opcao_') == 1 || $this->input->post('me_d_opcao_') == '1'){
                            $alternative->is_correct = 1;
                        }else{
                            $alternative->is_correct = 0;
                        }
                        $this->modelQuestion->saveAlternative($alternative);
                    }

                    if($this->input->post('me_e') != ""){
                        $alternative = new stdClass();
                        $alternative->question_id = $id_retorno;
                        $alternative->answer = $this->input->post('me_e');
                        if($this->input->post('me_e_opcao_') == 1 || $this->input->post('me_e_opcao_') == '1'){
                            $alternative->is_correct = 1;
                        }else{
                            $alternative->is_correct = 0;
                        }
                        $this->modelQuestion->saveAlternative($alternative);
                    }
                    
                }    
            }else{
                //echo 'falhou';
                //die();
            }

            redirect(base_url('Painel/Question/list'));
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }

    public function upload() {
        if (!$_FILES['file']['error']) {
            $config['upload_path'] = './uploads/question/';
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
