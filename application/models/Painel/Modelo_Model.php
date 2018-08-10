<?php

/**
 * Model Modelo
 *
 * @author Fabilei Spinelli
 */
class Modelo_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->library('Utilidades');
    }

    public function Modelo() {
        return new Modelo_Model();
    }

    public function consultaLista(){
        $query_ = 'SELECT * FROM categoria_blog';
        //$query_ .= ' WHERE deleted <> 1 ';
        $query_ .= ' ORDER BY deleted ASC, descricao ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function salvar($categoria_blog) {
        if ($this->db->insert('categoria_blog', $categoria_blog))
            return $this->db->insert_id();
    }

    public function consultaCategoriaBlog($id_cat_blog) {
        $query_ = 'SELECT * FROM categoria_blog ';
        $query_ .= "WHERE id_cat_blog = '" . $id_cat_blog . "'  ";
        $dados = $this->db->query($query_)->result_array();
        return $dados[0];
    }

    public function salvarEdicao($categoria_blog) {
        $this->db->where("id_cat_blog", $categoria_blog->id_cat_blog);
        if ($this->db->update("categoria_blog", $categoria_blog))
            return true;
    }

    public function desativar($id_cat_blog) {
        $query_ = 'UPDATE categoria_blog ';
        $query_ .= "SET deleted = '1' ";
        $query_ .= "WHERE id_cat_blog = '" . $id_cat_blog . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function ativar($id_cat_blog) {
        $query_ = 'UPDATE categoria_blog ';
        $query_ .= "SET deleted = '0' ";
        $query_ .= "WHERE id_cat_blog = '" . $id_cat_blog . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function dropDownCategoria() {
        $query_ = 'SELECT * FROM categoria_blog ';
        $query_ .= "WHERE deleted <> '1' ";
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="form-control selectpicker" data-live-search="true" id="id_cat_blog" name="id_cat_blog">';
        $html .= '<option value="0">Selecione</option>';
        foreach ($dados as $item) {
            $html .= '<option value="' . $item["id_cat_blog"] . '">' . $item["descricao"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownCategoriaEdit($id_cat_blog) {
        $query_ = 'SELECT * FROM categoria_blog ';
        $query_ .= "WHERE deleted <> '1' ";
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="form-control selectpicker" data-live-search="true" id="id_cat_blog" name="id_cat_blog">';
        $html .= '<option value="0">Selecione</option>';
        foreach ($dados as $item) {
            if ($id_cat_blog == $item['id_cat_blog']) {
                $html .= '<option value="' . $item["id_cat_blog"] . '" selected="selected">' . $item["descricao"] . '</option>';
            } else {
                $html .= '<option value="' . $item["id_cat_blog"] . '">' . $item["descricao"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }
    

}
