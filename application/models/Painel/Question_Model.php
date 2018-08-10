<?php

/**
 * Model Question
 *
 * @author Fabilei Spinelli
 */
class Question_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->library('Utilidades');
    }

    public function Question() {
        return new Question_Model();
    }

    public function consultaLista(){
        $query_ = 'SELECT * FROM vw_question_list';
        $query_ .= ' ORDER BY deleted ASC, created_at DESC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaListaHome(){
        $query_ = 'SELECT * FROM vw_question_list';
        $query_ .= ' WHERE deleted <> 1 ';
        $query_ .= ' ORDER BY created_at DESC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaQuizQuestions($id_quiz){
        $query_ = 'SELECT * FROM vw_question_completo';
        $query_ .= " WHERE quiz_id = '".$id_quiz."' ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function save($question) {
        if ($this->db->insert('question', $question))
            return $this->db->insert_id();
    }

    public function saveAlternative($alternative) {
        if ($this->db->insert('alternative', $alternative))
            return $this->db->insert_id();
    }

    public function addQuestionSession($question) {
        if ($this->db->insert('question_session', $question))
            return $this->db->insert_id();
    }

    public function removeQuestionSession($id_user, $id_question) {
        $query_ = 'DELETE FROM question_session ';
        $query_ .= "WHERE id_question = '" . $id_question . "' ";
        $query_ .= "AND id_user = '" . $id_user . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function removeQuestionSessionId($id_user) {
        $query_ = 'DELETE FROM question_session ';
        $query_ .= "WHERE id_user = '" . $id_user . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function consultaListItem($id_quiz) {
        $query_ = 'SELECT * FROM vw_quiz_completo ';
        $query_ .= "WHERE id_quiz = '" . $id_quiz . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaQuestionSession($id_user) {
        $query_ = 'SELECT * FROM question_session ';
        $query_ .= "WHERE id_user = '" . $id_user . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaQuestionSessionId($id_user, $id_question) {
        $query_ = 'SELECT * FROM question_session ';
        $query_ .= "WHERE id_user = '" . $id_user . "'  ";
        $query_ .= "AND id_question = '" . $id_question . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaQuestion($id_question) {
        $query_ = 'SELECT * FROM vw_question ';
        $query_ .= "WHERE id_question = '" . $id_question . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados[0];
    }

    public function consultaAlternatives($question_id) {
        $query_ = 'SELECT * FROM alternative ';
        $query_ .= "WHERE question_id = '" . $question_id . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function removeAlternative($id_question) {
        $query_ = 'DELETE FROM alternative ';
        $query_ .= "WHERE question_id = '" . $id_question . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function saveEdit($question) {
        $this->db->where("id_question", $question->id_question);
        if ($this->db->update("question", $question))
            return true;
    }

    public function desativar($id_question) {
        $query_ = 'UPDATE question ';
        $query_ .= "SET deleted = '1' ";
        $query_ .= "WHERE id_question = '" . $id_question . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function ativar($id_question) {
        $query_ = 'UPDATE question ';
        $query_ .= "SET deleted = '0' ";
        $query_ .= "WHERE id_question = '" . $id_question . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function excluir($id_question) {
        $query_ = 'DELETE FROM question ';
        $query_ .= "WHERE id_question = '" . $id_question . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function dropDownType() {
        $query_ = 'SELECT * FROM type ';
        $query_ .= "ORDER BY name ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="form-control selectpicker" data-live-search="true" id="id_type" name="id_type">';
        $html .= '<option value="0">Selecione</option>';
        foreach ($dados as $item) {
            $html .= '<option value="' . $item["id_type"] . '">' . $item["name"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownTypeEdit($id_type) {
        $query_ = 'SELECT * FROM type ';
        $query_ .= "WHERE id_type = " . $id_type . " ";
        $query_ .= "ORDER BY name ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="form-control selectpicker" data-live-search="true" id="id_type" name="id_type">';
        $html .= '<option value="0">Selecione</option>';
        foreach ($dados as $item) {
            if ($id_type == $item['id_type']) {
                $html .= '<option value="' . $item["id_type"] . '" selected="selected">' . $item["name"] . '</option>';
            } else {
                $html .= '<option value="' . $item["id_type"] . '">' . $item["name"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

}
