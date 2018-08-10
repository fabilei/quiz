<?php

/**
 * Model Usuario
 *
 * @author Fabilei Spinelli
 */
class Usuario_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->library('Utilidades');
    }

    public function Usuario() {
        return new Usuario_Model();
    }

    public function consultaLista() {
        $query_ = 'SELECT * FROM users';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

}
