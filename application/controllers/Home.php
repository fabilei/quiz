<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Fabilei Spinelli
 * @copyright (c) 2018, Quiz Trezo
 * @property Cliente_Model $modelCliente
 * @property Quiz_Model $modelQuiz
 * @property Question_Model $modelQuestion
 * @property Funcoesuteis $funcoesuteis
 */
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Recaptcha');
        $this->load->helper('string');
        $this->load->helper('text');
        $this->load->model('Login_Model', 'modelLogin');
        $this->load->model('Painel/Cliente_Model', 'modelCliente');
        $this->load->model('Painel/Quiz_Model', 'modelQuiz');
        $this->load->model('Painel/Question_Model', 'modelQuestion');
        $this->load->model('Utilidades');
    }

    public function index() 
    {
        $quiz = $this->modelQuiz->consultaListaHome();
        $data = array(
            "title" => "Quiz Trezo",
            "description" => "Quiz Trezo",
            "quiz" => $quiz,
            'view' => 'home',
        );
        
        $this->load->view('template_site', $data);
    }

    public function responder() 
    {
        if($this->input->get('id_quiz') != '' && $this->input->get('id_quiz') != 0
        && $this->input->get('nome') != '' && $this->input->get('email') != '')
        {
            $answer = new stdClass();
            $answer->init_time = date('Y-m-d H:i:s');
            $answer->id_quiz = $this->input->get('id_quiz');
            $answer->nome = $this->input->get('nome');
            $answer->email = $this->input->get('email');
            $id_answer = $this->modelQuiz->saveAnswer($answer);

            $quiz = $this->modelQuiz->consultaQuiz($this->input->get('id_quiz'));
            $quiz_list = $this->modelQuiz->consultaQuizList($this->input->get('id_quiz'));
            $quiz_questions = $this->modelQuestion->consultaQuizQuestions($this->input->get('id_quiz'));
            $totalQuestions = count($quiz_list);
            /*echo '<pre>';
            echo var_dump($quiz_list);
            die();*/
            $data = array(
                "title" => "Quiz Trezo",
                "description" => "Quiz Trezo",
                "quiz" => $quiz,
                "quiz_list" => $quiz_list,
                "quiz_questions" => $quiz_questions,
                "id_answer" => $id_answer,
                "totalQuestions" => $totalQuestions,
                'view' => 'responder',
            );
            
            $this->load->view('template_site', $data);
        }else{
            redirect(base_url());
        }
    }

    public function saveReply(){
        
        $formData = $this->input->post();
        foreach ($formData as $tipoQuestao => $valor) 
        {
            $identificaTipo = explode("_", $tipoQuestao);
           
            $answer_item = new stdClass();
            $answer_item->id_answer = $this->input->post('id_answer');
            //echo '<pre>';
            //echo var_dump($formData);
            //echo var_dump($tipoQuestao);
            //echo var_dump($identificaTipo);
            //echo var_dump($valor);
            
            //echo 'identificaTipo: '.$identificaTipo[0].'<br>';
            if ($identificaTipo[0] == "certoerrado") 
            {
                $answer_item->id_question = $this->input->post('id_question');
                $answer_item->type = $this->input->post('type');
                $answer_item->option_radio = $this->input->post('option_radio');

            } 
            else if ($identificaTipo[0] == "question") 
            {
                $answer_item->id_question = $this->input->post('id_question');
                $answer_item->type = 3;
                
                if($identificaTipo[2] == 1){
                    $answer_item->option_a = $formData["".$tipoQuestao.""][0];
                }else if($identificaTipo[2] == 2){
                    $answer_item->option_b = $formData["".$tipoQuestao.""][0];
                }else if($identificaTipo[2] == 3){
                    $answer_item->option_c = $formData["".$tipoQuestao.""][0];
                }else if($identificaTipo[2] == 4){
                    $answer_item->option_d = $formData["".$tipoQuestao.""][0];
                }else if($identificaTipo[2] == 5){
                    $answer_item->option_e = $formData["".$tipoQuestao.""][0];
                }
                
            }
            $this->modelQuiz->saveAnswerItem($answer_item);
        }
die();

    }

}
