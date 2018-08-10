<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fabilei Spinelli
 * @copyright (c) 2018, Quiz Trezo
 * @property Quiz_Model $modelQuiz
 * @property CategoriaConteudo_Model $modelQuestion
 * @property Login_Model $modelLogin
 * 
 * @property Funcoesuteis $funcoesuteis
 */
class Quiz extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('Painel/Quiz_Model', 'modelQuiz');
        $this->load->model('Painel/Question_Model', 'modelQuestion');
        $this->load->model('Login_Model', 'modelLogin');
        $this->load->model('Utilidades');
        $this->modelLogin->aut();
    }

    public function list(){
        $this->modelLogin->aut('id_user');
        $quiz = $this->modelQuiz->consultaLista();
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "quiz" => $quiz,
            'view' => 'painel/quiz/list',
            'dt' => 'dt_categoriaConteudo.js',
            'filterizr' => '1',
        );
        
        $this->load->view('template_site', $data);
    }

    public function consultaQuiz(){
        $quiz = $this->modelQuiz->consultaQuiz($this->input->post('id_quiz'));
        echo json_encode($quiz);
    }

    public function visualize(){
        $this->modelLogin->aut('id_user');
        $quiz = $this->modelQuiz->consultaQuiz($this->input->get('id_quiz'));
        $questions = $this->modelQuestion->consultaQuizQuestions($this->input->get('id_quiz'));
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "quiz" => $quiz,
            "questions" => $questions,
            'view' => 'painel/quiz/visualize',
        );
        
        $this->load->view('template_site', $data);
    }

    public function new() {
        $this->modelLogin->aut('id_user');
        $questions = $this->modelQuestion->consultaListaHome();
        $list = $this->modelQuestion->consultaQuestionSession($this->session->userdata('id_user'));
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "questions" => $questions,
            "list" => $list,
            'view' => 'painel/quiz/cadastro',
        );
        
        $this->load->view('template_site', $data);
        
    }

    public function edit() {
        $this->modelLogin->aut('id_user');
        $quiz = $this->modelQuiz->consultaQuiz($this->input->get('id_quiz'));
        $questions = $this->modelQuestion->consultaListaHome();
        $list = $this->modelQuestion->consultaListItem($this->input->get('id_quiz'));
        $this->modelQuestion->removeQuestionSessionId($this->session->userdata('id_user'));
        
        foreach($list as $item){
            $quiz_item = new stdClass();
            $quiz_item->id_user = $this->session->userdata('id_user');
            $quiz_item->id_question = $item['id_question'];
            $this->modelQuestion->addQuestionSession($quiz_item);
        }
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "quiz" => $quiz,
            "questions" => $questions,
            "list" => $list,
            'view' => 'painel/quiz/edit',
        );
        
        $this->load->view('template_site', $data);
    }

    public function desativar() {
        $this->modelQuiz->desativar($this->input->get('id_quiz'));
        redirect(base_url('Painel/Quiz/list'));
    }

    public function ativar() {
        $this->modelQuiz->ativar($this->input->get('id_quiz'));
        redirect(base_url('Painel/Quiz/list'));
    }

    public function excluir() {
        $this->modelQuiz->excluir($this->input->get('id_quiz'));
        redirect(base_url('Painel/Quiz/list'));
    }

    public function addQuestion()
    {
        if ($this->input->is_ajax_request()) {
            $this->modelLogin->aut('id_user');
            $question = new stdClass();
            $question->id_user = $this->session->userdata('id_user');
            $question->id_question = $this->input->post('id_question');
            $existe = $this->modelQuestion->consultaQuestionSessionId($question->id_user, $question->id_question);
            
            if($existe == null){
                $this->modelQuestion->addQuestionSession($question);
            }
            $questions = $this->modelQuestion->consultaQuestionSession($question->id_user);
            echo json_encode($questions);
        }
    }

    public function removeQuestion()
    {
        if ($this->input->is_ajax_request()) {
            $this->modelLogin->aut('id_user');
            $question = new stdClass();
            $question->id_user = $this->session->userdata('id_user');
            $question->id_question = $this->input->post('id_question');
            
            $this->modelQuestion->removeQuestionSession($question->id_user, $question->id_question);
            
            $questions = $this->modelQuestion->consultaQuestionSession($question->id_user);
            echo json_encode($questions);
        }
    }

    function validarForm($dados)
    {
        $resultado = 1;
        //echo '<pre>';
        //echo var_dump($dados);
       
        if(!$dados['name'] != "" && strlen($dados['name']) < 3 && $resultado == 1){
            $resultado = 0;
        }

        if(!$dados['description'] != "" && strlen($dados['description']) < 3 && $resultado == 1){
            $resultado = 0;
        }
        
        return $resultado;
    }

    public function saveQuiz() {
        $this->modelLogin->aut('id_user');
        if ($this->validarForm($_POST) == 1)
        {
            
            $quiz = new stdClass();
            $quiz->name = $this->input->post('name');
            $quiz->description = $this->input->post('description');
            $quiz->deleted = 0;
            $quiz->created_at = date('Y-m-d H:i:s');
            $questions = $this->modelQuestion->consultaQuestionSession($this->session->userdata('id_user'));

            if($questions != null){
                $dirpath = "quiz/";
                if (!$_FILES['userfile']['error']) {
                    $config['upload_path'] = "./uploads/" . $dirpath;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = '15120000';
                    $config['encrypt_name'] = true;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '100%';
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
                            if (!$this->Utilidades->imagemPrincipal($this->upload->file_name, './uploads/quiz/', './uploads/quiz_thumb/', '100', '80')) {
                                $output = array('error' => 'Ocorreu um erro na criação da miniatura!');
                                $this->session->set_flashdata(array("tipo" => "danger", "titulo" => "Erro!", "msg" => $this->upload->display_errors()));
                                redirect(base_url("Painel/Quiz/new"));
                            }else{
                                $quiz->img_quiz = $this->upload->file_name;
                            }
                        }
                    }
                }
            
                if ($id_retorno = $this->modelQuiz->salvar($quiz)) 
                {
                    $this->modelQuestion->removeQuestionSessionId($this->session->userdata('id_user'));
                    foreach($questions as $item){
                        $quiz_item = new stdClass();
                        $quiz_item->quiz_id = $id_retorno;
                        $quiz_item->question_id = $item['id_question'];
                        $this->modelQuiz->saveItem($quiz_item);
                    }
                }else{
                    //echo 'falhou';
                    //die();
                }

                redirect(base_url('Painel/Quiz/list'));
            }else{
                $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
                return;
            }
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }

    public function saveEdit() {
        $this->modelLogin->aut('id_user');
        if ($this->validarForm($_POST) == 1)
        {
            $quiz = new stdClass();
            $quiz->id_quiz = $this->input->post('id_quiz');            
            $quiz->name = $this->input->post('name');
            $quiz->description = $this->input->post('description');
            $quiz->deleted = 0;
            $quiz->created_at = date('Y-m-d H:i:s');
            $questions = $this->modelQuestion->consultaQuestionSession($this->session->userdata('id_user'));

            if($questions != null){
                $dirpath = "quiz/";
                if (!$_FILES['userfile']['error']) {
                    $config['upload_path'] = "./uploads/" . $dirpath;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = '15120000';
                    $config['encrypt_name'] = true;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '100%';
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
                            if (!$this->Utilidades->imagemPrincipal($this->upload->file_name, './uploads/quiz/', './uploads/quiz_thumb/', '100', '80')) {
                                $output = array('error' => 'Ocorreu um erro na criação da miniatura!');
                                $this->session->set_flashdata(array("tipo" => "danger", "titulo" => "Erro!", "msg" => $this->upload->display_errors()));
                                redirect(base_url("Painel/Quiz/new"));
                            }else{
                                $quiz->img_quiz = $this->upload->file_name;
                            }
                        }
                    }
                }
            
                if ($this->modelQuiz->salvarEdicao($quiz)) 
                {
                    $this->modelQuestion->removeQuestionSessionId($this->session->userdata('id_user'));
                    $this->modelQuiz->removeQuizItems($quiz->id_quiz);
                    foreach($questions as $item){
                        $quiz_item = new stdClass();
                        $quiz_item->quiz_id = $quiz->id_quiz;
                        $quiz_item->question_id = $item['id_question'];
                        $this->modelQuiz->saveItem($quiz_item);
                    }
                }else{
                    //echo 'falhou';
                    //die();
                }

                redirect(base_url('Painel/Quiz/list'));
            }else{
                $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
                return;
            }
        }else{
            $msg_validacao = "Por Favor, Preencha todos os campos obrigatórios!!!";
            return;
        }
    }


}
