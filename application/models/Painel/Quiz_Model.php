<?php

/**
 * Model Quiz
 *
 * @author Fabilei Spinelli
 */
class Quiz_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->library('Utilidades');
    }

    public function Quiz() {
        return new Quiz_Model();
    }

    public function consultaLista(){
        $query_ = 'SELECT * FROM quiz';
        $query_ .= ' ORDER BY deleted ASC, description ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function existeEmQuiz($id_quiz){
        $query_ = 'SELECT * FROM quiz ';
        $query_ .= "WHERE id_quiz = '".$id_quiz."' ";
        $query_ .= ' ORDER BY deleted ASC, description ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaListaHome(){
        $query_ = 'SELECT * FROM quiz';
        $query_ .= ' WHERE deleted <> 1 ';
        $query_ .= ' ORDER BY deleted ASC, description ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function saveAnswerItem($answer_item) {
        if ($this->db->insert('answer_item', $answer_item))
            return $this->db->insert_id();
    }

    public function saveAnswer($answer) {
        if ($this->db->insert('answer', $answer))
            return $this->db->insert_id();
    }

    public function salvar($quiz) {
        if ($this->db->insert('quiz', $quiz))
            return $this->db->insert_id();
    }

    public function saveItem($quiz_item) {
        if ($this->db->insert('quiz_item', $quiz_item))
            return $this->db->insert_id();
    }

    public function removeQuizItems($id_quiz) {
        $query_ = 'DELETE FROM quiz_item ';
        $query_ .= "WHERE quiz_id = '" . $id_quiz . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function consultaQuiz($id_quiz) {
        $query_ = 'SELECT * FROM vw_quiz_completo ';
        $query_ .= "WHERE id_quiz = '" . $id_quiz . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados[0];
    }

    public function consultaQuizList($id_quiz) {
        $query_ = 'SELECT * FROM vw_quiz_completo ';
        $query_ .= "WHERE id_quiz = '" . $id_quiz . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function salvarEdicao($quiz) {
        $this->db->where("id_quiz", $quiz->id_quiz);
        if ($this->db->update("quiz", $quiz))
            return true;
    }

    public function desativar($id_quiz) {
        $query_ = 'UPDATE quiz ';
        $query_ .= "SET deleted = '1' ";
        $query_ .= "WHERE id_quiz = '" . $id_quiz . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function ativar($id_quiz) {
        $query_ = 'UPDATE quiz ';
        $query_ .= "SET deleted = '0' ";
        $query_ .= "WHERE id_quiz = '" . $id_quiz . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function excluir($id_quiz) {
        $query_ = 'DELETE FROM quiz_item ';
        $query_ .= "WHERE quiz_id = '" . $id_quiz . "' ";
        $dados = $this->db->query($query_);

        $query_ = 'DELETE FROM quiz ';
        $query_ .= "WHERE id_quiz = '" . $id_quiz . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

}
