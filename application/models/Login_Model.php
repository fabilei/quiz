<?php

class Login_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Utilidades');
    }

    public function Logar($login, $senha) {
        $query_ = "
            SELECT u.id_user, u.nome,u.email,u.ultimo_acesso
                FROM users u
            WHERE email = ? AND senha = ? ";
        $dados = $this->db->query($query_, array($login, md5($senha)))->result();
        if(isset($dados[0])){
            return $dados[0];
        }else{
            return $dados;
        }
    }

    public function atualizarUltimoLogin($id_user){
        $query_ = 'UPDATE users ';
        $query_ .= " SET ultimo_acesso = '" . date('Y-m-d H:i:s') ."' ";
        $query_ .= " WHERE id_user = '" . $id_user . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function logUsuario() {
        $data = array(
            'ultimo_acesso' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('users', $data);
        return;
    }

    public function aut($tipo = null) {
        if($tipo != null)
        {
            if($tipo == 'id_user')
            {
                if($this->session->userdata("id_user") == null || $this->session->userdata("id_user") == "0" ){
                    $this->session->set_flashdata(array("tipo" => "autenticar", "titulo" => "Erro!", "msg" => "Você precisa fazer login para continuar!"));
                    redirect(base_url('Login/loginCliente'));
                } 
            }
        }
        if($this->session->userdata("logado") == null || $this->session->userdata("logado") != '1' ) 
        {
            $this->session->set_flashdata(array("tipo" => "autenticar", "titulo" => "Erro!", "msg" => "Você precisa fazer login para continuar!"));
            redirect(base_url('Login/loginCliente'));
        }
    }

}
